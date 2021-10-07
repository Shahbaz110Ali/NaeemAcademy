<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('User.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::guard('web')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            if(Session::has("redirect")){
                $route = Session::get("redirect")['route'];
                $slug = Session::get("redirect")['id'];
                Session::forget("redirect");
                return redirect(route($route,$slug));
            }else{
                return redirect()->intended('user');
            }
            
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function redirect_to(){
        $id = explode("/",URL::previous())[count(explode("/",URL::previous()))-1];
        $route = app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();
        $url = [
            'id'=>$id,
            'route'=>$route,
        ];
        Session::put("redirect",$url);
        return redirect(route("user.login"));
       
    }

    public function register(){
        return view("User.register");
    }

    public function create(Request $request){
        $controls = $request->all();
        $rules = [
            "name"=> "required",
            "email" =>  "required|email|unique:users",
            "password" =>  "required|min:3",
            "contact" =>  "nullable|numeric",
        ];
        $validator = Validator::make($controls,$rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $data = [
                "name"=> $controls['name'],
                "email" =>  $controls['email'],
                "password" =>  bcrypt($controls['password']),
                "contact" =>  $controls['contact'],
                "referral_id"=>"",
                "referred_by"=>"",
            ];
            $user = User::create($data);
            if($user->id){
                $credentials = ['email'=>$controls['email'],'password'=>$controls['password']];
                if (Auth::guard('web')->attempt($credentials, $request->remember)) {
                    $request->session()->regenerate();

                    if(Session::has("redirect")){
                        $route = Session::get("redirect")['route'];
                        $slug = Session::get("redirect")['id'];
                        Session::forget("redirect");
                        return redirect(route($route,$slug));
                    }else{
                        return redirect()->intended('user');
                    }
                    
                }
            }

        }

    }

   
}
