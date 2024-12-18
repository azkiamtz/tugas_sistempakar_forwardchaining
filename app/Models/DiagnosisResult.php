<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosisResult extends Model
{
    use HasFactory;
    protected $fillable = ["possible","code","name","email"];
    
    /**
     * Get all of the detail for the DiagnosisResult
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detail()
    {
        return $this->hasMany(DiagnosisDetail::class, 'diagnosis_result_id', 'id');
    }
}
