$(document).ready(function() {
    $.ajax({
        url: "../db/grafica.php",
        datatype:"json", 
        success: function(data) {
            var datos=data;
            var datos0 = datos[0].split(';');
            var datos1 = datos[1].split(';');
            var datos2 = datos[2].split(';');
            var datos3 = datos[3].split(';');
            var datos4 = datos[4].split(';');
        
		    var config = {
			type: 'line',
			data: {
				labels: [datos4[0], datos3[0], datos2[0], datos1[0], datos0[0]],
				datasets: [{
					label: '# Salidas',
					backgroundColor: window.chartColors.red,
					borderColor: window.chartColors.red,
					data: [
                        datos4[1],
                        datos3[1],
                        datos2[1],
                        datos1[1],
                        datos0[1],
					],
					fill: false,
				}, {
					label: '# Entradas',
					fill: false,
					backgroundColor: window.chartColors.blue,
					borderColor: window.chartColors.blue,
					data: [
                        datos4[2],
                        datos3[2],
                        datos2[2],
                        datos1[2],
                        datos0[2],
					],
				}]
			},
			options: {
				responsive: true,
				title: {
					display: true,
					text: 'Registros Entradas Salidas'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Meses'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Registros'
						}
					}]
				}
			}
		};

		var ctx = document.getElementById('canvas').getContext('2d');
		window.myLine = new Chart(ctx, config);
        var colorNames = Object.keys(window.chartColors);
        
         }
	});	
});

$(document).ready(function(){
	$('#resultado').hide();
	$('#busqueda').submit(function(e){
		e.preventDefault();
		var id_auto= $.trim($('#id_auto').val());
		var id_user= $.trim($('#id_user').val());

		if(id_auto==0 || id_auto==0){
			alert("El valor no puede ser nulo");
		}else{
			opcion=13;

			$.ajax({
				url: "../db/crud.php",
				type: "POST",
				datatype:"json",    
				data:  {id_auto:id_auto, id_user:id_user, opcion:opcion},    
				success: function(data) {
					datos=JSON.parse(data);

					$('#dato1').html(datos[0].nombre);
					$('#dato2').html(datos[0].apellido);
					$('#dato3').html(datos[0].dependencia);
					$('#dato4').html(datos[0].id_auto);
					$('#dato5').html(datos[0].modelo);
					$('#dato6').html(datos[0].nota);
					$('#dato7').html(datos[0].hora_entrada);

					$('#resultado').show();
					
				}
			});
		}
		
	});
});
