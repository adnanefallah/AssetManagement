<?php

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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->date('maintenance_date');
            $table->decimal('cost', 10, 2)->default(0);
            $table->enum('status', [
                'Pending',
                'In Progress',
                'Completed',
            ])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
