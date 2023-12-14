<?php

namespace Database\Seeders\Systems;

use Illuminate\Database\Seeder;
use Database\Seeders\Systems\Nurse\MenuSettingNurseSeeder;
use Database\Seeders\Systems\Clinic\MenuMasterClinicSeeder;
use Database\Seeders\Systems\Doctor\MenuSettingDoctorSeeder;
use Database\Seeders\Systems\Patient\MenuSettingPatientSeeder;
use Database\Seeders\Systems\Support\MenuSettingSupportSeeder;
use Database\Seeders\Systems\Pharmacy\MenuMasterPharmacySeeder;
use Database\Seeders\Systems\Clinic\MenuAdministrationClinicSeeder;
use Database\Seeders\Systems\Laboratory\MenuMasterLaboratorySeeder;
use Database\Seeders\Systems\Pharmacist\MenuSettingPharmacistSeeder;
use Database\Seeders\Systems\Pharmacy\MenuTransactionPharmacySeeder;
use Database\Seeders\Systems\Pharmacy\MenuAdministrationPharmacySeeder;
use Database\Seeders\Systems\Administrator\MenuMasterAdministratorSeeder;
use Database\Seeders\Systems\Cashier\MenuTransactionCashierSeeder;
use Database\Seeders\Systems\Cashier\MenuReportCashierSeeder;
use Database\Seeders\Systems\Clinic\MenuReportClinicSeeder;
use Database\Seeders\Systems\Laboratory\MenuAdministrationLaboratorySeeder;

class SubnavbarSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // Setting
            // MenuSettingSupportSeeder::class,
            // MenuSettingPatientSeeder::class,
            // MenuSettingNurseSeeder::class,
            // MenuSettingDoctorSeeder::class,
            // MenuSettingPharmacistSeeder::class,
            // // Master
            // MenuMasterPharmacySeeder::class,
            // MenuMasterClinicSeeder::class,
            // MenuMasterLaboratorySeeder::class,
            // MenuMasterAdministratorSeeder::class,
            // // Transaction
            // MenuTransactionPharmacySeeder::class,
            // MenuTransactionCashierSeeder::class,
            // // Administration
            // MenuAdministrationClinicSeeder::class,
            // MenuAdministrationPharmacySeeder::class,
            // MenuAdministrationLaboratorySeeder::class,
            // // Report
            // MenuReportClinicSeeder::class,
            // MenuReportCashierSeeder::class,
        ]);
    }
}
