<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator()
    {
        $this->validate($this->request, [
            'firstname' => 'required|max:255',
            'lastname'  =>'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            "phone"      => 'required',
            'password'   => 'required|min:6|confirmed',
            'type'       => 'required|in:2,3',
            "tnc"        => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create()
    {
       //echo config("app.CACHE_DRIVER");die;
        $data = $this->request->except("password");
        $user = new User($data);
        $user->password = bcrypt($this->request->password);
        $user->save();
        $user->attachRole($this->request->type);
        return $user;
    }
    public function registration()
    {

            $this->validator();
        $token = Common::createToken();
        $user = $this->create();
        //$this->sendEmailToVerifyEmailAddress($user, $token);
        
        return redirect()->to($this->redirectTo)->with('data', 'Registration Done');
    }
}
