@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$category->name ?? old('name')}}">
</div>

<div class="form-group">
    <label for="description">Descrição:</label>
    <textarea name="description" class="form-control"> {{$category->description ?? old('description')}}</textarea>
   
</div>

<div class="form-group">
    <button type="submit" class="btn btn-sm bg-gradient-success">Salvar</button>
</div>