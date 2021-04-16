@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">Identificação:</label>
    <input type="text" class="form-control" id="name" name="identify" value="{{$table->identify ?? old('identify')}}">
</div>

<div class="form-group">
    <label for="description">Descrição:</label>
    <textarea name="description" class="form-control"> {{$table->description ?? old('description')}}</textarea>
   
</div>

<div class="form-group">
    <button type="submit" class="btn btn-sm bg-gradient-success">Salvar</button>
</div>