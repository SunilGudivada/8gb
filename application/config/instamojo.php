<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* instamojo payment API v1 library for CodeIgniter
*
* @license Creative Commons Attribution 3.0 <http://creativecommons.org/licenses/by/3.0/>
* @version 1.0
* @author Rajeev bbqq <https://github.com/rajeevbbqq>
* @copyright Copyright (c) 2017, Rajeev bbqq
*/

/*
|--------------------------------------------------------------------------
| Mode
|--------------------------------------------------------------------------
|
| $config['mojo_mode'] = 'sandbox'; for testing
| $config['mojo_mode'] = 'live'   ; for production
|
*/


$config['mojo_mode']  = 'sandbox' ;


/*
|--------------------------------------------------------------------------
| API_KEY
|--------------------------------------------------------------------------
| API_KEY are different for test and production !
| $config['mojo_apikey'] = '650f7eed3d900273d6fafd635a';
|
*/

$config['mojo_apikey'] = 'test_4b14a7665ece3143ca6bb0e58f1' ;


/*
|--------------------------------------------------------------------------
| AUTH_TOKEN
|--------------------------------------------------------------------------
| AUTH_TOKEN are different for test and production !
| $config['mojo_token'] = '650f7eed3d900273d6fafd635a';
|
*/


$config['mojo_token']  = 'test_f114860025c09869f1413c7d28f' ;


/*
|--------------------------------------------------------------------------
| REDIRECT_URL
|--------------------------------------------------------------------------
| Set redirect url !
| $config['mojo_url'] = 'https://github.com/Instamojo/instamojo-php';
|
*/

$config['mojo_url'] = 'http://localhost/deepak/classyad/index.php/example';


/* End of file instamojo.php */
/* Location: ./application/config/instamojo.php */
