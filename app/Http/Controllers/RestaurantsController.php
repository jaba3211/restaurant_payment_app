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
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller as BaseController;

class RestaurantsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /* backend */

    private $validationArray = [
        'name' => 'required|max:191',
        'description' => '',
    ];

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('modules.admin.restaurants.create');
    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function create()
    {
        $attributes = request()->validate($this->validationArray);
        Restaurant::create($attributes);

        return redirect('restaurant/list');

    }

    /**
     * @param Restaurant $restaurant
     * @return Application|Factory|View
     */
    public function beck(Restaurant $restaurant)
    {
        $this->data['list'] = $restaurant->getRestaurants();
        return view('modules.admin.restaurants.beck',$this->data);
    }

    /**
     * @param Restaurant $restaurant
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function delete(Restaurant $restaurant,Request $request)
    {
        $id = $request->get('id');
        $row = $restaurant->getRestaurant($id);
        $row->delete();
        return redirect('restaurant/list');
    }
}
