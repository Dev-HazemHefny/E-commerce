<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Product extends Model
{
    use HasFactory;
    use Sluggable;
    // public $timestamps = false;
    public function Sluggable():array
    {
        return
        [
            'slug'=>
            [
                'source'=>'title'
            ]
            ];
    }
    protected $fillable = [

        'title',
        'descreption',
        'price',
        'quantity',
        'category',
        'image',
    ];
}
