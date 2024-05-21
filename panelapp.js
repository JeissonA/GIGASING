const logo = document.getElementById("logo");
const barraLateral = document.querySelector(".barra-lateral");
const spans = document.querySelectorAll("span");
const palanca = document.querySelector(".switch");
const circulo = document.querySelector(".circulo");
const menu = document.querySelector(".menu");
const main = document.querySelector("main");

menu.addEventListener("click",()=>{
    barraLateral.classList.toggle("max-barra-lateral");
    if(barraLateral.classList.contains("max-barra-lateral")){
        menu.children[0].style.display = "none";
        menu.children[1].style.display = "block";
    }
    else{
        menu.children[0].style.display = "block";
        menu.children[1].style.display = "none";
    }
    if(window.innerWidth<=320){
        barraLateral.classList.add("mini-barra-lateral");
        main.classList.add("min-main");
        spans.forEach((span)=>{
            span.classList.add("oculto");
        })
    }
});

palanca.addEventListener("click",()=>{
    let body = document.body;
    body.classList.toggle("dark-mode");
    body.classList.toggle("");
    circulo.classList.toggle("prendido");
});

logo.addEventListener("click",()=>{
    barraLateral.classList.toggle("mini-barra-lateral");
    main.classList.toggle("min-main");
    spans.forEach((span)=>{
        span.classList.toggle("oculto");
    });
});


//section//

document.addEventListener('DOMContentLoaded', function () {
    const sidebarItems = document.querySelectorAll('.sidebar-item');
    const sections = document.querySelectorAll('.section');

    sidebarItems.forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault(); // Prevent default link behavior
            
            // Remove active class from all sidebar items
            sidebarItems.forEach(i => i.classList.remove('active'));
            // Add active class to the clicked item
            item.classList.add('active');

            // Get the target section ID
            const target = item.getAttribute('data-target');

            // Hide all sections
            sections.forEach(section => section.classList.remove('active'));
            // Show the target section
            document.getElementById(target).classList.add('active');
        });
    });
});

//ANUNCIOS//
document.addEventListener('DOMContentLoaded', function () {
    // Mostrar el anuncio después de 10 segundos
    setTimeout(function () {
        document.getElementById('anuncio').style.display = 'flex';
    }, 10000);

    // Cerrar el anuncio cuando se hace clic en el botón de cierre
    document.querySelector('.anuncio .close-btn').addEventListener('click', function () {
        document.getElementById('anuncio').style.display = 'none';
    });

    // Lógica de navegación entre secciones
    const sidebarItems = document.querySelectorAll('.sidebar-item');
    const sections = document.querySelectorAll('.section');

    sidebarItems.forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault(); // Prevent default link behavior
            
            // Remove active class from all sidebar items
            sidebarItems.forEach(i => i.classList.remove('active'));
            // Add active class to the clicked item
            item.classList.add('active');

            // Get the target section ID
            const target = item.getAttribute('data-target');

            // Hide all sections
            sections.forEach(section => section.classList.remove('active'));
            // Show the target section
            document.getElementById(target).classList.add('active');
        });
    });
});

/*formualrio permiso alturas*/

function guardarDatos() {
  // Obtener datos del formulario
  var proyecto = document.getElementById('proyecto').value;
  var ciudad = document.getElementById('ciudad').value;
  var fecha_expedicion = document.getElementById('fecha_expedicion').value;
  var permiso_hasta = document.getElementById('permiso_hasta').value;
  var hora_inicio = document.getElementById('hora_inicio').value;
  var hora_fin = document.getElementById('hora_fin').value;

  // Crear un nuevo objeto Image
  var img = new Image();
  img.src = 'Permisodealturaspg1.jpg'; // Reemplaza 'ruta_de_tu_imagen.jpg' por la ruta de tu propia imagen de fondo

  // Cuando la imagen se carga, superponer los datos del formulario
  img.onload = function() {
      // Crear un nuevo canvas del mismo tamaño que la imagen
      var canvas = document.createElement('canvas');
      canvas.width = img.width;
      canvas.height = img.height;
      var ctx = canvas.getContext('2d');

      // Dibujar la imagen en el canvas
      ctx.drawImage(img, 0, 0);

      // Establecer el estilo de texto (negrita, Century Gothic y color negro)
      ctx.font = 'bold 16px "Century Gothic"';
      ctx.fillStyle = 'black';

      // Definir las coordenadas para plasmar los datos del formulario
      var coordenadas = {
          proyecto: { x: 299, y: 163 },
          ciudad: { x: 541, y: 163 },
          fecha_expedicion: { x: 902, y: 165 },
          permiso_hasta: { x: 348, y: 180 },
          hora_inicio: { x: 755, y: 180 },
          hora_fin: { x: 958, y: 180 }
      };

      // Superponer los datos del formulario en las coordenadas especificadas
      ctx.fillText(proyecto, coordenadas.proyecto.x, coordenadas.proyecto.y);
      ctx.fillText(ciudad, coordenadas.ciudad.x, coordenadas.ciudad.y);
      ctx.fillText(fecha_expedicion, coordenadas.fecha_expedicion.x, coordenadas.fecha_expedicion.y);
      ctx.fillText(permiso_hasta, coordenadas.permiso_hasta.x, coordenadas.permiso_hasta.y);
      ctx.fillText(hora_inicio, coordenadas.hora_inicio.x, coordenadas.hora_inicio.y);
      ctx.fillText(hora_fin, coordenadas.hora_fin.x, coordenadas.hora_fin.y);

      // Convertir el canvas a imagen JPEG
      var imagenDataUrl = canvas.toDataURL('image/jpeg');

      // Crear un nuevo objeto jsPDF
      var pdf = new jsPDF('p', 'pt', [canvas.width, canvas.height]);

      // Agregar la imagen al PDF
      pdf.addImage(imagenDataUrl, 'JPEG', 0, 0, canvas.width, canvas.height);

      // Descargar el PDF
      pdf.save('formulario_permiso.pdf');
  };
}