@extends('layouts.app')

@section('style')
<style type="text/css">
    .fc-daygrid-event {
        white-space: normal;
    }
</style>
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Cabeçalho do Conteúdo (Cabeçalho da Página) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Meu Calendário</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Conteúdo Principal -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Coluna esquerda -->
                <div class="col-md-12">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.conteúdo -->
</div> <!-- /.content-wrapper -->

@endsection

@section('script')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>

<script type="text/javascript">
    var events = new Array();

    @foreach($getClassTimetable as $value)
        events.push({
            title: 'Turma: {{ $value->class_name }} - {{ $value->subject_name }}',
            daysOfWeek: [ {{ $value->fullcalendar_day }} ],
            startTime: '{{ $value->start_time }}',
            endTime: '{{ $value->end_time }}',
            url: '{{ url('teacher/my_class_subject') }}',
        });
    @endforeach

    @foreach($getExamTimetable as $exam)
        events.push({
            title: 'Exame: {{ $exam->class_name }} - {{ $exam->subject_name }} ({{ date('h:i A', strtotime($exam->start_time)) }} às {{ date('h:i A', strtotime($exam->end_time)) }})',
            start: '{{ $exam->exam_date }}T{{ date('H:i:s', strtotime($exam->start_time)) }}',
            end: '{{ $exam->exam_date }}T{{ date('H:i:s', strtotime($exam->end_time)) }}',
            color: 'brown',
            url: '{{ url('teacher/my_exam_timetable') }}',
        });
    @endforeach

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        initialDate: '<?=date('Y-m-d')?>',
        navLinks: true,
        editable: false,
        events: events,
        initialView: 'dayGridMonth',
    });
    calendar.render();
</script>
@endsection
