@extends('welcome')

@section('content')
<form action="calcular.php" method="POST">
    <div class="col-12">
        <input type="hidden" class="_token" value="{{csrf_token() }}">
        <h3 class="font-weight-bold">Nombre</h3>
        <input type="text" id="input-name" name="input-name" class="form-control">
    </div>
    <div class="col-12">
        <h3 class="font-weight-bold">Apellido</h3>
        <input type="text" id="input-lastName" name="input-lastName" class="form-control">
    </div>
    <div class="col-12">
        <h3 class="font-weight-bold">edad</h3>
        <input type="text" id="input-address" name="input-address" class="form-control">
    </div>
    
    <div class="col-12">
        <input type="submit" value="">
    </div>
</form>
@endsection