@extends('app')

@section('content')
    <div class="results-show">
        <h2>Resultado da busca</h2>
        @if (count($searchResult) === 0)
            <p class="record-not-found">O CNPJ informado não foi encontrado na base do Sintegra.</p>
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
@stop