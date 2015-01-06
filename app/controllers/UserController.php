<?php
    
class UserController extends BaseController {

    public function showUser()
    {
        $user =  Auth::user();
        return View::make('user')
                   ->with('user', $user);
    }
    
    public function showUsers()
    {
        $users =  User::all();
        return View::make('users')
                   ->with('users', $users);
    }
    
    public function showSecret()
    {
        $user =  Auth::user();
        return View::make('secret')
                   ->with('user', $user);
    }
}