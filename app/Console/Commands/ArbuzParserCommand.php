<?php

namespace App\Console\Commands;

use Goutte\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;

class ArbuzParserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'arbuz:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $starttime = microtime(true);
        $url = "https://arbuz.kz/";

        $client = new Client(HttpClient::create(['timeout' => 60]));
        $crawler = $client->request('GET', $url);



        $category_links = $crawler->filter('.nav-item')->filter('.dropdown')->each(function ($node) {
            return  ['main' => $node->filter('a')->eq(0)->text(), 'children' => $node->filter('.align-items-stretch')->children()->each(function ($node) {
                $title = $node->filter('a')->text();
                $link = $node->filter('a')->attr('href');
                $data = [];
                return compact('title', 'link', 'data');
            })];
        });
        $category_links = collect($category_links);
        $file = fopen('gg.csv', 'w');
        fputcsv($file, array('title', 'price'));
        foreach ($category_links as &$category) {
            foreach ($category['children'] as &$cat) {
                $arr = [];
                $request = $client->request('GET', $cat['link']."?limit=100");
                $pagination = $request->filter(".pagination")->children();
                if ($pagination->count() < 3 ) {
                    $arr[] = $this->takeProduct($request);
                } else {
                    $pagination_links = $pagination->filter(".page-link")->reduce(function ($node, $i) {
                        return $i != 1;
                    })->each(function ($node) {
                        return $node->attr('href');
                    });
                    foreach ($pagination_links as $pagination_link){
                        $request = $client->request('GET', $pagination_link);
                        $arr[] = $this->takeProduct($request);
                    }
                }
                $cat['data'] = $arr;
                // делаю итерацию
                foreach ($arr as $a) {
                    foreach ($a as $p) {
                        fputcsv($file, $p);
                    }
                }

            }
        }


        $endtime = microtime(true);
        $timediff = $endtime - $starttime;
        echo $timediff;
        fclose($file);
        return 0;
    }

    function takeProduct($request) {
        return $request->filter('.product-item-box')->each(function (Crawler $node) {
            $title = $node->filter('.product-item-text')->text();
            $price = $node->filter('.product-item-price')->filter('b')->text();
            return compact('title', 'price');
        });
    }
}
