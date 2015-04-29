<?php
// Bucket Name
$bucket="imageshsn";
if (!class_exists('S3'))require_once('S3.php');
			
//AWS access info
if (!defined('awsAccessKey')) define('awsAccessKey', 'AKIAIII7XQT7DA5APJEA');
if (!defined('awsSecretKey')) define('awsSecretKey', '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');
			
//instantiate the class
$s3 = new S3(awsAccessKey, awsSecretKey);

// $s3->putBucket($bucket, S3::ACL_PUBLIC_READ);

?>