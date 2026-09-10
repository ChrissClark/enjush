<div class="form-floating mb-3">
  <input type="text" name="nombre" class="form-control" id="Nombre" placeholder="Nombre" maxlength="100" value="{{$clasificacion->nombre ?? old('nombre')}}">
  <label for="Nombre">Nombre</label>
</div>
@error('nombre')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
@enderror
<div class="form-floating mb-3">
  <textarea id="Descripcion" name="descripcion" class="form-control" placeholder="Descripción" style="height: 100px">{{$clasificacion->descripcion ?? old('descripcion')}}</textarea>
  <label for="Descripcion">Descripción</label>
</div>
@error('descripcion')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
@enderror

<div class="form-floating">
  <select id="Institucion" name="idInstitucion" class="form-select @error('idInstitucion') is-invalid @enderror" aria-label="Selecciona una clasificación">
    @foreach($instituciones as $institucion)
      @if($institucion->id == $clasificacion->idInstitucion)
        <option value="{{$institucion->id}}" selected>{{$institucion->nombre}}</option>
      @else
        <option value="{{$institucion->id}}">{{$institucion->nombre}}</option>
      @endif
    @endforeach
  </select>
  <label for="$idInstitucion">Selecciona un Institución</label>
</div>
@error('idInstitucion')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
@enderror
<div class="text-center mt-2">
    <button class="btn btn-outline-primary btn-sm">{{empty($clasificacion->id) ? "Crear" : "Actualizar"}}</button>
</div>
@csrf