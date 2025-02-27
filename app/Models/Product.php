<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts = [
        'qr_code' => 'array',
    ];

    public function category(){
        return $this->belongsTo(Category::class );
    }

    public function brend(){
        return $this->belongsTo(Brend::class);
    }
}
