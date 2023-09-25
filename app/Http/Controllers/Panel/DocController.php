<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


use PhpOffice\PhpWord\Element\AbstractContainer;
use PhpOffice\PhpWord\Element\Text;
use PhpOffice\PhpWord\IOFactory;
class DocController extends Controller
{
    public function index(Request $request){
        return view('panel.dashboard');
    }

    public function create(Request $request){
        return view('panel.dashboard');
    }

    public function store(Request $request){
        return view('panel.dashboard');
    }

    public function edit(Request $request){
        return view('panel.dashboard');
    }

    public function update(Request $request){
        return view('panel.dashboard');
    }

}
