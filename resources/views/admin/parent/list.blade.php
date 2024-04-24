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
            <h1>Parent List (Total : {{$getRecord-> total()}} )</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{ url('admin/parent/add')}}" class="btn btn-primary"> Add new Admin</a>
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
                        <h3 class="card-title">Seach Parent </h3>
                    </div>
                    <form method="get" action="">

                      <div class="card-body">
                        <div class="row">
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
                            <label>Gender</label>
                            <select class="form-control"  name="gender">
                                <option value="">Select Gender</option>
                                <option  {{ (old('gender') == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                                <option  {{ (old('gender') == 'Female') ?  'selected' : '' }} value="Female">Female</option>
                            </select>
                        </div>

                        <div style="color: red">{{ $errors->first('gender ') }}</div>

                        <div class="form-group col-md-3">
                            <label>Phone<span style="color: red;"> *</span></label>
                            <input type="text" class="form-control" name="Caste" value="{{ old('mobile_number') }}"  placeholder="Mobile Number ">
                            <div style="color: red">{{ $errors->first('mobile_number') }}</div>
                        </div>

                        <div class="form-group col-md-3">
                            <label>Occupation<span style="color: red;"> *</span></label>
                            <input type="text" class="form-control" name="occupation" value="{{ old('occupation') }}"  placeholder="Occupation">
                            <div style="color: red">{{ $errors->first('occupation') }}</div>
                        </div>

                        <div class="form-group col-md-3">
                            <label>address<span style="color: red;"> *</span></label>
                            <input type="text" class="form-control" name="address" value="{{ old('address ') }}"  placeholder="address">
                            <div style="color: red">{{ $errors->first('address') }}</div>
                        </div>

                        <div class="form-group col-md-3">
                            <label>status<span style="color: red;"> *</span></label>
                            <select class="form-control"  name="status">
                                <option value="">Select status</option>
                                <option {{ (old('status') == 100) ? 'selected' : '' }} value="100">active</option>
                                <option {{ (old('status ') == 1) ? 'selected' : '' }} value="1">inactive</option>
                            </select>
                            <div style="color: red">{{ $errors->first('status') }}</div>
                        </div>

                        <div class="form-group col-md-3">
                            <label >Date</label>
                            <input type="date" class="form-control" name="date" value="{{ Request::get('date')}}"  placeholder="Enter email">
                          </div>
                        <div class="form-group col-md-3">
                            <button class=" btn btn-primary" type="submit" style="margin-top:30px;">Seach</button>
                            <a href="{{ url('admin/parent/list') }}" class=" btn btn-success"  style="margin-top:30px;">reset</a>
                        </div>
                      </div>
                    </div>
                   </form>
                  </div>

            @include('_message')

            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Admin Table</h3>

              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Profile Pic</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>Phone</th>
                      <th>Occupation</th>
                      <th>Address</th>
                      <th>status</th>
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
                            <td>{{$value->gender}}</td>
                            <td>{{$value->mobile_number}}</td>
                            <td>{{$value->occupation}}</td>
                            <td>{{$value->address}}</td>
                            <td>{{($value->status == 0) ? 'Active' : 'Inactive' }}</td>
                            <td>{{date('d-m-y H:i A', strtotime($value->created_at))}}</td>
                            <td><a href="{{ url('admin/parent/edit/' .$value->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ url('admin/parent/delete/' .$value->id) }}" class="btn btn-danger">Delete</a>
                                <a href="{{ url('admin/parent/my-student/' .$value->id) }}" class="btn btn-primary">My Student</a>
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

