<?php namespace TagProNews\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    protected $table = 'users';
    protected $fillable = ['username', 'email', 'password'];
    protected $hidden = ['password', 'remember_token'];
    public $timestamps = true;

    public function roles()
    {
        return $this->belongsToMany('TagProNews\Models\Role');
    }

    public function permissions()
    {
        return $this->hasManyThrough('TagProNews\Models\Permission', 'Role');
    }

    public function groups()
    {
        return $this->hasManyThrough('TagProNews\Models\Group', 'Role');
    }

    public function token()
    {
        return $this->hasOne('TagProNews\Models\Token');
    }
}