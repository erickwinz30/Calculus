<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Food extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $guarded = ['id'];

    protected $fillable = [
        'food_name',
        'food_calories',
        'carbohydrate',
        'fat',
        'cholesterol',
        'protein',
        'sodium',
        'sugar',
        'weight',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }

    public function breakfasts()
    {
        return $this->hasMany(Breakfast::class);
    }
    public function lunches()
    {
        return $this->hasMany(Lunch::class, 'id_food', 'id');
    }
    public function dinners()
    {
        return $this->hasMany(Dinner::class, 'id_food', 'id');
    }
    public function snacks()
    {
        return $this->hasMany(Snack::class, 'id_food', 'id');
    }
}
