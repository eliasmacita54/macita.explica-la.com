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
            <h1>add Class</h1>
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
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>

                  </div>

                  <div class="form-group">
                    <label>Subject Name</label>
                        @foreach($getSubject as $subject)
                        <div>
                        <label style="font-weight: normal;">
                            <input type="checkbox" value="{{ $subject->id }}" name="subject_id[]"> {{ $subject->name }}
                        </label>
                    </div>
                        @endforeach


                  </div>

                  <div class="form-group">
                    <label>Subject Name</label>
                    <select class="form-control" name="status">
                        <option value="0">active</option>
                        <option value="1">unactive</option>
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
