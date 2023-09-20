
@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    <div class="container-fluid p-3">
    <a class="btn btn-success btn-sm mb-2" href="{{route('products.create')}}" role="button">Agregar</a>
    
    @if ($products->count())
       
        <table class="table table-bordered table-responsive">
            <thead class="text-center">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Precio Unitario</th>
                    <th>Stock</th>
                    <th>Ultima actualización</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($products as $product)
                   <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->unit_price}}</td>
                        <td>{{$product->stock}}</td>
                        <td>{{$product->updated_at}}</td>
                        <td class="text-center ">
                            <div class="row justify-content-center align-items-center g-0">
                                <div class="col-12 mb-md-1 col-lg-3">
                                    <a class="btn btn-success btn-sm" href="{{route('products.show', $product->id)}}" role="button">Ver</a>
                                </div>
                                <div class="col-12 mb-md-1 col-lg-3">
                                    <a class="btn btn-warning btn-sm" href="{{route('products.edit', $product->id)}}" role="button">Editar</a>
                                </div>
                                <div class="col-12 mb-md-1 col-lg-5">
                                    <form action="{{route('products.destroy', $product->id)}}" method="POST">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-end">
            {{ $products->links() }}
        </div>

    @else 
        <h4>¡No hay productos cargados!</h4>
    @endif
    </div>
@endsection


    
