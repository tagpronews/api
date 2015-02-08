<?php namespace TagProNews\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{

    protected $table = 'tokens';
    protected $fillable = ['user_id', 'token'];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('TagProNews\Models\User');
    }
}