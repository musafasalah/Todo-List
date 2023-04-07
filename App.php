<?php

use Request\Request;
use session\Session;

require_once 'inc/connection.php';

require_once 'classes/request.php';
require_once 'classes/session.php';

require_once 'classes/validation/require.php';
require_once 'classes/validation/str.php';
require_once 'classes/validation/validation.php';

$request = new Request;
$session = new Session;

$validation = new Validation;



