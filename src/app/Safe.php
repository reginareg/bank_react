<?php

namespace Bankas;
use App\DB\DataBase;

class Safe implements DataBase{

    public $data;
    private static $file;

    public static function get()
    {
        return self::$file ?? new self;
    }
    public function __construct()
   {
        if (!file_exists(__DIR__.'/../data/users.json')) {
        file_put_contents(__DIR__.'/../data/users.json', json_encode([]));
        }
        $this->data = json_decode(file_get_contents(__DIR__.'/../data/users.json'), 1);
       
    }
    public function __destruct()
    {
        file_put_contents(__DIR__.'/../data/users.json', json_encode($this->data));
    }

    public static function clientId()
    {
        if (!file_exists(__DIR__ . '/../data/client.json')) {
        file_put_contents(__DIR__ . '/../data/users.json', json_encode(['id' => 1]));
        }
        $uniqClientId = json_decode(file_get_contents(__DIR__ . '/../data/users.json'), 1);
        $uniqClientId['id']++;
        file_put_contents(__DIR__ . '/../data/users.json', json_encode($uniqClientId));
        return $uniqClientId['id'];
    }
    public function create(array $data) : void {
        $this->data[] = $data;
    }
    public function showAll() : array {
        usort($this->data, function($a, $b){return $a['surname'] <=> $b['surname'];});
        return $this->data;
    }

    public function show(int $usersId) : array
    {
        foreach ($this->data as $users) {
            if ($users['client'] == $usersId) {
                return $users;
            }
        }
        return [];
    }
    public function delete(int $id) : void {
        foreach($this->data as $key => $data) {
            if ($data['client'] == $id) {
                unset($this->data[$key]);
                break;
            }
        }
    }
    function update(int $id, array $data) : void {
        foreach($this->data as $key => $value) {
            if ($value['client'] == $id) {
                $this->data[$key] = $data;
                break;
            }
        }
    }
    
}