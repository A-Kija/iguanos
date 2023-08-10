<?php
namespace Donuts\DB;

use App\DB\DataBase;


class FileDB implements DataBase {

    // function create(array $userData) : void;
    // function update(int $userId, array $userData) : void;
    // function delete(int $userId) : void;
    // function show(int $userId) : array;
    // function showAll() : array;

    private $file, $data;

    public function __construct($filName)
    {
        $this->file =  ROOT . 'data/' . $filName . '.json';
        
        if (!file_exists($this->file)) {
            file_put_contents($this->file, json_encode([]));
        }

        $this->data = json_decode(file_get_contents($this->file), 1);
    }

    public function __destruct()
    {
        file_put_contents($this->file, json_encode($this->data));
    }

    public function create(array $data) : void
    {
        $id = rand(100000000, 999999999);
        $data['id'] = $id;
        $this->data[] = $data;
    }

    public function update(int $id, array $data) : void
    {
        foreach ($this->data as $key => $dataLine) {
            if ($dataLine['id'] == $id) {
                $this->data[$key] = $data;
                $this->data[$key]['id'] = $id;
                return;
            }
        }
    }

    public function delete(int $id) : void
    {
        foreach ($this->data as $key => $dataLine) {
            if ($dataLine['id'] == $id) {
                unset($this->data[$key]);
                return;
            }
        }

    }

    public function show(int $id) : array
    {
        foreach ($this->data as $dataLine) {
            if ($dataLine['id'] == $id) {
                return $dataLine;
            }
        }
    }

    public function showAll() : array
    {
        return $this->data;
    }



}