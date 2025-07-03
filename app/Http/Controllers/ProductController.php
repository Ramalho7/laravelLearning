<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{

    public function create()
    {
        $categories = Category::all();
        return view("product.create", compact('categories'));
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|integer|min:0',
            'subdescription' => 'required|string|max:500',
            'mainDescripstion' => 'required|string',
            'price' => 'required|numeric|min:0',
            'id_category' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $product = new Product();

        $product->name = $request->name;
        $product->qty = $request->qty;
        $product->subdescription = $request->subdescription;
        $product->mainDescripstion = $request->mainDescripstion;
        $product->price = $request->price;
        $product->slug = \Str::slug($request->name);
        $product->id_user = auth()->id() ?? 1;
        $product->id_category = $request->id_category;

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $imagePath = $image->storeAs('products', $imageName, 'public');

            $product->image = $imagePath;
        }

        $product->save();

        return redirect('/products')->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Display the specified product
     */
    public function show($id)
    {
        $product = Product::with('category', 'user')->findOrFail($id);
        
        if (!$product) {
            return view('product.index', ['product' => null]);
        }
        
        return view('product.product', compact('product'));
    }

    /**
     * Display a listing of products
     */
    public function index()
    {
        $products = Product::with('category', 'user')->orderBy('created_at', 'desc')->get();
        return view('product.index', compact('products'));
    }

}
