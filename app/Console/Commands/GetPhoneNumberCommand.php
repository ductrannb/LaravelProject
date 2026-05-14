<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GetPhoneNumberCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:get_phone_number';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $html = file_get_html('https://ladorax.com/diem-ban/');
        foreach ($html->find('a') as $element) {
            if (strpos($element->href, "dia_diem")) {
                $index = 1;
                foreach (file_get_html($element->href)->find('td') as $sub_element) {
                    if ($sub_element->innertext && $index % 5 == 0) {
                        $this->info($sub_element->innertext);
                    }
                    $index++;
                }
            }
        }
        return Command::SUCCESS;
    }
}
