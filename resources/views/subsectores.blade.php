@extends('layout')

@section('title', 'Subsectores')

@section('styles')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css" rel="stylesheet">
@endsection

@section('content')
  <div class="d-flex justify-content-between align-items-center">
    <h1 class="">Subsectores</h1>
    <div>
      <button class="btn btn-outline-primary btn-sm rounded" type="button" onclick="modalGet('{{route('subsectores.create')}}', 'Crear Subsector')">Agregar Subsector</button>
    </div>
  </div>

  <div class="table-responsive">
    <table id="Subsectores" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Sector</th>
          <th class="text-center">Empresas</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($subsectores as $subsector)
          <tr>
            <td>{{$subsector->nombre}}</td>
            <td>{{$subsector->sector->nombre}}</td>
            <td class="text-center">{{$subsector->empresas->count()}}</td>
            <td class="text-center">
              <div class="d-flex justify-content-center">
                <button class="btn btn-outline-success btn-sm rounded me-2" type="button" onclick="modalGet('{{route('subsectores.edit', $subsector->id)}}', 'Editar subsector')"><i class="far fa-edit"></i></button>
                <form action="{{route('subsectores.destroy', $subsector->id)}}" class="float-right" method="post">
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
    $("#Subsectores").DataTable();
  </script>
@endsection
