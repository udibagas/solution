<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test';

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
        $xml = 'HTTP/1.0 200 OK
Server: ZK Web Server
Pragma: no-cache
Cache-control: no-cache
Content-Type: text/xml
Connection: close


<GetAttLogResponse>
<Row><PIN>1</PIN><DateTime>2020-08-07 09:05:10</DateTime><Verified>4</Verified><Status>0</Status><WorkCode>0</WorkCode></Row>
<Row><PIN>1</PIN><DateTime>2020-08-07 09:05:16</DateTime><Verified>1</Verified><Status>0</Status><WorkCode>0</WorkCode></Row>
<Row><PIN>1</PIN><DateTime>2020-08-07 09:40:50</DateTime><Verified>4</Verified><Status>0</Status><WorkCode>0</WorkCode></Row>
<Row><PIN>2</PIN><DateTime>2020-08-07 09:41:42</DateTime><Verified>1</Verified><Status>0</Status><WorkCode>0</WorkCode></Row>
<Row><PIN>3</PIN><DateTime>2020-08-07 09:41:45</DateTime><Verified>1</Verified><Status>0</Status><WorkCode>0</WorkCode></Row>
<Row><PIN>1</PIN><DateTime>2020-08-07 14:45:41</DateTime><Verified>15</Verified><Status>0</Status><WorkCode>0</WorkCode></Row>
<Row><PIN>1</PIN><DateTime>2020-08-07 14:45:43</DateTime><Verified>15</Verified><Status>0</Status><WorkCode>0</WorkCode></Row>
<Row><PIN>1</PIN><DateTime>2020-08-07 16:26:51</DateTime><Verified>4</Verified><Status>0</Status><WorkCode>0</WorkCode></Row>
</GetAttLogResponse>';

        $a = strpos($xml, '<GetAttLogResponse>');
        echo substr($xml, $a);
        return;

        $data = simplexml_load_string($xml);
        $ret = [];

        foreach ($data->Row as $row) {
            $ret[] = (array) $row;
        }

        $this->table(['PIN', 'DateTime', 'Verified', 'Status', 'WorkCode'], $ret);
    }
}
