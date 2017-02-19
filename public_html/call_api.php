<?php

include '../resources/config.php';

function CallAPI($url, $data = false)
{

    $temp = array(
        "X-Mashape-Key: 7SROpIgS0PmshmbUByUzGWU28ko6p1rbV8GjsnxxIQE1KEpMxU",
        "Content-Type: application/json",
        "Accept: application/json"
    );

    $temp2 = array(
      "Percent"=> "30",
      "Language"=> "en",
      "Text"=> $data
    );

    $service_url = $url;
    $curl = curl_init($service_url);
    $curl_post_data = $temp;
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $curl_post_data);
    curl_setopt($curl, CURLOPT_PROXY, $_SESSION['conf']['proxy']); //your proxy url
    curl_setopt($curl, CURLOPT_PROXYPORT, $_SESSION['conf']['proxy_port']); // your proxy port number
    
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($temp2));
    $curl_response = curl_exec($curl);
    if ($curl_response === false) {
        $info = curl_getinfo($curl);
        curl_close($curl);
        die('error occured during curl exec. Additioanl info: ' . var_export($info));
    }
    curl_close($curl);
    $decoded = json_decode($curl_response);
    if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
        die('error occured: ' . $decoded->response->errormessage);
    }
    //echo 'response ok!';
    //echo PHP_EOL . $curl_response . PHP_EOL . PHP_EOL;
    //var_export($decoded->response);
    return json_decode($curl_response);
}

/*CallAPI( 
    'https://cotomax-summarizer-text-v1.p.mashape.com/summarizer' , 
    "The United States Constitution is the supreme law of the United States of America. The Constitution, originally comprising seven articles, delineates the national frame of government. Its first three articles entrench the doctrine of the separation of powers, whereby the federal government is divided into three branches: the legislative, consisting of the bicameral Congress; the executive, consisting of the President; and the judicial, consisting of the Supreme Court and other federal courts. Articles Four, Five and Six entrench concepts of federalism, describing the rights and responsibilities of state governments and of the states in relationship to the federal government. Article Seven establishes the procedure subsequently used by the thirteen States to ratify it."
);*/

?>