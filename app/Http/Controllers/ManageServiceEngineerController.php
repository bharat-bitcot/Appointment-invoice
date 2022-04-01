<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\RegisterUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ManageServiceEngineerController extends Controller
{

    /**
     * Display all service engineer Lists
     *
     * @param
     *
     * @return view
     */
    public function index() {

        $users = User::where('role_id',4)->paginate(10);

        //display dashboard view
        return view('engineer.serviceEngineerLists', [ 'users' => $users ]);

    }

   /**
     * register Process
     *
     * @param request
     *
     * @return redirect
     */
    public function create(RegisterUserRequest $request) {
        DB::beginTransaction();
        try {

            //build array
            $input = [
                'first_name' => $request['first_name'],
                'last_name'  => $request['last_name'],
                'email'      => $request['email'],
                'password'   => bcrypt( $request['password'] ),
                'role_id'    => 4,
                'status'     => 1,
            ];

            //create new user

            User::create($input);

            DB::commit();


            return redirect()->route('register.serviceEngineer')->with('success','Successfully Register Service Engineer in the Invoice Demo');

        }catch ( \Exception $e ) {

            DB::rollback();
            return redirect()->back()->with([
                'alert-type' => 'error',
                'message'    => $e->getMessage()
            ]);
        }
    }

     /**
     * show complaint detail
     *
     * @param Request $request
     *
     * @returen view
     */
    public function show( Request $request, $id ) {
        if( Auth::check() ) {

            $user = User::find($id);

            //display Complain view
            return view('engineer.serviceEngineerShow', [ 'user' => $user ]);
        }
        return redirect("login");
    }

}
