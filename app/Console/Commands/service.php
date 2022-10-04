<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Providers\AppServiceProvider;

class service extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {serviceName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service interface and class';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $this->info('The command was successful!'); // info
        $interface_file_handle = $this->createInterfaceFile();
        if ($interface_file_handle) {
            $this->buildInterface($interface_file_handle);
        }
        $file_handle = $this->createFile();
        if ($file_handle) {
            $this->buildClass($file_handle);
        }
    }

    private function createInterfaceFile() {
        $interfacePath = app_path('Contracts/Services/');
        $serviveName = $this->argument('serviceName');
        if (!file_exists($interfacePath)) {
            mkdir($interfacePath, 0777, true);
        }

        $filename = $interfacePath . $serviveName .'Interface.php';
        $file_handle = fopen($filename, 'wb');
        return $file_handle;
    }

    private function createFile() {
        $serviveName = $this->argument('serviceName');
        $path = app_path('Services/');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $filename = $path . $serviveName .'.php';
        $file_handle = fopen($filename, 'wb');
        return $file_handle;
    }

    private function buildClass($file_handle)
    {
        $serviveName = $this->argument('serviceName');
        $interfaceName = $serviveName . 'Interface';
        $appPath = 'App\Contracts\Services\\' . $interfaceName;

        $content = <<<EOD
        <?php

        namespace App\Services;
        use $appPath;

        class $serviveName implements $interfaceName
        {

        }

        EOD;
        fwrite($file_handle, $content);
        $this->newLine();
        echo "Service created successfully.";
        $this->newLine(2); // add new line in command line
    }

    private function buildInterface($file_handle)
    {
        $serviveName = $this->argument('serviceName');
        $interfaceName = $serviveName . 'Interface';

        $content = <<<EOD
        <?php

        namespace App\Contracts\Services;

        interface $interfaceName {

        }

        EOD;
        fwrite($file_handle, $content);
    }
}
