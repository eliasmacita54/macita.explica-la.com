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
            <h1>My Student</h1>
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


            @include('_message')

         <div class="card">

            <div class="card-header">
            <!-- /.card-header -->
            <div class="card-body p-0" style="overflow:auto">
                <h3 class="card-title">My Student</h3>
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
                      <th>Created Date</th>
                      <th>action</th>

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


                         <!-- <td>//$value->updated_at}}</td>-->
                          <td>{{date('d-m-y H:i A', strtotime($value->created_at))}}</td>
                        <td style="width: 350px;">
                            <a class="btn btn-success btn-sm" href="{{ url('parent/my_student/subject/'.$value->id) }}">Subject</a>
                            <a class="btn btn-primary btn-sm" href="{{ url('parent/my_student/exam_timetable/'.$value->id) }}">
                                My Exam Timetable</a>

                                <a class="btn btn-warning  btn-sm" href="{{ url('parent/my_student/calendar/'.$value->id) }}">Calendar</a>
                        </td>

                      </tr>
                  @endforeach
                    </tbody>
                  </table>

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

