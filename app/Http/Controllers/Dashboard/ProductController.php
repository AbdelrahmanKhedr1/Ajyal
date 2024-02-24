<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $this->authorize('viewAny', Product::class);
        $product = Product::with(['category', 'store'])->get(); // استخدمت ويز عشان افضل شايل الكاتيجوري و ال ستور في الرام عشان اقلل عدد جمل السليكت في الداتابيز عشان الريلاشن شيب
        return view('dashboard.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $this->authorize('create', Product::class);

        // $product = Product::all();
        // return view('dashboard.product.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $this->authorize('create', Product::class);

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $this->authorize('view', $product);
        if($product->status != 'active'){
            return abort(404);
        }
        return view('front.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        // $this->authorize('update', $product);
        $tags = implode(',', $product->tags()->pluck('name')->toArray());
        return view('dashboard.product.edit', compact('product','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // $this->authorize('update', $product);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'image' => ['nullable', 'image', 'max:1048576'],
            'price' => ['required'],
            'compare_price' => ['nullable'],
            'options' => ['nullable', 'json'],
            'rating' => ['nullable', 'integer'],
            'featured' => ['boolean'],
            'status' => ['in:active,archived,draft'],

        ]);
        // if ($request->hasFile('image')) {
        //     Storage::delete($product->image);
        //     $path = Storage::putfile('products', $request->file('image'));
        //     $request['image'] = $path;
        // } else {
        //     unset($request['image']);
        // }
        $product->update($request->except('tags'));
        $tags = explode(',',$request->post('tags'));
        $tag_ids = [];

        $saved_tags = Tag::all();

        foreach ($tags as $t_name) {
            $slug = Str::slug($t_name);
            $tag = $saved_tags->where('slug', $slug)->first();
            if (!$tag) {
                $tag = Tag::create([
                    'name' => $t_name,
                    'slug' => $slug,
                ]);
            }
            $tag_ids[] = $tag->id;
        }

        $product->tags()->sync($tag_ids);
        return redirect()->route('dashboard.products.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product=Product::findOrFail($id);
        // $this->authorize('delete', $product);
    }
}
