
<?php

require_once('configs/main.php');
require_once("../vendor/autoload.php");


switch ($_GET['case'] ?? ''){
    case 'update-news':
        $headline = $_POST['headline'];
        $id = $_POST['id'];

        $SQL = "UPDATE news SET headline = :headline WHERE id = :id";

        \sae\app\db\DB::set($SQL, [':headline' => $headline, ':id' => $id]);

        echo json_encode(['status' => 200, 'success' => true]);
        break;
}