<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Orders;
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

class OrdersController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $data;

//-------------------------------------- frontend --------------------------------------

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function create(Request $request)
    {
        $restaurantId = $request->session()->get('restaurant_id');
        $table = $request->session()->get('table');
        $bucket = \Cart::getContent();
        if (count($bucket) > 0){
            foreach ($bucket as $order){
                $orders = [
                    'dish_id' => $order->id,
                    'user_id' => auth()->id(),
                    'quantity' => $order->quantity,
                    'restaurant_id' => $restaurantId,
                    'table' => $table,
                ];
            Orders::create($orders);
            }
            \Cart::clear();
        }else
             return redirect(route('bucket'))->with('error','Something went wrong!');

        return redirect(route('bucket'))->with('success','Your order is accept!');
    }

    /**
     * @param Orders $orders
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Orders $orders, Request $request)
    {
        $userId = auth()->id();
        $restaurantId = $request->session()->get('restaurant_id');
        $this->data['list'] = $orders->getOrderdByList($userId, $restaurantId);

        return view('modules.frontend.orders.wrapper', $this->data);
    }

    /**
     * @param Orders $orders
     * @param Request $request
     * @param $date
     * @return Application|Factory|View
     */
    public function show(Orders $orders, Request $request, $date)
    {
        $userId = auth()->id();
        $restaurantId = $request->session()->get('restaurant_id');
        $this->data['list'] = $orders->getList($userId, $restaurantId, $date);
        $this->data['sum'] = $this->sumOfDishes($this->data['list']);

        return view('modules.frontend.orders.show', $this->data);
    }

    /**
     * @param $list
     * @return float|int
     */
    public function sumOfDishes($list)
    {
        $sum = 0;
        if (!empty($list)) {
            foreach ($list as $row) {
                $sum += $row->dish->price * $row->quantity;
            }
            return $sum;
        }
        return 0;
    }
//-------------------------------------- staff --------------------------------------

}
