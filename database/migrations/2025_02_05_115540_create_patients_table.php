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
        Schema::create('patients', function (Blueprint $table) {
            $table->id('patientId');
            $table->string('nin')->nullable();
            $table->unsignedBigInteger('userId')->nullable();
            $table->string('capId')->nullable()->unique();
            $table->string('hospitalFileNumber')->nullable();
            $table->unsignedBigInteger('hospital')->nullable();
            $table->unsignedBigInteger('stateOfOrigin')->nullable();
            $table->unsignedBigInteger('stateOfResidence')->nullable();
            $table->string('religion')->nullable();
            $table->string('gender')->nullable();
            $table->string('bloodGroup')->nullable();
            $table->string('occupation')->nullable();
            $table->date('dateOfBirth')->nullable();
            $table->string('address')->nullable();

            $table->unsignedBigInteger('cancer')->nullable();
            $table->string('cancerStage')->nullable();
            $table->unsignedBigInteger('doctor')->nullable();
            $table->string('status')->nullable();
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('doctor')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('hospital')->references('hospitalId')->on('hospitals')->onDelete('cascade');
            $table->foreign('stateOfOrigin')->references('stateId')->on('states')->onDelete('cascade');
           
            $table->foreign('stateOfResidence')->references('stateId')->on('states')->onDelete('cascade');
           
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            
            $table->foreign('cancer')->references('cancerId')->on('cancers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
