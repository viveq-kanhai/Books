<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class accountType extends Model
{
    use HasFactory;

    protected $fillable =[
        'account_type'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(Users::class, 'account_type_id', 'id');
    }
}
