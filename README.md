# Optimización de Aplicaciones Web

## 🏫 Información académica

### Universidad

Facultad de Matemáticas, Universidad Autónoma de Yucatán.

### Carrera

Licenciatura en Ingeniería de Software

### Profesor

Dr. Víctor Hugo Menéndez Domínguez

## 👨‍💻 Equipo

|                    Jonathan Gómez                    |                  Ricardo Grimaldo                   |                    Joshua Meza                     |                   Hebert Negrón                    |
| :--------------------------------------------------: | :-------------------------------------------------: | :------------------------------------------------: | :------------------------------------------------: |
| ![Member picture](./github/img/Picture_Jonathan.png) | ![Member picture](./github/img/Picture_Ricardo.png) | ![Member picture](./github/img/Picture_Joshua.png) | ![Member picture](./github/img/Picture_Hebert.png) |

## 🛠 Instrucciones de uso

### Instalación de Laravel

Si no has instalado Laravel en tu computadora, sigue las instrucciones del siguiente [vídeo](https://youtu.be/ImtZ5yENzgE?t=127) de _freeCodeCamp.org_.

### Preparar el proyecto

1. Ir al directorio `/xampp/htdocs/` de tu computadora.
2. Crea una carpeta llamada `oaw` y entra en ella.
3. Inicializa git y recupera este repositorio.
4. En el mismo directorio, abre la línea de comandos y ejecuta los siguientes comandos en el orden establecido:
    - `composer install`
    - `copy .env.example .env`
    - `php artisan key:generate`
    - `php artisan migrate`
        - **Nota:** Será necesario haber creado el esquema `oaw` antes.

### Actualización tras cambios

1. Correr en el directorio del proyecto los siguientes comandos:
    - `composer update`
    - `php artisan migrate:fresh`

### Ejecutar

1. Abrir XAMPP.
2. Inicializar Apache y MySQL.
3. Entrar a la [página principal](http://localhost/oaw/public/).

> ¡Advertencia! No tener exactamente igual los nombres en la URL puede hacer que Laravel no reconozca las direcciones, eso incluye las carpetas del htdocs (oaw/public).
