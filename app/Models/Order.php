<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function ebook(){$this->hasOne(Ebook::class);}
    public function user(){$this->belongsTo(User::class);}
}
