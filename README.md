# 🚀 Sistema de Gestión de Usuarios y Tareas - Proyecto Final Web II

Este proyecto es una aplicación web desarrollada con **CakePHP 5.x**. Implementa un sistema robusto de autenticación, gestión de roles y soporte multilingüe dinámico (i18n).

---

## 📋 Requisitos del Sistema
Para el despliegue se requiere un entorno de contenedores:
* **Motor:** Podman / Docker
* **Orquestador:** Podman-compose / Docker-compose
* **Base de Datos:** MariaDB (vía contenedor)
* **Servidor Web:** Apache con PHP 8.2+

---

## 🛠️ Instrucciones de Despliegue

Sigue estos pasos para poner en marcha el proyecto en la red universitaria o local:

### 1. Clonar y Preparar
```bash
git clone <URL_DE_TU_REPOSITORIO>
cd app_ef
```

### 2. Levantar la Infraestructura
Inicia los servicios definidos en el archivo `compose.yaml`:
```bash
podman-compose up -d
```

### 3. Instalación de Dependencias (Composer)
Instala el núcleo del Framework y los plugins de seguridad:
```bash
podman exec -it cakephp_final composer install
```

### 4. Configuración de Base de Datos
1. Accede a **phpMyAdmin** en el puerto `8084` (o la IP asignada: `http://172.25.0.205:8084`).
2. Asegúrate de que exista la base de datos `proyecto_final_db`.
3. Importa el script SQL para la tabla `users` que incluye los campos de CI, Departamento (Bolivia), Sexo y Roles.

---

## 🌟 Funcionalidades Implementadas

| Característica | Descripción |
| :--- | :--- |
| **Login Seguro** | Acceso restringido con redirección automática a la raíz (`/`). |
| **Password Toggle** | Función visual para mostrar/ocultar contraseña con ícono de "ojo" mediante JS. |
| **Roles (RBAC)** | Solo usuarios con `es_administrador = 1` pueden realizar acciones de CRUD. |
| **Localización Manual** | Selector de idioma (Español/Inglés) disponible en el layout principal. **Sin funcionamiento** |
| **Busqueda y ordenamiendo** | Los datos pueden ser ordenados y asi mimo se puede buscar cualquier dato. |

---

## 📂 Estructura de Archivos Clave
* `src/Controller/UsersController.php`: Lógica de autenticación, logout y cambio de idioma.
* `templates/Users/login.php`: Interfaz de inicio de sesión con seguridad visual (Password Toggle).
* `resources/locales/`: Diccionarios de traducción (`.po`) para español e inglés.
* `config/routes.php`: Mapeo de rutas para establecer el Login como página de inicio obligatoria.

---

## 👤 Información del Estudiante
* **Nombre:** Paul Alejandro Castedo Arteaga
* **Carrera:** Ingeniería de Sistemas
* **Materia:** Tecnologías Web II
* **Institución:** Universidad Privada de Santa Cruz de la Sierra (UPDS)
* **Fecha:** Abril 2026
