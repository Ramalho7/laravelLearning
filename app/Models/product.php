<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    // nome da tabela
    // protected $table = 'product'; // isso a tabela tenha um nome diferente da do model, e nao esteja no plural
}
