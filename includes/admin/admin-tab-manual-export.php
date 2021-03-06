<?php
class DT_Data_Reporting_Tab_Manual_Export
{
    public $token;
    public function __construct( $token ) {
        $this->token = $token;
    }

    public function content() {
        ?>
        <div class="wrap">
            <div id="poststuff">
                <div id="post-body" class="metabox-holder columns-2">
                    <div id="post-body-content">
                        <!-- Main Column -->

                        <?php $this->main_column() ?>

                        <!-- End Main Column -->
                    </div><!-- end post-body-content -->
                    <div id="postbox-container-1" class="postbox-container">
                    </div><!-- postbox-container 1 -->
                    <div id="postbox-container-2" class="postbox-container">
                    </div><!-- postbox-container 2 -->
                </div><!-- post-body meta box container -->
            </div><!--poststuff end -->
        </div><!-- wrap end -->
        <?php
    }

    public function main_column() {
        $preview_link = 'admin.php?page='.$this->token.'&tab=preview&type=';

        $configurations = DT_Data_Reporting_Tools::get_configs();
        ?>
        <!-- Box -->
        <table class="widefat striped table-export">
            <thead>
            <th>Default Data Export</th>
            </thead>
            <tbody>
            <tr>
                <td>
                    Export Contacts

                    <div class="alignright">
                        <a href="<?php echo esc_attr( $preview_link ) . 'contacts' ?>">Preview <span class="dashicons dashicons-admin-site-alt3"></span></a> |
                        <a href="<?php echo esc_attr( plugins_url( '../../exports/csv.php?type=contacts', __FILE__ ) ) ?>">CSV <span class="dashicons dashicons-download"></span></a> |
                        <a href="<?php echo esc_attr( plugins_url( '../../exports/json.php?type=contacts', __FILE__ ) ) ?>">JSON <span class="dashicons dashicons-download"></span></a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    Export Contact Activity
                    <div class="alignright">
                        <a href="<?php echo esc_attr( $preview_link ) . 'contact_activity' ?>">Preview <span class="dashicons dashicons-admin-site-alt3"></span></a> |
                        <a href="<?php echo esc_attr( plugins_url( '../../exports/csv.php?type=contact_activity', __FILE__ ) ) ?>">CSV <span class="dashicons dashicons-download"></a> |
                        <a href="<?php echo esc_attr( plugins_url( '../../exports/json.php?type=contact_activity', __FILE__ ) ) ?>">JSON <span class="dashicons dashicons-download"></a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    Export Groups

                    <div class="alignright">
                        <a href="<?php echo esc_attr( $preview_link ) . 'groups' ?>">Preview <span class="dashicons dashicons-admin-site-alt3"></span></a> |
                        <a href="<?php echo esc_attr( plugins_url( '../../exports/csv.php?type=groups', __FILE__ ) ) ?>">CSV <span class="dashicons dashicons-download"></span></a> |
                        <a href="<?php echo esc_attr( plugins_url( '../../exports/json.php?type=groups', __FILE__ ) ) ?>">JSON <span class="dashicons dashicons-download"></span></a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    Export Group Activity
                    <div class="alignright">
                        <a href="<?php echo esc_attr( $preview_link ) . 'group_activity' ?>">Preview <span class="dashicons dashicons-admin-site-alt3"></span></a> |
                        <a href="<?php echo esc_attr( plugins_url( '../../exports/csv.php?type=group_activity', __FILE__ ) ) ?>">CSV <span class="dashicons dashicons-download"></a> |
                        <a href="<?php echo esc_attr( plugins_url( '../../exports/json.php?type=group_activity', __FILE__ ) ) ?>">JSON <span class="dashicons dashicons-download"></a>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <br>
        <!-- End Box -->

        <?php
        if ( !empty( $configurations ) ) {
            echo '<h2>Export Configurations</h2>';
            foreach ( $configurations as $key => $config ) {
                $preview_link_config = 'admin.php?page='.$this->token.'&tab=preview&config='.$key.'&type=';
                $api_action_link_config = 'admin.php?page='.$this->token.'&tab=api-send&config='.$key.'&type=';
                ?>
          <table class="widefat striped table-export-config">
            <thead>
            <th>Configuration: <span class="config-name"><?php echo esc_html( $config['name'] ) ?></span></th>
            </thead>
            <tbody>
            <tr>
              <td>
                Export Contacts

                <div class="alignright">
                  <a href="<?php echo esc_attr( $preview_link_config ) . 'contacts' ?>">Preview <span class="dashicons dashicons-admin-site-alt3"></span></a> |
                  <a href="<?php echo esc_attr( $api_action_link_config ) . 'contacts' ?>">Send Data <span class="dashicons dashicons-migrate"></span></a>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                Export Contact Activity
                <div class="alignright">
                  <a href="<?php echo esc_attr( $preview_link_config ) . 'contact_activity' ?>">Preview <span class="dashicons dashicons-admin-site-alt3"></span></a> |
                  <a href="<?php echo esc_attr( $api_action_link_config ) . 'contact_activity' ?>">Send Data <span class="dashicons dashicons-migrate"></span></a>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                Export Groups

                <div class="alignright">
                  <a href="<?php echo esc_attr( $preview_link_config ) . 'groups' ?>">Preview <span class="dashicons dashicons-admin-site-alt3"></span></a> |
                  <a href="<?php echo esc_attr( $api_action_link_config ) . 'groups' ?>">Send Data <span class="dashicons dashicons-migrate"></span></a>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                Export Group Activity
                <div class="alignright">
                  <a href="<?php echo esc_attr( $preview_link_config ) . 'group_activity' ?>">Preview <span class="dashicons dashicons-admin-site-alt3"></span></a> |
                  <a href="<?php echo esc_attr( $api_action_link_config ) . 'group_activity' ?>">Send Data <span class="dashicons dashicons-migrate"></span></a>
                </div>
              </td>
            </tr>
            </tbody>
          </table>
          <br>
                <?php
            }
        }
        ?>
        <?php
    }

}
