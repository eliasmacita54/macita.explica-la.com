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
            <h1>Edit New Assign Class Teacher</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">

              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Class Name</label>
                    <select class="form-control" name="class_id" required>
                        <option value="">Select Class</option>
                        @foreach($getClass as $class)
                        <option {{ ($getRecord->class_id == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>

                  </div>

                  <div class="form-group">
                    <label>Teacher Name</label>
                        @foreach($getTeacher as $teacher)
                        <div>
                        <label style="font-weight: normal;">
                        @php
                            $checked = '';
                        @endphp
                            @foreach($getAssignTeacherID as $teacherID)
                                @if($teacherID->teacher_id == $teacher->id) 
                                    @php  
                                        $checked = 'checked';
                                    @endphp
                                @endif
                            @endforeach
                            <input {{ $checked}} type="checkbox" value="{{ $teacher->id }}" name="teacher_id[]"> {{ $teacher->name }} {{ $teacher->last_name }}
                        </label>
                    </div>
                        @endforeach
                  </div>

                  <div class="form-group">
                    <label>status</label>
                    <select class="form-control" name="status">
                        <option {{ ($getRecord->status == 0) ? 'selected' : '' }} value="0">active</option>
                        <option {{ ($getRecord->status == 1) ? 'selected' : '' }} value="1">unactive</option>
                    </select>

                  </div>


            </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>

        </div>
    </div>

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
