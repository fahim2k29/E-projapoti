<?php

namespace App\Http\Controllers\Customer;

use App\Area;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = 'customer.dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:customer');
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
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm()
    {
        $areas = Area::all();
        return view('frontend.pages.customerRegistration',['areas'=>$areas]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8',
            'password_confirmation' => 'same:password',
            'name' => 'required|min:3',
            'email' => 'required|unique:customers',
            'phone' => 'required|min:11|unique:customers',
            'area' => 'required',
            'address' => 'required',
        ]);


        $customerObj = new Customer();

        $customerObj->name   = $request->name;
        $customerObj->email  = $request->email;
        $customerObj->phone = $request->phone;
        $customerObj->area = $request->area;
        $customerObj->address = $request->address;
        $customerObj->password = Hash::make($request->password);

        $customerObj->save();

        return redirect('/')->with('success','Registration Successfully!');




    }
}
