<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Meal;
use App\Http\Resources\MealResource;
class AdminController extends Controller
{
    public function index()
    {
      $breakfast = Meal::where('meal_type',1)->get();
      $lunch = Meal::where('meal_type',2)->get();
      $dessert = Meal::where('meal_type',3)->get();
      $drink = Meal::where('meal_type',4)->get();
      $lateMeals = Meal::orderBy('id', 'desc')->take(8)->get();

      return view('admin.home.index',compact('breakfast','lunch','dessert','drink','lateMeals'));
    }
}
