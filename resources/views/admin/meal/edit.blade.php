@extends('admin.layouts.layout')
@section('title')
  Edit Meal Information
@endsection
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update</div>
                    <div class="panel-body" >
{!! Form::open(['action' => ['Dashboard\MealsController@update',$meal->id],'method' => 'PATCH']) !!}
    <div class="form-group">
        {{Form::label('name', 'Meal Name')}}
        {{Form::text('name', $meal->name,['class' => 'form-control','placeholder'=>'Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('preparation', 'Preparation ')}}
        {{Form::text('preparation', $meal->preparation,['class' => 'form-control','placeholder'=>'Preparation'])}}
    </div>
    <div class="form-group">
          {{Form::label('meal_type', 'Meal type')}}
          {!!Form::select('meal_type',['1'=>'فطار',
           '2'=>'غداء وعشاء',
            '3'=>'تحلية',
         '4'=>'مشروبات'],$meal->meal_type,['class'=>'form-control']) !!}
      </div>
    <div class="form-group">
        {{Form::label('calories', 'calories')}}
        {{Form::text('calories', $meal->calories,['class' => 'form-control','placeholder'=>'calories'])}}
    </div>


    <div class="form-group{{ $errors->has('ings[]') ? ' has-error' : '' }}">
                   <label for="ings[]" class="col-md-4 control-label">Ingredients </label>



                                               <div class="col-md-6">
                                                 @foreach($meal->ingredients as $ings)
                                                 <table class="table table-bordered" id="dynamic_field">

                                                    <tr>

                                                         <td><input type="text" name="ings[]" value="{{$ings->ing_name}}" placeholder="Enter ingredient name" class="form-control name_list"></td>
                                                        @endforeach
                                                         <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                                    </tr>



                                               </table>

                                               </div>

                                            @if ($errors->has('ings[]'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('ings[]') }}</strong>
                                                </span>
                                            @endif


                                    </div>



    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
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
