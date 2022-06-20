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
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    /**
     * @return BelongsTo
     */
    public function staff()
    {
        return $this->belongsTo(User::class,'staff_id','id');
    }

    /**
     * @param $userId
     * @param $restaurantId
     * @return Builder[]|Collection
     */
    public function getOrderdByList($userId)
    {
       return $this->with([
           'restaurant',
           'dish',
           'user'
       ])
           ->where('user_id',$userId)
           ->groupBy('created_at')
           ->get();
    }

    /**
     * @param $restaurantId
     * @return Builder[]|Collection
     */
    public function getOrderdByTableList($restaurantId, $statusId)
    {
        return $this->with([
            'restaurant',
            'dish',
            'user'
        ])
            ->where('restaurant_id',$restaurantId)
            ->where('status_id', $statusId)
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
    public function getList($userId, $date)
    {
       return $this->with([
           'restaurant',
           'dish',
           'user'
       ])
           ->where('created_at', $date)
           ->where('user_id',$userId)
           ->get();
    }

    /**
     * @param $restaurantId
     * @param $table
     * @param $date
     * @param $statusId
     * @return Builder[]|Collection
     */
    public function getForStaff($restaurantId, $table, $date, $statusId)
    {
       return $this->with([
           'restaurant',
           'dish',
           'user'
       ])
           ->where('table', $table)
           ->where('status_id', $statusId)
           ->where('created_at', $date)
           ->where('restaurant_id',$restaurantId)
           ->get();
    }


}
