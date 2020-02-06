<?php


namespace App\Party;


class Party
{
    private $data = [];

    public function __construct($data = null)
    {
        if ($data) {
            $this->setData($data);
        } else {
            $this->data = [
                'id' => null,
                'name' => null,
                'location' => null,
                'expectations' => null,
                'drunkLevel' => null,
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

        $this->setName($array['name'] ?? null);
        $this->setLocation($array['location'] ?? null);
        $this->setExpectations($array['expectations'] ?? null);
        $this->setDrunkLevel($array['drunkLevel'] ?? null);
    }

    /**
     * Gets all data as array
     * @return array
     */
    public function getData()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'location' => $this->getLocation(),
            'expectations' => $this->getExpectations(),
            'drunkLevel' => $this->getDrunkLevel(),
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
    public function setName(string $name)
    {
        $this->data['name'] = $name;
    }

    /**
     * Returns name
     * @return string
     */
    public function getName()
    {
        return $this->data['name'];
    }

    /**
     * Sets data surname
     * @param string $surname
     */
    public function setLocation(string $location)
    {
        $this->data['location'] = $location;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->data['location'];
    }

    /**
     * Sets data city
     * @param string $city
     */
    public function setExpectations(string $expectations)
    {
        $this->data['expectations'] = $expectations;
    }

    /**
     * @return mixed
     */
    public function getExpectations()
    {
        return $this->data['expectations'];
    }

    public function setDrunkLevel(string $drunkLevel)
    {
        $this->data['drunkLevel'] = $drunkLevel;
    }

    /**
     * @return mixed
     */
    public function getDrunkLevel()
    {
        return $this->data['drunkLevel'];
    }
}