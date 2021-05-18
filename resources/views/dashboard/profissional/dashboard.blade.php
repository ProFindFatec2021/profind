@extends('dashboard.layouts.dashboard')


@section('titulo', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Pedidos</h5>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: block;">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-question"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Pedidos pendentes</span>
                                <span class="info-box-number">{{$totalPedidosPendentes}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Pedidos aceitos</span>
                                <span class="info-box-number">{{$totalPedidosAceitos}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-down"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Pedidos recusados</span>
                                <span class="info-box-number">{{$totalPedidosRecusados}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-cog"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total de Pedidos</span>
                                <span class="info-box-number">{{$totalPedidos}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer d-flex justify-content-end">
                <a href="{{route('dashboard.pedido.index')}}" class="text-info">
                    Ver todos os pedidos
                    <i class="fas fa-external-link-alt"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection