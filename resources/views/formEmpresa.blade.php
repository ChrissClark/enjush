<div class="form-floating mb-3">
  <input type="text" name="nombre" class="form-control" id="Nombre" placeholder="Nombre" maxlength="100" value="{{$empresa->nombre ?? old('nombre')}}">
  <label for="Nombre">Nombre</label>
</div>
@error('nombre')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
@enderror

<div class="form-floating mb-3">
  <input type="text" name="NRA" class="form-control" id="NRA" placeholder="NRA" maxlength="20" value="{{$empresa->nras->last()->NRA ?? old('NRA')}}">
  <label for="NRA">NRA</label>
</div>
@error('NRA')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
@enderror

<div class="row g-2 mb-3">
  <h6>Ubicación</h6>
  <div class="col-md">
    <!-- Estados -->
    <div class="form-floating">
      <select id="Estado" name="idEstado" class="form-select @error('idEstado') is-invalid @enderror" aria-label="Selecciona un Estado" onchange="muestaMunicipios()">
        <option @selected(old('idEstado'))>Selecciona tu Estado</option>
        @foreach($estados as $estado)
          @if($empresa->id && $estado->id == $empresa->municipio->estado->id)
            <option value="{{$estado->id}}" selected>{{$estado->nombre}}</option>
          @else
            <option value="{{$estado->id}}">{{$estado->nombre}}</option>
          @endif
        @endforeach
      </select>
      <label for="Estado">Selecciona un Estado</label>
    </div>
  </div>
  <div class="col-md">
    <!-- Municipios -->
    <div class="form-floating">
      <select id="Municipio" name="idMunicipio" class="form-select @error('idMunicipio') is-invalid @enderror" aria-label="Selecciona un Municipio">
        <option @selected(old('idMunicipio'))>Seleciona un Municipio</option>
        @foreach($estados as $estado)
          <optgroup label="{{$estado->nombre}}" class="d-none" data-filter="{{$estado->id}}">
            @foreach($estado->municipios as $municipio)
              @if($municipio->id == $empresa->idMunicipio)
                <option value="{{$municipio->id}}" class="d-none" data-filter="{{$municipio->idEstado}}" selected>{{$municipio->nombre}}</option>
              @else
                <option value="{{$municipio->id}}" class="d-none" data-filter="{{$municipio->idEstado}}">{{$municipio->nombre}}</option>
              @endif
            @endforeach
          </optgroup>
        @endforeach
      </select>
      <label for="Municipio">Selecciona un Municipio</label>
    </div>
  </div>
</div>

<div class="row g-2 mb-3">
  <h6>Clasificación</h6>
  <div class="col-md">
    <!-- Sectores -->
    <div class="form-floating">
      <select id="Sector" name="idSector" class="form-select @error('idSector') is-invalid @enderror" aria-label="Selecciona un Sector" onchange="muestraSubsectores()">
        <option @selected(old('idSector'))>Selecciona un Sector</option>
        @foreach($sectores as $sector)
          @if($empresa->id && $sector->id == $empresa->subsector->sector->id)
            <option value="{{$sector->id}}" selected>{{$sector->nombre}}</option>
          @else
            <option value="{{$sector->id}}">{{$sector->nombre}}</option>
          @endif
        @endforeach
      </select>
      <label for="Sector">Selecciona un Sector</label>
    </div>
  </div>
  <div class="col-md">
    <!-- Subsectores -->
    <div class="form-floating">
      <select id="Subsector" name="idSubsector" class="form-select @error('idSubsector') is-invalid @enderror" aria-label="Selecciona un Subsector">
        <option @selected(old('idSubsector'))>Seleciona un Subsector</option>
        @foreach($sectores as $sector)
          <optgroup label="{{$sector->nombre}}" class="d-none" data-filter="{{$sector->id}}">
            @foreach($sector->subsectores as $subsector)
              @if($subsector->id == $empresa->idSubsector)
                <option value="{{$subsector->id}}" class="d-none" data-filter="{{$subsector->idSector}}" selected>{{$subsector->nombre}}</option>
              @else
                <option value="{{$subsector->id}}" class="d-none" data-filter="{{$subsector->idSector}}">{{$subsector->nombre}}</option>
              @endif
            @endforeach
          </optgroup>
        @endforeach
      </select>
      <label for="Subsector">Selecciona un Subsector</label>
    </div>
  </div>
</div>

<div class="row g-2">
  <h6>Coordenadas (Ubicación en mapa)</h6>
  <div class="col-md">
    <div class="form-floating mb-3">
      <input type="text" name="longitud" class="form-control" id="longitud" placeholder="longitud" maxlength="17" value="{{$empresa->longitud ?? old('longitud')}}">
      <label for="longitud">longitud</label>
    </div>
    @error('longitud')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="col-md">
    <div class="form-floating mb-3">
      <input type="text" name="latitud" class="form-control" id="latitud" placeholder="latitud" maxlength="17" value="{{$empresa->latitud ?? old('latitud')}}">
      <label for="latitud">latitud</label>
    </div>
    @error('latitud')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
</div>

<div class="text-center mt-2">
  <button class="btn btn-outline-primary btn-sm">{{empty($empresa->id) ? "Crear" : "Actualizar"}}</button>
</div>
@csrf