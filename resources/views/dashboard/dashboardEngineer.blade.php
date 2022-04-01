@extends('layout.main')

@section('content')
<div id="dashboard" class="container-fluid" style="margin:2% auto;">
    <div class="row">
        <div class="col-md-12 jumbotron">
            <h1> Complaint Lists </h1>
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th> Complaint Name </th>
                        <th> Complaint Status </th>
                        <th> Action </th>
                    </tr>
                    </thead>
                    <tbody>
                        @isset( $complaints )

                            @foreach ( $complaints as  $complaint)
                                <tr>
                                    <td>{{ $complaint->complaint->title }} </td>
                                    <td>
                                        @if ( $complaint->complaint->status == 2 )
                                            <span class="text-success"> Completed </span>
                                        @elseif ( $complaint->complaint->status == 1 )
                                            <span class="text-danger"> In Progress </span>
                                        @else
                                            <span class="text-info"> Pending </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href='{{ route('view.complaint', $complaint->complaint->id ) }}' class="" > View </a>
                                    </td>
                                </tr>
                            @endforeach

                        @endisset

                    </tbody>
                </table>
                <div class="text-right">
                    {{ $complaints->appends($_GET)->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

