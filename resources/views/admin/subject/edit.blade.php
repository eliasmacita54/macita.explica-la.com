@extends('layouts.app')
    @section('style')
    <style type="text/css">
    </style>

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
          @include('_message')
            <!-- general form elements -->
            <div class="card card-primary">

              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>subject Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $getRecord->name }}" required placeholder="Class name">
                  </div>

                  <div class="form-group">
                    <label>Subject Type</label>
                    <Select class="form-control" name="type" required>
                        <option value="">Select Type</option>
                        <option  {{ ($getRecord->type == "Theory") ? 'selected' : '' }} value="Theory">Theory</option>
                        <option  {{ ($getRecord->type == "Pratical") ? 'selected' : '' }} value="Pratical">Pratical</option>
                    </Select>

                  </div>

                  <div class="form-group">
                    <label>Status</label>
                    <Select class="form-control" name="status">
                        <option  {{ ($getRecord->status == 0) ? 'selected' : '' }} value="0">active</option>
                        <option   {{ ($getRecord->status == 1) ? 'selected' : '' }} value="1">Inactive</option>
                    </Select>

                  </div>


            </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
              </form>
            </div>
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
