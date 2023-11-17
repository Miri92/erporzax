<?php

namespace App\Repositories;


use App\Models\Doc;
use App\Models\User;
use App\Services\DocService;

class DocRepository
{
    private Doc $model;
    private $user;
    private bool $hasError = false;
    private array $messages  = [];
    private array $parsedDoc = [];

    public function setModel(Doc $model): static
    {
        $this->model = $model;

        return $this;
    }
    public function getModel(): Doc
    {
        return $this->model;
    }

    public function setUser(User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getMessages(): array
    {
        return $this->messages;
    }

    public function setError($text): static
    {
        $this->hasError  = true;
        $this->messages[] = $text;

        return $this;
    }

    public function setSuccess($text): static
    {
        $this->hasError  = false;
        $this->messages[] = $text;

        return $this;
    }

    public function setParsedDoc($parsedDoc): void
    {
        $this->parsedDoc = $parsedDoc;
    }

    public function getParsedDoc(): array
    {
        return $this->parsedDoc;
    }

    public function create($attributes): bool
    {

        $attributes['user_id'] = $this->user->id;
        $attributes['status'] = 0;

        //dd($attributes);

        $DocService = new DocService();
        $DocService->setPath($attributes['doc']);
        $DocService->parse();
        $paragraphs = $DocService->getParagraphs();


        //dd($attributes);

        $doc = Doc::create($attributes);


        //dd($this->user);
        $attributes['doc_id'] = $doc->id;
        $paragraphRepo = (new ParagraphRepository())
            ->setUser($this->user)
            ->setParsedArr($paragraphs)
            ->create($attributes);

        //dd($paragraphRepo);

        return true;

    }


}


