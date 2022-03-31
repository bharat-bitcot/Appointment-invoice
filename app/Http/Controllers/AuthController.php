<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginUserRequest;
use App\Http\Requests\User\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Validate Login Process
     *
     * @param LoginUserRequest $request
     *
     * @return redirect
     */
    public function validateLogin(LoginUserRequest $request) {

        //dd( $request );
        try {

            //get params
            $email  = isset( $request->email ) ? $request->email : '';
            $password  = isset( $request->password ) ? $request->password : '';

            //build condition
            $whereCondition = [
                'email' => $email,
                'status' => 1
            ];

            //check user existing or not
            $userExist = User::where( $whereCondition )->first();

            $credentials = $request->only('email', 'password');

            if( $userExist && Hash::check( $password, $userExist->password ) ) {
                if (Auth::attempt($credentials)) {
                    return redirect()->intended('dashboard')->withSuccess('Signed in');
                }
            }

            return redirect("login")->with('failure','Invalid details');

        }catch ( \Exception $e ) {
            echo $e->getMessage();
        }
    }

    /**
     * Logout Process
     *
     * @param void
     *
     * @return redirect
     */
    public function logout() {
        Auth::logout();
        return redirect('login')->with('success', 'You have been successfully logged out!');
    }

    /**
     * register Process
     *
     * @param request
     *
     * @return redirect
     */
    public function create(RegisterUserRequest $request) {

        //build array
        $input = [
            'first_name' => $request['first_name'],
            'last_name'  => $request['last_name'],
            'email'      => $request['email'],
            'password'   => bcrypt( $request['password'] ),
            'role_id'    => $request['user_type'] ? $request['user_type'] : 5,
            'status'    => 1,
        ];

        //create new user

        $user = User::create($input);

        auth()->login($user);

        return redirect()->intended('dashboard')->withSuccess('Signed in');
    }


}
