<?php
class MainModel
{
    protected $db;

    public function __construct()
    {
        $this->db = App_Database::getInstance()->getConnection();
    }
}