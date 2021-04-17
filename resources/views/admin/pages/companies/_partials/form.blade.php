@include('admin.includes.alerts')

<div class="form-row">
    <div class="form-group col-sm-8">
        <label for="name">Nome:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $company->name ?? old('name') }}">
    </div>
    <div class="form-group col-sm-4">
        <label for="cnpj">CNPJ:</label>
        <input type="text" class="form-control" id="cnpj" name="cnpj" value="{{$company->cnpj ?? old('cnpj')}}">

    </div>
   
</div>
<div class="form-row">
    <div class="form-group col-sm-8">
        <label for="email">E-mail:</label>
        <input type="text" class="form-control" id="email" name="email" value="{{$company->email ?? old('email')}}">
    </div>
    <div class="form-group col-sm-4">
        <label for="logo">Logo:</label>
        <input type="file" class="form-control" id="logo" name="logo" aria-describedby="inputGroupFileAddon04"
            aria-label="Upload">  
    </div>
</div>

<div class="form-row">
    <div class="form-group col-sm-2">
        <label for="email">Ativo:</label>
        <select name="active" id="" class="form-control">
           <option value="Y" @if(isset($company) && $company->active == 'Y') selected @endif>SIM</option>
           <option value="N" @if(isset($company) && $company->active == 'N') selected @endif>NÃO</option>
        </select>
    </div>
</div>
<hr>
<h4>Assinatura</h4>
<div class="form-row">
    <div class="form-group col-sm-3">
        <label for="subscription">Data Assinatura:</label>
        <input type="date" class="form-control" id="subscription" name="subscription" value="{{$company->subscription ?? old('subscription')}}">
    </div>
    <div class="form-group col-sm-3">
        <label for="expires_at">Data Expiração:</label>
        <input type="date" class="form-control" id="expires_at" name="expires_at" value="{{$company->expires_at ?? old('expires_at')}}">
    </div>
    <div class="form-group col-sm-3">
        <label for="subscription_id">Identificador:</label>
        <input type="text" class="form-control" id="subscription_id" name="subscription_id" value="{{$company->subscription_id ?? old('subscription_id')}}">
    </div>
    <div class="form-group col-sm-3">
        <label for="email">Assinatura Ativa:</label>
        <select name="subscription_active" id="" class="form-control">
           <option value="1" @if(isset($company) && $company->subscription_active) selected @endif>SIM</option>
           <option value="0" @if(isset($company) && !$company->subscription_active) selected @endif>NÃO</option>
        </select>
    </div>
</div>





<div class="form-group">
    <button type="submit" class="btn btn-sm bg-gradient-success">Salvar</button>
</div>
