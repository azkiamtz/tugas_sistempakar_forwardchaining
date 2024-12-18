<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;
    protected $fillable = ["code","name","solution"];

    /**
     * The indications that belong to the Disease
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function indications()
    {
        return $this->belongsToMany(Indication::class, 'rules');
    }
}
