<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class Helper extends Command
{
    protected $signature = 'make:helper {name}';
    protected $description = 'Create a new helper class';

    public function handle()
    {
        $name = $this->argument('name');

        // * DEFINE THE PATH WHERE THE HELPER CLASS WILL BE CREATED * //
        $path = app_path("Helpers/{$name}.php");

        // * CHECK IF THE HELPER CLASS ALREADY EXISTS * //
        if (File::exists($path)) {
            $this->error("Helper class '{$name}' already exists.");
            return;
        }

        // * CREATE THE DIRECTORY FOR THE HELPER CLASSES IF IT DOESN'T EXIST * //
        File::ensureDirectoryExists(app_path('Helpers'));

        // * CREATE THE HELPER CLASS FILE WITH PREDEFINED CONTENT * //
        File::put($path, $this->generateHelperClassContent($name));

        $this->info("Helper class '{$name}' created successfully.");
    }

    protected function generateHelperClassContent($name)
    {
        // * DEFINE THE CONTENT FOR THE HELPER CLASS FILE * //
        return
        "<?php

        namespace App\Helpers;

        class {$name}
        {
            public static function myFunction()
            {
                // Your helper function logic here
            }
        }
        ";
    }
}
