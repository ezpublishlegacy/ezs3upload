<?php
/**
 * File containing the ezs3rename.php cronjob.
 *
 * @copyright Copyright (C) 1999 - 2015 Brookins Consulting. All rights reserved.
 * @copyright Copyright (C) 2013 - 2015 Think Creative. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2 (or later)
 * @version 0.0.4
 * @package ezs3upload
 */

$parentNodeID = eZINI::instance( 's3.ini' )->variable( 'S3Settings', 'ParentNodeID' );
$minsAgo = eZINI::instance( 's3.ini' )->variable( 'S3Settings', 'MinsAgo' );

// General cronjob part options
$phpBin = '/usr/bin/php -d memory_limit=-1 ';
$generatorWorkerScript = 'extension/ezs3upload/bin/php/ezs3rename.php';
$options = '--force --parent-node=' . $parentNodeID . ' --min=' . $minsAgo;
$result = false;

// Run cronjob script command
passthru( "$phpBin ./$generatorWorkerScript $options;", $result );

// print_r( $result ); echo "\n";

?>