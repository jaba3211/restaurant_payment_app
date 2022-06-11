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

class PaymentController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $data;

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('modules.frontend.payment.wrapper');
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function pay(Request $request)
    {
       $paymentStatus = $request->get('pay');
       if ($paymentStatus == 'in_cash'){
           return redirect(route('orders.create'));
       }else{
           return redirect(route(''));
       }
    }
}
