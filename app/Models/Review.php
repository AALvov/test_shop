<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = ['content', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
