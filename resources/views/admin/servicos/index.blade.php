@extends('layouts.admin')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}">Início</a></li>
        <li class="active">Lista de Serviços</li>
    </ol>
@endsection

@section('content')
    <div class="container">

        <div class="block-header">
            <h2 class="center">Lista de Serviços</h2>
            <ul class="actions">
                <li>
                    @can('usuario_adicionar')
                        <div class="row">
                            <a class="btn btn-primary" href="{{ route('admin.servicos.adicionar') }}">Adicionar</a>
                        </div>
                    @endcan
                </li>
            </ul>
        </div>

        <div class="table-responsive">
            <table id="data-table-basic" class="table table-striped">
                <thead>
                <tr>
                    <th>Título</th>
                    <th>Detalhes</th>
                    <th>Publicado</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->titulo }}</td>
                        <td>{!! $registro->detalhes !!}</td>
                        <td>{{ $registro->publicar }}</td>
                        <td>
                            <a class="btn btn-warning"
                               href="{{ route('admin.servicos.editar', $registro->id) }}">Editar</a>
                            <a class="btn btn-danger"
                               href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{ route('admin.servicos.deletar', $registro->id) }}'}">Deletar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection