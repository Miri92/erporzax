<?php

namespace App\Http\Controllers\Panel;

use PhpOption\Option;
use App\Models\Slider;
use App\Models\Options;
use App\Models\SocialIcon;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


use PhpOffice\PhpWord\Element\AbstractContainer;
use PhpOffice\PhpWord\Element\Text;
use PhpOffice\PhpWord\IOFactory;
class OptionsController extends Controller
{

    public function __construct(){
        $this->rules = [
        ];
    }
    public function edit(Request $request, $id = 1){
        $row = Options::where('id','=',$id)->first();

       // dd($row);
        if (!$row){
            return redirect()->route('panel.dashboard.index')
                ->withError('The page not found');
        }

        return view('panel.options.edit', compact('row'));

    }

    public function update(Request $request, $id){
        //dd($request->all());
        $rules = $this->rules;
        unset($rules['photo']);

        $request->validate($rules);

        $row = Options::where('id','=',$id)->first();

        if (!$row){
            return redirect()->route('panel.options.index')
                ->withError('The page not found');
        }

        $arrCreate = [];

        if ($request->hasFile('logo')) {
            if ($request->file('logo')->isValid()) {
                $params = [
                    "name"     => "logo",
                    "old_path" => $row->logo
                ];
                $path = $this->upload($request, $params);
                $arrCreate['logo'] = $path;
            }
        }
        if ($request->hasFile('logo_white')) {
            if ($request->file('logo_white')->isValid()) {
                //dd($request->all());

                $params = [
                    "name"     => "logo_white",
                    "old_path" => $row->logo_white
                ];
                $path = $this->upload($request, $params);
                $arrCreate['logo_white'] = $path;
            }
        }
        if ($request->hasFile('favicon')) {
            if ($request->file('favicon')->isValid()) {
                $params = [
                    "name"     => "favicon",
                    "old_path" => $row->favicon
                ];
                $path = $this->upload($request, $params);
                $arrCreate['favicon'] = $path;
            }
        }
        if ($request->hasFile('logo_social_share')) {
            if ($request->file('logo_social_share')->isValid()) {
                $params = [
                    "name"     => "logo_social_share",
                    "old_path" => $row->logo_social_share
                ];
                $path = $this->upload($request, $params);
                $arrCreate['logo_social_share'] = $path;
            }
        }

        $arrCreate['email'] = $request->email;
        $arrCreate['phone'] = $request->phone;
        $arrCreate['phone_whatsap'] = $request->phone_whatsap;
        $arrCreate['address'] = $request->address;
        $arrCreate['map_embed'] = $request->map_embed;
        $arrCreate['site_title'] = $request->site_title;
        $arrCreate['meta_keywords'] = $request->meta_keywords;
        $arrCreate['meta_description'] = $request->meta_description;

        //dd($arrCreate);

        $row->update($arrCreate);

        return redirect()->back()
            ->withSuccess('Kontent yeniləndi');
    }


    public function upload(Request $request, $params){
        $makedName = $params['name'] . time();
        $extension = ".".$request->file($params['name'])->extension();
        $path = $request->file($params['name'])->storeAs('options', $makedName . $extension, 'public');
        //Image::make(Storage::disk('public')->path($path))->fit(918, 504)->save(null, 100);

        //remove old file
        if ($params['old_path']){
            Storage::disk('public')->delete($params['old_path']);
        }

        return $path;
    }


}
