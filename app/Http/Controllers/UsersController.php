<?php

namespace App\Http\Controllers;

use App\Models\Dish;
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
use Illuminate\Validation\ValidationException;
use phpDocumentor\Reflection\Types\Resource_;

class UsersController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $data;

//-------------------------------------------- staff ------------------------------------------------------

    /**
     * @param User $user
     * @return Application|Factory|View
     */
    public function index(User $user)
    {
        $this->data['list'] = $user->getUsers(STAFF);
        return view('modules.admin.staff.wrapper', $this->data);
    }

    /**
     * @param User $user
     * @param $username
     * @return Application|Factory|View
     */
    public function edit(User $user, Restaurant $restaurant, $username)
    {
        $this->data['row'] = $user->getUser($username);
        $this->data['list'] = $restaurant->getRestaurants();
        $this->data['templateName'] = 'update';
        return view('modules.admin.staff.edit', $this->data);
    }
    /**
     * @return Application|Factory|View
     */
    public function update($username)
    {
        User::where('id', $username)->delete();
        return view('modules.admin.staff.wrapper');
    }

    /**
     * @param $staff_id
     * @return Application|RedirectResponse|Redirector
     */
    public function delete($username)
    {
        User::where('id', $username)->delete();
        return redirect('/staff/list');
    }
}
