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
            <h1>add New Teacher</h1>
          </div>
        </div>
      </div><!-- .container-fluid -->
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
                <form method="post" action=""  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Name<span style="color: red;"> *</span> </label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required placeholder="First Name">
                                <div style="color: red">{{ $errors->first('name') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Last Name<span style="color: red;"> *</span></label>
                                <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required placeholder="Last Name">
                                <div style="color: red">{{ $errors->first('last_name') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Date of birth<span style="color: red;"> *</span></label>
                                <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}" required placeholder="admission_date">
                                <div style="color: red">{{ $errors->first('date_of_birth') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Date of Joining Date<span style="color: red;"> *</span></label>
                                <input type="date" class="form-control" name="adminssion_date" value="{{ old('adminssion_date') }}" required placeholder="admission_date">
                                <div style="color: rgb(255, 0, 0)">{{ $errors->first('adminssion_date') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Mobile Number<span style="color: red;"> *</span></label>
                                <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number') }}" required placeholder="Mobile Number">
                                <div style="color: red">{{ $errors->first('mobile_number') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Marital Status<span style="color: red;"> *</span></label>
                                <input type="text" class="form-control" name="marital_status" value="{{ old('marital_status') }}" required placeholder="Mobile Number">
                                <div style="color: red">{{ $errors->first('marital_status') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Profile Picture<span style="color: red;"> *</span></label>
                                <input type="file" class="form-control" name="profile_pic">
                                <div style="color: red">{{ $errors->first('profile_pic') }}</div>
                            </div>


                            <div class="form-group col-md-6">
                                <label>Address<span style="color: red;"> *</span></label>
                                <input type="text" class="form-control" name="address" value="{{ old('address') }}" required>
                                <div style="color: red">{{ $errors->first('address') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Gender<span style="color: red;"> *</span></label>
                                <select class="form-control" required name="gender">
                                    <option value="">Select Gender</option>
                                    <option  {{ (old('gender') == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                                    <option  {{ (old('gender') == 'Female') ?  'selected' : '' }} value="Female">Female</option>
                                </select>
                            </div>
                            <div style="color: red">{{ $errors->first('gender ') }}</div>

                            <div class="form-group col-md-6">
                                <label>Qualification<span style="color: red;"> *</span></label>
                                <textarea class="form-control" name="qualification" placeholder="Qualification">{{ old('qualification') }}</textarea>
                                <div style="color: red">{{ $errors->first('qualification') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Work Expirience<span style="color: red;"> *</span></label>
                                <textarea  class="form-control" name="work_expirience"  placeholder="Work Expirience" >{{old('work_expirience')}}</textarea>
                                <div style="color: red">{{ $errors->first('work_expirience') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Note<span style="color: red;"> *</span></label>
                                <textarea class="form-control" name="note" value="{{ old('note') }}" placeholder="Note"></textarea>
                                <div style="color: red">{{ $errors->first('note') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>status<span style="color: red;"> *</span></label>
                                <select class="form-control" required name="status">
                                    <option value="">Select status</option>
                                    <option {{ (old('status') == '0') ? 'selected' : '' }} value="0">active</option>
                                    <option {{ (old('status ') == '1') ? 'selected' : '' }} value="1">inactive</option>
                                </select>
                                <div style="color: red">{{ $errors->first('status') }}</div>
                            </div>

                        </div>

                        <hr/>
                        <div class="form-group">
                            <label>Email<span style="color: red;"> *</span></label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Enter email">
                            <div style="color: red">{{ $errors->first('email') }}</div>
                        </div>


                        <div class="form-group">
                            <label for="password">Password<span style="color: red;"> *</span></label>
                            <input type="password" class="form-control" name="password" required placeholder="Password">
                            <div style="color: red">{{ $errors->first('password') }}</div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <!-- /.card-body -->


                </form>

            </div>

        </div>
    </div>

        <!-- /.row -->

    </section>
    <!-- /.content -->

  @endsection
