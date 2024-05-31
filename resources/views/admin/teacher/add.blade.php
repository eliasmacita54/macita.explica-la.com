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
                    <h1>Adicionar Novo Professor</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Conteúdo Principal -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- coluna esquerda -->
                <div class="col-md-12">
                    @include('_message')
                    <!-- elementos do formulário geral -->
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
                                        <label>Data de Nascimento<span style="color: red;"> *</span></label>
                                        <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}" required placeholder="Data de Nascimento">
                                        <div style="color: red">{{ $errors->first('date_of_birth') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Data de Admissão<span style="color: red;"> *</span></label>
                                        <input type="date" class="form-control" name="adminssion_date" value="{{ old('adminssion_date') }}" required placeholder="Data de Admissão">
                                        <div style="color: red">{{ $errors->first('adminssion_date') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Número de Telefone<span style="color: red;"> *</span></label>
                                        <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number') }}" required placeholder="Número de Telefone">
                                        <div style="color: red">{{ $errors->first('mobile_number') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Estado Civil<span style="color: red;"> *</span></label>
                                        <input type="text" class="form-control" name="marital_status" value="{{ old('marital_status') }}" required placeholder="Estado Civil">
                                        <div style="color: red">{{ $errors->first('marital_status') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Foto de Perfil<span style="color: red;"> *</span></label>
                                        <input type="file" class="form-control" name="profile_pic">
                                        <div style="color: red">{{ $errors->first('profile_pic') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Endereço<span style="color: red;"> *</span></label>
                                        <input type="text" class="form-control" name="address" value="{{ old('address') }}" required>
                                        <div style="color: red">{{ $errors->first('address') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Gênero<span style="color: red;"> *</span></label>
                                        <select class="form-control" required name="gender">
                                            <option value="">Selecione o Gênero</option>
                                            <option {{ (old('gender') == 'Male') ? 'selected' : '' }} value="Male">Masculino</option>
                                            <option {{ (old('gender') == 'Female') ? 'selected' : '' }} value="Female">Feminino</option>
                                        </select>
                                        <div style="color: red">{{ $errors->first('gender') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Qualificação<span style="color: red;"> *</span></label>
                                        <textarea class="form-control" name="qualification" placeholder="Qualificação">{{ old('qualification') }}</textarea>
                                        <div style="color: red">{{ $errors->first('qualification') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Experiência de Trabalho<span style="color: red;"> *</span></label>
                                        <textarea class="form-control" name="work_expirience" placeholder="Experiência de Trabalho">{{ old('work_expirience') }}</textarea>
                                        <div style="color: red">{{ $errors->first('work_expirience') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Observações<span style="color: red;"> *</span></label>
                                        <textarea class="form-control" name="note" placeholder="Observações">{{ old('note') }}</textarea>
                                        <div style="color: red">{{ $errors->first('note') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Status<span style="color: red;"> *</span></label>
                                        <select class="form-control" required name="status">
                                            <option value="">Selecione o Status</option>
                                            <option {{ (old('status') == '0') ? 'selected' : '' }} value="0">Ativo</option>
                                            <option {{ (old('status') == '1') ? 'selected' : '' }} value="1">Inativo</option>
                                        </select>
                                        <div style="color: red">{{ $errors->first('status') }}</div>
                                    </div>
                                </div>

                                <hr/>
                                <div class="form-group">
                                    <label>Email<span style="color: red;"> *</span></label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Digite o email">
                                    <div style="color: red">{{ $errors->first('email') }}</div>
                                </div>

                                <div class="form-group">
                                    <label for="password">Senha<span style="color: red;"> *</span></label>
                                    <input type="password" class="form-control" name="password" required placeholder="Senha">
                                    <div style="color: red">{{ $errors->first('password') }}</div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
