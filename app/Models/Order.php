<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['user_id','status_id','total_price'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function OrderProduct()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
