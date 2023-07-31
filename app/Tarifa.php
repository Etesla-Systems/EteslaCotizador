<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
   protected $table = 'tarifas';
   protected $primaryKey = 'idTarifa';
}
