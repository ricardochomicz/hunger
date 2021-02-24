@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$permission->name ?? old('name')}}">
</div>
<div class="form-group">
    <label for="description">Descrição:</label>
    <input type="text" class="form-control" id="description" name="description" value="{{$permission->description ?? old('description')}}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-sm bg-gradient-success">Salvar</button>
</div>