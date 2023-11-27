<?php

namespace App\Http\Controllers\Panel;

use App\Models\Slider;
use App\Models\Question;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


use PhpOffice\PhpWord\Element\AbstractContainer;
use PhpOffice\PhpWord\Element\Text;
use PhpOffice\PhpWord\IOFactory;
class QuestionController extends Controller
{

    public function __construct(){
        $this->rules = [
            'question' => 'required',
            //'answer' => 'required'
        ];
    }
    public function index(Request $request){

        $rows = Question::latest()->paginate(20);
        return view('panel.question.index', compact('rows'));
    }

    public function create(){
        return view('panel.question.create');
    }

    public function store(Request $request){

        $request->validate($this->rules);



        Question::create([
            'question' => $request->question,
            'answer'   => $request->answer,
            'sorting'  => $request->sorting
        ]);

        return redirect()->route('panel.question.index')
            ->withSuccess('Kontent əlavə edildi');

    }

    public function edit(Request $request, $id){
        $row = Question::where('id','=',$id)->first();

        if (!$row){
            return redirect()->route('panel.question.index')
                ->withError('The page not found');
        }

        return view('panel.question.edit', compact('row'));

    }

    public function update(Request $request, $id){
       // dd($request->all());

        $request->validate($this->rules);

        $row = Question::where('id','=',$id)->first();

        if (!$row){
            return redirect()->route('panel.question.index')
                ->withError('The page not found');
        }

        $arrCreate = [
            'question' => $request->question,
            'answer'   => $request->answer,
            'sorting'  => $request->sorting
        ];
        //dd($arrCreate);

        $row->update($arrCreate);

        return redirect()->route('panel.question.index')
            ->withSuccess('Kontent yeniləndi');
    }


    public function delete(Request $request, $id){

        $row = Question::where('id','=',$id)->first();

        if (!$row){
            return redirect()->route('panel.question.index')
                ->withError('The page not found');
        }

        $row->delete();

        return redirect()->route('panel.question.index')
            ->withSuccess('Kontent silindi');
    }


}
