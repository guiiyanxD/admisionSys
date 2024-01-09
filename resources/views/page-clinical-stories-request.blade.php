@extends('adminlte::page')

@section('title','Admission')

@section('content_header')
    <div class="row">
        <h1 class="text-black-50">Formulario para pedir historias clinicas</h1>
    </div>
@stop

@section('css')
    @livewireStyles
@stop

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-2">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            Hola
                        </h5>
                    </div>
                    <div class="card-body">
                        Cuerpo
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                @livewire('clinical-stories-request')
            </div>
            <div class="col-lg-2">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            Xhau
                        </h5>
                    </div>
                    <div class="card-body">
                        Cuerpo
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
    <livewire:scripts/>
@stop

@section('content_footer','Chau')
