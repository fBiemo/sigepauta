		$(document).ready(function(){
			load(1);
        });

		function load(page){

            var q= $("#q").val();

            $("#loader").fadeIn('slow');
            $.ajax({
                url:'buscar_relatorio.php?action=ajax&page='+page+'&q='+q,
                beforeSend: function(objeto){
                    $('#loader').html('<img src="../fragments/img/ajax-loader.gif"> Carregando...');
                },
                success:function(data){
                    $(".outer_div").html(data).fadeIn('slow');
                    $('#loader').html('');
                }
            })
        }

		function eliminar (id) {
            var q= $("#q").val();

		if (confirm("Realmente desejas eliminar este professor")){
		$.ajax({
        type: "GET",
        url: "buscar_professor.php",
        data: "id="+id,"q":q,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensagem: Carregando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		load(1);
		}
			});
		}
		}
		
		
		
		

