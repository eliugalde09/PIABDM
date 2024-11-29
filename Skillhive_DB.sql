CREATE DATABASE Skillhive_DB;  
USE Skillhive_DB;  
DROP DATABASE Skillhive_DB;

-- Tabla: Usuarios 
CREATE TABLE Usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,     
    nombre VARCHAR(255) NOT NULL,     
    nom_usuario VARCHAR(255) NOT NULL,     
    correo VARCHAR(255) UNIQUE NOT NULL,     
    contrasena VARCHAR(255) NOT NULL,     
    fecha_nacimiento DATE,     
    imagen_perfil BLOB,     
    genero ENUM('Femenino', 'Masculino', 'No binario', 'Otro') NOT NULL,     
    rol ENUM('Administrador', 'Instructor', 'Estudiante') NOT NULL,     
    estado ENUM('activo', 'inactivo') DEFAULT 'activo',     
    fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP,   
    fecha_modificacion DATETIME 
);

-- Tabla: Categorías 
CREATE TABLE Categorias (     
    id INT PRIMARY KEY AUTO_INCREMENT,     
    nombre VARCHAR(255) NOT NULL,     
    descripcion TEXT,     
    id_creador INT,     
    estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',     
    fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP,     
    FOREIGN KEY (id_creador) REFERENCES Usuarios(id) ON DELETE CASCADE 
);  

-- Tabla: Cursos 
CREATE TABLE Cursos (     
    id INT PRIMARY KEY AUTO_INCREMENT,     
    nombre VARCHAR(255) NOT NULL,     
    descripcion TEXT NOT NULL,     
    detalles TEXT,     
    categoria_id INT,     
    video BLOB,     
    contenido1 BLOB,     
    contenido2 BLOB,     
    contenido3 BLOB,     
    portada BLOB,     
    id_instructor INT,     
    costo DECIMAL(10, 2) NOT NULL,     
    estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',     
    fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP,     
    FOREIGN KEY (categoria_id) REFERENCES Categorias(id) ON DELETE CASCADE,     
    FOREIGN KEY (id_instructor) REFERENCES Usuarios(id) ON DELETE CASCADE 
);  

-- Tabla: Chats
CREATE TABLE Chats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    instructor_id INT,
    mensaje TEXT,
    fecha_hora DATETIME,
    FOREIGN KEY (usuario_id) REFERENCES Usuarios(id),
    FOREIGN KEY (instructor_id) REFERENCES Usuarios(id)
);

-- Tabla: Registros 
CREATE TABLE Registro(     
    id INT PRIMARY KEY AUTO_INCREMENT,     
    id_curso INT,     
    id_usuario INT,     
    estado VARCHAR(255),     
    fecha_inscripcion DATE,     
    ultimo_acceso DATE,     
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id) ON DELETE CASCADE,     
    FOREIGN KEY (id_curso) REFERENCES Cursos(id) ON DELETE CASCADE 
);  

-- Tabla: Metodo de Pago
CREATE TABLE MetodoPago(     
    id_metodo INT PRIMARY KEY AUTO_INCREMENT,     
    nombre_propietario VARCHAR(255),     
    numero INT,
    CVV INT NOT NULL,    
    fecha_agregado DATE,     
    id_usuario INT,     
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id) ON DELETE CASCADE 
);  

-- Tabla: Venta 
CREATE TABLE Venta(      
    id_venta INT PRIMARY KEY AUTO_INCREMENT,     
    id_curso INT,     
    id_usuario INT,     
    monto INT,     
    fecha_venta DATE,     
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id) ON DELETE CASCADE,     
    FOREIGN KEY (id_curso) REFERENCES Cursos(id) ON DELETE CASCADE 
);  

-- Tabla: Progreso del Estudiante 
CREATE TABLE ProgresoEstudiante (     
    id INT PRIMARY KEY AUTO_INCREMENT,     
    id_usuario INT,     
    id_curso INT,     
    progreso FLOAT,     
    fecha_actualizacion DATETIME DEFAULT CURRENT_TIMESTAMP,     
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id) ON DELETE CASCADE,     
    FOREIGN KEY (id_curso) REFERENCES Cursos(id) ON DELETE CASCADE 
);  

-- Tabla: Módulos
CREATE TABLE Modulos (
    id INT PRIMARY KEY AUTO_INCREMENT,     
    nombre VARCHAR(255) NOT NULL,     
    tipo_contenido ENUM('video', 'imagen', 'documento') NOT NULL, 
    archivo BLOB,  
    curso_id INT,    
    estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
    fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP,     
    FOREIGN KEY (curso_id) REFERENCES Cursos(id) ON DELETE CASCADE
);

-- Tabla: Curso-Usuario
CREATE TABLE CursoUsuario (
    id INT PRIMARY KEY AUTO_INCREMENT,     
    id_usuario INT NOT NULL,     
    id_curso INT NOT NULL, 
    modulo_actual INT,  
    modulos_totales INT,    
    fecha_inscripcion DATETIME DEFAULT CURRENT_TIMESTAMP,     
    FOREIGN KEY (id_curso) REFERENCES Cursos(id) ON DELETE CASCADE
);

-- Procedimientos almacenados

-- Agregar Usuario/Registro 
DELIMITER // 
CREATE PROCEDURE AgregarUsuario(     
IN nombre VARCHAR(255),      
IN nom_usuario VARCHAR(255),      
IN correo VARCHAR(255),      
IN contrasena VARCHAR(255),      
IN fecha_nacimiento DATE,      
IN imagen_perfil BLOB,      
IN genero ENUM('Femenino', 'Masculino', 'No binario', 'Otro'),      
IN rol ENUM('Administrador', 'Instructor', 'Estudiante'), 
IN estado ENUM('Activo', 'Inactivo')
)
BEGIN
    INSERT INTO Usuarios (nombre, nom_usuario, correo, contrasena, fecha_nacimiento, imagen_perfil, genero, rol, estado) 
    VALUES (nombre, nom_usuario, correo, contrasena, fecha_nacimiento, imagen_perfil, genero, rol, estado);
END //
DELIMITER ;

-- LogIn
DELIMITER //
CREATE PROCEDURE loguear_usuario(IN p_usuario VARCHAR(255), IN p_password VARCHAR(255))
BEGIN
    SELECT * FROM Usuarios 
    WHERE nom_usuario = p_usuario 
    AND contrasena = p_password;
END //
DELIMITER ;

-- Buscar Usuario
DELIMITER //
CREATE PROCEDURE buscar_usuario(IN p_id INT)
BEGIN
    SELECT * FROM Usuarios WHERE id = p_id; 
END //
DELIMITER ;

-- Actualizar Estado de Usuario
DELIMITER //
CREATE PROCEDURE ActualizarEstadoUsuario(IN id INT, IN nuevo_estado ENUM('Activo', 'Inactivo'))
BEGIN
    UPDATE Usuarios SET estado = nuevo_estado WHERE id = id;
END //
DELIMITER ;

DROP PROCEDURE IF EXISTS ActualizarEstadoUsuario;

--Editar Usuario
DELIMITER //
CREATE PROCEDURE ActualizarUsuario(IN nombre VARCHAR(255), IN dob DATE, IN genero VARCHAR(255))
BEGIN 
    UPDATE usuarios SET nombre = nombre,
    genero = genero,
    fecha_nacimiento = dob;
END //
DELIMITER ;

-- Agregar Categoría
DELIMITER //
CREATE PROCEDURE AgregarCategoria(IN nombre VARCHAR(255), IN descripcion TEXT, IN id_creador INT)
BEGIN
    INSERT INTO Categorias (nombre, descripcion, id_creador) VALUES (nombre, descripcion, id_creador);
END //
DELIMITER ;

-- Obtener Lista de Categorías
DELIMITER //
CREATE PROCEDURE ObtenerCategorias()
BEGIN
    SELECT * FROM Categorias;
END //
DELIMITER ;

-- Actualizar Categoría
DELIMITER //
CREATE PROCEDURE ActualizarCategoria(IN id INT, IN nuevo_nombre VARCHAR(255), IN nueva_descripcion TEXT, IN nuevo_estado ENUM('Activo', 'Inactivo'))
BEGIN
    UPDATE Categorias SET nombre = nuevo_nombre, descripcion = nueva_descripcion, estado = nuevo_estado WHERE id = id;
END //
DELIMITER ;

-- Eliminar Categoría
DELIMITER //
CREATE PROCEDURE EliminarCategoria(IN id INT)
BEGIN
    DELETE FROM Categorias WHERE id = id;
END //
DELIMITER ;

-- Agregar Curso
DELIMITER //
CREATE PROCEDURE AgregarCurso(
    IN nombre VARCHAR(255), 
    IN descripcion TEXT, 
    IN detalles TEXT, 
    IN categoria_id INT, 
    IN id_instructor INT, 
    IN costo DECIMAL(10, 2), 
    IN estado ENUM('Activo', 'Inactivo')
)
BEGIN
    INSERT INTO Cursos (nombre, descripcion, detalles, categoria_id, id_instructor, costo, estado) 
    VALUES (nombre, descripcion, detalles, categoria_id, id_instructor, costo, estado);
END //
DELIMITER ;

DROP PROCEDURE IF EXISTS AgregarCurso; 

-- Agregar Módulo
DELIMITER //
CREATE PROCEDURE AgregarModulo(
    IN nombre VARCHAR(255), 
    IN tipo_contenido ENUM('video', 'imagen', 'documento'), 
    IN archivo BLOB, 
    IN curso_id INT, 
    IN estado ENUM('Activo', 'Inactivo')
)
BEGIN
    INSERT INTO Modulos (nombre, tipo_contenido, archivo, curso_id, estado) 
    VALUES (nombre, tipo_contenido, archivo, curso_id, estado);
END //
DELIMITER ;

-- Obtener Módulos por Curso
DELIMITER //
CREATE PROCEDURE ObtenerModulosPorCurso(IN curso_id INT)
BEGIN
    SELECT * FROM Modulos WHERE curso_id = curso_id;
END //
DELIMITER ;

-- Obtener Cursos por Categoría
DELIMITER //
CREATE PROCEDURE ObtenerCursosPorCategoria(IN categoria_id INT)
BEGIN
    SELECT * FROM Cursos WHERE categoria_id = categoria_id;
END //
DELIMITER ;

-- Actualizar Curso
DELIMITER //
CREATE PROCEDURE ActualizarCurso(
    IN id INT, 
    IN nuevo_nombre VARCHAR(255), 
    IN nueva_descripcion TEXT, 
    IN detalles TEXT, 
    IN categoria_id INT, 
    IN id_instructor INT, 
    IN costo DECIMAL(10, 2), 
    IN nuevo_estado ENUM('Activo', 'Inactivo')
)
BEGIN
    UPDATE Cursos SET nombre = nuevo_nombre, descripcion = nueva_descripcion, detalles = detalles, categoria_id = categoria_id, id_instructor = id_instructor, costo = costo, estado = nuevo_estado WHERE id = id;
END //
DELIMITER ;

-- Actualizar Módulo
DELIMITER //
CREATE PROCEDURE ActualizarModulo(
    IN id INT, 
    IN nuevo_nombre VARCHAR(255), 
    IN nuevo_tipo_contenido ENUM('video', 'imagen', 'documento'), 
    IN nuevo_archivo BLOB, 
    IN nuevo_estado ENUM('Activo', 'Inactivo')
)
BEGIN
    UPDATE Modulos 
    SET nombre = nuevo_nombre, tipo_contenido = nuevo_tipo_contenido, archivo = nuevo_archivo, estado = nuevo_estado
    WHERE id = id;
END //
DELIMITER ;

-- Eliminar Curso
DELIMITER //
CREATE PROCEDURE EliminarCurso(IN id INT)
BEGIN
    DELETE FROM Cursos WHERE id = id;
END //
DELIMITER ;

-- Enviar Mensaje en Chat
DELIMITER //
CREATE PROCEDURE EnviarMensaje(IN id_remitente INT, IN id_destinatario INT, IN mensaje TEXT)
BEGIN
    INSERT INTO Chats (id_remitente, id_destinatario, mensaje) VALUES (id_remitente, id_destinatario, mensaje);
END //
DELIMITER ;

-- Obtener Mensajes de un Chat
DELIMITER //
CREATE PROCEDURE ObtenerMensajes(IN id_remitente INT, IN id_destinatario INT)
BEGIN
    SELECT * FROM Chats WHERE (id_remitente = id_remitente AND id_destinatario = id_destinatario) 
    OR (id_remitente = id_destinatario AND id_destinatario = id_remitente);
END //
DELIMITER ;

-- Eliminar Mensaje
DELIMITER //
CREATE PROCEDURE EliminarMensaje(IN id INT)
BEGIN
    DELETE FROM Chats WHERE id = id; 
END 
// DELIMITER ;  

-- Agregar Progreso del Estudiante en un Curso 
DELIMITER // 
CREATE PROCEDURE AgregarProgresoEstudiante(     
IN id_usuario INT,      
IN id_curso INT,      
IN progreso FLOAT ) 
BEGIN     
    INSERT INTO ProgresoEstudiante (id_usuario, id_curso, progreso)      
	VALUES (id_usuario, id_curso, progreso); 
END 
// DELIMITER ;  

-- Actualizar Progreso del Estudiante en un Curso 
DELIMITER // 
CREATE PROCEDURE ActualizarProgresoEstudiante(     
IN id INT,      
IN nuevo_progreso FLOAT ) 
BEGIN     
    UPDATE ProgresoEstudiante SET progreso = nuevo_progreso WHERE id = id; 
END 
// DELIMITER ;  

-- Obtener Progreso del Estudiante en un Curso 
DELIMITER // 
CREATE PROCEDURE ObtenerProgresoEstudiante( IN id_usuario INT, IN id_curso INT) 
BEGIN     
    SELECT * FROM ProgresoEstudiante WHERE id_usuario = id_usuario AND id_curso = id_curso; 
END 
// DELIMITER ;  

-- Eliminar Progreso del Estudiante
DELIMITER // 
CREATE PROCEDURE EliminarProgresoEstudiante(IN id INT) 
BEGIN     
    DELETE FROM ProgresoEstudiante WHERE id = id; 
END //
DELIMITER ;

