<?php
/**
 * Horde Configuration File
 *
 * This file contains intial configuration settings for Horde.
 * It contains basic settings that allow you to log into Horde and
 * complete the configuration with configuration interface. The first
 * change you should do is to select a sensible authentication driver
 * and administrator user name.
 *
 * The only settings that might need changes if you are not running
 * Horde in a "default" setup are documented below. 
 *
 * Strings should be enclosed in 'quotes'.
 * Integers should be given literally (without quotes).
 * Boolean values may be true or false (never quotes).
 *
 * $Horde: horde/config/conf.php.dist,v 1.94.10.4 2008-10-03 00:19:58 chuck Exp $
 */

// Determines how we generate full URLs (for location headers and
// such). Possible values are:
//   0 - Assume that we are not using SSL and never generate https URLS.
//   1 - Assume that we are using SSL and always generate https URLS.
//       NOTE: If you do this, you MUST hardcode the correct HTTPS port
//       number in $conf['server']['port'] below. Otherwise Horde will
//       be unable to generate correct HTTPS URLs when a user tries to
//       access Horde via a non-HTTPS port.
//   2 - Attempt to auto-detect, and generate URLs appropriately.
$conf['use_ssl'] = 2;

// What server name should we use? You'll probably know if you need to
// change this default; only in situations where you need to override
// what Apache thinks the server name is.
$conf['server']['name'] = $_SERVER['SERVER_NAME'];

// What port number is the webserver running on? Again, you shouldn't
// need to change the default, and you probably know it if you do. The
// exception is if you have $conf['use_ssl'] set to 1, as described
// above.
$conf['server']['port'] = $_SERVER['SERVER_PORT'];

// What domain should we set cookies from? If you have a cluster that
// needs to share cookies, this might be '.example.com' - the leading
// '.' is important. Most likely, though, you won't have to change the
// default.
$conf['cookie']['domain'] = $_SERVER['SERVER_NAME'];

// What path should we set cookies to? This should match where Horde
// is on your webserver - if it is at /horde, then this should be
// '/horde'. If Horde is installed as the document root, then this
// needs to be '/' - NOT ''.
// ** BUT, if IE will be used to access Horde modules, you should read
//    this first (discussing issues with IE's Content Advisor):
//    http://lists.horde.org/archives/imp/Week-of-Mon-20030113/029149.html
$conf['cookie']['path'] = '/horde';

// YOU SHOULDN'T CHANGE ANTHING BELOW THIS LINE.
$conf['debug_level'] = E_ALL & ~E_NOTICE;
$conf['umask'] = 077;
$conf['compress_pages'] = true;
$conf['session']['name'] = 'Horde';
$conf['session']['cache_limiter'] = 'nocache';
$conf['session']['timeout'] = 0;
$conf['auth']['admins'] = array('Administrator');
$conf['auth']['driver'] = 'auto';
$conf['auth']['params'] = array('username' => 'Administrator');
$conf['prefs']['driver'] = 'session';
$conf['menu']['always'] = false;
$conf['portal']['fixed_blocks'] = array();
$conf['imsp']['enabled'] = false;
$conf['kolab']['enabled'] = false;
$conf['log']['enabled'] = false;
