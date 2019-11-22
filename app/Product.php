<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = [
      'enable',
      'name',
      'sku',
      'new_product_start_date',
      'new_product_end_date',
      'attribute_set_row_id',
      'attribute_set_type',
      'type',
      'meta_title',
      'meta_keyword',
      'meta_description',
      'meta_image',
      'slug',
  ];
  protected $table = 'products';
  protected $primaryKey = 'id';
  public $timestamps = true;
  protected static function boot()
  {
      parent::boot();
      static::saving(function ($query) {
        $query->enable = $query->enable ?? false;
        $query->type = $query->type ?? false;
      });
  }
}
