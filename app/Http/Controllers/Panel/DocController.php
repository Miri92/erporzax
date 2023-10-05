<?php

namespace App\Http\Controllers\Panel;

use App\Models\Doc;
use Illuminate\Http\Request;
use App\Services\DocService;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


use PhpOffice\PhpWord\Element\AbstractContainer;
use PhpOffice\PhpWord\Element\Text;
use PhpOffice\PhpWord\IOFactory;
class DocController extends Controller
{
    public function index(Request $request){
        $locale = App::currentLocale();

        //dd($locale);


        $docs = Doc::query()->get();
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
            'user_id' => $request->user_id,
            'status'    => $request->status,
            'doc'    => $request->name,
            'title'    => $request->title,
        ];


        if($request->hasFile('doc')) {
            //dd($request->file('doc'));

            $fileName = time().'_'.$request->doc->getClientOriginalName();
            $filePath = $request->file('doc')->storeAs('uploads', $fileName, 'public');
            //'/storage/' . $filePath;
            $modelArr['doc'] = $filePath;
        }

        //dd($request->all());



        Doc::create($modelArr);

        return back()->with('success','File has been uploaded.');


        //return view('panel.dashboard');
    }

    public function edit(Doc $doc)
    {


        //dd($doc->doc);
        $path = asset($doc->doc);

        $exists = Storage::disk('public')->has($doc->doc);
        $uploadsDir = Storage::disk('public')->files('uploads');
        $source = storage_path($doc->doc);


//        if (Storage::disk('public')->has($doc->doc)) {
//            dd($path);
//        } else {
//            dd(['not found', $path  ]);
//        }


        $DocService = new DocService();
        $DocService->setPath($doc->doc);
        $DocService->parse();
        dd($DocService->getParagraphs());

        return view('panel.dashboard');
    }

    public function update(Request $request){
        return view('panel.dashboard');
    }

}
