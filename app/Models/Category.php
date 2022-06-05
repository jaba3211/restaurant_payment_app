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
    public function getCategories()
    {
        return $this->all();
    }

    public function getCategory($id)
    {
        return $this->where('id',$id)->first();
    }
}
