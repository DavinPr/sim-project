<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')
                ->constrained('students')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('admin_id')
                ->nullable()
                ->constrained('admins')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('transaction_invoice', 30);
            $table->bigInteger('transaction_fee');
            $table->string('transaction_proof', 50)->nullable();
            $table->enum('transaction_category', ['SPP', 'Kas', 'Daftar Ulang', 'Sumbangan']);
            $table->enum('transaction_status', ['Terverifikasi', 'Belum diverifikasi', 'Ditolak']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
