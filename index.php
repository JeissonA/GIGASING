<?php 
session_start();


if (!isset($_SESSION['email'])) {
    header("Location: login.php"); 
    exit();
}


$nombre = $_SESSION['primer_nombre'];
$apellido = $_SESSION['primer_apellido'];
$email = $_SESSION['email'];
$foto = $_SESSION['foto'] ?? '/fotos_usuarios/default.jpg';



require_once 'modelo/conexion.php';


function obtenerUsuarios($conexion) {
    $query = "SELECT * FROM usuarios";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

$usuarios = obtenerUsuarios($conn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIGASING</title>
    <link rel="shortcut icon" href="/icon/GIGASING.png" type="image/x-icon">
    <link rel="stylesheet" href="/stylepanel.css">
    <script src="jspdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
</head>
<body>
<footer class="pie-pagina">
        <p>©Copyrigth Derechos de Autor (GIGACON 2024)</p>
        </footer>
    <div class="menu">
        <ion-icon name="menu-outline"></ion-icon>
        <ion-icon name="close-outline"></ion-icon>
    </div>

 
<!--BARRA LATERAL ASIDE-->

    <div class="barra-lateral">
        <div>
            <div class="nombre-pagina">
                <img id="logo" src="/icon/GIGASING.png" height="60px" width="60px">
                <span>GIGASING</span>
            </div>
        </div>

        <nav class="navegacion">
            <ul>
                <li>
                    <a href="#Panel">
                        <ion-icon name="apps"></ion-icon>
                        <span>Panel</span>
                    </a>
                </li>
                <li>
                    <a href="#Biblioteca">
                        <ion-icon name="folder"></ion-icon>
                        <span>Biblioteca</span>
                    </a>
                </li>
                <li>
                    <a href="#Historial">
                        <ion-icon name="time"></ion-icon>
                        <span>Historial</span>
                    </a>
                </li>
                <li>
                    <a href="#Usuarios">
                        <ion-icon name="person"></ion-icon>
                        <span>Usuarios</span>
                        
                    </a>
                </li>
                <li>
                    <a href="#Mensajes">
                    <ion-icon name="chatbox-ellipses"></ion-icon>
                        <span>Mensajes</span>
                    </a>
                </li>
                <li>
                    <a href="#Soporte">
                        <ion-icon name="megaphone"></ion-icon>
                        <span>Soporte</span>
                    </a>
                </li>
            </ul>
        </nav>
       
        <div>
            <div class="linea"></div>

            <div class="modo-oscuro">
                <div class="info">
                    <ion-icon name="moon-outline"></ion-icon>
                    <span>Modo Noche</span>
                </div>
                <div class="switch">
                    <div class="base">
                        <div class="circulo"></div>
                    </div>
                </div>
            </div>    
       
      
            <?php if (isset($_SESSION['email'])): ?>
              <div class="usuario">
        <div class="foto-perfil" onclick="toggleOptions()">
             <img src="<?php echo $foto; ?>" alt="Foto de perfil">
            <div class="options" id="profileOptions" style="display:none;">
                <a href="#" onclick="document.getElementById('updatePhotoForm').style.display='block'">Actualizar foto de perfil</a>
                <a href="delete_photo.php">Eliminar foto de perfil</a>
            </div>
        </div>
        <div class="info-usuario">
            <div class="nombre-email">
                <span class="nombre"><?php echo htmlspecialchars($nombre) . ' ' . htmlspecialchars($apellido); ?></span>
                <span class="email"><?php echo htmlspecialchars($email); ?></span>
            </div>

            <div class="logout-button">
            <a href="logout.php" class="Btn">
                <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
                <div class="text">Salir</div>
            </a>
    </div>

    <!-- Formulario para actualizar la foto de perfil (oculto por defecto) -->
    <div id="updatePhotoForm" style="display:none;">
        <form action="update_photo.php" method="post" enctype="multipart/form-data">
            <label for="foto">Selecciona una foto:</label>
            <input type="file" name="foto" id="foto" required>
            <input type="submit" value="Subir foto">
        </form>
    </div>
<?php else: ?>
    <!-- Si el usuario no ha iniciado sesión, redirigirlo al formulario de inicio de sesión -->
    <?php header("Location: login.php"); exit(); ?>
<?php endif; ?>
</div>
</div>
</div>
</div>


<!--MENU DONDE APARECE CONTENIDO DE CADA SECCIÓN SELECCIONADA-->
<main>
        <div class="content">
            <div class="section" id="Panel">
                <h2>Panel</h2>
                <p>Contenido de la sección Panel.</p>
            </div>        
            
           
            <div class="section"  id="Biblioteca"> <!--SECCION BIBLIOTECA-->

                <h2>FORMATOS</h2>
            <p>1. Aquí encontrarás todos los formatos disponibles para diligenciar.</p>
            <p>2. Recuerda que debes ingresar al formulario, diligenciar y exportar el documento en formato PDF para poder compartirlo. </p>
            <p>3. TODOS LOS CAMPOS DEBEN SER COMPLETADOS POR OBLIGACIÓN!</p>


                <div class="bibliotecas">
                    <a class="portada" href="#Permisodealturas">
                        <img src="/icon/permisoalturas.png" alt="Portada Biblioteca">
                    </a>
                    <a class="portada" href="#Listadechequeo">
                        <img src="/icon/lista-chequeo.png" alt="Portada Biblioteca">
                    </a>
                    <a class="portada" href="#">
                        <img src="/icon/reservado2.png" alt="Portada Biblioteca">
                    </a>
                    <a class="portada" href="#">
                        <img src="/icon/Reservado1.png" alt="Portada Biblioteca">
                    </a>
                    <a class="portada" href="#">
                        <img src="/icon/reservado.png" alt="Portada Biblioteca">
                    </a>
                </div>
            </div>
            </div>
          
            

        <!--------PERMISO PARA TRABAJO EN ALTURAS----------->

        
            <div class="section" id="Permisodealturas">
                <h2>FORMULARIO PERMISO PARA TRABAJO EN ALTURA</h2>
                <div class="progress-container">
                    <div class="progress-bar" id="progress-bar">
                    </div>
                    </div>


                <form id="multi-step-form">
                    <div class="form-section" id="section-30">
                      <h2>DATOS GENERALES DEL PERMISO</h2>
            <div class="campo">
            <label for="proyecto">Proyecto o Área:</label>
            <input type="text" id="proyecto" name="proyecto" required>
        </div>

        <div class="campo">
            <label for="ciudad">Ciudad:</label>
            <input type="text" id="ciudad" name="ciudad" required>
        </div>

        <div class="campo">
            <label for="fecha_expedicion">Fecha de Expedición:</label>
            <input type="date" id="fecha_expedicion" name="fecha_expedicion" required>
        </div>

        <div class="campo">
            <label for="permiso_hasta">Permiso válido hasta:</label>
            <input type="date" id="permiso_hasta" name="permiso_hasta" required>
        </div>

        <div class="campo">
            <label for="hora_inicio">Hora de Inicio:</label>
            <input type="time" id="hora_inicio" name="hora_inicio" required>
        </div>

        <div class="campo">
            <label for="hora_fin">Hora de Finalización:</label>
            <input type="time" id="hora_fin" name="hora_fin" required>

            <button type="button" class="next-btn">Siguiente</button>
        </div>
        </div>


        <div class="form-section" id="section-31">
            <h2>DESCRIPCIÓN DE LA ACTIVIDAD</h2>
<label>
<p class="color-fondo"><strong>trabajo se realiza en:</strong></p>
     techos:
      <input type="radio" name="techox" value="si"> Sí
      <input type="radio" name="techox" value="no"> No
    </label>
    <label>
        plataformas:
        <input type="radio" name="plataformas" value="si"> Sí
        <input type="radio" name="plataformas" value="no"> No
      </label>
      <label>
        grúas:
        <input type="radio" name="gruas" value="si"> Sí
        <input type="radio" name="gruas" value="no"> No
      </label>
      <label>
        andamios:
        <input type="radio" name="andamios" value="si"> Sí
        <input type="radio" name="andamios" value="no"> No
      </label>
      <label>
        malacates:
        <input type="radio" name="malacates" value="si"> Sí
        <input type="radio" name="malacates" value="no"> No
      </label>
      <label>
        Otros:
        <input type="radio" name="otros" value="si"> Sí
        <input type="radio" name="otros" value="no"> No
      </label>
  <label>
      ¿Cuales?:
      <input type="text" placeholder="Solo si la respuesta es SI" id="especifica" name="especifica">
  
  </label>


  <label>
    <p class="color-fondo"><strong>EL SISTEMA DE ACCESO:</strong></p>
Escaleras fijas:
  <input type="radio" name="escaleras" value="si"> Sí
  <input type="radio" name="escaleras" value="no"> No
</label>
<label>
Moviles:
  <input type="radio" name="moviles" value="si"> Sí
  <input type="radio" name="moviles" value="no"> No
</label>
<label>
Izaje en canasta:
  <input type="radio" name="canasta" value="si"> Sí
  <input type="radio" name="canasta" value="no"> No
</label>
<label>
Andamios:
  <input type="radio" name="andamiox" value="si"> Sí
  <input type="radio" name="andamiox" value="no"> No
</label>
<label>
Estructura:
  <input type="radio" name="estructura" value="si"> Sí
  <input type="radio" name="estructura" value="no"> No
</label>
<label>
Otros:
  <input type="radio" name="otross" value="si"> Sí
  <input type="radio" name="otross" value="no"> No
</label>
<label>
¿Cuales?:
<input type="text" placeholder="Solo si la respuesta es SI" id="especificar" name="especificar">

</label>


                        <button type="button" class="prev-btn">Anterior</button>
                        <button type="button" class="next-btn">Siguiente</button>


</div>

<div class="form-section" id="section-32">
  
    <label>
        <p class="color-fondo"><strong>Tipo de Labor:</strong></p>
        Ascenso y Descenso:
        <input type="radio" name="AyD" value="si"> Sí
        <input type="radio" name="AyD" value="si"> No
    </label>

    <label>
        Restriccion:
        <input type="radio" name="Restriccion" value="si">Sí
        <input type="radio" name="Restriccion" value="no"> No
    </label>

    <Label>
        Posicionamiento:
        <input type="radio" name="Posicionamiento" value="si">Sí
        <input type="radio" name="Posicionamiento" value="no">No
    </Label>
    <Label>
        Suspensión:
        <input type="radio" name="Suspension" value="si">Sí
        <input type="radio" name="Suspension" value="no">No
        
    </Label>
<Label>
    Desplazamientos horizontales
    <input type="radio" name="Desplazamientos" value="si">Sí
    <input type="radio" name="Desplazamientos" value="no">No
</Label>
<!--PENDIENTE PARA UBICAR ID Y NAME-->
<Label>
    <p>Ubicación del sitio de la actividad</p>
    <input type="text" name="" id="">
</Label>
<Label>
  <P>Altura Aproximada</P>
  <input type="text" name="" id="">
</Label>
<Label>
  <p>Descripción y procedimiento de la actividad</p>
  <input type="text" name="" id="">
</Label>
<Label>
  <p>Herramientas a utilizar</p>
  <input type="text" name="" id="">
  
</Label>
    <button type="button" class="prev-btn">Anterior</button>
    <button type="button" class="next-btn">Siguiente</button>
</div>

<div class="form-section" id="section-33">
<h2>TRABAJADORES AUTORIZADOS PARA LA EJECUCION DE LA ACTIVIDAD EN ALTURAS</h2>
Nombre Completo:
<input type="text" name="nombrecompleto" id="nombrecompleto">
</Label>
<Label>
Tipo de documento:
    <select name="CC" id="CC">
      <option value="CC">CC</option>
      <option value="PPT">PPT</option>
      <option value="CE">CE</option>
    </select>
</Label>
<Label>
N° de documento:
<input type="text" name="nocc" id="nocc">
</Label>
<Label>
Cargo:
    <input type="text" name="cargo" id="cargo">
</Label>
<Label>
  Firma
  <input type="file" name="" id="">
</Label>

    <button type="button" class="prev-btn">Anterior</button>
    <button type="button" class="next-btn">Siguiente</button>
   </div>




<div class="form-section" id="section-34">

<h2>Sección 4</h2>
    <p class="color-fondo"><strong>REQUISITOS PARA LA EJECUCION DE LA ACTIVIDAD</strong></p>
    <Label>
        Apto para trabajo en alturas, según examen médico y concepto de aptiptud:
        <input type="radio" name="exmed" value="si">Sí
        <input type="radio" name="exmed" value="no">No
    </Label>
    <Label>
        Certificado de competencia laboral vigente (trabajo seguro en alturas)
        <input type="radio" name="tral" value="si">Sí
        <input type="radio"name="tral" value="no">No
    </Label>
    <Label>
      Afiliación seguro social vigente
      <input type="radio" name="afisv" value="si">Sí
      <input type="radio" name="afisv" value="no">No 
    </Label>
    <Label>
      En el momento el trabajador presenta algun sintoma que le impida realizar la labor (mareos, fiebre, vomito, dolor de cabeza, entre otros).
      <input type="radio" name="sintomas" value="si">Sí
      <input type="radio" name="sintomas" value="no">No
    </Label>
    <hr>
    <P class="color-fondo"><strong>PUNTOS DE ANCLAJE POR TRABAJADOR</strong></P>
    <Label>
      <input placeholder="TRABAJADOR 1" type="text" name="ptosanclaje" id="ptosanclaje">
    </Label>

      <P class="color-fondo"><strong>DISTANCIA DE CLARIDAD</strong></P>
        <Label>
    <input placeholder="TRABAJADOR 1" type="text" name="dpc" id="dpc">
        </Label>
        <button type="button" class="prev-btn">Anterior</button>
    <button type="button" class="next-btn">Siguiente</button>
</div>

<div class="form-section" id="section-35">
<h2>Sección 5</h2>
<p class="color-fondo"><strong>SISTEMA DE PROTECCION CONTRA CAÍDAS</strong></p>
  <Label>Arnés cuerpo Completo
  <input type="radio" name="acc" value="si">Sí
  <input type="radio" name="acc" value="no">No
</Label>
<Label>
  Eslinga con absorbedor de energia
  <input type="radio" name="eae" value="si">Sí
  <input type="radio" name="eae" value="no">No
</Label>
<Label>
    Eslinga sin absorbedor de energia
    <input type="radio" name="esae" value="si">Sí
    <input type="radio" name="esae" value="no">No
  </Label>

<Label>
  Eslinga de Posicionamiento
  <input type="radio" name="ep" value="si">Sí
  <input type="radio" name="ep" value="no">No
</Label>
<Label>
  Linea de vida vertical
  <input type="radio" name="lv" value="si">Sí
  <input type="radio" name="lv" value="no">No
</Label>
<Label>
  Linea de vida horizontal
  <input type="radio" name="lh" value="si">Sí
  <input type="radio" name="lh" value="no">No  
</Label>
<Label>
  Freno
  <input type="radio" name="Freno" value="si">Sí
  <input type="radio" name="Freno" value="no">No
</Label>
<Label>
  Mosquetón
  <input type="radio" name="mosqueton" value="si">Sí
  <input type="radio" name="mosqueton" value="no">No
</Label>
<Label>
  Otros
  <input type="radio" name="otros" value="si">Sí
  <input type="radio" name="otros" value="no">No
  <input placeholder="Unicamente si la respuesta es sí" type="text" name="porque" id="porque">
</Label>

<button type="button" class="prev-btn">Anterior</button>
<button type="button" class="next-btn">Siguiente</button>
</div>
<div class="form-section" id="section-36">
    <h2>Sección 6</h2>
    <p class="color-fondo"><strong>ELEMENTOS DE PROTECCION PERSONAL</strong></p>
<Label>
  Casco con barbuquejo
  <input type="radio" name="ccb" value="si">Sí
  <input type="radio" name="ccb" value="no">No
</Label>
<Label>
  Gafas de seguridad
  <input type="radio" name="gds" value="si">Sí
  <input type="radio" name="gds" value="no">No
</Label>
<Label>
  protección auditiva
  <input type="radio" name="pa" value="si">Sí
  <input type="radio" name="pa" value="no">No
</Label>
<Label>
  Mascarilla
  <input type="radio" name="mask" value="si">Sí
  <input type="radio" name="mask" value="no">No
</Label>
<Label>
  Guantes
  <input type="radio" name="guantes" value="si">Sí
  <input type="radio" name="guantes" value="no">No
</Label>
<Label>
  Ropa de trabajo
  <input type="radio" name="rdt" value="si">Sí
  <input type="radio" name="rdt" value="no">No
</Label>
<Label>
  Zapatos con puntera de seguridad
  <input type="radio" name="zcps" value="si">Sí
  <input type="radio" name="zcps" value="no">No
</Label>
<Label>
  Gorro de protección
  <input type="radio" name="gdp" value="si">Sí
  <input type="radio" name="gdp" value="no">No
</Label>
<Label>
  Otros
  <input type="radio" name="otherss" value="si">Sí
  <input type="radio" name="otherss" value="no">No
  <input placeholder="Unicamente si la respuesta es sí" type="text" name="totherss" id="totherss">
</Label>
    <button type="button" class="prev-btn">Anterior</button>
    <button type="button" class="next-btn">Siguiente</button>
</div>

<div class="form-section" id="section-37">
    <h2>Sección 7</h2>
    <p class="color-fondo"><strong>OBSERVACIONES</strong></p>
<input type="text" name="obs" id="obs">
<hr>
<p class="color-fondo"><strong>REVALIDACIÓN</strong></p>
<Label>
  Feha de Expedición
  <input type="date" name="fecha_exp" id="fecha_exp">
</Label>
<Label>
  Valido hasta
  <input type="date" name="valih" id="valih">
</Label>
<Label>
  Hore de Inicio
  <input type="time" name="Hri" id="Hri">
</Label>
<Label>
  Hora de Finalización
  <input type="time" name="hrf" id="hrf"> 
</Label>
<button type="button" class="prev-btn">Anterior</button>
    <button type="button" class="next-btn">Siguiente</button>
</div>

<div class="form-section" id="section-38">
  <h2>Sección 8</h2>
  <p class="color-fondo"><strong>PERSONAL DE LA REVALIDACIÓN</strong></p>
  <Label>
    Tipo de documento:
        <select name="CC" id="CC">
          <option value="CC">CC</option>
          <option value="PPT">PPT</option>
          <option value="CE">CE</option>
        </select>
    </Label>
    <Label>
      Numero de documento
      <input type="text" name="" id="">
    </Label>
    <Label>
      Nombre Completo:
      <input type="text" name="" id="">
    </Label>
    <Label>
      Cargo
      <input type="text" name="" id="">
    </Label>
    <Label>
    Firma Digital (En formato PNG)
    <input type="file" name="" id="">
    </Label> 
        <button type="button" class="prev-btn">Anterior</button>
        <button type="button" class="next-btn">Siguiente</button>
</div>
<div class="form-section" id="section-39">
  <h2>Sección 9</h2>
  <P class=" color-fondo"><strong>AUTORIDADES QUE VALIDAN</strong></P>
   
   <Label>
    Nombre Completo:
    <input type="text" name="" id="">
   </Label>
   <Label>
    Rol:
    <input type="text" name="" id="">
   </Label>
   <Label>
    Firma Digital (en formato PNG)
    <input type="file" name="" id="">
   </Label>


  <button type="button" class="prev-btn">Anterior</button>
  <button type="button" class="next-btn">Siguiente</button>
</div>


<div class="form-section" id="section-40">
  <h2>Sección 10</h2>
  <p class="color-fondo"><strong>FIRMAS</strong></p>
  <p class="color-fondo"><strong>PERSONAS QUE AUTORIZAN LA ACTIVIDAD</strong></p>
    <Label>
    Nombre Completo
    <input type="text" name="" id="">
  </Label>
  <Label>
    Tipo de documento
    <select name="" id="">
      <option value="">CC</option>
      <option value="">PPT</option>
      <option value="">CE</option>
    </select>
  </Label>
  <Label>
    N° de documento
    <input type="text" name="" id="">
  </Label>
  <Label>
    Cargo 
    <input type="text" name="" id="">
  </Label>
<Label>
  Firma
  <input type="file" name="" id="">
</Label> 
<button type="button" class="prev-btn">Anterior</button>
  <button type="button" class="next-btn">Siguiente</button>
</div>

<div class="form-section" id="section-41">
<h2>Sección 11</h2>
<p class="color-fondo"><strong>RESPONSABLE DE ACTIVAR PLAN DE EMERGENCIA (personal GIGACON o de obra)</strong></p>
<Label>
  Nombre Completo
  <input type="text" name="" id="">
</Label>
<Label>
  Tipo de documento
  <select name="" id="">
    <option value="">CC</option>
    <option value="">PPT</option>
    <option value="">CE</option>
  </select>
</Label>
<Label>
  N° de documento
  <input type="text" name="" id="">
</Label>
<Label>
  Cargo 
  <input type="text" name="" id="">
</Label>
<Label>
Firma
<input type="file" name="" id="">
</Label> 
<button type="button" class="prev-btn">Anterior</button>
<button type="button" class="next-btn">Siguiente</button>
</div>
<div class="form-section" id="section-42">
  <h2>Sección 12</h2>
  <p class="color-fondo"><strong>AYUDANTE DE SEGURIDAD DESIGNADO</strong></p>
  <Label>
    Nombre Completo
    <input type="text" name="" id="">
  </Label>
  <Label>
    Tipo de documento
    <select name="" id="">
      <option value="">CC</option>
      <option value="">PPT</option>
      <option value="">CE</option>
    </select>
  </Label>
  <Label>
    N° de documento
    <input type="text" name="" id="">
  </Label>
  <Label>
    Cargo 
    <input type="text" name="" id="">
  </Label>
  <Label>
  Firma
  <input type="file" name="" id="">
  </Label> 
  <button type="button" class="prev-btn">Anterior</button>
  <button type="button" class="next-btn">Siguiente</button>
  </div>
  <div class="form-section" id="section-43">
    <h2>Sección 13</h2>
    <p class="color-fondo"><strong>COORDINADOR DE TRABAJO SEGURO EN ALTURAS</strong></p>
    <Label>
      Nombre Completo
      <input type="text" name="" id="">
    </Label>
    <Label>
      Tipo de documento
      <select name="" id="">
        <option value="">CC</option>
        <option value="">PPT</option>
        <option value="">CE</option>
      </select>
    </Label>
    <Label>
      N° de documento
      <input type="text" name="" id="">
    </Label>
    <Label>
      Cargo 
      <input type="text" name="" id="">
    </Label>
    <Label>
    Firma
    <input type="file" name="" id="">
    </Label> 
    <button type="button" class="prev-btn">Anterior</button>
    <button type="button" class="next-btn">Siguiente</button>
    </div>
                    <div class="form-section" id="section-44">
                        <h2>DESCARGA EL DOCUMENTO</h2>
                        <p>Verifica que toda la información diligenciada sea correcta!.</p>
                        <button type="button" class="prev-btn">Anterior</button>
                        <button type="button" onclick="guardarDatos()">GENERAR PDF</button>
                    </div>
                </form>
      </div>

      <!--LISTA DE CHEQUEO-->
      <div class="section" id="Listadechequeo">
        <table border="1">
          <tr>
              <td>
                Proyecto o Area:
              <input type="text" name="" id="">
            </td>
              <td>
              Ciudad:
              <input type="text" name="" id=""></td>
          </tr>
          <tr>
              <td>
              Fecha de Expedición:
              <input type="date" name="" id=""></td>
              <td>
              Hora de inicio:
              <input type="date" name="" id="">
              </td>
          </tr>
          <tr>
              <td>
                Valido hasta:
              <input type="date" name="" id="">
            </td>
              <td>
                Hora de Finalización:
              <input type="time" name="" id=""></td>
          </tr>
      </table>
        <table>
          <thead>
              <tr>
                  <th rowspan="2">ITEMS</th>
                  <th colspan="3" class="day-header">Lunes</th>
                  <th colspan="3" class="day-header">Martes</th>
                  <th colspan="3" class="day-header">Miércoles</th>
                  <th colspan="3" class="day-header">Jueves</th>
                  <th colspan="3" class="day-header">Viernes</th>
                  <th colspan="3" class="day-header">Sabado</th>
                  <th colspan="3" class="day-header">Domingo</th>
              </tr>
              <tr>
                  <th>Sí</th>
                  <th>No</th>
                  <th>N/A</th>
                  <th>Sí</th>
                  <th>No</th>
                  <th>N/A</th>
                  <th>Sí</th>
                  <th>No</th>
                  <th>N/A</th>
                  <th>Sí</th>
                  <th>No</th>
                  <th>N/A</th>
                  <th>Sí</th>
                  <th>No</th>
                  <th>N/A</th>
                  <th>Sí</th>
                  <th>No</th>
                  <th>N/A</th>
                  <th>Sí</th>
                  <th>No</th>
                  <th>N/A</th>
              </tr>
          </thead>
          <tbody>
              <!-- Repetir este bloque para cada pregunta -->
              <tr>
                  <td>Se ha diligenciado permiso de trabajo en alturas?</td>
                  <td><input type="radio" name="q1_mon" value="si"></td>
                  <td><input type="radio" name="q1_mon" value="no"></td>
                  <td><input type="radio" name="q1_mon" value="na"></td>
                  <td><input type="radio" name="q1_tue" value="si"></td>
                  <td><input type="radio" name="q1_tue" value="no"></td>
                  <td><input type="radio" name="q1_tue" value="na"></td>
                  <td><input type="radio" name="q1_wed" value="si"></td>
                  <td><input type="radio" name="q1_wed" value="no"></td>
                  <td><input type="radio" name="q1_wed" value="na"></td>
                  <td><input type="radio" name="q1_thu" value="si"></td>
                  <td><input type="radio" name="q1_thu" value="no"></td>
                  <td><input type="radio" name="q1_thu" value="na"></td>
                  <td><input type="radio" name="q1_fri" value="si"></td>
                  <td><input type="radio" name="q1_fri" value="no"></td>
                  <td><input type="radio" name="q1_fri" value="na"></td>
                  <td><input type="radio" name="q1_sat" value="si"></td>
                  <td><input type="radio" name="q1_sat" value="no"></td>
                  <td><input type="radio" name="q1_sat" value="na"></td>
                  <td><input type="radio" name="q1_sun" value="si"></td>
                  <td><input type="radio" name="q1_sun" value="no"></td>
                  <td><input type="radio" name="q1_sun" value="na"></td>
              </tr>
              <tr>
                <td>Se tiene procedimiento de trabajo para la actividad?</td>
                <td><input type="radio" name="q2_mon" value="si"></td>
                <td><input type="radio" name="q2_mon" value="no"></td>
                <td><input type="radio" name="q2_mon" value="na"></td>
                <td><input type="radio" name="q2_tue" value="si"></td>
                <td><input type="radio" name="q2_tue" value="no"></td>
                <td><input type="radio" name="q2_tue" value="na"></td>
                <td><input type="radio" name="q2_wed" value="si"></td>
                <td><input type="radio" name="q2_wed" value="no"></td>
                <td><input type="radio" name="q2_wed" value="na"></td>
                <td><input type="radio" name="q2_thu" value="si"></td>
                <td><input type="radio" name="q2_thu" value="no"></td>
                <td><input type="radio" name="q2_thu" value="na"></td>
                <td><input type="radio" name="q2_fri" value="si"></td>
                <td><input type="radio" name="q2_fri" value="no"></td>
                <td><input type="radio" name="q2_fri" value="na"></td>
                <td><input type="radio" name="q2_sat" value="si"></td>
                  <td><input type="radio" name="q2_sat" value="no"></td>
                  <td><input type="radio" name="q2_sat" value="na"></td>
                  <td><input type="radio" name="q2_sun" value="si"></td>
                  <td><input type="radio" name="q2_sun" value="no"></td>
                  <td><input type="radio" name="q2_sun" value="na"></td>
            </tr>
            <tr>
              <td>Se diligencia el ATS?</td>
              <td><input type="radio" name="q3_mon" value="si"></td>
              <td><input type="radio" name="q3_mon" value="no"></td>
              <td><input type="radio" name="q3_mon" value="na"></td>
              <td><input type="radio" name="q3_tue" value="si"></td>
              <td><input type="radio" name="q3_tue" value="no"></td>
              <td><input type="radio" name="q3_tue" value="na"></td>
              <td><input type="radio" name="q3_wed" value="si"></td>
              <td><input type="radio" name="q3_wed" value="no"></td>
              <td><input type="radio" name="q3_wed" value="na"></td>
              <td><input type="radio" name="q3_thu" value="si"></td>
              <td><input type="radio" name="q3_thu" value="no"></td>
              <td><input type="radio" name="q3_thu" value="na"></td>
              <td><input type="radio" name="q3_fri" value="si"></td>
              <td><input type="radio" name="q3_fri" value="no"></td>
              <td><input type="radio" name="q3_fri" value="na"></td>
              <td><input type="radio" name="q3_sat" value="si"></td>
                  <td><input type="radio" name="q3_sat" value="no"></td>
                  <td><input type="radio" name="q3_sat" value="na"></td>
                  <td><input type="radio" name="q3_sun" value="si"></td>
                  <td><input type="radio" name="q3_sun" value="no"></td>
                  <td><input type="radio" name="q3_sun" value="na"></td>
          </tr>
          <tr>
            <td>Se requieren permisos adicionales (confinado - caliente)?</td>
            <td><input type="radio" name="q4_mon" value="si"></td>
            <td><input type="radio" name="q4_mon" value="no"></td>
            <td><input type="radio" name="q4_mon" value="na"></td>
            <td><input type="radio" name="q4_tue" value="si"></td>
            <td><input type="radio" name="q4_tue" value="no"></td>
            <td><input type="radio" name="q4_tue" value="na"></td>
            <td><input type="radio" name="q4_wed" value="si"></td>
            <td><input type="radio" name="q4_wed" value="no"></td>
            <td><input type="radio" name="q4_wed" value="na"></td>
            <td><input type="radio" name="q4_thu" value="si"></td>
            <td><input type="radio" name="q4_thu" value="no"></td>
            <td><input type="radio" name="q4_thu" value="na"></td>
            <td><input type="radio" name="q4_fri" value="si"></td>
            <td><input type="radio" name="q4_fri" value="no"></td>
            <td><input type="radio" name="q4_fri" value="na"></td>
            <td><input type="radio" name="q4_sat" value="si"></td>
                  <td><input type="radio" name="q4_sat" value="no"></td>
                  <td><input type="radio" name="q4_sat" value="na"></td>
                  <td><input type="radio" name="q4_sun" value="si"></td>
                  <td><input type="radio" name="q4_sun" value="no"></td>
                  <td><input type="radio" name="q4_sun" value="na"></td>
        </tr>
        <tr>
          <td>Se realiza charla de seguridad antes de dar inicio a la actividad?</td>
          <td><input type="radio" name="q5_mon" value="si"></td>
          <td><input type="radio" name="q5_mon" value="no"></td>
          <td><input type="radio" name="q5_mon" value="na"></td>
          <td><input type="radio" name="q5_tue" value="si"></td>
          <td><input type="radio" name="q5_tue" value="no"></td>
          <td><input type="radio" name="q5_tue" value="na"></td>
          <td><input type="radio" name="q5_wed" value="si"></td>
          <td><input type="radio" name="q5_wed" value="no"></td>
          <td><input type="radio" name="q5_wed" value="na"></td>
          <td><input type="radio" name="q5_thu" value="si"></td>
          <td><input type="radio" name="q5_thu" value="no"></td>
          <td><input type="radio" name="q5_thu" value="na"></td>
          <td><input type="radio" name="q5_fri" value="si"></td>
          <td><input type="radio" name="q5_fri" value="no"></td>
          <td><input type="radio" name="q5_fri" value="na"></td>
          <td><input type="radio" name="q5_sat" value="si"></td>
          <td><input type="radio" name="q5_sat" value="no"></td>
          <td><input type="radio" name="q5_sat" value="na"></td>
          <td><input type="radio" name="q5_sun" value="si"></td>
          <td><input type="radio" name="q5_sun" value="no"></td>
          <td><input type="radio" name="q5_sun" value="na"></td>
      </tr>
      <tr>
        <td>Conoce como actuar en caso de una emergencia?</td>
        <td><input type="radio" name="q6_mon" value="si"></td>
        <td><input type="radio" name="q6_mon" value="no"></td>
        <td><input type="radio" name="q6_mon" value="na"></td>
        <td><input type="radio" name="q6_tue" value="si"></td>
        <td><input type="radio" name="q6_tue" value="no"></td>
        <td><input type="radio" name="q6_tue" value="na"></td>
        <td><input type="radio" name="q6_wed" value="si"></td>
        <td><input type="radio" name="q6_wed" value="no"></td>
        <td><input type="radio" name="q6_wed" value="na"></td>
        <td><input type="radio" name="q6_thu" value="si"></td>
        <td><input type="radio" name="q6_thu" value="no"></td>
        <td><input type="radio" name="q6_thu" value="na"></td>
        <td><input type="radio" name="q6_fri" value="si"></td>
        <td><input type="radio" name="q6_fri" value="no"></td>
        <td><input type="radio" name="q6_fri" value="na"></td>
        <td><input type="radio" name="q6_sat" value="si"></td>
        <td><input type="radio" name="q6_sat" value="no"></td>
        <td><input type="radio" name="q6_sat" value="na"></td>
        <td><input type="radio" name="q6_sun" value="si"></td>
        <td><input type="radio" name="q6_sun" value="no"></td>
        <td><input type="radio" name="q6_sun" value="na"></td> 
    </tr>
    <tr>
      <td>Las condiciones climaticas son adecuadas?</td>
      <td><input type="radio" name="q7_mon" value="si"></td>
      <td><input type="radio" name="q7_mon" value="no"></td>
      <td><input type="radio" name="q7_mon" value="na"></td>
      <td><input type="radio" name="q7_tue" value="si"></td>
      <td><input type="radio" name="q7_tue" value="no"></td>
      <td><input type="radio" name="q7_tue" value="na"></td>
      <td><input type="radio" name="q7_wed" value="si"></td>
      <td><input type="radio" name="q7_wed" value="no"></td>
      <td><input type="radio" name="q7_wed" value="na"></td>
      <td><input type="radio" name="q7_thu" value="si"></td>
      <td><input type="radio" name="q7_thu" value="no"></td>
      <td><input type="radio" name="q7_thu" value="na"></td>
      <td><input type="radio" name="q7_fri" value="si"></td>
      <td><input type="radio" name="q7_fri" value="no"></td>
      <td><input type="radio" name="q7_fri" value="na"></td>
      <td><input type="radio" name="q7_sat" value="si"></td>
      <td><input type="radio" name="q7_sat" value="no"></td>
      <td><input type="radio" name="q7_sat" value="na"></td>
      <td><input type="radio" name="q7_sun" value="si"></td>
      <td><input type="radio" name="q7_sun" value="no"></td>
      <td><input type="radio" name="q7_sun" value="na"></td>
  </tr>
  
  <td><p class="color-fondo">MEDIDAS COLECTIVAS DE PREVENCIÓN</p></td>

  <tr>
    <td>El area se encuentra señalizada y delimitada</td>
    <td><input type="radio" name="q8_mon" value="si"></td>
    <td><input type="radio" name="q8_mon" value="no"></td>
    <td><input type="radio" name="q8_mon" value="na"></td>
    <td><input type="radio" name="q8_tue" value="si"></td>
    <td><input type="radio" name="q8_tue" value="no"></td>
    <td><input type="radio" name="q8_tue" value="na"></td>
    <td><input type="radio" name="q8_wed" value="si"></td>
    <td><input type="radio" name="q8_wed" value="no"></td>
    <td><input type="radio" name="q8_wed" value="na"></td>
    <td><input type="radio" name="q8_thu" value="si"></td>
    <td><input type="radio" name="q8_thu" value="no"></td>
    <td><input type="radio" name="q8_thu" value="na"></td>
    <td><input type="radio" name="q8_fri" value="si"></td>
    <td><input type="radio" name="q8_fri" value="no"></td>
    <td><input type="radio" name="q8_fri" value="na"></td>
    <td><input type="radio" name="q8_sat" value="si"></td>
    <td><input type="radio" name="q8_sat" value="no"></td>
    <td><input type="radio" name="q8_sat" value="na"></td>
    <td><input type="radio" name="q8_sun" value="si"></td>
    <td><input type="radio" name="q8_sun" value="no"></td>
    <td><input type="radio" name="q8_sun" value="na"></td>
</tr>
<tr>
  <td>Es necesario las barandas de protección?.</td>
  <td><input type="radio" name="q9_mon" value="si"></td>
  <td><input type="radio" name="q9_mon" value="no"></td>
  <td><input type="radio" name="q9_mon" value="na"></td>
  <td><input type="radio" name="q9_tue" value="si"></td>
  <td><input type="radio" name="q9_tue" value="no"></td>
  <td><input type="radio" name="q9_tue" value="na"></td>
  <td><input type="radio" name="q9_wed" value="si"></td>
  <td><input type="radio" name="q9_wed" value="no"></td>
  <td><input type="radio" name="q9_wed" value="na"></td>
  <td><input type="radio" name="q9_thu" value="si"></td>
  <td><input type="radio" name="q9_thu" value="no"></td>
  <td><input type="radio" name="q9_thu" value="na"></td>
  <td><input type="radio" name="q9_fri" value="si"></td>
  <td><input type="radio" name="q9_fri" value="no"></td>
  <td><input type="radio" name="q9_fri" value="na"></td>
  <td><input type="radio" name="q9_sat" value="si"></td>
  <td><input type="radio" name="q9_sat" value="no"></td>
  <td><input type="radio" name="q9_sat" value="na"></td>
  <td><input type="radio" name="q9_sun" value="si"></td>
  <td><input type="radio" name="q9_sun" value="no"></td>
  <td><input type="radio" name="q9_sun" value="na"></td>
</tr>
<tr>
  <td>Se tiene controles sobre las superficies con huecos o aberturas?.</td>
  <td><input type="radio" name="q10_mon" value="si"></td>
  <td><input type="radio" name="q10mon" value="no"></td>
  <td><input type="radio" name="q10mon" value="na"></td>
  <td><input type="radio" name="q10tue" value="si"></td>
  <td><input type="radio" name="q10tue" value="no"></td>
  <td><input type="radio" name="q10tue" value="na"></td>
  <td><input type="radio" name="q10wed" value="si"></td>
  <td><input type="radio" name="q10wed" value="no"></td>
  <td><input type="radio" name="q10wed" value="na"></td>
  <td><input type="radio" name="q10thu" value="si"></td>
  <td><input type="radio" name="q10thu" value="no"></td>
  <td><input type="radio" name="q10thu" value="na"></td>
  <td><input type="radio" name="q10fri" value="si"></td>
  <td><input type="radio" name="q10fri" value="no"></td>
  <td><input type="radio" name="q10fri" value="na"></td>
  <td><input type="radio" name="q10sat" value="si"></td>
  <td><input type="radio" name="q10sat" value="no"></td>
  <td><input type="radio" name="q10sat" value="na"></td>
  <td><input type="radio" name="q10sun" value="si"></td>
  <td><input type="radio" name="q10sun" value="no"></td>
  <td><input type="radio" name="q10sun" value="na"></td>
</tr>

<td><p class="color-fondo">MEDIDAS PROTECCION CONTRA CAÍDAS EN ALTURA</p></td>
<tr>
  <td>Se inspeccionaron los elementos o equipos de los sistemas de protección contra caídas y son certificados?.</td>
  <td><input type="radio" name="q11_mon" value="si"></td>
  <td><input type="radio" name="q11_mon" value="no"></td>
  <td><input type="radio" name="q11_mon" value="na"></td>
  <td><input type="radio" name="q11_tue" value="si"></td>
  <td><input type="radio" name="q11_tue" value="no"></td>
  <td><input type="radio" name="q11_tue" value="na"></td>
  <td><input type="radio" name="q11_wed" value="si"></td>
  <td><input type="radio" name="q11_wed" value="no"></td>
  <td><input type="radio" name="q11_wed" value="na"></td>
  <td><input type="radio" name="q11_thu" value="si"></td>
  <td><input type="radio" name="q11_thu" value="no"></td>
  <td><input type="radio" name="q11_thu" value="na"></td>
  <td><input type="radio" name="q11_fri" value="si"></td>
  <td><input type="radio" name="q11_fri" value="no"></td>
  <td><input type="radio" name="q11_fri" value="na"></td>
  <td><input type="radio" name="q11_sat" value="si"></td>
  <td><input type="radio" name="q11_sat" value="no"></td>
  <td><input type="radio" name="q11_sat" value="na"></td>
  <td><input type="radio" name="q11_sun" value="si"></td>
  <td><input type="radio" name="q11_sun" value="no"></td>
  <td><input type="radio" name="q11_sun" value="na"></td>
</tr>
<tr>
  <td>Se cuenta con medias pasivas de protección contra caidas (sistema red de seguiridad)?.</td>
  <td><input type="radio" name="q12_mon" value="si"></td>
  <td><input type="radio" name="q12_mon" value="no"></td>
  <td><input type="radio" name="q12_mon" value="na"></td>
  <td><input type="radio" name="q12_tue" value="si"></td>
  <td><input type="radio" name="q12_tue" value="no"></td>
  <td><input type="radio" name="q12_tue" value="na"></td>
  <td><input type="radio" name="q12_wed" value="si"></td>
  <td><input type="radio" name="q12_wed" value="no"></td>
  <td><input type="radio" name="q12_wed" value="na"></td>
  <td><input type="radio" name="q12_thu" value="si"></td>
  <td><input type="radio" name="q12_thu" value="no"></td>
  <td><input type="radio" name="q12_thu" value="na"></td>
  <td><input type="radio" name="q12_fri" value="si"></td>
  <td><input type="radio" name="q12_fri" value="no"></td>
  <td><input type="radio" name="q12_fri" value="na"></td>
  <td><input type="radio" name="q12_sat" value="si"></td>
  <td><input type="radio" name="q12_sat" value="no"></td>
  <td><input type="radio" name="q12_sat" value="na"></td>
  <td><input type="radio" name="q12_sun" value="si"></td>
  <td><input type="radio" name="q12_sun" value="no"></td>
  <td><input type="radio" name="q12_sun" value="na"></td>
</tr>
<tr>
  <td>Se cuenta con medidas activas de protección contra caídas (anclajes, lineas de vida, conectores, ganchos de seguridad, arnes)?.</td>
  <td><input type="radio" name="q13_mon" value="si"></td>
  <td><input type="radio" name="q13_mon" value="no"></td>
  <td><input type="radio" name="q13_mon" value="na"></td>
  <td><input type="radio" name="q13_tue" value="si"></td>
  <td><input type="radio" name="q13_tue" value="no"></td>
  <td><input type="radio" name="q13_tue" value="na"></td>
  <td><input type="radio" name="q13_wed" value="si"></td>
  <td><input type="radio" name="q13_wed" value="no"></td>
  <td><input type="radio" name="q13_wed" value="na"></td>
  <td><input type="radio" name="q13_thu" value="si"></td>
  <td><input type="radio" name="q13_thu" value="no"></td>
  <td><input type="radio" name="q13_thu" value="na"></td>
  <td><input type="radio" name="q13_fri" value="si"></td>
  <td><input type="radio" name="q13_fri" value="no"></td>
  <td><input type="radio" name="q13_fri" value="na"></td>
  <td><input type="radio" name="q13_sat" value="si"></td>
  <td><input type="radio" name="q13_sat" value="no"></td>
  <td><input type="radio" name="q13_sat" value="na"></td>
  <td><input type="radio" name="q13_sun" value="si"></td>
  <td><input type="radio" name="q13_sun" value="no"></td>
  <td><input type="radio" name="q13_sun" value="na"></td>
</tr>
<tr>
  <td>Se tiene aseguradas las herramientas, materiales, equipos y objetos para que puedan caer?.</td>
  <td><input type="radio" name="q14_mon" value="si"></td>
  <td><input type="radio" name="q14_mon" value="no"></td>
  <td><input type="radio" name="q14_mon" value="na"></td>
  <td><input type="radio" name="q14_tue" value="si"></td>
  <td><input type="radio" name="q14_tue" value="no"></td>
  <td><input type="radio" name="q14_tue" value="na"></td>
  <td><input type="radio" name="q14_wed" value="si"></td>
  <td><input type="radio" name="q14_wed" value="no"></td>
  <td><input type="radio" name="q14_wed" value="na"></td>
  <td><input type="radio" name="q14_thu" value="si"></td>
  <td><input type="radio" name="q14_thu" value="no"></td>
  <td><input type="radio" name="q14_thu" value="na"></td>
  <td><input type="radio" name="q14_fri" value="si"></td>
  <td><input type="radio" name="q14_fri" value="no"></td>
  <td><input type="radio" name="q14_fri" value="na"></td>
  <td><input type="radio" name="q14_sat" value="si"></td>
  <td><input type="radio" name="q14_sat" value="no"></td>
  <td><input type="radio" name="q14_sat" value="na"></td>
  <td><input type="radio" name="q14_sun" value="si"></td>
  <td><input type="radio" name="q14_sun" value="no"></td>
  <td><input type="radio" name="q14_sun" value="na"></td>
</tr>
<tr>
  <td>Se realizaron preoperaciones (maquinas y/o equipos)?.</td>
  <td><input type="radio" name="q15_mon" value="si"></td>
  <td><input type="radio" name="q15_mon" value="no"></td>
  <td><input type="radio" name="q15_mon" value="na"></td>
  <td><input type="radio" name="q15_tue" value="si"></td>
  <td><input type="radio" name="q15_tue" value="no"></td>
  <td><input type="radio" name="q15_tue" value="na"></td>
  <td><input type="radio" name="q15_wed" value="si"></td>
  <td><input type="radio" name="q15_wed" value="no"></td>
  <td><input type="radio" name="q15_wed" value="na"></td>
  <td><input type="radio" name="q15_thu" value="si"></td>
  <td><input type="radio" name="q15_thu" value="no"></td>
  <td><input type="radio" name="q15_thu" value="na"></td>
  <td><input type="radio" name="q15_fri" value="si"></td>
  <td><input type="radio" name="q15_fri" value="no"></td>
  <td><input type="radio" name="q15_fri" value="na"></td>
  <td><input type="radio" name="q15_sat" value="si"></td>
  <td><input type="radio" name="q15_sat" value="no"></td>
  <td><input type="radio" name="q15_sat" value="na"></td>
  <td><input type="radio" name="q15_sun" value="si"></td>
  <td><input type="radio" name="q15_sun" value="no"></td>
  <td><input type="radio" name="q15_sun" value="na"></td>
</tr>
<tr>
  <td>Se tiene cuenta con radios de comunicación?.</td>
  <td><input type="radio" name="q16_mon" value="si"></td>
  <td><input type="radio" name="q16_mon" value="no"></td>
  <td><input type="radio" name="q16_mon" value="na"></td>
  <td><input type="radio" name="q16_tue" value="si"></td>
  <td><input type="radio" name="q16_tue" value="no"></td>
  <td><input type="radio" name="q16_tue" value="na"></td>
  <td><input type="radio" name="q16_wed" value="si"></td>
  <td><input type="radio" name="q16_wed" value="no"></td>
  <td><input type="radio" name="q16_wed" value="na"></td>
  <td><input type="radio" name="q16_thu" value="si"></td>
  <td><input type="radio" name="q16_thu" value="no"></td>
  <td><input type="radio" name="q16_thu" value="na"></td>
  <td><input type="radio" name="q16_fri" value="si"></td>
  <td><input type="radio" name="q16_fri" value="no"></td>
  <td><input type="radio" name="q16_fri" value="na"></td>
  <td><input type="radio" name="q16_sat" value="si"></td>
  <td><input type="radio" name="q16_sat" value="no"></td>
  <td><input type="radio" name="q16_sat" value="na"></td>
  <td><input type="radio" name="q16_sun" value="si"></td>
  <td><input type="radio" name="q16_sun" value="no"></td>
  <td><input type="radio" name="q16_sun" value="na"></td>
</tr>
<tr>
  <td>Si el trabajo requiere el uso de una linea de vida o dispositivo fijo, está debidamente certificada.</td>
  <td><input type="radio" name="q17_mon" value="si"></td>
  <td><input type="radio" name="q17_mon" value="no"></td>
  <td><input type="radio" name="q17_mon" value="na"></td>
  <td><input type="radio" name="q17_tue" value="si"></td>
  <td><input type="radio" name="q17_tue" value="no"></td>
  <td><input type="radio" name="q17_tue" value="na"></td>
  <td><input type="radio" name="q17_wed" value="si"></td>
  <td><input type="radio" name="q17_wed" value="no"></td>
  <td><input type="radio" name="q17_wed" value="na"></td>
  <td><input type="radio" name="q17_thu" value="si"></td>
  <td><input type="radio" name="q17_thu" value="no"></td>
  <td><input type="radio" name="q17_thu" value="na"></td>
  <td><input type="radio" name="q17_fri" value="si"></td>
  <td><input type="radio" name="q17_fri" value="no"></td>
  <td><input type="radio" name="q17_fri" value="na"></td>
  <td><input type="radio" name="q17_sat" value="si"></td>
  <td><input type="radio" name="q17_sat" value="no"></td>
  <td><input type="radio" name="q17_sat" value="na"></td>
  <td><input type="radio" name="q17_sun" value="si"></td>
  <td><input type="radio" name="q17_sun" value="no"></td>
  <td><input type="radio" name="q17_sun" value="na"></td>
</tr>
<tr>
  <td>Se tienen adaptadores de anclaje certificados y en buen estado.</td>
  <td><input type="radio" name="q18_mon" value="si"></td>
  <td><input type="radio" name="q18_mon" value="no"></td>
  <td><input type="radio" name="q18_mon" value="na"></td>
  <td><input type="radio" name="q18_tue" value="si"></td>
  <td><input type="radio" name="q18_tue" value="no"></td>
  <td><input type="radio" name="q18_tue" value="na"></td>
  <td><input type="radio" name="q18_wed" value="si"></td>
  <td><input type="radio" name="q18_wed" value="no"></td>
  <td><input type="radio" name="q18_wed" value="na"></td>
  <td><input type="radio" name="q18_thu" value="si"></td>
  <td><input type="radio" name="q18_thu" value="no"></td>
  <td><input type="radio" name="q18_thu" value="na"></td>
  <td><input type="radio" name="q18_fri" value="si"></td>
  <td><input type="radio" name="q18_fri" value="no"></td>
  <td><input type="radio" name="q18_fri" value="na"></td>
  <td><input type="radio" name="q18_sat" value="si"></td>
  <td><input type="radio" name="q18_sat" value="no"></td>
  <td><input type="radio" name="q18_sat" value="na"></td>
  <td><input type="radio" name="q18_sun" value="si"></td>
  <td><input type="radio" name="q18_sun" value="no"></td>
  <td><input type="radio" name="q18_sun" value="na"></td>
</tr>

<td><p class="color-fondo">OBLIGACIÓN DE LOS TRABAJADORES</p></td>

<tr>
  <td>Los trabajadores tienen conocimiento que deben reportar, condiciones inseguras, incidentes y accidentes o condiciones de salud, antes de realizar cualquier tipo de trabajo en altura</td>
  <td><input type="radio" name="q19_mon" value="si"></td>
  <td><input type="radio" name="q19_mon" value="no"></td>
  <td><input type="radio" name="q19_mon" value="na"></td>
  <td><input type="radio" name="q19_tue" value="si"></td>
  <td><input type="radio" name="q19_tue" value="no"></td>
  <td><input type="radio" name="q19_tue" value="na"></td>
  <td><input type="radio" name="q19_wed" value="si"></td>
  <td><input type="radio" name="q19_wed" value="no"></td>
  <td><input type="radio" name="q19_wed" value="na"></td>
  <td><input type="radio" name="q19_thu" value="si"></td>
  <td><input type="radio" name="q19_thu" value="no"></td>
  <td><input type="radio" name="q19_thu" value="na"></td>
  <td><input type="radio" name="q19_fri" value="si"></td>
  <td><input type="radio" name="q19_fri" value="no"></td>
  <td><input type="radio" name="q19_fri" value="na"></td>
  <td><input type="radio" name="q19_sat" value="si"></td>
  <td><input type="radio" name="q19_sat" value="no"></td>
  <td><input type="radio" name="q19_sat" value="na"></td>
  <td><input type="radio" name="q19_sun" value="si"></td>
  <td><input type="radio" name="q19_sun" value="no"></td>
  <td><input type="radio" name="q19_sun" value="na"></td>
</tr>
<tr>
  <td>Los trabajadores se encuentran bajo los efectos de los TAPS, de acuerdo a las politicas internas de GIGACON TRANSPORTES SAS.</td>
  <td><input type="radio" name="q20_mon" value="si"></td>
  <td><input type="radio" name="q20_mon" value="no"></td>
  <td><input type="radio" name="q20_mon" value="na"></td>
  <td><input type="radio" name="q20_tue" value="si"></td>
  <td><input type="radio" name="q20_tue" value="no"></td>
  <td><input type="radio" name="q20_tue" value="na"></td>
  <td><input type="radio" name="q20_wed" value="si"></td>
  <td><input type="radio" name="q20_wed" value="no"></td>
  <td><input type="radio" name="q20_wed" value="na"></td>
  <td><input type="radio" name="q20_thu" value="si"></td>
  <td><input type="radio" name="q20_thu" value="no"></td>
  <td><input type="radio" name="20_thu" value="na"></td>
  <td><input type="radio" name="q20_fri" value="si"></td>
  <td><input type="radio" name="q20_fri" value="no"></td>
  <td><input type="radio" name="q20_fri" value="na"></td>
  <td><input type="radio" name="q20_sat" value="si"></td>
  <td><input type="radio" name="q20_sat" value="no"></td>
  <td><input type="radio" name="q20_sat" value="na"></td>
  <td><input type="radio" name="q20_sun" value="si"></td>
  <td><input type="radio" name="q20_sun" value="no"></td>
  <td><input type="radio" name="q20_sun" value="na"></td>
</tr>
<tr>
  <td>Se tiene controles sobre las superficies con huecos o aberturas?.</td>
  <td><input type="radio" name="q1_mon" value="si"></td>
  <td><input type="radio" name="q1_mon" value="no"></td>
  <td><input type="radio" name="q1_mon" value="na"></td>
  <td><input type="radio" name="q1_tue" value="si"></td>
  <td><input type="radio" name="q1_tue" value="no"></td>
  <td><input type="radio" name="q1_tue" value="na"></td>
  <td><input type="radio" name="q1_wed" value="si"></td>
  <td><input type="radio" name="q1_wed" value="no"></td>
  <td><input type="radio" name="q1_wed" value="na"></td>
  <td><input type="radio" name="q1_thu" value="si"></td>
  <td><input type="radio" name="q1_thu" value="no"></td>
  <td><input type="radio" name="q1_thu" value="na"></td>
  <td><input type="radio" name="q1_fri" value="si"></td>
  <td><input type="radio" name="q1_fri" value="no"></td>
  <td><input type="radio" name="q1_fri" value="na"></td>
  <td><input type="radio" name="q1_sat" value="si"></td>
  <td><input type="radio" name="q1_sat" value="no"></td>
  <td><input type="radio" name="q1_sat" value="na"></td>
  <td><input type="radio" name="q1_sun" value="si"></td>
  <td><input type="radio" name="q1_sun" value="no"></td>
  <td><input type="radio" name="q1_sun" value="na"></td>
</tr>

<!--FIRMAS-->
<div class="asignature">
  <table>
    <thead>
        <tr>
            <th>N°</th>
            <th>Nombre Completo del Personal Autorizado</th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miércoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
            <th>Sábado</th>
            <th>Domingo</th>
        </tr>
    </thead>
    <tbody>
        <!-- Repetir este bloque para cada fila del 1 al 8 -->
        <tr>
            <td>1</td>
            <td>
              <input type="text" name="inputTex" id="inputText">
            </td>
            <td>
              <section id="signature-container">
                <button id="signButton">Firmar</button>
            </section>
            <section id="signatureSection" class="hidden">
                <canvas id="signaturePad" width="100" height="100"></canvas>
                <button id="clearButton">Limpiar</button>
                <button id="saveButton">Guardar</button>
            </section>
            </td>
            <td>
            
            </td>
            <td>
             
            </td>
            <td>
             
            </td>
            <td>
            
            </td>
            <td>
              
            </td>
            <td>
             
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>
              <input type="text" name="" id="">
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>3</td>
            <td>
              <input type="text" name="" id="">
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>4</td>
            <td>
              <input type="text"> <!--NOMBRE COMPLETO-->
            </td>
            <td>
            <!--FIRMA LUNES-->
            </td>
            <td></td><!--FIRMA MARTES-->
            <td></td><!--FIRMA MIERCOLES-->
            <td></td><!--FIRMA JUEVES-->
            <td></td><!--FIRMA VIERNES-->
            <td></td><!--FIRMA SABADO-->
            <td></td><!--FIRMA DOMINGO-->
        </tr>
        <tr>
            <td>5</td>
            <td>
              <input type="text" name="" id="">
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6</td>
            <td>
              <input type="text" name="" id="">
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>7</td>
            <td>
              <input type="text" name="" id="">
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>8</td>
            <td>
              <input type="text" name="" id="">
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>
<td><p class="color-fondo">PERSONAS QUE AUTORIZAN LA ACTIVIDAD (COORDINADOR DE ALTURAS)</p></td>

  <table>
    <tbody>
        <!-- Fila con 10 columnas -->
        <tr>
            <td>NOMBRE COMPLETO</td>
            <td>
              <input type="text" name="" id="">
            </td>
            <td>N° DOC</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>

<td><p class="color-fondo">AYUDANTE DE SEGURIDAD DESIGNADO</p></td>

  <table>
    <tbody>
        <!-- Fila con 10 columnas -->
        <tr>
            <td>NOMBRE COMPLETO</td>
            <td>
              <input type="text" name="" id="">
            </td>
            <td>N° DOC</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>

      <td><p class="color-fondo">CIERRE PERMISO TRABAJO EN ALTURAS</p></td>

      <table>
        <thead>
            <tr>
                <th>NOMBRE COMPLETO</th>
                <th>N° DOCUMENTO</th>
                <th>CARGO</th>
                <th>FIRMA</th>
                <th>FECHA Y HORA DE CIERRE</th>
            </tr>
        </thead>
        <tbody>
            <!-- Segunda fila -->
            <tr>
                <td>
                  <input type="text" name="" id="">
                </td>
                <td>
                  <input type="text" name="" id="">
                </td>
                <td>
                  <input type="text" name="" id="">
                </td>
                <td>
                  <input type="file" name="" id="">
                </td>
                <td>
                  <input type="date">
                  <input type="time">
                </td>
            </tr>
        </tbody>
    </table>
    </div>
    </div>

            <!--FIN DE BIBLIOTECA-->



            <div class="section" id="Historial">
                <h2>Historial</h2>
                <p>Contenido de la sección Biblioteca.</p>
            </div>

            <!--USUARIOS ACTIVOS PARA ENVIAR MENSAJES-->


            <div class="section" id="Usuarios">
            <h1>Usuarios Registrados</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
        <?php while ($usuario = mysqli_fetch_assoc($usuarios)) { ?>
            <tr>
                <td><?php echo $usuario['id']; ?></td>
                <td><?php echo $usuario['primer_nombre']; ?></td>
                <td><?php echo $usuario['email']; ?></td>
                <td>
                    <button class="boton-general" style="--clr: #00ad54;" onclick="abrirChat(<?php echo $usuario['id']; ?>, '<?php echo $usuario['primer_nombre']; ?>')">
                        <span class="boton-decoration"></span>
                        <div class="boton-contenido">
                            <div class="boton_icono">
                                <svg viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg" width="24">
                                    <circle opacity="0.5" cx="25" cy="25" r="23" fill="url(#icon-payments-cat_svg__paint0_linear_1141_21101)"></circle>
                                    <mask id="icon-payments-cat_svg__a" fill="#fff">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M34.42 15.93c.382-1.145-.706-2.234-1.851-1.852l-18.568 6.189c-1.186.395-1.362 2-.29 2.644l5.12 3.072a1.464 1.464 0 001.733-.167l5.394-4.854a1.464 1.464 0 011.958 2.177l-5.154 4.638a1.464 1.464 0 00-.276 1.841l3.101 5.17c.644 1.072 2.25.896 2.645-.29L34.42 15.93z">
                                        </path>
                                    </mask>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M34.42 15.93c.382-1.145-.706-2.234-1.851-1.852l-18.568 6.189c-1.186.395-1.362 2-.29 2.644l5.12 3.072a1.464 1.464 0 001.733-.167l5.394-4.854a1.464 1.464 0 011.958 2.177l-5.154 4.638a1.464 1.464 0 00-.276 1.841l3.101 5.17c.644 1.072 2.25.896 2.645-.29L34.42 15.93z" fill="#fff"></path>
                                    <path d="M25.958 20.962l-1.47-1.632 1.47 1.632zm2.067.109l-1.632 1.469 1.632-1.469zm-.109 2.068l-1.469-1.633 1.47 1.633zm-5.154 4.638l-1.469-1.632 1.469 1.632zm-.276 1.841l-1.883 1.13 1.883-1.13zM34.42 15.93l-2.084-.695 2.084.695zm-19.725 6.42l18.568-6.189-1.39-4.167-18.567 6.19 1.389 4.166zm5.265 1.75l-5.12-3.072-2.26 3.766 5.12 3.072 2.26-3.766zm2.072 3.348l5.394-4.854-2.938-3.264-5.394 4.854 2.938 3.264zm5.394-4.854a.732.732 0 01-1.034-.054l3.265-2.938a3.66 3.66 0 00-5.17-.272l2.939 3.265zm-1.034-.054a.732.732 0 01.054-1.034l2.938 3.265a3.66 3.66 0 00.273-5.169l-3.265 2.938zm.054-1.034l-5.154 4.639 2.938 3.264 5.154-4.638-2.938-3.265zm1.023 12.152l-3.101-5.17-3.766 2.26 3.101 5.17 3.766-2.26zm4.867-18.423l-6.189 18.568 4.167 1.389 6.19-18.568-4.168-1.389zm-8.633 20.682c1.61 2.682 5.622 2.241 6.611-.725l-4.167-1.39a.732.732 0 011.322-.144l-3.766 2.26zm-6.003-8.05a3.66 3.66 0 004.332-.419l-2.938-3.264a.732.732 0 01.866-.084l-2.26 3.766zm3.592-1.722a3.66 3.66 0 00-.69 4.603l3.766-2.26c.18.301.122.687-.138.921l-2.938-3.264zm11.97-9.984a.732.732 0 01-.925-.926l4.166 1.389c.954-2.861-1.768-5.583-4.63-4.63l1.39 4.167zm-19.956 2.022c-2.967.99-3.407 5.003-.726 6.611l2.26-3.766a.732.732 0 01-.145 1.322l-1.39-4.167z" fill="#fff" mask="url(#icon-payments-cat_svg__a)"></path>
                                    <defs>
                                        <linearGradient id="icon-payments-cat_svg__paint0_linear_1141_21101" x1="25" y1="2" x2="25" y2="48" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#fff" stop-opacity="0.71"></stop>
                                            <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                            <span class="boton__texto">Enviar mensaje</span>
                    </div>
                 </button>
               </td>
            </tr>
        <?php } ?>
    </table>
</div>

<!--MENSAJES-->
<div class="section" id="Mensajes">
 <h2>¡PRONTO!</h2>
</div>



            <!--ATENCION PERSONAL SOPORTE-->
            <div class="section" id="Soporte">
                <div class="soport">
                <p>Hola bienvenido</p>
                <p>Si presentas problemas no dudes en comunicarte!</p>
                <p>Rastrear el siguiente QR</p>
                <img class="QRlector" src="/icon/Jeicode.png" width="150px" height="150px">
                <p>O tambien puedes clickear el icono de Whatsapp!</p>
                <div class="btn-whatsapp">
                <a button class="button2" href="https://w.app/Jeicode">
                    WhatsApp
                    <svg viewBox="0 0 48 48" y="0px" x="0px" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98c-0.001,0,0,0,0,0h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303z" fill="#fff"></path><path d="M4.868,43.803c-0.132,0-0.26-0.052-0.355-0.148c-0.125-0.127-0.174-0.312-0.127-0.483l2.639-9.636c-1.636-2.906-2.499-6.206-2.497-9.556C4.532,13.238,13.273,4.5,24.014,4.5c5.21,0.002,10.105,2.031,13.784,5.713c3.679,3.683,5.704,8.577,5.702,13.781c-0.004,10.741-8.746,19.48-19.486,19.48c-3.189-0.001-6.344-0.788-9.144-2.277l-9.875,2.589C4.953,43.798,4.911,43.803,4.868,43.803z" fill="#fff"></path><path d="M24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,4C24.014,4,24.014,4,24.014,4C12.998,4,4.032,12.962,4.027,23.979c-0.001,3.367,0.849,6.685,2.461,9.622l-2.585,9.439c-0.094,0.345,0.002,0.713,0.254,0.967c0.19,0.192,0.447,0.297,0.711,0.297c0.085,0,0.17-0.011,0.254-0.033l9.687-2.54c2.828,1.468,5.998,2.243,9.197,2.244c11.024,0,19.99-8.963,19.995-19.98c0.002-5.339-2.075-10.359-5.848-14.135C34.378,6.083,29.357,4.002,24.014,4L24.014,4z" fill="#cfd8dc"></path><path d="M35.176,12.832c-2.98-2.982-6.941-4.625-11.157-4.626c-8.704,0-15.783,7.076-15.787,15.774c-0.001,2.981,0.833,5.883,2.413,8.396l0.376,0.597l-1.595,5.821l5.973-1.566l0.577,0.342c2.422,1.438,5.2,2.198,8.032,2.199h0.006c8.698,0,15.777-7.077,15.78-15.776C39.795,19.778,38.156,15.814,35.176,12.832z" fill="#40c351"></path><path clip-rule="evenodd" d="M19.268,16.045c-0.355-0.79-0.729-0.806-1.068-0.82c-0.277-0.012-0.593-0.011-0.909-0.011c-0.316,0-0.83,0.119-1.265,0.594c-0.435,0.475-1.661,1.622-1.661,3.956c0,2.334,1.7,4.59,1.937,4.906c0.237,0.316,3.282,5.259,8.104,7.161c4.007,1.58,4.823,1.266,5.693,1.187c0.87-0.079,2.807-1.147,3.202-2.255c0.395-1.108,0.395-2.057,0.277-2.255c-0.119-0.198-0.435-0.316-0.909-0.554s-2.807-1.385-3.242-1.543c-0.435-0.158-0.751-0.237-1.068,0.238c-0.316,0.474-1.225,1.543-1.502,1.859c-0.277,0.317-0.554,0.357-1.028,0.119c-0.474-0.238-2.002-0.738-3.815-2.354c-1.41-1.257-2.362-2.81-2.639-3.285c-0.277-0.474-0.03-0.731,0.208-0.968c0.213-0.213,0.474-0.554,0.712-0.831c0.237-0.277,0.316-0.475,0.474-0.791c0.158-0.317,0.079-0.594-0.04-0.831C20.612,19.329,19.69,16.983,19.268,16.045z" fill-rule="evenodd" fill="#fff"></path>
                </svg>
                </a>
                </button>
            </div>
            </div>
            </div>
        
        
    </main>
    


<!--ANUNCIOS-->

<div id="anuncio" class="anuncio">
    <span class="close-btn">&times;</span>
    <img src="/icon/anuncio.png" alt="Anuncio">
</div>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="/panelapp.js"></script>
    <script type="text/javascript"></script>
</body>
</html>
