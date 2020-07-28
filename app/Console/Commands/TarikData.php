<?php

namespace App\Console\Commands;

use App\Mesin;
use Illuminate\Console\Command;

class TarikData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'solution:tarik-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tarik data log mesin solution';

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

        $mesin = Mesin::all();

        $request = "<GetAttLog><ArgComKey xsi:type=\"xsd:integer\">0</ArgComKey><Arg><PIN xsi:type=\"xsd:integer\">All</PIN></Arg></GetAttLog>";

        foreach ($mesin as $m) {
            $this->info("{$m->kode} - {$m->lokasi} - {$m->ip}");

            try {
                $fp = fsockopen($m->ip, 80, $errno, $errstr, 1);
            } catch (\Exception $e) {
                $this->error('Koneksi gagal : ' . $e->getMessage());
                continue;
            }

            fputs($fp, "POST /iWsService HTTP/1.0\r\n");
            fputs($fp, "Content-Type: text/xml\r\n");
            fputs($fp, "Content-Length: " . strlen($request) . "\r\n\r\n");
            fputs($fp, $request . "\r\n");

            $xml = "";

            while (!feof($fp)) {
                $xml .= fgets($fp, 1024);
            }

            fclose($fp);

            $data = simplexml_load_string($xml);
            $ret = [];

            foreach ($data->Row as $row) {
                $ret[] = (array) $row;
            }

            $this->table(['PIN', 'DateTime', 'Verified', 'Status'], $ret);
        }
    }
}
