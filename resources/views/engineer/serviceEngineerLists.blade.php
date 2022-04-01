@extends('layout.main')

@section('content')
<div id="service-engineer-lists" class="container-fluid" style="margin:2% auto;">
    <div class="row">
        <div class="col-md-12 jumbotron">

            <h1> Service Engineer Lists
                <a href="{{ route('dashboard') }}" class="btn btn-info pull-right" > Back </a>
            </h1>
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th> Service Engineer Name </th>
                        <th> Service Engineer Email </th>
                        <th> Action </th>
                    </tr>
                    </thead>
                    <tbody>
                        @isset( $users )

                            @foreach ( $users as  $user)
                                <tr>
                                    <td>{{ $user->first_name .' '. $user->last_name }} </td>
                                    <td>
                                        <span class="text-info"> {{ $user->email }} </span>
                                    </td>
                                    <td>
                                        <a href='{{ route('view.serviceEngineer', $user->id ) }}' class="" > View Detail</a>
                                    </td>
                                </tr>
                            @endforeach

                        @endisset

                    </tbody>
                </table>
                <div class="text-right">
                    {{ $users->appends($_GET)->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

