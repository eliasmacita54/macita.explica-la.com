@extends('layouts.app')

   @section('content')

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-6">
            <h1>Exam Schedule <span style="color:blue"> ({{$getStudent->name }} {{$getStudent->last_name}})</h1></span>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
          <!-- /.col -->


            @include('_message')


           @foreach($getRecord as $value)
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ $value['name']}}</h3>

              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Subject Name</th>
                      <th>Exam Date</th>
                      <th>Start Time</th>
                      <th>End Time</th>
                      <th>Room Number</th>
                      <th>Full Marks</th>
                      <th>Passing Marks</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach($value['exam'] as $valueW)
                      <tr>
                        <td>{{ $valueW['subject_name'] }}</td>
                        {{-- <td>{{ $valueW['exam_date'] }}</td> --}}
                        <td>{{ date('d-m-Y', strtotime($valueW['exam_date'])) }}</td>
                        <td>{{ date('h:i A', strtotime($valueW['start_time'])) }}</td>
                        <td>{{ date('h:i A', strtotime($valueW['end_time'])) }}</td>
                        <td>{{ $valueW['room_number'] }}</td>
                        <td>{{ $valueW['full_marks'] }}</td>
                        <td>{{ $valueW['passing_mark'] }}</td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            @endforeach
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
