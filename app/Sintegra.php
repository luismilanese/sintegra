<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sintegra extends Model
{
    protected $table = 'sintegra';

    protected $fillable = ['user_id', 'cnpj', 'resultado_json'];

    public function getUserIdAttribute($user_id)
    {
        return User::where('id', $user_id)->first();
    }
}