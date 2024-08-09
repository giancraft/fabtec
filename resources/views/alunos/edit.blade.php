<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <h1 class="display-5">Editar</h1>

    @include('teste.menu')
    <br>

    <div class="d-flex justify-content-center">
        <form action="{{ route('alunos.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <fieldset>
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form-control" value="{{ $item->nome}}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ $item->email}}" required>
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-dark" name="envia">Enviar</button>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>