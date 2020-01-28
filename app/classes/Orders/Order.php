<?php


namespace App\Orders;


class Order extends \App\DataHolder
{
    protected
        $properties = ['id', 'drink_id', 'timestamp', 'status'];

    public
    function __construct(array $data = null)
    {
        if ($data) {
            $this->setData($data);
        }
    }

    public
    function setStatus($status)
    {
        $this->data['status'] = $status;
    }

    public
    function getStatus()
    {
        return $this->data['status'];
    }

    function setDrinkId(int $drinkId)
    {
        $this->data['drink_id'] = $drinkId;
    }

    function getDrinkId()
    {
        return $this->data['drink_id'];
    }

    function setTimestamp(int $timeStamp)
    {
        $this->data['timestamp'] = $timeStamp;
    }

    function getTimestamp()
    {
        return $this->data['timestamp'];
    }
}