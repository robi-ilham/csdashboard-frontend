<?php

use App\Http\Controllers\AlertController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CproAuditTrailController;
use App\Http\Controllers\CproClient;
use App\Http\Controllers\CproDivisionController;
use App\Http\Controllers\CproSenderController;
use App\Http\Controllers\CproUserController;
use App\Http\Controllers\CstoolsInformationController;
use App\Http\Controllers\InformationsController;
use App\Http\Controllers\JnsClientController;
use App\Http\Controllers\JnsDivisionController;
use App\Http\Controllers\JnsM2mHttpController;
use App\Http\Controllers\JnsM2mSmppController;
use App\Http\Controllers\JnsUserController;
use App\Http\Controllers\ReportCproController;
use App\Http\Controllers\SmsPushReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCproController;
use App\Http\Controllers\WaiUserController;
use App\Http\Controllers\WaPushReportController;
use App\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//Auth::routes();

//Route::middleware('authentication')->get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::name('auth.')->prefix('auth')->group(function(){
    Route::get('', [AuthController::class, 'index'])->name('index');
    Route::post('', [AuthController::class, 'authenticate'])->name('login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});

Route::middleware('authentication')->group(function(){
    Route::get('/', [AlertController::class, 'index'])->name('home');
    Route::get('/users/all', [UserController::class, 'allUserApp'])->name('users.all');
    Route::get('/users/reset-form/{id}',[UserController::class,'resetForm'])->name('users.resetform');
    Route::post('/users/reset-password',[UserController::class,'resetPassword'])->name('users.resetpassword');

    Route::get('/users/list',[UserController::class,'list'])->name('users.list');
    Route::post('/users/update/{id}',[UserController::class,'update'])->name('user.update');
    Route::post('/users/delete/{user}',[UserController::class,'destroy'])->name('users.delete');
    Route::resource('users', UserController::class);

    Route::get('/alerts/list',[AlertController::class,'list'])->name('alerts.list');
    Route::resource('alerts', AlertController::class);


    Route::get('/cstools-informations/list',[CstoolsInformationController::class,'list'])->name('cstools-informations.list');
    Route::post('/cstools-informations/update/{id}',[CstoolsInformationController::class,'update'])->name('cstools-information.update');
    Route::post('/cstools-informations/delete/{id}',[CstoolsInformationController::class,'destroy'])->name('cstools-informations.delete');
    Route::resource('cstools-informations', CstoolsInformationController::class);
    
    Route::name('jns.')->prefix('jns')->group(function(){
            Route::get('/users/list',[JnsUserController::class,'list'])->name('user.list');
            Route::post('/users/reset-password',[JnsUserController::class,'resetPassword'])->name('users.reset-password');
            Route::resource('users', JnsUserController::class);
            
            Route::post('/users/update/{id}',[JnsUserController::class,'update'])->name('user.update');
            Route::post('/users/delete/{user}',[JnsUserController::class,'destroy'])->name('user.delete');

            Route::get('/divisions/list',[JnsDivisionController::class,'list'])->name('division.list');
            Route::get('/clients/list',[JnsDivisionController::class,'clientList'])->name('client.list');
            Route::get('/owner/list',[JnsDivisionController::class,'ownerList'])->name('owner.list');
            Route::resource('divisions', JnsDivisionController::class);

            Route::post('/divisions/update/{id}',[JnsDivisionController::class,'update'])->name('division.update');
            Route::post('/divisions/delete/{division}',[JnsDivisionController::class,'destroy'])->name('division.delete');

            Route::resource('clients', JnsClientController::class);
            Route::post('/clients/update/{id}',[JnsClientController::class,'update'])->name('client.update');
            Route::post('/clients/delete/{client}',[JnsClientController::class,'destroy'])->name('client.delete');

                        
    });
    Route::name('m2m.')->prefix('m2m')->group(function(){
        Route::get('/users/list',[JnsM2mHttpController::class,'list'])->name('user.list');
        Route::resource('users', JnsM2mHttpController::class);
        Route::post('/users/update/{id}',[JnsM2mHttpController::class,'update'])->name('user.update');
        Route::post('/users/delete/{user}',[JnsM2mHttpController::class,'destroy'])->name('users.delete');
    });
    Route::name('smpps.')->prefix('smpps')->group(function(){
        Route::get('/users/list',[JnsM2mSmppController::class,'list'])->name('user.list');
        Route::resource('users', JnsM2mSmppController::class);
        Route::post('/users/update/{id}',[JnsM2mSmppController::class,'update'])->name('user.update');
        Route::post('/users/delete/{user}',[JnsM2mSmppController::class,'destroy'])->name('users.delete');
    });
    Route::name('wai.')->prefix('wai')->group(function(){
        Route::get('/users/list',[WaiUserController::class,'list'])->name('user.list');
        Route::resource('users', WaiUserController::class);
        Route::post('/users/update/{id}',[WaiUserController::class,'update'])->name('user.update');
        Route::post('/users/delete/{user}',[WaiUserController::class,'destroy'])->name('users.delete');
    });
    Route::name('cpro.')->prefix('cpro')->group(function(){
        Route::resource('users', CproUserController::class);
        Route::post('/users/delete/{user}',[CproUserController::class,'destroy'])->name('users.delete');

        Route::resource('divisions', CproDivisionController::class);
        Route::post('/divisions/update/{id}',[CproDivisionController::class,'update'])->name('division.update');
            Route::post('/divisions/delete/{division}',[CproDivisionController::class,'destroy'])->name('division.delete');
            
        Route::resource('clients', CproClient::class);

        Route::get('/senders/list',[CproSenderController::class,'list'])->name('senders.list');
        Route::resource('senders', CproSenderController::class);

        Route::get('/webhooks/list',[WebhookController::class,'list'])->name('webhook.list');
        Route::resource('webhooks', WebhookController::class);

        Route::resource('audittrails', CproAuditTrailController::class);
    });
    Route::name('information.')->prefix('information')->group(function(){
        Route::get('audittrail',[InformationsController::class,'audittrail'])->name('audittrail');
        Route::get('audittrail/data',[InformationsController::class,'audittrailData'])->name('audittrail.data');

        Route::get('invalidwording',[InformationsController::class,'invalidwording'])->name('invalidwording');
        Route::get('invalidwording/data',[InformationsController::class,'invalidwordingData'])->name('invalidwording.data');

        Route::get('blacklist',[InformationsController::class,'blacklist'])->name('blacklist');
        Route::get('blacklist/data',[InformationsController::class,'blacklistData'])->name('blacklist.data');

        Route::get('drlist',[InformationsController::class,'drlist'])->name('drlist');
        Route::get('drlist/data',[InformationsController::class,'drlistData'])->name('drlist.data');

        Route::get('masking',[InformationsController::class,'masking'])->name('masking');
        Route::get('masking/data',[InformationsController::class,'maskingData'])->name('masking.data');

        Route::get('prefix',[InformationsController::class,'prefix'])->name('prefix');
        Route::get('prefix/data',[InformationsController::class,'prefixData'])->name('prefix.data');

        Route::get('privilege',[InformationsController::class,'privilege'])->name('privilege');
        Route::get('privilege/data',[InformationsController::class,'privilegeData'])->name('privilege.data');

        Route::get('tokenbalance',[InformationsController::class,'tokenbalance'])->name('tokenbalance');
        Route::get('tokenbalance/data',[InformationsController::class,'tokenbalanceData'])->name('tokenbalance.data');

        Route::get('tokenmap',[InformationsController::class,'tokenmap'])->name('tokenmap');
        Route::get('tokenmap/data',[InformationsController::class,'tokenmapData'])->name('tokenmap.data');

        Route::get('watemplate',[InformationsController::class,'watemplate'])->name('watemplate');
        Route::get('watemplate/data',[InformationsController::class,'watemplateData'])->name('watemplate.data');

        Route::get('client',[InformationsController::class,'client'])->name('client');
        Route::get('client/data',[InformationsController::class,'clientData'])->name('client.data');
    });

    Route::name('report.')->prefix('report')->group(function(){
        Route::name('cpro.')->prefix('cpro')->group(function(){
            Route::get('broadcast-list',[ReportCproController::class,'broadcastListIndex'])->name('broadcast-list');
            Route::get('broadcast-list-data',[ReportCproController::class,'broadcastList'])->name('broadcast-list-data');

            Route::get('helpdesk-list',[ReportCproController::class,'helpdeskListIndex'])->name('helpdesk-list');
            Route::get('helpdesk-list-data',[ReportCproController::class,'helpdeskList'])->name('helpdesk-list-data');

            Route::get('chatbot-list',[ReportCproController::class,'chatbotListIndex'])->name('chatbot-list');
            Route::get('chatbot-list-data',[ReportCproController::class,'chatbotList'])->name('chatbot-list-data');

            Route::get('button-list',[ReportCproController::class,'buttonListIndex'])->name('button-list');
            Route::get('button-list-data',[ReportCproController::class,'buttonList'])->name('button-list-data');

            

            Route::post('broadcast/new-request',[ReportCproController::class,'requestNewBroadcast'])->name('request.broadcast');
            Route::post('helpdesk/new-request',[ReportCproController::class,'requestNewHelpdesk'])->name('request.helpdesk');
            Route::post('chatbot/new-request',[ReportCproController::class,'requestNewChatbot'])->name('request.chatbot');
            Route::post('button/new-request',[ReportCproController::class,'requestNewButton'])->name('request.button');
        });
            Route::get('request-sms',[SmsPushReportController::class,'index'])->name('request.sms');
            Route::get('request-sms/list',[SmsPushReportController::class,'list'])->name('request.sms.list');
            Route::post('request-sms/new',[SmsPushReportController::class,'store'])->name('request.sms.new');

            Route::get('request-wa',[WaPushReportController::class,'index'])->name('request.wa');
            Route::get('request-wa/list',[WaPushReportController::class,'list'])->name('request.wa.list');
            Route::post('request-wa/new',[WaPushReportController::class,'store'])->name('request.wa.new');
    });

});