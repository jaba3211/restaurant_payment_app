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
     * @param $staff_id
     * @return Application|RedirectResponse|Redirector
     */
    public function delete($username)
    {
        User::where('username', $username)->delete();
        return redirect('/staff/list');
    }

    /**
     * @param $username
     * @return Application|Factory|View
     */
    public function editPassword($username)
    {
        $this->data['username'] = $username;
        return view('modules.admin.staff.reset_password', $this->data);
    }

    /**
     * @param Request $request
     * @param $username
     * @return Application|RedirectResponse|Redirector|void
     */
    public function updatePassword(Request $request, $username)
    {
        $validationArray = [
            'password' => 'required|min:4|max:20',
            'confirm_password' => 'required',
        ];
        $attributes = request()->validate($validationArray);
        if ($attributes['password'] === $request['confirm_password']) {
            unset($attributes['confirm_password']);
            $attributes['password'] = bcrypt($attributes['password']);
            User::where('username', $username)->update($attributes);

            return redirect('/staff/list')->with('success', 'password is updated !');
        }else
            return redirect()->back()->withInput()->withErrors(['password'=>"passwords don't match"]);
    }
}
