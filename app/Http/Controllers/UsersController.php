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
use Illuminate\Support\Facades\Hash;
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
        $this->data['templateName'] = 'staff';
        return view('modules.admin.users.wrapper', $this->data);
    }

    /**
     * @param User $user
     * @return Application|Factory|View
     */
    public function userIndex(User $user)
    {
        $this->data['word'] = '';
        if (!empty(Request()->get('search'))){
            $this->data['word'] = Request()->get('search');
        }
        $this->data['list'] = $user->getUsers(USER);
        $this->data['templateName'] = 'user';
        return view('modules.admin.users.wrapper', $this->data);
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
        return view('modules.admin.users.edit', $this->data);
    }

    /**
     * @param User $user
     * @param $username
     * @return Application|RedirectResponse|Redirector|void
     */
    public function delete(User $user, $username)
    {
        $row = $user->getUser($username);
        User::where('username', $username)->delete();

        if($row->status_id == STAFF){
            return redirect('/staff/list');
        }elseif ($row->status_id == USER){
            return redirect('/users/list');
        }
    }

    /**
     * @param $username
     * @return Application|Factory|View
     */
    public function editPassword($username)
    {
        $this->data['username'] = $username;
        return view('modules.admin.users.reset_password', $this->data);
    }

    /**
     * @param User $user
     * @param Request $request
     * @param $username
     * @return Application|RedirectResponse|Redirector|void
     */
    public function updatePassword(User $user, Request $request, $username)
    {
        $row = $user->getUser($username);
        $validationArray = [
            'password' => 'required|min:4|max:20',
            'confirm_password' => 'required',
        ];
        $attributes = request()->validate($validationArray);
        if ($attributes['password'] === $request['confirm_password']) {
            unset($attributes['confirm_password']);
            $attributes['password'] = bcrypt($attributes['password']);
            User::where('username', $username)->update($attributes);

            if($row->status_id == STAFF){
                return redirect('/staff/list')->with('success', 'password is updated !');
            }elseif ($row->status_id == USER && auth()->user()->status_id == ADMIN){
                return redirect('/users/list')->with('success', 'password is updated !');
            }elseif (auth()->user()->status_id == USER){
                return redirect('/profile')->with('success', 'Password is successfully updated !');
            }
        }else
            return redirect()->back()->withInput()->withErrors(['password'=>"passwords don't match"]);
    }

    public function confirm($username)
    {
       return view('modules.frontend.users.confirm_password', ['username' => $username]);
    }

    /**
     * @param User $user
     * @param Request $request
     * @param $username
     * @return Application|RedirectResponse|Redirector
     */
    public function confirmPass(User $user, Request $request, $username)
    {
        $validationArray = [
            'password' => 'required',
        ];
        request()->validate($validationArray);

        $row = $user->getUser($username);
        $password = $request->get('password');
        if (Hash::check($password, $row->password)){
            return redirect(route('user.reset.password', ['username' => $row->username]));
        }else{
            return redirect()->back()->with('error', 'Incorrect password');
        }
    }
}
