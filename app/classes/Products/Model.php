<?php


namespace App\Products;

use App\App;

class Model
{
    private $table_name = 'products';

    public function __construct()
    {
        App::$db->createTable($this->table_name);
    }

    public function insert(Product $product)
    {
        return App::$db->insertRow($this->table_name, $product->getData());
    }

    /**
     * @param array $conditions
     * @return array
     */
    public function get($conditions = [])
    {
        $products = [];
        $rows = App::$db->getRowsWhere($this->table_name, $conditions);

        foreach ($rows as $row_id => $row_data) {
            $row_data['id'] = $row_id;
            $products[] = new product($row_data);
        }

        return $products;
    }

    /**
     * @return bool
     */
    public function update(Product $product)
    {
        return App::$db->updateRow($this->table_name, $product->getId(), $product->getData());
    }

    /**
     * deletes all participants from database
     * @return bool
     */
    public function delete(Product $product)
    {
        return App::$db->deleteRow($this->table_name, $product->getId());
    }

    public function __destruct()
    {
        App::$db->save();
    }
}