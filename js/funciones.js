$(document).ready(function() { 
	$("#format").buttonset();
	$("#check").button();
	$(".numeric").numeric();
	$(".monto").numeric({allow:"."});
	$('.solo-letras').alpha({allow:" '"});

          $('#formulario, #prestamo-editar, #ayuda-editar, #prestamo-nuevo, #ayuda-nueva, #afiliado-editar, #b-cedula, #b-nombre, #listar, #respaldar, #respaldar3, #restaurar, #restaurar2, #adduser').submit(function(event){ //en el evento submit del fomulario
	          event.preventDefault();  //detenemos el comportamiento por default
 				$("#resultado").html(""); 
			  var url = $(this).attr('action');   //la url del action del formulario
			  var datos = $(this).serialize(); // los datos del formulario
			  $.ajax({
				  type: 'POST',
				  url: url,
				  data: datos,
				  beforeSend: mostrarLoader, //funciones que definimos más abajo
				  success: mostrarRespuesta  //funciones que definimos más abajo
			   }); 
          });
 
			


$("img.borrar_f").click(function() {
	var cedula = $("#cedula").val();
	var id_f = $(this).attr('name');
	$( "#dialog-confirm" ).dialog({            
			autoOpen: true,
			modal:true,
			width:365,
			height:'auto',
			resizable: false,
			position: 'top',            
			buttons: {                
				'ELIMINAR FAMILIAR': function() {
					$.post('ficha.php', {cedula:cedula, id_f:id_f}, function(data){
					  	$('body').html(data);                 
		                });
					$( this ).dialog( 'close' ); 
					},                
				CANCELAR: function() {                    
					$( this ).dialog( 'close' );                
					}            
				}        
	});
});

		$("img.borrar_p").click(function() {
			var cedula = $("#cedula").val();
			var id_prestamo = $(this).attr('name');
			$( "#dialog-prestamo" ).dialog({            
					autoOpen: true,
					modal:true,
					width:365,
					height:'auto',
					resizable: false,
					position: 'top',            
					buttons: {                
						'ELIMINAR PRESTAMO': function() {
							$.post('ficha.php', {cedula:cedula, id_prestamo:id_prestamo}, function(data){
							  	$('body').html(data);                 
				            });
							$( this ).dialog( 'close' ); 
							},                
						CANCELAR: function() {                    
							$( this ).dialog( 'close' );                
							}            
						}        
			});
		});

						$("img.borrar_a").click(function() {
							var cedula = $("#cedula").val();
							var id_ayuda = $(this).attr('name');
							$( "#dialog-ayuda" ).dialog({            
									autoOpen: true,
									modal:true,
									width:365,
									height:'auto',
									resizable: false,
									position: 'top',            
									buttons: {                
										'ELIMINAR AYUDA': function() {
											$.post('ficha.php', {cedula:cedula, id_ayuda:id_ayuda}, function(data){
											  	$('body').html(data);                 
								            });
											$( this ).dialog( 'close' ); 
											},                
										CANCELAR: function() {                    
											$( this ).dialog( 'close' );                
											}            
										}        
							});
						});


$("#borrar_a").click(function() {
	var cedula = $("#cedula").val();
	var accion = 'ELIMINAR AFILIADO';
	$( "#dialog-afiliado" ).dialog({            
			autoOpen: true,
			modal:true,
			width:365,
			height:'auto',
			resizable: false,
			position: 'top',            
			buttons: {                
				'ELIMINAR AFILIADO': function() {
					$.post('operaciones.php', {cedula:cedula, accion:accion}, function(data){
					  	$('#contenido').html(data);                 
		            });
					$( this ).dialog( 'close' ); 
					},                
				CANCELAR: function() {                    
					$( this ).dialog( 'close' );                
					}            
				}        
	});
});

$("#fecha_nac, #fecha_nac_f, #fecha_ingreso, #fecha_solicitud, #fecha_nac_f2").datepicker({
		//showButtonPanel: true,
		//showWeek: true
		changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy'
});
				$('#otro').click(function(){ 
					if ($('#otro').attr('checked')) 
						{ $("#otro2").removeAttr('readonly'); }
					else { $("#otro2").attr('readonly','false'); }

						 });
				$('#check1').click(function(){ 
					if ($('#check1').attr('checked')) 
						{ $("#checkh1").val('SALUD'); }
					else { $("#checkh1").val(''); }

				});
				$('#check2').click(function(){ 
					if ($('#check2').attr('checked')) 
						{ $("#checkh2").val('SALUD'); }
					else { $("#checkh2").val(''); }

				});
				$('#check3').click(function(){ 
					if ($('#check3').attr('checked')) 
						{ $("#checkh3").val('EDUACACION'); }
					else { $("#checkh3").val(''); }

				});
				$('#check4').click(function(){ 
					if ($('#check4').attr('checked')) 
						{ $("#checkh4").val('VARIOS'); }
					else { $("#checkh4").val(''); }

				});
				$('#check5').click(function(){ 
					if ($('#check5').attr('checked')) 
						{ $("#checkh5").val('MEDICINAS'); }
					else { $("#checkh5").val(''); }

				});
				$('#check6').click(function(){ 
					if ($('#check6').attr('checked')) 
						{ $("#checkh6").val('FUNEBRES'); }
					else { $("#checkh6").val(''); }

				});
				$('#check7').click(function(){ 
					if ($('#check7').attr('checked')) 
						{ $("#checkh7").val('MERCADO'); }
					else { $("#checkh7").val(''); }

				});
				$('#document1').click(function(){ 
					if ($(this).attr('checked')) 
						{ $("#documento1").val('COPIA DE LA C.I'); }
					else { $("#documento1").val(''); }

				});
				$('#document2').click(function(){ 
					if ($(this).attr('checked')) 
						{ $("#documento2").val('COPIA ULTIMO RECIBO DE PAGO'); }
					else { $("#documento2").val(''); }

				});
				$('#document3').click(function(){ 
					if ($(this).attr('checked')) 
						{ $("#documento3").val('INFORME O CONSTANCIA MEDICA'); }
					else { $("#documento3").val(''); }

				});
				$('#document4').click(function(){ 
					if ($(this).attr('checked')) 
						{ $("#documento4").val('CARTA DE SOLICITUD'); }
					else { $("#documento4").val(''); }

				});
				$('#document5').click(function(){ 
					if ($(this).attr('checked')) 
						{ $("#documento5").val('PRESUPUESTO DE MATERIAL U OTRO'); }
					else { $("#documento5").val(''); }

				});
				$('#document6').click(function(){ 
					if ($(this).attr('checked')) 
						{ $("#documento6").val('SOLVENCIA'); }
					else { $("#documento6").val(''); }

				});
	$("#fecha_solicitud, #monto_o, #monto_s, #descripcion, #buscar1, #buscar2").keyup(function(){
		if( $(this).val() != "" ){
			$(".error").fadeOut();			
			return false;
		}		
	});
	$("#fecha_solicitud, #fecha_ingreso, #fecha_nac").change(function(){
  		if( $(this).val() != "" ){
			$(".error").fadeOut();			
			return false;
		}
 	});

		$('#agregarUser').dialog({
			autoOpen: false,
			modal:true,
			width:365,
			height:'auto',
			resizable: false,
			position: 'top',
			close:function(){
				$('#formUsers input[type="text"]').val('');
		    	$('#formUsers select > option').removeAttr('selected');
		    	$('#id_user').val('0');
			},
			buttons: { 
				'GUARDAR FAMILIAR': function() { 
						// ir al sitio oficial jquery.com 21                 
					var cedula = $('input[name=cedula]').val();
					var cedulaf = $('input[name=cedulaf]').val();
					var nombref = $('input[name=nombref]').val();
					var parentescof = $('select[name=parentescof]').val();
					var fecha_nac_f = $('input[name=fecha_nac_f]').val();
					  $.post("ficha.php", {cedula:cedula, cedulaf:cedulaf, nombref:nombref, parentescof:parentescof, fecha_nac_f:fecha_nac_f}, function(data){
					  	$("body").html(data);
					  });
					  $("#agregarUser").dialog('close');  
           
				}, 
				CANCELAR: function() { 
				// Cerrar ventana de diálogo 29                 
				$(this).dialog( "close" ); 
				 }
			} 

		});

		// funcionalidad del botón que abre el formulario
		$('#agregar').on('click',function(){
			// Abrimos el Formulario
			$('#agregarUser').dialog({
				title:'AGREGAR FAMILIAR',
				autoOpen:true
			});
		});


		$('#editarf').dialog({
			autoOpen: false,
			modal:true,
			width:365,
			height:'auto',
			resizable: false,
			position: 'top',
			close:function(){
				$('#formUsers input[type="text"]').val('');
		    	$('#formUsers select > option').removeAttr('selected');
		    	$('#id_user').val('0');
			},
			buttons: { 
				'GUARDAR FAMILIAR': function() { 
						// ir al sitio oficial jquery.com 21                 
					var update = 'si';
					var id_f2 = $('input[name=id_f2]').val();
					var cedula = $('input[name=cedula]').val();
					var cedulaf = $('input[name=cedulaf2]').val();
					var nombref = $('input[name=nombref2]').val();
					var parentescof = $('select[name=parentescof2]').val();
					var fecha_nac_f = $('input[name=fecha_nac_f2]').val();
					  $.post("ficha.php", {update:update, id_f2:id_f2, cedula:cedula, cedulaf:cedulaf, nombref:nombref, parentescof:parentescof, fecha_nac_f:fecha_nac_f}, function(data){
					  $("body").html(data);
					  });
					  $("#editarf").dialog('close');  
           
				}, 
				CANCELAR: function() { 
				// Cerrar ventana de diálogo 29                 
				$(this).dialog( "close" ); 
				 }
			} 

		});

			$("img.editar_f").click(function() {
				var id_f = $(this).attr('name');
				var accion = 'EDITAR FAMILIAR';
				$.post("operaciones.php", {id_f:id_f, accion:accion}, function(data){
				  	$("#editarf").html(data);                 
	                });
				$('#editarf').dialog({
					title:'EDITAR FAMILIAR',
					autoOpen:true
				});
			});



 
        function mostrarLoader(){
             $('#ajax_loader').show(); //muestro el loader de ajax            
        };

        function mostrarRespuesta (responseText){
        	$("#ajax_loader").hide(); // Hago desaparecer el loader de ajax
	        $("#resultado").html(responseText);  	        
        };

        function mostrarRespuesta2 (responseText){
        	$("#ajax_loader").hide(); // Hago desaparecer el loader de ajax
	        $("body").html(responseText);  	        
        };




        jQuery(function($){         
        	$.datepicker.regional['es'] = {                 
        		closeText: 'Cerrar',                 
        		prevText: '&#x3c;Ant',                 
        		nextText: 'Sig&#x3e;',                 
        		currentText: 'Hoy',                 
        		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],                 
        		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],                 
        		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],                 
        		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],                 
        		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],                 
        		weekHeader: 'Sm',                 
        		dateFormat: 'dd/mm/yy',                 
        		firstDay: 1,                 
        		isRTL: false,                 
        		showMonthAfterYear: false,                 
        		yearSuffix: ''};         
        	$.datepicker.setDefaults($.datepicker.regional['es']); 
        }); 
});