<?php

namespace App\Http\Controllers;

use App\Models\Dish;
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
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class SessionsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    // --------------------------------------- Log in, Log out ------------------------------------------

    /**
     * @param User $user
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function create(User $user, Request $request)
    {
        $attributes = request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (auth()->attempt($attributes)) {
            $data = $user->getUser($request->username);
            if ($data->status_id == USER) {
                return redirect('/');
            } elseif ($data->status_id == ADMIN) {
                return redirect('restaurant/list');
            } elseif ($data->status_id == STAFF)
                return redirect('/staff/new/orders');
        } else
            throw ValidationException::withMessages(['username' => "your password or username is incorrect!"]);


    }

    /**
     * @return void
     */
    public function logout(Request $request)
    {
        $request->session()->forget('restaurant_id');
         $request->session()->forget('table');
        auth()->logout();

        return redirect('/');
    }
}
