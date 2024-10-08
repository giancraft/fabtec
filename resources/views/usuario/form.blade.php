
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" class="form-control" required
        value="@if(isset($item->nome)){{ $item->nome }}@endif">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" class="form-control" required
        value="@if(isset($item->email)){{ $item->email }}@endif">
    </div>
    <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" class="form-control" required
        value="@if(isset($item->senha)){{ $item->senha }}@endif">
    </div>
    <div class="form-group">
        <label for="dataNascimento">Data de Nascimento:</label>
        <input type="date" name="dataNascimento" id="dataNascimento" class="form-control" required
        value="@if(isset($item->dataNascimento)){{ \Carbon\Carbon::parse($item->dataNascimento)->format('Y-m-d') }}@endif">
    </div>
    <br>
    <div class="form-group">
        <label for="setor_id">Setor:</label>
        <select name="setor_id" id="setor_id" class="form-control">
            @foreach ($info as $item)
            <option value="{{$item->id}}" @if(isset($item->setor_id)){{ $item->setor_id == $setor->id ? 'selected' : '' }}@endif>
                {{$item->descricao}}
            </option>
            @endforeach
        </select>
    </div>
    <br>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-dark" name="envia">Enviar</button>
    </div>