<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $guarded = [];  // znaci da mozemo da unesemo bilo sta u nasu bazu

    public function category()
    {
        return $this->belongsTo('\App\Models\Category');
    }
    public function user() 
    {
        return $this->belongsTo('\App\Models\User');
    }
    
}
