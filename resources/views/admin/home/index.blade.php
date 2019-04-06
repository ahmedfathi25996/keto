@extends('admin.layouts.layout')
@section('title')
  Dashboard
@endsection

@section('content')
   <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-coffee"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Breakfast Meals</span>
              <span class="info-box-number">{{$breakfast->count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-cutlery"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">lunch and dinner</span>
              <span class="info-box-number">{{$lunch->count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fas fa-bread-slice"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Dessert</span>
              <span class="info-box-number">{{$dessert->count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="glyphicon glyphicon-glass"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Drinks</span>
              <span class="info-box-number">{{$drink->count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
              <!-- Left col -->
              <div class="col-md-12">
                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Latest Meals</h3>

                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <div class="table-responsive">
                      <table class="table no-margin">
                        <thead>
                        <tr>
                          <th>Meal ID</th>
                          <th>Meal Name</th>
                          <th>Ingredients</th>


                        </tr>
                        </thead>
                        <tbody>
                           @foreach($lateMeals as $meal)
                        <tr>
                          <td>{{$meal->id}}</td>
                          <td>{{$meal->name}}</td>
                          <td>@foreach($meal->ingredients as $ing)
                               {{$ing->ing_name}} -
                               @endforeach</td>


                        </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer clearfix">
                    <a href="/adminpanel/meals/create" class="btn btn-sm btn-info btn-flat pull-left">Add New Meal</a>
                    <a href="/adminpanel/meals" class="btn btn-sm btn-default btn-flat pull-right">View All Meals</a>
                  </div>
                  <!-- /.box-footer -->
                </div>
              </div>

            </div>









      </div>
          <!-- /.box -->
        </div>

      </div>
      <!-- /.row -->
    </section>



     @endsection
