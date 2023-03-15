CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(150) NOT NULL,
    apellidos VARCHAR(150) NOT NULL,
    correo_electronico VARCHAR(100) UNIQUE NOT NULL,
    celular VARCHAR(20),
    telefono VARCHAR(20),
    contraseña VARCHAR(255) NOT NULL,
    rol ENUM('administrador', 'usuario_normal') NOT NULL,
    nombre_empresa VARCHAR(100),
    imagen_perfil VARCHAR(255),
    intentos_fallidos INT DEFAULT 0
);

CREATE TABLE clientes (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(150) NOT NULL,
    apellidos VARCHAR(150) NOT NULL,
    celular VARCHAR(20),
    correo_electronico VARCHAR(150) UNIQUE NOT NULL
);

CREATE TABLE datos_adicionales_tipos (
    id_dato_adicional_tipo INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario_normal INT,
    nombre_dato VARCHAR(100) NOT NULL,
    tipo_dato ENUM('texto', 'número', 'fecha') NOT NULL,
    obligatorio BOOLEAN NOT NULL,
    FOREIGN KEY (id_usuario_normal) REFERENCES usuarios(id_usuario)
);

CREATE TABLE datos_adicionales (
    id_dato_adicional INT AUTO_INCREMENT PRIMARY KEY,
    id_dato_adicional_tipo INT,
    id_cliente INT,
    valor TEXT,
    FOREIGN KEY (id_dato_adicional_tipo) REFERENCES datos_adicionales_tipos(id_dato_adicional_tipo),
    FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente)
);

CREATE TABLE fechas_horarios_disponibles (
    id_fecha_hora_disponible INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    cantidad_reservas_permitidas INT NOT NULL
);

CREATE TABLE reservas (
    id_reserva INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT,
    estado_pago ENUM('pagado', 'pendiente') NOT NULL,
    comentarios TEXT,
    -- otros campos relevantes para la reserva
    FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente)
);

CREATE TABLE horarios (
    id_horario INT AUTO_INCREMENT PRIMARY KEY,
    id_fecha_hora_disponible INT,
    id_usuario_normal INT,
    id_reserva INT,
    estado ENUM('disponible', 'reservado') NOT NULL,
    duracion INT NOT NULL,
    FOREIGN KEY (id_fecha_hora_disponible) REFERENCES fechas_horarios_disponibles(id_fecha_hora_disponible),
    FOREIGN KEY (id_usuario_normal) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (id_reserva) REFERENCES reservas(id_reserva)
);

CREATE TABLE permisos (
    id_permiso INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario_dueño INT,
    id_usuario_permiso INT,
    tipo_permiso ENUM('editar', 'agregar', 'eliminar_citas') NOT NULL,
    informacion_relevante TEXT,
    FOREIGN KEY (id_usuario_dueño) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (id_usuario_permiso) REFERENCES usuarios(id_usuario)
);
