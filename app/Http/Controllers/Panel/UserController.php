<?php

namespace App\Http\Controllers\Panel;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


use PhpOffice\PhpWord\Element\AbstractContainer;
use PhpOffice\PhpWord\Element\Text;
use PhpOffice\PhpWord\IOFactory;
class UserController extends Controller
{
    public function index(Request $request){

        $users = User::with(['role'])
            ->orderBy('created_at','desc')
            ->get();

        //var_dump($users->role());
        //dump($user->role->name);
        //dd($user->role->name);
        return view('panel.users.index', compact('users'));
    }
}
