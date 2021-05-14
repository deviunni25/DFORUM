<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   
    //-----------------------------------------------------------------------------
    //encryption decryption
    if (!function_exists('magicfunction')){
        function magicfunction($string, $action) {
        $secret_key = '@@s-m-c-i-m-20210217@#';
        $secret_iv = 'smcim_encrypt_and_decrypt_20210217';
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $key = hash('sha256', $secret_key );
        $iv = substr(hash( 'sha256', $secret_iv ), 0, 16 );
        if( $action == 'e' ) {
            $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
        }
        else if( $action == 'd' ){
            $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
        }
        return $output;
    }
}
    
// -----------------------------------------------------------------------------



/*******  Toast Message *******/
if (! function_exists('success_toast')) {
   
    function success_toast(){
        $CI = & get_instance();  
        $status = $CI->session->userdata('status');
        $message = $CI->session->userdata('toast_msg');
        return "<script>
        jQuery(function(){
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
        
            Toast.fire({
                icon: '$status',
                title: '$message'
            })
        });
        </script>";
    }
}

/*******  Toast Message *******/


/******* Success Message *******/

if (! function_exists('success_message')) {
    function success_message(){
        $CI = & get_instance();  
        $status = $CI->session->userdata('alert');
        $message = $CI->session->userdata('alert_msg');
        return '<div class="alert alert-'.$status.' alert-dismissible fade show" role="alert">
        '.$message.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }   
}

/******* Success Message *******/

/******* Success Message *******/

if (! function_exists('auth_check')) {
    function auth_check(){
        $CI = & get_instance(); 
        $session = $CI->session->userdata('login_status');
       
		if ($session == '') {
            redirect('Auth');
        }
    }   
}

/******* Success Message *******/


?>