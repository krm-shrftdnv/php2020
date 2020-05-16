<?php

session_name("my_session");
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $string = $_REQUEST['string'];
    $_SESSION['string'] = $string;
    $params = [];
    $params['string'] = $string;
    $url = "http://127.0.0.1:8082";

    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'content' => http_build_query($params)
        )
    );

    echo file_get_contents($url, false, stream_context_create($options));

} else {
    if (empty($_SESSION['string'])) {
        include "../2/form2.html";
    } else {
        $string = $_SESSION['string'];
        echo "
            <form action=\"index.php\" method=\"post\">
                Enter your string: <textarea name=\"string\">$string</textarea><br/>
                <input type=\"submit\" value=\"Press the button to start magic!\">
            </form>
        ";
    }
}
