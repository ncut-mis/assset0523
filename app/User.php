<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','extension','position','phone','department_id','previlege_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function receives()
    {
        return $this->belongsTo(Receive::class);
    }

    public function applications() //  User (1) -> Application (n)
    {
        return $this->hasMany(Application::class);
    }

    public function assets() //  User (1) -> asset (n)
    {
        return $this->hasMany(Asset::class);
    }

    public function Previlege() // User (n) ->Previlege (1)
    {
        return $this->belongsTo(Previlege::class);
    }

    public function lendings() //  User (1) -> Lending (n)
    {
        return $this->hasMany(Lending::class);
    }
}
