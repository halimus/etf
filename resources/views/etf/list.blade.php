@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title" id="business-info"><u>ETFs:</u></h3> 
        </div>

        <div class="col-md-12">
            @if(count($etfs))
            <table id="datatable" class="table table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created at</th>
                        <th>User</th>
                        <th style="width: 60px">View</th>
                        <th style="width: 60px">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($etfs as $etf)    
                    <tr>
                        <td>{{ $etf->etf_id }}</td>
                        <td>{{ $etf->etf_name }}</td>
                        <td>{{ $etf->description }}</td>
                        <td>{{ Carbon\Carbon::parse($etf->created_at)->format('m/d/Y H:m:s') }}</td>
                        <td>{{ $etf->username }}</td>
                        <td>
                            <a href="{{ url("etf/$etf->etf_id")}}" class="btn btn-info" role="button"><i class="fa fa-bar-chart"></i></a>
                        </td>
                        <td>
                            {{ Form::open(array('url' => 'etf/' . $etf->etf_id)) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::button('<i class="fa fa-trash-o"></i>', ['class' => 'btn btn-danger btn-block', 'type' => 'submit']) }} 
                            {{ Form::close() }}
                        </td>
                    </tr>
                    @endforeach   
                </tbody>
            </table>
            @else
                <div class="errors alert alert-warning alert-dismissable">
                    <p>No ETF in the Database</p>
                </div>
            @endif
        </div>
        
    </div>
</div>
@endsection

