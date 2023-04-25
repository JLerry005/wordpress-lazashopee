<?php 

    /**
     * Setting Page
     */
    
?>
    <h1 id="style-dashboard" class="dashboard-style" >Dashboard</h1>

    <form action="options.php" method="post" enctype="multipart/form-data">
        <?php
            settings_fields( 'custom_settings_option' );
            do_settings_sections( 'custom_settings_option' );
            submit_button();
        ?>
    </form>
