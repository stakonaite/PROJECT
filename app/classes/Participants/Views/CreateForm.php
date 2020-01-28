<?php

namespace App\Participants\Views;

class CreateForm extends BaseForm {

    public function __construct($data = []) {
        parent::__construct($data);
        
        $this->data['attr']['id'] = 'create-form';
        $this->data['buttons']['submit']['title'] = 'Sukurti';
    }

}
