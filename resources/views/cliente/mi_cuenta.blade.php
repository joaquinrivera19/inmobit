@extends('layouts.app')

@section('style')

@endsection

@section('content')

    <section class="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                    <!-- Estado de cuenta -->
                    <section class="account-info">
                        <h2 class="admin-title">Estado de cuenta</h2>
                        <div class="row-account bg-grey">
                            <div class="label-account">Próximo Vencimiento</div>
                            <div class="data-account"><b>20/10/2016</b></div>
                        </div>
                        <div class="row-account">
                            <div class="label-account">Monto a pagar en tu próxima factura</div>
                            <div class="data-account"><span class="text-orange">250</span> - <span class="text-red"><b>BONIFICADO</b></span></div>
                        </div>
                        <div class="row-account bg-grey">
                            <div class="label-account">Abono elegido</div>
                            <div class="data-account"><b>20/10/2016</b></div>
                        </div>
                    </section>
                    <section class="account-payment">
                        <h2 class="admin-title">Formas de pago</h2>
                        <div class="deb-module">
                            <div class="row">
                                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
                                    <h4 class="admin-subtitle">Débito automático - <b class="text-blue">SUGERIDO</b></h4>
                                    <p>Todos los meses se debita de su tarjeta de crédito asegurándote el acceso al sistema sin inconvenientes ni interrupciones.</p>
                                    <ul class="cards">
                                        <li><img src="{{ asset('images/cards/visa.svg') }}"/></li>
                                        <li><img src="{{ asset('images/cards/mastercard.svg') }}"/></li>
                                        <li><img src="{{ asset('images/cards/amex.svg') }}"/></li>
                                        <li><img src="{{ asset('images/cards/naranja.svg') }}"/></li>
                                        <li><img src="{{ asset('images/cards/nativa.svg') }}"/></li>
                                        <li><img src="{{ asset('images/cards/shopping.svg') }}"/></li>
                                        <li><img src="{{ asset('images/cards/cencosud.svg') }}"/></li>
                                        <li><img src="{{ asset('images/cards/cabal.svg') }}"/></li>
                                        <li><img src="{{ asset('images/cards/argencard.svg') }}"/></li>
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
                                    <button class="btn btn-orange btn-lg">Pagar</button>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="account-history">
                        <h2 class="admin-title">Historial de pago</h2>
                        <table class="table table-history table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Fecha de Pago</th>
                                <th>Monto</th>
                                <th>Período (desde-hasta)</th>
                                <th>Factura</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>12/12/2015</td>
                                <td>$250</td>
                                <td>1 al 30 de Septiembre</td>
                                <td><a href="#">Descargar</a></td>
                            </tr>
                            <tr>
                                <td>12/12/2015</td>
                                <td>$250</td>
                                <td>1 al 30 de Septiembre</td>
                                <td><a href="#">Descargar</a></td>
                            </tr>
                            <tr>
                                <td>12/12/2015</td>
                                <td>$250</td>
                                <td>1 al 30 de Septiembre</td>
                                <td><a href="#">Descargar</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </div>
    </section>

    @include('cliente.modal_create')

@endsection

@section('scripts')

    <script>
        $(document).ready(function () {
            $("#header").sticky({topSpacing: 0});
        });
    </script>

@endsection