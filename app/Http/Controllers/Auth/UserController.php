<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function register(){
        return view('auth.register');
    }

    public function login(){
        return view('auth.login');
    }

    public function editprofile(){
        return view('auth.editprofile');
    }

    public function logout(){

        auth()->logout();
        return redirect('/login');

    }

    //to store (register) new user into database.
    public function store(Request $request){

        //we can access all of the form input fields by using $request->name (here name is the name given to input field in the form)

        //these validate rules are provided by php and we can check which one to apply in thier documentation
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);

        try{
            $result = DB::insert('insert into users (name, email, password) values (?, ?, ?)', [$request->name, $request->email, Hash::make($request->password)]);
        }
        catch(Exception $e) {
            // dd($e->getMessage());
            return back()->with('error', 'This email has already been Registered')->withInput();
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password,])){
            return redirect('/');
        }
        else{
            return redirect('/register');
        }

    }


    //match (during sign in) user from database
    public function match(Request $request){

        // dd('here');
        $this->validate($request, [

            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);



        // attempt to login using php auth
        $attempt = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // dd($attempt);

        if($attempt){
            return redirect('/');
        }
        else{
            return redirect('/login')->with('error', 'Email or Password Incorrect')->withInput();
        }


    }


    public function update(Request $request){

        // dd($request->only('name', 'country', 'overview', 'discription', 'cover_imageurl', 'imageurl'));

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);


        try{

            DB::table('users')
              ->where('id', auth()->user()->id)
              ->update(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                ]);

                return back()->with('message', 'Profile Updated Successfully');

        }

        catch(Exception $e) {
            // dd($e->getMessage());
            return back()->with('message', 'Error Updating Profile')->withInput();
        }


    }



}
