@extends('own.template')


@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-title">
                    <div class="col-12"><h1>ORDENES</h1></div>
                        
                    </div>
                    <div class="card-body">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                   
                                        <div class="card-tools">
                                            <div class="input-group input-group-sm" style="width: 150px;">
                                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                                <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                
                                                <th>comprador</th>
                                                <th>Direccion Entrega</th>
                                                <th>Fecha Compra</th>
                                                <!--<th>Opciones</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($ordenes as $item)
                                                <tr>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->address}}</td>
                                                    <td>{{$item->create_at}}</td>
                                                   <!-- <td><button class="btn btn-primary" data-id="{{$item->id}}">VIEW</button></td> -->
                                               </tr>
                                           
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                    
                                </div>

                            </div>
                        </div>
                       
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection('content')