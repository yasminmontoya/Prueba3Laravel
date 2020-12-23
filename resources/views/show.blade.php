@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                        <form method="POST" action="{{ route('home.show') }}">
                        @csrf
                            <div class="row">
                                <div class="col">
                                    <select class="custom-select" name="origin">
                                        <option selected>Origen</option>
                                        <option value="ADZ">San Andrés</option>
                                        <option value="BAQ">Barranquilla</option>
                                        <option value="BOG">Bogotá</option>
                                        <option value="CLO">Cali</option>
                                        <option value="CTG">Cartagena</option>
                                        <option value="MDE">Medellin</option>
                                        <option value="PEI">Pereira</option>
                                        <option value="SMR">Santa Marta</option>
                                    </select>
                                </div>
                                <div class="col">
                                <select class="custom-select" name="destination">
                                        <option selected>Destino</option>
                                        <option value="ADZ">San Andrés</option>
                                        <option value="BAQ">Barranquilla</option>
                                        <option value="BOG">Bogotá</option>
                                        <option value="CLO">Cali</option>
                                        <option value="CTG">Cartagena</option>
                                        <option value="MDE">Medellin</option>
                                        <option value="PEI">Pereira</option>
                                        <option value="SMR">Santa Marta</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="date" name="date" min="<?php echo date("Y-m-d");?>" value="" required="required" class="form-control">  
                                </div>
                            </div>
                            <div class="row justify-content-center mt-4">
                                <div class="col-3">
                                    <button type="submit" class="btn btn-primary btn-sm">Buscar Vuelos</button>
                                </div>
                            </div>
                        </form>
                        <div class="row mt-4">
                            <h3 class="mb-2">Disponibilidad de vuelos</h3>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Origen</th>
                                        <th scope="col">Destino</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>   
                                @foreach ($flights_array as $flight)         
                                    <tr>
                                        <td>{{ $flight['DepartureStation'] }}</td>
                                        <td>{{ $flight['ArrivalStation'] }}</td>
                                        <td>{{ $flight['DepartureDate'] }}</td>
                                        <td>
                                        <form action="" method="POST">
                                        <button type="submit" class="btn btn-link btn-sm">Continuar</button>
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection