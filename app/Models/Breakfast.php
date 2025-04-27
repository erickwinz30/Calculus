<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Breakfast extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    protected $guarded = ['id'];
    protected $with = ['food'];

    protected $fillable = [
        'user_id',
        'id_food',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }

    public function food()
    {
        return $this->belongsTo(Food::class, 'id_food');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
