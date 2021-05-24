<?php 
    require "../Model/conecct.php";

    $connect=new Connection_db();
    $sql=$connect->conexion();
    $tipoProblema=array( "SITIO WEB",
        " CORREO",
        "EXAMEN EN LINEA",
        "MT.PREVENTICO",
        "PROGRAMACION",
        "REDES",
        "SII",
        "SOFTWARE",
        "EXAMEN DE ADMISION",
        "REUNIONES DIFUSION"
    );


    $areas=array( 
        "M-Mecánica",
        "M-Electrónica",
        "M-Computación ",
        "D-Electrónica ",
        "D-Computación",
        "DEPTO. DE  COMUNICACIÓN Y EVENTOS",
        " DEPTO. DE INGENIERÍA  MECÁNICA    ",
        "DEPTO. DE INGENIERÍA  ELECTRÓNICA                ",
        "DEPTO. DE CIENCIAS COMPUTACIONALES               ",
        "DEPTO. DE RECURSOS FINANCIEROS                   ",
        "DEPTO. DE DESARROLLO ACADÉMICO E IDIOMAS         ",
        "CENTRO DE INFORMACIÓN                            ",
        "DEPTO. DE RECURSOS MATERIALES Y  SERVICIOS       ",
        "DIRECCIÓN                                        ",
        "DEPTO. DE SERVICIOS ESCOLARES                    ",
        "SUBDIRECCIÓN DE SERVICIOS ADMINISTRATIVOS        ",
        "DEPTO. DE ORGANIZACIÓN Y SEGUIMIENTO DE ESTUDIOS ",
        "DEPTO. DE RECURSOS HUMANOS                       ",
        "SUBDIRECCIÓN ACADÉMICA                           ",
        " DEPTO. DE COMUNICACIÓN Y EVENTOS                 ",
        "SUBDIRECCIÓN DE PLANEACIÓN Y VINCULACIÓN         ",
        "DEPTO. CENTRO DE INFORMACIÓN                     ",
        "DEPTO.  DE GESTIÓN TECNOLÓGICA Y VINCULACIÓN"
    );

    header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
    header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
 
    $lis=$connect->showTecnico();

?>

<html >

<head>
<meta http-equiv="Pragma" content="no-cache">
<link rel="stylesheet" href="../Source/css/normalize.css">
<link rel="stylesheet" href="../Source/css/table_crud1.css">
<link rel="stylesheet" href="../Source/css/index.css">

<title></title></head>
<body>
<?php 
include "../include/banner_tenc.php";
?>
<div class="content-admin">

<div class="content-inform">
    <div>
        <div class="list-tecn">
        <select id="tecn"><?php 
   echo '<option disabled selected >Selecionar tecnico</option>';
   foreach($lis as $key=>$item){
    echo '<option value="'.$item['idTecnico'].'">'.$item['nombre'].'</option>';;
   }
   ?></select>
        </div>
        <div class="status">
        <div>Habilidatado<input type="radio" id="status" name="s"></div>
        <div>Desabilitado<input type="radio" id="status" name="s"></div>
        
    </div>

        <div>
            <a> Descargar Archivo SVC</a>
        </div>
    </div>

</div>


<div id="emerger-add" class="emerger-add">
        <div id="contenedor-emerger" class="contenedor-emerger">
            <div id="btn-exit" class="btn-exit">X</div>
                <div>Solución de problemas </div>
                <div>
                         <select id="iddep" >
                            <?php 
                            
                            
                            foreach ($tipoProblema as $item){
                            //   echo '<input type="checkbox" class="check-prob" value="'.$item.'">'.$item;
                             //  echo '<div  class="check-prob" ><a>'.$item."</a></div>";
                             echo "<option>{$item}</option>";
                            }
                            
                            ?>
                            </select></div>
                            <div>DEPARTAMENTO</div>
                           <div>
                                <select id="" >
                                <?php foreach ($areas as $item){
                                echo "<option>{$item}</option>";
                                }?>
                            </select>
                            <div>
                    </div>
                    
        </div>
                    </div>          <button id="btn-add"class="add">Añadir</button>
                   
            
        </div>
</div>

<!--
<div id="conteiner-admin">
    <div class="content-item">
            <div class="home-item"></div>
            <div class="menu_admin">
             <div class="Option-menu"> 
                 <div><a id="pague-tec">TECNICO</a></div>
                 <div><a id="pague-hab">HABILIDAD</a></div>
            </div>    
            </div>
    </div>
-->


    <div>
<table class="table">
<thead>  
  <!-- <tr>  

<td><button class="open-message-add">Agregar Nuevo</button></td></tr>-->
<tr>
            <th >DEPARTAMENTO</th>
            <th>HABILIDAD</th>
            <th>PRIORIDAD</th>
            <th><a  class="open-message-add">arir</a></th>
         
        </tr>
</thead>

<tbody id="bodt">

    </tbody>
   

</table>
</div>
</div>
<script src="../Controller/js/jquey.js"></script>
<script src="../Controller/js/crud.js"></script>
</body>
</html>