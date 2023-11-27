<?php

namespace App\Http\Controllers\Front;

use App\Models\Doc;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\DocParagraph;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Validator;
class FaqController extends Controller
{

    public function index(Request $request){

        $questions = Question::orderBy('sorting')->paginate(20);
        //dd($questions);

        return view('front.faq.index', compact('questions'));

    }

}
