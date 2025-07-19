@extends('layout')

@section('title', 'Estados y Municipios')

@section('styles')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css" rel="stylesheet">
@endsection

@section('content')
  <div class="d-flex justify-content-between align-items-center">
    <h1 class="">Sustancias</h1>
    <div>
      <button class="btn btn-outline-primary btn-sm rounded" type="button" onclick="modalGet('{{route('sustancias.create')}}', 'Crear Sustancia')">Agregar Sustancia</button>
    </div>
  </div>
  <div class="table-responsive">
    <table id="Sustancias" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Clasificaciones</th>
          <th>Cancer</th>
          <th>Edunogeno</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($sustancias as $sustancia)
          <tr>
            <td>{{$sustancia->nombre}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-center">
              <div class="d-flex justify-content-center">
                <button class="btn btn-outline-success btn-sm rounded me-2" type="button" onclick="modalGet('{{route('sustancias.edit', $sustancia->id)}}', 'Editar Sustancia')"><i class="far fa-edit"></i></button>
                <form action="{{route('sustancias.destroy', $sustancia->id)}}" class="float-right" method="post">
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
@endsection

@section('scripts')
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
  
  <script>
    $("#Sustancias").DataTable();
  </script>
@endsection
