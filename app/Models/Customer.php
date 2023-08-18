<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{

    public function scopeFilter(Builder $builder, $filters)
    {
        $builder->when($filters['search'] ?? '', function ($builder, $value) {
            $builder->where(function ($builder) use ($value) {
                $builder->where('name', 'LIKE', "%{$value}%")
                    ->orWhere('email', 'LIKE', "%{$value}%");
            });
        });
    }
    protected $fillable=[
        'name', 'age', 'address', 'cover_image_path', 'phone', 'user_id', 'gender', 'email', 'status'
    ];

    use HasFactory;

}
