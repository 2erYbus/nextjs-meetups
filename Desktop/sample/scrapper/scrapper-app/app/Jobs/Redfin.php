<?php

namespace App\Jobs;

use App\Models\Scraper;
use Exception;
use Goutte\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Redfin implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $client = new Client();
        $crawler = $client->request('GET', $this->url);
        $photos = [];
        $crawler->filter('.InlinePhotoPreview--Photo')->each(function ($node) use (&$photos) {
            $src = $node->filter('img')->attr('src');
            $photos[] = $src;
        });
        $houseInfo = $crawler->filter('.MainHouseInfoPanel')->text();
        try{
            $phoneNumber = $crawler->filter('.listingContactSection')->text();
        }catch (Exception $e){
            $phoneNumber = 'no number';
        }
        $agent = $crawler->filter('.agent-info-section')->text();
        
        $images = $crawler->filter('img')->each(function ($node) {
            return $node->attr('src');
        });
        dd($images);


        // $agent = $crawler->filter('.bhi')->text();
        // $keyDetailsList = [];
        // $crawler->filter('.keyDetailsList')->each(function ($node) use (&$keyDetailsList) {
        //     $src = $node->filter('.keyDetailsList')->text();
        //     $keyDetailsList[] = $src;
        // });
        // $details = [];
        // $crawler->filter('.super-group-content')->each(function ($node) use (&$details) {
        //     $src = $node->filter('.super-group-content')->text();
        //     $details[] = $src;
        // });
        // $parking = $details[0];
        // $interior = $details[1];
        // $exterior = $details[2];
        // $financial = $details[3];
        // $utilities = $details[4];
        // $location = $details[5];
        // $other = $details[6];
        
        
        $data = new Scraper();
    
        $data->agent = $agent;
        // $data->phoneNumber = $phoneNumber;
        $data->houseInfo = $phoneNumber;
        // $data->keyDetailsList = $keyDetailsList;
        // $data->parking = $parking;
        // $data->interior = $interior;
        // $data->exterior = $exterior;
        // $data->financial = $financial;
        // $data->utilities = $utilities;
        // $data->location = $location;
        // $data->other = $other;
        $data->image = implode('  ;  ', $photos);
        $data->save();

    }
}
