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
            'title'    => 'required',
            'body'     => 'required'
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

        $request->validate([
            'photo' => 'required|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required'
        ]);

        //dd($request->all());
        if ($request->hasFile('photo')) {
            if ($request->file('photo')->isValid()) {

                $makedName = $request->title . time();
                $path = $request->file('photo')->storeAs('slider/', $makedName . '.jpg', 'public');
                //Image::make(Storage::disk('public')->path($path))->fit(918, 504)->save(null, 100);

            }
        }
        return view('panel.slider.create');
    }
}
