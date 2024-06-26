@extends('layouts.app')
    @section('style')
    <style type="text/css">
    </style>
    @endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista de Disciplinas Atribuídas</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{ url('admin/assign_subject/add')}}" class="btn btn-primary">Adicionar Nova Disciplina Atribuída</a>
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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pesquisar Disciplina Atribuída</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label>Nome da Turma</label>
                      <input type="text" class="form-control" name="class_name" value="{{ Request::get('class_name')}}" placeholder="Nome da Turma">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Nome da Disciplina</label>
                      <input type="text" class="form-control" name="subject_name" value="{{ Request::get('subject_name')}}" placeholder="Nome da Disciplina">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Data</label>
                      <input type="date" class="form-control" name="date" value="{{ Request::get('date')}}">
                    </div>
                    <div class="form-group col-md-3">
                      <button class="btn btn-primary" type="submit" style="margin-top:30px;">Pesquisar</button>
                      <a href="{{ url('admin/assign_subject/list') }}" class="btn btn-success" style="margin-top:30px;">Redefinir</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>

            @include('_message')

            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabela de Disciplinas Atribuídas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nome da Turma</th>
                      <th>Nome da Disciplina</th>
                      <th>Status</th>
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
                        <td>{{ $value->subject_name }}</td>
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
                            <a href="{{ url('admin/assign_subject/edit/' .$value->id) }}" class="btn btn-primary">Editar</a>
                            <a href="{{ url('admin/assign_subject/edit_single/' .$value->id) }}" class="btn btn-primary">Editar Único</a>
                            <a href="{{ url('admin/assign_subject/delete/' .$value->id) }}" class="btn btn-danger">Excluir</a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div style="padding: 10px; float: right;">
                    {!! $getRecord->appends(\Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>
              </div>
              <!-- /.card-body -->
            </div>
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
