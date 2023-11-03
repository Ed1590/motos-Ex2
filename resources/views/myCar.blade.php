@extends('welcome')

@section('content')
<form action="{{route('comprar')}}" method="POST" id="form-comprar" onsubmit="event.preventDefault()">
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="col-3">
                <button class="btn btn-danger" onclick="limpiarCarro()">Vaciar Carrito</button>
            </div>
        </div>
        <div class="col-9">
            <table class="table" id="table">
                <thead>
                    <tr>
                    <th scope="col-3">nombre</th>
                    <th scope="col-3">cantidad</th>
                    <th scope="col-3">precio unitario</th>
                    <th scope="col-3">precio por cantidades</th>
                    </tr>
                </thead>
                <tbody>
                    
                    
                </tbody>
            </table>
        </div>
      

            <div class="col-3">
                <div class="col-12">
                    <h1>Datos Envio</h1>
                </div>
                <div class="col-12">
                    <input type="hidden" class="_token" value="{{csrf_token() }}">
                    <h3 class="font-weight-bold">Nombre</h3>
                    <input type="text" id="input-name" name="input-name" class="form-control inputVenta">
                </div>
                <div class="col-12">
                    <h3 class="font-weight-bold">Apellido</h3>
                    <input type="text" id="input-lastName" name="input-lastName" class="form-control inputVenta">
                </div>
                <div class="col-12">
                    <h3 class="font-weight-bold">Direccion</h3>
                    <input type="text" id="input-address" name="input-address" class="form-control inputVenta">
                </div>
                <div class="col-12">
                    <h3 class="font-weight-bold">Correo</h3>
                    <input type="text" id="input-email" name="input-email" class="form-control inputVenta">
                </div>
                <div class="col-12">
                    <h3>Total</h3>
                </div>
                <div class="col-12">
                    <button class="btn btn-success btn-lg comprar">COMPRAR</button>
                </div>
            </div>
        
        
       
    </div>
   
</div>
</form>
@endsection