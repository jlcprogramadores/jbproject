<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Archivo;
use Illuminate\Support\Facades\Storage;


class DeleteFileTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deleteFile:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Funciona para eliminar archivos grandes de la carpeta public/storage';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
        $files = Archivo::get();

        foreach($files as $file){
            unlink(base_path('storage/app/public/'.explode("/",$file->url)[2]));
            $file->delete();
        } 
        
        $texto = "[". date("Y-m-d H:i:s") . "]" . " Ejecucion de deleteFileTask";
        Storage::append("archivo.txt",$texto);
    }
}
