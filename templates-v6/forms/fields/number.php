<?php
/**
 * @author  AazzTech
 * @since   6.7
 * @version 6.7
 */
?>

<div class="form-group directorist-number-field">
	<?php $form->add_listing_label_template( $data );?>

	<input type="number" name="<?php echo esc_attr( $data['field_key'] ); ?>" id="<?php echo esc_attr( $data['field_key'] ); ?>" class="form-control" value="<?php echo esc_attr( $data['value'] ); ?>" placeholder="<?php echo esc_attr( $data['placeholder'] ); ?>" 
	<?php  echo ! empty( $data['required'] ) ? 'required="required"' : '';  echo !empty( $data['max'] ) ? 'max="'. $data['max'] .'"' : ''; ?> >

	<?php $form->add_listing_description_template( $data ); ?>
</div>