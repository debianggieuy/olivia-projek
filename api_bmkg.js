$url = 'https://www.bmkg.go.id/'; 
$api_key = 'YOUR_API_KEY'; 

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $api_key
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

//response 
$data = json_decode($response, true);
