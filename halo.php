<?php
/**
 * Plugin Name: Halo
 * Plugin URI: https://development.brstdev.com
 * Description: Sell your products with an impact
 * Version: 1.0.0
 * Author: The brihaspati infotech
 * Author URI: https://development.brstdev.com
 * License: GPL2
 */
add_action('init', 'load_plugin');
add_action('admin_enqueue_scripts', 'callback_for_setting_up_admin_scripts');
add_action('wp_enqueue_scripts', 'callback_for_setting_up_store_scripts');
add_action('admin_menu', 'halo_admin_menu');

register_activation_hook(__FILE__, function() {
            add_option('Activated_Plugin', 'Plugin-Slug');
            create_halo_impact_table();
            create_halo_orders_table();
        });

register_deactivation_hook(__FILE__, 'Halo_on_deactivation');
register_uninstall_hook(__FILE__, 'Halo_on_uninstall');

function callback_for_setting_up_admin_scripts() {
    wp_enqueue_style('bootstrap.min.css', plugin_dir_url(__FILE__) . 'css/bootstrap.min.css');
    wp_enqueue_style('custom_admin.css', plugin_dir_url(__FILE__) . 'css/custom_admin.css');
    wp_enqueue_style('nouislider.min.css', plugin_dir_url(__FILE__) . 'css/nouislider.min.css');
    wp_enqueue_style('nouislider.css', plugin_dir_url(__FILE__) . 'css/nouislider.css');
    wp_enqueue_script('jquery');
    wp_enqueue_script('nouislider.min.js', '/wp-content/plugins/halo/js/nouislider.min.js', array('jquery'));
    wp_enqueue_script('nouislider', '/wp-content/plugins/halo/js/nouislider.js', array('jquery'));
    wp_enqueue_script('custom', '/wp-content/plugins/halo/js/custom.js', array('jquery'));
}

function callback_for_setting_up_store_scripts() {
    wp_enqueue_style('bootstrap4.min.css', plugin_dir_url(__FILE__) . 'css/bootstrap.min.css');
    wp_enqueue_style('custom_frontend.css', plugin_dir_url(__FILE__) . 'css/custom_frontend.css');
    wp_enqueue_script('custom_fronted', '/wp-content/plugins/halo/js/custom_fronted.js', array('jquery'));
}

function load_plugin() {
    if (is_admin() && get_option('Activated_Plugin') == 'Plugin-Slug') {
        delete_option('Activated_Plugin');
    }
    global $halo_plugin;
    $halo_plugin = 'halo-plugin';
}

function Halo_on_deactivation() {
    if (!current_user_can('activate_plugins'))
        return;
    $plugin = isset($_REQUEST['plugin']) ? $_REQUEST['plugin'] : '';
    check_admin_referer("deactivate-plugin_{$plugin}");
}

function Halo_on_uninstall() {
    global $table_prefix, $wpdb;
    $tblname = 'impact';
    $tblname2 = 'halo_orders';
    $wp_impact_table = $table_prefix . "$tblname";
    $wpdb->query("DROP TABLE IF EXISTS $wp_impact_table");
    $wp_halo_orders_table = $table_prefix . "$tblname2";
    $wpdb->query("DROP TABLE IF EXISTS $wp_halo_orders_table");
    delete_option("my_plugin_db_version");
}

function halo_settings_link($links) {
    $settings_link = '<a href="admin.php?page=halo-settings">Settings</a>';
    array_unshift($links, $settings_link);
    return $links;
}

$plugin = plugin_basename(__FILE__);
add_filter("plugin_action_links_$plugin", 'halo_settings_link');

function halo_admin_menu() {
    add_menu_page(
            __('Settings', 'halo-settings'), __('Halo', 'my-textdomain'), 'manage_options', 'halo-settings', 'settings_page_content', 'dashicons-schedule', 40
    );
}

function create_halo_impact_table() {
    global $table_prefix, $wpdb;

    $tblname = 'impact';
    $wp_impact_table = $table_prefix . "$tblname";

    #Check to see if the table exists already, if not, then create it
    if ($wpdb->get_var("show tables like '$wp_impact_table'") != $wp_impact_table) {
        $sql = "CREATE TABLE `" . $wp_impact_table . "` ( ";
        $sql .= "  `id`  int(11)   NOT NULL, ";
        $sql .= "  `name`  varchar(255)  NULL, ";
        $sql .= "  `type`  tinyint(1)  NULL, ";
        $sql .= "  `amount`  varchar(10)  NULL, ";
        $sql .= "  `co2_offset`  varchar(10)  NULL, ";
        $sql .= "  `tree_planting`  varchar(10)  NULL, ";
        $sql .= "  `ocean_plastic`  varchar(10)  NULL, ";
        $sql .= "  `created_at`  DATETIME  NOT NULL DEFAULT CURRENT_TIMESTAMP, ";
        $sql .= "  `updated_at` DATETIME  NOT NULL DEFAULT CURRENT_TIMESTAMP ";

        $sql .= ") ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ; ";
        $alter_sql = "ALTER TABLE " . $wp_impact_table . " ADD PRIMARY KEY (`id`)";
        $modify_table = "ALTER TABLE " . $wp_impact_table . " MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT";
        $modify_type_column = "ALTER TABLE " . $wp_impact_table . " MODIFY `type` tinyint(1) DEFAULT NULL COMMENT '1=fixed;2=percentage'";

        require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
        dbDelta($sql);
        $wpdb->query($alter_sql);
        $wpdb->query($modify_table);
        $wpdb->query($modify_type_column);
    }
}

function create_halo_orders_table() {
    global $table_prefix, $wpdb;

    $tblname = 'halo_orders';
    $wp_halo_orders_table = $table_prefix . "$tblname";

    #Check to see if the table exists already, if not, then create it
    if ($wpdb->get_var("show tables like '$wp_halo_orders_table'") != $wp_halo_orders_table) {
        $sql = "CREATE TABLE `" . $wp_halo_orders_table . "` ( ";
        $sql .= "  `id`  int(11)   NOT NULL, ";
        $sql .= "  `order_id` varchar(255)  DEFAULT NULL, ";
        $sql .= "  `co2_offset` varchar(20) DEFAULT NULL, ";
        $sql .= "  `tree_planting` varchar(20) DEFAULT NULL, ";
        $sql .= "  `ocean_plastic` varchar(20) DEFAULT NULL, ";
        $sql .= "  `offset_amount` varchar(255) DEFAULT NULL, ";
        $sql .= "  `order_total` varchar(255) DEFAULT NULL, ";
        $sql .= "  `order_subtotal` varchar(255) DEFAULT NULL, ";
        $sql .= "  `order_tax_total` varchar(255) DEFAULT NULL, ";
        $sql .= "  `order_shipping_total` varchar(255) DEFAULT NULL, ";
        $sql .= "  `created_at`  DATETIME  NOT NULL DEFAULT CURRENT_TIMESTAMP, ";
        $sql .= "  `updated_at` DATETIME  NOT NULL DEFAULT CURRENT_TIMESTAMP ";

        $sql .= ") ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ; ";
        $alter_sql = "ALTER TABLE " . $wp_halo_orders_table . " ADD PRIMARY KEY (`id`)";
        $modify_table = "ALTER TABLE " . $wp_halo_orders_table . " MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT";

        require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
        dbDelta($sql);
        $wpdb->query($alter_sql);
        $wpdb->query($modify_table);
    }
}

function settings_page_content() {
    // check user capabilities
    if (!current_user_can('manage_options')) {
        return;
    }
    //Get the active tab from the $_GET param
    $default_tab = null;
    $tab = isset($_GET['tab']) ? $_GET['tab'] : $default_tab;
    ?>
    <!-- Our admin page content should all be inside .wrap -->
    <div class="halo wrap">
        <!-- Print the page title -->
        <h1>Settings</h1><br>
        <!-- Here are our tabs -->
        <nav class="nav-tab-wrapper">
            <a href="?page=halo-settings" class="nav-tab <?php if ($tab === null): ?>nav-tab-active<?php endif; ?>">Dashboard</a>
            <a href="?page=halo-settings&tab=settings" class="nav-tab <?php if ($tab === 'settings'): ?>nav-tab-active<?php endif; ?>">Set your impact</a>
        </nav>

        <div class="tab-content">
            <?php
            switch ($tab) :
                case 'settings':
                    halo_setting(); //Put your HTML here
                    break;
                default:
                    halo_dashboard();
                    break;
            endswitch;
            ?>
        </div>
    </div>
    <?php
}

function halo_dashboard() {
    global $table_prefix, $wpdb, $halo_plugin, $woocommerce;

    $tblname = 'halo_orders';
    $wp_halo_orders_table = $table_prefix . "$tblname";

    $get_offset_data = $wpdb->get_row("SELECT sum(`offset_amount`) As `offsets_total` FROM  $wp_halo_orders_table");
    $offsets_collected = !empty($get_offset_data) ? $get_offset_data->offsets_total : '1300';

    $wc_orders_count = $wpdb->get_row("SELECT COUNT(*) AS count FROM `{$wpdb->prefix}wc_order_stats`");
    $halo_orders_count = $wpdb->get_row("SELECT COUNT(*) AS count FROM $wp_halo_orders_table");
    $offsets_order_percentage = !empty($wc_orders_count) && !empty($halo_orders_count) ? $halo_orders_count->count / $wc_orders_count->count * 100 : 0;
    ?>
    <div class="halo wrap">
        <div class="row">
            <div class="col-md-12 d-flex">
                <div class="col-md-8"><h1>Track the <b>positive</b> change you are making:</h1></div>
                <div class="col-md-4 text-end"><img src="/halo/wp-content/plugins/halo/images/logo/bla_Halo_logo.png" class="halo_logo"></div>
            </div>
        </div>
        <div class="halo_dashboard container">
            <div class="col-md-6 custom-1">
                <div class="col-md-12 custom-1 halo_bg">
                    <div class="center-block">
                        <h2><span><?= get_woocommerce_currency_symbol(); ?></span><?= $offsets_collected ?></h2>
                        <p>Offsets collected</p>
                    </div>
                </div>
                <div class="col-md-12 custom-1 halo_bg">
                    <div class="center-block">
                        <h4><?= number_format($offsets_order_percentage, 2) ?> %</h4>
                        <p>Orders with Offsets</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 custom-2">
                <div class="col-md-12 custom-2 halo_bg">
                    <div class="center-block">
                        <div class="d-flex col-md-12">
                            <div class="col-md-6 text-end"><h4>2,296 kg </h4> </div>
                            <div class="col-md-6"><img src="/halo/wp-content/plugins/halo/images/icons/cloud-transparent.png" class="dashboard_icon cloud">
                                <p>CO2 offset</p>
                            </div>
                        </div>                        
                    </div>
                </div>
                <div class="col-md-12 custom-2 halo_bg">
                    <div class="center-block">
                        <div class="d-flex col-md-12">
                            <div class="col-md-6 text-end"><h4>500 </h4> </div>
                            <div class="col-md-6"><img src="/halo/wp-content/plugins/halo/images/icons/tree_transparent.png" class="dashboard_icon">
                                <p>Trees Planted</p>
                            </div>
                        </div>   
                    </div>
                </div>
                <div class="col-md-12 custom-2 halo_bg">
                    <div class="center-block">
                        <div class="d-flex col-md-12">
                            <div class="col-md-6 text-end"><h4>10,000 kg </h4> </div>
                            <div class="col-md-6"><img src="/halo/wp-content/plugins/halo/images/icons/Plastic_bottle_transparent.png" class="dashboard_icon plastic">
                                <p>Plastic Collected</p>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function halo_setting() {
    global $table_prefix, $wpdb, $halo_plugin;

    $tblname = 'impact';
    $wp_impact_table = $table_prefix . "$tblname";

    $get_data = $wpdb->get_row("SELECT * FROM $wp_impact_table where name='$halo_plugin'");
    ?>

    <div class="wrap d-flex">
        <div class="container halo_impact">
            <form method="post" id="save_impact_form" action="<?php echo admin_url('admin-ajax.php'); ?>">
                <input type="hidden" name="action" value="save_impact_data">
                <div class="mt-mb-20">
                    <h3>Choose the level of suppport:</h3>
                    <h6>Pick either a fixed amount customers can pay at checkout or a percentage of their total basket</h6>
                </div>
                <div class="row">
                    <div class="container">
                        <div class="col-md-12 halo_bg">
                            <div class="col-md-12 d-flex">
                                <div class="col-md-8 d-flex">
                                    <div class="col-md-1">
                                        <input type="radio" name="impact_type" class="impact_radio fixed" impact_type="1" <?= !empty($get_data) && $get_data->type == 1 ? 'checked' : '' ?> value="<?= !empty($get_data) && $get_data->type == 1 ? '1' : '' ?>">
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-7"><span class="impact_text">Fixed amount</span></div>
                                </div>
                                <div class="col-md-4 d-flex">
                                    <input type="textbox" class="impact_value" name="impact_value_fixed" value="<?= !empty($get_data) && $get_data->type == 1 ? $get_data->amount : '' ?>">
                                    <span class="euro_symbol"><?= get_woocommerce_currency_symbol(); ?></span>
                                </div>
                            </div>
                            <div class="col-md-12"><p class="text-center impact_text">or</p></div>
                            <div class="col-md-12 d-flex">
                                <div class="col-md-8 d-flex">
                                    <div class="col-md-1">
                                        <input type="radio" name="impact_type" class="impact_radio percent" impact_type="2" <?= !empty($get_data) && $get_data->type == 2 ? 'checked' : '' ?> value="<?= !empty($get_data) && $get_data->type == 2 ? '2' : '' ?>">
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-7"><span class="impact_text">Percentage of basket</span></div>
                                </div>
                                <div class="col-md-4 d-flex">
                                    <input type="textbox" class="impact_value" name="impact_value_percent"  value="<?= !empty($get_data) && $get_data->type == 2 ? $get_data->amount : '' ?>">
                                    <span class="euro_symbol">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-mb-20">
                    <h3>Choose the projects your product will support:</h3>
                    <h6>Decide which type of projects are most important to you and which you want to support</h6>
                </div>
                <div>
                    <div class="row">
                        <div class="container">
                            <div class="col-md-12 halo_bg row2">
                                <div class="col-md-12 d-flex">
                                    <div class="col-md-1"><input type="radio" name="impact_type" class="impact_radio"></div>
                                    <div class="col-md-3"><span class="impact_text">CO2 Offset</span></div>
                                    <div class="col-md-6 slider"><div id="nonlinear0" class="nonlinear_slider"></div></div> 
                                    <div class="col-md-2 text-end">
                                        <input type="textbox" class="impact_value" id="nonlinear0_impact_value" name="Co2_offset" value="<?= !empty($get_data) ? $get_data->co2_offset : 0 ?>%">
                                    </div>
                                </div>
                                <div class="col-md-12"><p></p></div>
                                <div class="col-md-12 d-flex">
                                    <div class="col-md-1"><input type="radio" name="impact_type" class="impact_radio"></div>
                                    <div class="col-md-3"><span class="impact_text">Tree Planting</span></div>
                                    <div class="col-md-6 slider"><div id="nonlinear1" class="nonlinear_slider"></div></div>
                                    <div class="col-md-2 text-end">
                                        <input type="textbox" class="impact_value" id="nonlinear1_impact_value" name="tree" value="<?= !empty($get_data) ? $get_data->tree_planting : 0 ?>%">
                                    </div>
                                </div>
                                <div class="col-md-12"><p></p></div>
                                <div class="col-md-12 d-flex">
                                    <div class="col-md-1"><input type="radio" name="impact_type" class="impact_radio"></div>
                                    <div class="col-md-3"><span class="impact_text">Ocean Plastic</span></div>
                                    <div class="col-md-6 slider"><div id="nonlinear2"  class="nonlinear_slider"></div></div>
                                    <div class="col-md-2 text-end">
                                        <input type="textbox" class="impact_value" id="nonlinear2_impact_value" name="plastic" value="<?= !empty($get_data) ? $get_data->ocean_plastic : 0 ?>%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-primary" name="submit" id="save_impact" value="Save">Save</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="logo">
            <div class="mt-mb-20">
                <img src="/halo/wp-content/plugins/halo/images/logo/bla_Halo_logo.png" class="halo_logo">
            </div>
        </div>
    </div>
    <?php
}

add_action('woocommerce_after_cart_table', 'show_impact_content_on_cart');

function show_impact_content_on_cart($cart_object) {
    global $table_prefix, $wpdb, $halo_plugin, $woocommerce;

    $tblname = 'impact';
    $wp_impact_table = $table_prefix . "$tblname";

    $get_data = $wpdb->get_row("SELECT * FROM $wp_impact_table where name='$halo_plugin'");
    if (!empty($get_data)) {
        $cart_sub_total = floatval(preg_replace('#[^\d.]#', '', $woocommerce->cart->subtotal));
        if ($get_data->type == 2) {
            $offset_amount = $cart_sub_total * $get_data->amount / 100;
        } else {
            $offset_amount = $get_data->amount;
        }
        $offset_amount = round($offset_amount, 2)
        ?>
        <div class="halo_impact_cart wrap">
            <div class="container">
                <div class="col-md-12 d-flex">
                    <div class="col-md-3 d-flex">
                        <p class="cart_impact_p">Offset 50kg CO2</p><img src="<?= plugin_dir_url(__FILE__) ?>images/icons/CO2 cloud.png" class="cart_impact_icon cloud">
                    </div>
                    <div class="col-md-3 d-flex">
                        <p class="cart_impact_p">Plant 2 Trees</p><img src="<?= plugin_dir_url(__FILE__) ?>images/icons/Tree.png" class="cart_impact_icon tree">
                    </div>
                    <div class="col-md-3 d-flex"> 
                        <p class="cart_impact_p">Remove 5kg of Plastic</p><img src="<?= plugin_dir_url(__FILE__) ?>images/icons/Plastic Bottle.png" class="cart_impact_icon bottle"> 
                    </div>
                    <div class="col-md-3 d-flex tooltip_col">
                        <div class="tooltip1 cart_impact_p">
                            <p>Learn more</p>
                            <div class="tooltiptext1 tooltip-bottom d-flex">
                                <span class="tooltip_inner_text">Reduce the environmental footprint of your purchase by supporting tree planting and 
                                    ocean clean up schemes with <a href="#">HALO eco</a></span>
                                <span  class="tooltip_inner_img"><img src="<?= plugin_dir_url(__FILE__) ?>images/logo/bla_primary_logo.png" class="cart_impact_icon"></span>
                            </div>
                        </div>
                        <div class="impact-tooltip_text d-none">
                            <p>Reduce the environmental footprint of your purchase by supporting tree planting and ocean clean up schemes with HALO eco</p>
                        </div>
                        <a class="btn btn-primary impact_pay_cart">
                            <?= get_woocommerce_currency_symbol() . $offset_amount ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

add_action('woocommerce_thankyou', 'halo_add_content_thankyou');

function halo_add_content_thankyou($order_id) {
    global $table_prefix, $wpdb, $halo_plugin, $woocommerce;

    $tblname = 'halo_orders';
    $wp_halo_orders_table = $table_prefix . "$tblname";

    $get_order_data = $wpdb->get_row("SELECT * FROM $wp_halo_orders_table where order_id=$order_id");
    if (!empty($get_order_data)) {
        ?>
        <div class="wrap halo_thank_you">
            <div class="container">
                <div class="card shadow">
                    <!--                Halo thank you page-->
                    <div class="section1">
                        <div class="bg-image col-md-12 d-flex">
                            <div class="col-md-8"><h2 class='bg-text'>Congratulations! You've supported some <b>earth-saving</b> projects</h2></div>
        <!--                        <div class="col-md-4 text-end"><img class='logo_halo' src='<?= plugin_dir_url(__FILE__) ?>images/logo/whi_Halo_logo.png'></div>-->
                        </div>
                    </div>
                    <div class="row section2 mx-auto">
                        <div class="col-md-12 row1">
                            <h3 class='text-center mt-4'>Here are the details:</h3>
                            <div class='col-md-12 col1 d-flex mt-2'>
                                <div class='col-md-4'>
                                    <p>50kg</p>
                                    <img src="<?= plugin_dir_url(__FILE__) ?>images/icons/CO2 cloud.png" class="thankyou_icon cloud">
                                    <p>CO2 offset</p>
                                </div>
                                <div class='col-md-4'>
                                    <p>2</p>
                                    <img src="<?= plugin_dir_url(__FILE__) ?>images/icons/Tree.png" class="thankyou_icon tree">
                                    <p>Trees Planted</p>
                                </div>
                                <div class='col-md-4'>
                                    <p>5kg</p>
                                    <img src="<?= plugin_dir_url(__FILE__) ?>images/icons/Plastic Bottle.png" class="thankyou_icon plastic">
                                    <p>Plastic Collected</p>
                                </div>
                            </div>
                            <div class="col-md-12 col2 d-flex mt-4">
                                <div class="col-md-6">
                                    <p>Transaction ID: 232323</p>
                                    <p>Date: <?= date('D d F Y') ?></p>
                                </div>
                            </div>
                            <div class="col-md-12 col3 d-flex mt-4">
                                <div class="col-md-6">
                                    <p class='sub-text'>Basket</p>
                                    <p class='sub-text'>Environmental Offset</p>
                                </div>
                                <div class="col-md-4 text-end">
                                    <p class='sub-text'><?= get_woocommerce_currency_symbol() . $get_order_data->order_subtotal ?></p>
                                    <p class='sub-text'><?= get_woocommerce_currency_symbol() . $get_order_data->offset_amount ?> </p>
                                    <p class='sub-text total'><?= get_woocommerce_currency_symbol() . $get_order_data->order_total ?></p>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <h4 class='font-weight-normal'>Where has this money gone</h4>
                            <div class="col-md-12 col2 d-flex mt-4">
                                <div class="col-md-6">
                                    <p>Planting trees with <a href='https://edenprojects.org/' target="blank">Eden</a></p>
                                    <p>Cleaning up Ocean plastic with <a href='https://www.empower.eco/' target="blank">Empower</a></p>
                                    <p>Offsetting Carbon emissions</p>
                                </div>
                                <div class="col-md-4 text-end">
                                    <p><?= $get_order_data->co2_offset ?>%</p>
                                    <p><?= $get_order_data->tree_planting ?>%</p>
                                    <p><?= $get_order_data->ocean_plastic ?>%</p> 
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class='mb-4'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

add_action('wp_ajax_save_impact_data', 'save_impact_data');
add_action('wp_ajax_nopriv_save_impact_data', 'save_impact_data');

function save_impact_data() {
    global $table_prefix, $wpdb, $halo_plugin;
    $tblname = 'impact';
    $wp_impact_table = $table_prefix . "$tblname";

    $get_data = $wpdb->get_row("SELECT * FROM $wp_impact_table where name='$halo_plugin'");

    if (isset($_POST)) {
        $data = array(
            'name' => $halo_plugin,
            'type' => sanitize_text_field($_POST['impact_type']),
            'amount' => $_POST['impact_type'] == '1' ? sanitize_text_field($_POST['impact_value_fixed']) : sanitize_text_field($_POST['impact_value_percent']),
            'co2_offset' => sanitize_text_field(filter_var($_POST['Co2_offset'], FILTER_SANITIZE_NUMBER_INT)),
            'tree_planting' => sanitize_text_field(filter_var($_POST['tree'], FILTER_SANITIZE_NUMBER_INT)),
            'ocean_plastic' => sanitize_text_field(filter_var($_POST['plastic'], FILTER_SANITIZE_NUMBER_INT)),
        );
        if (empty($get_data)) {
            $wpdb->insert($wp_impact_table, $data);
        }
        $wpdb->update($wp_impact_table, $data, array('name' => $halo_plugin));
        echo json_encode(['status' => true]);
        exit();
    }
    echo json_encode(['status' => false]);
    exit();
}

add_action('woocommerce_cart_totals_before_order_total', 'cart_show_offsets_content_after_shipping');

function cart_show_offsets_content_after_shipping() {
    $offset_amount = get_offset_amount();
    if (!empty($offset_amount)) {
        ?> 
        <tr class="cart-subtotal"><td class="offsets_text"><strong>Environmental offset</strong> </td> <td class="offsets_amount"><?= get_woocommerce_currency_symbol() . ' ' . $offset_amount ?></td> </tr>
        <?php
    }
}

add_filter('woocommerce_calculated_total', 'change_cart_total', 10, 1);

function change_cart_total($total) {
    $offset_amount = get_offset_amount();
    return $total + $offset_amount;
}

add_action('woocommerce_review_order_after_cart_contents', 'woocommerce_review_order_after_cart_contents');

function woocommerce_review_order_after_cart_contents() {
    $offset_amount = get_offset_amount();
    if (!empty($offset_amount)) {
        ?> 
        <tr class="cart_item">
            <td class="offsets_text"><strong>Environmental offset</strong> </td> <td class="offsets_amount"><strong><?= get_woocommerce_currency_symbol() . ' ' . $offset_amount ?></strong>
            </td> 
        </tr>
        <?php
    }
}

function get_offset_amount() {
    global $table_prefix, $wpdb, $halo_plugin, $woocommerce;

    $tblname = 'impact';
    $wp_impact_table = $table_prefix . "$tblname";

    $get_data = $wpdb->get_row("SELECT * FROM $wp_impact_table where name='$halo_plugin'");
    $cart_sub_total = floatval(preg_replace('#[^\d.]#', '', $woocommerce->cart->subtotal));
    if (!empty($get_data)) {
        if ($get_data->type == 2) {
            $offset_amount = $cart_sub_total * $get_data->amount / 100;
        } else {
            $offset_amount = $get_data->amount;
        }
        $offset_amount = number_format($offset_amount, 2);
        return $offset_amount;
    }
}

add_action('woocommerce_order_status_processing', 'save_order_data');

function save_order_data($order_id) {
    global $table_prefix, $wpdb;
    $tblname = 'halo_orders';
    $wp_halo_orders_table = $table_prefix . "$tblname";

    $order = wc_get_order($order_id);
    $file_path = ABSPATH . 'wp-content/plugins/halo/logs/email_logs.txt';
    // $data = file_put_contents($file_path, $order_id.' - '.$order->get_total().' - '.$order->get_subtotal().' - '.$order->get_subtotal().' - '.$order->get_subtotal());
    $environmental_offsets = get_environmental_offsets($order);
    if (!empty($environmental_offsets)) {
        $data = array(
            'order_id' => $order_id,
            'co2_offset' => $environmental_offsets['co2_offset'],
            'tree_planting' => $environmental_offsets['tree_planting'],
            'ocean_plastic' => $environmental_offsets['ocean_plastic'],
            'offset_amount' => $environmental_offsets['offset_amount'],
            'order_total' => $order->get_total(),
            'order_subtotal' => $order->get_subtotal(),
            'order_tax_total' => $order->get_total_tax(),
            'order_shipping_total' => $order->get_shipping_total(),
        );
        $wpdb->insert($wp_halo_orders_table, $data);
    }
}

function get_environmental_offsets($order) {
    global $table_prefix, $wpdb, $halo_plugin, $woocommerce;

    $tblname = 'impact';
    $wp_impact_table = $table_prefix . "$tblname";

    $get_data = $wpdb->get_row("SELECT * FROM $wp_impact_table where name='$halo_plugin'");
    $order_sub_total = $order->get_subtotal();
    if (!empty($get_data)) {
        if ($get_data->type == 2) {
            $offset_amount = $order_sub_total * $get_data->amount / 100;
        } else {
            $offset_amount = $get_data->amount;
        }
        $offset_amount = number_format($offset_amount, 2);
        return ['offset_amount' => $offset_amount, 'co2_offset' => $get_data->co2_offset, 'tree_planting' => $get_data->tree_planting, 'ocean_plastic' => $get_data->ocean_plastic];
    }
}

function send_email_after_order() {
    $file_path = ABSPATH . 'wp-content/plugins/halo/logs/email_logs.txt';
    $data = file_put_contents($file_path, 'After wo-commerce order email2');
    // echo $data1;
}
?>