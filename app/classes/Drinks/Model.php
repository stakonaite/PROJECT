<?php


namespace App\Drinks;

use App\App;

class Model
{
    private $file_db;
    private $table_name = 'DRINKS';

    public function __construct()
    {
        App::$file_db->createTable($this->table_name);
    }

    public function insert(Drink $drink)
    {
        //var_dump($drink->getData());
        return App::$file_db->insertRow($this->table_name, $drink->getData());
    }

    /**
     * grazina objektu masyva
     * @param $conditions
     * @return array
     */
    public function get($conditions)
    {
        $drinks_objects = [];
        $drinks_array = App::$file_db->getRowsWhere($this->table_name, $conditions);

        foreach ($drinks_array as $drink_id => $drink_array) {
            $drink = new Drink($drink_array);
            $drink->setId($drink_id);
            $drinks_objects[] = $drink;
        }
        return $drinks_objects;
    }

    public function getById($id)
    {
        $drink_data = App::$file_db->getRow($this->table_name, $id);
        $drink = new Drink($drink_data);
        $drink->setId($id);

        return $drink;
    }

    public function update(Drink $drink)
    {
        return App::$file_db->updateRow($this->table_name, $drink->getId(), $drink->getData());
    }

    public function delete(Drink $drink)
    {
        return App::$file_db->deleteRow($this->table_name, $drink->getId());
    }

}