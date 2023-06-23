# install 
    composer require livewire/livewire
    php artisan livewire:publish --config
    php artisan livewire:publish --assets

# Limpiar cache para que funcione la integracion
    php artisan optimize:clear
# include assets
    <html>
    <head>
        ...
        @livewireStyles
    </head>
    <body>
        ...
        @livewireScripts
    </body>
    </html>