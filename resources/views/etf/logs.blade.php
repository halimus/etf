@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title" id="business-info"><u>Logs:</u></h3> 
        </div>

        <div class="col-md-12">
            @if(count($logs))
            <table id="datatable" class="table table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Symbol</th>
                        <th>Created at</th>
                        <th>IP Address</th>
                        <th>User</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $log)    
                    <tr>
                        <td>{{ $log->log_id }}</td>
                        <td>{{ $log->symbol }}</td> 
                        <td>{{ Carbon\Carbon::parse($log->created_at)->format('m/d/Y H:m:s') }}</td>
                        <td>{{ $log->ip_address }}</td>
                        <td>{{ $log->username }}</td>
                    </tr>
                    @endforeach   
                </tbody>
            </table>
            @else
                <div class="errors alert alert-warning alert-dismissable">
                    <p>No Logs in the Database</p>
                </div>
            @endif
        </div>
        
    </div>
</div>
@endsection


