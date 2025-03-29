<div class="form-floating mb-3">
  <input type="text" name="nombre" class="form-control" id="Nombre" placeholder="Nombre" maxlength="50" value="{{$municipio->nombre ?? old('nombre')}}">
  <label for="Nombre">Nombre</label>
</div>
@error('nombre')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
@enderror
<div class="form-floating mb-3">
  <select class="form-select" name="idEstado" id="Estado" aria-label="Selecciona un Estado">
    @foreach($estados as $estado)
      @if($estado->id == $municipio->idEstado)
        <option value="{{$estado->id}}" selected>{{$estado->nombre}}</option>
      @else
        <option value="{{$estado->id}}">{{$estado->nombre}}</option>
      @endif
    @endforeach
  </select>
  <label for="Estado">Selecciona un Estado</label>
</div>
@error('idEstado')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
@enderror
<div class="form-floating mb-3">
  <input type="number" name="cve_mun" class="form-control" id="cve_mun" placeholder="cve_mun" value="{{$municipio->cve_mun ?? old('cve_mun')}}">
  <label for="cve_mun">Cve_mun</label>
</div>
@error('cve_mun')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
@enderror
<div class="form-floating mb-3">
  <input type="text" name="ageb" class="form-control" id="AGEB" placeholder="AGEB" maxlength="45" value="{{$municipio->ageb ?? old('ageb')}}">
  <label for="AGEB">AGEB</label>
</div>
@error('ageb')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
@enderror

<div class="text-center mt-2">
  <button class="btn btn-outline-primary btn-sm">{{empty($municipio->id) ? "Crear" : "Actualizar"}}</button>
</div>
@csrf