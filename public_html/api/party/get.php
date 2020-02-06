<?php

use App\Participants\Model;

require '../../../bootloader.php';

$response = new \Core\Api\Response();

$model = new App\Party\Model();

$conditions = $_POST ?? [];

$partyVibes = $model->get($conditions);
if ($partyVibes !== false) {
    foreach ($partyVibes as $partyVibe) {
        $response->addData($partyVibe->getData());
    }
} else {
    $response->addError('Could not pull data from database!');
}

$response->print();