<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded;

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'id');
    }

    /**
     * @param $username
     * @return mixed
     */
    public function getUser($username)
    {
        return $this->where('username', $username)->first();
    }

    /**
     * @return Builder[]|Collection
     */
    public function getUsers($statusId)
    {
        return $this->with([
            'restaurant'
        ])
            ->where('status_id', $statusId)->get();
    }
}
