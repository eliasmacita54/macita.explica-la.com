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
            <h1>Editar Turma</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">

              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Nome da Turma</label>
                    <select class="form-control" name="class_id" required>
                        <option value="">Selecione a Turma</option>
                        @foreach($getClass as $class)
                        <option {{ ($getRecord->class_id == $class->id) ? 'selected' : ''  }} value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Nome da Disciplina</label>
                    @foreach($getSubject as $subject)
                    @php
                        $checked = '';
                    @endphp
                    @foreach($getAssignSubjectID as $subjectAssign)
                        @if($subjectAssign->subject_id == $subject->id)
                            @php
                                $checked = 'checked';
                            @endphp
                        @endif
                    @endforeach
                    <div>
                        <label style="font-weight: normal;">
                            <input {{ $checked }} type="checkbox" value="{{ $subject->id }}" name="subject_id[]"> {{ $subject->name }}
                        </label>
                    </div>
                    @endforeach
                  </div>

                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option {{ ($getRecord->status == 0) ? 'selected' : ''  }} value="0">Ativo</option>
                        <option {{ ($getRecord->status == 1) ? 'selected' : ''  }} value="1">Inativo</option>
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
