<?php

namespace App\Http\Controllers\Panel;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


use PhpOffice\PhpWord\Element\AbstractContainer;
use PhpOffice\PhpWord\Element\Text;
use PhpOffice\PhpWord\IOFactory;
class SliderController extends Controller
{

    public function __construct(){
        $this->rules = [
            'photo' => 'required|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required'
        ];
    }
    public function index(Request $request){

        $rows = Slider::latest()->paginate(20);
        return view('panel.slider.index', compact('rows'));
    }

    public function create(){
        return view('panel.slider.create');
    }

    public function store(Request $request){

        //dd($request->all());
        $request->validate($this->rules);

        $arrCreate = [];
        //dd($request->all());
        if ($request->hasFile('photo')) {
            if ($request->file('photo')->isValid()) {

                $makedName = $request->title . time();
                $path = $request->file('photo')->storeAs('slider', $makedName . '.jpg', 'public');
                //Image::make(Storage::disk('public')->path($path))->fit(918, 504)->save(null, 100);
                $arrCreate['photo'] = $path;
            }
        }

        $arrCreate['title']       = $request->title;
        $arrCreate['body']        = $request->body;
        $arrCreate['status']      = (int)$request->publish;
        $arrCreate['link']        = $request->link;
        $arrCreate['button_name'] = $request->button_name;

        //dd($arrCreate);

        Slider::create($arrCreate);

        return redirect()->route('panel.slider.index')
            ->withSuccess('Kontent əlavə edildi');

    }

    public function edit(Request $request, $id){
        $row = Slider::where('id','=',$id)->first();

        if (!$row){
            return redirect()->route('panel.slider.index')
                ->withError('The page not found');
        }

        return view('panel.slider.edit', compact('row'));

    }

    public function update(Request $request, $id){
        $request->validate(['title' => 'required']);

        $row = Slider::where('id','=',$id)->first();

        if (!$row){
            return redirect()->route('panel.slider.index')
                ->withError('The page not found');
        }

        $arrCreate = [];

        if ($request->hasFile('photo')) {
            if ($request->file('photo')->isValid()) {

                $makedName = $request->title . time();
                $path = $request->file('photo')->storeAs('slider', $makedName . '.jpg', 'public');
                //Image::make(Storage::disk('public')->path($path))->fit(918, 504)->save(null, 100);
                $arrCreate['photo'] = $path;

                //remove old file
                Storage::disk('public')->delete($row->photo);

            }
        }
        $arrCreate['title']       = $request->title;
        $arrCreate['body']        = $request->body;
        $arrCreate['status']      = (int)$request->publish;
        $arrCreate['link']        = $request->link;
        $arrCreate['button_name'] = $request->button_name;

        //dd($arrCreate);

        $row->update($arrCreate);

        return redirect()->route('panel.slider.index')
            ->withSuccess('Kontent yeniləndi');
    }


    public function delete(Request $request, $id){

        $row = Slider::where('id','=',$id)->first();

        if (!$row){
            return redirect()->route('panel.slider.index')
                ->withError('The page not found');
        }

        $arrCreate = [];

        Storage::disk('public')->delete($row->photo);


        //dd($arrCreate);

        $row->delete();

        return redirect()->route('panel.slider.index')
            ->withSuccess('Kontent silindi');
    }


}
