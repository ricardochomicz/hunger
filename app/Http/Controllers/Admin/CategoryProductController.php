<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    protected $category, $product;

    public function __construct(Category $category, Product $product)
    {
        $this->category = $category;
        $this->product = $product;   
    }

    public function categories($idProduct)
    {
        if(!$product = $this->product->find($idProduct))
        {
            return redirect()->back();
        }

        $categories = $product->categories()->paginate();
        return view('admin.pages.products.categories.index', compact('product', 'categories'));
    }

    public function products($idCategory)
    {
        if(!$category = $this->category->find($idCategory))
        {
            return redirect()->back();
        }

        $products = $category->products()->paginate();
        return view('admin.pages.categories.products.products', compact('category', 'products'));
    }

    public function categoriesAvailable(Request $request, $idProduct)
    {
        if (!$product = $this->product->find($idProduct)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');
       

        $categories = $product->categoriesAvailable($request->filter);
        return view('admin.pages.products.categories.available', compact('product', 'categories', 'filters'));
    }

    public function attachCategoriesProduct(Request $request, $idProduct)
    {
        if (!$product = $this->product->find($idProduct)) {
            return redirect()->back();
        }

        if (!$request->categories || count($request->categories) == 0) {
            return redirect()
                ->back()
                ->with('warning', 'Selecione uma categoria');
        }

        $product->categories()->attach($request->categories);
        toast('Categoria vinculada com sucesso', 'success')->position('bottom-end');
        return redirect()->route('products.index');
    }

    public function detachCategoryProduct($idProduct, $idCategory)
    {
        $product = $this->product->find($idProduct);
        $category = $this->category->find($idCategory);
        if (!$product || !$category) {
            return redirect()->back();
        }

        $product->categories()->detach($category);
        toast('Categoria desvinculada com sucesso', 'info')->position('bottom-end');
        return redirect()->route('products.categories', $product->id);
    }
}
