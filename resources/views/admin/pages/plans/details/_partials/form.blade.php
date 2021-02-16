@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" class="form-control" name="name" value="{{ $detail->name ?? old('name')}}">
</div>
<div class="form-group">
    <button class="btn btn-primary btn-sm" type="submit">Salvar</button>
</div>