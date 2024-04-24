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
            <h1>Teacher List (Total : {{$getRecord-> total()}} )</h1>
          </div>
          <div class="col-sm-12" style="text-align: right;">
            <a href="{{ url('admin/teacher/add')}}" class="btn btn-primary"> Add new Teacher</a>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-sm-12">

            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title">Seach Teacher </h3>
                </div>
                <form method="get" action="">

                  <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-2">
                      <label>Name</label>
                      <input type="text" class="form-control" name="name" value="{{ Request::get('name')}}"   placeholder="Name">
                    </div>

                    <div class="form-group col-md-2">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="last_name" value="{{ Request::get('last_name')}}"   placeholder="Last Name">
                      </div>

                    <div class="form-group col-md-2">
                      <label >Email</label>
                      <input type="text" class="form-control" name="email" value="{{ Request::get('email')}}"  placeholder="Enter email">
                    </div>

                    <div class="form-group col-md-3">
                        <label>Gender</label>
                        <select class="form-control"  name="gender">
                            <option value="">Select Gender</option>
                            <option  {{ (Request::get('gender') == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                            <option  {{ (Request::get('gender') == 'Female') ?  'selected' : '' }} value="Female">Female</option>
                        </select>
                    </div>

                    <div class="form-group col-md-2">
                        <label >Date of birth</label>
                        <input type="date" class="form-control" name="date_of_birth" value="{{ Request::get('date_of_birth')}}"  placeholder="Date of birth">
                      </div>

                      <div class="form-group col-md-2">
                        <label >Mobile Number</label>
                        <input type="text" class="form-control" name="mobile_number" value="{{ Request::get('mobile_number')}}"  placeholder="Mobile Number">
                      </div>

                      <div class="form-group col-md-2">
                        <label >Date Joining</label>
                        <input type="date" class="form-control" name="admission_date" value="{{ Request::get('admission_date')}}"  placeholder="">
                      </div>


                      <div class="form-group col-md-2">
                        <label >Marital Status</label>
                        <input type="text" class="form-control" name="marital_status" value="{{ Request::get('marital_status')}}"  placeholder="Marital status">
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

                    <div class="form-group col-md-2">
                        <label >Created Date</label>
                        <input type="date" class="form-control" name="date" value="{{ Request::get('date')}}"  placeholder="Enter Date">
                      </div>
                    <div class="form-group col-md-3">
                        <button class=" btn btn-primary" type="submit" style="margin-top:30px;">Seach</button>
                        <a href="{{ url('admin/teacher/list') }}" class=" btn btn-success"  style="margin-top:30px;">reset</a>
                    </div>
                  </div>
                </div>
               </form>
              </div>


            @include('_message')

            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Student Table</h3>
              </div>


              <!-- /.card-header -->
              <div class="card-body p-0" style="overflow: auto;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Profile Pic</th>
                      <th>Teacher Name</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>Date of Birth</th>
                      <th>Mobile  Number</th>
                      <th>Admission Date</th>
                      <th>Address</th>
                      <th>Qualification</th>
                      <th>work Expirience</th>
                      <th>note</th>
                      <th>Status</th>
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
                            <td>{{($value->gender == 0) ? 'Male' : 'Female'}}</td>
                            <td>
                                @if(!empty($value->date_of_birth))
                                {{date('d-m-Y', strtotime($value->date_of_birth)) }}
                                @endif
                                </td>
                                <td>{{$value->mobile_number}}</td>
                                <td>
                                    @if(!empty($value->adminssion_date))
                                    {{date('d-m-Y', strtotime($value->adminssion_date)) }}
                                    @endif
                                </td>
                            <td>{{$value->address}}</td>
                            <td>{{$value->qualification}}</td>
                            <td>{{$value->work_expirience}}</td>
                            <td>{{$value->note}}</td>
                            <td>{{($value->status == 0) ? 'Active' : 'Inactive' }}</td>

                           <!-- <td>//$value->updated_at}}</td>-->
                            <td>{{date('d-m-y H:i A', strtotime($value->created_at))}}</td>
                            <td style="min-width: 150px;">
                                <a href="{{ url('admin/teacher/edit/' .$value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ url('admin/teacher/delete/' .$value->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
