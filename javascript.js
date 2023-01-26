   
    var reconocimiento = new webkitSpeechRecognition();
    reconocimiento.onresult = function(event) {
      var decirTexto = "";
      for (var i = event.resultIndex; i < event.results.length; i++) {
        if (event.results[i].isFinal) {
          decirTexto = event.results[i][0].transcript;
        } else {
          decirTexto += event.results[i][0].transcript;
        }
      }
      document.getElementById('buscadorvoz').value = decirTexto;
      buscarDatos(decirTexto);
    }

    function iniciarGrabacion() {
      document.getElementById('buscadorvoz').value = "";
      document.getElementById('buscadorvoz').focus();
      reconocimiento.start();
    }
    function busquedaboton(){
      decirTexto=document.getElementById('buscadorvoz').value;
      buscarDatos(decirTexto);
    }

    function buscarDatos(decirTexto) {
      var xhr = new XMLHttpRequest();
      var url = 'obtenerDatos.php';
      var params = 'buscadorvoz=' + decirTexto;
      xhr.open("POST", url, true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function(responseText) {
        if (this.readyState == 4 && this.status == 200) {
          const datos = this.responseText;
          document.getElementById('contenedor').innerHTML = datos;
        }
      }
      xhr.send(params);
      
    }
    
    function confirmacionEliminar(id)
    {
    var mensaje;
    var opcion = confirm('¿Seguro de eliminar id= '+id+' ? ');
    if (opcion == true) {
        window.location.href = "../CRUD/delete.php?id="+id;
	  } else {
	    mensaje = "Has clickeado Cancelar";
	  }
	  document.getElementById("ejemplo").innerHTML = mensaje;
    }

    document.getElementById("costo").addEventListener("change", calcular_precios);
    document.getElementById("p_uni").addEventListener("change", calcular_precios);
                
    function roundToMultipleOf100(value) {
        return Math.round(value / 100) * 100;
    }

    function calcular_precios() {
        document.getElementById("p_uni").value = roundToMultipleOf100(document.getElementById("costo").value*1.25+100);
        document.getElementById("p_may").value = roundToMultipleOf100(document.getElementById("p_uni").value*0.94);
    }

    const monedas = document.querySelectorAll('.moneda');
    monedas.forEach(moneda => {
    moneda.textContent = new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP',minimumFractionDigits: 0}).format(parseFloat(moneda.textContent));
    });
