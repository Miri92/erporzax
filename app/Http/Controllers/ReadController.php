<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use PhpOffice\PhpWord\Element\AbstractContainer;
use PhpOffice\PhpWord\Element\Text;
use PhpOffice\PhpWord\IOFactory;
class ReadController extends Controller
{

    protected $key = 'docs/qanun.doc';

    public function index(Request $request){

        $source = storage_path('app/'.$this->key);
        dd($source);
        $objReader = IOFactory::createReader('Word2007');
        $phpWord = $objReader->load($source);

        $documentText = '';
        foreach ($phpWord->getSections() as $section) {

            //dd($section);
            foreach ($section->getElements() as $element) {
                $text = $this->getElementText($element);

                if (strlen($text)) {
                    // This ensures that the text from one section doesn't stickRightToTheNextSectionLikeThis
                    $documentText .= $this->handleContent($text) . "<br>";
                }
            }
        }

        //dd($documentText);
        return $documentText;
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

        if (preg_match($pattern, $string)){
            $previousTitle = true;
            $spilitTitile = $this->splitTitle($string);
            //dd($spilitTitile['lawTitle']);
            $result .= "<h2>";
            $result .= $spilitTitile['lawTitle'];

            $result .= "<span style='color: #1ea91d'>";
            $result .= $spilitTitile['subTitle'];
            $result .= "</span>";
            $result .= "</h2>";
        } else {
            $result .= $string;
        }

        return $result;
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

}
