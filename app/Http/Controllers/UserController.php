<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
   //     $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUsers()
    {
        return User::all();
    }

    public function getCurrentUser()
    {
        $id = Auth::user()->id;
        return User::find($id);
    }

    public function getUser($id)
    {
        return User::find($id);
    }

    public function postUser(Request $request) {
        $varr = [
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ];
        if (!$request->id) {
            $varr = array_merge($varr, [
                'password' => 'required|min:8',
                'verifyPw' => 'required|same:password',
            ]);
        }
        $request->validate($varr);

        if ($request->id) {
            $user = User::where('id',$request->id)->firstOrFail();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->save();
        } else {
            User::Create([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'password' => Hash::make($request->password),
            ]);
        }
    }

    public function changePassword(Request $request, $id){
        $request->validate([
            'password' => 'required|min:8',
            'verifyPw' => 'required|same:password',
        ]);

        $user = Auth::user();
        if($user->id !== $request->id && $user->role !== 'admin') abort(403, 'forbidden');

        $user = User::where('id', $id)->first();
        $user->password = Hash::make($request->password);
        $user->save();
    }
}
