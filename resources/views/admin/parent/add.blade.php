@extends('layouts.app')
@section('style')
<style type="text/css">
</style>
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Cabeçalho do Conteúdo (Página) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Adicionar Novo Encarregado</h1>
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
            <!-- Elementos de formulário gerais -->
            <div class="card card-primary">
              <form method="post" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Nome<span style="color: red;"> *</span></label>
                      <input type="text" class="form-control" name="name" value="{{ old('name') }}" required placeholder="Nome">
                      <div style="color: red">{{ $errors->first('name') }}</div>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Sobrenome<span style="color: red;"> *</span></label>
                      <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required placeholder="Sobrenome">
                      <div style="color: red">{{ $errors->first('last_name') }}</div>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Gênero<span style="color: red;"> *</span></label>
                      <select class="form-control" required name="gender">
                        <option value="">Selecione o Gênero</option>
                        <option {{ (old('gender') == 'Male') ? 'selected' : '' }} value="Male">Masculino</option>
                        <option {{ (old('gender') == 'Female') ? 'selected' : '' }} value="Female">Feminino</option>
                      </select>
                    </div>
                    <div style="color: red">{{ $errors->first('gender') }}</div>

                    <div class="form-group col-md-6">
                      <label>Telefone<span style="color: red;"> *</span></label>
                      <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number') }}" required placeholder="Número de Telefone">
                      <div style="color: red">{{ $errors->first('mobile_number') }}</div>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Ocupação<span style="color: red;"> *</span></label>
                      <input type="text" class="form-control" name="occupation" value="{{ old('occupation') }}" required placeholder="Ocupação">
                      <div style="color: red">{{ $errors->first('occupation') }}</div>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Endereço<span style="color: red;"> *</span></label>
                      <input type="text" class="form-control" name="address" value="{{ old('address') }}" required placeholder="Endereço">
                      <div style="color: red">{{ $errors->first('address') }}</div>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Status<span style="color: red;"> *</span></label>
                      <select class="form-control" required name="status">
                        <option value="">Selecione o status</option>
                        <option {{ (old('status') == '0') ? 'selected' : '' }} value="0">Ativo</option>
                        <option {{ (old('status') == '1') ? 'selected' : '' }} value="1">Inativo</option>
                      </select>
                      <div style="color: red">{{ $errors->first('status') }}</div>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Foto de Perfil<span style="color: red;"> *</span></label>
                      <input type="file" class="form-control" name="profile_pic">
                      <div style="color: red">{{ $errors->first('profile_pic') }}</div>
                    </div>
                  </div>

                  <hr/>
                  <div class="form-group">
                    <label for="email">Email<span style="color: red;"> *</span></label>
                    <input type="email" class="form-control" name="email" required placeholder="Email">
                    <div style="color: red">{{ $errors->first('email') }}</div>
                  </div>

                  <div class="form-group">
                    <label for="password">Senha<span style="color: red;"> *</span></label>
                    <input type="password" class="form-control" name="password" required placeholder="Senha">
                    <div style="color: red">{{ $errors->first('password') }}</div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection
