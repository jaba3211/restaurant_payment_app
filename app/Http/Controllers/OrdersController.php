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
     * @return Application|Factory|View
     */
    public function index(Orders $orders)
    {
        $userId = auth()->id();
        $this->data['list'] = $orders->getOrderdByList($userId);

        return view('modules.frontend.orders.wrapper', $this->data);
    }

    /**
     * @param Orders $orders
     * @param $date
     * @return Application|Factory|View
     */
    public function show(Orders $orders, $date)
    {
        $userId = auth()->id();
        $this->data['list'] = $orders->getList($userId, $date);
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
    /**
     * @param Orders $orders
     * @param Request $request
     * @return Application|Factory|View
     */
    public function staffIndex(Orders $orders, Request $request)
    {
        $restaurantId = auth()->user()->restaurant_id;
        $this->data['list'] = $orders->getOrderdByTableList($restaurantId, NEW_ORDER);

        return view('modules.staff.orders.new.wrapper', $this->data);
    }

    /**
     * @param Orders $orders
     * @param Request $request
     * @param $date
     * @return Application|Factory|View
     */
    public function staffShow(Orders $orders, $table, $date)
    {
        $restaurantId = auth()->user()->restaurant_id;
        $this->data['list'] = $orders->getForStaff($restaurantId, $table, $date, NEW_ORDER);
        $this->data['sum'] = $this->sumOfDishes($this->data['list']);
        $this->data['date'] = $date;

        return view('modules.staff.orders.new.show', $this->data);
    }

    public function submit($date)
    {
        Orders::where('created_at', $date)->update(['status_id' => OLD_ORDER]);
        return redirect(route('staff.new.orders'));
    }


    /**
     * @param Orders $orders
     * @param Request $request
     * @return Application|Factory|View
     */
    public function staffOldIndex(Orders $orders, Request $request)
    {
        $restaurantId = auth()->user()->restaurant_id;
        $this->data['list'] = $orders->getOrderdByTableList($restaurantId, OLD_ORDER);

        return view('modules.staff.orders.old.wrapper', $this->data);
    }

    /**
     * @param Orders $orders
     * @param Request $request
     * @param $date
     * @return Application|Factory|View
     */
    public function staffOldShow(Orders $orders, $table, $date)
    {
        $restaurantId = auth()->user()->restaurant_id;
        $this->data['list'] = $orders->getForStaff($restaurantId, $table, $date, OLD_ORDER);
        $this->data['sum'] = $this->sumOfDishes($this->data['list']);
        $this->data['date'] = $date;

        return view('modules.staff.orders.old.show', $this->data);
    }
}
