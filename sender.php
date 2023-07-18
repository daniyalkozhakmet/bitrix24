<?php
session_start();
function redirect_to($location = NULL)
{
    if ($location != NULL) {
        header("Location: {$location}");
        exit;
    }
}
$queryURL = "https://b24-v6ij8i.bitrix24.kz/rest/1/ptge23urrso05tv3/crm.lead.add.json";

$sPhone = htmlspecialchars($_POST["phone"]);
$sName = htmlspecialchars($_POST["name"]);
$sMessage = htmlspecialchars($_POST["message"]);
$sEmail = htmlspecialchars($_POST["email"]);


$queryData = http_build_query(array(
    "fields" => array(
        "NAME" => $sName,
        "MESSAGE" => $sMessage,
        "PHONE" => $sPhone,
        "EMAIL" => $sEmail,
    ),
    'params' => array("REGISTER_SONET_EVENT" => "Y")
));


$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_POST => 1,
    CURLOPT_HEADER => 0,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $queryURL,
    CURLOPT_POSTFIELDS => $queryData,
));
$result = curl_exec($curl);
curl_close($curl);
$result = json_decode($result, 1);



if (array_key_exists('error', $result)) {
    $_SESSION['error'] = "Could not send: " . $result['error_description'] . ' Try again!';
    redirect_to('index.php');
    // die("Could not send: " . $result['error_description'] . ' Trye again!');
} else {
    $_SESSION['message'] = 'Successfully send!';
    redirect_to('index.php');
}
