<?php

namespace App\Http\Controllers\Front;

use App\Models\Doc;
use Illuminate\Http\Request;
use App\Models\DocParagraph;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Validator;
class LawCommentController extends Controller
{

    public function index(Request $request){

        $lawComments = Doc::query()->latest()->paginate(10);

        //dd($slider);

        return view('front.law_comments.index',compact('lawComments'));
    }

    public function show(Request $request, $id){
        $lawComment = Doc::query()->where('id', $id)
            ->with('paragraphs')->first();

        $lawCommentParagraphs = DocParagraph::query()
            ->where('doc_id', $id)
            ->paginate(10);

        return view('front.law_comments.show',compact('lawComment','lawCommentParagraphs'));

    }

}
