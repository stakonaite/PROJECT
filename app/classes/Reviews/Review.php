<?php


namespace App\Reviews;


class Review
{
    private $data = [];

    public function __construct($data = null)
    {
        if ($data) {
            $this->setData($data);
        } else {
            $this->data = [
                'review' => null,
                'id' => null,
                'date' => null,
                'user_id' => null,
                'rate' => null,
            ];
        }
    }

    /**
     * * Sets all data from array
     * @param $array
     */
    public function setData($array)
    {
        if (isset($array['id'])) {
            $this->setId($array['id']);
        } else {
            $this->data['id'] = null;
        }

        $this->setReview($array['review'] ?? null);
        $this->setDate($array['date'] ?? null);
        $this->setUserId($array['user_id'] ?? null);
        $this->setRate($array['rate'] ?? null);
    }

    /**
     * Gets all data as array
     * @return array
     */
    public function getData()
    {
        return [
            'id' => $this->getId(),
            'review' => $this->getReview(),
            'date' => $this->getDate(),
            'user_id' => $this->getUserId(),
            'rate' => $this->getRate(),
        ];
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->data['id'] = $id;
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->data['id'];
    }

    /**
     * Sets name
     * @param string $name
     */
    public function setReview(string $review)
    {
        $this->data['review'] = $review;
    }

    /**
     * Returns name
     * @return string
     */
    public function getReview()
    {
        return $this->data['review'];
    }

    /**
     * Sets data surname
     * @param string $surname
     */
    public function setDate(int $date)
    {
        $this->data['date'] = $date;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->data['date'];
    }

    public function setUserId(int $id)
    {
        $this->data['user_id'] = $id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->data['user_id'];
    }

    /**
     * @param int $rate
     */
    public function setRate(int $rate)
    {
        $this->data['rate'] = $rate;
    }

    /**
     * @return mixed
     */

    public function getRate()
    {
        return $this->data['rate'];
    }
}

