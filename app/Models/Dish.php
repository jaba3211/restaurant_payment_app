<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\HigherOrderBuilderProxy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Scope;
use Laravel\Sanctum\HasApiTokens;

class Dish extends Model
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

    /**
     * @param $restaurant_id
     * @param $search
     * @return HigherOrderBuilderProxy|mixed|void
     */
    public function search($restaurant_id, $search)
    {
        if (!empty($search)){
            return $this->with(['category'])
                ->where('restaurant_id', $restaurant_id)
                ->where('name', 'like', '%' . $search . '%')
                ->orWhere('price', 'like', '%' . $search . '%')
                ->orWhere('short_desc', 'like', '%' . $search . '%')
                ->orWhere('description', "like", "%" . $search . '%')
                ->get();
        }
        return null;
    }

    /**
     * @param $restaurant_id
     * @return mixed
     */
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
     * @param $restaurantId
     * @return Builder[]|Collection
     */
    public function getFrontList($category_id, $restaurantId)
    {
        return $this->with(['restaurant'])
            ->where('restaurant_id', $restaurantId)
            ->where('category_id', $category_id)
            ->get();
    }
}
