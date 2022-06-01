<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\User;
use Darryldecode\Cart\Cart;
use Illuminate\Contracts\Foundation\Application;
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
            $data = $user->getFilterUser($request->username);
            if ($data->status_id == 0) {
                return redirect('/');
            } elseif ($data->status_id == 1) {
                return redirect('restaurant/list');
            } else
                return redirect('/register');
        } else
            throw ValidationException::withMessages(['username' => "your password or username is incorrect!"]);


    }

    /**
     * @return void
     */
    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }

    // --------------------------------------- bucket ------------------------------------------

    /**
     * @param Request $request
     * @param Dish $dish
     * @return Application|RedirectResponse|Redirector
     */
    public function add(Request $request, Dish $dish)
    {
//        dd('sdf');
        $dish_id = $request->get('dish_id');
        $row = $dish->getDish($dish_id);
        \Cart::add($row->id,$row->name,$row->price,1,[$row->image]);
        $items = \Cart::getContent();
        dd($items);


        return redirect(route('dishes.show', ['dish_id' => $row->id, 'name' => $row->name]));

    }

    public function index(Request $request)
    {
        $this->data['list'] = $request->session()->get('bucket');
        return view('modules.frontend.bucket.wrapper', $this->data);
    }
}
