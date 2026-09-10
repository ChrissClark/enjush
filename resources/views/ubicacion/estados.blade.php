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
                <th class="text-center">Visible</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($estados as $estado)
                <tr>
                  <td>{{$estado->nombre}}</td>
                  <td>{{$estado->abreviacion}}</td>
                  <td class="text-center">
                    @if($estado->visible)
                      <i class="fas fa-check text-success"></i>
                    @else
                      <i class="fas fa-times text-danger"></i>
                    @endif
                  </td>
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
                <th class="text-center">Visible</th>
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
                  <td class="text-center">
                    @if($municipio->visible)
                      <i class="fas fa-check text-success"></i>
                    @else
                      <i class="fas fa-times text-danger"></i>
                    @endif
                  </td>
                  <td>{{$municipio->estado->nombre}}</td>
                  <td>{{$municipio->cve_mun}}</td>
                  <td>{{$municipio->ageb}}</td>
                  <td class="text-center">
                    <div class="d-flex justify-content-center">              
                      <button class="btn btn-outline-success btn-sm rounded me-2" type="button" onclick="modalGet('{{route('municipios.edit', $municipio->id)}}', 'Editar Municipio')"><i class="far fa-edit"></i></button>
                      <form action="{{route('municipios.destroy', $municipio->id)}}" class="float-right" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="button" class="btn btn-outline-danger btn-sm rounded delete-confirm-btn" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="left" data-bs-html="true"
                          title="Confirmar eliminación" 
                          data-bs-content="Al eliminar este Municipio se perdera toda la información asociada. Quieres eliminar este municipio?<div class='mt-2 text-end'><button type='button' class='btn btn-sm btn-danger confirm-delete'>Si</button><button type='button' class='btn btn-sm btn-secondary ms-1 cancel-delete'>No</button></div>"><i class="fas fa-trash-alt"></i></button>
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
    document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('[data-bs-toggle="popover"]').forEach(function (popoverTriggerEl) {
        new bootstrap.Popover(popoverTriggerEl, {
          container: 'body',
          html: true,
          sanitize: false
        });
      });

      $("#Estados").DataTable();
      $("#Municipios").DataTable();
    });

    document.addEventListener('click', function (event) {
      const confirmButton = event.target.closest('.confirm-delete');
      const cancelButton = event.target.closest('.cancel-delete');

      if (confirmButton) {
        event.preventDefault();
        const popover = confirmButton.closest('.popover');
        if (popover) {
          const trigger = document.querySelector('[aria-describedby="' + popover.id + '"]');
          if (trigger) {
            const form = trigger.closest('form');
            if (form) {
              form.submit();
            }
          }
        }
      }

      if (cancelButton) {
        const popover = cancelButton.closest('.popover');
        if (popover) {
          const trigger = document.querySelector('[aria-describedby="' + popover.id + '"]');
          if (trigger) {
            const instance = bootstrap.Popover.getInstance(trigger);
            if (instance) {
              instance.hide();
            }
          }
        }
      }
    });
  </script>
@endsection
