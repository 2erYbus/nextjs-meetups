<?php

namespace App\Http\Controllers;

use App\Exports\InvoicesExport;
use App\Models\Scraper;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Goutte\Client;
// use App\Exports\InvoicesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Jobs\Redfin;

class ScrapperController extends Controller
{
    public function scrapper(){

        for($i=47929988;$i<47929989;$i++){

   

        $url = 'https://www.redfin.com/FL/Clearwater/1860-Yale-Dr-33765/home/'.$i;
        // Redfin::dispatch($url);
        

        // $url = 'https://www.redfin.com/FL/Clearwater/1860-Yale-Dr-33765/home/145112025';

        $client = new Client();
        $crawler = $client->request('GET', $url);
        $crawler->filter('img')->each(function ($node) {
            $imageUrl = $node->attr('src');
            $imageData = file_get_contents($imageUrl);
            $fileName = basename($imageUrl);
            $localPath = '/path/to/your/local/folder/' . $fileName;
            file_put_contents($localPath, $imageData);
        });
       

        // // Get photos
        // $photos = [];
        // $crawler->filter('.InlinePhotoPreview--Photo')->each(function ($node) use (&$photos) {
        //     $src = $node->filter('img')->attr('src');
        //     $photos[] = $src;
        // });
        // $ext_photos = [];
        // $crawler->filter('.img-card')->each(function ($node) use (&$ext_photos) {
        //     $src = $node->filter('img')->attr('src');
        //     $ext_photos[] = $src;
        // });

        // // $image_url = $crawler->filter('.FadeItem')->attr('src');
        // $houseInfo = $crawler->filter('.MainHouseInfoPanel')->text();
        // $agent = $crawler->filter('.agent-info-section')->text();
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


        // dd($details);

        
        // Assume $crawler is the Goutte crawler object containing the HTML with the plot information.
        // try{
            // dd('try');
        
        
        // $agentDetails = $crawler->filter('.agent-basic-details span')->text();
        // if(!isset($agentDetails)){
        //     $agentDetails = 'na';
        // }
        // $status = 'na';
        // if($crawler->filter('.keyDetail:contains("Status") .DefinitionFlyoutLink')->text()){
        //     $status = $crawler->filter('.keyDetail:contains("Status") .DefinitionFlyoutLink')->text();
        // }
        
        //     $agentDetails = 'na';
        // if($crawler->filter('.agent-basic-details span')->text()){
        //     $agentDetails = $crawler->filter('.agent-basic-details span')->text();
        // }
        
        // if($crawler->filter('.agent-basic-details span:nth-child(4)')->text()){
        //     $agencyName = $crawler->filter('.agent-basic-details span:nth-child(4)')->text();
        // }else{
        //     $agencyName = 'na';
        // }
        // $phoneNumber = 'na';
        // if($crawler->filter('.listingContactSection')->text()){
        //     $phoneNumber = $crawler->filter('.listingContactSection')->text();
        // }
        // $dataQuality = 'na';
        // if($crawler->filter('.data-quality ')->text()){
        //     $dataQuality = $crawler->filter('.data-quality ')->text();
        // }
      
       
        // $status = 'na';
        // if($crawler->filter('.keyDetail:contains("Status") .DefinitionFlyoutLink')->text()){
        //     $status = $crawler->filter('.keyDetail:contains("Status") .DefinitionFlyoutLink')->text();
        // }
        // $propertyType = 'na';
        // if($crawler->filter('.keyDetail:contains("Property Type") .content')->text()){
        //     $propertyType = $crawler->filter('.keyDetail:contains("Property Type") .content')->text();
        // }
        // $yearBuilt = 'na';
        // if($crawler->filter('.keyDetail:contains("Year Built") .content')->text()){
        //     $yearBuilt = $crawler->filter('.keyDetail:contains("Year Built") .content')->text();
        // }
        // $community = 'na';
        // if($crawler->filter('.keyDetail:contains("Community") .content')->text()){
        //     $community = $crawler->filter('.keyDetail:contains("Community") .content')->text();
        // }
        // $lotSize = 'na';
        // if($crawler->filter('.keyDetail:contains("Lot Size") .content')->text()){
        //     $lotSize = $crawler->filter('.keyDetail:contains("Lot Size") .content')->text();
        // } 
        // $mlsNumber = 'na';  
        // if($crawler->filter('.keyDetail:contains("MLS#") .content')->text()){
        //     $mlsNumber = $crawler->filter('.keyDetail:contains("MLS#") .content')->text();
        // }




        // $agentDetails =$crawler->filter('.agent-basic-details span:nth-child(4)')->text();
        // $agentDetails = $crawler->filter('.agent-basic-details span')->text();
        // $phoneNumber = $crawler->filter('.listingContactSection')->text();
        // $dataQuality = $crawler->filter('.data-quality ')->text();
        // // $listingSource = $crawler->filter('.listingSource .sourceContent span')->text();
        // $listingNumber = $crawler->filter('.listingSource .sourceContent span:nth-child(2)')->text();
        

        // $status = $crawler->filter('.keyDetail:contains("Status") .DefinitionFlyoutLink')->text();
        // $propertyType = $crawler->filter('.keyDetail:contains("Property Type") .content')->text();
        // $yearBuilt = $crawler->filter('.keyDetail:contains("Year Built") .content')->text();
        // $community = $crawler->filter('.keyDetail:contains("Community") .content')->text();
        // $lotSize = $crawler->filter('.keyDetail:contains("Lot Size") .content')->text();
        // $mlsNumber = $crawler->filter('.keyDetail:contains("MLS#") .content')->text();
        // $listPrice = $crawler->filter('.keyDetail:contains("List Price") .content')->text();
        // $EstMoPayment = $crawler->filter('.keyDetail:contains("Est. Mo. Payment") .content')->text();
        // $parkingInfo = $crawler->filter('.super-group-title:contains("Parking")')->nextAll()->first()->text();
        // $bedroomCount = $crawler->filter('#propertyDetails-collapsible .amenity-group:contains("# of Bedrooms") span')->eq(1)->text();
        // $bathroomCount = $crawler->filter('#propertyDetails-collapsible .amenity-group:contains("# of Full Baths") span')->eq(1)->text();
        // $heatingType = $crawler->filter('#propertyDetails-collapsible .amenity-group:contains("Heating Information") span')->eq(1)->text();
        // $coolingType = $crawler->filter('#propertyDetails-collapsible .amenity-group:contains("Cooling Information") span')->eq(1)->text();
        // $flooringType = $crawler->filter('#propertyDetails-collapsible .amenity-group:contains("Flooring") span')->eq(1)->text();

        // dd($photos);
        
        // $data = new Scraper();
        // // $data->agentName = $agentDetails;
        // // $data->phoneNumber = $phoneNumber;
        // // $data->dataQuality = $dataQuality;
        // // $data->listingSource = $listingSource;
     
        // // $data->status = $status;
        // // $data->propertyType = $propertyType;
        // // $data->yearBuilt = $yearBuilt;
        // // $data->community = $community;
        // $data->lotSize = $agent;
        // $data->mlsNumber = $houseInfo;
        // $data->image = implode('  ;  ', $photos);;
        // // $data->listPrice = $listPrice;
        // // $data->EstMoPayment = $EstMoPayment;
        // $data->save();

    // }catch (Exception $e){
    //       dd('error');  
    // }

    //     $details = array(
    //         'agentName' => $agentDetails,
    //         // 'agencyName' => $agencyName,
    //         // 'phoneNumber' => $phoneNumber,
    //         'dataQuality' => $dataQuality,
    //         // 'listingSource' => $listingSource,
    //         'listingNumber' => $listingNumber,
    //         'status' => $status,
    //         'propertyType' => $propertyType,
    //         'yearBuilt' => $yearBuilt,
    //         'community' => $community,
    //         'lotSize' => $lotSize,
    //         'mlsNumber' => $mlsNumber,
    //         // 'listPrice' => $listPrice,
    //         // 'EstMoPayment' => $EstMoPayment,
    //         'images' => $photos,
    //         // 'parkingInfo' => $parkingInfo,
    //         // 'bedroomCount' => $bedroomCount,
    //         // 'bathroomCount' => $bathroomCount,
    //         // 'heatingType' => $heatingType,
    //         // 'coolingType' => $coolingType,
    //         // 'flooringType' => $flooringType,
            
    // );

    // // Convert the array to a JSON string
    // $jsonString = json_encode($details, JSON_PRETTY_PRINT);
    // // Save the JSON string to a file in the storage directory
    // $filename = 'json/plot_details.json';
    // $issave = Storage::disk('public')->put($filename, $jsonString);

    // // Confirm that the file has been saved
    // if($issave){
    // echo "Data saved to file: $filename\n";

    // }

    // dd($details);


    
    // dd($data);


   
    // return view('scrapper', compact('details'));

    // print_r($jsonString);










        // You can then do whatever you want with these variables, for example:
        // echo "Status: " . $status . "\n";
        // echo "Property Type: " . $propertyType . "\n";
        // echo "Year Built: " . $yearBuilt . "\n";
        // echo "Community: " . $community . "\n";
        // echo "Lot Size: " . $lotSize . "\n";
        // echo "MLS#: " . $mlsNumber . "\n";
        // print_r($photos);



        

        // // Get home sale info
        // $saleInfo = [];
        // $crawler->filter('.info-block')->each(function ($node) use (&$saleInfo) {
        //     $label = $node->filter('.label')->text();
        //     $value = $node->filter('.value')->text();
        //     $saleInfo[$label] = $value;
        // });
        // dd($saleInfo);


        // // Get photos
        // $photos = [];
        // $crawler->filter('.photo-tile')->each(function ($node) use (&$photos) {
        //     $src = $node->filter('.photoItem')->attr('src');
        //     $photos[] = $src;
        // });
    }
    }

    public function export() 
    {
        return Excel::download(new InvoicesExport, 'Redfin.csv', \Maatwebsite\Excel\Excel::CSV);
    }
}