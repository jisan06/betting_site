<?php 
    $transaction = 
    "
    CREATE OR REPLACE VIEW view_transaction AS
    SELECT 
    `tbl_client_deposites`.`id` AS `id`,
    `tbl_client_deposites`.`client_id` AS `client_id`,
    `tbl_client_deposites`.`created_at` AS `date_time`,
    `tbl_client_deposites`.`type` AS `transaction_for`,
    0 AS `debit`,
    `tbl_client_deposites`.`deposite_amount` AS `credit`,
    `tbl_client_deposites`.`is_deposited` AS `is_transaction`

    From `tbl_client_deposites`

    union

    SELECT 
    `tbl_client_withdraw`.`id` AS `id`,
    `tbl_client_withdraw`.`client_id` AS `client_id`,
    `tbl_client_withdraw`.`created_at` AS `date_time`,
    `tbl_client_withdraw`.`type` AS `transaction_for`,
    `tbl_client_withdraw`.`withdraw_amount` AS `debit`,
    0 AS `credit`,
    `tbl_client_withdraw`.`is_withdrawed` AS `is_transaction`

    From `tbl_client_withdraw`

    union

    SELECT 
    `tbl_client_transfer`.`id` AS `id`,
    `tbl_client_transfer`.`client_id` AS `client_id`,
    `tbl_client_transfer`.`created_at` AS `date_time`,
    `tbl_client_transfer`.`type` AS `transaction_for`,
    `tbl_client_transfer`.`transfer_amount` AS `debit`,
    0 AS `credit`,
    1 AS `is_transaction`

    From `tbl_client_transfer`

    union

    SELECT 
    `tbl_client_betts`.`id` AS `id`,
    `tbl_client_betts`.`client_id` AS `client_id`,
    `tbl_client_betts`.`created_at` AS `date_time`,
    `tbl_client_betts`.`type` AS `transaction_for`,
    `tbl_client_betts`.`wining_amount` AS `debit`,
    `tbl_client_betts`.`wining_amount` AS `credit`,
    1 AS `is_transaction`

    From `tbl_client_betts`
    ";
?>