<?php

namespace App\Http\Controllers;

use App\Models\Dish;
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
        \Cart::add($row->id, $row->name, $row->price, 1, $row->image);

        return redirect(route('dishes.show', ['dish_id' => $row->id, 'name' => $row->name]))
            ->with('success', 'dish was added in cart!');

    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $this->data['list'] = \Cart::getContent();
        $this->data['sum'] = $this->sumOfDishes();
        return view('modules.frontend.bucket.wrapper', $this->data);
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function remove(Request $request)
    {
        $dish_id = $request->get('dish_id');
        $table = $request->session()->get('table');
        $restaurant_id = $request->session()->get('restaurant_id');
        \Cart::remove($dish_id);
        if (count(\Cart::getContent()) > 0)
            return redirect(route('bucket'));
        else
            return redirect(route('categories.front', ['table' => $table, 'restaurant_id' => $restaurant_id]));
    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function cancel(Request $request)
    {
        $table = $request->session()->get('table');
        $restaurant_id = $request->session()->get('restaurant_id');
        \Cart::clear();
        return redirect(route('categories.front',['table' => $table, 'restaurant_id' => $restaurant_id]));
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request, Dish $dish)
    {
        $dish_id = $request->get('dish_id');

        \Cart::update($dish_id, ['quantity' => ['relative' => false, 'value' => $request->quantity]]);
        return redirect(route('bucket'));
    }

    /**
     * @return int
     */
    public function sumOfDishes()
    {
        $list = \Cart::getContent();
        $sum = 0;
        if (!empty($list)) {
            foreach ($list as $row) {
                $sum += $row->price * $row->quantity;
            }
            return $sum;
        }
        return 0;
    }
}
