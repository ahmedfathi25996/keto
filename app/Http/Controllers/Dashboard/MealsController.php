<?php

namespace App\Http\Controllers\Dashboard;
use App\Meal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class MealsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $meals = Meal::all();
        return view('admin.meal.index',compact('meals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.meal.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
    'name' => 'required',
    'preparation' => 'required',
    'meal_type' => 'required',
    'calories' => 'required|numeric',
    'image' => 'required',
    'ings' => 'array',
    'ings.*' => 'required'

]);
      $fileName = 'null';
       if($request->hasFile('image')){
           $file = $request->file('image') ;
           $fileName = $file->getClientOriginalName() ;
           $destinationPath = public_path().'/images/' ;

           $file->move($destinationPath,$fileName);
       }
      $data = $request->all();
  $meal = new Meal();
  $meal->name = $request->input('name');
  $meal->preparation = $request->input('preparation');
  $meal->meal_type = $request->input('meal_type');
  $meal->calories = $request->input('calories');
  $meal->image = $fileName;

  if($meal->save()){
  foreach ($data['ings'] as $ing => $value)
  {
    $test = DB::table('ingredients')->insert([
      'meal_id' => $meal->id,
      'ing_name' => $value,
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()

    ]);
  }


}
return redirect('/adminpanel/meals');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $meal=Meal::find($id);

    return view('admin.meal.edit',compact('meal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $data = $request->all();
    $meal=Meal::find($id);
    $meal->name = $request->input('name');
    $meal->preparation = $request->input('preparation');
    $meal->meal_type = $request->input('meal_type');
    $meal->calories = $request->input('calories');

   if($meal->save())
   {
    DB::table('ingredients')->where('meal_id',$id)->delete();

    foreach ($data['ings'] as $ing => $value) {
    DB::table('ingredients')->where('meal_id','=',$id)->insert([
        'meal_id'=>$meal->id,
        'ing_name'=>$value,

        'created_at'=>Carbon::now(),
        'updated_at'=>Carbon::now()

     ]);

    }
    }
    return redirect('/adminpanel/meals');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $meal=Meal::find($id);
      $meal->delete();
      return redirect('/adminpanel/meals');
    }
}
