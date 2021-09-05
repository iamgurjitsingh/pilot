<?php

namespace App\Console\Commands;

use App\Models\Register;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExportRegister extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:register';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export all registration and upload to S3 bucket';

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
     * @return mixed
     */
    public function handle(Request $request)
    {
        $registrations = Register::select('created_at', 'name', 'company', 'street', 'street_no', 'zip_code', 'city')->get();
        $path = storage_path('app/public/');
        $filename = "export" . date("Y-m-d H:i:s") . ".csv";
        $handle = fopen($path.$filename, 'w+');
        fputcsv($handle, array('date of entry', 'name', 'company', 'street', 'street no', 'zip code', 'city'));

        foreach ($registrations as $registration) {
            fputcsv($handle,
                [
                    $registration['created_at'],
                    $registration['name'],
                    $registration['company'],
                    $registration['street'],
                    $registration['street_no'],
                    $registration['zip_code'],
                    $registration['city']
                ]);
        }

        fclose($handle);

        $this->info('Successfully exported all registrations');
        $this->info($path.$filename);
        Storage::disk('s3')->put($filename, fopen($path.$filename, 'r+'));
        $this->info('File upload to S3 Bucket');
    }
}

