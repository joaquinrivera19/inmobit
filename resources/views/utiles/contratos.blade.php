@extends('layouts.app')

@section('content')

    <section class="list-category">
        <div class="container">
            <br><br><h2 class="admin-title">Contratos</h2><br>
            <ul class="row">
                <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <a href="#">
                        <div class="ch-item">
                            <div class="ch-info-wrap">
                                <div class="ch-info">
                                    <div class="ch-info-front">
                                        <img src="{{ asset('images/icons/category-aridos.png') }}"/>
                                    </div>
                                    <div class="ch-info-back">
                                        <img src="{{ asset('images/icons/category-aridos.png') }}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>Compraventa</p>
                    </a>
                </li>
                <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <a href="#">
                        <div class="ch-item">
                            <div class="ch-info-wrap">
                                <div class="ch-info">
                                    <div class="ch-info-front">
                                        <img src="{{ asset('images/icons/category-viales.png') }}"/>
                                    </div>
                                    <div class="ch-info-back">
                                        <img src="{{ asset('images/icons/category-viales.png') }}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>Escritos judiciales</p>
                    </a>
                </li>
                <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <a href="#">
                        <div class="ch-item">
                            <div class="ch-info-wrap">
                                <div class="ch-info">
                                    <div class="ch-info-front">
                                        <img src="{{ asset('images/icons/category-climatizacion.png') }}"/>
                                    </div>
                                    <div class="ch-info-back">
                                        <img src="{{ asset('images/icons/category-climatizacion.png') }}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>Fondos de comercio</p>
                    </a>
                </li>
                <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <a href="#">
                        <div class="ch-item">
                            <div class="ch-info-wrap">
                                <div class="ch-info">
                                    <div class="ch-info-front">
                                        <img src="{{ asset('images/icons/category-contenedores.png') }}"/>
                                    </div>
                                    <div class="ch-info-back">
                                        <img src="{{ asset('images/icons/category-contenedores.png') }}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>Locaciones</p>
                    </a>
                </li>
            </ul>
        </div>
    </section>


@endsection

@section('scripts')

@endsection