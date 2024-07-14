<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catelogue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cover',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
        // Ở đây sử dùng với bảng số ít

    }
    // với quan hệ 1-1
    // public function ten_bang_so_it(){
    //     return $this->hasOne(Product::class);
    // }
}
