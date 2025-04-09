-- Base de datos: sisgestionescolar

-- --------------------------------------------------------

-- Estructura de tabla para la tabla administrativos

CREATE TABLE administrativos (
  id_administrativo SERIAL PRIMARY KEY,
  persona_id INT NOT NULL,
  fyh_creacion TIMESTAMP DEFAULT NULL,
  fyh_actualizacion TIMESTAMP DEFAULT NULL,
  estado VARCHAR(11) DEFAULT NULL
);

-- --------------------------------------------------------

-- Estructura de tabla para la tabla asignaciones

CREATE TABLE asignaciones (
  id_asignacion SERIAL PRIMARY KEY,
  docente_id INT NOT NULL,
  nivel_id INT NOT NULL,
  grado_id INT NOT NULL,
  materia_id INT NOT NULL,
  fyh_creacion TIMESTAMP DEFAULT NULL,
  fyh_actualizacion TIMESTAMP DEFAULT NULL,
  estado VARCHAR(11) DEFAULT NULL
);

-- --------------------------------------------------------

-- Estructura de tabla para la tabla configuracion_instituciones

CREATE TABLE configuracion_instituciones (
  id_config_institucion SERIAL PRIMARY KEY,
  nombre_institucion VARCHAR(255) NOT NULL,
  logo VARCHAR(255) DEFAULT NULL,
  direccion VARCHAR(255) NOT NULL,
  telefono VARCHAR(100) DEFAULT NULL,
  celular VARCHAR(100) DEFAULT NULL,
  correo VARCHAR(100) DEFAULT NULL,
  fyh_creacion TIMESTAMP DEFAULT NULL,
  fyh_actualizacion TIMESTAMP DEFAULT NULL,
  estado VARCHAR(11) DEFAULT NULL
);

-- Volcado de datos para la tabla configuracion_instituciones

INSERT INTO configuracion_instituciones (id_config_institucion, nombre_institucion, logo, direccion, telefono, celular, correo, fyh_creacion, fyh_actualizacion, estado) VALUES
(1, 'Hilari Web School', 'logo.jpg', 'Zona Los Olivos Calle Max Toledo Av. 6 nro 100', '2228837', '59175657007', 'info@hilariweb.com', '2023-12-28 20:29:10', NULL, '1'),
(2, 'udec', '2025-04-04-08-42-43escudo_udec.png', 'los olivos', '78864748', '65765859', 'udec@udec.com', '2025-04-04 08:42:43', NULL, '1');

-- --------------------------------------------------------

-- Estructura de tabla para la tabla docentes

CREATE TABLE docentes (
  id_docente SERIAL PRIMARY KEY,
  persona_id INT NOT NULL,
  especialidad VARCHAR(255) NOT NULL,
  antiguedad VARCHAR(255) NOT NULL,
  fyh_creacion TIMESTAMP DEFAULT NULL,
  fyh_actualizacion TIMESTAMP DEFAULT NULL,
  estado VARCHAR(11) DEFAULT NULL
);

-- Volcado de datos para la tabla docentes

INSERT INTO docentes (id_docente, persona_id, especialidad, antiguedad, fyh_creacion, fyh_actualizacion, estado) VALUES
(1, 9, 'robar', '22', '2025-04-01 14:26:43', '2025-04-01 18:43:03', '1');

-- --------------------------------------------------------

-- Estructura de tabla para la tabla estudiantes

CREATE TABLE estudiantes (
  id_estudiante SERIAL PRIMARY KEY,
  persona_id INT NOT NULL,
  nivel_id INT NOT NULL,
  grado_id INT NOT NULL,
  rude VARCHAR(50) NOT NULL,
  fyh_creacion TIMESTAMP DEFAULT NULL,
  fyh_actualizacion TIMESTAMP DEFAULT NULL,
  estado VARCHAR(11) DEFAULT NULL
);

-- --------------------------------------------------------

-- Estructura de tabla para la tabla gestiones

CREATE TABLE gestiones (
  id_gestion SERIAL PRIMARY KEY,
  gestion VARCHAR(255) NOT NULL,
  fyh_creacion TIMESTAMP DEFAULT NULL,
  fyh_actualizacion TIMESTAMP DEFAULT NULL,
  estado VARCHAR(11) DEFAULT NULL
);

-- Volcado de datos para la tabla gestiones

INSERT INTO gestiones (id_gestion, gestion, fyh_creacion, fyh_actualizacion, estado) VALUES
(1, 'GESTIÓN 2024', '2023-12-28 20:29:10', NULL, '1'),
(2, 'gestuon 2025', '2025-04-04 08:43:06', NULL, '1');

-- --------------------------------------------------------

-- Estructura de tabla para la tabla grados

CREATE TABLE grados (
  id_grado SERIAL PRIMARY KEY,
  nivel_id INT NOT NULL,
  curso VARCHAR(255) NOT NULL,
  paralelo VARCHAR(255) NOT NULL,
  fyh_creacion TIMESTAMP DEFAULT NULL,
  fyh_actualizacion TIMESTAMP DEFAULT NULL,
  estado VARCHAR(11) DEFAULT NULL
);

-- Volcado de datos para la tabla grados

INSERT INTO grados (id_grado, nivel_id, curso, paralelo, fyh_creacion, fyh_actualizacion, estado) VALUES
(1, 1, 'INICIAL - 1', 'A', '2023-12-28 20:29:10', NULL, '1'),
(2, 1, 'INICIAL - 1', 'F', '2025-04-08 13:52:57', NULL, '1'),
(3, 1, 'INICIAL - 1', 'D', '2025-04-08 13:53:03', '2025-04-08 13:53:10', '1');

-- --------------------------------------------------------

-- Estructura de tabla para la tabla materias

CREATE TABLE materias (
  id_materia SERIAL PRIMARY KEY,
  nombre_materia VARCHAR(255) NOT NULL,
  fyh_creacion TIMESTAMP DEFAULT NULL,
  fyh_actualizacion TIMESTAMP DEFAULT NULL,
  estado VARCHAR(11) DEFAULT NULL
);

-- Volcado de datos para la tabla materias

INSERT INTO materias (id_materia, nombre_materia, fyh_creacion, fyh_actualizacion, estado) VALUES
(1, 'MATEMÁTICA', '2023-12-28 20:29:10', NULL, '1'),
(2, 'FISICA', '2025-04-08 14:34:10', NULL, '1'),
(3, 'ingles', '2025-04-08 14:34:17', '2025-04-08 14:34:27', '1');

-- --------------------------------------------------------

-- Estructura de tabla para la tabla niveles

CREATE TABLE niveles (
  id_nivel SERIAL PRIMARY KEY,
  gestion_id INT NOT NULL,
  nivel VARCHAR(255) NOT NULL,
  turno VARCHAR(255) NOT NULL,
  fyh_creacion TIMESTAMP DEFAULT NULL,
  fyh_actualizacion TIMESTAMP DEFAULT NULL,
  estado VARCHAR(11) DEFAULT NULL
);

-- Volcado de datos para la tabla niveles

INSERT INTO niveles (id_nivel, gestion_id, nivel, turno, fyh_creacion, fyh_actualizacion, estado) VALUES
(1, 1, 'INICIAL', 'MAÑANA', '2023-12-28 20:29:10', NULL, '1'),
(2, 1, 'PRIMARIA', 'MAÑANA', '2025-04-01 21:02:22', NULL, '1'),
(3, 1, 'SECUNDARIA', 'MAÑANA', '2025-04-01 21:02:28', NULL, '1'),
(4, 1, 'PRIMARIA', 'TARDE', '2025-04-04 08:43:57', NULL, '1');

-- --------------------------------------------------------

-- Estructura de tabla para la tabla personas

CREATE TABLE personas (
  id_persona SERIAL PRIMARY KEY,
  usuario_id INT NOT NULL,
  nombres VARCHAR(50) NOT NULL,
  apellidos VARCHAR(50) NOT NULL,
  ci VARCHAR(20) NOT NULL,
  fecha_nacimiento VARCHAR(20) NOT NULL,
  profesion VARCHAR(50) NOT NULL,
  direccion VARCHAR(255) NOT NULL,
  celular VARCHAR(20) NOT NULL,
  fyh_creacion TIMESTAMP DEFAULT NULL,
  fyh_actualizacion TIMESTAMP DEFAULT NULL,
  estado VARCHAR(11) DEFAULT NULL
);

-- Volcado de datos para la tabla personas

INSERT INTO personas (id_persona, usuario_id, nombres, apellidos, ci, fecha_nacimiento, profesion, direccion, celular, fyh_creacion, fyh_actualizacion, estado) VALUES
(1, 1, 'Freddy Eddy', 'Hilari Michua', '12345678', '10/10/1990', 'LICENCIADO EN EDUCACIÓN', 'Zona Los Pinos Av. Las Rosas Nro 100', '75657007', '2023-12-28 20:29:10', NULL, '1'),
(9, 9, 'wasaaa', 'zazaz', '232312312312', '2025-04-01', 'ratero', 'los olivos', '12334566', '2025-04-01 14:26:43', '2025-04-01 18:43:03', '1');

-- --------------------------------------------------------

-- Estructura de tabla para la tabla ppffs

CREATE TABLE ppffs (
  id_ppff SERIAL PRIMARY KEY,
  estudiante_id INT NOT NULL,
  nombres_apellidos_ppff VARCHAR(50) NOT NULL,
  ci_ppf VARCHAR(20) NOT NULL,
  celular_ppff VARCHAR(20) NOT NULL,
  ocupacion_ppff VARCHAR(50) NOT NULL,
  ref_nombre VARCHAR(50) NOT NULL,
  ref_parentezco VARCHAR(50) NOT NULL,
  ref_celular VARCHAR(50) NOT NULL,
  fyh_creacion TIMESTAMP DEFAULT NULL,
  fyh_actualizacion TIMESTAMP DEFAULT NULL,
  estado VARCHAR(11) DEFAULT NULL
);

--
