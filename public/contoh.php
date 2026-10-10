<?php

class Mahasiswa
{
    public $nama;

    public $nim;

    public function __construct($nama, $nim)
    {
        $this->nama = $nama;
        $this->nim = $nim;
    }

    public function perkenalkan()
    {
        return 'Halo, saya '.$this->nama.' ('.$this->nim.')';
    }
}

$mhs1 = new Mahasiswa('Yulia', '23TRI001');
$mhs2 = new Mahasiswa('Beny', '23TRI002');

echo $mhs1->perkenalkan().'<br>';
echo $mhs2->perkenalkan();
