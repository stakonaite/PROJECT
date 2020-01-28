<?php


namespace Core\Abstracts;


abstract class DataHolder
{
    protected $data;
    protected $properties;

    abstract protected function setData(array $data);

    abstract protected function getData();

}