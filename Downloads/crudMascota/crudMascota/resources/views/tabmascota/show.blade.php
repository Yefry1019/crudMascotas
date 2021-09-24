@extends('layouts.app')

@section('template_title')
    {{ $tabmascota->name ?? 'Show Tabmascota' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tabmascota</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tabmascotas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $tabmascota->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Raza:</strong>
                            {{ $tabmascota->raza }}
                        </div>
                        <div class="form-group">
                            <strong>Edad:</strong>
                            {{ $tabmascota->edad }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
