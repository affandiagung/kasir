<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploading;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    use MediaUploading;

    public function index(): View
    {
        return view('admin.products.index');
    }

    public function create()
    {
    }

    public function store(ProductRequest $request)
    {
    }

    public function show(Product $product)
    {
    }

    public function edit(Product $product)
    {
    }

    public function update(ProductRequest $request, Product $product)
    {
    }

    public function destroy(Product $product)
    {
    }

    public function massDestroy()
    {
    }

    public function search(Request $request)
    {
    }
}
