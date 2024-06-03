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

          <div class="col-sm-12">
            <h1>Meus Alunos</h1>
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

         <div class="card">

            <div class="card-header">
            <!-- /.card-header -->
            <div class="card-body p-0" style="overflow:auto">
                <h3 class="card-title">Meus Alunos</h3>
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Foto de Perfil</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Número de Admissão</th>
                        <th>Número de Registro</th>
                        <th>Turma</th>
                        <th>Gênero</th>
                        <th>Data de Nascimento</th>
                        <th>Casta</th>
                        <th>Religião</th>
                        <th>Número de Celular</th>
                        <th>Data de Admissão</th>
                        <th>Grupo Sanguíneo</th>
                        <th>Altura</th>
                        <th>Peso</th>
                        <th>Data de Criação</th>
                        <th>Ação</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($getRecord as $value)
                      <tr>
                          <td>{{$value->id}}</td>
                          <td>
                                @if(!empty($value->getProfile()))
                                    <img src="{{ $value->getProfile() }}" style="width: 50px; height: 50px; border-radius: 50%">
                                @endif
                                </td>
                                <td>{{$value->name}} {{ $value->last_name}}</td>
                                <td>{{$value->email}}</td>
                                <td>{{$value->admission_number}}</td>
                                <td>{{$value->roll_number}}</td>
                                <td>{{$value->class_name}}</td>
                                <td>{{($value->gender == 0) ? 'Masculino' : 'Feminino'}}</td>
                                <td>
                                @if(!empty($value->date_of_birth))
                                {{date('d-m-Y', strtotime($value->date_of_birth)) }}
                                @endif
                                </td>
                                <td>{{$value->caste}}</td>
                                <td>{{$value->religion}}</td>
                                <td>{{$value->mobile_number}}</td>
                                <td>
                                @if(!empty($value->adminssion_date))
                                {{date('d-m-Y', strtotime($value->adminssion_date)) }}
                                @endif
                                </td>
                                <td>{{$value->blood_group}}</td>
                                <td>{{$value->height}}</td>
                                <td>{{$value->weight}}</td>

                         <!-- <td>{{$value->updated_at}}</td>-->
                          <td>{{date('d-m-y H:i A', strtotime($value->created_at))}}</td>
                        <td style="width: 350px;">
                            <a class="btn btn-success btn-sm" href="{{ url('parent/my_student/subject/'.$value->id) }}">Matérias</a>
                            <a class="btn btn-primary btn-sm" href="{{ url('parent/my_student/exam_timetable/'.$value->id) }}">
                                Meu Horário de Provas</a>

                                <a class="btn btn-warning btn-sm" href="{{ url('parent/my_student/calendar/'.$value->id) }}">Calendário</a>
                        </td>

                      </tr>
                  @endforeach
                    </tbody>
                  </table>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
