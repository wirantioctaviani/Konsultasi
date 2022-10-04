<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mstr_role extends Model
{
    use HasFactory;
    protected $table = 'mstr_role';

    public function user()
    {
        return $this->hasOne(User::class);
    }

}
