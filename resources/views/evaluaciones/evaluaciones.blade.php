@extends('layout')

@section('title', 'Evaluaciones')

@section('styles')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css" rel="stylesheet">
@endsection

@section('content')
  <section class="">

    <div class="row">
      <div class="col-lg-6">
      </div>
      <div class="col-lg-6">
      </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
      <h1 class="fs-3">Evaluaciones</h1>
      <div>
        <!-- Se podria crear, modificar y eliminar
        <button class="btn btn-outline-primary btn-sm rounded" type="button" onclick="modalGet('{{route('evaluaciones.create')}}', 'Crear Evaluación')">Nueva Evaluación</button> -->
      </div>
    </div>
    <div class="table-responsive">
      <table id="Evaluaciones" class="table table-striped" style="width:100%">
        <thead>
          <tr>
            <th class="text-center">Año</th>
            <th>Empresa</th>
            <th>Matriz</th>
            <th class="text-center">Unidad</th>
            <th>Evaluador</th>
            <th>Creado</th>
            <!-- <th></th> -->
          </tr>
        </thead>
        <tbody>
          @foreach($evaluaciones as $evaluacion)
            <tr>
              <td class="text-center"><a href="{{route('matrizEvaluacion', $evaluacion->id)}}">{{$evaluacion->año}}</a></td>
              <td>{{$evaluacion->empresa->nombre}}</td>
              <td>{{$evaluacion->matriz}}</td>
              <td class="text-center">{{$evaluacion->unidad}}</td>
              <td>{{$evaluacion->evaluador->nombre}}</td>
              <td>{{$evaluacion->created_at}}</td>
              <!-- <td class="text-center">
                <div class="d-flex justify-content-center">              
                  <button class="btn btn-outline-success btn-sm rounded me-2" type="button" onclick="modalGet('{{route('evaluaciones.edit', $evaluacion->id)}}', 'Editar evaluacion')"><i class="far fa-edit"></i></button>
                  <form action="{{route('evaluaciones.destroy', $evaluacion->id)}}" class="float-right" method="post">
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm rounded"><i class="fas fa-trash-alt"></i></button>
                    @csrf
                  </form>
                </div>
              </td> -->
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </section>
@endsection

@section('scripts')
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
  
  <script>
    $("#Evaluaciones").DataTable({
      columnDefs: [
        {
          targets: [0],
          orderData: [0, 1]
        },
        {
          targets: [1],
          orderData: [1, 0]
        },
      ]
    });
  </script>
@endsection
