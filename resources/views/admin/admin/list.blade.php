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
                    <h1>Lista de Administradores (Total: {{$getRecord->total()}})</h1>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{ url('admin/admin/add')}}" class="btn btn-primary">Adicionar Novo Administrador</a>
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
                            <h3 class="card-title">Pesquisar Administrador</h3>
                        </div>
                        <form method="get" action="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" name="name" value="{{ Request::get('name')}}" placeholder="Nome">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Correio Eletronico</label>
                                        <input type="text" class="form-control" name="email" value="{{ Request::get('email')}}" placeholder="Digite o email">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Data</label>
                                        <input type="date" class="form-control" name="date" value="{{ Request::get('date')}}" placeholder="Digite a data">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <button class="btn btn-primary" type="submit" style="margin-top:30px;">Pesquisar</button>
                                        <a href="{{ url('admin/admin/list') }}" class="btn btn-success" style="margin-top:30px;">Resetar</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    @include('_message')

                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabela de Administradores</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Correio Eletronico</th>
                                        <th>Data de Criação</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{date('d-m-y H:i A', strtotime($value->created_at))}}</td>
                                        <td>
                                            <a href="{{ url('admin/admin/edit/' .$value->id) }}" class="btn btn-primary">Editar</a>
                                            <a href="{{ url('admin/admin/delete/' .$value->id) }}" class="btn btn-danger">Excluir</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="padding: 10px; float: right;">
                                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
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
