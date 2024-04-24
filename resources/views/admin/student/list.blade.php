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
            <h1>Student List (Total : {{$getRecord-> total()}} )</h1>
          </div>
          <div class="col-sm-12" style="text-align: right;">
            <a href="{{ url('admin/student/add')}}" class="btn btn-primary"> Add new Student</a>
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
                    <h3 class="card-title">Seach Student </h3>
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


                    <div class="form-group col-md-2">
                        <label >Admission Number</label>
                        <input type="text" class="form-control" name="admission_number" value="{{ Request::get('admission_number')}}"  placeholder="Admission Number">
                      </div>

                      <div class="form-group col-md-2">
                        <label >Roll Number</label>
                        <input type="text" class="form-control" name="roll_number" value="{{ Request::get('roll_number')}}"  placeholder="Roll Number">
                      </div>

                      <div class="form-group col-md-2">
                        <label >Class</label>
                        <input type="text" class="form-control" name="class_name" value="{{ Request::get('class_name')}}"  placeholder="Class">
                      </div>

                      <div class="form-group col-md-2">
                        <label>Gender</label>
                        <select class="form-control"  name="status">
                            <option value="">Select Status</option>
                            <option  {{ (Request::get('gender') == 100) ? 'selected' : '' }} value="100">active</option>
                            <option  {{ (Request::get('gender') == 1) ?  'selected' : '' }} value="1">Inactive</option>
                        </select>
                    </div>

                <!--Date of Birth-->
                    <div class="form-group col-md-2">
                        <label >Caste</label>
                        <input type="text" class="form-control" name="caste" value="{{ Request::get('caste')}}"  placeholder="Enter caste">
                      </div>

                    <div class="form-group col-md-2">
                        <label >Religion</label>
                        <input type="text" class="form-control" name="religion" value="{{ Request::get('religion')}}"  placeholder="Enter religion">
                      </div>
                      <div class="form-group col-md-2">
                        <label >Mobile  Number</label>
                        <input type="text" class="form-control" name="mobile_number" value="{{ Request::get('mobile_number')}}"  placeholder="Enter mobile Number">
                      </div>

                      <div class="form-group col-md-2">
                        <label >Blood Group</label>
                        <input type="text" class="form-control" name="blood_group" value="{{ Request::get('blood_group ')}}"  placeholder="Enter mobile Number">
                      </div>

                      <div class="form-group col-md-2">
                        <label >Admission Date</label>
                        <input type="date" class="form-control" name="admission_date" value="{{ Request::get('admission_date')}}"  placeholder="">
                      </div>

                      <!---->




                    <div class="form-group col-md-2">
                        <label >Date</label>
                        <input type="date" class="form-control" name="date" value="{{ Request::get('date')}}"  placeholder="Enter Date">
                      </div>
                    <div class="form-group col-md-3">
                        <button class=" btn btn-primary" type="submit" style="margin-top:30px;">Seach</button>
                        <a href="{{ url('admin/student/list') }}" class=" btn btn-success"  style="margin-top:30px;">reset</a>
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
                      <th>Name</th>
                      <th>Email</th>
                      <th>Admission Number</th>
                      <th>Roll Number</th>
                      <th>Class</th>
                      <th>Gender</th>
                      <th>Date of Birth</th>
                      <th>Caste</th>
                      <th>Religion</th>
                      <th>Mobile  Number</th>
                      <th>Admission Date</th>
                      <th>Blood Group</th>
                      <th>Height</th>
                      <th>weight</th>
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
                            <td>{{$value->admission_number}}</td>
                            <td>{{$value->roll_number}}</td>
                            <td>{{$value->class_name}}</td>
                            <td>{{($value->gender == 0) ? 'Male' : 'Female'}}</td>
                            <td>
                            @if(!empty($value->date_of_birth))
                            {{date('d-m-Y', strtotime($value->date_of_birth)) }}
                            @endif
                            </td>
                            <td>{{$value->caste}}</td>
                            <td>{{$value->religion}}</td>
                            <td>{{$value->mobile_number}}</td>
                        <td>
                            @if(!empty($value->adminssion_date))
                            {{date('d-m-Y', strtotime($value->adminssion_date)) }}
                            @endif
                        </td>
                            <td>{{$value->blood_group}}</td>
                            <td>{{$value->height}}</td>
                            <td>{{$value->weight}}</td>
                            <td>{{($value->status == 0) ? 'Active' : 'Inactive' }}</td>

                           <!-- <td>//$value->updated_at}}</td>-->
                            <td>{{date('d-m-y H:i A', strtotime($value->created_at))}}</td>
                            <td style="min-width: 150px;">
                                <a href="{{ url('admin/student/edit/' .$value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ url('admin/student/delete/' .$value->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
