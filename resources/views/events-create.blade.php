@extends('adminlte::page')


@section('content_header')
    <h1 class="m-0 text-dark">Registarar Eventos</h1>
@stop

@section('content')
    {{-- With label, invalid feedback disabled and form group class --}}
<div class="row">
    <x-adminlte-input name="name" label="Nombre" placeholder="Ingrese Nombre"
        fgroup-class="col-md-2" disable-feedback/>

    <x-adminlte-input name="apellido" label="Apellido" placeholder="Ingrese Apellido"
        fgroup-class="col-md-2" disable-feedback/>
</div>
<div class="row">
{{-- With prepend slot, label and data-placeholder config --}}
<x-adminlte-select2 name="Tipo" label="Tipo" data-placeholder="Seleccione..." fgroup-class="col-md-4">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-info">
            <i class="fas fa-car-side"></i>
        </div>
    </x-slot>
    <option/>
    <option>Pera</option>
    <option>Banana</option>
    <option>Manzana</option>
    <option>Kiwi</option>
    <option>Tomate</option>
    <option>Peregil</option>
    <option>Oregano</option>
</x-adminlte-select2>

</div class='row'>
{{-- With Label --}}
@php
$config = ['format' => 'DD/MM/YYYY HH:mm'];
@endphp
<x-adminlte-input-date name="fecha" :config="$config" placeholder="fecha"
    label="Datetime" label-class="text-primary" fgroup-class="col-md-4">
    <x-slot name="appendSlot">
        <x-adminlte-button theme="outline-primary" icon="fas fa-lg fa-birthday-cake"
            title="Set to Birthday"/>
    </x-slot>
</x-adminlte-input-date>
</div>

<div class="card">
    <div class="card-body">
        {{-- Minimal example / fill data using the component slot --}}
        <x-adminlte-datatable id="table1" :heads="$head" striped head-theme='dark' with-buttons hoverable compressed>
            @foreach($event as $e)
                <tr>
                    <td>{{ $e->id}}</td>
                    <td>{{ $e->name}}</td>
                    <td >{{ $e->descripcion}}</td>
                    <td>{{ $e->status}}</td>
                   <td>{{ $e->Type}}</td>
                   <td>{{ $e->date}}</td>
                </tr>
            @endforeach
        </x-adminlte-datatable>

    </div>

</div>


@stop
