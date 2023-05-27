# install 
    composer require livewire/livewire
    php artisan livewire:publish --config
    php artisan livewire:publish --assets
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