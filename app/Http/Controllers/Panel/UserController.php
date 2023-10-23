<?php

namespace App\Http\Controllers\Panel;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{

    public function __construct(){
        $this->rules = [
            'name'       => 'required',
            'last_name'  => 'required',
            //'avatar'     => 'required|mimes:jpg,jpeg,png|max:2048',
            'password'   => 'same:confirm-password',
        ];
        $this->messages = [

        ];
    }

    public function index(Request $request){

        $users = User::with(['role'])
            ->orderBy('created_at','desc')
            ->get();

        //var_dump($users->role());
        //dump($user->role->name);
        //dd($user->role->name);
        return view('panel.users.index', compact('users'));
    }

    public function edit(Request $request, User $user){
        $roles   = Role::all();

        return view('panel.users.edit', compact('user','roles'));

    }

    public function update(Request $request, User $user){

        //dd($user);

        $this->rules['email']           = 'required|email|unique:users,email,' . $user->id;
        Validator::make($request->all(), $this->rules, $this->messages)->validate();

        $updateArr = [
            'name'      => $request->name,
            'last_name' => $request->last_name,
            'email'     => $request->email,
            'mobile'    => preg_replace("/[\s-]+/", "", $request->mobile),
        ];

        // Change password if it is filled
        if ($request->filled('password')) {
            $request->request->add([
                'password' => Hash::make($request->password),
            ]);
            $updateArr['password'] = $request->password;
        } else {
            $request->request->remove('password');
        }

        $path = null;
        if ($request->hasFile('avatar')) {
            if ($request->file('avatar')->isValid()) {

                $makedName = $request->name . time().".".$request->file('avatar')->extension();
                $path = $request->file('avatar')->storeAs('avatar', $makedName, 'public');
                Image::make(Storage::disk('public')->path($path))->fit(300, 300)->save(null, 100);

                //remove old file
                if ($user->avatar){
                    Storage::disk('public')->delete($user->avatar);
                }
                $updateArr['avatar'] = $path;
            }
        }



        //dd($updateArr);

        $user->update($updateArr);
        return redirect()->back()
            ->withSuccess('Kontent yeniləndi');

    }
}
