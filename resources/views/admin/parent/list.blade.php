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
            <h1>Lista de Pais (Total: {{$getRecord->total()}})</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{ url('admin/parent/add')}}" class="btn btn-primary"> Adicionar Novo Administrador</a>
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
                  <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Pesquisar Pais</h3>
                    </div>
                    <form method="get" action="">

                      <div class="card-body">
                        <div class="row">
                        <div class="form-group col-md-3">
                          <label>Nome</label>
                          <input type="text" class="form-control" name="name" value="{{ Request::get('name')}}"   placeholder="Nome">
                        </div>

                        <div class="form-group col-md-3">
                            <label>Sobrenome</label>
                            <input type="text" class="form-control" name="last_name" value="{{ Request::get('last_name')}}"   placeholder="Sobrenome">
                          </div>

                        <div class="form-group col-md-3">
                          <label>Email</label>
                          <input type="text" class="form-control" name="email" value="{{ Request::get('email')}}"  placeholder="Digite o email">
                        </div>

                        <div class="form-group col-md-3">
                            <label>Gênero</label>
                            <select class="form-control"  name="gender">
                                <option value="">Selecione o Gênero</option>
                                <option  {{ (old('gender') == 'Male') ? 'selected' : '' }} value="Male">Masculino</option>
                                <option  {{ (old('gender') == 'Female') ?  'selected' : '' }} value="Female">Feminino</option>
                            </select>
                        </div>

                        <div style="color: red">{{ $errors->first('gender') }}</div>

                        <div class="form-group col-md-3">
                            <label>Telefone<span style="color: red;"> *</span></label>
                            <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number') }}"  placeholder="Número de Telefone">
                            <div style="color: red">{{ $errors->first('mobile_number') }}</div>
                        </div>

                        <div class="form-group col-md-3">
                            <label>Ocupação<span style="color: red;"> *</span></label>
                            <input type="text" class="form-control" name="occupation" value="{{ old('occupation') }}"  placeholder="Ocupação">
                            <div style="color: red">{{ $errors->first('occupation') }}</div>
                        </div>

                        <div class="form-group col-md-3">
                            <label>Endereço<span style="color: red;"> *</span></label>
                            <input type="text" class="form-control" name="address" value="{{ old('address') }}"  placeholder="Endereço">
                            <div style="color: red">{{ $errors->first('address') }}</div>
                        </div>

                        <div class="form-group col-md-3">
                            <label>Status<span style="color: red;"> *</span></label>
                            <select class="form-control"  name="status">
                                <option value="">Selecione o Status</option>
                                <option {{ (old('status') == 100) ? 'selected' : '' }} value="100">Ativo</option>
                                <option {{ (old('status') == 1) ? 'selected' : '' }} value="1">Inativo</option>
                            </select>
                            <div style="color: red">{{ $errors->first('status') }}</div>
                        </div>

                        <div class="form-group col-md-3">
                            <label>Data</label>
                            <input type="date" class="form-control" name="date" value="{{ Request::get('date')}}"  placeholder="Digite a data">
                          </div>
                        <div class="form-group col-md-3">
                            <button class=" btn btn-primary" type="submit" style="margin-top:30px;">Pesquisar</button>
                            <a href="{{ url('admin/parent/list') }}" class=" btn btn-success"  style="margin-top:30px;">Resetar</a>
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

              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Foto de Perfil</th>
                      <th>Nome</th>
                      <th>Email</th>
                      <th>Gênero</th>
                      <th>Telefone</th>
                      <th>Ocupação</th>
                      <th>Endereço</th>
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
                            <td>{{$value->gender}}</td>
                            <td>{{$value->mobile_number}}</td>
                            <td>{{$value->occupation}}</td>
                            <td>{{$value->address}}</td>
                            <td>{{($value->status == 0) ? 'Ativo' : 'Inativo' }}</td>
                            <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                            <td>
                                <a href="{{ url('admin/parent/edit/' .$value->id) }}" class="btn btn-primary">Editar</a>
                                <a href="{{ url('admin/parent/delete/' .$value->id) }}" class="btn btn-danger">Excluir</a>
                                <a href="{{ url('admin/parent/my-student/' .$value->id) }}" class="btn btn-primary">Meus Alunos</a>
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
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
