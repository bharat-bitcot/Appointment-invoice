@extends('layout.main')

@section('content')
<div id="dashboard" class="container-fluid" style="margin:5% auto;">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-2">
                @include('layout.nav',['role_id'=> $role_id ,'first_name' => $users->first_name ])
            </div>
            <div class="col-md-10 jumbotron">
            </div>
        </div>
    </div>
</div>
@endsection

