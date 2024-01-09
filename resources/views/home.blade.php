@extends('adminlte::page')

@section('title','Admission')

@section('content_header')
    <div class="row">
        <h1 class="text-black-50">home</h1>
    </div>
@stop

@section('css')
    @livewireStyles
@stop

@section('content')
    <div class="info-box bg-gradient-warning">
        <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">Events</span>
            <span class="info-box-number">41,410</span>
            <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
            </div>
            <span class="progress-description">
      70% Increase in 30 Days
    </span>
        </div>
    </div>
@stop

@section('js')
    <livewire:scripts/>
@stop


@section('content_footer','Chau')
