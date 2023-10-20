<?php

namespace App\Http\Controllers\Panel\Auth;

use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


use PhpOffice\PhpWord\Element\AbstractContainer;
use PhpOffice\PhpWord\Element\Text;
use PhpOffice\PhpWord\IOFactory;
class LoginController extends Controller
{

    public function __construct(){
        $this->rules = [

        ];
    }
    public function showLoginForm(Request $request){

        return view('panel.auth.login');
    }



}
