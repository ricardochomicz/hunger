@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$user->name ?? old('name')}}">
</div>
<div class="form-group">
    <label for="price">E-mail:</label>
    <input type="text" class="form-control" id="price" name="email" value="{{$user->email ?? old('email')}}">
</div>
<div class="form-group">
    <label for="password">Senha:</label>
    <input type="text" class="form-control" id="password" name="password">
</div>

<div class="form-group">
    <button type="submit" class="btn btn-sm bg-gradient-success">Salvar</button>
</div>