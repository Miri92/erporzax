<?php

namespace App\Services;


use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Element\AbstractContainer;

class DocStoreService
{

    private array $parsedDoc = [];

    public function setParsedDoc($parsedDoc): void
    {
        $this->parsedDoc = $parsedDoc;
    }

    public function getParsedDoc(): array
    {
        return $this->parsedDoc;
    }


}


