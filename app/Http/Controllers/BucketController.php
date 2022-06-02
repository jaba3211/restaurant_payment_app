<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Darryldecode\Cart\Cart;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;

class BucketController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $data;

    /**
     * @param Request $request
     * @param Dish $dish
     * @return Application|RedirectResponse|Redirector
     */
    public function add(Request $request, Dish $dish)
    {
        $dish_id = $request->get('dish_id');
        $row = $dish->getDish($dish_id);
        \Cart::add($row->id,$row->name,$row->price,1,$row->image);

        return redirect(route('dishes.show', ['dish_id' => $row->id, 'name' => $row->name]))
            ->with('success','dish was added in cart!');

    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $this->data['list'] = \Cart::getContent();
        return view('modules.frontend.bucket.wrapper', $this->data);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function remove(Request $request)
    {
        $dish_id = $request->get('dish_id');
        \Cart::remove($dish_id);

        return redirect(route('bucket'));
    }

    /**
     * @return string
     */
    public function cancel()
    {
        \Cart::clear();
        return redirect(route('categories.front'));
    }

}
