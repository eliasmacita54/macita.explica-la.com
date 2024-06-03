@extends('layouts.app')

@section('content')

<div class="content-wrapper">
 <!-- Cabeçalho do Conteúdo (Cabeçalho da Página) -->
 <section class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">

       <div class="col-sm-6">
         <h1>Meu Horário de Aulas ({{ $getClass->name }} - {{ $getSubject->name }}) <span style="color:blue">({{ $getStudent->name }} {{ $getStudent->last_name }})</span></h1>
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
         {{-- @include('_message') --}}

         <div class="card">
           <div class="card-header">
             <h3 class="card-title">
                {{ $getClass->name }} - {{ $getSubject->name }}</h3>

           <!-- /.card-header -->
           <div class="card-body p-0">
             <table class="table table-striped">
               <thead>
                 <tr>
                   <th>Semana</th>
                   <th>Hora de Início</th>
                   <th>Hora de Término</th>
                   <th>Número da Sala</th>
                 </tr>
               </thead>
               <tbody>
                 @foreach($getRecord as $valueW)
                   <tr>
                     <td>{{ $valueW['week_name'] }}</td>
                     <td>{{ !empty($valueW['start_time']) ? date('h:i A', strtotime($valueW['start_time'])) : '' }}</td>
                     <td>{{ !empty($valueW['end_time']) ? date('h:i A', strtotime($valueW['start_time'])) : '' }}</td>
                     <td>{{ $valueW['room_number'] }}</td>
                   </tr>
                 @endforeach
               </tbody>
             </table>
           </div>
         </div>

       </div>
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
