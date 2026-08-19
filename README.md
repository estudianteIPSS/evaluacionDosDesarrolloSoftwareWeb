# Sistema de Gestión de Proyectos

Aplicación web desarrollada con **Laravel** para la gestión de proyectos de la empresa ficticia **Tech Solutions**.

El proyecto fue desarrollado como parte de la evaluación de la **Unidad N.º 2 de Desarrollo de Software Web I**, incorporando persistencia de datos mediante ORM, autenticación, autorización, cifrado de contraseñas y autenticación mediante JWT para la API.

---

## 1. Tecnologías utilizadas

* **PHP 8.5+**
* **Laravel 13**
* **SQLite**
* **Eloquent ORM**
* **Laravel Blade**
* **Tailwind CSS**
* **Vite**
* **JWT (JSON Web Token)**
* **Composer**
* **Node.js / npm**

---

## 2. Requerimientos del sistema

Para ejecutar el proyecto se requiere tener instalado:

* PHP 8.5 o compatible con Laravel 13
* Composer
* Node.js
* npm
* Extensión SQLite para PHP
* Git

Se recomienda utilizar las versiones actuales y estables de estas herramientas compatibles con Laravel 13.

---

# 3. Funcionalidades

El sistema permite:

* Registrar usuarios.
* Iniciar sesión mediante interfaz web.
* Cerrar sesión.
* Crear proyectos.
* Visualizar proyectos.
* Editar proyectos.
* Eliminar proyectos.
* Consultar el valor de la UF.
* Separar los proyectos según el usuario autenticado.
* Proteger las rutas web mediante middleware de autenticación.
* Proteger las rutas API mediante middleware JWT.
* Autenticar usuarios mediante JWT en la API.
* Registrar usuarios mediante la API.
* Crear y administrar proyectos mediante la API.
* Validar los datos recibidos.
* Cifrar las contraseñas antes de almacenarlas.
* Autorizar el acceso a los proyectos mediante Policies.

---

# 4. Arquitectura general

La aplicación utiliza Laravel siguiendo una arquitectura basada en:

```text
Usuario
   │
   │ 1:N
   ▼
Proyecto
```

Cada proyecto posee un campo:

```text
created_by
```

Este campo corresponde al `id` del usuario que creó el proyecto.

La relación se representa de la siguiente manera:

```text
users
────────────────────
id
name
email
password
────────────────────
        │
        │
        │ 1:N
        ▼
projects
────────────────────
id
nombre
fecha_inicio
estado
responsable
monto
created_by
────────────────────
```

Por lo tanto, un usuario puede tener múltiples proyectos, mientras que cada proyecto pertenece a un único usuario.

---

# 5. Estructura principal del proyecto

```text
app/
├── Http/
│   ├── Controllers/
│   │   ├── AuthController.php
│   │   ├── ProjectController.php
│   │   ├── ProjectPageController.php
│   │   └── WebAuthController.php
│   │
│   └── Middleware/
│       └── JwtMiddleware.php
│
├── Models/
│   ├── User.php
│   └── Project.php
│
├── Policies/
│   └── ProjectPolicy.php
│
└── Services/
    └── UfService.php

database/
├── migrations/
└── seeders/
    └── DatabaseSeeder.php

resources/
├── css/
├── js/
└── views/
    ├── components/
    ├── layouts/
    └── pages/

routes/
├── api.php
└── web.php

config/
├── auth.php
└── ...

.env.example
composer.json
package.json
artisan
```

---

# 6. Instalación

## 6.1. Clonar o Descargar el repositorio

```bash
git clone https://github.com/USUARIO/REPOSITORIO.git
cd REPOSITORIO
```

Reemplazar `USUARIO/REPOSITORIO` por la dirección real del repositorio.

---

## 6.2. Instalar dependencias de PHP

```bash
composer install
```

Esto instalará las dependencias definidas en `composer.json` y `composer.lock`.

---

## 6.3. Instalar dependencias de JavaScript

```bash
npm install
```

---

# 7. Configuración del entorno

El archivo `.env` no se incluye en el repositorio debido a que contiene configuraciones específicas del entorno y secretos.

Crear el archivo `.env` a partir del archivo de ejemplo.

### Windows PowerShell

```powershell
Copy-Item .env.example .env
```

### Linux / macOS

```bash
cp .env.example .env
```

---

# 8. Generar la clave de Laravel

Ejecutar:

```bash
php artisan key:generate
```

Esto generará automáticamente una nueva variable:

```env
APP_KEY=...
```

No es necesario utilizar la clave del entorno de desarrollo original.

---

# 9. Configuración de SQLite

El proyecto utiliza **SQLite** como motor de base de datos.

La configuración esperada es:

```env
DB_CONNECTION=sqlite
DB_DATABASE=database/desarrollo_software_1.sqlite
```

Crear el archivo de base de datos:

### Windows PowerShell

```powershell
New-Item database/desarrollo_software_1.sqlite -ItemType File
```

### Linux / macOS

```bash
touch database/desarrollo_software_1.sqlite
```

La base de datos no necesita ser incluida en el repositorio, ya que puede ser reconstruida mediante las migraciones y el Seeder.

---

# 10. Configuración de JWT

El proyecto utiliza JWT para la autenticación de la API.

En el archivo `.env` debe existir:

```env
JWT_ALGO=HS256
JWT_SECRET=
```

Generar un nuevo secreto JWT utilizando:

```bash
php artisan jwt:secret
```

Esto generará automáticamente el valor de `JWT_SECRET`.

El secreto JWT es específico de cada instalación y no debe ser publicado en el repositorio.

---

# 11. Crear la base de datos

Una vez configurado SQLite y JWT, ejecutar:

```bash
php artisan migrate:fresh --seed
```

Este comando:

1. Elimina las tablas existentes.
2. Ejecuta todas las migraciones.
3. Crea las tablas necesarias.
4. Ejecuta `DatabaseSeeder`.
5. Crea un usuario inicial.
6. Crea tres proyectos asociados al usuario inicial.

---

# 12. Datos iniciales

El `DatabaseSeeder` crea automáticamente el siguiente usuario:

```text
Nombre: root
Correo: admi@tech.com
Contraseña: desarrollo_software_1
```

También crea tres proyectos asociados a este usuario.

### Proyectos iniciales

```text
1. Sistema de Gestión de Proyectos
   Estado: En desarrollo
   Responsable: Eduardo
   Monto: $1.500.000

2. Plataforma Web Corporativa
   Estado: Pendiente
   Responsable: Eduardo
   Monto: $2.800.000

3. Aplicación de Control de Inventario
   Estado: En desarrollo
   Responsable: Eduardo
   Monto: $3.200.000
```

El campo `created_by` de cada proyecto corresponde al `id` del usuario creado por el Seeder.

---

# 13. Compilar los recursos frontend

Ejecutar:

```bash
npm run build
```

Esto compila los recursos utilizados por Vite y Tailwind CSS.

---

# 14. Ejecutar la aplicación

Iniciar el servidor de desarrollo de Laravel:

```bash
composer run dev
```

La aplicación estará disponible normalmente en:

```text
http://127.0.0.1:8000
```

---

## Solución de problemas

Si Laravel muestra el error:

"Please provide a valid cache path."

verificar que exista:

storage/framework/views

Si no existe, crear el directorio y ejecutar:

```bash
php artisan optimize:clear
```

# 15. Acceso al sistema web

Al acceder a:

```text
/login
```

se puede iniciar sesión utilizando:

```text
Correo:
admi@tech.com

Contraseña:
desarrollo_software_1
```

También es posible registrar nuevos usuarios desde:

```text
/register
```

---

# 16. Rutas web

Las principales rutas web son:

| Método | Ruta                         | Descripción                     |
| ------ | ---------------------------- | ------------------------------- |
| GET    | `/login`                     | Formulario de inicio de sesión  |
| POST   | `/login`                     | Procesa el inicio de sesión     |
| GET    | `/register`                  | Formulario de registro          |
| POST   | `/register`                  | Procesa el registro             |
| POST   | `/logout`                    | Cierra la sesión                |
| GET    | `/projects`                  | Lista los proyectos del usuario |
| GET    | `/projects/create`           | Formulario de creación          |
| POST   | `/projects`                  | Crea un proyecto                |
| GET    | `/projects/{project}`        | Visualiza un proyecto           |
| GET    | `/projects/{project}/edit`   | Formulario de edición           |
| PUT    | `/projects/{project}`        | Actualiza un proyecto           |
| GET    | `/projects/{project}/delete` | Confirmación de eliminación     |
| DELETE | `/projects/{project}`        | Elimina un proyecto             |

Las rutas de proyectos están protegidas mediante el middleware:

```text
auth
```

Por lo tanto, un usuario no autenticado no puede acceder a la administración de proyectos.

---

comprobar que el usuario haya iniciado sesión antes de acceder al sistema de gestión de proyectos.

---
