<?php

namespace App\Http\Controllers\Panel;

use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


use PhpOffice\PhpWord\Element\AbstractContainer;
use PhpOffice\PhpWord\Element\Text;
use PhpOffice\PhpWord\IOFactory;
class TestimonialController extends Controller
{

    public function __construct(){
        $this->rules = [
            'photo' => 'required|mimes:jpg,jpeg,png|max:2048',
            'full_name' => 'required',
            'position' => 'required',
            'body' => 'required'
        ];
    }
    public function index(Request $request){

        $rows = Testimonial::latest()->paginate(20);
        return view('panel.testimonial.index', compact('rows'));
    }

    public function create(){
        return view('panel.testimonial.create');
    }

    public function store(Request $request){

        $request->validate($this->rules);

        $arrCreate = [];
        //dd($request->all());
        if ($request->hasFile('photo')) {
            if ($request->file('photo')->isValid()) {

                $makedName = $request->title . time();
                $path = $request->file('photo')->storeAs('testimonials', $makedName . '.jpg', 'public');
                //Image::make(Storage::disk('public')->path($path))->fit(918, 504)->save(null, 100);
                $arrCreate['photo'] = $path;
            }
        }

        $arrCreate['full_name']   = $request->full_name;
        $arrCreate['body']        = $request->body;
        $arrCreate['position']    = $request->position;
        $arrCreate['status']      = (int)$request->publish;

        //dd($arrCreate);

        Testimonial::create($arrCreate);

        return redirect()->route('panel.testimonial.index')
            ->withSuccess('Kontent əlavə edildi');

    }

    public function edit(Request $request, $id){
        $row = Testimonial::where('id','=',$id)->first();

        if (!$row){
            return redirect()->route('panel.testimonial.index')
                ->withError('The page not found');
        }

        return view('panel.testimonial.edit', compact('row'));

    }

    public function update(Request $request, $id){
        $rules = $this->rules;
        unset($rules['photo']);

        $request->validate($rules);

        $row = Testimonial::where('id','=',$id)->first();

        if (!$row){
            return redirect()->route('panel.testimonial.index')
                ->withError('The page not found');
        }

        $arrCreate = [];

        if ($request->hasFile('photo')) {
            if ($request->file('photo')->isValid()) {

                $makedName = $request->title . time();
                $path = $request->file('photo')->storeAs('testimonials', $makedName . '.jpg', 'public');
                //Image::make(Storage::disk('public')->path($path))->fit(918, 504)->save(null, 100);
                $arrCreate['photo'] = $path;

                //remove old file
                Storage::disk('public')->delete($row->photo);

            }
        }
        $arrCreate['full_name'] = $request->full_name;
        $arrCreate['position'] = $request->position;
        $arrCreate['body'] = $request->body;
        $arrCreate['status'] = (int)$request->publish;
        $arrCreate['link'] = $request->link;

        //dd($arrCreate);

        $row->update($arrCreate);

        return redirect()->route('panel.testimonial.index')
            ->withSuccess('Kontent yeniləndi');
    }


    public function delete(Request $request, $id){

        $row = Testimonial::where('id','=',$id)->first();

        if (!$row){
            return redirect()->route('panel.testimonial.index')
                ->withError('The page not found');
        }

        $row->delete();

        return redirect()->route('panel.testimonial.index')
            ->withSuccess('Kontent silindi');
    }


}
