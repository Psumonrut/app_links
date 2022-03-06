<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Menu;
use App\Http\Controllers\RolesController;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    /* protected function create(array $data)
     {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
             'role'=>2,
            'password' => Hash::make($data['password']),
        ]);
   }*/

   protected function register(Request $request){
     
         $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
         ]);


         $user = new User();
         $user->name = $request->name;
         $user->email = $request->email;
         $user->role = 2;
         $user->password = Hash::make($request->password);

         if( $user->save() ){
            return redirect()->back()->with('success','You are now successfully registerd');
         }else{
             return redirect()->back()->with('error','Failed to register');
         }

    }

    public function index (){
       $menus = Menu::where('role_code',0)->get();
       $role = new RolesController;
       $roles = ($role->checkRoles());
        $user = ($role->getUsers());
       $currentPath = Route::getFacadeRoot()->current()->uri();
       return view('auth.register',compact('menus','roles','currentPath','user'));

    }


}
