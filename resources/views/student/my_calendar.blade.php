@extends('layouts.app')

@section('style')
<style type="text/css">
    /* Add your custom styles here */
</style>
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>My Calendar</h1>
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
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div> <!-- /.content-wrapper -->

@endsection

@section('script')
<script src='{{ url('public/dist/fullcalendar/index.global.js') }}'></script>

<script type="text/javascript">
     var calendarEl = document.getElementById('calendar');
     var calendar = new FullCalendar.Calendar(calendarEl, {

        headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
    });
    calendar.render();

</script>
@endsection
