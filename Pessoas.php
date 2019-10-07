<!-- AEP 2 -->

<?php
    Class Pessoas{

        public $nome;
        public $data_nascimento;
        public $peso;
        public $altura;
        public $cpf;

        
        public function validaCPF($CPF)
        {
            $x = 10;
            $y = 0;
            $alg = 0;
            if(strlen($CPF) != 14)die("CPF INVALIDO");
            preg_match_all('/^[0-9]|[0-9]|[0-9]|\.|[0-9]|[0-9]|[0-9]|\.|[0-9]|[0-9]|[0-9]|-|[0-9]|[0-9]$/', $CPF, $array);
            
            while ($x >= 2){
                if (!is_numeric($array[0][$y])){
                    $y++;
                    continue;
                }else{
                    $alg += $array[0][$y] * $x;
                    $y++;
                    $x--;
                }
            }
        
            $alg = ($alg*10)%11;
            if ($alg == 10){$alg = 0;}
            if ( $alg != $array[0][++$y])die("CPF INVALIDO!");
            $x = 11;
            $y = 0;
        
            while ($x >= 2){
                if (!is_numeric($array[0][$y])){
                    $y++;
                    continue;
                }else{
                    $alg += $array[0][$y] * $x;
                    $y++;
                    $x--;
                }
            }
            $alg = ($alg*10)%11;
            if ($alg == 10){$alg = 0;}
            if ( $alg != $array[0][$y])die("CPF INVALIDO!");
            $this->CPF = $CPF;
            return "CPF validado.";
        }

        public function calculaIMC($altura, $peso)
        {
            if (!floatval($altura)){
                return 'a altura deve ser digitada no formato segundo exemplo: 1.75';
                die();
            }
            $imc = $peso / $altura ** 2;
            if ($imc < 16){
               return 'seu IMC é ' . number_format($imc, 1) . '<br>esta mt magro, corra para o Mcdonalds';
            } else if($imc == 16){
                return 'seu IMC é ' .  number_format($imc, 1) . '<br>magro.';
            }else if($imc >= 17 && $imc < 18.5){
                 return 'seu IMC é ' .  number_format($imc, 1) .  '<br>magreza leve, o que pode resultar em estresse, ansiedade e fadiga.';
            }else if($imc >= 18.5 && $imc < 25){
                 return 'seu IMC é ' .  number_format($imc, 1) .  '<br>considerado saudável, apresentando menor risco para doenças.';
            }else if($imc >= 25 && $imc < 30){
                  return 'seu IMC é ' .  number_format($imc, 1) .  '<br>sobrepeso, podendo levar à fadiga, varizes e má circulação.';
            }else if($imc >=30 && $imc < 35){
                  return 'seu IMC é ' .  number_format($imc, 1) .  '<br>obesidade de grau I, podendo resultar em diabetes, infarto, angina e aterosclerose.';
            }else if($imc >=35 && $imc < 40){
                  return 'seu IMC é ' .  number_format($imc, 1) .  '<br>obesidade de grau II (severa), podendo causar falta de ar e apneia do sono.';
            }else if($imc > 40){
                   return 'seu IMC é ' .  number_format($imc, 1) . '<br>obesidade de grau III (mórbida), podendo levar à refluxo, infartos, AVC, dificuldades de locomoção e escaras.';
            }
        }

        public function calculaIdade($d){
            $d = explode('/', $d);
            $d2 = date("Y");
            $anos = $d2 - $d[2];
            return $anos;
        }

    }