<?php

namespace App\Services;


use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Element\AbstractContainer;

class DocService
{

    /**
     * @var string
     */
    private ?string $path = null;

    /**
     * @var string
     */
    private ?string $name = null;

    /**
     * @var array
     */
    private array $paragraphs = [];

    private int $lastParagraphIndex = 0;
    private int $lastTitleFound = 0;


    public function parse(): void
    {
        //isleyir
        $source    = public_path('storage'.  $this->path);

        //dd($source);

        $objReader = IOFactory::createReader('Word2007');
        $phpWord   = $objReader->load($source);

        //dd($phpWord);

        foreach ($phpWord->getSections() as $section) {

            //dd($key);
            //dd($section);
            foreach ($section->getElements() as $key => $element) {
                $text = $this->getElementText($element);

                if (strlen($text)) {
                    // This ensures that the text from one section doesn't stickRightToTheNextSectionLikeThis
                    $contentItem = $this->handleContent($text);
                    //$this->paragraphs[] = $contentItem;

                    // maddelere qeder olan basliq yazilari/setrleri ucun
                    if ($this->lastTitleFound == 0){
                        if (isset($contentItem['body'])){
                            $this->paragraphs[0][] = $contentItem;
                        }
                    } else {
                        if (isset($contentItem['body'])){
                            $this->paragraphs[$this->lastParagraphIndex][] = $contentItem;
                        }
                    }


//                    if ($this->lastTitleFound == 1){
//                        if (isset($contentItem['lawTitle'])){
//                            $this->paragraphs[$this->lastParagraphIndex][] = $contentItem;
//                            $this->lastParagraphIndex = $key;
//
//                        }
//                    }

                    if ($this->lastTitleFound == 0){
                        if (isset($contentItem['lawTitle'])){
                            $this->lastTitleFound = 1;
                            $this->lastParagraphIndex = $key;
                            $this->paragraphs[$this->lastParagraphIndex][] = $contentItem;
                        }
                    } else {
                        if (isset($contentItem['lawTitle'])){
                            //$this->lastTitleFound = 1;
                            $this->lastParagraphIndex = ++$key;
                            $this->paragraphs[$this->lastParagraphIndex][] = $contentItem;
                        }
                    }
                }
            }
        }
    }

    public function getElementText($element): string
    {
        $result = '';

        if ($element instanceof AbstractContainer) {
            foreach ($element->getElements() as $subElement) {
                $result .= $this->getElementText($subElement);
            }
        }

        if (method_exists($element, 'getText')) {
            $result .= $element->getText();
        }

        return $result;
    }

    public function handleContent($string){
        $result = '';

        $pattern = "/Maddə \d+\./"; // Regular expression pattern to match "Maddə {number}."

        $tempArr = [];
        if (preg_match($pattern, $string)){
            $previousTitle = true;
            $spilitTitile = $this->splitTitle($string);
            //dd($spilitTitile['lawTitle']);
            //$result .= "<h2>";
            $result .= $spilitTitile['lawTitle'];

            $tempArr['lawTitle'] = $spilitTitile['lawTitle'];
            $tempArr['subTitle'] = $spilitTitile['subTitle'];

            //$result .= "<span style='color: #1ea91d'>";
            $result .= $spilitTitile['subTitle'];
            //$result .= "</span>";
            //$result .= "</h2>";
        } else {
            $result .= $string;
            $tempArr['body'] = $string;

        }

        return $tempArr;
    }

    public function splitTitle($string){
        $pattern = "/(Maddə \d+\.) (.+)/";

        $result = [];
        if (preg_match($pattern, $string, $matches)) {
            // Extract the matched parts and store them in the result array
            $result['lawTitle'] = $matches[1];
            $result['subTitle'] = $matches[2];
        }

        return $result;
    }


    public function getParagraphs(): array
    {
        return $this->paragraphs;
    }

    /**
     * @return string|null
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getPath(): string
    {
        return $this->path;
    }

    public function setPath($path): void
    {
        $this->path = $path;
    }
}


