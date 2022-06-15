<?php
/* status id constants for users*/
if (!defined('USER')) define('USER', 0);
if (!defined('ADMIN')) define('ADMIN', 1);
if (!defined('STAFF')) define('STAFF', 2);
/* status id constants for orders */
if (!defined('NEW_ORDER')) define('NEW_ORDER', 0);
if (!defined('OLD_ORDER')) define('OLD_ORDER', 1);
/* payment id constants for orders */
if (!defined('IN_CACHE')) define('IN_CACHE', 0);
if (!defined('BY_CARD')) define('BY_CARD', 1);
