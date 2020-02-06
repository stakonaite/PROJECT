<?php


use App\App;

require '../../../bootloader.php';

$response = new \Core\Api\Response();

if (App::$session->userLoggedIn()) {

    $model = new \App\Party\Model();

    // fetch-as atsiunčia į šitą failą POST metodu duomenis (REQUEST)
    // tie duomenys tai yra formData
    //
    // Į formData buvom įtraukę drink'o id. Vadinasi POST'e indeksu id rasim
    // to drink'o id verte.
    //
    // Zinodami koks drinko eilutes id, galime su model'iu issitraukti
    // ta drinka. Bet get funkcija atiduoda ne "iskart" ta drinka
    // bet visada ideda ji i masyva. (nes funkcija pritaikyta atiduoti ir daugiau drinku
    // nei viena)
    // Todel pavadinam variabla ne drink, o drinks.
    $partyVibes = $model->get(['row_id' => intval($_POST['id'])]);

    if ($partyVibes) {
        $partyVibe = $partyVibes[0];
        $model->delete($partyVibe);

        $response->setData($partyVibe->getData());
    } else {
        $response->addError('Participant doesn`t exist');
    }
} else {
    $response->addError('Authorization failed!');
}

$response->print();
