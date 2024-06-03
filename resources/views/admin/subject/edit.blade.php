@extends('layouts.app')

@section('style')
<style type="text/css">
</style>
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Classe</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Coluna Esquerda -->
                <div class="col-md-12">
                    @include('_message')
                    <!-- Elementos do Formulário Geral -->
                    <div class="card card-primary">
                        <!-- Início do Formulário -->
                        <form method="post" action="">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nome da Matéria</label>
                                    <input type="text" class="form-control" name="name" value="{{ $getRecord->name }}" required placeholder="Nome da Classe">
                                </div>

                                <div class="form-group">
                                    <label>Tipo de Matéria</label>
                                    <select class="form-control" name="type" required>
                                        <option value="">Selecione o Tipo</option>
                                        <option {{ ($getRecord->type == "Theory") ? 'selected' : '' }} value="Theory">Teoria</option>
                                        <option {{ ($getRecord->type == "Pratical") ? 'selected' : '' }} value="Pratical">Prática</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option {{ ($getRecord->status == 0) ? 'selected' : '' }} value="0">Ativo</option>
                                        <option {{ ($getRecord->status == 1) ? 'selected' : '' }} value="1">Inativo</option>
                                    </select>
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
    </section>
    <!-- /.content -->
</div>

@endsection
