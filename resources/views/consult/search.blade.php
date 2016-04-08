@extends('app')

@section('content')
    <form action="/search" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="cnpj">CNPJ</label>
            <input type="text" class="form-control" name="cnpj" id="cnpj" placeholder="CNPJ">
        </div>
        <button type="submit" class="btn btn-default">Pesquisar</button>
    </form>

    @if ($searchResult !== null)
        <div class="results-show">
            <h2>Resultado da busca</h2>
            @if (count($searchResult) === 0)
                <p class="record-not-found">Nenhum resultado encontrado para o CNPJ informado.</p>
            @else
                @foreach ($searchResult as $key => $value)
                    @if ($key === 0 || $key % 2 === 0)
                        <p><strong>{{ $value }}</strong></p>
                    @else
                        <p>{{ $value }}</p>
                    @endif
                @endforeach
            @endif
        </div>
    @endif
@stop

@section('footer')
    <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
    <script src="js/jquery.maskedinput.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#cnpj").mask('99.999.999/9999-99');
        });
    </script>
@stop