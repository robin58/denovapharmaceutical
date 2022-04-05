<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected  $fillable = ['name','slug','image','icon'];

    // Relación de uno a muchos
    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }

    // Relación de muchos a muchos
    public function brands(){
        return $this->belongsToMany(Brand::class);
    }

    public function products(){
        return $this->hasManyThrough(Product::class, Subcategory::class);
    }

    // Para crear URL amigables "Slug"
    public function getRouteKeyName(){
        return 'slug';
    }
}
