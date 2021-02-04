<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Product extends Model
{
    use Sluggable;
    protected $guarded='';

    protected $fillable =[
        'title', 'description', 'slug', 'status','offer_price'
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function sluggable(){
        return [
            'slug' =>[
                'source' => 'title'
            ]
        ];
    }
}
