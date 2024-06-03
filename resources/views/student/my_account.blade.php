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
                    <h1>Minha Conta</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Conteúdo Principal -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- coluna esquerda -->
                <div class="col-md-12">
                    <!-- elementos gerais do formulário -->
                    <div class="card card-primary">
                        <form method="post" action="" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Nome<span style="color: red;"> *</span></label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name', $getRecord->name) }}" required placeholder="Nome">
                                        <div style="color: red">{{ $errors->first('name') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Sobrenome<span style="color: red;"> *</span></label>
                                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $getRecord->last_name) }}" required placeholder="Sobrenome">
                                        <div style="color: red">{{ $errors->first('last_name') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Número de Registro<span style="color: red;"> *</span></label>
                                        <input type="text" class="form-control" name="roll_number" value="{{ old('roll_number', $getRecord->roll_number) }}" required placeholder="Número de Registro">
                                        <div style="color: red">{{ $errors->first('roll_number') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Gênero<span style="color: red;"> *</span></label>
                                        <select class="form-control" required name="gender">
                                            <option value="">Selecione o Gênero</option>
                                            <option {{ (old('gender', $getRecord->gender) == 'Male') ? 'selecionado' : '' }} value="Male">Masculino</option>
                                            <option {{ (old('gender', $getRecord->gender) == 'Female') ? 'selecionado' : '' }} value="Female">Feminino</option>
                                        </select>
                                        <div style="color: red">{{ $errors->first('gender') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Data de Nascimento<span style="color: red;"> *</span></label>
                                        <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth', $getRecord->date_of_birth) }}" required>
                                        <div style="color: red">{{ $errors->first('date_of_birth') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Casta<span style="color: red;"> *</span></label>
                                        <input type="text" class="form-control" name="caste" value="{{ old('caste', $getRecord->caste) }}" required placeholder="Casta">
                                        <div style="color: red">{{ $errors->first('caste') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Religião<span style="color: red;"> *</span></label>
                                        <input type="text" class="form-control" name="religion" value="{{ old('religion', $getRecord->religion) }}" required placeholder="Religião">
                                        <div style="color: red">{{ $errors->first('religion') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Número de Celular<span style="color: red;"> *</span></label>
                                        <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number', $getRecord->mobile_number) }}" required placeholder="Número de Celular">
                                        <div style="color: red">{{ $errors->first('mobile_number') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Foto de Perfil<span style="color: red;"> *</span></label>
                                        <input type="file" class="form-control" name="profile_pic">
                                        <div style="color: red">{{ $errors->first('profile_pic') }}</div>
                                        @if(!empty($getRecord->getProfile()))
                                            <img src="{{ $getRecord->getProfile() }}" style="width: 50px;">
                                        @endif
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Grupo Sanguíneo<span style="color: red;"> *</span></label>
                                        <input type="text" class="form-control" name="blood_group" value="{{ old('blood_group', $getRecord->blood_group) }}" placeholder="Grupo Sanguíneo">
                                        <div style="color: red">{{ $errors->first('blood_group') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Altura<span style="color: red;"> *</span></label>
                                        <input type="text" class="form-control" name="height" value="{{ old('height', $getRecord->height) }}" placeholder="Altura">
                                        <div style="color: red">{{ $errors->first('height') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Peso<span style="color: red;"> *</span></label>
                                        <input type="text" class="form-control" name="weight" value="{{ old('weight', $getRecord->weight) }}" placeholder="Peso">
                                        <div style="color: red">{{ $errors->first('weight') }}</div>
                                    </div>
                                </div>

                                <hr/>
                                <div class="form-group">
                                    <label>Email<span style="color: red;"> *</span></label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email', $getRecord->email) }}" required placeholder="Digite o email">
                                    <div style="color: red">{{ $errors->first('email') }}</div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Atualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
