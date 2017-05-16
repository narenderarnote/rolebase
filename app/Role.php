<?php namespace App;
use Config;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	public function users()
    {
        return $this->belongsToMany(Config::get('auth.providers.users.model'), Config::get('entrust.role_user_table'),Config::get('entrust.role_foreign_key'),Config::get('entrust.user_foreign_key'));
    }
}