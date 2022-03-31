<?php

namespace App\Http\Controllers;

use App\Http\Requests\Complaint\AddComplaintRequest;
use App\Models\complaint;
use Illuminate\Http\Request;
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
}
