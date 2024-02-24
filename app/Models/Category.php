<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'description',
        'image',
        'status',
    ];
    protected $appends = ['image_url'];


    public static function rules($id = 0){
        return[
            'name' => [
                'required',
                'string',
                'max:255',
                'min:3',
                // "unique:categories,name,$id",
                Rule::unique('categories','name')->ignore($id),
            ],

            'parent_id' => 'nullable|int|exists:categories,id',
            'image' => 'nullable|image|max:1048576',
            'status'=> 'required|in:active,archived',
            'description' => 'nullable|string|max:1000',
        ];
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id')
            ->withDefault([
                'name' => '-'
            ]);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function getImageUrlAttribute(){
        if(!$this->image){
            return  asset('assets/images/products/comingsoon.png') ;
        }
        if(Str::startsWith($this->image,['https://','http://'])){
            return $this->image;
        }
        return Storage::url($this->image);
    }

}
