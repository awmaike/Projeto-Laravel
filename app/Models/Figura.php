<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

// Permite preencher somente estes campos com create() e update().
#[Fillable([
    'nome',
    'time',
    'data_nascimento',
    'posicao',
    'selecao',
    'imagem',
])]

class Figura extends Model {}