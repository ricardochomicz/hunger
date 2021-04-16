@include('admin.includes.alerts')

<div class="form-row">
<div class="form-group col-sm-8">
    <label for="name">Nome:</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$product->name ?? old('name')}}">
</div>
<div class="form-group col-sm-4">
    <label for="price">Preço:</label>
    <input type="text" class="form-control" id="price" name="price" value="{{$product->price ?? old('price')}}">
</div>
</div>

<div class="form-group">
    <label for="description">Descrição:</label>
    <textarea name="description" class="form-control"> {{$product->description ?? old('description')}}</textarea>
   
</div>

<div class="form-group">
    <label for="image">Imagem:</label>
        <input type="file" class="form-control" id="image" name="image" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
       
</div>

<div class="form-group">
    <button type="submit" class="btn btn-sm bg-gradient-success">Salvar</button>
</div>