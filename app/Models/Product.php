<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name','description','price','image_path','distinctive'];


    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
