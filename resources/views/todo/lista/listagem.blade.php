@extends('layout.site')

@section('titulo','Home')

@section('conteudo')
<div class="container center">
	<div class="row">
		@foreach($list as $lists)
		<div class="col l4 m4 s9">
			<div id="todo{{ $lists->id }}" class="card black darken-1">
				<div class="card-content white-text">
					<h5>{{$lists->titulo}}</h5>
					<p>{{$lists->texto}}</p>
				</div>
	        	<div class="card-action">
		        	<a class="" href="{{route('todo.editar', $lists->id)}}">
		        		<i class="material-icons">create</i>
		        	</a>
		        	<a class="" data-id="{{ $lists->id }}" data-token="{{ csrf_token() }}" name="DelTarefa" type="submit">
		        		<i class="material-icons">delete_outline</i>
		        	</a>
	        	</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection

@section('script')

 	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	$(function(){
		$('a[name="DelTarefa"]').click(function(event){
			event.preventDefault();
			 var id = $(this).data("id");
			$.ajax({
				url:"/deletar/"+id,
				type: "get",
				data: $(this).serialize(),
				dataType: 'json',
				success: function(response)
				{
					if(response.success)
					{
						window.location.href = "{{route('todo.index')}}";
						console.log(response);
					}
					 $("#todo"+id).hide('fast');
				}

			});
		});
	});
@endsection