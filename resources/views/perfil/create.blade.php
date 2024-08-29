<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>

    <h1 class="display-5">Cadastro</h1>

    @include('perfil.menu')
    <br>

    <div class="d-flex justify-content-center">
        <form action="{{ route('perfil.store') }}" method="POST">
            @csrf
            <fieldset>
                <div class="form-group">
                    <label for="descricao">Descricao:</label>
                    <input type="text" name="descricao" id="descricao" class="form-control" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="usuario_id">Usuario:</label>
                    <select name="usuario_id" id="usuario_id">
                        @foreach ($info as $item)
                        <option value="{{$item->id}}">{{$item->nome}}</option>
                        @endforeach
                    </select>
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