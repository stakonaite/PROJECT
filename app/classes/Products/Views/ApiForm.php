<?php


namespace App\Products\Views;


class ApiForm extends \Core\Views\Form
{
    public function __construct($data = [])
    {
        $this->data = [
            'fields' => [
                'name' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ]
                    ]
                ],
                'img' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ]
                    ]
                ],
                'price' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_is_number',
                        ]
                    ]
                ],
                'in_stock' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_is_number',
                        ]
                    ]
                ],
                'discount' => [
                    'extra' => [
                        'validators' => [
                        ]
                    ]
                ],
            ],
            'callbacks' => [
                'success' => 'form_success',
                'fail' => 'form_fail',
            ]
        ];
    }
}