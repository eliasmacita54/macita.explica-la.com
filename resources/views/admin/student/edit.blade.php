@extends('layouts.app')
    @section('style')
    <style type="text/css">
    </style>
    @section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Estudante</h1>
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
          @include('_message')
            <!-- general form elements -->
            <div class="card card-primary">
                <form method="post" action=""  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Nome<span style="color: red;"> *</span> </label>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $getRecord->name) }}" required placeholder="First Name">
                                <div style="color: red">{{ $errors->first('name') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Ultimo Nome<span style="color: red;"> *</span></label>
                                <input type="text" class="form-control" name="last_name" value="{{ old('last_name' ,$getRecord->last_name) }}" required placeholder="Last Name">
                                <div style="color: red">{{ $errors->first('last_name') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Numero de Admissao<span style="color: red;"> *</span></label>
                                <input type="text" class="form-control" name="admission_number" value="{{ old('admission_number' ,$getRecord->admission_number) }}" required placeholder="Admission Number">
                                <div style="color: red">{{ $errors->first('admission_number ') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Numero de Estudante<span style="color: red;"> *</span></label>
                                <input type="text" class="form-control" name="roll_number" value="{{ old('roll_number' ,$getRecord->roll_number) }}" required placeholder="Roll Number">
                                <div style="color: red">{{ $errors->first('roll_number') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Classe<span style="color: red;"> *</span></label>
                                <select class="form-control"  name="class_id">
                                    <option value="">Seleciona a Classe</option>
                                    @foreach ($getClass as $class)
                                        <option  {{ (old('class_id' ,$getRecord->class_id) == $class->id ) ? 'selected' : '' }}  value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                                <div style="color: red">{{ $errors->first('class_id') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Genero<span style="color: red;"> *</span></label>
                                <select class="form-control" required name="gender">
                                    <option value="">Escolha de Genero</option>
                                    <option  {{ (old('gender' ,$getRecord->gender) == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                                    <option  {{ (old('gender' ,$getRecord->gender) == 'Female') ?  'selected' : '' }} value="Female">Female</option>
                                </select>
                            </div>
                            <div style="color: red">{{ $errors->first('gender ') }}</div>

                            <div class="form-group col-md-6">
                                <label>Data de Nascimento<span style="color: red;"> *</span></label>
                                <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth' ,$getRecord->date_of_birth) }}" required>
                                <div style="color: red">{{ $errors->first('date_of_birth') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Caste<span style="color: red;"> *</span></label>
                                <input type="text" class="form-control" name="caste" value="{{ old('caste' ,$getRecord->caste) }}" required placeholder="Caste">
                                <div style="color: red">{{ $errors->first('caste') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Religiao<span style="color: red;"> *</span></label>
                                <input type="text" class="form-control" name="religion" value="{{ old('religion' ,$getRecord->religion) }}" required placeholder="Religion">
                                <div style="color: red">{{ $errors->first('religion') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Numero de Celular<span style="color: red;"> *</span></label>
                                <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number' ,$getRecord->mobile_number) }}" required placeholder="Mobile Number">
                                <div style="color: red">{{ $errors->first('mobile_number') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Data de Admissao<span style="color: red;"> *</span></label>
                                <input type="date" class="form-control" name="adminssion_date" value="{{ old('adminssion_date' ,$getRecord->adminssion_date) }}" required placeholder="Admission Date">
                                <div style="color: red">{{ $errors->first('adminssion_date') }}</div>
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
                                <label>Grupo Sanguineo<span style="color: red;"> *</span></label>
                                <input type="text" class="form-control" name="blood_group" value="{{ old('blood_group' ,$getRecord->blood_group) }}" placeholder="Blood Group">
                                <div style="color: red">{{ $errors->first('blood_group') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Altura<span style="color: red;"> *</span></label>
                                <input type="text" class="form-control" name="height" value="{{ old('height' ,$getRecord->height) }}" placeholder="Height">
                                <div style="color: red">{{ $errors->first('height') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Peso<span style="color: red;"> *kg</span></label>
                                <input type="text" class="form-control" name="weight"  value="{{ old('weight' ,$getRecord->weight) }}" placeholder="Weight">
                                <div style="color: red">{{ $errors->first('weight') }}</div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>status<span style="color: red;"> *</span></label>
                                <select class="form-control" required name="status">
                                    <option value="">Seleciona Estado</option>
                                    <option {{ (old('status' ,$getRecord->status) == '0') ? 'selected' : '' }} value="0">active</option>
                                    <option {{ (old('status ' ,$getRecord->status) == '1') ? 'selected' : '' }} value="1">inactive</option>
                                </select>
                                <div style="color: red">{{ $errors->first('status') }}</div>
                            </div>

                        </div>

                        <hr/>
                        <div class="form-group">
                            <label>Correio Eletronico<span style="color: red;"> *</span></label>
                            <input type="email" class="form-control" name="email" value="{{ old('email' ,$getRecord->email) }}" required placeholder="Enter email">
                            <div style="color: red">{{ $errors->first('email') }}</div>
                        </div>


                        <div class="form-group">
                            <label for="password">Palavra-Passe<span style="color: red;"> *</span></label>
                            <input type="text" class="form-control" name="password"  placeholder="Password">
                            <p>Do you wanto to change a password add, if not just leave blank</p>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
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
