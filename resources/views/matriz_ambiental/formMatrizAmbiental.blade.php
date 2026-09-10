<div class="form-floating mb-3">
  <select class="form-select" name="idSustancia" id="Sustancia" aria-label="Selecciona una sustancia">
    @foreach($sustancias as $sustancia)
      @if($sustancia->id == $matriz->idSustancia)
        <option value="{{$sustancia->id}}" selected>{{$sustancia->nombre}}</option>
      @else
        <option value="{{$sustancia->id}}">{{$sustancia->nombre}}</option>
      @endif
    @endforeach
  </select>
  <label for="Sustancia">Selecciona una Sustancia</label>
</div>
@error('idSustancia')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
@enderror
<input type="hidden" name="idEvaluacion" value="{{$evaluacion->id}}">
@php($mtzEvaluadora = json_decode($evaluacion->matriz))
<div class="form-floating mb-3">
  <select class="form-select" name="matriz" id="Matriz" aria-label="Selecciona un Estado">
    @foreach($mtzEvaluadora as $mValor)
      @if($mValor == $matriz->matriz)
        <option value="{{$mValor}}" selected>{{$mValor}}</option>
      @else
        <option value="{{$mValor}}">{{$mValor}}</option>
      @endif
    @endforeach
  </select>
  <label for="Matriz">Selecciona la Matriz a valorar</label>
</div>
@error('matriz')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
@enderror
<div class="form-floating mb-3">
  <input type="text" name="valor" class="form-control" id="Valor" placeholder="Valor" maxlength="45" value="{{$matriz->valor ?? old('valor')}}">
  <label for="Valor">Valor</label>
</div>
@error('Valor')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
@enderror

<div class="text-center mt-2">
  <button class="btn btn-outline-primary btn-sm">{{empty($matriz->id) ? "Crear" : "Actualizar"}}</button>
</div>
@csrf