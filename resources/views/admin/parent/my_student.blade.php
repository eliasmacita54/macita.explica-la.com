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

          <div class="col-sm-12">
            <h1>Parent Student List ({{ $getParent->name}} {{ $getParent->last_name}})</h1>
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
                        <h3 class="card-title">Seach Student </h3>
                    </div>
                    <form method="get" action="">

                      <div class="card-body">
                        <div class="row">

                        <div class="form-group col-md-3">
                            <label>Student ID</label>
                            <input type="text" class="form-control" name="id" value="{{ Request::get('id')}}"   placeholder="Student id">
                         </div>

                        <div class="form-group col-md-3">
                          <label>Name</label>
                          <input type="text" class="form-control" name="name" value="{{ Request::get('name')}}"   placeholder="Name">
                        </div>

                        <div class="form-group col-md-3">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="{{ Request::get('last_name')}}"   placeholder="Last Name">
                          </div>


                        <div class="form-group col-md-3">
                          <label >Email</label>
                          <input type="text" class="form-control" name="email" value="{{ Request::get('email')}}"  placeholder="Enter email">
                        </div>

                        <div class="form-group col-md-3">
                            <button class=" btn btn-primary" type="submit" style="margin-top:30px;">Seach</button>
                            <a href="{{ url('admin/parent/my-student/' .$parent_id) }}" class=" btn btn-success"  style="margin-top:30px;">reset</a>
                        </div>
                      </div>
                    </div>
                   </form>
                  </div>

            @include('_message')

            <!-- /.card -->
@if(!empty($getSeachStudent))
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Student List</h3>

              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Profile Pic</th>
                      <th>Student Name</th>
                      <th>Email</th>
                      <th>Parent Name</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($getSeachStudent as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>

                           @if(!empty($value->getProfile()))
                                <img src="{{ $value->getProfile() }}" style="width: 50px; width: 50px; border-radius: 50%">
                            @endif
                        </td>
                        <td>{{$value->name}} {{ $value->last_name}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->parent_name}}</td>

                       <!-- <td>//$value->updated_at}}</td>-->
                        <td>{{date('d-m-y H:i A', strtotime($value->created_at))}}</td>
                        <td style="min-width: 150px;">
                            <a href="{{ url('admin/parent/assign_student_parent/'.$value->id.'/'.$parent_id) }}" class="btn btn-primary btn-sm">Add Student to Parent</a>

                        </td>
                    </tr>
                @endforeach
                  </tbody>
                </table>
                <div style=" padding: 10px; float: right;">

                </div>
              </div>
              <!-- /.card-body -->
            </div>
@endif
            <!-- /.card -->
          </div>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Parent List</h3>

            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Profile Pic</th>
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Parent Name</th>
                        <th>Created Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($getRecord as $value)
                      <tr>
                          <td>{{$value->id}}</td>
                          <td>

                             @if(!empty($value->getProfile()))
                                  <img src="{{ $value->getProfile() }}" style="width: 50px; width: 50px; border-radius: 50%">
                              @endif
                          </td>
                          <td>{{$value->name}} {{ $value->last_name}}</td>
                          <td>{{$value->email}}</td>
                          <td>{{$value->parent_name}}</td>

                         <!-- <td>//$value->updated_at}}</td>-->
                          <td>{{date('d-m-y H:i A', strtotime($value->created_at))}}</td>
                          <td style="min-width: 150px;">
                              <a href="{{ url('admin/parent/assign_student_parent_delete/' .$value->id) }}" class="btn btn-danger btn-sm">Delete Assign</a>

                          </td>
                      </tr>
                  @endforeach
                    </tbody>
                  </table>
              <div style=" padding: 10px; float: right;">

              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection

