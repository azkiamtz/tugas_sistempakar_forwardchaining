<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;
    protected $fillable = ["disease_id","indication_id"];

    public function disease()
    {
        return $this->belongsTo(Disease::class);
    }

    // Relasi ke symptom
    public function indication()
    {
        return $this->belongsTo(Indication::class);
    }
}
