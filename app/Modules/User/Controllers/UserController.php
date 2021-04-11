<?php

namespace App\Modules\User\Controllers;

use App\Contracts\UserRepositoryInterface;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    private $users;
    public function __construct(
        UserRepositoryInterface $users

    ) {
        $this->users = $users;

    }

    public function showHome()
    {

        return view('User::showHome');
    }
    public function handleLogin()
    {
       
        $validatedData = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
      

        $checkLogin = $this->users->login($validatedData);

   
        if ($checkLogin) {
            if (auth()->user()->isAdmin()) {
                return redirect()->route('showHome');
            }
            return redirect()->route('showBatches');

        }

        // alert()->error('Wrong credentials', 'Oups!')->persistent('Cancel');
        return redirect()->back();

    }

    public function handleLogout()
    {

        $checkLogout = $this->users->logout();
        if ($checkLogout) {
            return redirect()->back();
        }

        alert()->error('Something went wrong', 'Oups!')->persistent('Cancel');
        return redirect()->back();
    }

    public function showUpdateUser($id)
    {
        $checkUser = $this->users->fetchById($id);
        if ($checkUser) {

            return view('User::showUpdateUser', [
                'user' => $checkUser,
            ]);
        }
        return view('showNotFound');

    }

}
