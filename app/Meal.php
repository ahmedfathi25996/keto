<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
  protected $table = 'meals';
  protected $fillable = [
      'name', 'preparation', 'meal_type','calories',
  ];
  public function ingredients()
   {
     return $this->hasMany('App\Ingredient');
   }
}
