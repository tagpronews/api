<?php namespace TagProNews\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, ManyThroughMany;

    protected $table = 'users';
    protected $fillable = ['username', 'email', 'password'];
    protected $hidden = ['password', 'remember_token'];
    public $timestamps = true;

    public function hasPermission($permissions)
    {
        $permissions = (array)$permissions;
        $userPermissions = $this->permissions()->get();

        $userPerms = [];
        foreach ($userPermissions as $perm) {
            $userPerms[] = $perm->name;
        }

        foreach ($permissions as $perm) {
            if (!in_array($perm, $userPerms)) {
                return false;
            }
        }

        return true;
    }

    public function roles()
    {
        return $this->belongsToMany('TagProNews\Models\Role');
    }

    public function permissions()
    {
        return $this->manyThroughMany('TagProNews\Models\Permission', 'TagProNews\Models\PermissionRole', 'role_id',
            'id', 'permission_id');
    }

    public function groups()
    {
        return $this->hasManyThrough('TagProNews\Models\Group', 'TagProNews\Models\Role');
    }

    public function token()
    {
        return $this->hasOne('TagProNews\Models\Token');
    }
}