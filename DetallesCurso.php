<?php 
 session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Detalles del Curso || SkillHive</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="DetallesCurso.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
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
            
        </div>
    </header>



    <main>

        <section class="curso-intro">
            <img src="imagenes/Curso22.1.jpg" class="course-image">
            <div class="detalles-curso">
                <h2>Maestro del Dibujo Digital: De Principiante a Profesional</h2>
                <p>Aprende a dominar el arte del dibujo digital con técnicas avanzadas y herramientas de última generación</p>
                <p>Este curso es ideal para quienes buscan mejorar sus habilidades en ilustración digital y diseño gráfico. Aprende a trabajar con las herramientas digitales de plataformas como Adobe Ilustrator y Krita</p>
                <p>Curso impartido por el/la docente: <strong>Amanda Torres</strong></p>
        
                <p><strong>Nivel:</strong> <span id="curso-nivel">Intermedio</span></p>  <!-- Nivel del curso -->
                <p><a href="#" class="categoria"><strong>Arte 2D</strong></a></p>
                <p class="precio2">$450</p>
                <div class="valoraciones2">
                    <i class='bx bx-user'></i>
                    <h4>2100</h4>
                    <i class='bx bx-heart'></i>
                    <h4>95%</h4>
                </div>
                <a href="#" class="agregar-carrito btn-3" data-id="19">Agregar al carrito</a>
                <a href="#" class="agregar-carrito btn-3" data-id="19" data-bs-toggle="modal" data-bs-target="#addToWishlistModal">Añadir a lista de deseos</a>
            </div>
        </section>
        

        <!-- Cotización -->
        </section>
        <div class="modal fade" id="addToWishlistModal" tabindex="-1" aria-labelledby="addToWishlistModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addToWishlistModalLabel">Seleccionar Lista de Deseos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="wishlistSelect" class="form-label">Elige la lista de deseos</label>
                                <select class="form-select" id="wishlistSelect">
                                    <option selected>Selecciona una lista</option>
                                    <option value="programacion">Programación</option>
                                    <option value="arte2d">Arte 2D</option>
                                    <!-- Puedes añadir más opciones según sea necesario -->
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-warning">Añadir a Lista</button>
                    </div>
                </div>
            </div>
        </div>

        <section class="media-gallery">
            <h3>Galería del Curso</h3>
            <div class="gallery">
                <img src="imagenes/Curso22.2.png" alt="Foto del curso">
                <img src="imagenes/Curso22.3.png" alt="Foto del curso">
                <img src="imagenes/Curso22.4.jpg" alt="Foto del curso">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/Vu5n2fKXBY0?si=gY4H4ff0oCDkBXCF"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

            </div>
        </section>

        <section class="instructor-info">
            <h3>Sobre el Instructor</h3>
            <img src="imagenes/Instructor1.jpg" alt="Imagen del instructor" class="instructor-image">
            <div class="instructor-text">
                <p><a href="#" class="intructor"><strong>Amanda Torres</strong></a></p>

                <!-- Botón para la cotización -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cotizacionModal">
                    Solicitar Cotización para Clase Privada
                </button>
                <p>Especialista en Desarrollo Web con más de 10 años de experiencia en la industria. Ha trabajado en
                    proyectos internacionales y es apasionada por la enseñanza.</p>
            </div>
            <div class="modal fade" id="cotizacionModal" tabindex="-1" aria-labelledby="cotizacionModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="cotizacionModalLabel">Cotización para Clase Privada</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Para solicitar una cotización para una clase privada, ingrese sus datos y preferencias:
                            </p>
                            <form>
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="detallesClase" class="form-label">Detalles de la clase</label>
                                    <textarea class="form-control" id="detallesClase" rows="3"
                                        placeholder="Ej: Nivel de la clase, duración preferida, etc."
                                        required></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <a href="Chats.html" class="btn btn-warning text-white">enviar solicitud</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

       <section class="comments-section">
         <h3>Comentarios y Calificaciones</h3>
            <div class="comments-list">

            <!-- Comentarios existentes -->
          <div class="comment">
            <img src="imagenes/Persona2.jpg" alt="Imagen del instructor" class="instructor-image">
            <p><a href="#" class="usuario-comment"><strong>Camila Hernández Peña</strong></a></p>
            <h6>20/Agosto/2024</h6>
            <h5>Me fascinó este curso, te enseña un poco de todo, es muy recomendable!</h5>
          </div>

          <div class="comment">
            <img src="imagenes/Persona1.jpg" alt="Imagen del instructor" class="instructor-image">
            <p><a href="#" class="usuario-comment"><strong>Juan Pérez</strong></a></p>
            <h6>16/Septiembre/2024</h6>
            <h5>Excelente curso, muy completo.</h5>
          </div>
         </div>
    
    <div class="add-comment" id="add-comment-section" style="display: none;"> <!-- Ocultar inicialmente -->
        <h4>Agregar nuevo comentario</h4>
        <textarea placeholder="Escribe tu comentario aquí"></textarea>
        <button>Enviar Comentario</button>
    </div>
</section>

<script>
    let cursoComprado = false; // Curso comprado = true

    if (cursoComprado) {
        document.getElementById('add-comment-section').style.display = 'block'; // Comentarios
    } else {
        document.getElementById('add-comment-section').style.display = 'none'; 
    }
</script>


        <hr>

        <section class="cursos-similares">

            <h2>--Cursos similares--</h2>
            <div class="Cursos_s">

                <div class="CursoS_1">
                    <div class="curso">
                        <img src="imagenes/Curso33.jpg">
                        <div class="curso-txt">
                            <h3><a href="DetallesCurso.html" class="link-curso">Concept Art para Videojuegos: Diseño de
                                    Mundos y Personajes</a></h3>
                            <p>Curso sobre la creación de concept art para videojuegos, incluyendo técnicas para diseñar
                                mundos, personajes y elementos visuales que apoyen la narrativa del juego</p>
                            <p class="precio">$615</p>

                            <div class="valoraciones">
                                <i class='bx bx-user'></i>
                                <h4>690</h4>
                                <i class='bx bx-heart'></i>
                                <h4>92%</h4>
                            </div>

                            <a href="#" class="agregar-carrito btn-3" data-id="30">Agregar al carrito</a>
                        </div>
                    </div>
                </div>

                <div class="CursoS_1">
                    <div class="curso">
                        <img src="imagenes/Curso34.jpg">
                        <div class="curso-txt">
                            <h3><a href="DetallesCurso.html" class="link-curso">Arte en 2D para Animación: Crea
                                    Personajes y Escenarios para Movimiento</a></h3>
                            <p>Aprende a crear arte 2D para animación, incluyendo la creación de personajes y escenarios
                                que puedan ser animados de manera efectiva</p>
                            <p class="precio">$550</p>

                            <div class="valoraciones">
                                <i class='bx bx-user'></i>
                                <h4>740</h4>
                                <i class='bx bx-heart'></i>
                                <h4>97%</h4>
                            </div>

                            <a href="#" class="agregar-carrito btn-3" data-id="31">Agregar al carrito</a>
                        </div>
                    </div>
                </div>

                <div class="CursoS_1">
                    <div class="curso">
                        <img src="imagenes/Curso35.jpg">
                        <div class="curso-txt">
                            <h3><a href="DetallesCurso.html" class="link-curso">Dibujo de Retratos: Captura la Esencia
                                    de las Personas</a></h3>
                            <p>Aprende técnicas para dibujar retratos realistas y expresivos, enfocándote en las
                                características faciales, la expresión y el detalle</p>
                            <p class="precio">$360</p>

                            <div class="valoraciones">
                                <i class='bx bx-user'></i>
                                <h4>340</h4>
                                <i class='bx bx-heart'></i>
                                <h4>90%</h4>
                            </div>

                            <a href="#" class="agregar-carrito btn-3" data-id="32">Agregar al carrito</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </main>

    <footer class="footer-container">
        <?php include 'footer.php'; ?>
    </footer>


</body>