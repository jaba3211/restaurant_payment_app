<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class PageController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $data;

    /**
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        return view('modules.index');
    }

    /**
     * @return Application|Factory|View
     */
    public function static()
    {
        return view('modules.about_us');
    }

    /**
     * @return Application|Factory|View
     */
    public function QR()
    {
        return view('modules.frontend.QR.qr');
    }

    /**
     * @return Application|Factory|View
     */
    public function profile()
    {
        $this->data['row'] = auth()->user();
        return view('modules.profile',$this->data);
    }
}
