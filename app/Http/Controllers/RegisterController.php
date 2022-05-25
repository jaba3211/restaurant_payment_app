<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class RegisterController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $data;
    private $validationArray = [
        'firstname' => 'required|max:255',
        'lastname' => 'required|max:255',
        'username' => 'required|max:255|min:3|unique:users,username',
        'mobile_number' => 'required|min:9|max:11|unique:users,mobile_number',
        'password' => 'required|min:4|max:20',
        'confirm_password' => 'required',
    ];

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('modules.register');
    }

    /**
     * @return void
     */
    public function create(Request $request)
    {
        $attributes = request()->validate($this->validationArray);
        if ($attributes['password'] === $request['confirm_password']){
            unset($attributes['confirm_password']);
            $attributes['password'] = bcrypt($attributes['password']);

            if (isAdmin()){
                $attributes['status_id'] = STAFF;
            }
            User::create($attributes);
        }else
            return redirect('/register')->withInput()->withErrors(['password'=>"passwords don't match"]);
        if (isAdmin()) {
            return redirect('/register')->with('success', 'staff is registered!');
        }
        return redirect('/authorization')->with('success', 'You are registered!');

    }
}
