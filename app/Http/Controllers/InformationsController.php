<?php

namespace App\Http\Controllers;

use App\Service\ServiceRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class InformationsController extends Controller
{
    public function audittrail(){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/audittrail/ajax';
        $response = $service->get($url);

        $urlDiv=env('API_URL').'/api/jns/divisions/all';
        $divisions = $service->get($urlDiv);

        $urlGroup=env('API_URL').'/api/jns/group';
        $groups = $service->get($urlGroup);

        $urlClient=env('API_URL').'/api/jns/clients/all';
        $clients = $service->get($urlClient);
        return view('information.audittrail',compact('response','divisions','groups','clients'));
    }
    public function audittrailData(Request $request){
        
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/audittrail/index-ajax';
        $response = $service->get($url,$request);
        return DataTables::of($response)
                ->addIndexColumn()
                ->make(true);
    }
    public function invalidwording(){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/invalidwording';
        $response = $service->get($url);
        //dd($response);
        return view('information.invalidwording',compact('response'));
    }
    public function invalidwordingData(Request $request){
        
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/invalidwording/index-ajax';
        $response = $service->get($url,$request);
        return DataTables::of($response)
                ->addIndexColumn()
                ->make(true);
    }
    public function blacklist(){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/blacklist';
        $response = $service->get($url);

        $urlClient=env('API_URL').'/api/jns/clients/all';
        $clients = $service->get($urlClient);
        //dd($response);
        return view('information.blacklist',compact('response','clients'));
    }
    public function blacklistData(Request $request){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/blacklist/index-ajax';
        $response = $service->get($url,$request);
        return DataTables::of($response)
                ->addIndexColumn()
                ->make(true);
    }
    public function drlist(){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/deliveryreport';
        $response = $service->get($url);

        $urlDiv=env('API_URL').'/api/jns/divisions/all';
        $divisions = $service->get($urlDiv);

        $urlGroup=env('API_URL').'/api/jns/group';
        $groups = $service->get($urlGroup);

        $urlClient=env('API_URL').'/api/jns/clients/all';
        $clients = $service->get($urlClient);

        $urlCat=env('API_URL').'/api/jns/drcategory';
        $categories = $service->get($urlCat);
        //dd($response);
        return view('information.drlist',compact('response','clients','groups','divisions','categories'));
    }

    public function drlistData(Request $request){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/deliveryreport/index-ajax';
        $response = $service->get($url,$request);
        return DataTables::of($response)
                ->addIndexColumn()
                ->make(true);
    }

    public function masking(){
        $service = new ServiceRequest();
        $urlClient=env('API_URL').'/api/jns/clients/all';
        $clients = $service->get($urlClient);

        $url=env('API_URL').'/api/jns/masking';
        $response = $service->get($url);
        //dd($response);
        return view('information.masking',compact('response','clients'));
    }
    public function maskingData(Request $request){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/masking/index-ajax';
        $response = $service->get($url,$request);
        return DataTables::of($response)
                ->addIndexColumn()
                ->make(true);
    }


    public function prefix(){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/providers';
        $providers = $service->get($url);

        $url=env('API_URL').'/api/jns/prefix';
        $response = $service->get($url);
        //dd($response);
        return view('information.prefix',compact('response','providers'));
    }

    public function prefixData(Request $request){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/prefix/index-ajax';
        $response = $service->get($url,$request);
        return DataTables::of($response)
                ->addIndexColumn()
                ->make(true);
    }

    public function privilege(){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/privilegetype';
        $type = $service->get($url);
        //dd($response);
        return view('information.privilege',compact('type'));
    }

    public function privilegeData(Request $request){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/privilege/index-ajax';
        $response = $service->get($url,$request);
       // return $response;
        return DataTables::of($response)
                ->addIndexColumn()
                ->make(true);
    }
    public function tokenbalance(){

        $service = new ServiceRequest();
        $urlDiv=env('API_URL').'/api/jns/divisions/all';
        $divisions = $service->get($urlDiv);

        $urlGroup=env('API_URL').'/api/jns/group';
        $groups = $service->get($urlGroup);

        $urlClient=env('API_URL').'/api/jns/clients/all';
        $clients = $service->get($urlClient);

        //dd($response);
        return view('information.tokenbalance',compact('divisions','clients'));
    }
    public function tokenbalanceData(Request $request){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/tokenbalance/index-ajax';
        $response = $service->get($url,$request);
        //dd($response);
        return DataTables::of($response)
                ->addIndexColumn()
                ->make(true);
    }
    public function tokenmap(){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/tokenmap';
        $response = $service->get($url);

        $urlDiv=env('API_URL').'/api/jns/divisions/all';
        $divisions = $service->get($urlDiv);

        $urlGroup=env('API_URL').'/api/jns/group';
        $groups = $service->get($urlGroup);

        $urlClient=env('API_URL').'/api/jns/clients/all';
        $clients = $service->get($urlClient);
        //dd($response);
        return view('information.tokenmap',compact('response','clients','divisions'));
    }
    public function tokenmapData(Request $request){
       
        $page = ($request->start/10)+1;
        $param=[
            'page'=>$page,
            'client_id'=>$request->client_id,
            'division_id'=>$request->division_id,
            'account_no'=>$request->account_no,
            'charge_code'=>$request->charge_code
        ] ;           
        
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/tokenmap/index-ajax';
        $response = $service->get($url,$param);

        //return $response;

        $return = [
            "draw"=>$request->draw,
            "recordsTotal"=>$response["total"],
            "recordsFiltered"=>$response['total'],
            "data"=>$response["data"],
            "page"=>$page
        ];
        
        return json_encode($return);
        // return DataTables::of($response['data'])
        //         ->addIndexColumn()
        //         ->setTotalRecords($response['total'])
        //         ->setFilteredRecords($response['total'])
        //         ->make(true);
    }
    public function watemplate(){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/watemplate';
        $response = $service->get($url);
        //dd($response);
        return view('information.watemplate',compact('response'));
    }
    public function watemplateData(Request $request){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/watemplate/index-ajax';
        $response = $service->get($url,$request);
        //dd($response);
        return DataTables::of($response)
                ->addIndexColumn()
                ->make(true);
    }
    public function client(){
        $service = new ServiceRequest();
        $urlDiv=env('API_URL').'/api/jns/divisions/all';
        $divisions = $service->get($urlDiv);
        //dd($response);
        return view('information.client',compact('divisions'));
    }
    public function clientData(Request $request){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/client';
        $response = $service->get($url,$request);
        return DataTables::of($response)
                ->addIndexColumn()
                ->make(true);
    }
}
