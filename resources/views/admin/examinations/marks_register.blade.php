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
                            {{ csrf_field()}}
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
                                        <a href="{{ url('admin/examinations/marks_register') }}" class="btn btn-success"  style="margin-top:30px;">Redefinir</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    @include('_message')
                    @if(!empty($getSubject) && !empty($getSubject->count()))
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
                                        <th>Acção</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($getSubject) && !empty($getSubject->count()))
                                    @foreach($getStudent as $student)
                                    <form name="post" class="SubmitForm"></form>
                                    {{ csrf_field()}}
                                    <tr>
                                        <td>{{ $student->name}} {{ $student->last_name}}</td>
                                        @foreach($getSubject as $subject)
                                        <td>
                                            <div style="margin-bottom:10px">
                                            Test 1
                                            <input type="text" name="" style="width:200px" class="form-control">
                                        </div>
                                        <div style="margin-bottom:10px">
                                            Test 2
                                            <input type="text" name="" style="width:200px" class="form-control">
                                        </div>
                                        <div style="margin-bottom:10px">
                                            Home work(Trabalho de casa)
                                            <input type="text" name="" style="width:200px" class="form-control">
                                        </div>
                                        <div style="margin-bottom:10px">
                                            Trabalho(Teorico/Pratico)
                                            <input type="text" name="" style="width:200px" class="form-control">
                                        </div>
                                        </td>
                                        @endforeach
                                        <td>
                                            <button type="button" class="btn btn-success">Guardar</button>
                                        </td>
                                    </td>
                                    </tr>
                                    @endforeach
                                    @endif
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

<script type="""text/javascript>
    $('.SubmitForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "{{ url('admin/examinations/submit_marks_register') }}",
            data: $(this).serialize(),
            dataType : "json",
            success:function(data) {

            }
        });

    })
    </script>

@endsection
