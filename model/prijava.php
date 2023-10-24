<?php

class Prijava
{
    public $id;
    public $katedra;
    public $predmet;
    public $sala;
    public $datum;

    public function __construct($id, $katedra, $predmet, $sala, $datum)
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
}
