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
