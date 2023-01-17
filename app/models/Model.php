<?php
namespace App\Models;


use Core\Core;

class Model
{
    protected $db = null;
    protected $pdo = null;
    protected $queryBuilder = null;
    
    public function __construct()
    {
        $core = Core::getInstance();
        $this->db = $core->getSystemObject('db');
        $this->queryBuilder = $core->getSystemObject('queryBuilder');
        $this->pdo = $this->db->getDbConnection();
    }
}