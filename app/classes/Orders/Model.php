<?php


namespace App\Orders;


use App\App;
use App\Drinks\Drink;

class Model
{
    private $file_db;
    private $table_name = 'ORDERS';

    public function __construct()
    {
        App::$file_db->createTable($this->table_name);
    }

    public function insert(Order $order)
    {
        //var_dump($order->getData());
        return App::$file_db->insertRow($this->table_name, $order->getData());
    }

    /**
     * grazina objektu masyva
     * @param $conditions
     * @return array
     */
    public function get($conditions)
    {
        $orders_objects = [];
        $orders_array = App::$file_db->getRowsWhere($this->table_name, $conditions);

        foreach ($orders_array as $order_id => $order_array) {
            $order = new Order($order_array);
            $order->setId($order_id);
            $orders_objects[] = $order;
        }
        return $orders_objects;
    }

    public function update(Order $order)
    {
        return App::$file_db->updateRow($this->table_name, $order->getId(), $order->getData());
    }

    public function delete(Order $order)
    {
        return App::$file_db->deleteRow($this->table_name, $order->getId());
    }

    public function getById($id)
    {
        $order_data = App::$file_db->getRow($this->table_name, $id);
        $order = new Order($order_data);
        $order->setId($id);

        return $order;
    }
}