<?php

namespace App\Http\Controllers\Front;

use App\Models\Doc;
use App\Models\Page;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\DocParagraph;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Validator;
class PageController extends Controller
{

    public function show(Request $request, $slug){
        $row = Page::query()
            ->where('slug','=',$slug)->first();

        if (!$row){
            abort(404);
        }

        return view('front.page.show', compact('row'));
    }

}
