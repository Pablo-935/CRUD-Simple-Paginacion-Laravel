@extends('layouts.app')

@section('title', 'Crear un nuevo Producto')

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
                <h3 class="text-center">Crear un nuevo Producto</h1>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('products.store')}}" method="POST" novalidate>
                            @csrf
                            <label for="name" class="form-label">Nombre: </label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}">

                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror

                            <label for="description" class="form-label">Descripción: </label> <br>
                            <textarea name="description" class="form-control" cols="30" rows="10">{{old('description')}}</textarea>
                            
                            @error('description')
                                <p class="text-danger">{{$message}}</p>
                            @enderror

                            <label for="unit_price" class="form-label">Precio Unitario: </label>
                            <input type="number" class="form-control" name="unit_price" value="{{old('unit_price')}}">

                            @error('unit_price')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            
                            <label for="stock" class="form-label">Stock: </label>
                            <input type="number" class="form-control" name="stock" value="{{old('stock')}}">

                            @error('stock')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            
                            <button type="submit" class="btn btn-success btn-sm mt-3">Guardar Producto</button>
                            <a class="btn btn-danger btn-sm mt-3" href="{{route('products.index')}}" role="button">Cancelar</a>
                            
                        </form>
                    </div>
             </div>
            </div>
        </div>  
    </div>
@endsection