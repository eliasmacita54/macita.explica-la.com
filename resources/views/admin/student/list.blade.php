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
                    <h1>Lista de Estudantes (Total: {{$getRecord->total()}})</h1>
                </div>
                <div class="col-sm-12" style="text-align: right;">
                    <a href="{{ url('admin/student/add')}}" class="btn btn-primary">Adicionar Novo Estudante</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Conteúdo Principal -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Pesquisar Estudante</h3>
                        </div>
                        <form method="get" action="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" name="name" value="{{ Request::get('name')}}" placeholder="Nome">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Sobrenome</label>
                                        <input type="text" class="form-control" name="last_name" value="{{ Request::get('last_name')}}" placeholder="Sobrenome">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email" value="{{ Request::get('email')}}" placeholder="Digite o email">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Número de Admissão</label>
                                        <input type="text" class="form-control" name="admission_number" value="{{ Request::get('admission_number')}}" placeholder="Número de Admissão">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Número de Registro</label>
                                        <input type="text" class="form-control" name="roll_number" value="{{ Request::get('roll_number')}}" placeholder="Número de Registro">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Classe</label>
                                        <input type="text" class="form-control" name="class_name" value="{{ Request::get('class_name')}}" placeholder="Classe">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Gênero</label>
                                        <select class="form-control" name="gender">
                                            <option value="">Selecione o Gênero</option>
                                            <option {{ (Request::get('gender') == 0) ? 'selected' : '' }} value="0">Masculino</option>
                                            <option {{ (Request::get('gender') == 1) ? 'selected' : '' }} value="1">Feminino</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Casta</label>
                                        <input type="text" class="form-control" name="caste" value="{{ Request::get('caste')}}" placeholder="Digite a casta">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Religião</label>
                                        <input type="text" class="form-control" name="religion" value="{{ Request::get('religion')}}" placeholder="Digite a religião">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Número de Celular</label>
                                        <input type="text" class="form-control" name="mobile_number" value="{{ Request::get('mobile_number')}}" placeholder="Digite o número de celular">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Grupo Sanguíneo</label>
                                        <input type="text" class="form-control" name="blood_group" value="{{ Request::get('blood_group')}}" placeholder="Digite o grupo sanguíneo">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Data de Admissão</label>
                                        <input type="date" class="form-control" name="admission_date" value="{{ Request::get('admission_date')}}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Data</label>
                                        <input type="date" class="form-control" name="date" value="{{ Request::get('date')}}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <button class="btn btn-primary" type="submit" style="margin-top:30px;">Pesquisar</button>
                                        <a href="{{ url('admin/student/list') }}" class="btn btn-success" style="margin-top:30px;">Resetar</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    @include('_message')

                    <!-- Tabela de Estudantes -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabela de Estudantes</h3>
                        </div>
                        <div class="card-body p-0" style="overflow: auto;">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Foto de Perfil</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Número de Admissão</th>
                                        <th>Número de Registro</th>
                                        <th>Classe</th>
                                        <th>Gênero</th>
                                        <th>Data de Nascimento</th>
                                        <th>Casta</th>
                                        <th>Religião</th>
                                        <th>Número de Celular</th>
                                        <th>Data de Admissão</th>
                                        <th>Grupo Sanguíneo</th>
                                        <th>Altura</th>
                                        <th>Peso</th>
                                        <th>Status</th>
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
                                            @if(!empty($value->admission_date))
                                            {{date('d-m-Y', strtotime($value->admission_date)) }}
                                            @endif
                                        </td>
                                        <td>{{$value->blood_group}}</td>
                                        <td>{{$value->height}}</td>
                                        <td>{{$value->weight}}</td>
                                        <td>{{($value->status == 0) ? 'Ativo' : 'Inativo' }}</td>
                                        <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                                        <td style="min-width: 150px;">
                                            <a href="{{ url('admin/student/edit/' .$value->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                            <a href="{{ url('admin/student/delete/' .$value->id) }}" class="btn btn-danger btn-sm">Excluir</a>
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

                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
