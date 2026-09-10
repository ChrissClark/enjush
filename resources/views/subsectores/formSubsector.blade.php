<div class="form-floating mb-3">
  <input type="text" name="nombre" class="form-control" id="Nombre" placeholder="Nombre" maxlength="100" value="{{$subsector->nombre ?? old('nombre')}}">
  <label for="Nombre">Nombre</label>
</div>
@error('nombre')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
@enderror

<div class="form-floating mb-3">
  <select id="Sector" name="idSector" class="form-select @error('idSector') is-invalid @enderror" aria-label="Selecciona un Sector">
    @foreach($sectores as $sector)
      @if($subsector->idSector && $sector->id == $subsector->sector->id)
        <option value="{{$sector->id}}" selected>{{$sector->nombre}}</option>
      @else
        <option value="{{$sector->id}}">{{$sector->nombre}}</option>
      @endif
    @endforeach
  </select>
  <label for="Sector">Selecciona un Sector</label>
</div>
@error('idSector')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
@enderror

<div class="form-floating mb-3">
  <textarea id="Descripcion" name="descripcion" class="form-control" placeholder="Descripción" style="height: 100px">{{$subsector->descripcion}}</textarea>
  <label for="Descripcion">Descripción</label>
</div>
@error('descripcion')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
@enderror
<div class="text-center mt-2">
    <button class="btn btn-outline-primary btn-sm">{{empty($subsector->id) ? "Crear" : "Actualizar"}}</button>
</div>
@csrf