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
		        	<a class="edit-modal modal-trigger" data-target="modal1" 
		        		data-id="{{$lists->id}}" data-title="{{$lists->titulo}}" data-description="{{$lists->texto}}">
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



  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      	<form id="form_modal">
			<div class="row">
				<div class="input-field col s12">
				  <input type="hidden" id="id" name="id" >
				</div>
			</div>
			 <div class="row">
				<div class="input-field col s12">
					<input id="titulo" type="text" name="titulo" >
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input id="texto" type="text" name="texto">
				</div>
			</div>
    </div>
		<div class="modal-footer">
			<a class="modal-close waves-effect waves-green btn-flat editar">Atualizar</a>
		</div>
		</form>
  </div>
</div>
</div>
@endsection

@section('script')
<script>
 	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	  $(document).ready(function(){	    
		$('.modal').modal();
		
		$(document).on('click', '.edit-modal', function() {
		 	$('#id').val($(this).data('id'));
			$('#titulo').val($(this).data('title'));
			$('#texto').val($(this).data('description'));					
	  	});

		$('.modal-footer').on('click', '.editar', function() {
				let id  = $("#id").val();
				$.ajax({
					type: "post",
					url: '/atualizar'+id ,
					data: $('#form_modal').serialize(),
					success: function(response){
						setInterval('location.reload()', 1000);
						console.log(response);
					}, 
					error: function(error){
						console.log(error);
					}
				});
			});
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
						
					}
					 $("#todo"+id).hide('fast');
				}

			});
		});
	});
</script>
@endsection