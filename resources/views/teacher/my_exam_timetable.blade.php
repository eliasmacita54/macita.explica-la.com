@extends('layouts.app')

@section('content')

<div class="content-wrapper">
 <!-- Cabeçalho do Conteúdo (Cabeçalho da Página) -->
 <section class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">

       <div class="col-sm-6">
         <h1>Meu Horário de Testes</h1>
       </div>
     </div>
   </div><!-- /.container-fluid -->
 </section>

 <!-- Conteúdo Principal -->
 <section class="content">

   <div class="container-fluid">
     <div class="row">
       <div class="col-md-12">
       <!-- /.col -->

         @include('_message')

         @foreach($getRecord as $value)
         <h5 style="font-size: 32px;margin-bottom: 15px;">Turma: <span style="color: blue">{{ $value['class_name']}}</span></h5>
          @foreach ($value['exam'] as $exam)
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><b>avaliação: </b>{{ $exam['exam_name']}}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Nome da Disciplina</th>
                    <th>Data do Teste</th>
                    <th>Hora de Início</th>
                    <th>Hora de Término</th>
                    <th>Número da Sala</th>
                    <th>Nota Máxima</th>
                    <th>Nota de Aprovação</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($exam['subject'] as $valueW)
                    <tr>
                      <td>{{ $valueW['subject_name'] }}</td>
                      <td>{{ date('d-m-Y', strtotime($valueW['exam_date'])) }}</td>
                      <td>{{ date('h:i A', strtotime($valueW['start_time'])) }}</td>
                      <td>{{ date('h:i A', strtotime($valueW['end_time'])) }}</td>
                      <td>{{ $valueW['room_number'] }}</td>
                      <td>{{ $valueW['full_marks'] }}</td>
                      <td>{{ $valueW['passing_mark'] }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          @endforeach
         @endforeach

       </div>
       <!-- /.card-body -->
     </div>
     <!-- /.card -->
   </div>
   <!-- /.col -->
 </div>
 <!-- /.row -->

 <!-- /.row -->
 </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->
</div>

@endsection
