<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use App\Models\User;
use App\Http\Requests\UsersUpdateProfileRequest;
use App\Http\Requests\ClientUpdateProfileRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\EmergencyContact;


use function GuzzleHttp\Promise\all;

class UsersController extends Controller
{
    //

    public function index(){

        return view('users.index',[
            'users' => User::all(),
            'contacts' => EmergencyContact::all(),
        ]);

    }

    public function MakeAdmin(User $user){
        $user->role = 'admin';

        $user->save();

        session()->flash('success', 'User role updated successfully');
        return  redirect()->route('users.index');
    }

    public function MakeWriter(User $user){
        $user->role= 'tenant';
        $user->save();

        session()->flash('success', 'User role updated successfully');
        return  redirect()->route('users.index');


    }

    public function edit(){
        return view('users.edit', [
            'user' => auth()->user(),
        ]);
    }




    public function destroy(User $user){



        Storage::delete($user->logo);

        $user->delete();

        session()->flash('success', 'You have successfully deleted the user');
        return redirect()->route('users.index');
    }

    public function notifications(){

        //mark all as read
        auth()->user()->unreadNotifications->markAsRead();
        //display all notifications

        $page = 2; /* Actual page */

      $limit = 4; /* Limit per page*/


        return view('users.notifications',[
            'notifications' => auth()->user()->notifications,
        ]);

    }

}
