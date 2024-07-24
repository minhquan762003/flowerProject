<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    public $timestamps = true;
    Protected $primaryKey='id';
    public function flowers(){
        return $this->belongsTo(Flower::class, 'flower_id', 'id');
    }
    protected $fillable = ['id', 'flower_id', 'region_name','created_at','updated_at'];

}
