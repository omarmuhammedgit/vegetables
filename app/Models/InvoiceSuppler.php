<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceSuppler extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function suppler(){
        return $this->belongsTo(Suppler::class);
    }
}
