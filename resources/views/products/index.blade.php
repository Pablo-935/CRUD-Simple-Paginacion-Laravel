
@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('content')
    @if ($products->count())
        <div class="container-fluid p-5">
        <table class="table table-bordered ">
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
            <tbody>
                @foreach ($products as $product)
                   <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->unit_price}}</td>
                        <td>{{$product->stock}}</td>
                        <td>{{$product->updated_at}}</td>
                        <td class="text-center">
                            <button class="btn btn-success btn-sm">Ver</button>
                            <button class="btn btn-warning btn-sm">Editar</button>
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>

        {{ $products->links() }}
    @else 
        <h4>¡No hay productos cargados!</h4>
    @endif
    </div>
@endsection

    
