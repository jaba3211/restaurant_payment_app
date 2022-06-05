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

class SearchController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $data;

    /**
     * @param Request $request
     * @param Dish $dish
     * @return Application|Factory|View
     */
    public function search(Request $request, Dish $dish)
    {
        $restaurantId = $request->session()->get('restaurant_id');
        $search = $request->get('search');
        $this->data['list'] = $dish->search($restaurantId,$search);

        return view('modules.frontend.search.wrapper',$this->data);
    }
}
