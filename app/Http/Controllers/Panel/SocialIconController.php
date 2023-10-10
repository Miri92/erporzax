<?php

namespace App\Http\Controllers\Panel;

use App\Models\Slider;
use App\Models\SocialIcon;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


use PhpOffice\PhpWord\Element\AbstractContainer;
use PhpOffice\PhpWord\Element\Text;
use PhpOffice\PhpWord\IOFactory;
class SocialIconController extends Controller
{

    public function __construct(){
        $this->rules = [
            'name' => 'required',
            'url' => 'required',
            'icon' => 'required'
        ];
    }
    public function index(Request $request){

        $rows = SocialIcon::latest()->paginate(20);
        return view('panel.social.index', compact('rows'));
    }

    public function create(){
        return view('panel.social.create');
    }

    public function store(Request $request){

        //dd($request->all());
        $request->validate($this->rules);

        $arrCreate = [];

        $arrCreate['name'] = $request->name;
        $arrCreate['url'] = $request->url;
        $arrCreate['icon'] = $request->icon;
        $arrCreate['status'] = (int)$request->publish;

        SocialIcon::create($arrCreate);

        return redirect()->route('panel.social_icon.index')
            ->withSuccess('Kontent əlavə edildi');

    }

    public function edit(Request $request, $id){
        $row = SocialIcon::where('id','=',$id)->first();

        if (!$row){
            return redirect()->route('panel.social_icon.index')
                ->withError('The page not found');
        }

        return view('panel.social.edit', compact('row'));

    }

    public function update(Request $request, $id){
        $rules = $this->rules;
        unset($rules['photo']);

        $request->validate($rules);

        $row = SocialIcon::where('id','=',$id)->first();

        if (!$row){
            return redirect()->route('panel.social_icon.index')
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
        $arrCreate['name'] = $request->name;
        $arrCreate['url'] = $request->url;
        $arrCreate['icon'] = $request->icon;
        $arrCreate['status'] = (int)$request->publish;
        $arrCreate['link'] = $request->link;

        //dd($arrCreate);

        $row->update($arrCreate);

        return redirect()->route('panel.social_icon.index')
            ->withSuccess('Kontent yeniləndi');
    }


    public function delete(Request $request, $id){

        $row = SocialIcon::where('id','=',$id)->first();

        if (!$row){
            return redirect()->route('panel.social_icon.index')
                ->withError('The page not found');
        }


        $row->delete();

        return redirect()->route('panel.social_icon.index')
            ->withSuccess('Kontent silindi');
    }


}
