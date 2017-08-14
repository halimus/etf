@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title" id="business-info"><u>Users:</u>
                <span class="right-menu"><a href="{{ url('/users/create')}}"><i class="fa fa-plus-circle"></i> New User</a></span>
            </h3> 
        </div>
        
        <div class="col-md-12">
            
            @if(count($users))
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)    
                    <tr>
                        <td>{{ $user->user_id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ Carbon\Carbon::parse($user->created_at)->format('m/d/Y H:m:s') }}</td>
                        <td>{{ Carbon\Carbon::parse($user->updated_at)->format('m/d/Y H:m:s') }}</td>
                        <td>
                            <a href="{{ url("users/$user->user_id/edit")}}" class="btn btn-info" role="button">edit</a>
                        </td>
                        <td>
                            {{ Form::open(array('url' => 'users/' . $user->user_id)) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('delete', array('class' => 'btn btn-danger')) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                    @endforeach   
                </tbody>
            </table>
            @else
                <div class="errors alert alert-warning alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <p>No users in the Database</p>
                </div>
            @endif
            
            
            
            <div class="col-xs-12 table-responsive">
                
                
                
                <table class="stripe hover row-border- cell-border order-column table" id="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            
        </div>
        
    </div>
</div>
@endsection
