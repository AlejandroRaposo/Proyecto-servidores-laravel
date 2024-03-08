<h2>Añade una novela</h2>
<div class="container h-100 mt-5">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="col-10 col-md-8 col-lg-6">
      <h3>Añade una nueva novela</h3>
      <form action="{{ route('novelas.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="form-group">
          <label for="descripcion">Descripcion</label>
          <input type="text"  class="form-control" id="descripcion" name="descripcion" required>
        </div>

        <div class="form-group">
          <label for="categoria">Categoría</label>
          <input type="text"  class="form-control" id="categoria" name="categoria" required>
        </div>

        <input type="hidden" name="autores_autor_id" value=1 required>
        <input type="hidden" name="estado" id="estado" value=1 required>

        <div class="form-group">
          <label for="edad_minima">Edad mínima</label>
          <input type="number" class="form-control" id="edad_minima" name="edad_minima" value=18 required>
        </div>
        
        <br>
        <button type="submit" class="btn btn-primary">Crear novela</button>
      </form>
    </div>
  </div>
</div>