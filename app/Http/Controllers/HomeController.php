<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userHome()
    {
        return view('userDB.userDB',["msg"=>"Hello! I am user"]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editorHome()
    {
        return view('home',["msg"=>"Hello! I am editor"]);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('adminDB.adminDB',["msg"=>"Hello! I am admin"]);
    }

    //1. Read Users
    public function readUser() {
        $rs = User::all();
        return view('adminUser.readUser')->with(['rs' => $rs]);
    }

    //2 Create Users
    public function createUser() {
        return view('adminUser.createUser');
    }

    public function createUserProc(Request $rqst) {
        $id          = $rqst -> input('txtID');
        $name        = $rqst -> input('txtName');
        $email       = $rqst -> input('txtEmail');
        $password    = $rqst -> input('txtPwd');
        User::create([
            'id'        => $id,
            'name'      => $name,
            'email'     => $email,
            'password'  => Hash::make($password)
        ]);

        return redirect() -> action('HomeController@readUser');

    }

    //3. Update Users

    public function updateUser($id) {
        $rs = User::find($id);
        return view('adminUser.updateUser',['rs' => $rs]);

    }

    public function updateUserProc(Request $rqst, $id) {
        $email   = $rqst -> input('txtEmail');
        $name   = $rqst -> input('txtName');
        $password   = $rqst -> input('txtPwd');
        User::where('ID', $id)
            -> update([
                'email'         => $email,
                'name'          => $name

            ]);
        return redirect() -> action('HomeController@readUser');
    }

    // 4 Delete 
    
    public function deleteUser($id) {
        User::where('ID', $id) -> delete();
        return redirect() -> action('HomeController@readUser');

    }

    //5 Reset Password
    public function resetPwd($id) {
        $password = "12345678";
        User::where('ID', $id) ->update(array(
            'password' => Hash::make($password)
        ));
        return redirect() -> action('HomeController@readUser')->with('success','Password has changed successfully to 12345678');
    }



}
