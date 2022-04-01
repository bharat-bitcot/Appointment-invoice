<?php

namespace App\Http\Controllers;

use App\Models\complaint;
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
        if( isset( $currentuser ) &&  $currentuser->role_id == 5 ) {

            //get all complain by user id
            $complaints = complaint::where('user_id',$userId)->paginate(10);

        }elseif( isset( $currentuser ) &&  $currentuser->role_id == 4 ) {

        }elseif( isset( $currentuser ) &&  $currentuser->role_id == 3 ) {

            //get all complain
            $complaints = complaint::orderBy('id','DESC')->paginate(10);
        }

        //display dashboard view
        return view('dashboard.dashboard', [ 'users' => $currentuser , 'role_id' => $currentuser->role_id, 'complaints' => $complaints ]);

    }
}
