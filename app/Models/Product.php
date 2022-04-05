<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;

    const BORRADOR = 1;
    const PUBLICADO =  2;

    protected $guarded = ['id','created_at', 'update_at'];

    // Relación de uno a muchos inversa
    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    // Relación de uno a muchos polimorfica
    public function images(){
        return $this->morphMany(Image::class,"imageable");
    }

    //URL AMIGABLES
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
