<?php


namespace App\Party;


use App\App;

class Model
{
    private $table_name = 'party';

    public function __construct()
    {
        App::$db->createTable($this->table_name);
    }

    public function insert(Party $partyVibe)
    {
        return App::$db->insertRow($this->table_name, $partyVibe->getData());
    }

    /**
     * @param array $conditions
     * @return array
     */
    public function get($conditions = [])
    {
        $vibes = [];
        $rows = App::$db->getRowsWhere($this->table_name, $conditions);
        foreach ($rows as $row_id => $row_data) {
            $row_data['id'] = $row_id;
            $vibes[] = new Party($row_data);
        }

        return $vibes;
    }

    /**
     * @return bool
     */
    public function update(Party $partyVibe)
    {
        return App::$db->updateRow($this->table_name, $partyVibe->getId(), $partyVibe->getData());
    }

    /**
     * deletes all participants from database
     * @return bool
     */
    public function delete(Party $partyVibe)
    {
        return App::$db->deleteRow($this->table_name, $partyVibe->getId());
    }

    public function __destruct()
    {
        App::$db->save();
    }
}