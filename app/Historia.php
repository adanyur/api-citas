<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;

class Historia extends Model
{
    //
    protected $connection = 'SERVER2';
    protected $table = 'pwcpi00';
    protected $primaryKey = 'cpcnte';
}
