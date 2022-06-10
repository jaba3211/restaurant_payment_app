<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use phpDocumentor\Reflection\Types\This;

class Category extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded;

    /**
     * @return void
     */
    public function getCategories($restaurantId)
    {
        return $this->where('restaurant_id', $restaurantId)->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCategory($id)
    {
        return $this->where('id', $id)->first();
    }
}
