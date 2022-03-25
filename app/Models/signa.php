<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class signa extends Model
{
    use HasFactory;
    protected $table = "signa_m";
    protected $primaryKey   = 'signa_id';
    public $timestamps      = true;
    protected $guarded      = ['signa_id'];
}
