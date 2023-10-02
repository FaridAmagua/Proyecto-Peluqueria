V 1.5
![image](https://github.com/FaridAmagua/Proyecto-Peluqueria/assets/98462673/8845d5bd-1fd9-4863-b544-ffa2e84a4636)
Versión del documento: 2.1
Fecha última actualización: 20/04/2021
1. Definiciones y especificación de requerimientos
Definición general del proyecto de software: el proyecto consiste en una aplicación en la cual cualquier usuario pueda pedir una cita a la peluquería de forma online.
Especificación de requerimientos generales del proyecto:
1.	Sistema completo de Registro y Login en la página con BBDD.
2.	Posibilidad de cambio de contraseña. 
3.	Capacidad de elección de fecha y hora. 
4.	Establecimiento de citas. 
5.	Regla “Si está ocupada no te deja reservar”. 
6.	Sección servicio de la peluquería(Servicios, Quienes somos, Contactanos) 
7.	Estética web
8.	Guardado/Actualizado de citas en Base de Datos. 
Procedimientos de desarrollo
	Herramientas utilizadas: Para la capa IU desarrollaremos documentos web con estilos mediante Sublime Text 3. Para la capa de Aplicación crearemos un proyecto Java con Eclipse. Por último para la Base de Datos tendrá motor MySQL y WampServer.


![image](https://github.com/FaridAmagua/Proyecto-Peluqueria/assets/98462673/20f6a0e5-2b15-4dae-b68b-98edbaa1961b)
![image](https://github.com/FaridAmagua/Proyecto-Peluqueria/assets/98462673/77e60e9d-45bd-440e-8322-3044b5cc1d3c)
2. Arquitectura del sistema
![image](https://github.com/FaridAmagua/Proyecto-Peluqueria/assets/98462673/45da96a0-4f6b-4fed-a0e8-4330d519dffb)
En nuestra aplicación la disposición de los módulos es bastante clara. En la parte Web la arquitectura comienza con el registro de usuario. Una vez el cliente se haya registrado podrá hacer login y la creación, modificación y/o eliminación de sus citas personales.
En cuanto a la parte Java, su uso está más enfocado al de los empleados. Esta parte de la arquitectura comienza con el login del usuario. Una vez accedamos, se abrirá una pantalla en el que saldrá un menú con diferentes opciones para realizar diversas funciones. Las diversas funciones que nos ofrece el menú son el registro de usuarios, la posibilidad de realizar consultas de las citas de los clientes y la creación, modificación y eliminación de citas.
![image](https://github.com/FaridAmagua/Proyecto-Peluqueria/assets/98462673/a92bb953-c586-43b9-940f-74d56c0450dd)
![image](https://github.com/FaridAmagua/Proyecto-Peluqueria/assets/98462673/6d5f8962-8f4a-46ae-b964-c3f4fbe195a6)

3. Diseño del modelo de datos
 Diagrama ER
![image](https://github.com/FaridAmagua/Proyecto-Peluqueria/assets/98462673/1feb299a-4379-46ce-ab1d-431e9138b957)
Esquema Tablas del Sistema
![image](https://github.com/FaridAmagua/Proyecto-Peluqueria/assets/98462673/1fb44663-9f71-4718-a284-af2a53f08d65)
5. Descripción de procesos y servicios ofrecidos por el sistema
![image](https://github.com/FaridAmagua/Proyecto-Peluqueria/assets/98462673/ef820f33-2a77-4a60-88ad-ad4d1ebc3cb7)
![image](https://github.com/FaridAmagua/Proyecto-Peluqueria/assets/98462673/be38c225-5c68-4ee9-81a2-607770d719b0)
![image](https://github.com/FaridAmagua/Proyecto-Peluqueria/assets/98462673/d62fd802-a006-420b-95fc-e9cf672f2b98)
![image](https://github.com/FaridAmagua/Proyecto-Peluqueria/assets/98462673/354fb75b-142b-4dc3-a61f-d1172bfc52de)
![image](https://github.com/FaridAmagua/Proyecto-Peluqueria/assets/98462673/26c965a3-6498-41df-b602-c3dc16edebbd)


