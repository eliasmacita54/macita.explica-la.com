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
                    <h1>Minhas Disciplinas</h1>
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
                    @include('_message')

                    <!-- Cartão -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Minhas Disciplinas</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Tipo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($getRecord as $value)
                                    <tr>
                                        <td>{{ $value->subject_name }}</td>
                                        <td>{{ $value->subject_type }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
