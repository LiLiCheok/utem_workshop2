<?php


if (isset($_POST["announcementTitle"]) && isset($_POST["announcementDescription"])) {

	$title = $_POST["announcementTitle"];
    $message = $_POST["announcementDescription"];
     
    include_once 'GCMPushMessage.php';
    include_once 'db_functions.php';
    include_once 'config.php';
     
    $gcm = new GCMPushMessage(GOOGLE_API_KEY);
    $db = new DB_Functions();

    $result = $db->getDevices();

    // Notre tableau de token des utilisateurs
    $registatoin_ids = array();

    while($row = $result->fetch_array())
    {
        array_push($registatoin_ids, $row['gcm_token']);
    }

    // listre des utilisateurs à notifier
    $gcm->setDevices($registatoin_ids);

    // Le titre de la notification
    $data['announcementTitle'] = $title;

    // On notifie nos utilisateurs
    $result = $gcm->send($message, $data);

    echo $result;
}

?>