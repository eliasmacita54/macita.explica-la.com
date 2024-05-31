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
                                        <a href="{{ url('admin/examinations/avaliation_schedule') }}" class="btn btn-success"  style="margin-top:30px;">Redefinir</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    @include('_message')

                    <!-- Tabela de Horário de Avaliação -->
                    @if(!empty($getRecord))
                    <form action="{{ url('admin/examinations/avaliation_schedule_insert') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="exam_id" value="{{ Request::get('exam_id') }}">
                        <input type="hidden" name="class_id" value="{{ Request::get('class_id') }}">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Horário de Avaliação</h3>
                            </div>

                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nome da Disciplina</th>
                                            <th>Data</th>
                                            <th>Horário de Início</th>
                                            <th>Horário de Término</th>
                                            <th>Número da Sala</th>
                                            <th>Nota Máxima</th>
                                            <th>Nota de Aprovação</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php
                                        $i = 1;
                                        @endphp
                                        @foreach($getRecord as $value)
                                            <tr>
                                                <td>{{ $value['subject_name'] }}</td>
                                                <td><input type="date" class="form-control" value="{{ $value['exam_date'] }}" name="schedule[{{ $i }}][exam_date]"></td>
                                                <td><input type="time" class="form-control" value="{{ $value['start_time'] }}" name="schedule[{{ $i }}][start_time]"></td>
                                                <td><input type="time" class="form-control" value="{{ $value['end_time'] }}" name="schedule[{{ $i }}][end_time]"></td>
                                                <td><input type="text" class="form-control" value="{{ $value['room_number'] }}" name="schedule[{{ $i }}][room_number]"></td>
                                                <td><input type="text" class="form-control" value="{{ $value['full_marks'] }}" name="schedule[{{ $i }}][full_marks]"></td>
                                                <td><input type="text" class="form-control" value="{{ $value['passing_mark'] }}" name="schedule[{{ $i }}][passing_mark]"></td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>

                                <div style="text-align: center; padding:20px">
                                    <button class="btn btn-primary">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endif
                    <!-- Fim da Tabela de Horário de Avaliação -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>

@endsection
