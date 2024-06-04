@extends('layouts.app')
@section('style')
<style type="text/css">
</style>
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Cabeçalho do Conteúdo (Cabeçalho da Página) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lista de Avaliações</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Conteúdo Principal -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Coluna -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Buscar Avaliações</h3>
                        </div>
                        <form method="get" action="">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>Avaliação</label>
                                        <select class="form-control" name="exam_id" required>
                                            <option value="">Selecionar</option>
                                            @foreach($getExam as $exam)
                                                <option {{ (Request::get('exam_id') == $exam->id) ? 'selected' : '' }} value="{{ $exam->id }}">{{ $exam->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Turma</label>
                                        <select class="form-control" name="class_id" required>
                                            <option value="">Selecionar</option>
                                            @foreach($getClass as $class)
                                                <option {{ (Request::get('class_id') == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <button class="btn btn-primary" type="submit" style="margin-top:30px;">Buscar</button>
                                        <a href="{{ url('admin/examinations/marks_register') }}" class="btn btn-success" style="margin-top:30px;">Redefinir</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    @include('_message')
                    @if(!empty($getSubject) && $getSubject->count())
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Registro de Notas</h3>
                        </div>

                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>NOME DO ESTUDANTE</th>
                                        @foreach($getSubject as $subject)
                                        <th>{{$subject->subject_name}} <br>
                                        ({{$subject->subject_type}} : {{$subject->passing_mark}} / {{$subject->full_marks}})
                                        </th>
                                        @endforeach
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($getStudent as $student)
                                    <tr>
                                        
                                        <form class="SubmitForm" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                                            <input type="hidden" name="exam_id" value="{{ Request::get('exam_id') }}">
                                            <input type="hidden" name="class_id" value="{{ Request::get('class_id') }}">
                                            
                                           <tr>
                                            <td>{{ $student->name }} {{ $student->last_name }}</td>
                                            @php
                                            $i = 1;
                                            @endphp
                                            @foreach($getSubject as $subject)
                                            <td>
                                            @php
                                                $getMark = $subject->getMark($student->id, Request::get('exam_id'), Request::get('class_id'), $subject->subject_id);
                                            @endphp
                                                <div style="margin-bottom: 10px;">
                                                        <div>
                                                            <input type="hidden" name="mark[{{ $i }}][subject_id]" value="{{ $subject->subject_id }}">
                                                            <!-- <input type="hidden" name="mark[{{ $i }}][class_work]" id="class_work_{{ $student->id }}{{ $subject->subject_id }}" value="{{ $getMark->class_work ?? 0 }}"> -->
                                                            <!-- <input type="text" style="width:200px;" placeholder="Enter Marks" value="{{ (empty($getMark->class_work) ? '' : $getMark->class_work . ' ') }}" class="form-control"> -->
                                                            <input type="text" name="mark[{{ $i }}][class_work]" id="class_work_{{ $student->id }}{{ $subject->subject_id }}" style="width:200px;" placeholder="Digite as notas" value="{{ empty($getMark->class_work) ? $getMark->class_work : '' }}" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div style="margin-bottom: 10px;">
                                                        <div>
                                                            <input type="text" id="home_work_{{ $student->id }}{{ $subject->subject_id }}" name="mark[{{ $i }}][home_work]" style="width:200px;" placeholder="Digite as notas" value="{{ (empty($getMark->home_work) ? '' : $getMark->home_work . ' ') }}" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div style="margin-bottom: 10px;">
                                                        <div>
                                                            <input type="text" id="test_work_{{ $student->id }}{{ $subject->subject_id }}" name="mark[{{ $i }}][test_work]" style="width:200px;" placeholder="Digite as notas" value="{{ (empty($getMark->test_work) ? '' : $getMark->test_work . ' ') }}" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div style="margin-bottom: 10px;">
                                                        <div>
                                                            <input type="text" id="exam_{{ $student->id }}{{ $subject->subject_id }}" name="mark[{{ $i }}][exam]" style="width:200px;" placeholder="Digite as notas" class="form-control" value="{{ (empty($getMark->exam) ? '' : $getMark->exam . ' ') }}">
                                                        </div>
                                                    </div>

                                                    <div style="margin-bottom: 10px;">
                                                    <button type="button" class="btn btn-primary SaveSingleSubject" id="{{ $student->id }}" data-val="{{ $subject->subject_id }}" data-exam="{{ Request::get('exam_id') }}" data-class="{{ Request::get('class_id') }}">Salvar</button>
                                                </div>

                                        </td>
                                        @php
                                        $i++
                                        @endphp
                                        @endforeach
                                        <td>
                                            <button type="submit" class="btn btn-success">Guardar</button>
                                        </td>
                                    </form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                @endif

                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

</div>
@endsection

@section('script')

<script type="text/javascript">
    $(document).ready(function() {
        $('.SubmitForm').submit(function(e) {
            e.preventDefault();
            
            $.ajax({
                type: "POST",
                url: "{{ url('admin/examinations/submit_marks_register') }}",
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {
                    if (data.success) {
                        alert('Notas enviadas com sucesso!');
                    } else {
                        alert('Falha ao enviar as notas: ' + data.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert('Ocorreu um erro ao enviar as notas: ' + xhr.responseText);
                }
            });
        });
        
       $('.SaveSingleSubject').click(function(e) {
    var student_id = $(this).attr('id');
    var subject_id = $(this).attr('data-val');
    var exam_id = $(this).attr('data-exam');
    var class_id = $(this).attr('data-class');
    var class_work = $('#class_work_' + student_id + subject_id).val();
    var home_work = $('#home_work_' + student_id + subject_id).val();
    var test_work = $('#test_work_' + student_id + subject_id).val();
    var exam = $('#exam_' + student_id + subject_id).val();

    $.ajax({
        type: "POST",
        url: "{{ url('admin/examinations/single_submit_marks_register') }}",
        data: {
            '_token': '{{ csrf_token() }}',
            student_id: student_id,
            subject_id: subject_id,
            exam_id: exam_id,
            class_id: class_id,
            class_work: class_work,
            home_work: home_work,
            test_work: test_work,
            exam: exam
        },
        dataType: "json",
        success: function(data) {
            alert(data.message);
        }
    });
});

    });
</script>
@endsection