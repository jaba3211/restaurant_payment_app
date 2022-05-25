<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Dish extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded;

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function getDishes($restaurant_id)
    {
        return $this->with(['category'])
            ->where('restaurant_id', $restaurant_id)
            ->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getDish($id)
    {
        return $this->where('id',$id)->first();
    }

}
