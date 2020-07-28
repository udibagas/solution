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
        $xml = '<?xml version="1.0" encoding="UTF-8"?>
            <GetAttLogResponse>
                <Row>
                    <PIN>123</PIN>
                    <DateTime>19 juni</DateTime>
                    <Verified>True</Verified>
                    <Status>OK</Status>
                </Row>
                <Row>
                    <PIN>123</PIN>
                    <DateTime>19 juni</DateTime>
                    <Verified>True</Verified>
                    <Status>OK</Status>
                </Row>
                <Row>
                    <PIN>123</PIN>
                    <DateTime>19 juni</DateTime>
                    <Verified>True</Verified>
                    <Status>OK</Status>
                </Row>
                <Row>
                    <PIN>123</PIN>
                    <DateTime>19 juni</DateTime>
                    <Verified>True</Verified>
                    <Status>OK</Status>
                </Row>
            </GetAttLogResponse>';

        $data = simplexml_load_string($xml);
        $ret = [];

        foreach ($data->Row as $row) {
            $ret[] = (array) $row;
        }

        $this->table(['PIN', 'DateTime', 'Verified', 'Status'], $ret);
    }
}
