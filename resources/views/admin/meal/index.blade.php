@extends('admin.layouts.layout')
@section('title')
All Meals
@endsection
@section('header')

{!! Html::style('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}
@endsection


@section('content')
<section class="content-header">
        <h1>
          Meals Control

        </h1>
        <ol class="breadcrumb">
          <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="{{url('/adminpanel/meals')}}">Meals Control</a></li>
          <li class="active">Data tables</li>
        </ol>
      </section>
<section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Hover Data Table</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#ID</th>
                    <th>Meal name</th>
                    <th>Ingredients</th>
                    <th>Image</th>



                    <th> Control </th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach($meals as $meal)
                  <tr>
                    <td>{{$meal->id}}</td>
                    <td>{{$meal->name}}</td>
                    <td>@foreach($meal->ingredients as $ing)
                         {{$ing->ing_name}} -
                         @endforeach
                    </td>

                    <td>
                      <center>
                      <img src='{{ asset("images/{$meal->image}") }}' width="100" height="70">
                      <center>
                    </td>
                  <td>
                      <a href="/adminpanel/meals/{{$meal->id}}/edit" class="btn btn-primary"> Edit </a>
                      {!! Form::open(['action'=>['Dashboard\MealsController@destroy',$meal->id],'method'=>'POST','class'=>'pull-right' ])  !!}
                        {{ Form::hidden('_method','DELETE') }}
                        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}

                      {!! Form::close() !!}
                  </td>

                  </tr>
                @endforeach
                </table>
              </div>
              <!-- /.box-body -->
            </div>

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
@endsection

@section('footer')
<style type="text/css">
  #example2 td{
    width: 2px;
  }
</style>
{!! Html::script('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}

{!! Html::script('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}
<script type="text/javascript">
    $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true
      })
</script>

@endsection
