<!DOCTYPE html>
<html>
<head>
    <title>Larave Generate Invoice PDF </title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;
    }
    .w-85{
        width:85%;
    }
    .w-15{
        width:15%;
    }
    .logo img{
        width:45px;
        height:45px;
        padding-top:30px;
    }
    .logo span{
        margin-left:8px;
        top:19px;
        position: absolute;
        font-weight: bold;
        font-size:25px;
    }

    .gray-color{

        color:#5D5D5D;

    }

    .text-bold{

        font-weight: bold;

    }

    .border{

        border:1px solid black;

    }

    table tr,th,td{

        border: 1px solid #d2d2d2;

        border-collapse:collapse;

        padding:7px 8px;

    }

    table tr th{

        background: #F4F4F4;

        font-size:15px;

    }

    table tr td{

        font-size:13px;

    }

    table{

        border-collapse:collapse;

    }

    .box-text p{

        line-height:10px;

    }

    .float-left{

        float:left;

    }

    .total-part{

        font-size:16px;

        line-height:12px;

    }

    .total-right p{

        padding-right:20px;

    }

</style>

<body>

    <div class="head-title">
        <h1 class="text-center m-0 p-0"> {{ $title }} </h1>
    </div>

    <div class="add-detail mt-10">
        <div class="w-50 float-left mt-10">
            <p class="m-0 pt-5 text-bold w-100">Invoice Id - <span class="gray-color">#{{ $invoice_id }}</span></p>
            <p class="m-0 pt-5 text-bold w-100">Order Id - <span class="gray-color">{{ $order_id }}</span></p>
            <p class="m-0 pt-5 text-bold w-100">Order Date - <span class="gray-color">{{ $date }}</span></p>
        </div>
        <div style="clear: both;"></div>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">To</th>
                <th class="w-50"> Service Engineer Detail </th>
            </tr>
            <tr>
                <td>
                    <div class="box-text">
                        <p> {{ $address }}
                        <p>Contact : {{$phoneno}}</p>
                    </div>
                </td>
                <td>
                    <div class="box-text">
                        <p>First Name : {{ isset($service_engineer->first_name)?$service_engineer->first_name:'---' }} </p>
                        <p>Last Name : {{ isset($service_engineer->last_name)?$service_engineer->last_name:'---' }} </p>
                        <p>Email : {{ isset($service_engineer->email)?$service_engineer->email:'---' }} </p>
                        <p>Phone : {{ isset($service_engineer->phone)?$service_engineer->phone:'---' }} </p>
                    </div>
                </td>
            </tr>
        </table>

    </div>

    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">Payment Method</th>
                <th class="w-50">Shipping Method</th>
            </tr>
            <tr>
                <td>
                    @if ($payment_type == 1 )
                        Phonepe
                    @elseif ( $payment_type == 2 )
                        Online other Mode
                    @else
                        Cash
                    @endif
                </td>
                <td> Shipping - {{ $shipping }}</td>
            </tr>
        </table>
    </div>

    <div class="table-section bill-tbl w-100 mt-10">

        <table class="table w-100 mt-10">

            <tr>
                <th class="w-50">S.no</th>
                <th class="w-50">Name</th>
                <th class="w-50">Qty</th>
                <th class="w-50">Price</th>
                <th class="w-50">Subtotal</th>
                <th class="w-50">Tax Amount</th>
                <th class="w-50">Grand Total</th>
            </tr>
            @php
                $total_subamount = 0;
                $total_taxamount = 0;
                $final_amount = 0;
            @endphp
            @if ($invoicesItem)
                @foreach ( $invoicesItem  as $key =>$item )
                    <tr align="center">
                        <td>{{ $key + 1 }} </td>
                        <td>{{ $item->item }} </td>
                        <td>{{ $item->qty }}</td>
                        <td>Rs.{{ $item->amount }}</td>
                        <td>Rs.{{ $item->sub_total }}</td>
                        <td>Rs.{{ $item->tax_total }}</td>
                        <td>Rs.{{ $item->grand_total }}</td>
                    </tr>
                    @php
                        $total_subamount = $total_subamount + $item->sub_total;
                        $total_taxamount = $total_taxamount + $item->tax_total;
                        $final_amount    = $final_amount + $item->grand_total;
                    @endphp
                @endforeach
            @endif

            <tr>
                <td colspan="7">
                    <div class="total-part">
                        <div class="total-left w-85 float-left" align="right">
                            <p>Sub Total</p>
                            <p>Tax (18%)</p>
                            <p>Total Payable</p>
                        </div>
                        <div class="total-right w-15 float-left text-bold" align="right">
                            <p>Rs.{{ $total_subamount }}</p>
                            <p>Rs.{{ $total_taxamount }}</p>
                            <p>Rs.{{ $final_amount }} </p>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    </html>
