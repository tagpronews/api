<?php namespace TagProNews\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    protected $table = 'permissions';
    public $timestamps = true;

    public function role()
    {
        return $this->belongsTo('TagProNews\Models\Role');
    }

}