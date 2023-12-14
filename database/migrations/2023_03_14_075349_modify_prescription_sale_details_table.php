<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        // DB::unprepared('
        //     CREATE TRIGGER update_prescription_sale_grandtotal
        //     AFTER INSERT ON prescription_sale_details
        //     FOR EACH ROW
        //     UPDATE prescription_sales SET grandtotal = (
        //         SELECT SUM(subtotal) FROM prescription_sale_details WHERE prescription_sale_id = NEW.prescription_sale_id
        //     ) WHERE id = NEW.prescription_sale_id;
        // ');

        // DB::unprepared('
        //     CREATE TRIGGER update_prescription_sale_grandtotal_on_update
        //     AFTER UPDATE ON prescription_sale_details
        //     FOR EACH ROW
        //     UPDATE prescription_sales SET grandtotal = (
        //         SELECT SUM(subtotal) FROM prescription_sale_details WHERE prescription_sale_id = NEW.prescription_sale_id
        //     ) WHERE id = NEW.prescription_sale_id;
        // ');

        // DB::unprepared('
        //     CREATE TRIGGER update_prescription_sale_grandtotal_on_delete
        //     AFTER DELETE ON prescription_sale_details
        //     FOR EACH ROW
        //     UPDATE prescription_sales SET grandtotal = (
        //         SELECT SUM(subtotal) FROM prescription_sale_details WHERE prescription_sale_id = OLD.prescription_sale_id
        //     ) WHERE id = OLD.prescription_sale_id;
        // ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS update_prescription_sale_grandtotal');
        DB::unprepared('DROP TRIGGER IF EXISTS update_prescription_sale_grandtotal_on_delete');
        DB::unprepared('DROP TRIGGER IF EXISTS update_prescription_sale_grandtotal_on_update');
    }
};
