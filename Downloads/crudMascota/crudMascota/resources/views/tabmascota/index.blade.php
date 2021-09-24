@extends('layouts.app')

@section('template_title')
    Tabmascota
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tabmascota') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tabmascotas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Raza</th>
										<th>Edad</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tabmascotas as $tabmascota)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $tabmascota->nombre }}</td>
											<td>{{ $tabmascota->raza }}</td>
											<td>{{ $tabmascota->edad }}</td>

                                            <td>
                                                <form action="{{ route('tabmascotas.destroy',$tabmascota->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tabmascotas.show',$tabmascota->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tabmascotas.edit',$tabmascota->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $tabmascotas->links() !!}
            </div>
        </div>
    </div>
@endsection
