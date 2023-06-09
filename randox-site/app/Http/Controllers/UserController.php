<?php

namespace App\Http\Controllers;
use App\Models\Plan;
use App\Models\User;


use Illuminate\Http\Request;

class UserController extends Controller
{
    function getUsers() {
        $users = User::all();

        return view('users', compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'L utilisateur a été supprimé avec succès.');
    }

    public function updateUser(Request $request,$id)
    {

        $validated = $request->validate([
            'isAdmin' => 'required',

        ]);


        $isAdmin = 0;
        if ($request->isAdmin == "1"){
            $isAdmin = 1;
        }

        if($validated) {
            $user = User::where('id', $id)->first();
            $user->isAdmin = $isAdmin;
            $user->save();

            return redirect('users')->with('success', 'Droits de l utilisateur modifiés avec succès !');
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }
}
