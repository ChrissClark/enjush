<div class="form-floating mb-3">
  <input type="text" name="abreviacion" class="form-control" id="Abreviacion" placeholder="Abreviacion" maxlength="50" value="{{$estado->abreviacion ?? old('abreviacion')}}">
  <label for="Abreviacion">Abreviacion</label>
</div>
@error('abreviacion')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
@enderror
<div class="text-center mt-2">
    <button class="btn btn-outline-primary btn-sm">{{empty($estado) ? "Crear" : "Actualizar"}}</button>
</div>
@csrf