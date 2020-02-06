<?php

use \App\App;

require '../../../bootloader.php';

// Check user authorization
if (!App::$session->userLoggedIn()) {
    $response = new \Core\Api\Response();
    $response->addError('You are not authorized!');
    $response->print();
}

// Filter received data
$form = (new \App\Reviews\Views\ApiForm())->getData();
$filtered_input = get_form_input($form);
validate_form($filtered_input, $form);

/**
 * If request passes validation
 * this function is automatically
 * called
 *
 * @param type $filtered_input
 * @param type $form
 */
function form_success($filtered_input, &$form)
{
    $response = new \Core\Api\Response();
    $review = new \App\Reviews\Review();
    $models = [
        'review' => new \App\Reviews\Model(),
        'user' => new \App\Users\Model()
    ];


    $conditions = [
        'row_id' => intval($_POST['id'])
    ];

    //gauname areju su $drink objektais (siuo atveju viena objekta arejuje pagal paduota id
    $reviews = $models['review']->get($conditions);
    if (!$reviews) {
        $response->addError('Participant doesn`t exist!');
    } else {
        $review = $reviews[0];

        //idedame i data holderi naujas vertes, kurias ivede useris
        //ir kurios atejo is javascripto
        $review->setReview($filtered_input['review']);
        $review->setRate($filtered_input['rate']);

        //vertes, kurias idejome auksciau i data holderi updatinam
        //ir duombazeje FileDB ka daro $drinksModel->update($drink) metodas
        $models['review']->update($review);

        // Irasom visa dalyvio informacija i response

        $review_arr = $review->getData();
        $review_arr['date'] = timeAgo($review_arr['date']);

        $user = $models['user']->getById($review_arr['user_id']);
        $review_arr['full_name'] = $user->getName() . ' ' . $user->getSurname();

        unset($review_arr['user_id']);
        $response->setData($review_arr);
    }
    $response->print();
}

/**
 * If request fails validation
 * this function is automatically
 * called
 *
 * @param type $filtered_input
 * @param type $form
 */
function form_fail($filtered_input, &$form)
{
    $response = new \Core\Api\Response();

    foreach ($form['fields'] as $field_id => $field) {
        if (isset($field['error'])) {
            $response->addError($field['error'], $field_id);
        }
    }
    $response->print();
}