<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checksheet_Data extends Model
{
    protected $table = 'checksheet__data';
    protected $primaryKey = 'data_id';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'data_id',
        'master_id',
        'nama_sheet',
        'nomor_gerbong',
        'item_pemeriksa',
        'standar',
        'hasil_input',
        'keterangan'
    ];
}
