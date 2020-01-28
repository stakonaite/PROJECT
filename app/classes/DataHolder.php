<?php


namespace App;


class DataHolder extends \Core\Abstracts\DataHolder
{

    public function setData(array $data)
    {
        foreach ($this->properties as $property) {
            if (isset($data[$property])) {
                $value = $data[$property];
                $setter = str_replace('_', '', 'set' . $property);
                $this->{$setter}($value);
            }
        }
    }

    public function getData()
    {
        $data = [];
        foreach ($this->properties as $property) {
            $getter = str_replace('_', '', 'get' . $property);
            $data[$property] = $this->{$getter}();
        }
        return $data;
    }

    /**
     * si f-cija grazina masyva, visus getterius (get name, get amount..)
     * @return array
     */
    public function __construct(array $data = null)
    {
        if ($data) {
            $this->setData($data);
        }
    }

    public function setId(int $id)
    {
        $this->data['id'] = $id;
    }

    public function getId()
    {
        return $this->data['id'] ?? null;
    }
}