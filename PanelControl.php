<?php 
 session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="Global.css">
    <link rel="stylesheet" href="Nav_foot.css">
    <link rel="stylesheet" href="PanelControlEstilos.css">

    <title>Panel de Control || Skillhive</title>
</head>
<body>

    <!-- NAVBAR -->
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
            
        </div>
    </header>

    <div class="container">
        <h2 class="title">Panel de Control</h2>
        <div class="row">
            
            <div class="col-2 filter-container">
                <h3 class="subtitle">Filtro</h3>
                <form action="" class="form">
                   
                    <select id="type" name="type" required>
                        <option value="">Usuarios</option>
                        <option value="">Comentarios</option>
                    </select>

                    <button type="submit" class="btn">Siguiente</button>
                </form>
            </div>
            <div class="col-10 result-container">
                <h3 class="subtitle">Control de Usuarios</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Bloquear/Desbloquear</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>SweetDreams</td>
                            <td>Emily Grace</td>
                            <td>Habilitado</td>
                            <td><a href=""><i class='ico-delete bx bx-x'></i></a></td>

                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>SweetDreams</td>
                            <td>Emily Grace</td>
                            <td>Habilitado</td>
                            <td><a href=""><i class='ico-delete bx bx-x'></i></a></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>SweetDreams</td>
                            <td>Emily Grace</td>
                            <td>Bloqueado</td>
                            <td><a href=""><i class='ico-delete bx bx-x'></i></a></td>
                        </tr>
                    </tbody>
                  </table>


                  <h3 class="subtitle">Control de Comentarios</h3>
                  <table class="table">
                      <thead>
                          <tr>
                              <th scope="col"></th>
                              <th scope="col">Usuario</th>
                              <th scope="col">Comentario</th>
                              <th scope="col">Curso</th>
                              <th scope="col">Eliminar</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <th scope="row">1</th>
                              <td>SweetDreams</td>
                              <td>Muy buen curso!</td>
                              <td>Cocina básica</td>
                              <td><a href=""><i class='ico-delete bx bx-x'></i></a></td>
                          </tr>
                          <tr>
                              <th scope="row">2</th>
                              <td>SweetDreams</td>
                              <td>A mi hamster le gustó mucho</td>
                              <td>Cómo educar a tu hámster sobre la salud mental</td>
                              <td><a href=""><i class='ico-delete bx bx-x'></i></a></td>
                          </tr>
                          <tr>
                                <th scope="row">3</th>
                                <td>Elisio</td>
                                <td>Devuélvanme mi dinero! >:c</td>
                                <td>Cómo ser tu propio jefe</td>
                                <td><a href=""><i class='ico-delete bx bx-x'></i></a></td>
                            </tr>
                      </tbody>
                </table>
            </div>
        </div>

        <div class="form-information">
            <div class="form-information-childs">
                

            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="footer-container">
        <?php include 'footer.php'; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    
</body>
</html>