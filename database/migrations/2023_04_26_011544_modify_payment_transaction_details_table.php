<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        // DB::unprepared('
        //     CREATE TRIGGER update_payment_transaction_grandtotal
        //     AFTER INSERT ON payment_transaction_details
        //     FOR EACH ROW
        //     UPDATE payment_transactions SET grandtotal = (
        //         SELECT SUM(subtotal) FROM payment_transaction_details WHERE payment_transaction_id = NEW.payment_transaction_id
        //     ) WHERE id = NEW.payment_transaction_id;
        // ');

        // DB::unprepared('
        //     CREATE TRIGGER update_payment_transaction_grandtotal_on_update
        //     AFTER UPDATE ON payment_transaction_details
        //     FOR EACH ROW
        //     UPDATE payment_transactions SET grandtotal = (
        //         SELECT SUM(subtotal) FROM payment_transaction_details WHERE payment_transaction_id = NEW.payment_transaction_id
        //     ) WHERE id = NEW.payment_transaction_id;
        // ');

        // DB::unprepared('
        //     CREATE TRIGGER update_payment_transaction_grandtotal_on_delete
        //     AFTER DELETE ON payment_transaction_details
        //     FOR EACH ROW
        //     UPDATE payment_transactions SET grandtotal = (
        //         SELECT SUM(subtotal) FROM payment_transaction_details WHERE payment_transaction_id = OLD.payment_transaction_id
        //     ) WHERE id = OLD.payment_transaction_id;
        // ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // DB::unprepared('DROP TRIGGER IF EXISTS update_payment_transaction_grandtotal');
        // DB::unprepared('DROP TRIGGER IF EXISTS update_payment_transaction_grandtotal_on_delete');
        // DB::unprepared('DROP TRIGGER IF EXISTS update_payment_transaction_grandtotal_on_update');
    }
};
