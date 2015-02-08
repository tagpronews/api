<?php namespace TagProNews\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    protected $table = 'groups';
    public $timestamps = true;

    public function roles()
    {
        return $this->hasMany('TagProNews\Models\Role');
    }

    public function users()
    {
        return $this->hasManyThrough('TagProNews\Models\User', 'Role');
    }

}