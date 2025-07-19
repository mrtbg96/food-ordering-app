<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Category;
use App\Http\Requests\Vendor\StoreProductRequest;
use App\Http\Requests\Vendor\UpdateProductRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Product;

class ProductController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('Vendor/Products/Create', [
            'categories' => Category::all(['id', 'name']),
            'category_id' => request('category_id'),
        ]);
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        Product::create($request->validated());

        return to_route('vendor.menu')
            ->withStatus('Product created successfully.');
    }

    public function edit(Product $product)
    {
        return Inertia::render('Vendor/Products/Edit', [
            'categories' => Category::get(['id', 'name']),
            'product'    => $product,
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return to_route('vendor.menu')
            ->withStatus('Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return to_route('vendor.menu')
            ->withStatus('Product deleted successfully.');
    }
}
