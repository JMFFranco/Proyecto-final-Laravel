<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;
    use Sluggable;

    protected $primaryKey = 'computer_id';

    protected $fillable = [
        "computer_brand",
        "computer_model",
        "computer_price",
        "computer_ram_size",
        "computer_is_laptop",
        "fk_category_computer"
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'computer_model'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


    function category()
    {
        return $this->belongsTo(Category::class, "fk_category_computer", "category_id");
    }
}
