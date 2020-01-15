<?php


namespace App\Drinks;

class Model
{
    private $file_db;
    private $table_name = 'DRINKS';

    public function __construct()
    {
        $this->file_db = new \Core\FileDB(DB_FILE);
        $this->file_db->createTable($this->table_name);
    }

    public function insert(Drink $drink)
    {
        //var_dump($drink->getData());
        return $this->file_db->insertRow($this->table_name, $drink->getData());
    }

    /**
     * grazina objektu masyva
     * @param $conditions
     * @return array
     */
    public function get($conditions)
    {
        $drinks_objects = [];
        $drinks_array = $this->file_db->getRowsWhere($this->table_name, $conditions);

        foreach ($drinks_array as $drink_id => $drink_array) {
            $drink = new Drink($drink_array);
            $drink->setId($drink_id);
            $drinks_objects[] = $drink;
        }
        return $drinks_objects;
    }

    public function update(Drink $drink)
    {
        return $this->file_db->updateRow($this->table_name, $drink->getId(), $drink->getData());
    }

    public function delete(Drink $drink)
    {
        return $this->file_db->deleteRow($this->table_name, $drink->getId());
    }

}