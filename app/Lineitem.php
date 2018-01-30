<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Lineitem extends Model
{
  protected $guarded = [];

  public function cart() {
    return $this->belongsTo(Cart::class);
  }

  public function product() {
    return $this->belongsTo(Product::class);
  }
}
