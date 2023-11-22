<?php

namespace App\Http\Controllers\Front;

use App\Models\Doc;
use Illuminate\Http\Request;
use App\Models\DocParagraph;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Validator;
class ParagraphController extends Controller
{

    public function show(Request $request, $id){
        $paragraph = DocParagraph::query()
            ->where('id', $id)
            ->first();

        return view('front.paragraph.show',compact('paragraph'));

    }

}
