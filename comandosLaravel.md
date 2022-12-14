php artisan make:model TipoDeDireccione -mc = HACES UN NUEVO MODELO Y CONTROLADOR
php artisan migrate = HACES LAS MIGRACIONES
php artisan migrate:update = HACES LAS MIGRACIONES ACTUALIZADAS
php artisan migrate:rollback = HACES ROLLBACK A LAS MIGRACIONES
php artisan serve = CORRER EL PROYECTO


 # para que jale 
composer require laravel/ui
php artisan ui bootstrap --auth
npm install
npm run dev
composer require ibex/crud-generator --dev
publish --tag=laravel-assets --ansi
php artisan vendor:publish --tag=crud
php artisan make:crud "nombre de tabla"

# alert Swal
npm install sweetalert2
npm run dev


# Si se modificia el archivo app.php para ver reflejados los cambios se usa 
php artisan config:clear

# instalar y usar icon packages
composer require codeat3/blade-carbon-icons
página: https://blade-ui-kit.com/blade-icons
ejemplo:
```html
<x-carbon-apple style="color: green"/>
```


# Para hacer link simbolico de la carpeta storage/public  y acceder desde su URL
php artisan storage:link

# Para que funcione correctamente el gitignore
 git rm -r --cached .
 git commit -m "fixed untracked files"
 git push ó subirlo mediente desktop

# Para que funcione el seeder (se llenan las tablas solas)
 php artisan migrate:fresh --seed

# Para llenar tablas en  producción OJO SOBREESCRIBE TODO
migrate:fresh --seed --force