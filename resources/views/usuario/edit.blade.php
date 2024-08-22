<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <h1 class="display-5">Editar</h1>

    @include('usuario.menu')
    <br>

    <div class="d-flex justify-content-center">
        <form action="{{ route('usuario.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <fieldset>
                <fieldset>
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome" class="form-control" value="{{ $item->nome}}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" name="email" id="email" class="form-control" value="{{ $item->email}}" required>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" id="senha" class="form-control" value="{{ $item->senha}}" required>
                    </div>
                    <div class="form-group">
                        <label for="dataNascimento">Data de Nascimento:</label>
                        <input type="date" name="dataNascimento" id="dataNascimento" class="form-control" value="{{ \Carbon\Carbon::parse($item->dataNascimento)->format('Y-m-d') }}" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="setor_id">Setor:</label>
                        <select name="setor_id" id="setor_id">
                            @foreach ($info as $setor)
                            <?php if ($item->setor_id == $setor->id) { ?>
                            <option value="{{$setor->id}}">{{$setor->descricao}}</option>
                            @php } @endphp
                            @endforeach
                            @foreach ($info as $setor)
                            <?php if ($item->setor_id != $setor->id) { ?>
                            <option value="{{$setor->id}}">{{$setor->descricao}}</option>
                            @php } @endphp
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