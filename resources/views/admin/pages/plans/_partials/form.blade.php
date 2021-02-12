@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$plan->name ?? old('name')}}">
</div>
<div class="form-group">
    <label for="price">Valor:</label>
    <input type="text" class="form-control" id="price" name="price" value="{{$plan->price ?? old('price')}}">
</div>
<div class="form-group">
    <label for="description">Descrição:</label>
    <input type="text" class="form-control" id="description" name="description" value="{{$plan->description ?? old('description')}}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-sm bg-gradient-success">Salvar</button>
</div>