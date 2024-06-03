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
          <div class="col-sm-6">
            <h1>Minha Conta</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Conteúdo Principal -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Coluna esquerda -->
          <div class="col-md-12">
          @include('_message')

            <div class="card card-primary">
                <form method="post" action=""  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Nome<span style="color: red;"> *</span> </label>
                                <input type="text" class="form-control" name="name" value="{{ old('name',$getRecord->name) }}" required placeholder="Nome">
                                <div style="color: red">{{ $errors->first('name') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Sobrenome<span style="color: red;"> *</span></label>
                                <input type="text" class="form-control" name="last_name" value="{{ old('last_name',$getRecord->last_name) }}" required placeholder="Sobrenome">
                                <div style="color: red">{{ $errors->first('last_name') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Data de Nascimento<span style="color: red;"> *</span></label>
                                <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth',$getRecord->date_of_birth) }}" required placeholder="Data de Nascimento">
                                <div style="color: red">{{ $errors->first('date_of_birth') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Número de Celular<span style="color: red;"> *</span></label>
                                <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number',$getRecord->mobile_number) }}" required placeholder="Número de Celular">
                                <div style="color: red">{{ $errors->first('mobile_number') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Estado Civil<span style="color: red;"> *</span></label>
                                <input type="text" class="form-control" name="marital_status" value="{{ old('marital_status',$getRecord->marital_status) }}" required placeholder="Estado Civil">
                                <div style="color: red">{{ $errors->first('marital_status') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Foto de Perfil<span style="color: red;"> *</span></label>
                                <input type="file" class="form-control" name="profile_pic">
                                <div style="color: red">{{ $errors->first('profile_pic') }}</div>
                                @if(!empty($getRecord->getProfile()))
                                <img src="{{ $getRecord->getProfile() }}" style="width: auto; height:50px;">
                                @endif
                            </div>
            
                            <div class="form-group col-md-6">
                                <label>Endereço<span style="color: red;"> *</span></label>
                                <input type="text" class="form-control" name="address" value="{{ old('address',$getRecord->address) }}" required>
                                <div style="color: red">{{ $errors->first('address') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Gênero<span style="color: red;"> *</span></label>
                                <select class="form-control" required name="gender">
                                    <option value="">Selecione o Gênero</option>
                                    <option  {{ (old('gender' ,$getRecord->gender) == 'Male') ? 'selected' : '' }} value="Male">Masculino</option>
                                    <option  {{ (old('gender' ,$getRecord->gender) == 'Female') ?  'selected' : '' }} value="Female">Feminino</option>
                                </select>
                            </div>
                            <div style="color: red">{{ $errors->first('gender ') }}</div>

                            <div class="form-group col-md-6">
                                <label>Qualificação<span style="color: red;"> *</span></label>
                                <textarea class="form-control" name="qualification" placeholder="Qualificação">{{ old('qualification',$getRecord->qualification) }}</textarea>
                                <div style="color: red">{{ $errors->first('qualification') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Experiência de Trabalho<span style="color: red;"> *</span></label>
                                <textarea class="form-control" name="work_expirience" placeholder="Experiência de Trabalho">{{ old('work_expirience',$getRecord->work_expirience) }}</textarea>
                                <div style="color: red">{{ $errors->first('work_expirience') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Status<span style="color: red;"> *</span></label>
                                <select class="form-control" required name="status">
                                    <option value="">Selecione o status</option>
                                    <option {{ (old('status', $getRecord->status) == '0') ? 'selected' : '' }} value="0">Ativo</option>
                                    <option {{ (old('status ', $getRecord->status) == '1') ? 'selected' : '' }} value="1">Inativo</option>
                                </select>
                                <div style="color: red">{{ $errors->first('status') }}</div>
                            </div>
                        </div>

                        <hr/>
                        <div class="form-group">
                            <label>Email<span style="color: red;"> *</span></label>
                            <input type="email" class="form-control" name="email" value="{{ old('email',$getRecord->email) }}" required placeholder="Digite o email">
                            <div style="color: red">{{ $errors->first('email') }}</div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>
                    </div><!-- /.card-body -->
                </form>
            </div>
    <!-- /.conteúdo -->
        </div>
        <!-- /.linha.container-fluid -->
    </section>
  @endsection
