<?php 

require_once realpath("vendor/autoload.php");
use Job_Portal\Job;
$portal = new Job();


$totalRegister = $portal->totalRegister();
echo "<h1>REGISTERED USERS ---> " . $totalRegister . "</h1>";

$totalJobs = $portal->totalJobs();
echo "<h1>TOTAL JOBS ---> " . $totalJobs . "</h1>";

$totalUserJobs = $portal->totalUserJobs();
echo "<h1>TOTAL USER JOBS ---> " . $totalUserJobs . "</h1>";

?>