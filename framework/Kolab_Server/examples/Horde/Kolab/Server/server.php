<?php
/**
 * Demonstrates the use of Horde_Kolab_Server::
 *
 * $Horde: framework/Kolab_Server/examples/Horde/Kolab/Server/server.php,v 1.1.2.2 2008/08/01 07:56:19 wrobel Exp $
 *
 * @package Kolab_Server
 */

/** Configure the system for LDAP access */
global $conf;

/** Adapt these settings to match your Kolab LDAP server */
$conf['kolab']['server']['driver'] = 'ldap';
$conf['kolab']['server']['params']['server'] = 'example.com';
$conf['kolab']['server']['params']['base_dn'] = 'dc=example,dc=com';
$conf['kolab']['server']['params']['bind_dn'] = 'cn=nobody,cn=internal,dc=example,dc=com';
$conf['kolab']['server']['params']['bind_pw'] = 'MY_VERY_SECRET_PASSWORD';

/** Require the main package class */
require_once 'Horde/Kolab/Server.php';

/** Initialize the server object */
$server = Horde_Kolab_Server::singleton();

/** Fetch a dn for a mail address */
$dn = $server->dnForMailAddress('wrobel@example.com');
var_dump($dn);

/** Fetch the corresponding object */
$object = $server->fetch($dn);
var_dump(get_class($object));

/** Display object attributes */
var_dump($object->get(KOLAB_ATTR_CN));
