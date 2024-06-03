@extends('layouts.app')
    @section('style')
    <style type="text/css">
    </style>

   @section('content')

   <div class="content-wrapper">
    <!-- Cabeçalho do Conteúdo (Cabeçalho da Página) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-6">
            <h1>Minhas Turmas e Disciplinas</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Conteúdo Principal -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">

            @include('_message')

            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                    <h3 class="card-title">Tabela de Minhas Turmas e Disciplinas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Nome da Turma</th>
                      <th>Nome da Disciplina</th>
                      <th>Tipo da Disciplina</th>
                      <th>Meu Horário de Aula</th>
                      <th>Data de Criação</th>
                      <th>Ação</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($getRecord as $value)
                    <tr>
                        <td>{{ $value->class_name }}</td>
                        <td>{{ $value->subject_name }}</td>
                        <td>{{ $value->subject_type }}</td>
                        <td>
                        @php
                        $ClassSubject = $value->getMyTimeTable($value->class_id, $value->subject_id);
                         @endphp
                        @if(!empty($ClassSubject))

                         {{ date('h:i A',strtotime($ClassSubject->start_time)) }} até {{ date('h:i A',strtotime($ClassSubject->end_time)) }}
                        </br>
                        Sala número: {{ $ClassSubject->room_number }}
                        @endif
                        </td>
                        <td>{{date('d-m-y H:i A', strtotime($value->created_at))}}</td>
                        <td>
                            <a href="{{ url('teacher/my_class_subject/class_timetable/'.$value->class_id.'/'.$value->subject_id) }}" class="btn btn-primary">Meu Horário de Aula</a>
                        </td>
                    </tr>
                @endforeach
                  </tbody>
                </table>

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
