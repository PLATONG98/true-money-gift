<?php
include_once __DIR__. '/../config.php';
class html{
    public function __construct(){
    }
    
    public function db(){
        try {
            $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DBNAME.";charset=utf8", DB_USER, DB_PASSWORD);
            return $conn;
        }catch (PDOException $e){
            echo "Cann't connection ".$e;
        }
    }

    public function query($s){
        $pdo = $this->db();
        $stmt= $pdo->prepare($s);
        $stmt->execute();
        return $stmt;
    }

    public function anime_head(){
        $sh = $this->query("SELECT * FROM `meta` WHERE `id` = 3 AND `key_id` = 1 AND `key_name` LIKE 'cdn'")->fetch();
        $head = json_decode($sh['key_value'], true);
        foreach ($head as $value) {
            
        }
    }

    public function anime_footer(){
        
    }

    public function info($b = 'title'){
        $df = $this->query("SELECT * FROM `meta` WHERE `id` = 2 AND `key_id` = 1 AND `key_name` LIKE 'html'")->fetch();
        $server = json_decode($df['key_value'], true);
        return $server[$b];
    }

}
$config['engine'] = new html();