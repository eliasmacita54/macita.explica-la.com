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
            <h1>Editar Atribuição de Professor à Turma</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Conteúdo Principal -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Coluna Esquerda -->
          <div class="col-md-12">
            <!-- Elementos Gerais do Formulário -->
            <div class="card card-primary">
              <!-- Cabeçalho do Card -->
              <!-- Início do Formulário -->
              <form method="post" action="">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Nome da Turma</label>
                    <select class="form-control" name="class_id" required>
                        <option value="">Selecione a Turma</option>
                        @foreach($getClass as $class)
                        <option {{ ($getRecord->class_id == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Nome do Professor</label>
                    @foreach($getTeacher as $teacher)
                    <div>
                      <label style="font-weight: normal;">
                      @php
                          $checked = '';
                      @endphp
                          @foreach($getAssignTeacherID as $teacherID)
                              @if($teacherID->teacher_id == $teacher->id)
                                  @php
                                      $checked = 'checked';
                                  @endphp
                              @endif
                          @endforeach
                          <input {{ $checked }} type="checkbox" value="{{ $teacher->id }}" name="teacher_id[]"> {{ $teacher->name }} {{ $teacher->last_name }}
                      </label>
                    </div>
                    @endforeach
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
                  <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
