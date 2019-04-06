@extends('admin.layouts.layout')
@section('title')
  Edit User Information
@endsection
@section('content')
{!! Form::open(['action' => ['Dashboard\UserController@update',$user->id],'method' => 'PATCH']) !!}
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update</div>
                    <div class="panel-body">

    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', $user->name,['class' => 'form-control','placeholder'=>'Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('email', 'Email')}}
        {{Form::text('email', $user->email ,['class' => 'form-control','placeholder'=>'Email'])}}
    </div>









    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}



                    </div>
                </div>
            </div>
        </div>
</div>


{!! Form::close() !!}
@endsection
