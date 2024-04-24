@extends('layouts.app')
    @section('style')
    <style type="text/css">
    </style>
    @endsection

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Class</h1>
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
                        <option {{ ($getRecord->class_id == $class->id) ? 'selected' : ''  }} value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>

                  </div>

                  <div class="form-group">
                    <label>Subject Name</label>
                    <select class="form-control" name="subject_id" required>
                        <option value="">Select subject</option>
                        @foreach($getSubject as $subject)
                        <option {{ ($getRecord->subject_id == $subject->id) ? 'selected' : ''  }} value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Subject Name</label>
                    <select class="form-control" name="status">
                        <option {{ ($getRecord->status == 0) ? 'selected' : ''  }} value="0">active</option>
                        <option {{ ($getRecord->status == 1) ? 'selected' : ''  }} value="1">Inective</option>
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

   @section('content')

  @endsection
