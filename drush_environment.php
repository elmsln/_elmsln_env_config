<?php
// use this in order to define multiple environments to generate new drush alias targets
$denvironment = array();

// here's an example of what you could do if you wanted to define multiple alternate targets
// which could be used for something like drush @courses.sing100 sql-sync @prod.courses.sing100 --y
// this command could be used to sync something from production down to the current environment
// for testing / automated migration / QA scripts.
/*$denvironment = array(
  'qa' => array(
    'ssh' => '10.0.0.1',
    'user' => 'vagrant',
    'port' => '22',
    'uri' => 'elmsln.local',
  ),
  'prod' => array(
    'ssh' => '110.110.110.110',
    'user' => 'jenkins',
    'port' => '22',
    'uri' => 'prod.address.local',
  ),
);*/
if (empty($denvironment)) {
  $aliases = array();
}
else {
  // loop through found aliases and replicate them but with credentials applied
  foreach ($aliases as $alias => $aliasvals) {
    // loop through environments
    foreach ($denvironment as $env => $envvals) {
     	// add in the environments
     	if (!isset($aliasvals['ssh'])) {
        $aliasvals['ssh'] = $envvals['ssh'];
        $aliasvals['user'] = $envvals['user'];
        $aliasvals['port'] = $envvals['port'];
      }
      // replace the part of the uri address that matches what it was and puts in what it should be
      $aliasvals['uri'] = str_replace($elmslncfg['address'], $envvals['uri'], $aliasvals['uri']);
      $aliases[$env . '.' . $alias] = $aliasvals;
      unset($aliases[$alias]);
    }
  }
}
