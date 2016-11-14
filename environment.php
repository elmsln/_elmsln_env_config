<?php
// this file can be used to manipulate the elmsln environment based on where it is deployed
// this could be used to migrate an entire built deploy from 1 server to another while modifying
// the addresses as needed.

// maybe you don't have certs locally
//$GLOBALS['elmslncfg']['protocol'] = 'http';
// this is probably on a different server / new address
//$GLOBALS['elmslncfg']['address'] = 'thenew.elmsln.address';