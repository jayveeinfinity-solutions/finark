<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('service_plan_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->string('status')->default('Pending');
            $table->text('client_message')->nullable();
            $table->text('notes')->nullable();
            $table->text('employee_notes')->nullable();
            $table->unsignedBigInteger('assigned_by')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('service_plan_id')->references('id')->on('service_plans');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('assigned_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
