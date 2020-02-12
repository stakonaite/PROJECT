<?php


namespace App\Products;


class Product
{
    private $data = [];
    private $properties = [
        'id', 'img', 'price', 'name', 'in_stock', 'discount'
    ];

    public function __construct($data = null)
    {
        if ($data) {
            $this->setData($data);
        }
    }

    public function setData($data)
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
     * @param int $id
     */
    public
    function setId(int $id)
    {
        $this->data['id'] = $id;
    }

    /**
     * @return int|null
     */
    public
    function getId()
    {
        return $this->data['id'];
    }

    /**
     * @param string $img
     */
    public
    function setImg(string $img)
    {
        $this->data['img'] = $img;
    }

    /**
     * @return mixed|string
     */
    public
    function getImg()
    {
        return $this->data['img'] ?? 'https://via.placeholder.com/400x400.png';
    }

    /**
     * @param int $price
     */
    public
    function setPrice(int $price)
    {
        $this->data['price'] = $price;
    }

    /**
     * @return int|mixed
     */
    public
    function getPrice()
    {
        return $this->data['price'] ?? 0;
    }

    public
    function setName(string $name)
    {
        $this->data['name'] = $name;
    }

    /**
     * @return mixed|string
     */
    public
    function getName()
    {
        return $this->data['name'] ?? 'Nežinoma Prekė';
    }

    /**
     * @param int $in_stock
     */
    public
    function setInStock(int $in_stock)
    {
        if ($in_stock < 0) {
            $in_stock = 0;
        }

        $this->data['in_stock'] = $in_stock;
    }

    /**
     * @return mixed
     */
    public
    function getInStock()
    {
        return $this->data['in_stock'] ?? 0;
    }

    /**
     * @param int $discount
     */

    public
    function setDiscount(int $discount)
    {
        $this->data['discount'] = $discount;
    }

    /**
     * @return int|mixed
     */

    public
    function getDiscount()
    {
        return $this->data['discount'] ?? 0;
    }
}

