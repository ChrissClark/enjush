<div class="form-floating mb-3">
  <select class="form-select" name="idEvaluador" id="Evaluador" aria-label="Selecciona un evaluador">
    @foreach($evaluadores as $evaluador)
      @if($evaluador->id == $evaluacion->idEvaluador)
        <option value="{{$evaluador->id}}" selected>{{$evaluador->nombre}}</option>
      @else
        <option value="{{$evaluador->id}}">{{$evaluador->nombre}}</option>
      @endif
    @endforeach
  </select>
  <label for="Evaluador">Selecciona un Evaluador</label>
</div>
@error('idEvaluador')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
@enderror
<input type="hidden" name="idEmpresa" value="{{$idEmpresa}}">

<id class="">
  <div class="form-check-inline">
    <input class="form-check-input" type="radio" name="unidad" id="unidadkg" value="kg" checked>
    <label class="form-check-label" for="unidadkg">
      Kilogramos (kg)
    </label>
  </div>
  <div class="form-check-inline">
    <input class="form-check-input" type="radio" name="unidad" id="unidadt" value="t">
    <label class="form-check-label" for="unidadt">
      Toneladas (t)
    </label>
  </div>
  @error('unidad')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</id>

<div class="form-floating my-3">
  <input type="text" name="año" class="form-control" id="Año" placeholder="Año" maxlength="45" value="{{$evaluacion->año ?? old('año')}}">
  <label for="Año">Año</label>
</div>
@error('año')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
@enderror

@php($mtzEvaluadora = $evaluacion->matriz ? implode(", ", json_decode($evaluacion->matriz)) : null)
<div class="form-floating mb-3">
  <input type="text" name="matriz" class="form-control" id="Matriz" placeholder="Matriz a Evaluar" maxlength="45" value="{{$mtzEvaluadora ?? old('matriz')}}">
  <label for="Matriz">Matriz a Evaluar (separa con comas)</label>
</div>
@error('matriz')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
@enderror

<div class="text-center mt-2">
  <button class="btn btn-outline-primary btn-sm">{{empty($evaluacion->id) ? "Crear" : "Actualizar"}}</button>
</div>
@csrf