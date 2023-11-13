<?php

namespace App\Http\Controllers;

use App\Models\ProductLines;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $productlines = ProductLines::all();
        return view('index', compact('productlines'));
    }

    public function get_all_products()
    {
        $productlines = ProductLines::all();
        $products = Products::all();
        return view('products', compact('products', 'productlines'));
    }

    public function get_details($value)
    {
        $productlines = ProductLines::all();
        foreach ($productlines as $item) {
            if ($value === $item->productLine) {
                $products = Products::all()->where('productLine', $value);
                $description = $item->textDescription;
                return view('products', compact('products', 'productlines', 'description'));
            }
        }
        $productdetails = Products::all()->where('productCode', $value);
        $recommendations = '';
        $description = '';
        foreach ($productdetails as $item) {
            $recommendations = Products::all()->where('productLine', $item->productLine);
            $description = ProductLines::all()->where('productLine', $item->productLine)->first()->textDescription;
        }
        return view('product-details', compact('productdetails', 'productlines', 'recommendations', 'description'));
    }
}
