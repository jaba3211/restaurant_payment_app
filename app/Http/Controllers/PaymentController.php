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

    public $validationArray = [
        'card_number' => 'required|max:19|min:19',
        'full_name' => 'required',
        'month' => 'required|numeric',
        'year' => 'required',
        'cvv' => 'required|numeric',
    ];

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('modules.frontend.payment.wrapper');
    }

    /**
     * @return Application|Factory|View
     */
    public function show()
    {
        return view('modules.frontend.payment.show');
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function pay(Request $request)
    {
        $paymentStatus = $request->get('pay');
        if ($paymentStatus == 'in_cash') {
            $request->session()->put('payment', IN_CACHE);
            return redirect(route('orders.create'));
        } else {
            $request->session()->put('payment', BY_CARD);
            return redirect(route('pay.online'));
        }
    }

    public function submit()
    {
        $attributes = request()->validate($this->validationArray);
        if (strlen($attributes['card_number']) != 19 and !is_numeric($attributes['card_number'])) {
            return redirect(route('pay.online'))->withInput()->with(['error' => "card number is incorrect!"]);
        } elseif (!($attributes['month'] <= 12) or !($attributes['month'] > 0) or strlen($attributes['month']) != 2) {
            return redirect(route('pay.online'))->withInput()->with(['error' => "Incorrect Month input!"]);
        } elseif (strlen($attributes['year']) != 2 or !($attributes['year'] > 0)) {
            return redirect(route('pay.online'))->withInput()->with(['error' => "Incorrect input year!"]);
        } elseif (strlen($attributes['cvv']) != 3 and strlen($attributes['cvv']) != 4 or !($attributes['cvv'] > 0)) {
            return redirect(route('pay.online'))->withInput()->with(['error' => "Incorrect input cvv!"]);
        }
        return redirect(route('orders.create'))->with('success', 'The order is Successfully!');
    }

}
