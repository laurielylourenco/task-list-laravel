@extends('layout.site')

@section('titulo','Home')

@section('conteudo')
<div class="container">
<h3 class="center">O que voce planeja ?</h3>
</div>
<div id="messageRemove" class="messageBox"></div>

<div class="container " id="myDiv">
	<div class="row center">
		<div class="col s12  ">
		    <form class="" name="formCad">
		    {{ csrf_field() }}
				<div class="card black darken-1">		
	        		@include('todo.lista.form')
		        	<div class="card-action">
		        	<button type="submit" class="btn deep-orange">Adicionar</button>
		        	</div>
				</div>
			</form>
		</div>
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
		$('form[name="formCad"]').submit(function(event){
			event.preventDefault();
			$.ajax({
				url: "{{route('todo.salvar')}}",
				type: "post",
				data: $(this).serialize(),
				dataType: 'json',
				success: function(response)
				{
					console.log(response.message);
					$('.messageBox').html(response.message);
					$("#teste1").val('');
					$("#teste2").val('');
					setInterval('location.reload()', 1000);
				}
			});
			
		});
	});
@endsection