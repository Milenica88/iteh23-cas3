<?php

class Prijava
{
    public $id;
    public $katedra;
    public $predmet;
    public $sala;
    public $datum;

    public function __construct($id=null, $katedra=null, $predmet=null, $sala=null, $datum=null)
    {
        $this->id = $id;
        $this->katedra = $katedra;
        $this->predmet = $predmet;
        $this->sala = $sala;
        $this->datum = $datum;
    }

    public static function getAll(mysqli $conn)
    {
        $query_str = "SELECT * FROM prijave";
        return $conn->query($query_str);
    }

    public static function getById($id, mysqli $conn){
        $query = "SELECT * FROM prijave WHERE id=$id";

        $myObj = array();
        if($msqlObj = $conn->query($query)){
            while($red = $msqlObj->fetch_array(1)){
                $myObj[]= $red;
            }
        }

        return $myObj;

    }

    public static function deleteById($id, mysqli $conn)
    {
        $query_str = "DELETE FROM prijave WHERE id=$id";
        return $conn->query($query_str);
    }

    public static function add(Prijava $prijava, mysqli $conn)
    {
        $query_str = "INSERT INTO prijave(predmet, katedra, sala, datum) VALUES ('$prijava->predmet', '$prijava->katedra', '$prijava->sala', '$prijava->datum')";
        return $conn->query($query_str);
    }
    
    public function update($id, mysqli $conn)
    {
        $query = "UPDATE prijave set predmet = $this->predmet,katedra = $this->katedra,sala = $this->sala,datum = $this->datum WHERE id=$id";
        return $conn->query($query);
    }
}
