<?php


namespace App\Users;


use App\App;

class Model
{
    private $file_db;
    private $table_name = 'USERS';

    public function __construct()
    {
        App::$file_db->createTable($this->table_name);
    }

    public function insert(User $user)
    {
        return App::$file_db->insertRow($this->table_name, $user->getData());
    }

    /**
     * grazina objektu masyva
     * @param $conditions
     * @return array
     */
    public function get($conditions)
    {
        $users_objects = [];
        $users_array = App::$file_db->getRowsWhere($this->table_name, $conditions);

        foreach ($users_array as $user_id => $user_array) {
            $user = new User($user_array);
            $user->setId($user_id);
            $users_objects[] = $user;
        }

        return $users_objects;
    }

    public function update(User $user)
    {
        return App::$file_db->updateRow($this->table_name, $user->getId(), $user->getData());
    }

    public function delete(User $user)
    {
        return App::$file_db->deleteRow($this->table_name, $user->getId());
    }
}