<?php
use ai\advance\ApiClientFile;
include_once 'CurlClient.php';


$blackList = array(
    'idNumber' => '1371105402630002',
    'name' => 'WIRDANANI',
    'phoneNumber' => array(
        'countryCode' => '+62',
        'areaCode' => '',
        'number' => '0751461090'
    )
);


$idImage = array(
    'idHoldingImage' => "/Users/kaijia.weiadvance.ai/php-learn/id-hold.jpg"
);




$api_host = 'https://api.advance.ai';
$idcheck_name = '/advance_api/openapi/face-recognition/v3/id-check';
$ocr = '/advance_api/openapi/face-recognition/v1/ocr-ktp-check';
$access_key = '';
$secret_key = '';

/**
 * NOTE 请求如果没有任何响应，请查看client->requestError，如果提示SSL certificate : unable to get local issuer certificate,
 * 是本地https证书安装的有问题，请参考如下网站解决：
 * https://stackoverflow.com/questions/24611640/curl-60-ssl-certificate-unable-to-get-local-issuer-certificate
 */

$client = new ai\advance\CurlClient($api_host, $access_key, $secret_key);

//json形式
//$result = $client->request($black, $blackList,null);
//echo $result;

//ocr
$ocrImage = array(
    'ocrImage' => "http://test-cdn.minirupiah.com/images/b/fcd4c24f66344c255242004c67295048.jpeg"
);
$result = $client->request($ocr, null, $ocrImage);
echo $result . "\n";


//face comparision, 
//流式调用，可以传递流
$face_comparision = "/advance_api/openapi/face-recognition/v2/check";
$face_comparision_image = array(
    'firstImage' => new ApiClientFile('first-image.jpg', file_get_contents("first-image.jpg")),
    "secondImage" => new ApiClientFile('second-image.jpg', file_get_contents("second-image.jpg"))
);

$result = $client->request($face_comparision, null, $face_comparision_image);
echo $result;

//$result = $client->request($face_comparision, null, $face_comparision_image);
//echo $result;



