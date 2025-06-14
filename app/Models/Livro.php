<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model {
    
    protected $guarded = [];

    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }
}
