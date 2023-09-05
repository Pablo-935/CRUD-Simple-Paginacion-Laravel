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
        $products = DB::table('products')->paginate(5);

        return view('products.index', ['products'=>$products]);
    }
}
