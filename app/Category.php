<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable = [
      'enable',
      'name',
      'slug',
      'show_short_description',
      'short_description',
      'show_description',
      'description',
      'full_width_banner',
      'banner_image',
      'meta_title',
      'meta_keyword',
      'meta_description',
      'meta_image',
  ];
  protected $table = 'categories';
  protected $primaryKey = 'id';
  public $timestamps = true;
  protected static function boot()
  {
      parent::boot();
      static::creating(function ($query) {
        $query->enable = $query->enable ?? true;
        $query->show_short_description = $query->show_short_description ?? false;
        $query->show_description = $query->show_description  ?? false;
      });
  }
}
