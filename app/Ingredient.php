<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
  protected $table = 'ingredients';
  protected $fillable = [
      'meal_id', 'ing_name',
  ];
}
