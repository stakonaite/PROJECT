<?php

use App\Reviews\Model;

require '../../../bootloader.php';

$response = new \Core\Api\Response();

$review = new \App\Reviews\Review();

$models = [
    'user' => new \App\Users\Model(),
    'review' => new \App\Reviews\Model()
];

$conditions = $_POST ?? [];

$reviews = $models['review']->get($conditions);

if ($reviews !== false) {
    foreach ($reviews as $review) {

        $review_arr = $review->getData();
        $review_arr['date'] = timeAgo($review_arr['date']);

        $user = $models['user']->getById($review_arr['user_id']);
        $review_arr['full_name'] = $user->getName() . ' ' . $user->getSurname();

        unset($review_arr['user_id']);
        $response->addData($review_arr);
    }
} else {
    $response->addError('Could not pull data from database!');
}

$response->print();