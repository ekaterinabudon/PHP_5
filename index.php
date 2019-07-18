<?php
date_default_timezone_set('Europe/Moscow');

$createClass = new class {
    function __construct($format = 'j/m/y H:i') {
        $this -> format = $format;
    }
    function getData() {
        return date($this -> format);
    }
};

$date = $createClass -> getData();

if (isset($_GET['print']) && isset($_GET['public'])) {
  header('Access-Control-Allow-Origin: *');
    header('Content-Type: text/plain; charset=utf-8');
    header('Access-Control-Allow-Methods: GET, POST, DELETE');
    echo file_get_contents(basename(__FILE__));
} else if (isset($_GET['print'])) {
  header('Content-type: text/plain; charset=utf-8');
    echo file_get_contents(basename(__FILE__));
} else {
    echo "<h1>" . $createClass -> getData() . '</h1>';
}
?>
