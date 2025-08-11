-- Active: 1754915771645@@127.0.0.1@3306@ECommerce


CREATE DATABASE ECommerce;

USE ECommerce;

CREATE TABLE `usuarios`(
    `id`     int          NOT NULL AUTO_INCREMENT,
    `nombre` varchar(100) NOT NULL,
    `email`  varchar(100) NOT NULL,
    `password`  varchar(255) NOT NULL,
    `rol`  enum('admin', 'user') NOT NULL DEFAULT 'user',
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`)
); 

CREATE TABLE relacion_comercial (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    tipo ENUM('CLIENTE', 'PROVEEDOR', 'SOCIO') NOT NULL,
    fecha_registro DATE NOT NULL ,
    activo BOOLEAN NOT NULL DEFAULT TRUE
);

CREATE TABLE `plantas` (
    `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre` varchar(100) NOT NULL,
    `familia` varchar(100) NOT NULL,
    `categoria` varchar(100) NOT NULL
);

INSERT INTO plantas (nombre, familia, categoria) VALUES
('Asd', 'asd', 'asd'),
('das', 'das', 'das'),
('das2', 'das2', 'das2');


INSERT INTO relacion_comercial (nombre, tipo, fecha_registro, activo) VALUES
('Comercial Pérez S.A.', 'PROVEEDOR', '2025-01-15', TRUE),
('Supermercado El Ahorro', 'CLIENTE', '2025-02-01', TRUE),
('Logística Express', 'SOCIO', '2025-02-20', TRUE),
('Tienda La Esquina', 'CLIENTE', '2025-03-05', FALSE),
('Industrias Gómez', 'PROVEEDOR', '2025-03-18', TRUE),
('Tech Solutions', 'SOCIO', '2025-04-10', TRUE),
('Panadería Dulce Hogar', 'CLIENTE', '2025-04-25', TRUE),
('Distribuidora Global', 'PROVEEDOR', '2025-05-12', FALSE),
('Asociados del Caribe', 'SOCIO', '2025-05-30', TRUE),
('Boutique Fashion', 'CLIENTE', '2025-06-14', TRUE);