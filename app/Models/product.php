<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\review;
//use Illuminate\Support\Facades\App;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','detail','stock','price','discount'

        ];

    protected $guarded = [];



    public function review()
    {

        return $this->hasMany(review::class);

    }


/*
    public function user()
    {
        return $this->belongsTo(User::class);
    }

*/

}
