<?php
header('Content-Type: application/json');
ob_start();
$json = file_get_contents('php://input');
$request = json_decode($json, true);
$action = $request["result"]["action"];
$parameters = $request["result"]["parameters"];
include('sushi.php');
for ($i=0; $i <
foreach ($sushi[0] as $key => $value)
{

}
$output = new \stdClass();
$output["speech"] = $outputtext;
$output["displayText"] = $outputtext;
$output["source"] = "webhook";
ob_end_clean();
echo json_encode($output);
?>