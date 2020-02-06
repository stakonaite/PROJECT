<?php


namespace App\Party\Views;


class BaseForm extends \Core\Views\Form
{
    public function __construct($data = [])
    {
        $this->data = [
            'fields' => [
                'name' => [
                    'label' => 'Participant',
                    'type' => 'text',
                ],
                'location' => [
                    'label' => 'Location',
                    'type' => 'text',
                ],
                'expectations' => [
                    'label' => 'Expectations',
                    'type' => 'text',
                ],
                'drunkLevel' => [
                    'label' => 'Forecasted drunk level',
                    'type' => 'text',
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Submit',
                ],
            ]
        ];
    }
}
