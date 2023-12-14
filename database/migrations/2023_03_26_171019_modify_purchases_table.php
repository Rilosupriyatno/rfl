<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // DB::unprepared('
        //     CREATE TRIGGER update_purchase_tax
        //     AFTER INSERT ON purchase_details
        //     FOR EACH ROW
        //     UPDATE purchases SET tax = (
        //         SELECT SUM(tax) FROM purchase_details WHERE purchase_id = NEW.purchase_id
        //     ) WHERE id = NEW.purchase_id;
        // ');

        // DB::unprepared('
        //     CREATE TRIGGER update_purchase_tax_on_update
        //     AFTER UPDATE ON purchase_details
        //     FOR EACH ROW
        //     UPDATE purchases SET tax = (
        //         SELECT SUM(tax) FROM purchase_details WHERE purchase_id = NEW.purchase_id
        //     ) WHERE id = NEW.purchase_id;
        // ');

        // DB::unprepared('
        //     CREATE TRIGGER update_purchase_tax_on_delete
        //     AFTER DELETE ON purchase_details
        //     FOR EACH ROW
        //     UPDATE purchases SET tax = (
        //         SELECT SUM(tax) FROM purchase_details WHERE purchase_id = OLD.purchase_id
        //     ) WHERE id = OLD.purchase_id;
        // ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS update_purchase_tax');
        DB::unprepared('DROP TRIGGER IF EXISTS update_purchase_tax_on_delete');
        DB::unprepared('DROP TRIGGER IF EXISTS update_purchase_tax_on_update');
    }
};
