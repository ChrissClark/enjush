@extends('layout')

@section('title', 'Estados y Municipios')

@section('styles')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css" rel="stylesheet">
@endsection

@section('content')
  <section class="">
    <div class="row">
      <div class="col-lg-6">
        <h2 class="">Estados</h2>
        <div class="table-responsive">
          <table id="Estados" class="table table-striped" style="width:100%">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Abreviacion</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($estados as $estado)
                <tr>
                  <td>{{$estado->nombre}}</td>
                  <td>{{$estado->abreviacion}}</td>
                  <td class="text-center">                    
                    <button class="btn btn-outline-success btn-sm rounded" type="button" onclick="modalGet('{{route('estados.edit', $estado->id)}}', 'Editar Estado')"><i class="far fa-edit"></i></button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="d-flex justify-content-between align-items-center">
          <h2 class="">Municipios</h2>
          <div>
            <button class="btn btn-outline-primary btn-sm rounded" type="button" onclick="modalGet('{{route('municipios.create')}}', 'Crear Municipio')">Agregar Municipio</button>
          </div>
        </div>
        <div class="table-responsive">
          <table id="Municipios" class="table table-striped" style="width:100%">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Estado</th>
                <th>cve_muni</th>
                <th>AGEB</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($municipios as $municipio)
                <tr>
                  <td>{{$municipio->nombre}}</td>
                  <td>{{$municipio->estado->nombre}}</td>
                  <td>{{$municipio->cve_mun}}</td>
                  <td>{{$municipio->ageb}}</td>
                  <td class="text-center">
                    <div class="d-flex justify-content-center">              
                      <button class="btn btn-outline-success btn-sm rounded me-2" type="button" onclick="modalGet('{{route('municipios.edit', $municipio->id)}}', 'Editar Municipio')"><i class="far fa-edit"></i></button>
                      <form action="{{route('municipios.destroy', $municipio->id)}}" class="float-right" method="post">
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
      </div>
    </div>
  </section>
@endsection

@section('scripts')
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
  
  <script>
    $("#Estados").DataTable();
    $("#Municipios").DataTable();
  </script>
@endsection
