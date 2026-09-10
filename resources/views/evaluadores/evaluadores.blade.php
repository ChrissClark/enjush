@extends('layout')

@section('title', 'Evaluadores')

@section('styles')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css" rel="stylesheet">
@endsection

@section('content')
  <div class="d-flex justify-content-between align-items-center">
    <h1 class="">Evaluadores</h1>
    <div>
      <button class="btn btn-outline-primary btn-sm rounded" type="button" onclick="modalGet('{{route('evaluadores.create')}}', 'Crear Evaluador')">Agregar Evaluador</button>
    </div>
  </div>
  <div class="table-responsive">
    <table id="Evaluadores" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th>Nombre</th>
          <th class="text-center"># Evaluaciones</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($evaluadores as $evaluador)
          <tr>
            <td>{{$evaluador->nombre}}</td>
            <td class="text-center">{{$evaluador->evaluaciones->count()}}</td>
            <td class="text-center">
              <div class="d-flex justify-content-center">
                <button class="btn btn-outline-success btn-sm rounded me-2" type="button" onclick="modalGet('{{route('evaluadores.edit', $evaluador->id)}}', 'Editar Evaluador')"><i class="far fa-edit"></i></button>
                <form action="{{route('evaluadores.destroy', $evaluador->id)}}" class="float-right" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="button" class="btn btn-outline-danger btn-sm rounded delete-confirm-btn" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="left" data-bs-html="true"
                      title="Confirmar eliminación" 
                      data-bs-content="Quienes eliminar a este evaluador?<div class='mt-2 text-end'><button type='button' class='btn btn-sm btn-danger confirm-delete'>Si</button><button type='button' class='btn btn-sm btn-secondary ms-1 cancel-delete'>No</button></div>"><i class="fas fa-trash-alt"></i></button>
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
    document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('[data-bs-toggle="popover"]').forEach(function (popoverTriggerEl) {
        new bootstrap.Popover(popoverTriggerEl, {
          container: 'body',
          html: true,
          sanitize: false
        });
      });

      $("#Evaluadores").DataTable();
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
