$(document).ready(function () {
	$(".afiliacion").click(function (){
		$(".error").remove();		
		if($("#cedula").val().length < 6){
			$("#cedula").focus().after("<span class='error'> introduzca su cedula</span>");
			return false;
		}
		else if( $("#nombre").val().length < 3){
			$("#nombre").focus().after("<span class='error'>minimo 3 caracteres</span>");
			return false;
		}
		else if( $("#apellido").val().length < 3){
			$("#apellido").focus().after("<span class='error'>minimo 3 caracteres</span>");
			return false;
		}
		else if( $("#jerarquia").val().length < 3){
			$("#jerarquia").focus().after("<span class='error'>minimo 3 caracteres</span>");
			return false;
		}
		else if( $("#fecha_ingreso").val().length < 8){
			$("#fecha_ingreso").focus().after("<span class='error'>introduzca fecha de ingreso</span>");
			return false;
		}
		else if( $("#fecha_nac").val().length < 8){
			$("#fecha_nac").focus().after("<span class='error'>introduzca fecha de nacimiento</span>");
			return false;
		}
		else if( $("#empleado").val().length < 2){
			$("#empleado").focus().after("<span class='error'>minimo 3 caracteres</span>");
			return false;
		}
		else if( $("#edo_civil").val().length < 4){
			$("#edo_civil").focus().after("<span class='error'>seleccione el estado civil</span>");
			return false;
		}
		else if( $("#sexo").val().length < 3){
			$("#sexo").focus().after("<span class='error'>seleccione el sexo</span>");
			return false;
		}
		else if( $("#direccion").val().length < 6){
			$("#direccion").focus().after("<span class='error'>intruduzca la direccion</span>");
			return false;
		}
		else if( $("#telefono").val().length < 7 ){
			$("#telefono").focus().after("<span class='error'>introduzca telefono</span>");
			return false;
		}
		else if( $("#discapacidad").val() == "" ){
			$("#discapacidad").focus().after("<span class='error'>sino posee coloque ninguna</span>");
			return false;
		}
		else if( $("#comisaria").val().length < 6){
			$("#comisaria").focus().after("<span class='error'>introduzca comisaria</span>");
			return false;
		}
		
	});
	$("#cedula, #nacionalidad, #nombre, #apellido, #sexo, #jerarquia, #direccion, #telefono, #comisaria").keyup(function(){
		if( $(this).val() != "" ){
			$(".error").fadeOut();			
			return false;
		}		
	});
	        
	        $(".prestamo-editar, .prestamo-nuevo, .ayuda-nueva").click(function (){
				$(".error").remove();
 				if($("#fecha_solicitud").val() ==""){
					$("#fecha_solicitud").focus().after("<span class='error'>introduzca fecha de solicitud</span>");
					return false;
				}
				if( $("#monto_s").val().length < 3){
					$("#monto_s").focus().after("<span class='error'>introduzca monto solicitado</span>");
					return false;
				} 
				if($("#monto_o").val() ==""){
					$("#monto_o").focus().after("<span class='error'>introduzca monto otorgado</span>");
					return false;
				}
				else if( $("#descripcion").val().length < 3){
					$("#descripcion").focus().after("<span class='error'>introduzca descripcion de la solicitud</span>");
					return false;
				}
			});

			$(".ayuda-editar").click(function (){
				$(".error").remove();
 				if($("#fecha_solicitud").val() ==""){
					$("#fecha_solicitud").focus().after("<img width='18px' height='18px' align='absmiddle' class='error' src='img/error2.PNG'/>");
					return false;
				}
				if( $("#monto_s").val().length < 3){
					$("#monto_s").focus().after("<img width='18px' height='18px' align='absmiddle' class='error' src='img/error2.PNG'/>");
					return false;
				} 
				if($("#monto_o").val() ==""){
					$("#monto_o").focus().after("<img width='18px' height='18px' align='absmiddle' class='error' src='img/error2.PNG'/>");
					return false;
				}
				else if( $("#descripcion").val().length < 3){
					$("#descripcion").focus().after("<img width='18px' height='18px' align='absmiddle' class='error' src='img/error2.PNG'/>");
					return false;
				}
			});


			$(".prestamo-cargar, .ayuda-cargar").click(function (){
				$(".error").remove();
 				if($("#buscar").val().length < 6){
						$(this).after("<span class='error'>introduzca una cedula</span>");
						$("#buscar").focus();
						return false;
					}
			});
			$("#buscar").keyup(function(){
				if( $(this).val() != "" ){
					$(".error").fadeOut();			
					return false;
				}		
			});

//consulta.php
			$(".b-nombre").click(function (){
				$(".error").remove();
 				if($("#criterio").val().length < 3){
						$(".b-nombre").after("<span class='error'>introduzca nombre o apellido</span>");
						$("#criterio").focus();
						return false;
					}
			});
			$(".b-cedula").click(function (){
				$(".error").remove();
 				if($("#criterio2").val().length < 3){
						$(".b-cedula").after("<span class='error'>introduzca una cedula</span>");
						$("#criterio2").focus();
						return false;
					}
			});
			$("#criterio, #criterio2").keyup(function(){
				if( $(this).val() != "" ){
					$(".error").fadeOut();			
					return false;
				}		
			});
			

		
});