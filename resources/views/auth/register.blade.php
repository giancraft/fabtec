<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="d-flex justify-content-center mt-5">
        <form action="{{ url('register') }}" method="POST">
            @csrf
            <fieldset>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label for="password">Senha:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="dataNascimento">Data de Nascimento:</label>
                    <input type="date" name="dataNascimento" id="dataNascimento" class="form-control" value="{{ old('dataNascimento') }}" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="setor_id">Setor:</label>
                    <select name="setor_id" id="setor_id" class="form-control" required>
                        @foreach ($info as $item)
                        <option value="{{ $item->id }}" {{ old('setor_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->descricao }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-dark" name="envia">Cadastrar</button>
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <a href="{{ url('login') }}">Login aqui</a>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>
