<?php


namespace App\Products\Views;


class BaseForm extends \Core\Views\Form
{
    public function __construct($data = [])
    {
        $this->data = [
            'fields' => [
                'name' => [
                    'label' => 'Name',
                    'type' => 'text',
                ],
                'img' => [
                    'label' => 'Img',
                    'type' => 'text',
                ],
                'price' => [
                    'label' => 'Price',
                    'type' => 'number',
                ],
                'in_stock' => [
                    'label' => 'In stock',
                    'type' => 'number',
                ],
                'discount' => [
                    'label' => 'Discount',
                    'type' => 'number',
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Submit',
                ]
            ]
        ];
    }
}
