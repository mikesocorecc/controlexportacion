# Sistema pra el control de exportacion de productos

## Cual era el problema del cliente?

La empresa ABC es una empres que se dedica a la exportación de productos desde Centro América 
hacia Estados Unidos y Canadá. Actualmente sus procesos los realizan con datos en Excel y 
anotaciones a mano pero están buscando implementar un sistema que les permita agilizar sus 
procesos de logística y asegurar el flujo de sus exportaciones.
La empresa ABC tiene distintos proveedores a los cuales les compra producto al por mayor, sin
embargo, es posible comprar el mismo producto a diferentes proveedores. Cada uno de estos 
proveedores tiene precios definidos para los productos.
Al comprar todos los productos, la empresa ABC programa un envío de producto en un contenedor. 
Cada contenedor tiene un aeropuerto de destino y ABC necesita llevar el control de una fecha 
tentativa de entrega, fecha real de arrivo, lugar de arrivo. 



## La solucion que se le dio

Crear un sistema de administracion y gestion para exportar porductos y tener un mejor control, el sitema registra que usuario realiza 
la compra a un proveedor


**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use Github issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Contributing

We welcome contributions from the community.

Please read the [*Contributing to CodeIgniter*](https://github.com/codeigniter4/CodeIgniter4/blob/develop/contributing.md) section in the development repository.

## Server Requirements

PHP version 7.4 se requiere esa version de php para poder funcionar en el sistema:

## pasos para usarlo en local

- [.env]  app.baseURL = 'http://localhost/controlexportacion/'
- [App/Config/App.php]  $baseUrl if you plan to use the HTTP\CURLRequest library
- [App/Config/Database.php] 	
Verifique su conexion a la base de datos
		'hostname' => 'localhost',
		'username' => 'root',
		'password' => '',
		'database' => 'codigosmk',
		'DBDriver' => 'MySQLi','

        
