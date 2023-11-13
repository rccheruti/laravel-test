<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Produtos extends Model
{
    use HasFactory, Notifiable;

/**
 * @var array
 */
    protected $fillable = [
        'nome', 'descricao', 'preco', 'quantidade'
    ];

    protected $table = 'produtos';
}