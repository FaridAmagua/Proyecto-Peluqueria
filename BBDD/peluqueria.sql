CREATE DATABASE IF NOT EXISTS peluqueria;
USE peluqueria; 
-- ----------------------------------------------------- DROPS PROCEDURE -----------------------------------------------------------------
DROP PROCEDURE IF EXISTS ConsultarUsuarios;
DROP PROCEDURE IF EXISTS CambiarContrasena;
DROP PROCEDURE IF EXISTS QuitarCita;
DROP PROCEDURE IF EXISTS ModificarCita;
DROP PROCEDURE IF EXISTS ReservarCita;
DROP PROCEDURE IF EXISTS AltaUsuario;
-- ---------------------------------------------------- DROPS TABLE ----------------------------------------------------------------------
DROP TABLE IF EXISTS tratamiento_empleado;
DROP TABLE IF EXISTS empleado;
DROP TABLE IF EXISTS contrato;
DROP TABLE IF EXISTS tienda;
DROP TABLE IF EXISTS reserva_tratamiento;
DROP TABLE IF EXISTS tratamiento;
DROP TABLE IF EXISTS reserva;
DROP TABLE IF EXISTS cliente;
-- -------------------------------------------------- CREATE TABLES-----------------------------------------------------------------------
CREATE TABLE cliente(
	id_cliente INT PRIMARY KEY AUTO_INCREMENT,	
	usuario VARCHAR(50) UNIQUE NOT NULL,
	nombre VARCHAR(50)NOT NULL,
	contrasena CHAR(40)NOT NULL,
	apellido_1 VARCHAR(75)NOT NULL,
	apellido_2 VARCHAR(75)NOT NULL,
	telefono VARCHAR(9),
	direccion VARCHAR(100),
	correo VARCHAR(100) NOT NULL,
	sexo ENUM('Mujer','Hombre','No especificar')
);

CREATE TABLE reserva(
	id_reserva INT PRIMARY KEY AUTO_INCREMENT,
	fecha DATETIME NOT NULL,
	reserva BIT,
	fk_cliente INT NOT NULL,
	FOREIGN KEY (fk_cliente) REFERENCES cliente(id_cliente)
);

CREATE TABLE tratamiento(
	id_tratamiento INT PRIMARY KEY AUTO_INCREMENT,
	tipo ENUM("Corte mujer","Corte hombre","Corte niño/a","Mechas matizado","Mechas cabello largo",
				"Mechas cabello medio","Mechas cabello corto","Decoloración completa",
                "Tinte mascarilla color")not null,
	precio DECIMAL(4,2) NOT NULL
);


CREATE TABLE reserva_tratamiento(
	id_cliente_tratamiento INT PRIMARY KEY AUTO_INCREMENT,
	fk_reserva INT,
	fk_tratamiento INT,
	FOREIGN KEY (fk_reserva) REFERENCES cliente(id_reserva),
	FOREIGN KEY (fk_tratamiento) REFERENCES tratamiento(id_tratamiento)
);

CREATE TABLE tienda(
	id_tienda INT PRIMARY KEY AUTO_INCREMENT,
	direccion VARCHAR(100) NOT NULL,
	telefono VARCHAR(9) NOT NULL,
	codigo_postal VARCHAR(5) NOT NULL
);


CREATE TABLE contrato(
	id_contrato INT PRIMARY KEY AUTO_INCREMENT,
	jornada ENUM("Mañana","Tarde"),
	sueldo DECIMAL(6,2),
	fecha_final DATETIME NOT NULL,
	fecha_inicio DATETIME NOT NULL,
	cargo ENUM("Peluquero","Encargado")
);


CREATE TABLE empleado(
	id_empleado INT PRIMARY KEY AUTO_INCREMENT,
	nombre VARCHAR(50) NOT NULL,
	apellido_1 VARCHAR(75) NOT NULL,
	apellido_2 VARCHAR(75),
	direccion VARCHAR(100),
	fecha_nacimiento DATETIME NOT NULL,
	sexo ENUM('Mujer','Hombre') NOT NULL,
	telefono VARCHAR(9) NOT NULL,
	fk_contrato INT NOT NULL,
	fk_tienda INT NOT NULL,
	FOREIGN KEY (fk_contrato) REFERENCES contrato(id_contrato),
	FOREIGN KEY (fk_tienda) REFERENCES tienda(id_tienda)
);

CREATE TABLE tratamiento_empleado(
	id_empleado_tratamiento INT PRIMARY KEY AUTO_INCREMENT,
	fk_tratamiento INT NOT NULL,
	fk_empleado INT NOT NULL,
	FOREIGN KEY (fk_tratamiento) REFERENCES tratamiento(id_tratamiento),
	FOREIGN KEY (fk_empleado) REFERENCES empleado(id_empleado)
);

-- -------------------------------------------------------PROCEDIMIENTOS ALMACENADOS -------------------------------------------------------------------------
-- Crear Usuarios --------------------------------------------------------------------------------------------------------------------------------------------

-- ---------------------------------------
-- Nombre PA: AltaUsuario
-- Parametros de entrada:
-- Parametros de salida:
-- Descripcion: 
-- ----------------------------------------

DELIMITER //
	CREATE PROCEDURE AltaUsuario(IN _usuario VARCHAR(50),
									IN _nombre VARCHAR(50),
                                    IN _contrasena CHAR(40),
									IN _apellido_1 VARCHAR(75),
                                    IN _apellido_2 VARCHAR(75),
									IN _telefono varchar(9),
									IN _direccion varchar(100),
                                    IN _correo VARCHAR(100),
                                    IN _sexo enum('Mujer','Hombre','No especificar'),
                                    OUT resultado INT)
pa:	BEGIN
		DECLARE ultimo_id INT;
        DECLARE _ComprobarUsuario VARCHAR(50);
        DECLARE _ComprobarCorreo VARCHAR(100);
        SET ultimo_id = NULL;
        SET resultado = 0;
        
        SELECT usuario FROM cliente
        WHERE _usuario LIKE usuario
        INTO _ComprobarUsuario;
        SELECT correo FROM cliente
        WHERE _correo LIKE correo
        INTO _ComprobarCorreo;
        IF _ComprobarUsuario LIKE _usuario OR _ComprobarCorreo LIKE _correo THEN
			SET resultado = -1;
		ELSE INSERT INTO cliente(id_cliente,
								usuario,
								nombre,
                                contrasena,
								apellido_1,
                                apellido_2,
                                telefono,
                                direccion,
                                correo,
                                sexo)
							VALUES(ultimo_id,
							_usuario,
                            _nombre,
                            _contrasena,
                            _apellido_1,
                            _apellido_2,
                            _telefono,
                            _direccion,
                            _correo,
                            _sexo);
			SET resultado = 0;
		END IF;
	END//
DELIMITER ;

SET @salida = -10;

-- Crear Citas -------------------------------------------------------------------------------------------------------------------------

-- ---------------------------------------
-- Nombre PA: ReservarCita
-- Parametros de entrada: _id_cliente INT, _tipo ENUM, _fecha DATETIME
-- Parametros de salida: resultado INT
-- Descripcion: Este método esta pensado para insertar en las tablas reserva y reserva_tratamiento
-- ----------------------------------------

DELIMITER //
	CREATE PROCEDURE ReservarCita(IN _usuario VARCHAR(50),
									IN _tipo enum('Corte mujer','Corte hombre','Corte niño/a','Mechas matizado','Mechas cabello largo',
                                    'Mechas cabello medio','Mechas cabello corto','Decoloración completa','Tinte mascarilla color'),
                                    IN _fecha DATETIME,
                                    OUT resultado INT)
pa:	BEGIN
		DECLARE _id_tratamiento INT;
        DECLARE _id_reserva INT;
        DECLARE vCheck INT;
        DECLARE _ComprobarFecha DATETIME;
        SET resultado = -1;
        
        -- Caso -1
        IF _usuario IS NULL THEN 
			SET resultado = -1; 
			LEAVE pa;
        END IF;
        -- Caso -2
		SELECT id_cliente FROM cliente
        WHERE usuario LIKE _usuario
        INTO vCheck;
		IF vCheck IS NULL THEN 
			SET resultado = -2; 
			LEAVE pa;
        END IF;
         -- Caso -3
		
        SELECT fecha FROM reserva
        WHERE fk_cliente = vCheck and fecha LIKE _fecha
        INTO _ComprobarFecha;
        
        IF _ComprobarFecha LIKE _fecha THEN set resultado = -3;
			LEAVE pa;
        END IF;
		-- Caso Normal
        SELECT id_tratamiento FROM tratamiento
        WHERE tipo LIKE _tipo
        INTO _id_tratamiento;
        SELECT id_reserva FROM reserva
        WHERE fecha LIKE _fecha
        INTO _id_reserva;
        if _id_reserva is null then
			INSERT INTO reserva(fecha, reserva, fk_cliente)
				VALUES(_fecha,1, vCheck);  
            SELECT id_reserva from reserva 
            WHERE fk_cliente = vCheck AND fecha LIKE _fecha 
            INTO _id_reserva; 
            SELECT id_tratamiento from tratamiento
            WHERE tipo LIKE _tipo
            INTO _id_tratamiento;  
			INSERT INTO reserva_tratamiento(fk_reserva,fk_tratamiento)
				VALUES(_id_reserva, _id_tratamiento);
                SET resultado = 0;
		else set resultado = -4; 
			leave pa; 
        end if;  
		
	END//
DELIMITER ;
set @salida = -10;
-- Modificar Fecha Citas ------------------------------------------------------------------------------------------------------------------

-- ---------------------------------------
-- Nombre PA: ModificarCita
-- Parametros de entrada:
-- Parametros de salida:
-- Descripcion: 
-- ----------------------------------------

DELIMITER //
	CREATE PROCEDURE ModificarCita(IN _usuario VARCHAR(50),
									IN _fecha DATETIME,
                                    IN _nueva_fecha datetime,
                                    OUT resultado INT)
pa:	BEGIN
		DECLARE _ComprobarUsuario VARCHAR(50);
        DECLARE _ComprobarFecha DATETIME;
        SET resultado = -1;
        
		-- Caso 0
        SELECT usuario FROM cliente
        WHERE _usuario LIKE usuario
        INTO _ComprobarUsuario;
        SELECT fecha FROM reserva
        WHERE _fecha LIKE fecha
        INTO _ComprobarFecha;
        IF _ComprobarUsuario LIKE _usuario AND _ComprobarFecha LIKE _fecha THEN 
            UPDATE reserva
            SET fecha = _nueva_fecha
            WHERE _ComprobarUsuario LIKE _usuario AND _fecha LIKE fecha; 
            SET resultado = 0;
            LEAVE pa;
        END IF;
        
		-- Caso -1
        IF _usuario IS NULL THEN 
			SET resultado = -1; 
			LEAVE pa; 
        END IF;
	END//
DELIMITER ;
set @salida = -10;

-- Eliminar Citas -------------------------------------------------------------------------------------------------------------------------------

-- ---------------------------------------
-- Nombre PA: QuitarCita
-- Parametros de entrada: 
-- Parametros de salida:
-- Descripcion: 
-- ----------------------------------------

DELIMITER //
	CREATE PROCEDURE QuitarCita(IN _usuario VARCHAR(50),
								IN _correo VARCHAR(100),
								IN _fecha DATETIME, 
                                OUT resultado INT)
pa:	BEGIN
		
		DECLARE _ComprobarUsuario VARCHAR(50);
        DECLARE _ComprobarCorreo VARCHAR(100);
        DECLARE _ComprobarFecha DATETIME;
        DECLARE _ComprobarReserva INT;
        SET resultado = -1;
        
        SELECT usuario FROM cliente
        WHERE _usuario LIKE usuario
        INTO _ComprobarUsuario;
        SELECT correo FROM cliente
        WHERE _correo LIKE correo
        INTO _ComprobarCorreo;
        SELECT fecha FROM reserva
        WHERE _fecha LIKE fecha
        INTO _ComprobarFecha;
        IF _ComprobarUsuario LIKE _usuario AND _ComprobarCorreo LIKE _correo AND _ComprobarFecha LIKE _fecha THEN
			SELECT id_cliente FROM cliente
			WHERE _usuario LIKE usuario
			INTO _ComprobarUsuario;
			SELECT fecha FROM reserva
			WHERE fecha LIKE _fecha
			INTO _ComprobarFecha;
            SELECT id_reserva FROM reserva
            WHERE fk_cliente LIKE _ComprobarUsuario AND fecha LIKE _ComprobarFecha
            INTO _ComprobarReserva;
            
            DELETE FROM reserva_tratamiento
            WHERE fk_reserva LIKE _ComprobarReserva;
            DELETE FROM reserva
            WHERE fk_cliente LIKE _ComprobarUsuario AND fecha LIKE _ComprobarFecha;
            SET resultado = 0;
            LEAVE pa;
		END IF;
	END//
DELIMITER ;
SET @salida = -10;

-- Cambiar Contraseña ---------------------------------------------------------------------------------------------------------------------------

-- ---------------------------------------
-- Nombre PA: CambiarContraseña
-- Parametros de entrada:
-- Parametros de salida:
-- Descripcion: 
-- ----------------------------------------


DELIMITER //
	CREATE PROCEDURE CambiarContrasena(IN _correo VARCHAR(100),
                                    IN _nueva_contrasena CHAR(40),
                                    OUT resultado INT)
pa:	BEGIN
		DECLARE _ComprobarCorreo VARCHAR(100);
        SET resultado = -1;
        
		-- Caso 0
        SELECT correo FROM cliente
        WHERE _correo LIKE correo
        INTO _ComprobarCorreo;
        IF _ComprobarCorreo LIKE _correo THEN 
			UPDATE cliente
            SET contrasena = _nueva_contrasena
            WHERE _correo LIKE correo;
            SET resultado = 0;
            LEAVE pa;
        END IF;
        
		-- Caso -1
        IF _correo IS NULL THEN 
			SET resultado = -1; 
			LEAVE pa; 
        END IF;
	END//
DELIMITER ;


-- Consultar Usuarios ---------------------------------------------------------------------------------------------------------------------------

-- ---------------------------------------
-- Nombre PA: ConsultarUsuarios
-- Parametros de entrada:
-- Parametros de salida:
-- Descripcion: 
-- ----------------------------------------


DELIMITER //

CREATE PROCEDURE ConsultarUsuarios()
    BEGIN

    SELECT reserva.id_reserva, reserva.fecha, reserva.reserva, cliente.usuario
    FROM reserva JOIN cliente
		ON reserva.fk_cliente = cliente.id_cliente
    WHERE reserva='1' AND fk_cliente IS NOT NULL;
    END//
DELIMITER ;

-- INSERTS ------------------------------------------------------------------------------------------------------------------------------
-- TRATAMIENTOS ------------------------------------------------------------------------------------------------------------------------------

INSERT INTO tratamiento(tipo, precio) VALUES ("Corte mujer",'12');
INSERT INTO tratamiento(tipo, precio)  VALUES ("Corte hombre",'12');
INSERT INTO tratamiento(tipo, precio)  VALUES ("Corte niño/a",'10');
INSERT INTO tratamiento(tipo, precio)  VALUES ("Mechas matizado",'20');
INSERT INTO tratamiento(tipo, precio)  VALUES ("Mechas cabello largo",'80');
INSERT INTO tratamiento(tipo, precio)  VALUES ("Mechas cabello medio",'50');
INSERT INTO tratamiento(tipo, precio)  VALUES ("Mechas cabello corto",'25');
INSERT INTO tratamiento(tipo, precio)  VALUES ("Decoloración completa",'15');
INSERT INTO tratamiento(tipo, precio)  VALUES ("Tinte mascarilla color",'5');

-- CLIENTES ------------------------------------------------------------------------------------------------------------------------------

INSERT INTO cliente (usuario, nombre, contrasena, apellido_1, apellido_2, telefono, direccion, correo, sexo) VALUES ("Uriel","Martin","WGT93EXC2UV","Wilson","Dudley","339815043","Ap #227-9138 Mauris Ave","nec.ante.blandit@nec.org","Hombre"),("Casey","Eugenia","TNH54BHO8WM","Buchanan","Gregory","686285553","999 Ante Street","auctor.nunc@ornareliberoat.ca","Mujer"),("Sasha","Lisandra","IBW52JVU4JY","Underwood","Peterson","148148985","687-237 A Av.","dolor@dignissimpharetraNam.ca","Mujer"),("Emi","Nissim","IRU90CDU5EF","Richmond","Hendricks","043345087","Ap #147-6489 Nisi Rd.","enim.gravida@vitae.net","No especificar"),("Fletcher","Cody","KQT60DPX9RV","Beard","Bruce","979346854","Ap #821-8380 Sit Street","ultricies@enimdiamvel.edu","No especificar"),("Ian","Yolanda","CNF90LVG3XJ","Dixon","Chase","219995379","Ap #303-9472 Donec Rd.","elit@necurnaet.net","Mujer"),("Reed","Basil","KFT72IQS6ZL","Mcleod","Flynn","355003155","P.O. Box 278, 4701 Adipiscing Road","Sed.diam.lorem@gravidamaurisut.edu","Hombre"),("Kelsey","Harriet","CLN50GYL1MB","Hunter","Wyatt","715325773","P.O. Box 170, 3701 Vestibulum Avenue","mattis@Vestibulumante.org","No especificar"),("Kitra","Christopher","LLO33NNV9BV","Cotton","Mcguire","934778565","485-8844 Lacinia Rd.","Integer.urna@elit.org","Hombre"),("Hyatt","Natalie","BPY08GOV5CC","Sykes","Wilcox","043562319","295-5421 Aliquam St.","et.malesuada.fames@inconsectetueripsum.co.uk","Mujer");
INSERT INTO cliente (usuario, nombre, contrasena, apellido_1, apellido_2, telefono, direccion, correo, sexo) VALUES ("Clinton","Paula","FDO37DPD0JA","Pennington","West","828428217","P.O. Box 444, 9053 Lectus St.","Mauris@Sedauctor.co.uk","Mujer"),("Boris","Harper","LVP73IOJ1QX","Hendricks","Knight","368643065","P.O. Box 375, 6106 Dolor Street","Donec@atrisusNunc.net","Hombre"),("Odessa","Aphrodite","CGX50NAZ7GG","Hunt","Spears","472201806","4429 Enim, St.","lectus.justo.eu@Vivamus.ca","Mujer"),("Reece","Knox","VKS85HKX6CB","Cobb","Morgan","445993633","Ap #398-3241 Phasellus St.","auctor.nunc.nulla@Donec.com","No especificar"),("Slade","Heather","PKC54TXE8GM","Taylor","Savage","858785899","4837 Cras St.","lobortis@Duiselementumdui.org","No especificar"),("Alice","Grant","FGU26FEQ7RX","Hendrix","Hudson","004979576","658-1582 Nec, St.","dictum@malesuadaInteger.ca","Mujer"),("Gabriel","Gretchen","TAZ52IUT0ZB","Little","Hartman","379688277","786-5922 Placerat St.","neque@sitamet.org","Hombre"),("Martin","Jin","HQO73AQY8FQ","Owens","England","716139628","805-9690 Dis Ave","auctor@congueInscelerisque.edu","Hombre"),("Patience","Alea","WXG27GZD1TH","Rogers","Woods","158531527","P.O. Box 610, 8487 Non, Av.","aliquam@scelerisquemollisPhasellus.ca","Mujer"),("Adrian","Andrew","HAD76CLI4IR","Newman","Yang","113486549","745-8741 Orci, Ave","Nunc.ac@etmalesuadafames.net","Hombre");
INSERT INTO cliente (usuario, nombre, contrasena, apellido_1, apellido_2, telefono, direccion, correo, sexo) VALUES ("Quentin","Shaine","RNR66WEW4DK","Bridges","Head","189852534","7299304 Commodo Street","dictum@magna.org","No especificar"),("Imogene","Devin","AAN40OEP0FB","Sandoval","Barron","094379601","Ap #728-5516 Semper, Av.","ut.pharetra.sed@utmolestie.edu","No especificar"),("Tanner","Kennan","QSV89JFN9TS","Ellis","Lyons","691512625","Ap #844-1555 Tempus Road","eu@velitinaliquet.ca","No especificar"),("Alana","Eugenia","JQM18KWQ1AD","Wolfe","Weiss","200298889","Ap #893-879 Vestibulum. St.","lacus.Mauris@dictum.net","Mujer"),("Marcos","Elijah","PFM87PHI4AZ","Woodward","Lynch","437333196","535-9721 Est, Ave","imperdiet.dictum.magna@Cum.org","Hombre"),("Serena","Brock","AZT95EFH7ZK","Chambers","Lane","214920150","6648 Pharetra Ave","Proin.vel@Innec.net","No especificar"),("Hyacinth","Jaime","UKA39VDT5IG","Bradford","Harvey","015633491","1408 Ac Av.","eu@nequevenenatis.ca","Hombre"),("Uta","Mannix","IGM72IPF4TO","Atkinson","Miles","953379257","Ap #582-8118 Non, St.","Nunc.commodo.auctor@congue.net","No especificar"),("Basil","Russell","KOP82RRV7OE","Lamb","Noble","492430121","P.O. Box 606, 3995 Risus St.","urna@Pellentesquehabitantmorbi.edu","Hombre"),("September","Mary","KGL85JAV0VR","Rush","Pearson","047474254","3223 A St.","nisl@vitae.edu","Mujer");
INSERT INTO cliente (usuario, nombre, contrasena, apellido_1, apellido_2, telefono, direccion, correo, sexo) VALUES ("Ima","Norman","UHB10CUL5XA","Sawyer","Baxter","735703278","151-2833 Nunc Av.","nisl@antedictum.edu","Hombre"),("Whoopi","Simon","ROB28UYM7QK","Fields","Clay","845973954","Ap #963-9664 Donec Rd.","ultrices@duilectus.com","Hombre"),("Hayden","Philip","IXV17DTC3EN","Perry","Silva","776960800","157-966 Curabitur St.","ornare.lectus@seddui.com","No especificar"),("Kennan","Amber","SWS10BNA7EX","Savage","Carroll","190255275","Ap #802-2082 Purus. Road","tincidunt@arcu.co.uk","No especificar"),("Hall","Inez","CPL70FFM3HU","Preston","Avery","420104411","8122 At, Rd.","Proin.vel@sitametdapibus.com","Hombre"),("Zorita","Dale","OKJ78DEY8RA","Griffith","Bond","877506430","423-496 Rutrum Avenue","Nam.interdum@liberoProin.co.uk","Mujer"),("Molly","Chase","JUK87HBO4CS","Cortez","Simmons","543659238","Ap #669-4739 Odio Rd.","lacinia.orci.consectetuer@tincidunt.net","Mujer"),("Ignacia","Castor","HOD50FYP5WK","Miranda","Douglas","028828601","498-2593 Eros. Rd.","Aliquam.tincidunt@erat.co.uk","Mujer"),("Yoshi","Amethyst","XVC37IKI4OT","Strong","Key","638604192","Ap #186-5590 Lacinia Avenue","montes@Crasconvallis.org","Mujer"),("Orla","Teagan","NMQ37KIS8DC","Johns","Mclaughlin","029653267","3473 Nec, Street","nec.enim.Nunc@nullaIntincidunt.edu","Mujer");
INSERT INTO cliente (usuario, nombre, contrasena, apellido_1, apellido_2, telefono, direccion, correo, sexo) VALUES ("Logan","Brenden","NJR11EOY7YY","Fleming","Stevenson","575476100","851-3710 Vestibulum Street","aliquet.magna@nonantebibendum.com","Hombre"),("Addison","Julie","QWR97TFR3EF","Manning","Lindsay","998175760","566-3758 Erat Ave","mattis.semper@pede.ca","Mujer"),("Mufutau","Oleg","HDE53YPL3OS","Wong","Jennings","749327852","P.O. Box 534, 9479 Nec, St.","nisl.Quisque@elita.ca","No especificar"),("Mariko","Dean","IWU14PHC7QX","Forbes","Mckee","202813028","Ap #771-3933 Turpis. Street","augue@Integer.edu","Hombre"),("Zahir","Lareina","XPE10GXD6VI","Lott","Rosales","582960319","287-2607 Lobortis Ave","pede.Cum.sociis@magnaa.ca","Mujer"),("Summer","Conan","HCF56KYF3YO","Yang","Campbell","685299063","P.O. Box 146, 5308 Risus. St.","lorem.ipsum.sodales@porttitortellusnon.ca","Hombre"),("Orson","Kyra","WNK37FCV3PI","Rodriquez","Benson","403193080","Ap #596-1696 Nunc Avenue","amet.consectetuer@nisl.net","Mujer"),("Fuller","Randall","MFP70KVG2NM","Schwartz","Wise","761673016","6236 Fermentum Street","Nulla@duinec.org","Hombre"),("Vernon","Shaine","VGT03IQW4LR","Henson","Sanders","026007394","8910 Amet Av.","tortor.Integer@luctuslobortis.org","Mujer"),("Rylee","Oleg","DJQ05AOI4BN","White","Mueller","172960947","Ap #103-2889 Augue, St.","netus.et@fringillacursuspurus.edu","No especificar");

-- RESERVAS ------------------------------------------------------------------------------------------------------------------------------

INSERT INTO reserva (fecha, reserva, fk_cliente) VALUES ("2021-06-03 17:00:00", 1, 2), ("2021-06-19 19:25:00", 1, 10), ("2021-06-26 20:30:00", 1, 20);
INSERT INTO reserva_tratamiento (fk_reserva, fk_tratamiento) VALUES (1, 1), (2, 2), (3, 5);