<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BOOSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="ventasEstilos.css">
    <link rel="stylesheet" href="Nav_foot.css">

    <title>Ventas || SkillHive</title>
</head>
<body>

    <header class="header">
        <div class="menu container">
            <div class="imagen-logo">
                <img src="imagenes/Logo2.png" alt="Logo" class="logo"> 
            </div>
            <a href="#" class="logo">SkillHive</a>
            
            <input type="checkbox" id="menu"/>
            <label for="menu">
                <i class='bx bx-menu'></i>
            </label>
            
            <nav class="navbar">
                <ul> 
                    <?php include_once 'menu.php' ?>
                </ul>
            </nav>
            
            <div>
                <ul>
                    <li class="submenu">
                        <a href="Pago.html">
                            <i class='bx bxs-cart' id="img-carrito"></i>
                        </a>
                        <div id="carrito">
                            <table id="lista-carrito">
                                <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <a href="#" id="vaciar-carrito" class="btn-2">Vaciar Carrito</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>



    
    <div class="row">
        <h2>VENTAS</h2>
        <!-- COLUMNA IZQUIERDA-->

        <div class="col col-3">

            <div class="text-center">
                
                <div class="contenedorIzq">
                    <div class="cursos">
                        <h3>MIS CURSOS</h3>
                        <select class="ComboCursos">
                            <option selected="true" disabled="disabled">--Seleccione un curso--</option>
                            <option value="valor">Cocina para principiantes</option>
                            <option value="valor2">Programación Orientada a Objetos</option>
                            <option value="valor3">Dibujo de Anatomía Humana</option>
                        </select>
                    </div>
                        
                    <div>
                        <h3>FILTROS</h3>
                        <h4>Categoría</h4>
                        <select name="Categoría">
                            <option selected="true" disabled="disabled">---</option>
                            <option value="">Dibujo</option>
                            <option value="">Programación</option>
                            <option value="">Cocina</option>
                            <option value="">Todos</option>

                        </select>
    
                        <h4>Rango de fechas</h4>
    
                        <h5>Fecha 1</h5>
                        <input class="fecha" type="date">
    
                        <h5>Fecha 2</h5>
                        <input class="fecha" type="date">
    
                        <div>
                            <button class="boton">Filtrar</button>
                        </div>
                        
                    </div>
                </div>
               
            </div>

        </div>

        <!--COLUMNA DERECHA-->

        <div class="col col-9">
            <div class="text-center">

                <div class="contenedorDer">
                    <h4 class="titulo">Información General</h3>
                    <div class="infoGeneral">
                        <table class="table">
                         <thead>
                         <tr>
                            <th scope="col" class="fondoTabla">Curso</th>
                            <th scope="col" class="fondoTabla">Cant. de ventas</th>
                            <th scope="col" class="fondoTabla">Costo del curso</th>
                            <th scope="col" class="fondoTabla">Ingresos totales</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Cocina para principiantes</td>
                                <td>2</td>
                                <td>$250</td>
                                <td>$500</td>
                            </tr>
                            
                            </tbody>
                        </table>

                     </div>
                
                    <h4 class="titulo">Información de ventas</h4>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col" class="fondoTabla">#</th>
                            <th scope="col" class="fondoTabla">Alumno</th>
                            <th scope="col" class="fondoTabla">Niveles Cursados / Niveles totales</th>
                            <th scope="col" class="fondoTabla">Ingreso</th>
                            <th scope="col" class="fondoTabla">Método de pago</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Emily Grace Castro Chacón</td>
                            <td>3 / 5</td>
                            <td>$250</td>
                            <td>VISA</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Elizabeth Cantú</td>
                            <td>5 / 5</td>
                            <td>$250</td>
                            <td>VISA</td>
                        </tr>
                        
                        </tbody>
                    </table>

                    <h4 class="titulo">Todos los cursos</h4>
                           
                    <table class="table">
                            
                        <thead>
                            <tr>
                               
                            <th scope="col" class="fondoTabla">Cant. de ventas</th>
                            <th scope="col" class="fondoTabla">Suma total</th>
                        
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>3</td>
                            <td>$750</td>
                            </tr>
                                
                        </tbody>
                    </table>
    
                </div>
            </div>
        </div>
         
    </div>
    
    
</body>
</html>