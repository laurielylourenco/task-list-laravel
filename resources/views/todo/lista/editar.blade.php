@extends('layout.site')

@section('titulo','Editar')

@section('conteudo')
<div class="container">
<h3 class="center">Editar</h3>
</div>
	<div class="container">
		<div class="row center">
			<div class="col s12 ">
			    <form class="" method="post" action="{{route('todo.atualizar', $edit->id)}}">
					<div class="card black darken-1">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="put">
		        		@include('todo.lista.form')
		        		
			        	<div class="card-action">
			        	<button type="submit" class="btn deep-orange">Atualizar</button>
			        	</div>
					</div>
				</form>
			</div>
	</div>
</div>
@endsection
