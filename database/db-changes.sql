ALTER TABLE `cpr_suppliers`
ADD `password` VARCHAR(255) NULL DEFAULT NULL
AFTER `biz_email`;
UPDATE `cpr_suppliers`
SET `password` = "$2y$10$SOR3Amn.tRNhgIC2Qrmhi.u1v3pcVdbllaWeod6QiRT / aWsMPgTgW";
CREATE TABLE `tfe`.`cpr_supplier_profile_histories` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `supplier_id` BIGINT UNSIGNED NOT NULL,
  `type` VARCHAR(100) NOT NULL DEFAULT 'Registration',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX (`supplier_id`)
) ENGINE = InnoDB;
ALTER TABLE `cpr_supplier_profile_histories`
ADD FOREIGN KEY (`supplier_id`) REFERENCES `cpr_suppliers`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;