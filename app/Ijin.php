<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ijin extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_karyawan', 'date_ijin','alasan', 'start_ijin','is_kategori','created_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = "tb_ijin";
}
