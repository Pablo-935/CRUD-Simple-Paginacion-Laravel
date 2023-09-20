<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
    

class ProductController extends Controller
{
    public function index(): View
    {
        $products = DB::table('products')->orderBy('id', 'desc')->paginate(5);

        return view('products.index', ['products'=>$products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', ['product' => $product]);
    }


    public function store(Request $request)
    {
        // Validacion de los datos
        $validado = $request->validate([
            'name' => 'required|string|max:20',
            'description' => 'nullable|string|max:255',
            'unit_price' => 'required|numeric|gt:0',
            'stock' => 'nullable|integer|gte:0',
        ]);

        if($validado['stock'] === null) {
            $validado['stock'] = 0;
        }
        // Guardado de los datos
        Product::create($validado);


        // Redireccion con un manesaje flash de sesion
        return redirect()->route('products.index')->with('status', 'Producto creado satisfactoriamente!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', ['product'=> $product]);
    }

    public function update(Request $request, $id)
    {
        // Busqueda del producto
        $product = Product::findOrFail($id);

        // Validacion de los datos
        $validado = $request->validate([
            'name' => 'required|string|max:20',
            'description' => 'nullable|string|max:255',
            'unit_price' => 'required|numeric|gt:0',
            'stock' => 'nullable|integer|gte:0',
        ]);

        if($validado['stock'] === null) {
            $validado['stock'] = 0;
        }
        // Actualizacion del producto
        $product->update($validado);

        // Redireccion con un mensaje flash de sesion
        return redirect()->route('products.index')->with('status', 'Producto actualizado satisfactoriamente!');
    }

    public function destroy($id)
    {
        // Busqueda del producto
        $product = Product::findOrFail($id);

        // Eliminacion del producto
        $product->delete();

        // Redireccion con un mensaje flash de sesion
        return redirect()->route('products.index')->with('status', 'Producto eliminado satisfactoriamente!');
    }
}