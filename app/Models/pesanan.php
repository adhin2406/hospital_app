<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    use HasFactory;
    protected $table = "pesan";
    protected $primaryKey   = 'id_pesan';
    public $timestamps      = true;
    protected $guarded      = ['id_pesan'];
}
