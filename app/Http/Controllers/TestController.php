<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use PhpOffice\PhpWord\Element\AbstractContainer;
use PhpOffice\PhpWord\Element\Text;
use PhpOffice\PhpWord\IOFactory;
class TestController extends Controller
{

    protected $key = 'docs/qanun.doc';

    public function index(Request $request){

        if (Storage::disk('local')->exists($this->key)) {
            $this->key = storage_path('app/'.$this->key);
        } else {
            throw new \Exception("file does not exists: $this->key");
        }

        $source = $this->key;
        $objReader = IOFactory::createReader('Word2007');
        $phpWord = \PhpOffice\PhpWord\IOFactory::load($source);

        $text = "";
        foreach ($phpWord->getSections() as $section) {
            foreach ($section->getElements() as $element) {
                $text .= $this->getWordText($element) ;
            }
        }

        echo $text;

        return view('test');
    }


    //isleyir v1
    public function getWordText($element) {
        $result = '';
        if ($element instanceof AbstractContainer) {
            $previousTitle = false;
            foreach ($element->getElements() as $element) {
                if (preg_match("/^Maddə \d+\.$/", $this->getWordText($element))){
                    $previousTitle = true;
                    $result .= "<h2>";
                    $result .= $this->getWordText($element);
                    $result .= "</h2>";
                } else {

                    if ($previousTitle){
                        $bgColor = "yellow";

                        //dump($previousTitle);
                    } else {
                        $bgColor = "inherit";
                    }
                    $result .= "<p style='background-color: {$bgColor};'>";
                    $result .= $this->getWordText($element);
                    $result .= "</p>";

                    $previousTitle = false;
                }

            }
        } elseif ($element instanceof Text) {
            $result .= $element->getText();
        }
        // and so on for other element types (see src/PhpWord/Element)

        return $result;
    }


    public function getDocumentText(string $filepath): string
    {
        $document = IOFactory::createReader('Word2007')
            ->load($filepath);
        $documentText = '';

        foreach ($document->getSections() as $section) {
            foreach ($section->getElements() as $element) {
                $text = $this->getElementText($element);

                if (strlen($text)) {
                    // This ensures that the text from one section doesn't stickRightToTheNextSectionLikeThis
                    $documentText.= $this->getElementText($element) . "\n";
                }
            }
        }

        return $documentText;
    }

    protected function getElementText($element): string
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

    public function exampleArr(){
        $arr = [
            "Rule 1.",
            "Rule lorem and so on for other element types",
            "Rule 2.",
            "Rule lorem and so on for other element types",
            "Rule 3.",
            "Rule lorem and so on for other element types",
            "Rule 4.",
            "Rule lorem and so on for other element types",
            "Rule 5.",
            "Rule lorem and so on for other element types",
            "Rule 1.",
            "Rule lorem and so on for other element types",
            "Rule 1.",
            "Rule lorem and so on for other element types",
        ];

        $collect = [];
        foreach ($arr as $string){
            if ($string == "Rule {anyNumber}."){
                $collect['title'] = $string;
            } else {
                $collect['content'] = $string;
            }
        }

    }
}
