<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $data;

    public function __construct()
    {
        $this->data['restaurant_id'] = $this->getRestaurantIdFromSession();
        $this->data['table'] = $this->getTableFromSession();
    }

    /**
     * @return mixed
     */
    public function getRestaurantIdFromSession()
    {
        return Request::session()->get('restaurant_id');
    }

    /**
     * @return mixed
     */
    public function getTableFromSession()
    {
        return Request::session()->get('table');
    }
}
