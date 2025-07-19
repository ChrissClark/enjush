<div class="form-floating mb-3">
  <input type="text" name="nombre" class="form-control" id="Nombre" placeholder="Nombre" maxlength="100" value="{{$sector->nombre ?? old('nombre')}}">
  <label for="Nombre">Nombre</label>
</div>
@error('nombre')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
@enderror
<div class="form-floating mb-3">
  <textarea id="Descripcion" name="Descripcion" class="form-control" placeholder="Descripción" style="height: 100px">{{$sector->descripcion ?? old('descripcion')}}</textarea>
  <label for="Descripcion">Descripción</label>
</div>
@error('descripcion')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
@enderror
<div class="text-center mt-2">
    <button class="btn btn-outline-primary btn-sm">{{empty($sector->id) ? "Crear" : "Actualizar"}}</button>
</div>
@csrf