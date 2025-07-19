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
      <h1 class="fs-3">Evaluacion {{$evaluacion->año ." a ". $evaluacion->empresa->nombre}}</h1>
      <div>
        <button class="btn btn-outline-primary btn-sm rounded" type="button" onclick="modalGet('{{route('matriza.create', ['evaluacion'=>$evaluacion->id])}}', 'Crear Evaluación')">Nueva Matriz</button>
      </div>
    </div>
    <div class="table-responsive">
      <table id="Matriz" class="table table-striped" style="width:100%">
        <thead>
          <tr>
            <th>Sustancia</th>
            <th>Tipo Sustancia</th>
            <th>Clasificaciones</th>
            <th>Cancer</th>
            <th>Edunogeno</th>
            <th>Matriz</th>
            <th class="text-start">valor ({{$evaluacion->unidad}})</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($evaluacion->matriz_ambiental as $matriz)
            <tr>
              <td>{{$matriz->sustancia->nombre}}</td>
              <td>{{$matriz->id_sust_tipo ? $matriz->tipoSust->nombre : ""}}</td>
              <td></td>
              <td></td>
              <td></td>
              <td>{{$matriz->matriz}}</td>
              <td class="text-start">{{$matriz->valor}}</td>
              <td class="text-center">
                <div class="d-flex justify-content-center">  
                  <button class="btn btn-outline-success btn-sm rounded me-2" type="button" onclick="modalGet('{{route('matriza.edit', $matriz->id)}}', 'Editar Matriz')"><i class="far fa-edit"></i></button>
                  <form action="{{route('matriza.destroy', $matriz->id)}}" class="float-right" method="post">
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm rounded"><i class="fas fa-trash-alt"></i></button>
                    @csrf
                  </form>
                </div>
              </td>
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
    $("#Matriz").DataTable();
  </script>
@endsection
