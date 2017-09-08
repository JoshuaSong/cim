<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// autoloaded language entries are always available (loaded in config.php)

// header
$lang['header_login']          = 'Log in';
$lang['header_logout']         = 'Log out';

// RecaptchaV2
$lang['recaptchav2_response']           = "I am not a robot";
$lang['recaptcha_class_initialized']    = 'reCaptcha Library Initialized';
$lang['recaptcha_no_private_key']       = 'You did not supply an API key for Recaptcha';
$lang['recaptcha_no_remoteip']          = 'For security reasons, you must pass the remote ip to reCAPTCHA';
$lang['recaptcha_socket_fail']          = 'Could not open socket';
$lang['recaptcha_html_error']           = 'Error loading security image. Please try again later';

// email
$lang['email_not_found']        = 'E-mail address not found.';
$lang['email_greeting']         = 'Hello';
$lang['email']                  = "Email";
$lang['email_address']          = 'E-mail address';

// form validation library
$lang['is_valid_email']             = 'Please enter a correct e-mail address.';
$lang['is_valid_password']          = 'The password field must contain at least one special character and must contain at least one number.';
$lang['is_valid_username']          = 'That username or email could not be found.';
$lang['is_db_cell_available']       = 'That %s already exists in our database.';
$lang['is_db_cell_available_by_id'] = 'That %s already exists in our database.';
$lang['check_captcha']              = 'Verification code is incorrect (reCaptcha).';
$lang['is_member_password']         = 'Your password is incorrect';

// access
$lang['no_access']          = 'Access denied';
$lang['no_access_text']     = 'You are not authorized to view this page.';

// create img folder
$lang['create_imgfolder_failed'] = "Problem creating image directory - check and create it manually in assets/img/members.";

// flashdata messaging headers
$lang['message_error_heading']      = "Please verify the following:";
$lang['message_success_heading']    = "Success!!";

// other
$lang['site_disabled']      = 'Site has been disabled.';
$lang['illegal_input']      = "Illegal input detected.";
$lang['illegal_request']    = "Illegal request.";
$lang['nothing_deleted']    = "Nothing deleted.";
$lang['confirm_delete']     = "Are you sure to delete?";

// simple confirm
$lang['yes']        = "Yes";
$lang['no']         = "No";
