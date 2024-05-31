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
                    <h1>Lista de Avaliações (Total: {{$getRecord->total()}})</h1>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{ url('admin/examinations/exam/add')}}" class="btn btn-primary">Adicionar nova Avaliação</a>
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
                            <h3 class="card-title">Pesquisar Avaliações</h3>
                        </div>
                        <form method="get" action="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>Nome da Avaliação</label>
                                        <input type="text" class="form-control" name="name" value="{{ Request::get('name')}}" placeholder="Nome">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Data</label>
                                        <input type="date" class="form-control" name="date" value="{{ Request::get('date')}}" placeholder="Digite o e-mail">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <button class="btn btn-primary" type="submit" style="margin-top:30px;">Pesquisar</button>
                                        <a href="{{ url('admin/examinations/exam/list') }}" class="btn btn-success" style="margin-top:30px;">Redefinir</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    @include('_message')

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabela de Avaliações</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome da Avaliação</th>
                                        <th>Nota</th>
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
                                        <td>{{$value->note}}</td>
                                        <td>{{$value->created_name}}</td>
                                        <td>{{date('d-m-y H:i A', strtotime($value->created_at))}}</td>
                                        <td><a href="{{ url('admin/examinations/exam/edit/' .$value->id) }}" class="btn btn-primary">Editar</a>
                                            <a href="{{ url('admin/examinations/exam/delete/' .$value->id) }}" class="btn btn-danger">Excluir</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="padding: 10px; float: right;">
                                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
