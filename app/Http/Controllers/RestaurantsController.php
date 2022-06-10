<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Controller as BaseController;

class RestaurantsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /* backend */

    public $data;
    private $validationArray = [
        'name' => 'required|max:191|unique:restaurants,name',
        'description' => '',
    ];

    /**
     * @param Restaurant $restaurant
     * @return Application|Factory|View
     */
    public function index(Restaurant $restaurant)
    {
        $this->data['list'] = $restaurant->getRestaurants();
        return view('modules.admin.restaurants.wrapper',$this->data);
    }

    /**
     * @return Application|Factory|View
     */
    public function add()
    {
        $this->data['templateName'] = 'create';
        return view('modules.admin.restaurants.create',$this->data);
    }

    /**
     * @return Application|Factory|View
     */
    public function edit(Restaurant $restaurant, $restaurant_id)
    {
        $this->data['templateName'] = 'update';
        $this->data['row'] = $restaurant->getRestaurant($restaurant_id);
        return view('modules.admin.restaurants.update',$this->data);
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
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request)
    {
        $id = $request->get('restaurant_id');
        $this->validationArray['name'] = 'required';
        $attributes = request()->validate($this->validationArray);
        Restaurant::where('id',$id)->update($attributes);

        return redirect('restaurant/list');

    }

    /**
     * @param Restaurant $restaurant
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function delete(Restaurant $restaurant,Request $request)
    {
        $id = $request->get('restaurant_id');
        $row = $restaurant->getRestaurant($id);
        $row->delete();
        return redirect('restaurant/list');
    }
}
