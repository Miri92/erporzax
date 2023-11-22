<?php

namespace App\Http\Controllers\Front;

use App\Models\Doc;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\DocParagraph;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Validator;
class ContactController extends Controller
{

    public function index(Request $request){

        return view('front.contact.index');

    }

}
