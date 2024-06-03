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
                    <h1>Editar Matéria</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Conteúdo Principal -->
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
                                    <label>Nome da Disciplina</label>
                                    <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}" required placeholder="Nome da Disciplina">
                                </div>

                                <div class="form-group">
                                    <label>Tipo de Matéria</label>
                                    <select class="form-control" name="type" required>
                                        <option value="">Selecione o Tipo</option>
                                        <option value="Theory">Teoria</option>
                                        <option value="Practical">Prática</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="0">Ativo</option>
                                        <option value="1">Inativo</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Enviar</button>
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
