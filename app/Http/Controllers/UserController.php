<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::whereNotIn('city',['Dhaka','joypurhat','Mirpur','Gulshan'])
        // $users = User::whereNotBetween('age',[20,25])
        // $users = User::whereNot('age', 20)
        // ->first();
        // ->whereAge(20)
        // ->select('name', 'email as User Email')
        // ->orWhere('age','>',20)
        // ->where('age','>',24)
        // ->get();
        // return $users;
        $users = User::simplePaginate(10);
        return view("viewAllUsers", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        // $user->age = $request->age;
        // $user->city = $request->city;
        // $user->save();
        $request->validate([
            'name'=> 'required|regex:/^[A-Za-z\s\.\-\_]+$/',
            'email'=> 'required|email',
            'password'=> 'required',
            'age'=> 'required|numeric',
            'city'=> 'required|regex:/^[A-Za-z\s]+$/'
       ]);

        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
            'age'=> $request->age,
            'city'=> $request->city
        ]);

        return redirect()->route('users.index')->with('success','New user added successfully.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      $users = User::find($id);  
      return view('viewUser', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {   
        $user = User::find($user->id);
        return view('updateUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $update_user = User::find($id);
        // $update_user->name = $request->name;
        // $update_user->email = $request->email;
        // $update_user->password = bcrypt($request->password);
        // $update_user->age = $request->age;
        // $update_user->city = $request->city;
        // $update_user->save();
        
        // $user_update =  User::find($id)
        // ->update([
        //     'name' => $request->name,
        //     'email'=> $request->email,
        //     'password'=> bcrypt($request->password),
        //     'age'=> $request->age,
        //     'city'=> $request->city
        // ]);
        $request->validate([
             'name'=> 'required|regex:/^[A-Za-z\s\.\-\_]+$/',
             'email'=> 'required|email',
             'password'=> 'required',
             'age'=> 'required|numeric',
             'city'=> 'required|alpha'
        ]);
        $user = User::where('id', $id)->update([
            'name' => $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
            'age'=> $request->age,
            'city'=> $request->city
        ]);
        return redirect()->route('users.index')->with('success','User updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('success','User deleted successfully.');
    }
}
