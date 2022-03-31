@extends('layout.main')

@section('content')
<div id="complaint" class="container-fluid" style="margin:2% auto;">
    <div class="row">
        <div class="col-md-12 jumbotron">
            <h1> Register Complaint </h1>
            <a href="{{ route('dashboard') }}" class="btn btn-info btn-lg pull-right" > Back </a>
            <div class="col-md-12">

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

                {!! Form::open(['route'=>['register.save'], 'method' => 'POST', 'class'=> 'form-horizontal registerForm', 'id'=>'registerForm' ]) !!}
                    {!! Form::token() !!}
                    @csrf
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@endsection
