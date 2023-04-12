<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transaction extends Model
{
    
    public function from_user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'from_id');
    }
    
    public function to_user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'to_id');
    }

}
