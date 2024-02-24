<x-forms.errors />

    <x-forms.input label="Name" name="name" :value="$product->name" placeholder="Enter Name" />
    <x-forms.select label="Category" name="category_id" :options="\App\Models\Category::all()"   :selected="$product->category_id" />
    <x-forms.textarea label="Description" name="description" :value="$product->description" rows="3" />
    <x-forms.file name="image" />
    {{-- @if ($product->image)
    <img src="{{ asset('storage/' . $product->image) }}" alt="" height="60">
    @endif --}}
    <x-forms.input label="Price" name="price" :value="$product->price" placeholder="Enter Price" />
    <x-forms.input label="Compare Price" name="compare_price" :value="$product->compare_price" placeholder="Enter Compare Price" />
    <p class="text-danger">* Between the tags put , </p>
    <x-forms.input label="Tags" name="tags"  placeholder="Enter Compare Price" :value="$tags"/>

    <x-forms.radio name="status" :checked="$product->status" :options="['active'=>'Active', 'draft' => 'Draft', 'archived'=>'Archived']" />
<br>
<button type="submit" class="btn btn-primary">{{ $button_lable ?? 'Save' }} </button>

