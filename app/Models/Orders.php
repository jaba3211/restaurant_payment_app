<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Orders extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded;


    /**
     * @return BelongsTo
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class,'restaurant_id','id');
    }

    /**
     * @return BelongsTo
     */
    public function dish()
    {
        return $this->belongsTo(Dish::class,'dish_id','id');
    }

    /**
     * @param $userId
     * @param $restaurantId
     * @return Builder[]|Collection
     */
    public function getOrderdByList($userId, $restaurantId)
    {
       return $this->with([
           'restaurant',
           'dish'
       ])
           ->where('user_id',$userId)
           ->where('restaurant_id',$restaurantId)
           ->groupBy('created_at')
           ->get();
    }

    /**
     * @param $restaurantId
     * @return Builder[]|Collection
     */
    public function getOrderdByTableList($restaurantId)
    {
        return $this->with([
            'restaurant',
            'dish'
        ])
            ->where('restaurant_id',$restaurantId)
            ->where('status_id', NEW_ORDER)
            ->groupBy('table')
            ->groupBy('created_at')
            ->get();
    }

    /**
     * @param $userId
     * @param $restaurantId
     * @param $date
     * @return Builder[]|Collection
     */
    public function getList($userId, $restaurantId, $date)
    {
       return $this->with([
           'restaurant',
           'dish'
       ])
           ->where('created_at', $date)
           ->where('user_id',$userId)
           ->where('restaurant_id',$restaurantId)
           ->get();
    }

    /**
     * @param $restaurantId
     * @param $table
     * @return Builder[]|Collection
     */
    public function getForStaff($restaurantId, $table, $date)
    {
       return $this->with([
           'restaurant',
           'dish'
       ])
           ->where('table', $table)
           ->where('status_id', NEW_ORDER)
           ->where('created_at', $date)
           ->where('restaurant_id',$restaurantId)
           ->get();
    }


}
