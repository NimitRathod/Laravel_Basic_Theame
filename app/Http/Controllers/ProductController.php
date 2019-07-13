<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use Datatables;
use DB;

class ProductController extends Controller
{
    public function index(){
        // dd(Product::all());
        return view('backend.templates.Yajra_Package.show');
    }

    public function getProducts(){
        $products = DB::table('products')->select('*');
        return Datatables::of($products)->make(true);
    }
}
