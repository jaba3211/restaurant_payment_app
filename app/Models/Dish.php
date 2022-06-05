<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Dish extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded;

    /**
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    /**
     * @return BelongsTo
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class,'restaurant_id','id');
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
        return $this->with(['restaurant'])
            ->where('id',$id)->first();
    }

    /**
     * @param $category_id
     * @return mixed
     */
    public function getFrontList($category_id, $restaurantId)
    {
        return $this->with(['restaurant'])
            ->where('restaurant_id', $restaurantId)
            ->where('category_id', $category_id)->get();
    }

}
