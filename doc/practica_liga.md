# Documentación Técnica - Sistema Liga de Básquetbol

## Descripción General

El sistema “Liga de Básquetbol” fue desarrollado utilizando el framework Laravel bajo el patrón de arquitectura MVC (Modelo - Vista - Controlador). El objetivo principal del sistema es permitir la gestión de equipos, jugadores, partidos y tabla de posiciones de una liga deportiva.

El sistema fue construido utilizando PHP, Laravel, MySQL y Bootstrap. Laravel permitió organizar el proyecto de manera modular y escalable, mientras que Bootstrap se utilizó para mejorar la interfaz gráfica del usuario.

La base de datos relacional fue implementada mediante migraciones de Laravel, permitiendo automatizar la creación de tablas y relaciones entre entidades.

---

## Arquitectura del Sistema

El proyecto sigue la arquitectura MVC:

- Modelos: representan la lógica y conexión con la base de datos.
- Vistas: muestran la interfaz gráfica al usuario.
- Controladores: gestionan las solicitudes HTTP y la lógica del sistema.

El sistema utiliza rutas web para acceder a las diferentes funcionalidades del proyecto.

---

## Modelos y Controladores Implementados

### Modelos

- Equipo
- Jugador
- Partido

### Controladores

- EquipoController
- JugadorController
- PartidoController

Cada controlador implementa operaciones CRUD (Crear, Leer, Actualizar y Eliminar).

---

## Funcionalidades Principales

### Gestión de Equipos

Permite registrar equipos indicando nombre, ciudad y entrenador.

### Gestión de Jugadores

Permite registrar jugadores asociados a un equipo, incluyendo nombre, edad y posición.

### Gestión de Partidos

Permite registrar partidos entre equipos, almacenar marcador y fecha del encuentro.

### Tabla de Posiciones

Calcula automáticamente partidos ganados, perdidos, puntos a favor y puntos en contra de cada equipo.

---

## Fragmentos Relevantes del Código

Se utilizaron validaciones mediante Request para garantizar integridad de datos.

Ejemplo:

```php
$request->validate([
    'nombre' => 'required',
    'edad' => 'required|integer',
]);