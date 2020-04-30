<div class="card-content white-text">
	<span class="input-field">
		<input type="text" id="teste1" name="titulo" 
		       value="{{isset($registro->titulo) ? $registro->titulo : ''}}">
	  	<label>Título</label>
  	</span>
	<p class="input-field">  
	    <input type="text" id="teste2" name="texto" 
	          value="{{isset($registro->texto) ? $registro->texto : ''}}">
	    <label>Assunto</label>
	</p> 
</div>

