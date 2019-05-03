<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="whatsapp-wpchat-admin">

<script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>

<h1><i class="fab fa-whatsapp"></i> WhatsApp Plugin</h1>

<!-- show update notice -->
<?php
if ( isset( $_GET['settings-updated'] ) ) {
	add_settings_error( 'whatsapp_wpchat_messages', 'whatsapp_wpchat_message', __( 'Settings Saved', 'whatsapp-wpchat-group' ), 'updated' );
}
settings_errors( 'whatsapp_wpchat_messages' );
?>
<!-- end show update notice -->

<p>This plugin allows you to add chat buttons right below your website.<br>Visitors who click on the button will be directed to a page that redirects to the WhatsApp application on their respective gadgets or on the WhatsApp Web if the visitor opens WhatsApp via the desktop.</p>

<div class="card">

<form action="options.php" method="POST">

	<?php settings_fields( 'whatsapp-wpchat-group' ); ?>
	<?php do_settings_sections( 'whatsapp-wpchat-group' ); ?>

<div class="form-group">
<label><h2>WhatsApp Number</h2></label>
<label><h4>Type number in international format without '+' symbol. If your number is +10 123456789, then type 10123456789</h4></label>
<input type="text" name="whatsapp_wpchat[nomorWhatsapp]" id="nomorWhatsapp" value="<?= $data['nomorWhatsapp'] ?>">
</div>

<div class="form-group">
<label><h2>Plugin Display</h2></label>
<label><h4>Leave this area empty or remove any existing text if you just want the Plugin to display WhatsApp Icon without any Message</h4></label>
<input type="text" name="whatsapp_wpchat[cta]" id="cta" value="<?= $data['cta'] ?>">
</div>

<div class="form-group">
<label><h2>Fill in the Chat</h2></label>
<label><h4>Type only the chat text you want, final chat text = text + {{title}} (if set) + {{url}} (if set).</h4><label>
<textarea id="isiChat" name="whatsapp_wpchat[isiChat]" cols="50" rows="10"><?= stripslashes($data['isiChat']) ?></textarea>
</div>

<div class="form-group">
	<label><h2>Position of the Plugin</h2></label>
	<label><h4>Type "1" if you want the plugin to be on bottom right position (without quotes)</h4></label>
	<label><h4>Type "2" if you want the plugin to be on top right position (without quotes)</h4></label>
	<label><h4>Type "3" if you want the plugin to be on bottom left position (without quotes)</h4></label>
	<label><h4>Type "4" if you want the plugin to be on top left position (without quotes)</h4></label>
	<label><h4>Type "5" if you want the plugin to be on middle right position (without quotes)</h4></label>
	<input type="text" name="whatsapp_wpchat[pos]" id="pos" value="<?= $data['pos'] ?>">
</div>

<div class="form-group">
	<label><h2>Include Current Page URL with Chat Text</h2></label>
	<label><h4>Type "Yes" if you want to include page title with chat text otherwie type "No" (without quotes)</h4></label>
	<input type="text" name="whatsapp_wpchat[p_url]" id="p_url" value="<?= $data['p_url'] ?>">
</div>

<div class="form-group">
	<label><h2>Include Current Page Title with Chat Text</h2></label>
	<label><h4>Type "Yes" if you want to include page title with chat text otherwie type "No" (without quotes)</h4></label>
	<input type="text" name="whatsapp_wpchat[p_title]" id="p_title" value="<?= $data['p_title'] ?>">
</div>

<?php submit_button( 'Save Settings' ); ?>

</form>

</div>

</div>
