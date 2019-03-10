	function validaFormulario() {
		var text="";
		var error=false;

		//cada testo che deve essere tradotto lo sostituisco con una variabile JS, sostituisco "Nombre" con nombre

		if($("#nombre").val() == "") {
			//validar nombre informado
			text=(nombre + "\n");//variabile nombre che inserisco nel documento variable_js
			error=true;
		}

		if($("#email").val() == "") {
			//validar email informado
			text=(text + "Email" + "\n");
			error=true;
		} else {
			//validar email correcto (sostituisco il texto'"Por favor, introduzca una dirección de correo válida."' con la variabile correo)
        	if (!/^\w+([\.-]\w+)*@\w+([\.-]\w+)*$/.test($("#email").val())) {
				text=(text + correo + "\n");//variabile correo che inserisco nel documento variable_js
				error=true;
			}
		}

		if($("#mensaje").val() == "") {
			text=(text + mensaje + "\n");
			error=true;
		} 

		if (!document.getElementById('privacidad').checked) {
			text=(text + normativa);//variabile normativa che inserisco nel documento variable_js
			error=true;
		};

		if (error==true) {
			text=(datos + "\n\n" + text + "\n\n");
		}

		if (error==true) {
			alert(text);
		} else {
			$('#form').submit();
 		}
	}