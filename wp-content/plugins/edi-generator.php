<?php
/*
Plugin Name: EDI Invoice Generator
Description: Generowanie Faktury EDI
Version: 1.0
Author: Zdesperowany student
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

add_action('woocommerce_account_orders_columns', 'add_invoice_download_button_column');

function add_invoice_download_button_column($columns)
{
    $new_columns = array();

    foreach ($columns as $key => $name) {
        $new_columns[$key] = $name;

        if ('order-total' === $key) {
            $new_columns['download-invoice'] = __('EDI', 'woocommerce');
        }
    }

    return $new_columns;
}

add_action('woocommerce_my_account_my_orders_column_download-invoice', 'add_invoice_download_button');

function add_invoice_download_button($order)
{
    echo '<a href="' . esc_url(add_query_arg('download_invoice', $order->get_id())) . '" class="woocommerce-button button view">' . __('Faktura EDI', 'woocommerce') . '</a>';
}

add_action('init', 'download_invoice');

/*
function download_invoice()
{
    if (isset($_GET['download_invoice']) && is_user_logged_in()) {
        $order_id = intval($_GET['download_invoice']);
        $order = wc_get_order($order_id);

        if ($order && get_current_user_id() == $order->get_user_id()) {
            header('Content-Type: text/plain');
            header('Content-Disposition: attachment; filename="FV-000' . $order_id . '-' . date('Y') . '.csv"');

            $invoice_data = generate_invoice_data($order);
            $fp = fopen('php://output', 'w');

            foreach ($invoice_data as $row) {
                fwrite($fp, $row . "\n");
            }

            fclose($fp);
            exit;
        }
    }
}
*/

function download_invoice()
{
    if (isset($_GET['download_invoice']) && is_user_logged_in()) {
        $order_id = intval($_GET['download_invoice']);
        $order = wc_get_order($order_id);

        if ($order && get_current_user_id() == $order->get_user_id()) {
            header('Content-Type: text/plain');
            header('Content-Disposition: attachment; filename="FV-000' . $order_id . '-' . date('Y') . '.csv"');

            $invoice_data = generate_invoice_data($order);
            $fp = fopen('php://output', 'w');

            $single_line_data = implode("", $invoice_data);
            fwrite($fp, $single_line_data);

            fclose($fp);
            exit;
        }
    }
}


function generate_invoice_data($order)
{
    $invoice_data = array();
    $invoice_data[] = 'UNH+1+INVOIC:D:96A:UN:EAN008';

    $invoice_number = 'FV/000' . $order->get_id() . '/' . date('Y');
    $invoice_date = date('Ymd');
    $invoice_data[] = 'BGM+380+' . $invoice_number . '+' . $invoice_date;

    $line_item_number = 0;
    foreach ($order->get_items() as $item) {
        $line_item_number++;
        $product_name = $item->get_name();
        $quantity = $item->get_quantity();
        $price = $item->get_total();

        $invoice_data[] = 'LIN+' . $line_item_number . '++' . $product_name . ':IN';
        $invoice_data[] = 'QTY+47:' . $quantity . ':PCE';
        $invoice_data[] = 'MOA+203:' . $price;
    }

    $invoice_data[] = 'UNT+' . (count($invoice_data) + 1) . '+1';

    return $invoice_data;
}
?>
