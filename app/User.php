<?php
namespace App;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use Notifiable, EntrustUserTrait; 
/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname','email', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function scopeGetUserWithRole($q, $role)
    {
        return $q->whereHas('roles', function($q) use($role){
            $q->where('name', $role);
        });
    }

    public function __get($key)
    {
        if($key == 'name')
            return $this->first_name. ' ' . $this->last_name;
        else
            return parent::__get($key);
    }


    public function getFirstNameAttribute($value){

        return ucfirst($value);

    }

    public function getLastNameAttribute($value){

        return ucfirst($value);

    }

    public function paper()
    {
        return $this->hasMany(Paper::class,'student_id');
    }

   
}