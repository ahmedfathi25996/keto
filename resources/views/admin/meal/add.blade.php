@extends('admin.layouts.layout')
@section('title')
  Add Meal Disease
@endsection
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<form class="form-horizontal" role="form" method="POST" action="{{ url('/adminpanel/meals') }}" enctype="multipart/form-data">

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Meal</div>
                <div class="panel-body">

                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Meal name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('preparation') ? ' has-error' : '' }}">
                            <label for="preparation" class="col-md-4 control-label">Preparation</label>

                            <div class="col-md-6">
                                <textarea id="preparation" type="text" class="form-control" name="preparation" value="{{ old('description') }}"></textarea>

                                @if ($errors->has('preparation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('preparation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('meal_type') ? ' has-error' : '' }}">
                            <label for="meal_type" class="col-md-4 control-label">Meal_type</label>

                            <div class="col-md-6">
                              {!!Form::select('meal_type',['1'=>'فطار',
                               '2'=>'غداء وعشاء',
                                '3'=>'تحلية',
                             '4'=>'مشروبات'],null,['class'=>'form-control']) !!}

                                    @if ($errors->has('meal_type'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('meal_type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>

                        <div class="form-group{{ $errors->has('calories') ? ' has-error' : '' }}">
                            <label for="calories" class="col-md-4 control-label">calories</label>

                            <div class="col-md-6">
                                <input id="calories" type="text" class="form-control" name="calories" value="{{ old('calories') }}">

                                @if ($errors->has('calories'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('calories') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('ings[]') ? ' has-error' : '' }}">
                            <label for="ings[]" class="col-md-4 control-label">Ingredients</label>

                            <div class="col-md-6">
                              <table class="table table-bordered" id="dynamic_field">
                                 <tr>
                                      <td><input type="text" name="ings[]" placeholder="Enter ingredient name" class="form-control name_list" /></td>
                                      <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                 </tr>
                            </table>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                              <label for="image" class="col-md-4 control-label">Meal Image</label>

                              <div class="col-md-6">

                                     {{Form::file('image')}}
                                  @if ($errors->has('image'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('image') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>







                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
                                </button>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
     var i=1;
     $('#add').click(function(){
          i++;
          $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="ings[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
     });
     $(document).on('click', '.btn_remove', function(){
          var button_id = $(this).attr("id");
          $('#row'+button_id+'').remove();
     });

});
</script>
@endsection
