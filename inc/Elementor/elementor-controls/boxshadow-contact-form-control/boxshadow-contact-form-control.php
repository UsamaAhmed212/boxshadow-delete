<?php

// Custom widgets must be defined in the Elementor namespace
namespace Elementor; 


/**
 * Elementor currency control.
 *
 * A control for displaying a select field with the ability to choose currencies.
 *
 * @since 1.0.0
 */
class boxshadow_contact_form_Control extends Base_Data_Control {

	// Control Dependencies Styles Enqueue
	public function enqueue() {
        // Styles
		wp_register_style( 'boxshadow-contact-form-control', BOXSHADOW_THEME_DIR_URI . 'inc/elementor/elementor-controls/boxshadow-contact-form-control/assets/css/boxshadow-contact-form-control.css', array(), '1.0.0', 'all' );
		wp_enqueue_style( 'boxshadow-contact-form-control' );
		
        // Scripts
		wp_register_script( 'boxshadow-contact-form-control', BOXSHADOW_THEME_DIR_URI . 'inc/elementor/elementor-controls/boxshadow-contact-form-control/assets/js/boxshadow-contact-form-control.js', array(), '1.0.0', 'all' );
		wp_enqueue_script( 'boxshadow-contact-form-control' );
	}

	// Get Boxshadow Contact Form Control type
	public function get_type() {
		return 'BOXSHADOW_CONTACT_FORM';
	}

	//  Get BoxShadow Contact Form
	// public static function get_currencies() {
	// 	return [
	// 		'USD' => 'USD ($)',
	// 		'EUR' => 'EUR (€)',
	// 		'GBP' => 'GBP (£)',
	// 		'JPY' => 'JPY (¥)',
	// 		'ILS' => 'ILS (₪)',
	// 	];
	// }


	// Get BoxShadow Contact Form
	public function boxshadow_contact_form () {

		// $countactform = array();
		// $boxshadow_forms_args = array( 'posts_per_page' => -1, 'post_type'=> 'wpcf7_contact_form' );
		// $boxshadow_forms = get_posts( $boxshadow_forms_args );

		// if( $boxshadow_forms ) {

		// 	foreach ( $boxshadow_forms as $boxshadow_form ) {

		// 		$countactform[$boxshadow_form->ID] = $boxshadow_form->post_title;

		// 	}

		// } else {

		// 	$countactform = array();

		// }

		// return $countactform;

		global $wpdb;
		$results = $wpdb->get_results("SELECT `meta_value` FROM `wp_postmeta` WHERE `meta_key` LIKE '_elementor_data' ORDER BY `meta_id` DESC LIMIT 1");

		$result = json_decode(json_encode($results[0]), true);
		$result = json_decode(json_encode($result['meta_value']), true);
		$result = json_decode($result, true);
		$result = $result[0]['elements'][0]['elements'][0]['settings']['boxshadow_contact_form_8'];

		// $control_uid = $this['Elementor\boxshadow_contact_form_Control'];
		// $control_uid = var_dump($this);
		// $control_uid = json_decode($this, true);
		// $control_uid = json_decode(json_encode($this), true);
		// $control_uid = $control_uid['_base_settings:Elementor\Base_Control:private'];


		// echo '<pre>';
		// print_r($results);
		// print_r($result);
		// print_r($control_uid);
		// print_r($this);
		// echo '</pre>';

	}


	// Get Boxshadow Contact Form Control Default Settings
	protected function get_default_settings() {
		return [
			'label_block' => true,
			// 'contact_form' => self::get_currencies(),
			// 'contact_form' => [],
			'contact_form' => self::boxshadow_contact_form(),
		];
	}
	
	public function get_default_value() {
		return [];
	}

	// Render Contact Form 7 Control Output in the Editor
	public function content_template() {
		// Get  Control Uid From the Control Settings.
		$control_uid = $this->get_control_uid(); 
		?>
		<div class="elementor-control-field">

			<# if ( data.label ) {#>
			<label class="elementor-control-title">{{{ data.label }}}</label>
			<# } #>

			<div class="elementor-control-input-wrapper">
				
				<# if ( data ) {
					console.log(_.extend(data));
					console.log(data.controlValue);
					console.log(data.controlValue.label);
				} #>


                <div class="boxshadow-checkbox-wrapper-7">
                    <span class="title"><?php echo esc_html__( 'Label Show/Hide', 'boxshadow' ); ?></span>
                    <span>
						<# if ( data.controlValue.label === 'on' || data.controlValue.label === 'off' ) {
							
							if ( data.controlValue.label === 'on' ) { #>
								<input id="cb-7" class="boxshadow-contact-form" type="checkbox" name="label" value="on" checked="checked"/>
							<# } else { #>
									<input id="cb-7" class="boxshadow-contact-form" type="checkbox" name="label" value="off"/>
							<#	} 

						} else { #>
							<input id="cb-7" class="boxshadow-contact-form" type="checkbox" name="label" value="on" checked="checked"/>
						<# } #>
                        <label for="cb-7"></label>
                    </span>
                </div>

                <!-- <div class="boxshadow-checkbox-wrapper-55">
                    <span class="title"><?php echo esc_html__( 'Name Visible', 'boxshadow' ); ?></span>
                    <label>
						<# if ( data.controlValue.name == 'true') {#>
							<input type="checkbox" name="name" checked="checked" data-setting="{{ data.name }}">
						<# } else { #>
							<input type="checkbox" name="name" data-setting="{{ data.name }}">
						<# } #>

                        <span class="switch-left"><?php echo esc_html__( 'No', 'boxshadow' ); ?></span>
                        <span class="switch-right"><?php echo esc_html__( 'Yes', 'boxshadow' ); ?></span>
                    </label>
                </div>
                <div class="boxshadow-checkbox-wrapper-55">
                    <span class="title"><?php echo esc_html__( 'Email Visible', 'boxshadow' ); ?></span>
                    <label>
						<# if ( data.controlValue.email == 'true') {#>
							<input type="checkbox" name="email" checked="checked" data-setting="{{ data.name }}">
						<# } else { #>
							<input type="checkbox" name="email" data-setting="{{ data.name }}">
						<# } #>
                        <span class="switch-left"><?php echo esc_html__( 'No', 'boxshadow' ); ?></span>
                        <span class="switch-right"><?php echo esc_html__( 'Yes', 'boxshadow' ); ?></span>
                    </label>
                </div>
                <div class="boxshadow-checkbox-wrapper-55">
                    <span class="title"><?php echo esc_html__( 'Phone Visible', 'boxshadow' ); ?></span>
                    <label>
						<# if ( data.controlValue.phone == 'true') {#>
							<input type="checkbox" name="phone" checked="checked" data-setting="{{ data.name }}">
						<# } else { #>
							<input type="checkbox" name="phone" data-setting="{{ data.name }}">
						<# } #>
                        <span class="switch-left"><?php echo esc_html__( 'No', 'boxshadow' ); ?></span>
                        <span class="switch-right"><?php echo esc_html__( 'Yes', 'boxshadow' ); ?></span>
                    </label>
                </div>
                <div class="boxshadow-checkbox-wrapper-55">
                    <span class="title"><?php echo esc_html__( 'Message Visible', 'boxshadow' ); ?></span>
                    <label>
						<# if ( data.controlValue.message == 'true') {#>
							<input type="checkbox" name="message" checked="checked" data-setting="{{ data.name }}">
						<# } else { #>
							<input type="checkbox" name="message" data-setting="{{ data.name }}">
						<# } #>
                        <span class="switch-left"><?php echo esc_html__( 'No', 'boxshadow' ); ?></span>
                        <span class="switch-right"><?php echo esc_html__( 'Yes', 'boxshadow' ); ?></span>
                    </label>
                </div> -->

			</div>

		</div>

		<# if ( data.description ) { #>
		<div class="elementor-control-field-description">{{{ data.description }}}</div>
		<# } #>
	<?php
	}

}
Plugin::instance()->controls_manager->register_control( 'BOXSHADOW_CONTACT_FORM', new boxshadow_contact_form_Control );