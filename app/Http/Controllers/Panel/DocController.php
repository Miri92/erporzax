<?php

namespace App\Http\Controllers\Panel;

use App\Models\Doc;
use Illuminate\Http\Request;
use App\Services\DocService;
use Illuminate\Support\Facades\App;
use App\Repositories\DocRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


use App\Repositories\ParagraphRepository;
use PhpOffice\PhpWord\Element\AbstractContainer;
use PhpOffice\PhpWord\Element\Text;
use PhpOffice\PhpWord\IOFactory;
class DocController extends Controller
{
    public function index(Request $request){
        $locale = App::currentLocale();

        //dd($locale);


        $docs = Doc::query()
            ->orderBy('created_at','DESC')->get();
        //echo phpinfo();

        //dd($docs);

        //dd($request->all());
        return view('panel.doc.index' , compact('docs'));
    }

    public function create(Request $request){
        return view('panel.doc.create');
    }

    public function store(Request $request){
        //dd($request->all());
        //dd($request->hasFile('doc'));

        $request->validate([
            'doc' => 'required|mimes:doc,docx|max:2048'
        ]);


        $modelArr = [
            'doc'    => $request->name,
            'title'    => $request->title,
        ];


        if($request->hasFile('doc')) {
            //dd($request->file('doc'));

            $fileName = time().'_'.$request->doc->getClientOriginalName();
            $filePath = $request->file('doc')->storeAs('docs', $fileName, 'public');
            //'/storage/' . $filePath;
            $modelArr['doc'] = $filePath;
        }

        //dd($request->all());

        $repo = (new DocRepository())
            ->setUser($request->user())
            ->create($modelArr);



        //Doc::create($modelArr);

        return redirect()->route('panel.doc.index')->with('success','File has been uploaded.');


        //return view('panel.dashboard');
    }

    public function edit(Doc $doc)
    {

        $doc->load('paragraphs');

        //dd($doc);


        return view('panel.doc.edit', compact('doc'));
    }

    public function update(Request $request){
        return view('panel.dashboard');
    }

    public function delete(Request $request,$id){
        $row = Doc::where('id','=',$id)->first();

        if (!$row){
            return redirect()->back()
                ->withError('The page not found');
        }

        if ($row->doc){
            Storage::disk('public')->delete($row->doc);
        }
        $row->delete();

        return redirect()->back()
            ->withSuccess('Kontent silindi');

    }

}
