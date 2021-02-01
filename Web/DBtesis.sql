CREATE TABLE usuarios (
    id int(10)UNSIGNED NOT NULL AUTO_INCREMENT,
    nombres varchar(100) NOT NULL, 
    apellidos varchar(100),
    f_nacimiento date,
    facultad varchar(600),
    carrera varchar(300),
    semestre varchar(30),
    no_cuenta int(10) UNSIGNED UNIQUE,
    correo varchar(20),
    f_registro timestamp DEFAULT CURRENT_TIMESTAMP,
    tipo int(10) UNSIGNED NOT NULL,
    pass varchar(100) NOT NULL,
    PRIMARY KEY(id)
) ENGINE=InnoDB;

INSERT INTO usuarios (nombres,correo,tipo,pass) VALUES ('Admin','admin@admin.mx','0','1234');

INSERT INTO usuarios ( nombres, apellidos, f_nacimiento, facultad, carrera,semestre,no_cuenta,correo,tipo,pass) VALUES ('Angélica Noelia', 'Amador Méndez', '1998-09-22', 'Facultad de Ingeniería Electromecánica', 'Ingeniería en Sistemas Computacionales', '8vo semestre', '20130814' ,'aamador0@ucol.mx','1','1234');

INSERT INTO usuarios (nombres, apellidos, f_nacimiento,no_cuenta,correo,tipo,pass) VALUES ('Enrique Carlos', 'Rosales Busquets', '1960-10-20','1234' ,'erosales@ucol.mx','2','1234');

INSERT INTO usuarios (nombres, apellidos, f_nacimiento,no_cuenta,correo,tipo,pass) VALUES ('Ernesto', 'Navarro Alvarez', '1950-12-20','1233' ,'enavarro5@ucol.mx','2','1234');

INSERT INTO usuarios (nombres, apellidos, f_nacimiento,no_cuenta,correo,tipo,pass) VALUES  ('Juan Pablo', 'Martinez Vargas', '1970-11-20','1555' ,'jpablomv@ucol.mx','3','1234');
  
CREATE TABLE examen (
    id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre varchar(50) NOT NULL,
    codigo varchar(50) NOT NULL UNIQUE,
    estado int(10) NOT NULL,
    f_registro timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    id_usuario int(10) UNSIGNED NOT NULL,
    id_alta int(10) UNSIGNED,
    comentario varchar(5000),
    PRIMARY KEY (id),
    INDEX (id_usuario),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    INDEX (id_alta),
    FOREIGN KEY (id_alta) REFERENCES usuarios(id)
) ENGINE=InnoDB;

INSERT INTO examen (
    nombre, codigo, estado, id_usuario, id_alta) VALUES
('Ingeniería Computacional', 'EGEL-ICOMPU', '1', '2','4');

INSERT INTO examen (
    nombre, codigo, estado, id_usuario) VALUES
(' Ingeniería de Software', 'EGEL-ISOFT', '0', '3');

CREATE TABLE h_examen (
    id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    id_examen int (10) UNSIGNED NOT NULL, 
    nombre varchar(50) NOT NULL,
    estado int(10) NOT NULL,
    f_registro timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    id_alta int(10) UNSIGNED,
    comentario varchar(5000),
    PRIMARY KEY (id),
    INDEX (id_examen),
    FOREIGN KEY (id_examen) REFERENCES examen(id),
    INDEX (id_alta),
    FOREIGN KEY (id_alta) REFERENCES usuarios(id)
)ENGINE=InnoDB;

CREATE TABLE areas (
    id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre varchar(5000) NOT NULL,
    codigo varchar(50) NOT NULL UNIQUE,
    estado int(10) NOT NULL,
    f_registro timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    id_usuario int(10) UNSIGNED NOT NULL,
    id_alta int(10) UNSIGNED,
    id_examen int (10) UNSIGNED NOT NULL,
    comentario varchar(5000),
    PRIMARY KEY (id),
    INDEX (id_usuario),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    INDEX (id_alta),
    FOREIGN KEY (id_alta) REFERENCES usuarios(id),
    INDEX (id_examen),
    FOREIGN KEY (id_examen) REFERENCES examen(id)
) ENGINE=InnoDB;

INSERT INTO areas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen) VALUES
('Selección de sistemas computacionales para aplicaciones específicas', 'ICOMPU-1', '1', '2','4','1');

INSERT INTO areas (
    nombre, codigo, estado, id_usuario, id_alta,id_examen) VALUES
('Nuevas tecnologías para la implementación de sistemas de cómputo', 'ICOMPU-2', '1', '3','4','1');

INSERT INTO areas (
    nombre, codigo, estado, id_usuario, id_alta,id_examen) VALUES
('Desarrollo de hardware y su software asociado para aplicaciones específicas', 'ICOMPU-3', '0', '3','4','1');

INSERT INTO areas (
    nombre, codigo, estado, id_usuario, id_examen) VALUES
('Adaptación de hardware y/o software para aplicaciones específicas', 'ICOMPU-4', '0', '2','1');

INSERT INTO areas (
    nombre, codigo, estado, id_usuario, id_alta,id_examen) VALUES
('Redes de cómputo para necesidades específicas', 'ICOMPU-5', '1', '2','4','1');

INSERT INTO areas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen) VALUES
('Análisis de sistemas de información', 'ISOFT-1', '1', '2','4','2');

INSERT INTO areas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen) VALUES
('Desarrollo e implantación de aplicaciones computacionales', 'ISOFT-2', '1', '3','4','2');
INSERT INTO areas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen) VALUES
('Gestión de proyectos de tecnologías de información ', 'ISOFT-3', '0', '2','4','2');

INSERT INTO areas (
    nombre, codigo, estado, id_usuario,id_examen) VALUES
('Implementación de redes, bases de datos, sistemas operativos y lenguaje de desarrollo', 'ISOFT-4', '0', '2','2');

CREATE TABLE h_areas (
    id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    id_area int(10) UNSIGNED NOT NULL,
    nombre varchar(5000) NOT NULL,
    estado int(10) NOT NULL,
    f_registro timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    id_alta int(10) UNSIGNED,
    id_examen int (10) UNSIGNED NOT NULL,
    comentario varchar(5000),
    PRIMARY KEY (id),
    INDEX (id_area),
    FOREIGN KEY (id_area) REFERENCES areas(id),    
    INDEX (id_alta),
    FOREIGN KEY (id_alta) REFERENCES usuarios(id),
    INDEX (id_examen),
    FOREIGN KEY (id_examen) REFERENCES examen(id)
)ENGINE=InnoDB;

CREATE TABLE subareas (
    id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre varchar(5000) NOT NULL,
    codigo varchar(50) NOT NULL UNIQUE,
    estado int(10) NOT NULL,
    f_registro timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    id_usuario int(10) UNSIGNED NOT NULL,
    id_alta int(10) UNSIGNED,
    id_examen int (10) UNSIGNED NOT NULL,
    id_area int (10) UNSIGNED NOT NULL,
    comentario varchar(5000),
    PRIMARY KEY (id),
    INDEX (id_usuario),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    INDEX (id_alta),
    FOREIGN KEY (id_alta) REFERENCES usuarios(id),
    INDEX (id_examen),
    FOREIGN KEY (id_examen) REFERENCES examen(id),
    INDEX (id_area),
    FOREIGN KEY (id_area) REFERENCES areas(id)
) ENGINE=InnoDB;

INSERT INTO subareas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen,id_area) VALUES
('Investigación de los sistemas computacionales disponibles', 'ICOMPU-1-1','1', '2','4','1','1');

INSERT INTO subareas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen,id_area) VALUES
('Análisis cualitativo y cuantitativo de los sistemas computacionales seleccionados', 'ICOMPU-1-2','1', '3','4','1','1');

INSERT INTO subareas (
    nombre, codigo, estado, id_usuario,id_examen,id_area) VALUES
('Propuesta de la solución para la aplicación específica', 'ICOMPU-1-3','0', '3','1','1');

--

INSERT INTO subareas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen,id_area) VALUES
('Evaluación de las limitaciones de las tecnologías de los sistemas de
cómputo existentes', 'ICOMPU-2-1','1', '2','4','1','2');

INSERT INTO subareas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen,id_area) VALUES
('Desarrollo de nuevas aplicaciones tecnológicas de sistemas de cómputo', 'ICOMPU-2-2','0', '3','4','1','2');

INSERT INTO subareas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen,id_area) VALUES
('Evaluación de la funcionalidad de la nueva aplicación tecnológica', 'ICOMPU-2-3','1', '2','4','1','2');

INSERT INTO subareas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen,id_area) VALUES
('Implementación de la aplicación tecnológica del sistema de cómputo', 'ICOMPU-2-4','1', '2','4','1','2');

--


INSERT INTO subareas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen,id_area) VALUES
('Análisis de la problemática con base en una metodología', 'ICOMPU-3-1','1', '2','4','1','3');

INSERT INTO subareas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen,id_area) VALUES
('Desarrollo del modelo de hardware y su software para la aplicación específica', 'ICOMPU-3-2','1', '3','4','1','3');

INSERT INTO subareas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen,id_area) VALUES
('Evaluación del modelo de hardware y su software asociado para la aplicación específica', 'ICOMPU-3-3','0', '3','4','1','3');

--

INSERT INTO subareas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen,id_area) VALUES
('Análisis de la funcionalidad del sistema', 'ICOMPU-4-1','1', '2','4','1','4');

INSERT INTO subareas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen,id_area) VALUES
('Solución y evaluación de la adaptación del sistema de hardware y/o softwar', 'ICOMPU-4-2','1', '2','4','1','4');

INSERT INTO subareas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen,id_area) VALUES
('Implementación de la modificaciones en la aplicación específica', 'ICOMPU-4-3','1', '2','4','1','4');

--

INSERT INTO subareas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen,id_area) VALUES
('Análisis de las tecnologías que integran una red de cómputo', 'ICOMPU-5-1','1', '3','4','1','5');

INSERT INTO subareas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen,id_area) VALUES
('Propuesta de soluciones de las redes de cómputo para necesidades específicas', 'ICOMPU-5-2','1', '3','4','1','5');

INSERT INTO subareas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen,id_area) VALUES
('Evaluación del desempeño de la red de cómputo', 'ICOMPU-5-3','1', '3','4','1','5');

--

INSERT INTO subareas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen,id_area) VALUES
('Diagnóstico del problema y valoración de la factibilidad para el desarrollo de sistemas de información', 'ISOFT-1-1', '1', '2','4','2','6');

INSERT INTO subareas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen,id_area) VALUES
('Modelado de los requerimientos de un sistema de información', 'ISOFT-1-2', '1', '2','4','2','6');

--

INSERT INTO subareas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen,id_area) VALUES
('Diseño de la solución del problema de tecnología de información', 'ISOFT-2-1', '0', '2','4','2','7');

INSERT INTO subareas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen,id_area) VALUES
('Desarrollo de sistemas', 'ISOFT-2-2', '1', '3','4','2','7');

INSERT INTO subareas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen,id_area) VALUES
('Implantación de sistemas', 'ISOFT-2-3', '1', '3','4','2','7');

INSERT INTO subareas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen,id_area) VALUES
('Aplicación de modelos matemáticos', 'ISOFT-2-4', '1', '3','4','2','7');

--

INSERT INTO subareas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen,id_area) VALUES
('Administración de proyectos de tecnologías de información', 'ISOFT-3-1', '1', '3','4','2','8');

INSERT INTO subareas (
    nombre, codigo, estado, id_usuario,id_examen,id_area) VALUES
('Control de calidad de proyectos de tecnologías de información', 'ISOFT-3-2', '0', '2','2','8');

--

INSERT INTO subareas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen,id_area) VALUES
('Gestión de redes de datos', 'ISOFT-4-1', '0', '2','4','2','9');

INSERT INTO subareas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen,id_area) VALUES
('Gestión de bases de datos', 'ISOFT-4-2', '1', '3','4','2','9');

INSERT INTO subareas (
    nombre, codigo, estado, id_usuario,id_alta,id_examen,id_area) VALUES
('Gestión de sistemas operativos o lenguajes de desarrollo', 'ISOFT-4-3', '1', '2','4','2','9');

CREATE TABLE h_subareas (
    id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    id_subarea int(10) UNSIGNED NOT NULL,
    nombre varchar(200) NOT NULL,
    codigo varchar(50) NOT NULL UNIQUE,
    estado int(10) NOT NULL,
    f_registro timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    id_alta int(10) UNSIGNED,
    id_examen int (10) UNSIGNED NOT NULL,
    id_area int(10) UNSIGNED NOT NULL,   
    comentario varchar(5000),
    PRIMARY KEY (id),
    INDEX (id_alta),
    FOREIGN KEY (id_alta) REFERENCES usuarios(id),
    INDEX (id_examen),
    FOREIGN KEY (id_examen) REFERENCES examen(id),
    INDEX (id_area),
    FOREIGN KEY (id_area) REFERENCES areas(id),
    INDEX (id_subarea),
    FOREIGN KEY (id_subarea) REFERENCES subareas(id)
)ENGINE=InnoDB;

CREATE TABLE preguntas (
    id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre varchar(5000),
    imagen LONGBLOB,
    tipo int(10) NOT NULL,
    justificacion varchar(5000),
    comentario varchar(5000),
    estado int(10) NOT NULL,
    f_registro timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    id_usuario int(10) UNSIGNED NOT NULL,
    id_alta int(10) UNSIGNED,
    id_examen int (10) UNSIGNED NOT NULL,
    id_area int (10) UNSIGNED NOT NULL,
    id_subarea int (10) UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    INDEX (id_usuario),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    INDEX (id_alta),
    FOREIGN KEY (id_alta) REFERENCES usuarios(id),
    INDEX (id_examen),
    FOREIGN KEY (id_examen) REFERENCES examen(id),
    INDEX (id_area),
    FOREIGN KEY (id_area) REFERENCES areas(id),
    INDEX (id_subarea),
    FOREIGN KEY (id_subarea) REFERENCES subareas(id)
) ENGINE=InnoDB;

#1
INSERT INTO preguntas (nombre, tipo, comentario, estado, id_usuario, id_alta, id_examen,id_area,id_subarea) VALUES ('De los datos de la figura, ¿qué dirección de IP es válida para asignarse a cualquier máquina de la subred?', '1', 'comentario_test', '1', '2', '4','1','5','14');

INSERT INTO preguntas (nombre, tipo, comentario, estado, id_usuario, id_alta, id_examen,id_area,id_subarea) VALUES ('Una empresa está analizando si el sistema que va a adquirir es capaz de realizar todas las tareas deseadas. Seleccione la fase a la que corresponde dicho análisis.','1','comentario_test','1','2','4','1','1','1');

INSERT INTO preguntas (nombre, tipo, comentario, estado, id_usuario, id_alta, id_examen,id_area,id_subarea) VALUES ('Un diseñador de software debe adaptar un sistema de información utilizando un diseño estructurado con diagramas de flujo de datos. ¿Qué notación debe de utilizar?','1','comentario_test','1','2','4','1','2','4');

#2
INSERT INTO preguntas (nombre, tipo, comentario, estado, id_usuario, id_alta, id_examen,id_area,id_subarea) VALUES ('Ordene las fases de un compilador.
1. Optimizador de código
2. Analizador léxico
3. Generador de código
4. Analizador semántico
5. Analizador sintáctico
6. Generador de código intermedio','2','comentario_test','1','3','4','1','1','2');

#3
INSERT INTO preguntas (nombre, tipo, comentario, estado, id_usuario, id_alta, id_examen,id_area,id_subarea) VALUES ('Se requiere evaluar los procesos del software existente. Elija los criterios de evaluación pertinentes para llevar a cabo la tarea encomendada.
1. Fiabilidad
2. Factibilidad
3. Eficiencia
4. Costo
5. Productividad
6. Funcionalidad','3','comentario_test','1','2','4','1','4','11');

INSERT INTO preguntas (nombre, tipo, comentario, estado, id_usuario, id_alta, id_examen,id_area,id_subarea) VALUES ('Un circuito integrado recibe el nombre de microprocesador cuando tiene en una misma pastilla al menos:
1. Unidad de control
2. Registros internos
3. Puertos
4. Unidad aritmética/lógica
5. Memoria de datos
6. Memoria de programas','3','comentario_test','1','2','4','1','5','15');

INSERT INTO preguntas (nombre, tipo, comentario, estado, id_usuario, id_alta, id_examen,id_area,id_subarea) VALUES ('Seleccione los elementos que se encuentran en la cara de un plato de un disco duro.
1. Cabezas
2. Cilindros
3. Pistas
4. Sectores','3','comentario_test','1','3','4','1','3','8');

#4
INSERT INTO preguntas (nombre, tipo, comentario, estado, id_usuario, id_alta, id_examen,id_area,id_subarea) VALUES ('Una librería de ventas por internet quiere construir un sistema inteligente capaz de descubrir y aprovechar el comportamiento de compras de sus clientes. ¿Qué herramientas recomendaría y por qué?
Relacione ambas columnas.
Herramientas
1.Sistema basado en conocimiento 
2.Red neuronal
3.Algoritmo genético simple
4.Árbol de decisión

Funcionalidad
a) Por su capacidad para reconocer patrones
b) Por su capacidad para optimizar la búsqueda
c) Por su capacidad para representar jerarquía y causalidad','4','comentario_test','1','3','4','1','1','3');

#5
INSERT INTO preguntas (nombre, tipo, comentario, estado, id_usuario, id_alta, id_examen,id_area,id_subarea) VALUES ('Considere la siguiente tabla que muestra un conjunto de procesos para ser ejecutados en un procesador, el tiempo (en segundos) que requieren de servicio del procesador y el momento en que cada uno de ellos llega a la cola de ejecución.
Siguiendo la política FCFS (First Come, First Served) de planificación de procesos, ¿cuál es el tiempo promedio que requieren todos los procesos para ser asignados por primera vez al procesador?', '5', 'comentario_test','1','2','4','1','1','3');

INSERT INTO preguntas (nombre, tipo, comentario, estado, id_usuario, id_alta, id_examen,id_area,id_subarea) VALUES ('Considere la siguiente tabla que muestra un conjunto de procesos para ser ejecutados en un procesador, el tiempo (en segundos) que requieren de servicio del procesador y el momento en que cada uno de ellos llega a la cola de ejecución.
Siguiendo la política FCFS (First Come - First Served) de planificación de procesos, ¿cuál es el tiempo promedio que requieren todos los procesos para ser concluidos a
partir de su llegada a la cola de ejecución?', '5', 'comentario_test','1','2','4','1','1','3');

#1
INSERT INTO preguntas (nombre, tipo, comentario, estado, id_usuario, id_alta, id_examen,id_area,id_subarea) VALUES ('El área de desarrollo de sistemas de una empresa requiere implementar un sistema de información en todas sus sucursales. Se están evaluando las siguientes alternativas para resolver ese requerimiento:
1. El costo del desarrollo externo es en promedio de $1,300,000.00 y cubre el 100% de los requerimientos.
2. El desarrollo interno para cubrir el 100% de los requerimientos implica 6 meses de trabajo y el sistema resultante puede ser vendido
3. Adquirir un software comercial cuyo costo es de $700,000.00 y cubre el 80% de los requerimientos
4. Continuar con el uso de los sistemas de información ocasiona costos de operación y mantenimiento de $1,000,000
¿Cuál de las siguientes metodologías se aplica para evaluar la factibilidad de las
propuestas?', '1', 'comentario_test','1','3','4','2','1','17');

INSERT INTO preguntas (nombre, tipo, comentario, estado, id_usuario, id_alta, id_examen,id_area,id_subarea) VALUES ('Una incubadora de negocios está organizando un proyecto para producir un videojuego de caracteres que se desarrollará en varias fases. El cliente especifica los requerimientos en etapas posteriores a cada demostración del producto. Las primeras versiones tienen propósitos académicos y se espera que las últimas sean productos comerciales. ¿Qué modelo del proceso se utiliza para desarrollar este proyecto?', '1', 'comentario_test','1','3','4','2','2','19');

#2
INSERT INTO preguntas (nombre, tipo, comentario, estado, id_usuario, id_alta, id_examen,id_area,id_subarea) VALUES ('Ordene secuencialmente los pasos necesarios para preparar una entrevista para la obtención de los requerimientos de una aplicación computacional.
1. Decidir el tipo de preguntas y la estructura
2. Conocer los antecedentes de la organización
3. Decidir a quién entrevistar
4. Establecer los objetivos de la entrevista', '2', 'comentario_test','1','2','4','2','1','18');

INSERT INTO preguntas (nombre, tipo, comentario, estado, id_usuario, id_alta, id_examen,id_area,id_subarea) VALUES ('Ordene los pasos que se requieren para elaborar el diagrama relacional a partir de un diagrama entidad relación de un modelo de datos.
1. Elaborar por cada una de las relaciones con cardinalidad muchos a muchos una
 relación asociativa
2. Elaborar por cada una de la entidades del diagrama ER una relación en el diagrama
 relacional
3. Reducción de las relaciones muchos a uno con el paso de llaves
4. Fusionar las entidades con relaciones de cardinalidad uno a uno', '2', 'comentario_test','1','2','4','2','2','20');

#3
INSERT INTO preguntas (nombre, tipo, comentario, estado, id_usuario, id_alta, id_examen,id_area,id_subarea) VALUES ('De los siguientes protocolos, ¿cuáles corresponden a la capa de red en el modelo OSI?
1. HDLC
2. IP
3. TCP
4. RIP', '3', 'comentario_test','1','3','4','2','4','25');

INSERT INTO preguntas (nombre, tipo, comentario, estado, id_usuario, id_alta, id_examen,id_area,id_subarea) VALUES ('El departamento de tecnologías de la información de una empresa está a punto de iniciar el desarrollo de una aplicación, considerando los siguientes lenguajes de programación. Seleccione los que sean orientados a objetos.
1. LISP
2. JAVA
3. FORTRAN
4. DELPHI
5. PHP', '3', 'comentario_test','1','3','4','2','2','19');

#4
INSERT INTO preguntas (nombre, tipo, comentario, estado, id_usuario, id_alta, id_examen,id_area,id_subarea) VALUES ('Un equipo de desarrollo tiene alojado el sistema de control de versiones en una carpeta compartida en un servidor de la empresa. Para su operación, esta carpeta tiene asignados diferentes permisos para diferentes usuarios, de acuerdo con el uso que hace cada uno. Así, un desarrollador baja versiones nuevas y sube actualizaciones; el personal de soporte técnico utiliza controladores y actualizaciones del sistema; mientras que el líder de proyecto controla y gestiona el sistema de control de versiones, además de participar como desarrollador. Relacione los perfiles de usuario con sus respectivos permisos de acceso.
Perfil de usuario
1. Desarrollador
2. Líder de proyecto
3. Personal de soporte técnico
                                                                                                                    
Permisos de acceso
a) Creación, eliminación
b) Lectura
c) Lectura, creación, eliminación
d) Lectura, escritura
e) Lectura, escritura, creación
f) Lectura, escritura, creación, eliminación', '4', 'comentario_test', '1', '2', '4', '2', '4','25');

CREATE TABLE h_preguntas (
    id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    id_pregunta int (10) UNSIGNED NOT NULL,
    nombre varchar(5000),
    imagen LONGBLOB,
    tipo int(10) NOT NULL,
    justificacion varchar(5000),
    comentario varchar(5000),
    estado int(10) NOT NULL,
    f_registro timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    id_alta int(10) UNSIGNED,
    id_examen int (10) UNSIGNED NOT NULL,
    id_area int (10) UNSIGNED NOT NULL,
    id_subarea int (10) UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    INDEX (id_alta),
    FOREIGN KEY (id_alta) REFERENCES usuarios(id),
    INDEX (id_examen),
    FOREIGN KEY (id_examen) REFERENCES examen(id),
    INDEX (id_area),
    FOREIGN KEY (id_area) REFERENCES areas(id),
    INDEX (id_subarea),
    FOREIGN KEY (id_subarea) REFERENCES subareas(id)
) ENGINE=InnoDB;

CREATE TABLE respuestas (
    id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre varchar(1000),
    imagen LONGBLOB,
    estado int(10) NOT NULL,
    justificacion varchar(5000),
    comentario varchar(5000),
    f_registro timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    valor int(10) UNSIGNED NOT NULL,
    id_usuario int(10) UNSIGNED NOT NULL,
    id_alta int(10) UNSIGNED,
    id_examen int (10) UNSIGNED NOT NULL,
    id_area int (10) UNSIGNED NOT NULL,
    id_subarea int (10) UNSIGNED NOT NULL,
    id_pregunta int (10) UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    INDEX (id_usuario),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    INDEX (id_alta),
    FOREIGN KEY (id_alta) REFERENCES usuarios(id),
    INDEX (id_examen),
    FOREIGN KEY (id_examen) REFERENCES examen(id),
    INDEX (id_area),
    FOREIGN KEY (id_area) REFERENCES areas(id),
    INDEX (id_subarea),
    FOREIGN KEY (id_subarea) REFERENCES subareas(id),
    INDEX (id_pregunta),
    FOREIGN KEY (id_pregunta) REFERENCES preguntas(id)
) ENGINE=InnoDB;

INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES ('192.168.0.10','1','justificacion_test','comentario_test','0','2','4','1','5','14','1');


INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES ('192.168.10.10','1','Las otras opciones son incorrectas porque no se percatan de que el tercer número es
Ø y no tiene el mismo Network ID que la red especificada. Además, no es la dirección
válida por el 255 que está reservada para mensajes broadcast y el 292 no es un número
válido de host, ya que excede de 254.','comentario_test','1','2','4','1','5','14','1');


INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES ('192.168.10.255','1','justificacion_test','comentario_test','0','2','4','1','5','14','1');

INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES ('192.168.10.292','1','justificacion_test','comentario_test','0','2','4','1','5','14','1');


--
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'Evaluar la calidad de documentación','1','justificacion_test','comentario_test','0','2','4','1','1','1','2'); 
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'Evaluar el soporte del fabricante','1','justificacion_test','comentario_test','0','2','4','1','1','1','2'); 
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'Valorar la efectividad del desempeño','1','Es una de las características que forman parte de la fase de valoración de la efectividad del desempeño, al igual que observar si tiene la capacidad adecuada, etc.
Las otras opciones son incorrectas porque no analizan si el sistema realiza lo que
requiere la empresa.','comentario_test','1','2','4','1','1','1','2'); 
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'Observar la facilidad de uso','1','justificacion_test','comentario_test','0','2','4','1','1','1','2'); 
                                                                                                                                            
--
                                                                                                                                        
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'ANSI','1','justificacion_test','comentario_test','0','2','4','1','2','4','3'); 
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'Yourdon-DeMarco','1','Se emplea para construir diagramas de flujo o diagramas de contexto en el modelo
estructurado.
Las otras opciones son incorrectas porque el modelo ANSI no se utiliza en un modelo
estructurado, el modelo UML es la herramienta principal para modelar desde el punto de
vista del proceso unificado y el modelo Warnier-Orr generalmente se utiliza en una
representación semejante a la de cuadros sinópticos para mostrar el funcionamiento y
organización de los elementos a utilizar.','comentario_test','1','2','4','1','2','4','3'); 
                                                                                                        
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'UML','1','justificacion_test','comentario_test','0','2','4','1','2','4','3'); 
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'Warnier-Orr','1','justificacion_test','comentario_test','0','2','4','1','2','4','3'); 

--
                
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'2, 4, 5, 1, 6, 3', '1','justificacion_test','comentario_test','0','3','4','1','1','2','4'); 

INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'2, 5, 4, 6, 1, 3', '1','Conceptualmente un compilador opera en fases,
cada una de las cuales transforma el programa fuente de una representación de otra en
el siguiente orden: 
- Analizador léxico
- Analizador sintáctico
- Analizador semántico
- Generador de código intermedio
- Optimizador de código
- Generador de código.
Las otras opciones son incorrectas, porque los analizadores están en desorden y el
optimizador de código no va al final ni antes del código intermedio','comentario_test','1','3','4','1','1','2','4'); 

INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'4, 2, 5, 6, 3, 1', '1','justificacion_test','comentario_test','0','3','4','1','1','2','4'); 

INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'5, 2, 6, 4, 3, 1', '1','justificacion_test','comentario_test','0','3','4','1','1','2','4'); 

--

INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'1, 3, 6', '1',' La fiabilidad, la eficiencia y la funcionalidad son 3 de los criterios indispensables para la evaluación de los procesos de un software
existente.
Las otras opciones son incorrectas porque la productividad, la factibilidad y el costo no son criterios principales para la evaluación de un software existente.','comentario_test','0','2','4','1','4','11','5'); 
                                                                                                                                        
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'1, 5, 6', '1','justificacion_test','comentario_test','0','2','4','1','4','11','5'); 
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'2, 3, 4', '1','justificacion_test','comentario_test','0','2','4','1','4','11','5'); 
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'2, 4, 5', '1','justificacion_test','comentario_test','0','2','4','1','4','11','5'); 
                                        
--
                                                                                                                                                                                 

INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'1, 2, 3', '1','justificacion_test','comentario_test','0','2','4','1','5','15','6');

INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'1, 2, 4', '1','Poe que éstas son la unidad de control, los registros internos
y la unidad aritmética/lógica, son 3 de los elementos de un microprocesador.
Las otras opciones son incorrectas porque los puertos, la memoria de datos y la memoria
de programas no son elementos de un microprocesador.','comentario_test','1','2','4','1','5','15','6');

INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'1, 3, 6', '1','justificacion_test','comentario_test','0','2','4','1','5','15','6');

INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'1, 4, 5', '1','justificacion_test','comentario_test','0','2','4','1','5','15','6');
                    
--
                                                                                                                                           
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'1, 4, 5', '1','justificacion_test','comentario_test','0','2','4','1','3','8','7');
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'1, 4, 5', '1','justificacion_test','comentario_test','0','2','4','1','3','8','7');
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'1, 4, 5', '1','justificacion_test','comentario_test','0','2','4','1','3','8','7');
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'1, 4, 5', '1','Dentro de la superficie de un disco se aprecian sólo pistas y sectores dentro de su organización. Ya que son dispositivos de almacenamiento
de acceso directo.
Las otras opciones son incorrectas porque contienen las cabezas y los cilindros que no
están dentro de la superficie de un disco.','comentario_test','1','2','4','1','3','8','7');
                                                                                                                                            
--
                                                                                                                                        
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'1, 4, 5', '1','justificacion_test','comentario_test','0','3','4','1','1','3','8');
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'1, 4, 5', '1','La red neuronal que tiene la capacidad de reconocer patrones.
Las otras opciones son incorrectas porque no se requiere la capacidad para manejar
incertidumbre, para optimizar la búsqueda o para representar jerarquía y causalidad.','comentario_test','1','3','4','1','1','3','8');
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'1, 4, 5', '1','justificacion_test','comentario_test','0','3','4','1','1','3','8');
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'1, 4, 5', '1','justificacion_test','comentario_test','0','3','4','1','1','3','8');
                                                                                                                                            
--
                                                                                        
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'7/4', '1','Las otras opciones son incorrectas porque:
Se puede considerar sólo la suma de los tiempos de los procesos 4 + 2 + 3 + 1 = 10→10/4.
Se puede confundir con la política de round robin 8 + 5 + 7 + 2 = 22→22/4.
Puede hacerse el cómputo considerando el tiempo (t0) como inicio de todos los procesos:
4 + 6 + 9 + 10 = 29 →29/4.','comentario_test','1','2','4','1','1','3','9');    

INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'10/4', '1','justificacion_test','comentario_test','0','2','4','1','1','3','9');   

INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'22/4', '1','justificacion_test','comentario_test','0','2','4','1','1','3','9');   

INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'29/4', '1','justificacion_test','comentario_test','0','2','4','1','1','3','9');   
                   
--

INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'10/4', '1','justificacion_test','comentario_test','0','2','4','1','1','3','10');   
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'17/4', '1','Se puede considerar sólo la suma de los tiempos de los procesos 4 + 2 + 3 + 1 = 10→10/4.
Se puede confundir con la política round robin 8+5+7+2=22→22/4.
Puede hacerse el cómputo considerando el tiempo como inicio de todos los procesos
4 + 6 + 9 + 10 = 29→29/4.','comentario_test','1','2','4','1','1','3','10');

INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'22/4', '1','justificacion_test','comentario_test','0','2','4','1','1','3','10');

INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'29/4', '1','justificacion_test','comentario_test','0','2','4','1','1','3','10');
                                                                                                                                         
--                                                                                                                                         
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'Benchmarking', '1','justificacion_test','comentario_test','0','3','4','2','1','17','11');
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'Costo – beneficio', '1','Porque la información proporcionada está asociada al costo
de las propuestas.
Las otras opciones son incorrectas porque la información proporcionada no refleja el
desempeño de las propuestas, no da elementos para establecer la factibilidad operativa
del sistema y no es de tipo técnica.','comentario_test','1','3','4','2','1','17','11');
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'Análisis operativo', '1','justificacion_test','comentario_test','0','3','4','2','1','17','11');
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'Análisis técnico', '1','justificacion_test','comentario_test','0','3','4','2','1','17','11');                                                                                                                                            
--
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'Lineal', '1','justificacion_test','comentario_test','0','2','4','2','2','19','12');
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'En espiral', '1','Se evalúan los riesgos, propios de una aplicación
comercial, a la vez que se van verificando las iteraciones correspondientes a cada
versión.
Las otras opciones son incorrectas porque las revisiones de proyectos de gran
complejidad son muy difíciles, es difícil de aplicar a sistemas transaccionales que
tienden a ser integrados y a operar como un todo, y porque exige disponer de las
herramientas adecuadas y no presenta calidad ni robustez','comentario_test','1','2','4','2','2','19','12');
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'Incremental', '1','justificacion_test','comentario_test','0','2','4','2','2','19','12');
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'De prototipos', '1','justificacion_test','comentario_test','0','2','4','2','2','19','12');
                                                
--
                                                                                                                                         
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'2, 3, 1, 4', '1','justificacion_test','comentario_test','0','2','4','2','1','18','13');

INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'2, 4, 3, 1', '1','Porque la secuencia de pasos adecuada para preparar una
entrevista es; conocer antecedentes de la organización, establecer objetivos, decidir a
quién entrevistar y decidir el tipo de preguntas y su estructura. El producto de cada paso
es un insumo necesario para el siguiente.
Las otras opciones son incorrectas porque no cumplen con el orden adecuado.','comentario_test','1','2','4','2','1','18','13');

INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'3, 4, 2, 1', '1','justificacion_test','comentario_test','0','2','4','2','1','18','13');

INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'3, 2, 1, 4', '1','justificacion_test','comentario_test','0','2','4','2','1','18','13');
                                                                             
--
                                                                                                                                      
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'2, 1, 3, 4', '1','justificacion_test','comentario_test','0','2','4','2','2','20','14');
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'2, 3, 4, 1', '1','justificacion_test','comentario_test','0','2','4','2','2','20','14');
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'4, 3, 1, 2', '1','justificacion_test','comentario_test','0','2','4','2','2','20','14');
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'4, 2, 1, 3', '1','Son los pasos que se requieren para elaborar el diagrama relacional a partir de un diagrama entidad relación de un modelo de datos.
Las otras opciones son incorrectas porque no cumplen con el orden adecuado.','comentario_test','1','2','4','2','2','20','14');
                                                                                                                                            
--
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'1, 2', '1','justificacion_test','comentario_test','0','2','4','2','4','25','15');
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'1, 3', '1','justificacion_test','comentario_test','0','2','4','2','4','25','15');
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'2, 4', '1','Porque ambos protocolos pertenecen a la capa de red.
Las otras opciones son incorrectas porque HDLC es un protocolo de la capa de enlace
de datos y TCP es un protocolo de la capa de transporte.','comentario_test','1','2','4','2','4','25','15');
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'3, 4', '1','justificacion_test','comentario_test','0','2','4','2','4','25','15');
                                                                                                                                            
--
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'1, 2, 3', '1','justificacion_test','comentario_test','0','2','4','2','2','19','16');
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'1, 3, 4', '1','justificacion_test','comentario_test','0','2','4','2','2','19','16');
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'2, 4, 5', '1','Porque los tres son lenguajes orientados a objetos.
Las otras opciones son incorrectas porque LISP y Fortran son lenguajes de alto nivel,
pero no orientados a objetos.','comentario_test','1','2','4','2','2','19','16');
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'3, 4, 5', '1','justificacion_test','comentario_test','0','2','4','2','2','19','16');                                                                                                                                                                                                                                                                                       
-- 

INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'1a, 2c, 3e ', '1','justificacion_test','comentario_test','0','2','4','2','4','26','17');     
                                                                                        
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'1b, 2d, 3e', '1','justificacion_test','comentario_test','0','2','4','2','4','26','17');  
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'1d, 2b, 3a', '1','justificacion_test','comentario_test','0','2','4','2','4','26','17');  
                                                                                                                                            
INSERT INTO respuestas(nombre,estado,justificacion, comentario, valor,id_usuario, id_alta,id_examen,id_area,id_subarea,id_pregunta) VALUES (
'1e, 2f, 3b', '1','Porque todos los perfiles tienen asignados los permisos apropiados a su función.
Las otras opciones son incorrectas porque el desarrollador debe poder leer y escribir,
además de que no es conveniente que pueda eliminar y el líder de proyecto debe tener
todos los permisos.','comentario_test','1','2','4','2','4','26','17');  

CREATE TABLE h_respuestas (
    id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    id_respuesta int(10) UNSIGNED NOT NULL,
    nombre varchar(1000),
    imagen LONGBLOB,
    estado int(10) NOT NULL,
    justificacion varchar(5000),
    comentario varchar(5000),
    f_registro timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    valor int(10) UNSIGNED NOT NULL,
    id_alta int(10) UNSIGNED,
    id_examen int (10) UNSIGNED NOT NULL,
    id_area int (10) UNSIGNED NOT NULL,
    id_subarea int (10) UNSIGNED NOT NULL,
    id_pregunta int (10) UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    INDEX (id_alta),
    FOREIGN KEY (id_alta) REFERENCES usuarios(id),
    INDEX (id_examen),
    FOREIGN KEY (id_examen) REFERENCES examen(id),
    INDEX (id_area),
    FOREIGN KEY (id_area) REFERENCES areas(id),
    INDEX (id_subarea),
    FOREIGN KEY (id_subarea) REFERENCES subareas(id),
    INDEX (id_pregunta),
    FOREIGN KEY (id_pregunta) REFERENCES preguntas(id),
    INDEX (id_respuesta),
    FOREIGN KEY (id_respuesta) REFERENCES respuestas(id)
) ENGINE=InnoDB;

CREATE TABLE historial (
    id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    tiempo_puesto numeric(10,2),
    tiempo_real numeric(10,2),
    no_preguntas int(10),
    resultado int(10),
    hora_inicio timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    hora_final timestamp DEFAULT CURRENT_TIMESTAMP,
    id_usuario int(10) UNSIGNED NOT NULL,
    id_examen int (10) UNSIGNED NOT NULL,
    id_area int (10) UNSIGNED NOT NULL,
    subareas varchar(5000) NOT NULL,
    PRIMARY KEY (id),
    INDEX (id_usuario),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    INDEX (id_examen),
    FOREIGN KEY (id_examen) REFERENCES examen(id),
    INDEX (id_area),
    FOREIGN KEY (id_area) REFERENCES areas(id)
)ENGINE=InnoDB;

INSERT INTO historial(tiempo_puesto, tiempo_real, no_preguntas, resultado, id_usuario, id_examen,id_area, subareas)
VALUES ('30.00','20.33','40','20','1','1','3','8, 9, 10');

CREATE TABLE foro (
    id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    tipo int(10) UNSIGNED NOT NULL,
    contenido varchar(1000) NOT NULL,
    alias varchar(100),
    id_usuario int(10) UNSIGNED,
    PRIMARY KEY (id),
    INDEX (id_usuario),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
)ENGINE=InnoDB;

INSERT INTO foro (tipo, contenido, alias, id_usuario) VALUES ('1','test_foro_tipo_1','','2');
INSERT INTO foro (tipo, contenido, alias) VALUES ('2','test_foro_tipo_2','noelialml');
INSERT INTO foro (tipo, contenido, alias) VALUES ('3','test_foro_tipo_3','usuario_anomimo');