<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    protected $table = 'blogs';
	public $timestamps = true;
    public $fillable = ['id','name','p_date','p_amount','user_id','currency','in_amount'];
}
