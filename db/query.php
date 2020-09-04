<?php 
    $transaction = 
    "
    CREATE OR REPLACE VIEW view_transaction AS
    SELECT 
    `tbl_client_deposites`.`id` AS `id`,
    `tbl_client_deposites`.`client_id` AS `client_id`,
    `tbl_client_deposites`.`created_at` AS `date_time`,
    'Deposite' AS `transaction_for`,
    `Deposite and increase balance` AS `description`,
    0 AS `debit`,
    `tbl_client_deposites`.`deposite_amount` AS `credit`,
    `tbl_client_deposites`.`is_deposited` AS `is_transaction`

    From `tbl_client_deposites`

    union

    SELECT 
    `tbl_client_withdraw`.`id` AS `id`,
    `tbl_client_withdraw`.`client_id` AS `client_id`,
    `tbl_client_withdraw`.`created_at` AS `date_time`,
    `Withdraw` AS `transaction_for`,
    `Withdraw and decrease balance` AS `description`,
    `tbl_client_withdraw.withdraw_amount` AS `debit`,
    `0` AS `credit`,
    `tbl_client_withdraw`.`is_withdrawed` AS `is_transaction`

    From `tbl_client_withdraw`

    union

    SELECT 
    `tbl_client_transfer`.`id` AS `id`,
    `tbl_client_transfer`.`client_id` AS `client_id`,
    `tbl_client_transfer`.`created_at` AS `date_time`,
    `Transfer` AS `transaction_for`,
    `Transfer and decrease balance` AS `description`,
    `tbl_client_transfer.transfer_amount` AS `debit`,
    `0` AS `credit`,
    `1` AS `is_transaction`

    From `tbl_client_transfer`

    union

    SELECT 
    `tbl_client_betts`.`id` AS `id`,
    `tbl_client_betts`.`client_id` AS `client_id`,
    `tbl_client_betts`.`created_at` AS `date_time`,
    `Bet` AS `transaction_for`,
    `Bet for a game` AS `description`,
    `tbl_client_betts.transfer_amount` AS `debit`,
    `tbl_client_betts.transfer_amount` AS `credit`,
    `1` AS `is_transaction`

    From `tbl_client_betts`
    ";
?>