<?php

class koneksiMVC{
    public function __construct(){
        $this->mysqli=new mysqli('localhost', 'root', 'rahasia', 'mejatim');
    }

    public function getKoneksi(){
        return $this->mysqli;
    }
}
