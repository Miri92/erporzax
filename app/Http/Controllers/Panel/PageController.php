<?php

namespace App\Http\Controllers\Panel;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{

    public function __construct(){
        $this->rules = [
            'photo' => 'mimes:jpg,jpeg,png|max:2048',
            'title' => 'required'
        ];
    }
    public function index(Request $request){

        $rows = Page::latest()->paginate(20);
        return view('panel.pages.index', compact('rows'));
    }

    public function create(){
        return view('panel.pages.create');
    }

    public function store(Request $request){

        //dd($request->all());
        $request->validate($this->rules);

        $arrCreate = [];
        //dd($request->all());
        if ($request->hasFile('photo')) {
            if ($request->file('photo')->isValid()) {

                $makedName = $request->title . time();
                $path = $request->file('photo')->storeAs('pages', $makedName . '.jpg', 'public');
                //Image::make(Storage::disk('public')->path($path))->fit(918, 504)->save(null, 100);
                $arrCreate['photo'] = $path;
            }
        }

        $arrCreate['title']     = $request->title;
        $arrCreate['seo_title'] = $request->seo_title;
        $arrCreate['seo_desc']  = $request->seo_desc;
        $arrCreate['content']   = $request->input('content');
        $arrCreate['status']    = (int)$request->publish;
        $arrCreate['user_id']   = Auth::user()->id;

        //dd($arrCreate);

        Page::create($arrCreate);

        return redirect()->route('panel.pages.index')
            ->withSuccess('Kontent əlavə edildi');

    }

    public function edit(Request $request, $id){
        $row = Page::where('id','=',$id)->first();

        if (!$row){
            return redirect()->route('panel.pages.index')
                ->withError('The page not found');
        }

        return view('panel.pages.edit', compact('row'));

    }

    public function update(Request $request, $id){
        $request->validate(['title' => 'required']);

        $row = Page::where('id','=',$id)->first();

        if (!$row){
            return redirect()->route('panel.pages.index')
                ->withError('The page not found');
        }

        $arrCreate = [];

        if ($request->hasFile('photo')) {
            if ($request->file('photo')->isValid()) {

                $makedName = $request->title . time();
                $path = $request->file('photo')->storeAs('pages', $makedName . '.jpg', 'public');
                //Image::make(Storage::disk('public')->path($path))->fit(918, 504)->save(null, 100);
                $arrCreate['photo'] = $path;

                //remove old file
                Storage::disk('public')->delete($row->photo);

            }
        }
        $arrCreate['title']     = $request->title;
        $arrCreate['seo_title'] = $request->seo_title;
        $arrCreate['seo_desc']  = $request->seo_desc;
        $arrCreate['content']   = $request->input('content');
        $arrCreate['status']    = (int)$request->publish;

        //dd($arrCreate);

        $row->update($arrCreate);

        return redirect()->route('panel.pages.index')
            ->withSuccess('Kontent yeniləndi');
    }


    public function delete(Request $request, $id){

        $row = Page::where('id','=',$id)->first();

        if (!$row){
            return redirect()->route('panel.pages.index')
                ->withError('The page not found');
        }

        Storage::disk('public')->delete($row->photo);


        //dd($arrCreate);

        $row->delete();

        return redirect()->route('panel.pages.index')
            ->withSuccess('Kontent silindi');
    }


}
