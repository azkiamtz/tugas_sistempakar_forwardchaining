<?php

use App\Models\DiagnosisResult;
use App\Models\Indication;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('diagnosis_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(DiagnosisResult::class);
            $table->foreignIdFor(Indication::class);
            $table->boolean("valid");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnosis_details');
    }
};
