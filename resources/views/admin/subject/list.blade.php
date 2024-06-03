@extends('layouts.app')

@section('style')
<style type="text/css">
</style>
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Cabeçalho do Conteúdo (Cabeçalho da página) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lista de Disciplinas</h1>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{ url('admin/subject/add') }}" class="btn btn-primary">Adicionar nova Disciplina</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Conteúdo Principal -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Buscar Disciplina</h3>
                        </div>
                        <form method="get" action="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}" placeholder="Nome">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Tipo de Disciplina</label>
                                        <select class="form-control" name="type">
                                            <option value="">Selecione o Tipo</option>
                                            <option {{ (Request::get('type') == "Theory") ? 'selected' : '' }} value="Theory">Teoria</option>
                                            <option {{ (Request::get('type') == "Pratical") ? 'selected' : '' }} value="Pratical">Prática</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Data</label>
                                        <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <button class="btn btn-primary" type="submit" style="margin-top:30px;">Buscar</button>
                                        <a href="{{ url('admin/subject/list') }}" class="btn btn-success" style="margin-top:30px;">Redefinir</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    @include('_message')

                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabela de Disciplinas</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Tipo</th>
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
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->type}}</td>
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
                                            <a href="{{ url('admin/subject/edit/' .$value->id) }}" class="btn btn-primary">Editar</a>
                                            <a href="{{ url('admin/subject/delete/' .$value->id) }}" class="btn btn-danger">Excluir</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
