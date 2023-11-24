<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Role;
use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Validator;
class HomeController extends Controller
{

    public function index(Request $request){

//        dd(storage_path('app/public'));

//        Artisan::call('storage:link');
//        dd(Artisan::output());

        $slider = Slider::query()->first();
        $testimonials = Testimonial::query()->latest()->limit(5)->get();


        //dd($slider);

        return view('front.home',compact('slider','testimonials'));
    }

}
