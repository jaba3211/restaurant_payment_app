<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PhpParser\Node\Expr\AssignOp\Mod;

class Restaurant extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded;

    /**
     * @return Collection
     */
    public function getRestaurants()
    {
        return $this->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getRestaurant($id)
    {
        return $this->where('id',$id)->first();
    }
}
