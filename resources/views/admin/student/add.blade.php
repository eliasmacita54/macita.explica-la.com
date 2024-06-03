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
                <div class="col-sm-12">
                    <h1>Lista de Estudantes do Pai ({{ $getParent->name}} {{ $getParent->last_name}})</h1>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Pesquisar Estudante</h3>
                        </div>
                        <form method="get" action="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>ID do Estudante</label>
                                        <input type="text" class="form-control" name="id" value="{{ Request::get('id')}}" placeholder="ID do Estudante">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" name="name" value="{{ Request::get('name')}}" placeholder="Nome">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Sobrenome</label>
                                        <input type="text" class="form-control" name="last_name" value="{{ Request::get('last_name')}}" placeholder="Sobrenome">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Corrreio Electronico</label>
                                        <input type="text" class="form-control" name="email" value="{{ Request::get('email')}}" placeholder="Digite o email">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <button class="btn btn-primary" type="submit" style="margin-top:30px;">Pesquisar</button>
                                        <a href="{{ url('admin/parent/my-student/' .$parent_id) }}" class="btn btn-success" style="margin-top:30px;">Resetar</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    @include('_message')

                    <!-- /.card -->
                    @if(!empty($getSeachStudent))
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lista de Estudantes</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Foto de Perfil</th>
                                        <th>Nome do Estudante</th>
                                        <th>Email</th>
                                        <th>Nome do Pai</th>
                                        <th>Data de Criação</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getSeachStudent as $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>
                                            @if(!empty($value->getProfile()))
                                            <img src="{{ $value->getProfile() }}" style="width: 50px; width: 50px; border-radius: 50%">
                                            @endif
                                        </td>
                                        <td>{{$value->name}} {{ $value->last_name}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{$value->parent_name}}</td>
                                        <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                                        <td style="min-width: 150px;">
                                            <a href="{{ url('admin/parent/assign_student_parent/'.$value->id.'/'.$parent_id) }}" class="btn btn-primary btn-sm">Adicionar Estudante ao Pai</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="padding: 10px; float: right;">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    @endif
                    <!-- /.card -->
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista de Pais</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Foto de Perfil</th>
                                    <th>Nome do Estudante</th>
                                    <th>Email</th>
                                    <th>Nome do Pai</th>
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
                                        <img src="{{ $value->getProfile() }}" style="width: 50px; width: 50px; border-radius: 50%">
                                        @endif
                                    </td>
                                    <td>{{$value->name}} {{ $value->last_name}}</td>
                                    <td>{{$value->email}}</td>
                                    <td>{{$value->parent_name}}</td>
                                    <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                                    <td style="min-width: 150px;">
                                        <a href="{{ url('admin/parent/assign_student_parent_delete/' .$value->id) }}" class="btn btn-danger btn-sm">Excluir Atribuição</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="padding: 10px; float: right;">
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection
