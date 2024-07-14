<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'catelogue_id',
        'name',
        'slug',
        'sku',
        'img_thumbnail',
        'price_regular',
        'price_sale',
        'description',
        'content',
        'material',
        'user_manual',
        'is_active',
        'is_hot_deal',
        'is_good_deal',
        'is_new',
        'is_show_home',
    ];
    protected $casts = [
        'is_active'=> 'boolean',
        'is_hot_deal'=> 'boolean',
        'is_good_deal'=> 'boolean',
        'is_new'=> 'boolean',
        'is_show_home'=> 'boolean',
    ];

    public function catelogue()
        // Đặt tên theo tên bảng số ít
    {
        return $this->belongsTo(Catelogue::class);
        // Ở phương diện Product phụ thuộc vào bảng Catalogue
        // Sử dụng belongsTo ý hiểu là product thuộc về catalogue (sử dụng ở đây là với bảng nhiều)
        // Sử dụng với quan hệ 1 nhiều
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
