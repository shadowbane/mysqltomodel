<?php
/**
 * Created by PhpStorm.
 * User: Adli Ikhwanur Ifkar
 * Date: 10/11/2016
 * Time: 2:29 PM
 */

namespace Shadowbane\MySQLModel\Http\Controllers;

use Illuminate\Console\Command;
use SebastianBergmann\Environment\Console;

class Generate extends Command
{
    private $connection;
    private $database;
    private $option;
    private $config;
    private $gen;

    public function __construct($connection, $database, $gen, $option = [])
    {
        $this->connection = $connection;
        $this->database = $database;
        $this->option = $option;
        $this->config  = config('mysql-migration');
        $this->gen = $gen;
        $dir = $this->prepareDirectory();

        $cn = "Tables_in_$this->database";

        foreach ($this->getTables() as $table){
            $tblName = $table->$cn;
            $this->gen->info("Table Found: $tblName"); // Sending info to console

            $arr = [];
            foreach ($this->getColumns($tblName) as $col){
                array_push($arr, $col->Field);
            }
            $data['namespace'] = $this->getNameSpace();
            $data['fileName'] = ucfirst(strtolower($tblName));
            $data['filePath'] = $dir . $data['fileName'];
            $data['connection'] = $this->connection;
            $data['timestamps'] = $this->option['timestamps'];
            $this->makeModel($data);
        }
    }

    private function prepareDirectory(){
        $namespace = $this->getNameSpace();
        $dir = app_path(config('mysql-migration.model_locations') . '/' . $namespace) . '/';
        if(!is_dir($dir)){
            mkdir($dir, 0777, true);
        }
        return $dir;
    }

    private function getNameSpace(){
        $namespace = $this->connection;
        if($this->option['namespace']){
            $namespace = $this->option['namespace'];
        }
        return $namespace;
    }

    private function getTables(){
        return \DB::connection($this->connection)->select('SHOW TABLES');
    }

    private function getColumns($tblName){
        return \DB::connection($this->connection)->select('SHOW COLUMNS FROM `' . $tblName .'`');
    }

    private function prepareModel($data){
        return "<?php\n\n" . view("mysql-migration::template.model.model", $data)->render();
    }

    private function makeModel($data){
        $this->gen->info("Creating Model: $data[filePath]"); // Sending info to console
        $content = $this->prepareModel($data);
        return file_put_contents($data['filePath'] . '.php', $content);
    }
}