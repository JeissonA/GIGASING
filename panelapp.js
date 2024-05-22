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

//sections forms//

document.addEventListener("DOMContentLoaded", function() {
  const formSections = document.querySelectorAll(".form-section");
  const nextButtons = document.querySelectorAll(".next-btn");
  const prevButtons = document.querySelectorAll(".prev-btn");
  const progressBar = document.getElementById("progress-bar");

  let currentSection = 0;

  formSections[currentSection].classList.add("active");
  updateProgressBar();

  nextButtons.forEach((button, index) => {
      button.addEventListener("click", () => {
          formSections[currentSection].classList.remove("active");
          currentSection = Math.min(currentSection + 1, formSections.length - 1);
          formSections[currentSection].classList.add("active");
          updateProgressBar();
      });
  });

  prevButtons.forEach((button, index) => {
      button.addEventListener("click", () => {
          formSections[currentSection].classList.remove("active");
          currentSection = Math.max(currentSection - 1, 0);
          formSections[currentSection].classList.add("active");
          updateProgressBar();
      });
  });

  document.getElementById("multi-step-form").addEventListener("submit", function(event) {
      event.preventDefault();
      alert("Formulario enviado!");
  });

  function updateProgressBar() {
      const progress = (currentSection + 1) / formSections.length * 100;
      progressBar.style.width = progress + "%";
  }
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
  var techox = document.querySelector('input[name="techox"]:checked').value;
 var plataformas = document.querySelector('input[name="plataformas"]:checked').value;
 var gruas = document.querySelector('input[name="gruas"]:checked').value;
 var andamios = document.querySelector('input[name="andamios"]:checked').value;
 var malacates = document.querySelector('input[name="malacates"]:checked').value;
 var otros = document.querySelector('input[name="otros"]:checked').value;
 var especifica = document.getElementById('especifica').value;
 var escaleras = document.querySelector('input[name="escaleras"]:checked').value;
 var moviles = document.querySelector('input[name="moviles"]:checked').value;
 var canasta = document.querySelector('input[name="canasta"]:checked').value;
 var andamiox = document.querySelector('input[name="andamiox"]:checked').value;
 var estructura = document.querySelector('input[name="estructura"]:checked').value;
 var otross = document.querySelector('input[name="otross"]:checked').value;  
 var especificar = document.getElementById('especificar').value;
 var AyD = document.querySelector('input[name="AyD"]:checked').value;
 var Restriccion = document.querySelector('input[name="Restriccion"]:checked').value;
 var Posicionamiento = document.querySelector('input[name="Posicionamiento"]:checked').value;
 var Suspension = document.querySelector('input[name="Suspension"]:checked').value;
 var Desplazamientos = document.querySelector('input[name="Desplazamientos"]:checked').value;
 var nombrecompleto = document.getElementById('nombrecompleto').value;
 var CC = document.getElementById('CC').value;
 var nocc = document.getElementById('nocc').value;
 var cargo = document.getElementById('cargo').value;
 var exmed = document.querySelector('input[name="exmed"]:checked').value;
 var tral = document.querySelector('input[name="tral"]:checked').value;
 var afisv= document.querySelector('input[name="afisv"]:checked').value;
 var sintomas = document.querySelector('input[name="sintomas"]:checked').value;
 var ptosanclaje = document.getElementById('ptosanclaje').value;
 var dpc = document.getElementById('dpc').value;
 var acc = document.querySelector('input[name="acc"]:checked').value;
 var eae = document.querySelector('input[name="eae"]:checked').value;
 var esae = document.querySelector('input[name="esae"]:checked').value;
 var ep = document.querySelector('input[name="ep"]:checked').value;
 var lv = document.querySelector('input[name="lv"]:checked').value;
 var lh = document.querySelector('input[name="lh"]:checked').value;
 var Freno = document.querySelector('input[name="Freno"]:checked').value;
 var mosqueton = document.querySelector('input[name="mosqueton"]:checked').value;
 var otros = document.querySelector('input[name="otros"]:checked').value;
 var porque = document.getElementById('porque').value;
 var ccb = document.querySelector('input[name="ccb"]:checked').value;
 var gds = document.querySelector('input[name="gds"]:checked').value;
 var pa = document.querySelector('input[name="pa"]:checked').value;
 var mask = document.querySelector('input[name="mask"]:checked').value;
 var guantes = document.querySelector('input[name="guantes"]:checked').value;
 var rdt = document.querySelector('input[name="rdt"]:checked').value;
 var zcps = document.querySelector('input[name="zcps"]:checked').value;
 var gdp = document.querySelector('input[name="gdp"]:checked').value;
 var otherss = document.querySelector('input[name="otherss"]:checked').value;
 var totherss = document.getElementById('totherss').value;
 var obs = document.getElementById('obs').value;
 var fecha_exp = document.getElementById('fecha_exp').value;
 var valih = document.getElementById('valih').value;
 var Hri = document.getElementById('Hri').value;
 var hrf = document.getElementById('hrf').value;
 
 


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
          hora_fin: { x: 958, y: 180 },
          techox: { x: 180, y: 235 },
          plataformas: { x: 286, y: 235 },
          gruas: { x: 416, y: 255 },
          andamios: { x: 416, y: 272 },
          malacates: { x: 416, y: 290 },
          otros: { x: 196, y: 310 },
          especifica: { x: 547, y: 230 },
          escaleras: { x: 551, y: 234 },
          moviles: { x: 650, y: 234 },
          canasta: { x: 788, y: 252 },
          andamiox: { x: 788, y: 271 },
          estructura: { x: 788, y: 289 },
          otross: { x: 495, y: 310 },
          especificar: { x: 530, y: 310 },
          AyD: { x: 1092, y: 237 },
          Restriccion: { x: 1092, y: 253 },
          Posicionamiento: { x: 1092, y: 270 },
          Suspension: { x: 1092, y: 287 },
          Desplazamientos: { x: 1092, y: 307 },
          nombrecompleto: { x: 196, y: 455 },
          CC: { x: 548, y: 455 },
          nocc: { x: 682, y: 455 },
          cargo: { x: 792, y: 455 },
          exmed: { x: 917, y: 631 },
         tral: { x: 917, y: 656 }, 
         afisv: { x: 917, y: 680 },
         sintomas: { x: 917, y: 706 },
         ptosanclaje: { x: 191, y: 757 },
         dpc: { x: 679, y: 757 },
         acc: { x: 445, y: 953 },
         eae: { x: 445, y: 972 },
         esae: { x: 445, y: 994 },
         ep: { x: 445, y: 1012 },
         lv: { x: 445, y: 1029 },
         lh: { x: 445, y: 1048 },
         Freno: { x: 445, y: 1066 },
         mosqueton: { x: 445, y: 1083 },
         otros: { x: 176, y: 1104 },
         porque: { x: 237, y: 1104},
         ccb: { x: 914  , y:  954  },
         gds: { x: 914  , y:  971  },
         pa: { x: 914  , y:  994  },
         mask: { x: 914  , y:  1012  },
         guantes: { x: 914  , y:  1028  },
         rdt: { x: 914  , y:  1046  },
         zcps: { x: 914  , y:  1062  },
         gdp: { x: 914  , y:  1082  },
         otherss: { x: 690  , y:  1104  },
         totherss: { x: 725  , y: 1104 },
         obs: { x: 120  , y:  1142  },
         fecha_exp: { x: 346  , y:  1190  },
         valih: { x: 294  , y:  1210  },
         Hri: { x: 760  , y:  1190  },
         hrf: { x: 792  , y: 1209 },

         
      };

      // Superponer los datos del formulario en las coordenadas especificadas
      ctx.fillText(proyecto, coordenadas.proyecto.x, coordenadas.proyecto.y);
      ctx.fillText(ciudad, coordenadas.ciudad.x, coordenadas.ciudad.y);
      ctx.fillText(fecha_expedicion, coordenadas.fecha_expedicion.x, coordenadas.fecha_expedicion.y);
      ctx.fillText(permiso_hasta, coordenadas.permiso_hasta.x, coordenadas.permiso_hasta.y);
      ctx.fillText(hora_inicio, coordenadas.hora_inicio.x, coordenadas.hora_inicio.y);
      ctx.fillText(hora_fin, coordenadas.hora_fin.x, coordenadas.hora_fin.y);
      ctx.fillText(techox, coordenadas.techox.x, coordenadas.techox.y);
     ctx.fillText(plataformas, coordenadas.plataformas.x, coordenadas.plataformas.y);
     ctx.fillText(gruas, coordenadas.gruas.x, coordenadas.gruas.y);
     ctx.fillText(andamios, coordenadas.andamios.x, coordenadas.andamios.y);
     ctx.fillText(malacates, coordenadas.malacates.x, coordenadas.malacates.y);
     ctx.fillText(otros, coordenadas.otros.x, coordenadas.otros.y);
     ctx.fillText(especifica, coordenadas.especifica.x, coordenadas.especifica.y);
     ctx.fillText(escaleras, coordenadas.escaleras.x, coordenadas.escaleras.y);
     ctx.fillText(moviles, coordenadas.moviles.x, coordenadas.moviles.y);
     ctx.fillText(canasta, coordenadas.canasta.x, coordenadas.canasta.y);
     ctx.fillText(andamiox, coordenadas.andamiox.x, coordenadas.andamiox.y);
     ctx.fillText(estructura, coordenadas.estructura.x, coordenadas.estructura.y);
     ctx.fillText(otross, coordenadas.otross.x, coordenadas.otross.y);
     ctx.fillText(especificar, coordenadas.especificar.x, coordenadas.especificar.y);
     ctx.fillText(AyD, coordenadas.AyD.x, coordenadas.AyD.y);
     ctx.fillText(Restriccion, coordenadas.Restriccion.x, coordenadas.Restriccion.y);
     ctx.fillText(Posicionamiento, coordenadas.Posicionamiento.x, coordenadas.Posicionamiento.y);
     ctx.fillText(Suspension, coordenadas.Suspension.x, coordenadas.Suspension.y);
     ctx.fillText(Desplazamientos, coordenadas.Desplazamientos.x, coordenadas.Desplazamientos.y);
     ctx.fillText(nombrecompleto, coordenadas.nombrecompleto.x, coordenadas.nombrecompleto.y);
     ctx.fillText(CC, coordenadas.CC.x, coordenadas.CC.y);
     ctx.fillText(nocc, coordenadas.nocc.x, coordenadas.nocc.y);
     ctx.fillText(cargo, coordenadas.cargo.x, coordenadas.cargo.y);
     ctx.fillText(exmed, coordenadas.exmed.x, coordenadas.exmed.y);
     ctx.fillText(tral, coordenadas.tral.x, coordenadas.tral.y);
     ctx.fillText(afisv, coordenadas.afisv.x, coordenadas.afisv.y);
     ctx.fillText(sintomas, coordenadas.sintomas.x, coordenadas.sintomas.y);
     ctx.fillText(ptosanclaje, coordenadas.ptosanclaje.x, coordenadas.ptosanclaje.y);
     ctx.fillText(dpc, coordenadas.dpc.x, coordenadas.dpc.y);
     ctx.fillText(acc, coordenadas.acc.x, coordenadas.acc.y);
     ctx.fillText(eae, coordenadas.eae.x, coordenadas.eae.y);
     ctx.fillText(esae, coordenadas.esae.x, coordenadas.esae.y);
     ctx.fillText(ep, coordenadas.ep.x, coordenadas.ep.y);
     ctx.fillText(lv, coordenadas.lv.x, coordenadas.lv.y);
     ctx.fillText(lh, coordenadas.lh.x, coordenadas.lh.y);
     ctx.fillText(Freno, coordenadas.Freno.x, coordenadas.Freno.y);
     ctx.fillText(mosqueton, coordenadas.mosqueton.x, coordenadas.mosqueton.y);
     ctx.fillText(otros, coordenadas.otros.x, coordenadas.otros.y);
     ctx.fillText(porque, coordenadas.porque.x, coordenadas.porque.y);
     ctx.fillText(ccb, coordenadas.ccb.x, coordenadas.ccb.y);
     ctx.fillText(gds, coordenadas.gds.x, coordenadas.gds.y);
     ctx.fillText(pa, coordenadas.pa.x, coordenadas.pa.y);
     ctx.fillText(mask, coordenadas.mask.x, coordenadas.mask.y);
     ctx.fillText(guantes, coordenadas.guantes.x, coordenadas.guantes.y);
     ctx.fillText(rdt, coordenadas.rdt.x, coordenadas.rdt.y);
     ctx.fillText(zcps, coordenadas.zcps.x, coordenadas.zcps.y);
     ctx.fillText(gdp, coordenadas.gdp.x, coordenadas.gdp.y);
     ctx.fillText(otherss, coordenadas.otherss.x, coordenadas.otherss.y);
     ctx.fillText(totherss, coordenadas.totherss.x, coordenadas.totherss.y);
     ctx.fillText(obs, coordenadas.obs.x, coordenadas.obs.y);
     ctx.fillText(fecha_exp, coordenadas.fecha_exp.x, coordenadas.fecha_exp.y);
     ctx.fillText(valih, coordenadas.valih.x, coordenadas.valih.y);
     ctx.fillText(Hri, coordenadas.Hri.x, coordenadas.Hri.y);
     ctx.fillText(hrf, coordenadas.hrf.x, coordenadas.hrf.y);
     
     
    

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