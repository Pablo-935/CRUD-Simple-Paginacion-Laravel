@extends('layouts.app')

@section('title', 'Vista del Producto Nº . $product->id')

@section('content')
    {{-- @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif --}}

    <div class="container">
        <div class="row min-vh-100 justify-content-center align-items-center">
            <div class="col-10 col-md-6 col-lg-6">
                <h3 class="text-center">Vista del Producto Nº{{$product->id}}</h3>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('products.update', $product->id)}}" method="POST" novalidate>
                            @csrf 

                            <label for="name" class="form-label">Nombre: </label>
                            <input type="text" class="form-control" name="name" value="{{old('name', $product->name)}}" disabled>

                            <label for="description" class="form-label">Descripción: </label> <br>
                            <textarea name="description" class="form-control" cols="30" rows="10" disabled>{{old('description', $product->description)}} </textarea>

                            <label for="unit_price" class="form-label">Precio Unitario: </label>
                            <input type="number" class="form-control" name="unit_price" value="{{old('unit_price', $product->unit_price)}}" disabled>

                            <label for="stock" class="form-label">Stock: </label>
                            <input type="number" class="form-control" name="stock" value="{{old('stock', $product->stock)}}" disabled>

                            <a class="btn btn-warning btn-sm mt-3" href="{{route('products.index')}}" role="button">Volver</a>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection