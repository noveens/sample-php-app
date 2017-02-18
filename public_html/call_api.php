<?php

/*function CallAPI($url, $data = false)
{
    $curl = curl_init();

    $temp = array(
        "X-Mashape-Key" => "7SROpIgS0PmshmbUByUzGWU28ko6p1rbV8GjsnxxIQE1KEpMxU",
        "Content-Type" => "application/json",
        "Accept" => "application/json"
    );

    curl_setopt($curl, CURLOPT_POST, 1);

    if ($data) {
        //echo 'in = ' . $data . PHP_EOL;
        curl_setopt($curl, CURLOPT_HTTPHEADER, $temp);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }

    else {
        echo 'no data' . PHP_EOL;
    }

    $result = curl_exec($curl);
    echo 'out = ' . $result . PHP_EOL;

    curl_close($curl);


    //return $result;
}

CallAPI( 
    'https://cotomax-summarizer-text-v1.p.mashape.com/summarizer' , 
    "The United States Constitution is the supreme law of the United States of America. The Constitution, originally comprising seven articles, delineates the national frame of government. Its first three articles entrench the doctrine of the separation of powers, whereby the federal government is divided into three branches: the legislative, consisting of the bicameral Congress; the executive, consisting of the President; and the judicial, consisting of the Supreme Court and other federal courts. Articles Four, Five and Six entrench concepts of federalism, describing the rights and responsibilities of state governments and of the states in relationship to the federal government. Article Seven establishes the procedure subsequently used by the thirteen States to ratify it."
);*/

$url = 'https://cotomax-summarizer-text-v1.p.mashape.com/summarizer';
/*$data = array('key1' => 'value1', 'key2' => 'value2');
*/$data = array(
    "X-Mashape-Key" => "7SROpIgS0PmshmbUByUzGWU28ko6p1rbV8GjsnxxIQE1KEpMxU",
    "Content-Type" => "application/json",
    "Accept" => "application/json"
);

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'proxy'   => "http://proxy.iiit.ac.in",
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */ }

var_dump($result);

?>