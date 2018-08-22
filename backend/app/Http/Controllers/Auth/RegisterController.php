<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Jobs\SendVerificationEmail;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'account_type' => [
                'required',
                Rule::in(['student', 'teacher'])
            ]
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'email_token' => md5($data['email'] . " salt ")
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function register(Request $request)
    {
        $input = $request->all();
        $validator = $this->validator($input);

        try {
            $validator->validate();
        } catch (ValidationException $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()->toArray()
                ], 503);
            }

            return view('auth/register')->withErrors($validator);
        }

        $user = $this->create($input);
        $user->assignRole($input['account_type']);
        $user->save();

        event(new Registered($user));
        dispatch(new SendVerificationEmail($user));

        $result = $user;
        $result['roles'] = $user->getRoleNames();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'user' => $result
            ]);
        }

        return view('auth/verification');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function verify(Request $request)
    {
        $validator = Validator::make(['token' => $request->token], [
            'token' => 'required',
        ]);

        if ($validator->fails()) {
            return $request->ajax() ?
                response()->json(['success' => false, 'errors' => ['Пустой код']])
                : view('auth.error', ['error' => 'bad_token'], 503);
        }

        $user = User::where('email_token', $request->token)->first();

        if (is_null($user)) {
            return $request->ajax() ? response()->json([
                'success' => false,
                'errors' => ['Неверный код']])
                : view('auth.error', ['error' => 'no_user']);
        }

        $user->verified = 1;
        $user->email_token = "";

        if ($user->save()) {
            Auth::loginUsingId($user->id);
            //return view('auth.emailconfirm', ['user' => $user]);

            return $request->ajax() ? response()->json([
                'success' => true,
                'user' => $user,
            ]) : redirect('/home');
        }
    }
}