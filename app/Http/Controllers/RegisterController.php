<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Routing\Redirector;

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
    public function index(Restaurant $restaurant)
    {
        $this->data['list'] = $restaurant->getRestaurants();
        $this->data['templateName'] = 'create';
        return view('modules.register', $this->data);
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
                $attributes['restaurant_id'] = $request->get('restaurant_id');
            }
            User::create($attributes);
        }else
            return redirect('/register')->withInput()->withErrors(['password'=>"passwords don't match"]);
        if (isAdmin()) {
            return redirect('/staff/list');
        }
        return redirect('/authorization')->with('success', 'You are registered!');

    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request)
    {
        $username = $request->get('username');
        $attributes = request()->validate($this->validationArray);
        if ($attributes['password'] === $request['confirm_password']){
            unset($attributes['confirm_password']);
            $attributes['password'] = bcrypt($attributes['password']);

            if (isAdmin()){
                $attributes['status_id'] = STAFF;
                $attributes['restaurant_id'] = $request->get('restaurant_id');
            }
            User::where('username', $username)->updated($attributes);
        }else
            return redirect('/staff/edit')->withInput()->withErrors(['password'=>"passwords don't match"]);
        if (isAdmin()) {
            return redirect('/staff/list');
        }
        return redirect('/authorization')->with('success', 'Successfully updated!');

    }
}
