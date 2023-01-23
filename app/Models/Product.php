<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['description', 'stock'];

    public function categories()
    {
        return $this->belongsTo(Category::class);   // un producto $this pertenece a una categoria

        // return $this->belongsTo(Category::class, 'category_id', 'id');   // muestra el nombre de la relación

    }
}

