<?php
// database/migrations/xxxx_add_payment_columns_to_orders_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->decimal('paid_amount', 15, 2)->default(0)->after('total_bill');
            $table->string('payment_status')->default('unpaid')->after('paid_amount'); // unpaid, partial, paid
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['paid_amount', 'payment_status']);
        });
    }
};
