<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Dashboard based on role
     *
     * @param
     *
     * @return view dashbaord
     */
    public function index() {

        //get current user id
        $userId = Auth::id();

        //get all detail by user id
        $currentuser = User::find( $userId );

        // check the conditionn
        if( $currentuser  ) {

            //display dashboard view
            return view('dashboard', [ 'users' => $currentuser , 'role_id' => $currentuser->role_id ]);

        }

    }
}
