<?php

namespace App\Repositories;

use App\Models\DocParagraph;
use App\Models\User;

class ParagraphRepository
{
    private bool $hasError = false;
    private array $messages = [];
    private array $parsedArr = [];
    private User $user;

    public function __construct()
    {
        $this->model = new DocParagraph();
    }

    public function setUser(User $user): static
    {
        $this->user = $user;
        return $this;
    }


    public function setParsedArr($setParsedArr)
    {
        $this->parsedArr = $setParsedArr;
        return $this;
    }

    public function create($attributes)
    {
        //dd($attributes['doc_id']);
//        echo "<pre>";
//        print_r($this->parsedArr);
//        echo "</pre>";


        foreach ($this->parsedArr as $paragraph){
            $isTrueParagraph = $this->arrayKeyExistsRecursive($paragraph, 'lawTitle');

            if ($isTrueParagraph){
                //dump($paragraph);
                $collectedParagraph = $this->collectParagraphBeforeStore($paragraph);

                //print_r($collectedParagraph['lawTitle']);
                //print_r($collectedParagraph["body"]);
                //dump($collectedParagraph);

                DocParagraph::create([
                    "doc_id"      => $attributes["doc_id"],
                    "title"       => $collectedParagraph["subTitle"],
                    "title_label" => $collectedParagraph["lawTitle"],
                    "body"        => $collectedParagraph["body"]
                ]);
            }

        }


        return true;


    }

    //bezi paragraflar insert olmali deyil buna gore biz onu yoxlamaliyiq
    public function arrayKeyExistsRecursive($array, $key)
    {
        //dd($array);
        foreach ($array as $item) {
            if (is_array($item)) {

                if (isset($item[$key])){
                    return true;
                }

                //Recursive lazim olmadi
//                if ($this->arrayKeyExistsRecursive($item, $key)) {
//
//                    return true;
//                }
            }
        }
        return false;
    }


    //paragrap array seklindedir, her setr ayri bir arraydir, buna gore biz muvafiq setrleri birlesdirmeliyik
    public function collectParagraphBeforeStore($arr)
    {

        //dd($arr);

        $mergedArr = [
            "lawTitle" => "",
            "subTitle" => "",
            "body"     => "",
        ];
        foreach ($arr as $innerArray) {
            //dd($innerArray);
            if (isset($innerArray["body"])){
                $mergedArr["body"] = $innerArray["body"] . PHP_EOL;
            }
            if (isset($innerArray["lawTitle"])){
                $mergedArr["lawTitle"] = $innerArray["lawTitle"];
            }
            if (isset($innerArray["subTitle"])){
                $mergedArr["subTitle"] = $innerArray["subTitle"];
            }
        }


        return $mergedArr;

    }





}
