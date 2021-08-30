@extends('adminlte::page')

@section('title', 'Contratos')

@section('content_header')
</h1><section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Purchases</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                    <li class="breadcrumb-item active">Purchases</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@stop

@section('content')
    <div class="col-sm-13">

        <table class="table table-bordered table-striped dataTable table-hover text-center" id="example">

            <thead class="thead-light">
            <tr>
                <th id="num">#</th>
                <th id="id">id</th>
                <th id="op">Operario</th>
                <th id="cli">Cliente</th>
                <th id="titu">Titulo de servicio</th>
                <th id="conf-cli">Confirmado por cliente</th>
                <th id="conf-op">Confirmado por operario</th>
                <th id="pago">Pago</th>
                <th id="esta">Estado</th>
                <th id="cali">Calificación</th>
            </tr>

            </thead>

            <tbody>
            @foreach($purchases as $purchase)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$purchase->id}}</td>
                    <td>{{$purchase->service->user->profile->firstname . " " . $purchase->service->user->profile->lastname}}</td>
                    <td>{{$purchase->user->profile->firstname . " " . $purchase->user->profile->lastname}}</td>
                    <td>{{$purchase->service->title}}</td>
                    @if ($purchase->customer_confirmation)
                        <td>Confirmado</td>
                    @else
                        <td>Pendiente</td>
                    @endif
                    @if ($purchase->seller_confirmation)
                        <td>Confirmado</td>
                    @else
                        <td>Pendiente</td>
                    @endif
                    @if ($purchase->paymented)
                        <td>Realizado</td>
                    @else
                        <td>Pendiente</td>
                    @endif
                    @if ($purchase->status)
                        <td>Finalizado</td>
                    @else
                        <td>Pendiente</td>
                    @endif
                    <td>{{$purchase->rating->type_rating->tier}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
@stop

@section('js')
    <script>
        $(document).ready( function () {
            $('#example').DataTable();
        } );
    </script>
@stop
