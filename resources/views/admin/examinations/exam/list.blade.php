@extends('layouts.app')
    @section('style')
    <style type="text/css">
    </style>

   @section('content')

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-6">
            <h1>Avaliation List (Total : {{$getRecord-> total()}} )</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{ url('admin/examinations/exam/add')}}" class="btn btn-primary"> Add new Admin</a>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
                  <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Seach Avaliations </h3>
                    </div>
                    <form method="get" action="">

                      <div class="card-body">
                        <div class="row">
                        <div class="form-group col-md-3">
                          <label>Exam Name</label>
                          <input type="text" class="form-control" name="name" value="{{ Request::get('name')}}"   placeholder="Name">
                        </div>

                        <div class="form-group col-md-3">
                            <label >Date</label>
                            <input type="date" class="form-control" name="date" value="{{ Request::get('date')}}"  placeholder="Enter email">
                          </div>
                        <div class="form-group col-md-3">
                            <button class=" btn btn-primary" type="submit" style="margin-top:30px;">Seach</button>
                            <a href="{{ url('admin/examinations/exam/list') }}" class=" btn btn-success"  style="margin-top:30px;">reset</a>
                        </div>
                      </div>
                    </div>
                   </form>
                  </div>

            @include('_message')

            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Avaliation Table</h3>

              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Avaliation Name</th>
                      <th>Note</th>
                      <th>Created By</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>

                  </thead>
                  <tbody>
                    @foreach ($getRecord as $value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->note}}</td>
                            <td>{{$value->created_name}}</td>
                            <td>{{date('d-m-y H:i A', strtotime($value->created_at))}}</td>
                            <td><a href="{{ url('admin/examinations/exam/edit/' .$value->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ url('admin/examinations/exam/delete/' .$value->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                <div style=" padding: 10px; float: right;">
                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
