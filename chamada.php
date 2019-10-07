<?php
    include_once("Pessoas.php");

    $p = new Pessoas();
    $p->validaCPF("123.456.789.82");
    $p->calculaIMC(1.70, 83);
    $p->calculaIdade("24/04/1992");