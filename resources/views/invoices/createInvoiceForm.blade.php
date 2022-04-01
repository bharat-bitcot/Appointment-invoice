@extends('layout.main')

@section('content')
<div id="create-invoice" class="container-fluid" style="margin:2% auto;">
    <div class="row">
        <div class="col-md-12 jumbotron">
            <h1> Create Invoice
                <a href="{{ route('view.complaint',['id' => $complaint->id ]) }}" class="btn btn-info btn-lg pull-right" > Back </a>
            </h1>
            <div class="col-md-12">
                <div class="">
                </div>
                <div class="col-md-8">

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $error }}</strong>
                            </div>
                        @endforeach
                    @endif

                    @if(Session::has('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ Session::get('success') }}
                            </div>
                    @endif

                    @if (Session::has('failure'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <p>{{ Session::get('failure') }}</p>
                        </div>
                    @endif

                    {!! Form::open(['route'=>['save.invoice',['id' => $complaint->id ]], 'method' => 'POST', 'class'=> 'form-horizontal saveInvoice', 'id'=>'saveInvoice' ]) !!}
                        @csrf
                        <div class="form-group">
                            {!! Form::label('address', 'Address', [ 'class' => 'control-label col-sm-2' , 'for' => "address" ] ); !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('address', '',[ 'class' => "form-control", 'id'=>"address", 'placeholder'=>"Enter address",'required' => 'required', 'rows' => 5 , 'cols' => 5 ]); !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('phone', 'Phone', [ 'class' => 'control-label col-sm-2' , 'for' => "title" ] ); !!}
                            <div class="col-sm-10">
                                {!! Form::text('phone', '',[ 'class' => "form-control", 'id'=>"phone", 'placeholder'=>"Enter Phone no.",'required' => 'required' ]); !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('payment_type', 'Payment Method', [ 'class' => 'control-label col-sm-2' , 'for' => "payment_type" ] ); !!}
                            <div class="col-sm-10">
                                {!! Form::select('payment_type', ['0' => 'Cash On Delivery', '1' => 'Phonepe', '2' => 'Online Mode' ], null, ['class' => 'form-control','id' => 'payment_type','required' => 'required' ]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('item', 'Item', [ 'class' => 'control-label col-sm-2' , 'for' => "item" ] ); !!}
                            <div class="col-sm-8">
                                {!! Form::text('item[]', '',[ 'class' => "form-control", 'id'=>"item", 'placeholder'=>"Enter item name",'required' => 'required' ]); !!}
                                {!! Form::text('price[]', '',[ 'class' => "form-control", 'id'=>"price", 'placeholder'=>"Enter price",'required' => 'required' ]); !!}
                                {!! Form::number('qty[]', '',[ 'class' => "form-control", 'id'=>"qty", 'placeholder'=>"Enter quantity",'required' => 'required' ]); !!}

                            </div>
                            <div class="col-sm-2">
                                <a href="javascript:void(0);" class="add_button btn btn-success btn-lg" title="Add More Items">
                                    <i class="glyphicon glyphicon-plus-sign"> </i> Add Items
                                </a>
                            </div>
                        </div>
                        <div class="field_wrapper">

                        </div>

                        <div class="form-group text-center">
                            <div class="col-sm-offset-2 col-sm-10">
                                <a href="{{ route('view.complaint',['id' => $complaint->id ]) }}" class="btn btn-info btn-lg" > Back </a>
                                <button type="submit" class="btn btn-danger  btn-lg">Submit</button>
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
