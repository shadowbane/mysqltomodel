<?php
/**
 * Laravel IDE Helper Generator
 *
 * @author    Adli I. Ifkar <adly.shadowbane@gmail.com>
 * @copyright 2016 Adli I. Ifkar / Digital Artisan (http://digitalartisan.co.id)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://github.com/shadowbane
 */

namespace Shadowbane\MySQLModel\Http\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Shadowbane\MySQLModel\Http\Controllers\Generate;

class Generator extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mysqltomodel:make 
                            {connection : The Connection defined in config/database.php} 
                            {database : Database Name}
                            {--namespace= : Namespace to use. Defaulted using Connection Name}
                            {--T|timestamps : Whether the generated model should use timestamp}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Models from existing databases';

    /**
     * Create a new command instance.
     * Generator constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(){
        if ($connection = $this->argument('connection')) {
            $this->info("Using Connection: $connection");
        }

        if ($database_to_migrate = $this->argument('database')) {
            $this->info("Selecting Database: $database_to_migrate");
        }

        $option = [];
        $option['timestamps'] = false;
        $option = $this->options();

        new Generate($connection, $database_to_migrate, $this, $option);
    }
}
