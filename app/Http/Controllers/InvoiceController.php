<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\complaint;
use App\Models\invoice;
use App\Models\invoicesItem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * create a new complaint
     *
     * @param Request $request
     *
     * @returen view
     */
    public function create( Request $request , $id ) {
        if( Auth::check() ) {

            //get current user id
            $userId = Auth::id();

            //get all detail by user id
            $currentuser = User::find( $userId );

            //get complaints
            $complaint = complaint::find($id);

            if( $complaint ) {

                //display create invoice view
                return view('invoices.createInvoiceForm', [ 'users' => $currentuser , 'role_id' => $currentuser->role_id, 'complaint' => $complaint ]);

            }

        }
        return redirect("login");
    }

     /**
     * create a new complaint
     *
     * @param Request $request
     *
     * @returen view
     */
    public function save( Request $request, $id ) {


        DB::beginTransaction();
        try {


            $params = $request->all();

            //Generate a random string.
            $token = openssl_random_pseudo_bytes(4);

            //Convert the binary data into hexadecimal representation.
            $token = bin2hex($token);

            //build array
            $input = [
                'generate_id'                       => $token,
                'manage_service_engineer_id'        => auth()->user()->id,
                'complaint_id'                      => $id,
                'address'                           => $request['address'],
                'phoneno'                           => $request['phone'],
                'payment_type'                      => $request['payment_type'],
            ];

            //create new complaint
            $invoice = invoice::create($input);

            if( isset( $invoice->id ) && $invoice->id > 0 ) {




                $countItem = isset( $request['item'] ) ? count( $request['item'] ) : 0;

                $item  = isset( $params['item'] ) ? $params['item']  : [];
                $price = isset( $params['price'] ) ? $params['price']: [];
                $qty   = isset( $params['qty'] ) ? $params['qty']  : [];

                for($i=0; $i< $countItem; $i++) {

                    $sub_total = $price[$i] * $qty[$i];
                    $tax_total = $sub_total * ( 18 / 100 );
                    $grand_total = $sub_total + $tax_total;

                    $inputParam = [
                        'invoice_id'  => $invoice->id,
                        'item'        => $item[$i],
                        'qty'         => $qty[$i],
                        'amount'      => $price[$i],
                        'sub_total'   => $sub_total,
                        'tax_total'   => $tax_total,
                        'grand_total' => $grand_total
                    ];

                    invoicesItem::create($inputParam);
                }

                DB::commit();

            }



            //response
            return redirect()->route('view.complaint',[ 'id' => $id ])->with('success','Successfully has been generated invoice');

        }catch ( \Exception $e ) {

            DB::rollback();
            return redirect()->back()->with([
                'alert-type' => 'error',
                'failure'    => $e->getMessage()
            ]);
        }
    }
}
