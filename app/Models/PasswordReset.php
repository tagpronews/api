<?php namespace TagProNews\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{

    protected $table = 'password_resets';
    protected $guarded = [];
    public $timestamps = false;

}