<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      //$users=User::where('id','!=', Auth::user()->id)->get();
      $users = User::all();
      return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
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
    'name' => 'required|min:3',
    'email' => 'required|email|unique:users',
    'password' => 'required|min:6|confirmed',
]);
      $fileName = 'null';
   if($request->hasFile('image')){
       $file = $request->file('image') ;
       $fileName = $file->getClientOriginalName() ;
       $destinationPath = public_path().'/images/' ;

       $file->move($destinationPath,$fileName);
   }

   else{
      $fileName='user-male-icon.png';
  }

  $users=new User;

  $users->name=$request->input('name');
  $users->email=$request->input('email');
  $users->password=bcrypt($request->input('password'));
  $users->image=$fileName;
  $users->save();
  return redirect('/adminpanel/users');
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
      $user=User::find($id);


    return view('admin.user.edit',compact('user'));
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
      $request->validate([
    'name' => 'required|min:3',
    'email' => 'required|email',

]);
      $user=User::find($id);

    $user->name=$request->input('name');
    $user->email=$request->input('email');
    $user->save();
    return redirect('/adminpanel/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user=User::find($id);
    $user->delete();
    return redirect('/adminpanel/users');
    }
}
