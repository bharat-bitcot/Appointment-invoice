<?php

namespace App\Http\Controllers;

use App\Http\Requests\Complaint\AddComplaintRequest;
use App\Models\complaint;
use App\Models\invoice;
use App\Models\manageServiceEngineer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class complaintController extends Controller
{

    /**
     * create a new complaint
     *
     * @param AddComplaintRequest $request
     *
     * @returen view
     */
    public function create( AddComplaintRequest $request ) {

        DB::beginTransaction();
        try {

            //build array
            $input = [
                'user_id'       => auth()->user()->id,
                'title'         => $request['title'],
                'description'   => $request['description'],
                'condition_type'=> (int)$request['condition_type'],
                'status'        => 0,
            ];

            //create new complaint
            complaint::create($input);

            DB::commit();

            //response
            return redirect()->route('add.complaint')->with('success','Your complaint has been registered');

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

            //get current user id
            $userId = Auth::id();

            //get all detail by user id
            $currentuser = User::find( $userId );

            $complaint = complaint::find($id);


            //get assign service engineer
            $getComplaintAssignData = manageServiceEngineer::with(['user'])->where('complaint_id',$id)->first();
            $service_engineers = '';
            if( !$getComplaintAssignData ) {
                $service_engineers = User::where('role_id',4)->pluck('first_name','id');
            }


            //get Invoice detail
            $getInvoiceData = invoice::with(['invoicesItem'])->where('complaint_id',$id)->get();




            //display Complain view
            return view('complaints.complaintShow', [ 'users' => $currentuser , 'role_id' => $currentuser->role_id, 'complaint' => $complaint, 'is_assign_service_engineer' => $getComplaintAssignData , 'service_engineer_lists' => $service_engineers , 'invoices' => $getInvoiceData  ]);
        }
        return redirect("login");
    }


    /**
     * Assign complaint into Service Engineer
     *
     * @param Request $request
     *
     * @returen view
     */
    public function assignServiceEngineer( Request $request, $id ) {
        DB::beginTransaction();
        try {

            $complaint = complaint::find($id);

            if( $complaint ) {

                $input = [
                    'user_id' => $request->service_engineer,
                    'complaint_id' => $id
                ];

                manageServiceEngineer::create($input);
            }

            DB::commit();

            return redirect()->route('view.complaint',['id' => $id])->with('success','Successfully has been assigned engineer');


        }catch ( \Exception $e ) {

            DB::rollback();
            return redirect()->back()->with([
                'alert-type' => 'error',
                'message'    => $e->getMessage()
            ]);
        }
    }

    /**
     * Update In progess status
     *
     * @param Request $request
     * @return redirect
     */
    public function UpdateInprogressComplaintStatus(Request $request, $id) {
        DB::beginTransaction();
        try {

            $complaint = complaint::find($id);

            //get current user id
            $userId = Auth::id();

            //check the assign the service engineer or not
            $manageServiceEngineer = manageServiceEngineer::where([ 'user_id' => $userId, 'complaint_id' => $id ] )->first();

            if( $complaint && $manageServiceEngineer ) {

                $input = [
                    'status' => 1
                ];

                complaint::updateOrCreate(['id' => $id ],$input);
            }

            DB::commit();

            return redirect()->route('view.complaint',['id' => $id])->with('success','Successfully has been updated status');


        }catch ( \Exception $e ) {

            DB::rollback();
            return redirect()->back()->with([
                'alert-type' => 'error',
                'message'    => $e->getMessage()
            ]);
        }
    }
}
