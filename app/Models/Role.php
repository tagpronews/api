<?php namespace TagProNews\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $table = 'roles';
    public $timestamps = true;

    public function permissions()
    {
        return $this->hasMany('TagProNews\Models\Permission');
    }

    public function group()
    {
        return $this->belongsTo('TagProNews\Models\Group');
    }

    public function inherits()
    {
        return $this->belongsTo('TagProNews\Models\Role', 'inherits_from');
    }

    public function users()
    {
        return $this->hasMany('TagProNews\Models\User');
    }
}