<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosisDetail extends Model
{
    use HasFactory;
    protected $fillable = ["diagnosis_result_id","indication_id","valid"];

    /**
     * Get the indication that owns the DiagnosisDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function indication()
    {
        return $this->belongsTo(Indication::class, 'indication_id', 'id');
    }
}
