<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Personas extends Model
{
    use Uuid;
    protected $table = 'personas';
    protected $primaryKey = 'idPersona';
    public $incrementing = false;
    protected $keyType = 'uuid';
}
