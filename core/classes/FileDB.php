<?php

namespace Core;

class FileDB
{

    private $file_name;
    private $data;

    public function __construct($file_name)
    {
        $this->file_name = $file_name;
        $this->load();
    }
//tikrinam ar toks failas yra (tokiu name), jei taip grazinam failo kontenta decodindami info(t.y. paverciam ji i masyva),
//jei tokio failo nera grazinam tuscia masyva
    public function load()
    {
        if (file_exists($this->file_name)) {
            $this->data = json_decode(file_get_contents($this->file_name), true);
        } else {
            $this->data = [];
        }
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * creates table (sukuria dta masyve tuscia masyva)
     * @param string $table_name
     * @return bool
     */
    public function createTable(string $table_name)
    {
        if (!$this->tableExists($table_name)) {
            $this->data[$table_name] = [];
            return true;
        }
        return false;
    }

    /**
     * check if table exists
     * @param string $table_name
     * @return bool
     */
    public function tableExists(string $table_name)
    {
        if (isset($this->data[$table_name])) {
            return true;
        }
        return false;
    }

    /**
     * Delete table/index
     * @param string $table_name
     * @return bool
     */
    public function dropTable(string $table_name)
    {
        if ($this->tableExists($table_name)) {
            unset($this->data[$table_name]);
            return true;
        }
        return false;
    }

    /**
     * Delete table/index content
     * @param string $table_name
     * @return bool
     */
    public function truncateTable(string $table_name)
    {
        if ($this->tableExists($table_name)) {
            $this->data[$table_name] = [];
            return true;
        }
        return false;
    }

    /**
     * Si f-ja i pasirinkta table, nauju arba nurodytu indeksu ideda row masyva
     * @param string $table_name
     * @param array $row
     * @param int|null $row_id
     * @return bool|int|mixed
     */
    public function insertRow(string $table_name, array $row, int $row_id = null)
    {
        if ($row_id) {
            if (!($this->rowExists($table_name, $row_id))) {
                $this->data[$table_name][$row_id] = $row;
                return $row_id;
            } else {
                return false;
            }
        } else {
            $this->data[$table_name][] = $row;
            //return array_key_last($this->data[$table_name]);
            return array_keys($this->data[$table_name])[count($this->data[$table_name]) - 1];
        }
    }

    /**
     * check if row exists in table
     * @param string $table_name
     * @param int $row_id
     * @return bool
     */
    public function rowExists(string $table_name, int $row_id)
    {
        if (isset($this->data[$table_name][$row_id])) {
            return true;
        }
        return false;
    }

    /**
     * updates row (to the same index/table)
     * @param string $table_name
     * @param int $row_id
     * @param array $row
     * @return bool
     */
    public function updateRow(string $table_name, int $row_id, array $row)
    {
        if ($this->rowExists($table_name, $row_id)) {
            $this->data[$table_name][$row_id] = $row;
            return true;
        }
        return false;
    }

    /**
     * Delete a row from the table
     * @param string $table_name
     * @param int $row_id
     * @return bool
     */
    public function deleteRow(string $table_name, int $row_id)
    {
        if ($this->rowExists($table_name, $row_id)) {
            unset($this->data[$table_name][$row_id]);
            return true;
        }
        return false;
    }

    /**
     * to pull out row data from the table
     * @param string $table_name
     * @param int $row_id
     * @return bool | int
     */
    public function getRow(string $table_name, int $row_id)
    {
        if ($this->rowExists($table_name, $row_id)) {
            return $this->data[$table_name][$row_id];
        }
        return false;
    }

    /**
     * pagal kazkokius conditionus surandame eilutes (returnina masyva is surastu eiluciu,
     * kuri modelyje (method get) mes  foreachinam ir nustatom id), dabar padarome kad i indexa detume
     * duomenis ne automatiniu indeksu o pagal musu masyva.
     * @param $table_name
     * @param $conditions
     * @return array
     */
    public function getRowsWhere($table_name, $conditions)
    {
        $results = [];
        foreach ($this->data[$table_name] as $rowid => $row) {
            $found = true;
            foreach ($conditions as $conditionkey => $conditionvalue) {
                $row_condition_value = $row[$conditionkey];
            //    var_dump($row_condition_value);
                if ($row_condition_value != $conditionvalue) {
                    $found = false;
                    break;
                    //$results[] = $row;
                }
            }
            if ($found == true) {
                $results[$rowid] = $row;
            }
        }
        return $results;
    }

    public function save()
    {
        $string = json_encode($this->data);
        $bytes_written = file_put_contents($this->file_name, $string);
        if (is_numeric($bytes_written)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * si funkcija issikviecia automatiskai pries susinaikinant objektui, 1.kai pazymime unset, 2. kai
     * irasom nauja objekta funkcijoje jis po visko issikviecia destruct ir susinaikina 3. kai baigiasi visas kodas
     */
    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        $this->save();
    }
}




