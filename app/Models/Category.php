<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use Sluggable;

    protected $primaryKey = 'category_id';

    protected $fillable = [
        "category_name",
        "category_description",
        "category_priority",
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'category_name'
            ]
        ];
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }


    function computers()
    {
        return $this->hasMany(Computer::class, "fk_category_computer");
    }
}
