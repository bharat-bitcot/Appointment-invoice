@extends('layout.main')

@section('content')
<div id="complaint" class="container-fluid" style="margin:2% auto;">
    <div class="row">
        <div class="col-md-12 jumbotron">
            <h1> Register Complaint </h1>
            <a href="{{ route('dashboard') }}" class="btn btn-info btn-lg pull-right" > Back </a>
            <div class="col-md-12">



                <div class="col-md-2">
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

                    {!! Form::open(['route'=>['save.complaint'], 'method' => 'POST', 'class'=> 'form-horizontal registerComplaint', 'id'=>'registerComplaint' ]) !!}
                        @csrf

                        <div class="form-group">
                            {!! Form::label('title', 'Name', [ 'class' => 'control-label col-sm-2' , 'for' => "title" ] ); !!}
                            <div class="col-sm-10">
                                {!! Form::text('title', '',[ 'class' => "form-control", 'id'=>"title", 'placeholder'=>"Enter Name",'required' => 'required' ]); !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description', [ 'class' => 'control-label col-sm-2' , 'for' => "description" ] ); !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('description', '',[ 'class' => "form-control", 'id'=>"description", 'placeholder'=>"Enter full description",'required' => 'required', 'rows' => 5 , 'cols' => 5 ]); !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('condition_type', 'Product Condition', [ 'class' => 'control-label col-sm-2' , 'for' => "condition_type" ] ); !!}
                            <div class="col-sm-10">
                                {!! Form::select('condition_type', ['0' => 'Old', '1' => 'New' ], null, ['class' => 'form-control','id' => 'condition_type','required' => 'required' ]) !!}
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-danger  btn-lg">Submit</button>
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
                <div class="col-md-2">
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
