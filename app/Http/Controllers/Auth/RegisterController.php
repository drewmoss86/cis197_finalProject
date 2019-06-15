<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Admin;
use App\CimtUser;
use App\ResourceProvider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Foundation\Auth\RegistersUsers;

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

  // use RegistersUsers;

  /**
   * Where to redirect users after registration.
   *
   * @var string
   */
  protected $redirectTo = 'main';

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('guest');
  }

  //overload showRegistrationForm
  public function showRegistrationForm() {
    return view('/auth/register');
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
      'username' => ['required', 'string', 'min:1', 'max:255', 'unique:user'],
      'password' => ['required', 'string', 'min:5', 'confirmed'],
      'user_icon' => ['image', 'max:20000'],
    ]);
  }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return \App\User
   */
  // protected function create(array $data)
  protected function register(Request $request)
  {

    //handle image Upload
    if($request->hasFile('user_icon')) {
      //need to make filenames unique

      //grab entire file name
      $filenameWithExt = $request->file('user_icon')->getClientOriginalName();
      //extract just the filenames
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
      //extract just the uopz_ext
      $ext = $request->file('user_icon')->getClientOriginalExtension();
      //new filename to store into db adds timestamp
      $filenameToSave = $filename.'_'.time().'.'.$ext;
      //upload image (need to symlink storage)
      $path = $request->file('user_icon')->storeAs('public/img', $filenameToSave);
    } else {
      $default_icon = "noimage.jpg";
    }
    //create user
    $user = new User();
    //grab filled values from registration view
    $email = $request->input('email');
    $phone = $request->input('phone');
    $address = $request->input('address');

    if($request->hasFile('user_icon')) {
      $user->user_icon = $filenameToSave;
    } else {
      $user->user_icon = $default_icon;
    }


    $user_type = $request->input('user_type');
    $user->name = $request->input('name');
    $user->username = $request->input('username');
    $user->password = Hash::make($request->input('password'));

    //simple username input validation, but not dynamic -- will need to use javascript/ajax
    if(User::where('username', '=', $user->username)->exists()) {
      echo "taken";
      $request->session()->flash('err', 'Username already exists, please try again');
      return redirect('register');
    }

    //save to user table
    $user->save();

    if($user_type == 'admin') {
      $admin = new Admin();
      $admin->user_id = $user->user_id;
      $admin->email = $email;
      $admin->save();
    }
    if($user_type == 'cimtUser') {
      $cimtUser = new CimtUser();
      $cimtUser->user_id = $user->user_id;
      $cimtUser->phone = $phone;
      $cimtUser->save();
    }
    if($user_type == 'resourceProvider') {
      $resourceProvider = new ResourceProvider();
      $resourceProvider->user_id = $user->user_id;
      $resourceProvider->address = $address;
      $resourceProvider->save();
    }

    $request->session()->flash('success', 'User Created Successfully!');
    return view('custom/login');

  }
}
