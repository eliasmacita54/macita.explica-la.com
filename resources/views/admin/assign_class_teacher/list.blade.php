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
            <h1>Atribuir Professor da Turma {{ $getRecord->total() }}</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{ url('admin/assign_class_teacher/add')}}" class="btn btn-primary">Adicionar Novo Professor da Turma</a>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
          <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Buscar Professor da Turma</h3>
                    </div>
                    <form method="get" action="">

                      <div class="card-body">
                        <div class="row">
                        <div class="form-group col-md-3">
                          <label>Nome da Turma</label>
                          <input type="text" class="form-control" name="class_name" value="{{ Request::get('class_name')}}"   placeholder="Nome da Turma">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Nome do Professor</label>
                            <input type="text" class="form-control" name="subject_name" value="{{ Request::get('teacher_name')}}"   placeholder="Nome do Professor">
                          </div>
                        <div class="form-group col-md-3">
                            <label>Data</label>
                            <input type="date" class="form-control" name="date" value="{{ Request::get('date')}}" >
                          </div>

                          <div class="form-group col-md-3">
                            <label>Estado</label>
                            <select class="form-control" name="status">
                                  <option value="">Selecione</option>
                                  <option {{ (Request::get('status') == 100) ? 'selected' : ''}} value="100">Ativo</option>
                                  <option {{ (Request::get('status') == 1)  ? 'selected' : ''}} value="1">Inativo</option>
                            </select>
                          </div>

                        <div class="form-group col-md-3">
                            <button class=" btn btn-primary" type="submit" style="margin-top:30px;">Buscar</button>
                            <a href="{{ url('admin/assign_class_teacher/list') }}" class=" btn btn-success"  style="margin-top:30px;">Resetar</a>
                        </div>
                      </div>
                    </div>
                   </form>
                  </div>

            @include('_message')

            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabela de Professores da Turma</h3>

              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nome da Turma</th>
                      <th>Nome do Professor</th>
                      <th>Estado</th>
                      <th>Criado por</th>
                      <th>Data de Criação</th>
                      <th>Ação</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($getRecord as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{ $value->class_name }}</td>
                        <td>{{ $value->teacher_name }}</td>
                        <td>
                            @if($value->status == 0)
                            Ativo
                            @else
                            Inativo
                            @endif
                        </td>
                        <td>{{$value->created_by_name}}</td>
                        <td>{{date('d-m-y H:i A', strtotime($value->created_at))}}</td>
                        <td>
                            <a href="{{ url('admin/assign_class_teacher/edit/' .$value->id) }}" class="btn btn-primary">Editar</a>
                            <a href="{{ url('admin/assign_class_teacher/edit_single/' .$value->id) }}" class="btn btn-primary">Editar Único</a>
                            <a href="{{ url('admin/assign_class_teacher/delete/' .$value->id) }}" class="btn btn-danger">Deletar</a>

                        </td>
                    </tr>
                @endforeach
                  </tbody>
                </table>
                <div style=" padding: 10px; float: right;">
                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>
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
