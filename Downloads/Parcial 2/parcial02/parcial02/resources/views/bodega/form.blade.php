<h1>{{ $modo }} Bodegas </h1>

@if(count($errors) > 0)
      <div class="alert alert-danger" role="alert">
            <ul>
                  @foreach($errors->all() as $error)
                        <li> {{ $error }} </li> 
                  @endforeach
            </ul>
      </div>
     
@endif

<div class="form-group">

      <label for="nombre"> Nombre del Producto : </label>
      <input type="text" class="form-control" 
            name="nombre_producto" 
            value="{{ isset($bodega->nombre_producto)?$bodega->nombre_producto:old('nombre_producto') }}"
            id="nombre_producto">
</div>

<div class="form-group">
      <label for="codigo"> Codigo del Producto : </label>
      <input type="text" class="form-control"  
            name="codigo_producto"
            value="{{ isset($bodega->codigo_producto)?$bodega->codigo_producto:old('codigo_producto') }}" 
            id="codigo_producto">
</div>

<div class="form-group">
      <label for="cantidad"> Numero  de Cajas : </label>
      <input type="text" class="form-control"  
            name="cantidad" 
            value="{{ isset($bodega->cantidad)?$bodega->cantidad:old('cantidad') }}"
            id="cantidad">
</div>

<div class="form-group">
      <label for="precio"> Precio de la Caja : </label>
      <input type="text"  class="form-control" 
             name="precio" 
             value="{{ isset($bodega->precio)?$bodega->precio:old('precio') }}"
             id="precio">
</div>

<div class="form-group">
      <label for="edad"> Edad de compra : </label>
      <input type="text"  class="form-control" 
             name="edad"  
             value="{{ isset($bodega->edad) ?$bodega->edad:old('edad')}}"
             id="edad">
</div>

<input type="submit" class="btn btn-success" value =" {{ $modo }} datos">

<a class="btn btn-primary" href="{{ url('/bodega/') }} ">
    Retornar
</a>