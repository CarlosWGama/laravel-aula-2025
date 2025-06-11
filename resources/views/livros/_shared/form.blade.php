<!-- ISBN -->
<div class="form-group">
    <label for="campo-isbn">ISBN:</label>
    <input type="number" class="form-control" name="isbn" id="campo-isbn" value="{{old('isbn')}}">
</div>

<!-- TITULO -->
<div class="form-group">
    <label for="campo-titulo">Título:</label>
    <input type="text" class="form-control" name="titulo" id="campo-titulo" value="{{old('titulo')}}">
</div>
   
<!-- AUTOR -->
<div class="form-group">
    <label for="campo-email">Autor:</label>
    <input type="email" class="form-control" name="autor" id="campo-email" value="{{old('autor')}}">
</div>

<!-- CATEGORIA -->
<div class="form-group">
    <label for="campo-categoria">Categoria:</label>
    <select class="form-control" name="categoria" id="campo-categoria">
        <option value="1" @selected(old('categoria', 1) == 1)>Terror</option>
        <option value="2" @selected(old('categoria', 1) == 2)>Drama</option>
        <option value="3" @selected(old('categoria', 1) == 3)>Romance</option>
        <option value="4" @selected(old('categoria', 1) == 4)>Ficção Científica</option>
        <option value="5" @selected(old('categoria', 1) == 5)>Pintura</option>
    </select>
</div>
    
<!-- RESUMO -->
<div class="form-group">
    <label for="campo-resumo">RESUMO:</label>
    <textarea class="form-control" id="campo-resumo" name="resumo">{{old('resumo')}}</textarea>
</div>
    
<!-- CAPA -->
<div class="form-group">
    <label>Capa:</label>
    <input type="file" class="form-control" name="capa">
</div>
