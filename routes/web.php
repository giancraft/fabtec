<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\TesteResController;
use App\Http\Controllers\AlunoController;

Route::get('/', function () {
    return ('gianluca');
});

Route::get('/teste', function () {
    return ('get');
});

Route::post('/teste', function () {
    return ('post');
});

Route::put('/teste', function () {
    return ('put');
});

Route::patch('/teste', function () {
    return ('patch');
});

Route::delete('/teste', function () {
    return ('delete');
});

/*Route::get('/teste', function () {
    return view('teste');
});

/*Route::get('/tab/{valor}', function ($valor) {
    for ($i = 0; $i <= 10; $i++){
        echo "$valor x $i = " . $valor * $i . "<br>";
    }
    #return ($valor);
});*/

Route::get('/tab/{t?}', function ($valor = 2) {
    for ($i = 0; $i <= 10; $i++){
        echo "$valor x $i = " . $valor * $i . "<br>";
    }
    #return ($valor);
});

Route::get('/parametro/{letra}/{numero}', function ($letra, $numero) {
    return ($letra.$numero);
})->where("letra", "[A-z]+")->where("numero","[0-9]+");

Route::get('/rota1', function () {
    return ('Rota 1');
});

Route::get('/novarota', function () {
    return redirect ('/rota1');
});

Route::get('/um', function () {
    return redirect()->route('dois');
})->name('um');

Route::get('/dois', function () {
    return redirect()->route('um');
})->name('dois');

# Questao 7 da lista 2
Route::get('/fibonacci', function () {
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
});

# Questao 8 da lista 2
Route::get('/salario/{dias}/{diaria}', function ($dias, $diaria) {
    if ($dias < 0 || $diaria < 0)
        return ('Valores de dias/diaria nao podem ser negativos');
    else
        return ("O salario sera R$" . $dias*$diaria);
});

# Questao 9 da lista 2
Route::get('/temperatura/{valor}/{tipo}', function ($valor, $tipo) {
    if (strcasecmp($tipo, 'c') == 0)
        return ('Celsius para Fahrenheit: ' . ($valor * 9/5) + 32 . ' F');
    elseif (strcasecmp($tipo, 'f') == 0)
        return ('Fahrenhei para Celsius: ' . ($valor - 32) * 5/9 . ' C');
})->where("tipo", "[C|F|c|f]");

# Questap 10 da lista 2
Route::get('/ifc', function () {
    return redirect ('https://riodosul.ifc.edu.br/');
});

# Questao 11 da lista 2
Route::get('/fabtec', function () {
    return redirect ('http://fabricadetecnologias.ifc-riodosul.edu.br/');
})->name('fabtec');

Route::get('/fabrica', function () {
    return redirect()->route('fabtec');
});

# Questao 13 da lista 2
Route::prefix('/laravel')->group(function () {
    Route::get('/', function () {
        echo 'laravel';
    });
    Route::get('/route', function () {
        echo 'route';
    });
    Route::get('/database', function () {
        echo 'database';
    });
});

Route::prefix('/php')->group(function () {
    Route::get('/', function () {
        echo 'php';
    });
    Route::get('/if', function () {
        echo 'if';
    });
    Route::get('/for', function () {
        echo 'for';
    });
    Route::get('/while', function () {
        echo 'while';
    });
});

Route::get('/controlador', [TesteController::class, 'index']);
Route::get('/tabnovo/{t?}', [TesteController::class, 'tabela']);
Route::get('/salarioController/{dias}/{diaria}', [TesteController::class, 'salario']);
Route::get('/temperaturaController/{valor}/{tipo}', [TesteController::class, 'temperatura'])->where("tipo", "[C|F|c|f]");
Route::get('/ifcController', [TesteController::class, 'ifc']);
Route::get('/fabtecController', [TesteController::class, 'fabtec'])->name('fabtecController');
Route::get('/fabricaController', [TesteController::class, 'fabrica']);
Route::prefix('/laravelController')->group( function() {
    Route::get('/', [TesteController::class, 'laravel']);
    Route::get('/route', [TesteController::class, 'route']);
    Route::get('/database', [TesteController::class, 'database']);
    Route::get('/public', [TesteController::class, 'public']);
});
Route::prefix('/phpController')->group(function () {
    Route::get('/', [TesteController::class, 'php']);
    Route::get('/if', [TesteController::class, 'if']);
    Route::get('/for', [TesteController::class, 'for']);
    Route::get('/while', [TesteController::class, 'while']);
});
Route::get('/maior/{num}/{num2}', [TesteController::class, 'maior']);
Route::get('/pesoIdeal/{altura}/{peso}/{sexo}', [TesteController::class, 'pesoIdeal']
)->where("sexo", "[M|F|m|f]");
Route::get('/saque/{valor}', [TesteController::class, 'saque']);
Route::get('/fibonacciController', [TesteController::class, 'fibonacci']);
Route::get('/operacoes/{num}', [TesteController::class, 'operacoes']);
Route::get('/tabuada/{valor}', [TesteController::class, 'tabuada']);

Route::resource('/aula4', TesteResController::class);
Route::resource('/alunos', AlunoController::class);