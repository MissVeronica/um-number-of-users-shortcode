<?php
add_shortcode( 'number_of_users', 'shortcode_status_numbers' );

function shortcode_status_numbers( $atts ) {

    $statuses = array(  'approved',
                        'awaiting_admin_review',
                        'awaiting_email_confirmation',
                        'inactive',
                        'rejected' );

    if ( isset( $atts['status'] ) && ! empty( $atts['status'] )) {
        $status = sanitize_text_field( $atts['status'] );
        if ( in_array( $status, $statuses )) {
            $users_count = get_transient( "um_count_users_{$status}" );
            return $users_count;
        }
    }
    return __( 'Your status code is incorrect.', 'ultimate-member' ); 
}
