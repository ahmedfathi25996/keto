<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Meal;
use App\Http\Resources\MealResource;
class MealsController extends Controller
{
  /**
   * [getAllMeals description]
   * @param  Request $request [description]
   * @return [type]           [description]
   */
  public function getAllMeals(Request $request)
{
  $type = $request->input('type');
  $meals = new Meal;
  if($type)
    $meals =  $meals->where('meal_type',$type);
  $meals = $meals->select('id','name','calories')->get();
  return response()->json(['meals'=>$meals]);
}

/**
 * [getMeal description]
 * @param  Request $request [description]
 * @param  [type]  $id      [description]
 * @return [type]           [description]
 */
public function getMeal(Request $request,$id)
{
  $meal = Meal::where('id',$id)->with('ingredients')->first();
      return response()->json(['meal'=>new MealResource($meal)]);
}
}
