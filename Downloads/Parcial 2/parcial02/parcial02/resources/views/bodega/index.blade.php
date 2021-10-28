@extends('layouts.app')

@section('content')
<div class="container">


        @if(Session::has('mensaje'))         
            <div class="alert alert-success alert alert-dismissible" role="alert">
                {{ Session::get('mensaje') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>              
        @endif    


        <a href="{{ url('/bodega/create') }}" class="btn btn-success" > Nueva Bodega</a>

    <table>
        <tr>
          <td align="center"><b>#</b></td>
          <td align="center"><b>Nombre Producto </b></td>
          <td align="center"><b>Codigo Producto </b></td>
          <td align="center"><b>Numero Cajas </b></td>
          <td align="center"><b>Precio </b></td>
          <td align="center"><b>Edad </b></td>
          <td align="center"><b>Acciones</b></td>
        </tr>           

        <tbody>
            @foreach($bodegas as $bodega)
                <tr>
                    <td align="center"> {{ $bodega->id }}</td>
                    <td align="center"> {{ $bodega->nombre_producto }}</td>
                    <td align="center"> {{ $bodega->codigo_producto }}</td>
                    <td align="center"> {{ $bodega->cantidad }}</td>
                    <td align="center"> {{ $bodega->precio }}</td>
                    <td align="center"> {{ $bodega->edad }}</td>
                    <td align="center"> 
                        <a href="{{ url('/bodega/'.$bodega->id.'/edit') }}" class="btn btn-warning">
                            Editar 
                        </a>
                        <form action ="{{ url('/bodega/'.$bodega->id) }}" class="d-inline" method="post">
                        	@csrf
                        	{{ method_field('DELETE') }}
            				<input class="btn btn-danger" type="submit" onclick="return confirm('Deseas borrar ?')"
            				 value="Borrar ">
            			</form>
            		</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$bodegas->links()}}
</div>
@endsection