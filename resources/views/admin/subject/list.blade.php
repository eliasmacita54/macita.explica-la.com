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
            <h1>Subject List  </h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{ url('admin/subject/add')}}" class="btn btn-primary"> Add new Subject</a>
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
                        <h3 class="card-title">Seach Subject </h3>
                    </div>
                    <form method="get" action="">

                      <div class="card-body">
                        <div class="row">
                        <div class="form-group col-md-3">
                          <label>Name</label>
                          <input type="text" class="form-control" name="name" value="{{ Request::get('name')}}"   placeholder="Name">
                        </div>

                        <div class="form-group">
                            <label>Subject Type</label>
                            <Select class="form-control" name="type" >
                                <option value="">Select Type</option>
                                <option {{ (Request::get('type') == "Theory") ? 'selected' : '' }} value="Theory">Theory</option>
                                <option {{ (Request::get('type') == "Pratical") ? 'selected' : '' }} value="Pratical">Pratical</option>
                            </Select>
                          </div>

                        <div class="form-group col-md-3">
                            <label >Date</label>
                            <input type="date" class="form-control" name="date" value="{{ Request::get('date')}}"  placeholder="Enter email">
                          </div>
                        <div class="form-group col-md-3">
                            <button class=" btn btn-primary" type="submit" style="margin-top:30px;">Seach</button>
                            <a href="{{ url('admin/subject/list') }}" class=" btn btn-success"  style="margin-top:30px;">reset</a>
                        </div>
                      </div>
                    </div>
                   </form>
                  </div>

            @include('_message')

            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Subject Table</h3>

              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Status</th>
                      <th>Created by</th>
                      <th>Created date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($getRecord as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->type}}</td>
                        <td>
                            @if($value->status == 0)
                            Active
                            @else
                            Inactive
                            @endif
                        </td>
                        <td>{{$value->created_by_name}}</td>
                        <td>{{date('d-m-y H:i A', strtotime($value->created_at))}}</td>
                        <td>
                            <a href="{{ url('admin/subject/edit/' .$value->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('admin/subject/delete/' .$value->id) }}" class="btn btn-danger">Delete</a>

                        </td>
                    </tr>
                @endforeach
                  </tbody>
                </table>
            
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
