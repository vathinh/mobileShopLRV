<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\product;
use Illuminate\Support\Facades\Validator;

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
        $products = Product::all();
        return view('newWelcome', compact('products'));
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

    public function userDB() {
        return view('userDB.userDB');
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


    //View user
    public function userDetails($id) {
        $rs = User::find($id);
        return view('userDB.userViewDetails',['rs' => $rs]);
    }



    public function userDetailsUpdate(Request $rqst) {

       
        // $name   = $rqst -> input('txtName');
        // $surname   = $rqst -> input('txtSurname');
        // $address   = $rqst -> input('txtAddress');
        // $phone   = $rqst -> input('txtPhone');
        // $email   = $rqst -> input('txtEmail');

        $rqst->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'integer', 'min:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);
      
        
        User::whereId(auth()->user()->id)->update([
           
                // 'name'          => $name,
                // 'surname'          => $surname,
                'name' => $rqst->name,
                'surname' => $rqst->surname,
                'address' =>$rqst->address,
                'phone' =>$rqst->phone,
                'email' => $rqst->email
               

            ]);
            return redirect() -> action('HomeController@userDetails',auth()->user()->id);
    }

    public function changePassword() {
    
        return view('userDB.change-password');
    }

    public function updatePassword(Request $request)
{
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
}

}
