@extends('layout.main')

@section('content')

<div id="about" class="container-fluid" style="margin:10% auto;">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3"></div>
            <div class="col-md-6 jumbotron">
                <h1 class="text-center"> Login </h1><br>

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


                {!! Form::open(['route'=>['login.validate'], 'method' => 'POST', 'class'=> 'form-horizontal loginForm', 'id'=>'loginForm' ]) !!}
                    {!! Form::token() !!}
                    @csrf
                    <div class="form-group">
                        {!! Form::label('email', 'Email', [ 'class' => 'control-label col-sm-2' , 'for' => "email" ] ); !!}
                        <div class="col-sm-10">
                            {!! Form::email('email', '',[ 'class' => "form-control", 'id'=>"email", 'placeholder'=>"Enter email",'required' => 'required' ]); !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'Password', [ 'class' => 'control-label col-sm-2' , 'for' => "pwd" ] ); !!}
                        <div class="col-sm-10">
                            {!! Form::password('password', [ 'class' => "form-control", 'id'=>"pwd", 'placeholder'=>"Enter password",'required' => 'required' ]); !!}
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-danger  btn-lg">Submit</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
  </div>
@endsection
