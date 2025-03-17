<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhatsAppBackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('whatsapp_account_package_subs');
        Schema::dropIfExists('whatsapp_account_packages');
        \Illuminate\Support\Facades\DB::unprepared("CREATE TABLE `whatsapp_account_packages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` bigint(20) unsigned NOT NULL,
  `sub_account_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `currency_id` bigint(20) unsigned NOT NULL,
  `whatsapp_package_id` bigint(20) unsigned NOT NULL,
  `payment_method_id` bigint(20) unsigned NOT NULL,
  `bank_id` tinyint(4) DEFAULT NULL,
  `depositor_name` varchar(255) DEFAULT NULL,
  `depositor_bank` varchar(255) DEFAULT NULL,
  `depositor_number` varchar(50) DEFAULT NULL,
  `deposit_date` date DEFAULT NULL,
  `approve_via` tinyint(4) NOT NULL DEFAULT 1,
  `invoice_id` varchar(50) DEFAULT NULL,
  `daftra_id` bigint(20) unsigned DEFAULT NULL,
  `invoice_attachment` varchar(50) DEFAULT NULL,
  `deposit_receipt` varchar(50) DEFAULT NULL,
  `other_attach` varchar(50) DEFAULT NULL,
  `package_name` varchar(255) DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `price` double(50,6) NOT NULL,
  `tax` double(50,6) NOT NULL,
  `fees` double(50,6) NOT NULL,
  `total` double(50,6) NOT NULL,
  `payment_session` varchar(40) DEFAULT NULL,
  `update_status` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `whatsapp_account_packages_account_id_foreign` (`account_id`) USING BTREE,
  KEY `whatsapp_account_packages_user_id_foreign` (`user_id`) USING BTREE,
  KEY `whatsapp_account_packages_currency_id_foreign` (`currency_id`) USING BTREE,
  KEY `whatsapp_account_packages_payment_method_id_foreign` (`payment_method_id`) USING BTREE,
  KEY `whatsapp_account_packages_sub_account_id_foreign` (`sub_account_id`) USING BTREE,
  KEY `whatsapp_package_id` (`whatsapp_package_id`),
  CONSTRAINT `whatsapp_account_packages_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`),
  CONSTRAINT `whatsapp_account_packages_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`),
  CONSTRAINT `whatsapp_account_packages_ibfk_1` FOREIGN KEY (`whatsapp_package_id`) REFERENCES `whatsapp_packages` (`id`),
  CONSTRAINT `whatsapp_account_packages_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`),
  CONSTRAINT `whatsapp_account_packages_sub_account_id_foreign` FOREIGN KEY (`sub_account_id`) REFERENCES `accounts` (`id`),
  CONSTRAINT `whatsapp_account_packages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");


        \Illuminate\Support\Facades\DB::unprepared("ALTER TABLE `whatsapp_packages`
ADD COLUMN `currency_id` bigint UNSIGNED NULL AFTER `id`,
ADD FOREIGN KEY (`currency_id`) REFERENCES  `currencies` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;");

        \Illuminate\Support\Facades\DB::unprepared("ALTER TABLE  `whatsapp_packages` ADD COLUMN `daftra_id` bigint NULL AFTER `stripe_id`;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('whatsapp_account_package_subs');
        Schema::dropIfExists('whatsapp_account_packages');
        \Illuminate\Support\Facades\DB::unprepared("ALTER TABLE `whatsapp_packages` DROP FOREIGN KEY `whatsapp_packages_ibfk_1`;");
        \Illuminate\Support\Facades\DB::unprepared("ALTER TABLE `whatsapp_packages` DROP COLUMN `currency_id`;");
        \Illuminate\Support\Facades\DB::unprepared("ALTER TABLE `whatsapp_packages` DROP COLUMN `daftra_id`;");
    }
}
