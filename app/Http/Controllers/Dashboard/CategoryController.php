<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('parent')

        // leftJoin('categories as parents', 'parents.id', '=', 'categories.parent_id')
        //     ->select([
        //         'categories.*',
        //         'parents.name as parent_name'
        //     ])
            ->withCount('products')
            ->orderBy('categories.name')
            ->paginate(); // Return Collection object


        return view('dashboard.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents = Category::all();
        $category = new Category(); //   Because I made one form for creating and editing
        return view('dashboard.category.create', compact('category', 'parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate(Category::rules(), [
            'required' => 'This field :attribute is required',  // all the required
            'name.unique' => 'This name is already exists!'     // only name -> unique
        ]);

        $request->merge([
            'slug' => Str::slug($request->post('name')),
        ]);

        $data = $request->all();

        $data['image'] = $this->uploadImage($request);

        Category::create($data);
        return redirect()->route('dashboard.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)  //     تكون بنفس الاسم في الروت $category لازم ال
    {
        return view('dashboard.category.show',[
            'category'=>$category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // SELECT * FROM categories where id != $id AND (parent_id IS NULL OR parent_id != $id)
        $parents = Category::where('id', '<>', $id)
            ->where(function ($query) use ($id) {
                $query->whereNull('parent_id')
                    ->orWhere('parent_id', '<>', $id);
            })->get();

        $category = Category::findOrFail($id);
        return view('dashboard.category.edit', compact('category', 'parents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {

        $category = Category::findOrFail($id);
        $data = $request->validated();
        $old_image = $category->image;
        $new_image = $this->uploadImage($request);
        if ($new_image) {
            $data['image'] = $new_image;
        }
        if($old_image && $new_image){
            Storage::disk('public')->delete($old_image);
        }
        $category->update($data);
        return redirect()->route('dashboard.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::destroy($id);
        return back();
    }

    protected function uploadImage(Request $request)
    {
        if (!$request->hasFile('image')) {
            return;
        }
        return request()->file('image')->store('uplode', 'public');
    }

    public function trash(){
        $categories=Category::onlyTrashed()->get();
        return view('dashboard.category.trash' ,compact('categories'));
    }

    public function restore(String $id){
        Category::onlyTrashed()->findOrFail($id)->restore();
        return back();
    }

    public function forceDelete(String $id){
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();
        if($category->image){
            Storage::disk('public')->delete($category->image);
        }
        return back();
    }
}
