ALTER TABLE `withdrawals` ADD `withdraw_with` VARCHAR(50) NULL DEFAULT NULL AFTER `amount`;
ALTER TABLE `withdrawals` ADD `uuid` VARCHAR(50) NULL DEFAULT NULL AFTER `withdraw_with`;
ALTER TABLE `withdrawals` ADD `status` VARCHAR(50) NULL DEFAULT NULL AFTER `uuid`;