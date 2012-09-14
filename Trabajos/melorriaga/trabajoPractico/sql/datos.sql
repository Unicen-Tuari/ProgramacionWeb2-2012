insert into categoria (cat) values ('COMPUTADORAS');
insert into categoria (cat) values ('CONSOLAS');
insert into categoria (cat) values ('CELULARES');


insert into producto (nombre, nombre_imagen, precio, cantidad, caracteristicas, fecha_ingreso, codigo_categoria) values 
('HP ProBook 6565b',
 'notebook.jpg',
 '$3500',
 10,
 'Procesador: AMD Quad-Core - Memoria RAM: 4 GB (actualizable hasta 16 GB) - HDD: SATA II (7200 rpm) 500 GB - Pantalla: 15.6\" - Video: AMD Radeon HD 6520G GPU',
 '2012-05-14',
 1);

insert into producto (nombre, nombre_imagen, precio, cantidad, caracteristicas, fecha_ingreso, codigo_categoria) values 
('PlayStation 3',
 'playstation.jpg',
 '$2500',
 10,
 'CPU: Cell Broadband Engine 3,2 GHz - GPU: NVIDIA/SCEI RSX 550 MHz - Memoria: XDR RAM 256 MB GDDR3 VRAM 256 MB - Soporte: Blu-ray Disc, DVD, CD - Almacenamiento: 320 GB - Controles: 1 DualShock 3 - Wifi - Salida HDMI',
 '2012-05-12',
 2);

insert into producto (nombre, nombre_imagen, precio, cantidad, caracteristicas, fecha_ingreso, codigo_categoria) values 
('BlackBerry Torch',
 'blackberry.jpg',
 '$3000',
 10,
 'Dimensiones: 111mm x 62mm x 14.6mm - Peso: 161 gramos - Pantalla: TFT Touchscreen de 3.2 pulgadas - Teclado QWERTY - Trackpad optico - Sensor de proximidad - Tarjeta de memoria 4 GB incluida - Camara: 5 megapixeles - WiFi - Bluetooth',
 '2012-04-02',
 3);

insert into producto (nombre, nombre_imagen, precio, cantidad, caracteristicas, fecha_ingreso, codigo_categoria) values 
('iPhone 4',
 'iphone.jpg',
 '$4000',
 10,
 'Capacidad: Memoria en flash USB de 8 GB - Dimensiones: 115.2mm x 58.6mm x 9.3 mm - Peso: 137 gramos - WiFi - Bluetooth - GPS - Sensores: Giroscopio de tres ejes, Acelerometro, Sensor de proximidad, Sensor de luz ambiental - Pantalla Multi-Touch de 3.5 pulgadas - Grabacion de videos HD (720p) - Camara de 5 megapixeles - Flash LED - Bateria de litio-ion recargable integrada - Auriculares',
 '2012-05-18',
 3);

insert into producto (nombre, nombre_imagen, precio, cantidad, caracteristicas, fecha_ingreso, codigo_categoria) values 
('Motorola Defy+',
 'defyplus.jpg',
 '$900',
 10,
 'Dimensiones: 107mm x 59mm x 13.4mm - Peso: 118 gramos - Pantalla: TFT Touchscreen capacitivo de 3.7 pulgadas - Soporte Multi-touch - Sensores: Acelerometro, Sensor de proximidad, Sensor de luz ambiente - Memoria: 2 GB interna, tarjeta SD 8 GB incluida - Procesador: Cortex-A8 1GHz - Sistema Operativo: Android 2.3 Gingerbread - Camara: 5 megapixeles - Flash LED - WiFi - Bluetooth',
 '2012-04-06',
 3);


insert into usuario (usu, password) values 
('matoelorriaga',
 '34851231');