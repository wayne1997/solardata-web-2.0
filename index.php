<?php
    require_once './config.php';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="./public/css/styles.css" />
        <link rel="stylesheet" href="public/bootstrap/css/bootstrap.css" />
        <title>Solar data</title>
    </head>
<body>
    <nav class="navbar sticky-top navbar-dark bg-dark navbar-expand-lg">
        <div class="container-fluid">
              <a class="navbar-brand">
                  <img src="public/assets/iconfie.png" alt="" width="110" height="60" class="d-inline-block align-text-center">
              </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                <div class="container-fluid d-flex justify-content-between">
                    <ul class="navbar-nav me-aut mb-2 mb-lg-0">
                        <li class="nav-item" >
                            <a class="nav-link" href="#hero">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#graficos">Gráficos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#info">Información</a>
                        </li>
                    </ul>
                    <div >
                     <button type="button" class="btn btn-outline-light mt-2"  data-bs-toggle="modal" data-bs-target="#informeModal">
                         Obtener reporte
                     </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="modal fade" id="informeModal" tabindex="-1" aria-labelledby="informeModalTitulo" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title text-light" id="infomeModalTitulo">Descargar reporte</h4>
                    <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Cerrar"> </button>   
                </div>
                <form action="report_csv.php" method="POST">
                <div class="modal-body">
                        <div class="container">
                            <h5>Selecciona el rango de fechas</h5>
                            <div class="row p-3">               
                                <div class="col-sm">
                                    <label for="firstDate">Desde: </label>
                                    <input class="form-control" type="date" id="firstDate" name="sinceDate" required>
                                </div>
                                <div class="col-sm">
                                    <label for="secondDade">Hasta: </label>
                                    <input class="form-control" type="date" id="secondDade" name="cutOfDate" required>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"  > Descargar reporte</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <section class="text-center bg-image" id="hero" style="">
        <div class="mask">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h2 class="animated mb-3 title">FACULTAD DE INFORMÁTICA Y ELECTRÓNICA</h2>
                    <hr/>
                    <h4 class="mb-3"> Datos de irradiancia solar en Riobamba, Ecuador.</h4>
                </div>
            </div>
        </div>
    </section>
    <section class="container mt-3">
        <div class=" row">
        <div class="col-lg-6" >
            <h2 class="display-1 mb-4" >Necesitamos de tu ayuda</h2>
            <p class="h5 text-muted ">
                Nuestro compromiso con el servicio que proporcionamos es grande, por esta razón, necesitamos de tu ayuda. Puedes apoyar a este  proyecto llenando un cuestionario o donando dinero.
            </p>
            <div class="container-fluid  row mt-5">
                <div class="col-lg-6 p-2 ">
                    <a href="https://forms.office.com/r/2WgpbaAgP9"  class="btn btn-outline-primary"  >Hacer cuestionario</a>
                </div>
                
            </div>
        </div>
        <div class="col-lg-6" >
             <img class="img-fluid" src="./public/assets/centrado_image.png" alt="imagen donacion">
        </div>
        </div>
    </section>
    <main class="mt-3" >
        <h2 id="graficos">Presentación de los datos</h2>
        <div class="container-fluid row">
            <div class="col-lg-7 text-justify">
                <p> Mediante Trabajo de Integración Curricular, denominado ¨Desarrollo de un instrumento autónomo para la medición indirecta y registro de datos de irradiancia solar basado en sensores de silicio¨ se registran en los siguientes gráficos curvas
                    de irradiancia solar a lo largo del presente día, como también temperatura del instrumento sensor debido a la alta dependencia del modelo esadístico obtenido con la temperatura del sensor de silicio. En el gráfico de la derecha se detalla los errores obtenidos mediante el modelo empleado en este trabajo para la obtención de datos de irradiancia solar.
                </p>

                <p> Cabe mencionar que el modelo esdístico empleado relaciona parámetros de corriente de cortocircuito del sensor de silicio con la radiación solar incidente, debido  a las características lineales ofrecidas. Obteniendo un modelo lineal con
                    un coeficiente de terminación R<sup>2</sup> de 0.9948 y un error cuadrático medio de ± 30.16 W/m<sup>2</sup>  por mA.
                </p>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <img  src="public/assets/RSME_modeloPredic2.svg" alt="Error del modelo predictivo">
                </div>
            </div>
        </div>
        <div class="graph-container mt-3">
            <h3> Irradiancia solar a lo largo del día </h3>
            <p id="irradianciaDate">
            </p>
            <canvas id="myChart" width="300" height="150"></canvas>
        </div>

        <div class="graph-container mt-3">
            <h3>Temperatura del sensor a lo largo del día</h3>
            <p id="temperatureDate"></p>
            <canvas id="myChart2" width="300" height="150"></canvas>
        </div>
        <seccion id="info">
            <h2 class="text-center">Información del instrumento recolector de datos de irradiancia solar</h2>
            <div class="container-fluid justfy-content-center row">
                <div class="col text-justify">
                    <div class="card col-md-6 float-md-end mb-3 ms-md-3">
                        <img  class="card-img-top" src="public/assets/sensor_irradiancia.jpeg" alt="Error del modelo predictivo">
                        <div class="card-body">
                            <h5 class="card-title text-center">Instrumento recolector</h5>
                        </div>
                    </div>
                    <p>
                    El instrumento recolector de datos de irradiancia se encuentra ubicado en el techo del Laboratorio de Robótica e Industria 4.0 de la Facultad de Informática y Electrónica, ubicada en el mismo lugar donde se instalaron un conjunto de paneles solares para aprovechamiento del recurso solar disponible en la zona, este dispositivo conectado a la red WiFi de los laboratorios realiza mediciones indirectas a través de sensores de silicio, o en su conjunto el módulo fotovoltaico NPAH-5S, que mediante el modelamiento estadístico de sus características eléctricas influenciadas por el cambio y variación de la radiación solar incidente y temperatura en la superficie del panel solar, se logra obtener la datos de radiación solar con un error ±71.31 W/m2 por hora de registro y de ±36.64 W/𝑚2 por promedio diario de registro, además de un error del 34.64 % en mediciones por hora y de 15.83% en mediciones promedio diario de radiación solar. Una de las características interesantes del instrumento es du autonomía energética, gracias al módulo fotovoltaico de 5W de potencia, es posible recargar sus baterías en días de iluminación solar con un índice de 1.1% de carga diaria promedio sobre su voltaje inicial, es decir que si el voltaje inicial es de 10.1 V. durante un día con una radiación sola promedio mayor a 500 W/𝑚2 las baterías ganarán un voltaje de 111.11 mV., terminando la jornada de trabajo a las 19:00 con un voltaje de 10.2111, su índice de descarga es de 0,53% sobre el voltaje inicial de descarga. El instrumento forma parte de la primera red de dispositivos inteligentes que envían datos automáticamente y los presentan en una página web accesibles y descargables para el usuario en interés, dentro de la Facultad de Informática y Electrónica, ESPOCH; contribuyendo al desarrollo energético sustentable, ambiental e intelectual de la institución y localidad. 
                    </p>
                    <span class="fst-italic">
                    -Kevin Alarcón M.
                </span>
                </div>
            </div>
        </seccion>
    </main>

    <section class="container mb-5">
        <h2 class="text-center mb-3" >Datos informativos del instrumento recolector de datos de irradiancia solar </h2>
        <div class="row">
                <div class="col-md-4 p-2" >
                    <div class="card detalles-card">
                            <div class="card-header bg-primary" >
                                <h5 class="text-light text-center" > Proyecto de investigación </h5>
                            </div>
                                <div class="card-body">
                                    <p>
                                    Conforma el Proyecto de Investigación denominado “Convertidores DC/DC de Alta Eficiencia basado en dispositivos WBG para aplicaciones en Tecnología Vehicular Eléctrica (ConAE-TVE)” de la Facultad de Informática y Electrónica, dentro del GITEA.  
                                    </p>
                                </div>
                        </div>
                </div>
                <div class="col-md-4 p-2" >
                    <div class="card detalles-card">
                                <div class="card-header bg-primary" >
                                    <h5 class="text-light text-center" > Trabajo de Integración Curricular</h5>
                                </div>
                                <div class="card-body">
                                    <p>
                                    Desarrollado de acuerdo al Trabajo de Integración Curricular denominado “Desarrollo de un instrumento autosustentable para la medición indirecta y registro de datos de irradiancia solar basado en sensores de silicio” desarrollado por Kevin Alarcón y Jorge Hernández PhD como director.
                                    </p>
                                </div>
                        </div>
                </div>
                <div class="col-md-4 p-2" >
                        <div class="card detalles-card">
                                <div class="card-header bg-primary" >
                                    <h5 class="text-light text-center" > Datos técnicos </h5>
                                </div>
                                <div class="card-body">
                                    <p>
                                    El instrumento desarrollado es un sensor de radiación solar de medición indirecta, ya que mide corriente a través de un circuito de cortocircuito y un medidor de potencia y corriente INA 226, a partir de sensores de silicio que transducen la irradiancia incidente en corriente y voltaje eléctrico. 
                                    </p>
                                </div>
                        </div>
                </div>
        </div>

        <div class="row mt-4">
                <div class="col-md-4 p-2" >
                        <div class="card detalles-card">
                                <div class="card-header bg-primary" >
                                    <h5 class="text-light text-center" >Rango de error</h5>
                                </div>
                                <div class="card-body">
                                    <p>
                                    La estrecha relación de la temperatura de los sensores de silicio con la corriente generada, hace que el error de la radiación solar presentada dependa directamente de los niveles de temperatura percibidas en la superficie del instrumento, por lo cual se presentan gráficas de temperatura del panel a lo largo del día de recolección de datos.
                                    </p>
                                </div>
                        </div>
                </div>
                <div class="col-md-4 p-2" >
                        <div class="card detalles-card">
                                <div class="card-header bg-primary" >
                                    <h5 class="text-light text-center" >Sensores</h5>
                                </div>
                                <div class="card-body">
                                    <p>
                                    El instrumento incluye un transductor de precisión analógico de temperatura LM35, debido a su significativo tamaño de empaque TO-92, linealidad de +10 mV/&degC y una precisión de &plusmn 0.25 &degC a temperatura ambiente y &plusmn 0.75&deg entre -55  y + 150&degC. Este sensor está ubicado en la parte posterior del módulo solar NPA5S-12H de 5W de potencia. 
                                    </p>
                                </div>
                        </div>
                </div>
                <div class="col-md-4 p-2" >
                        <div class="card detalles-card">
                                <div class="card-header bg-primary" >
                                    <h5 class="text-light text-center" > Comunicación IoT </h5>
                                </div>
                                <div class="card-body">
                                    <p>
                                    La comunicación se la garantizó mediante el protocolo de comunicación MQTT, conocido por sus buenas características al integrarse en sistemas IoT. La publicación de datos se la hace cada 15 minutos, obteniendo una casi nula pérdida de datos durante todo el tiempo de medición.  
                                    </p>
                                </div>
                        </div>
                </div>
        </div>
    </section>

    <footer class="d-flex justify-content-center bg-dark" >
        <section class="p-4">
            <div class="text-center">
                <h6 class="text-white"> Desarrollado por: DONA | Facultad de Informática y Electrónica, 2022. </h6>
            </div>
        </section>
    </footer>
    <script src="<?php echo SERVERURL; ?>public/js/typed.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.2/chart.js" integrity="sha512-/MqITtqQfmjLnDtBC8yxrsERbn3dvqyxtc1B/3x57xp+J3srVBcgyr9VXgDj8BYScxSJ9MauIMY7F9Fr2TJHkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        <?php
            require 'database.php';
            $db = DbConnect::getInstance();
            $con = $db->connection();
            $sinceDate = date('d-m-Y');             
            $irraQuery = "SELECT TRUNCATE(TEMPERATURA, 2) as TEMPERATURA, TRUNCATE(IRRADIANCIA, 2) as IRRADIANCIA, DATE_FORMAT(FECHA, \"%H:%i\") as HORA 
            FROM testdb.data WHERE FECHA BETWEEN '$sinceDate 5:30' AND '$sinceDate 19:30' ";
            $report = $con->query($irraQuery);

            $i = array();
            $h = array();
            $t = array();
            while( $row = $report->fetch(PDO::FETCH_ASSOC) ){
                array_push($i,$row["IRRADIANCIA"]);
                array_push($h,$row["HORA"]);
                array_push($t,$row["TEMPERATURA"]);
            }
                       
            $con = null;
        ?>
        
        const ctx = document.getElementById('myChart');
        const myChart = new Chart(ctx, {
            type: 'line',
            data:{
                labels:[<?php echo  "'".implode("','", $h)."'";?>],
                datasets:[{
                    label: 'Irradiancia',
                    data:  [<?php echo implode( ",",  $i);?>],
                    fill: false,
                    borderColor: 'rgb(17, 150, 203)',
                    tension: 0.1
                }],
            },
            options: {
                scales: {

                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctx2 = document.getElementById('myChart2');
        const myChart2 = new Chart(ctx2, {
            type: 'line',
            data:{
                labels:[<?php echo "'".implode("','", $h)."'";?>],
                datasets:[{
                    label: 'Temperatura',
                    data: [<?php echo implode(",", $t);?>],
                    fill: false,
                    borderColor: 'rgb(229, 171, 40)',
                    tension: 0.1
                }],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script src="<?php echo SERVERURL?>public/js/index.js"></script>
    <script src="<?php echo SERVERURL ?>public/bootstrap/js/bootstrap.js" ></script>
</body>
</html>
