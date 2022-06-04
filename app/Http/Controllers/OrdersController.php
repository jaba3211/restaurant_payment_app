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

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function create()
    {
        $bucket = \Cart::getContent();
        if (count($bucket) > 0){
            foreach ($bucket as $order){
                $orders = [
                    'dish_id' => $order->id,
                    'user_id' => auth()->id(),
                    'quantity' => $order->quantity,
                    'restaurant_id' => 5,
                    'table' => 1,
                ];
            }
            Orders::create($orders);
            \Cart::clear();
        }else
             return redirect(route('bucket'))->with('error','Something went wrong!');

        return redirect(route('bucket'))->with('success','Your order is accept!');
    }
}
