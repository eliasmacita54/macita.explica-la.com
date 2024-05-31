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
          <div class="col-sm-12">
            <h1>Lista de Professores (Total: {{$getRecord->total()}})</h1>
          </div>
          <div class="col-sm-12" style="text-align: right;">
            <a href="{{ url('admin/teacher/add') }}" class="btn btn-primary">Adicionar Novo Professor</a>
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
                    <h3 class="card-title">Pesquisar Professor</h3>
                </div>
                <form method="get" action="">
                  <div class="card-body">
                    <div class="row">
                      <div class="form-group col-md-2">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}" placeholder="Nome">
                      </div>

                      <div class="form-group col-md-2">
                        <label>Sobrenome</label>
                        <input type="text" class="form-control" name="last_name" value="{{ Request::get('last_name') }}" placeholder="Sobrenome">
                      </div>

                      <div class="form-group col-md-2">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="{{ Request::get('email') }}" placeholder="Digite o email">
                      </div>

                      <div class="form-group col-md-3">
                        <label>Gênero</label>
                        <select class="form-control" name="gender">
                            <option value="">Selecione o Gênero</option>
                            <option {{ (Request::get('gender') == 'Male') ? 'selected' : '' }} value="Male">Masculino</option>
                            <option {{ (Request::get('gender') == 'Female') ? 'selected' : '' }} value="Female">Feminino</option>
                        </select>
                      </div>

                      <div class="form-group col-md-2">
                        <label>Data de Nascimento</label>
                        <input type="date" class="form-control" name="date_of_birth" value="{{ Request::get('date_of_birth') }}" placeholder="Data de Nascimento">
                      </div>

                      <div class="form-group col-md-2">
                        <label>Número de Telefone</label>
                        <input type="text" class="form-control" name="mobile_number" value="{{ Request::get('mobile_number') }}" placeholder="Número de Telefone">
                      </div>

                      <div class="form-group col-md-2">
                        <label>Data de Admissão</label>
                        <input type="date" class="form-control" name="admission_date" value="{{ Request::get('admission_date') }}" placeholder="">
                      </div>

                      <div class="form-group col-md-2">
                        <label>Estado Civil</label>
                        <input type="text" class="form-control" name="marital_status" value="{{ Request::get('marital_status') }}" placeholder="Estado Civil">
                      </div>

                      <div class="form-group col-md-3">
                        <label>Status<span style="color: red;"> *</span></label>
                        <select class="form-control" name="status">
                            <option value="">Selecione o Status</option>
                            <option {{ (old('status') == 100) ? 'selected' : '' }} value="100">Ativo</option>
                            <option {{ (old('status') == 1) ? 'selected' : '' }} value="1">Inativo</option>
                        </select>
                        <div style="color: red">{{ $errors->first('status') }}</div>
                      </div>

                      <div class="form-group col-md-2">
                        <label>Data de Criação</label>
                        <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}" placeholder="Digite a Data">
                      </div>
                      <div class="form-group col-md-3">
                        <button class="btn btn-primary" type="submit" style="margin-top:30px;">Pesquisar</button>
                        <a href="{{ url('admin/teacher/list') }}" class="btn btn-success" style="margin-top:30px;">Resetar</a>
                      </div>
                    </div>
                  </div>
               </form>
            </div>

            @include('_message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabela de Professores</h3>
              </div>

              <div class="card-body p-0" style="overflow: auto;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Foto de Perfil</th>
                      <th>Nome do Professor</th>
                      <th>Email</th>
                      <th>Gênero</th>
                      <th>Data de Nascimento</th>
                      <th>Número de Telefone</th>
                      <th>Data de Admissão</th>
                      <th>Endereço</th>
                      <th>Qualificação</th>
                      <th>Experiência de Trabalho</th>
                      <th>Observações</th>
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
                                    <img src="{{ $value->getProfile() }}" style="width: 50px; width: 50px; border-radius: 50%">
                                @endif
                            </td>
                            <td>{{$value->name}} {{ $value->last_name}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{($value->gender == 0) ? 'Masculino' : 'Feminino'}}</td>
                            <td>
                                @if(!empty($value->date_of_birth))
                                {{date('d-m-Y', strtotime($value->date_of_birth)) }}
                                @endif
                            </td>
                            <td>{{$value->mobile_number}}</td>
                            <td>
                                @if(!empty($value->adminssion_date))
                                {{date('d-m-Y', strtotime($value->adminssion_date)) }}
                                @endif
                            </td>
                            <td>{{$value->address}}</td>
                            <td>{{$value->qualification}}</td>
                            <td>{{$value->work_expirience}}</td>
                            <td>{{$value->note}}</td>
                            <td>{{($value->status == 0) ? 'Ativo' : 'Inativo' }}</td>
                            <td>{{date('d-m-y H:i A', strtotime($value->created_at))}}</td>
                            <td style="min-width: 150px;">
                                <a href="{{ url('admin/teacher/edit/' . $value->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                <a href="{{ url('admin/teacher/delete/' . $value->id) }}" class="btn btn-danger btn-sm">Deletar</a>
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
      </div>
    </section>
</div>
@endsection
