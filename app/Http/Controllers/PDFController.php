<?php

namespace App\Http\Controllers;

use App\Models\invoice;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */

    public function generateInvoicePDF( $id ){

        $users = User::get();

        $invoice = invoice::with(['user','invoicesItem'])->where('id',$id)->first();

        if( $invoice ){
            $data = [
                'title'         => 'Generate Invoice',
                'date'          => date('m/d/Y'),
                'invoice_id'    => $invoice->id,
                'order_id'      => $invoice->generate_id,
                'address'       => $invoice->address,
                'phoneno'       => $invoice->phoneno,
                'shipping'      => $invoice->shipping,
                'payment_status'=> $invoice->payment_status,
                'payment_type'  => $invoice->payment_type,
                'service_engineer' => $invoice->user,
                'invoicesItem'  => $invoice->invoicesItem,
            ];

            $pdf = PDF::loadView('myPDF',$data);

            return $pdf->download('invoices.pdf');
        }
        return redirect("login");

    }

}
