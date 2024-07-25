<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function index(){
        return 'index';
    }

    public function tabela($t = 2){
        for ($x = 0; $x <= 10; $x++)
            echo $t . " x " . $x . " = " . ($t*$x) . "<br>";
    }

    public function salario($dias, $diaria){
        if ($dias < 0 || $diaria < 0)
            return ('Valores de dias/diaria nao podem ser negativos');
        else
            return ("O salario sera R$" . $dias*$diaria);
    }

    public function temperatura($valor, $tipo){
        if (strcasecmp($tipo, 'c') == 0)
        return ('Celsius para Fahrenheit: ' . ($valor * 9/5) + 32 . ' F');
    elseif (strcasecmp($tipo, 'f') == 0)
        return ('Fahrenhei para Celsius: ' . ($valor - 32) * 5/9 . ' C');
    }

    public function ifc(){
        return redirect ('https://riodosul.ifc.edu.br/');
    }

    public function fabtec(){
        return redirect ('http://fabricadetecnologias.ifc-riodosul.edu.br/');
    }

    public function fabrica(){
        return redirect()->route('fabtecController');
    }

    public function maior($num, $num2){
        if ($num > $num2){
            return "o maior número é " . $num;
        } else {
            return "o maior número é " . $num2;
        }
    }

    public function pesoIdeal($altura, $peso, $sexo){
        if ($altura < 0 || $peso < 0){
            return "Altura ou Peso incorreto.";
        }

        echo "Altura: " . $altura . ", Peso: " . $peso. ", Sexo: " . $sexo; 

        if (strcasecmp($sexo, 'M') == 0){
            $pesoIdeal = (72.7 * $altura) - 58;
        } else if (strcasecmp($sexo, 'F') == 0) {
            $pesoIdeal = (62.1 * $altura) - 44.7;
        }

        $pesoIdeal = round($pesoIdeal, 2);

        echo "<br><br> Peso Ideal: " . $pesoIdeal. "<br><br>";

        if ($peso > $pesoIdeal){
            return "Está acima do peso ideal";
        } else if ($peso < $pesoIdeal){
            return "Está abaixo do peso ideal";
        } else {
            return "Está no peso ideal";
        }
    }

    public function saque($valor){
        $valor = (int) $valor;

        if ($valor < 10 || $valor > 600) {
            return 'O valor do saque deve ser entre 10 e 600 reais.';
        }

        $notas = [100, 50, 10, 5, 1];
        $resultado = [];

        foreach ($notas as $nota) {
            $resultado[$nota] = intdiv($valor, $nota);
            $valor %= $nota;
            if ($resultado[$nota] != 0)
                echo $resultado[$nota] . " nota(s) de R$" . $nota . "<br><br>";
        }
    }

    public function fibonacci(){
        $fib = [0, 1];
        $i = 2;

        while (true) {
            $next = $fib[$i - 1] + $fib[$i - 2];
            if ($next > 2584) {
                break;
            }
            $fib[] = $next;
            $i++;
        }
        return ($fib);
    }

    public function operacoes($num){
        $soma = 0;
        for ($i = 1; $i <= $num; $i++){
            if ($i < $num)
                echo $i . ", ";
            else
                echo $i . ".";
            $soma += $i;
        }
        echo "<br><br>A soma dos números até " . $num . " é: " . $soma;
        return "<br><br>A média dos números até " . $num . " é: " . $soma/$num;
    }

    public function tabuada($valor){
        for ($i = 0; $i <= 10; $i++){
            echo "$valor x $i = " . $valor * $i . "<br>";
        }
    }

    public function route()
    {
        return 'route';
    }

    public function database()
    {
        return 'database';
    }

    public function laravel(){
        return 'laravel';
    }

    public function public(){
        return 'public';
    }

    public function php(){
        return 'php';
    }

    public function if(){
        return 'if';
    }

    public function for(){
        return 'for';
    }

    public function while(){
        return 'while';
    }
}
