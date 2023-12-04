<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\CroppingSeasonController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\RecommendedCropCalendarController;
use App\Http\Controllers\ActivitiesFertsController;
use App\Http\Controllers\ActivitiesChemicalController;
use App\Http\Controllers\DetailsCheckerController;
use App\Http\Controllers\SeasonHarvestInfoController;
use App\Http\Controllers\SeasonOtherExpensesController;
use App\Http\Controllers\ReportBugsController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('', function () {
    return "sample";
});
Route::get('/dexter', function () {
    return "dexter";
});


//User
Route::post('login', [AuthController::class, 'login']); 
Route::post('register', [AuthController::class, 'register']); 
Route::post('updateuser', [AuthController::class, 'update']); 
Route::get('logout', [AuthController::class, 'logout']); 


//refresh token
Route::get('refreshToken', [AuthController::class, 'refreshToken']); 
//address
Route::get('region', [AddressController::class, 'region'])->middleware('jwtAuth'); // 
Route::get('province', [AddressController::class, 'province'])->middleware('jwtAuth'); // 
Route::get('municipality', [AddressController::class, 'municipality'])->middleware('jwtAuth'); // 
Route::get('brgy', [AddressController::class, 'brgy'])->middleware('jwtAuth'); // 

//details checker
Route::get('user_detailsCheck', [DetailsCheckerController::class, 'user_detailsCheck'])->middleware('jwtAuth'); // get version details of users
Route::post('farm_detailsCheck', [DetailsCheckerController::class, 'farm_detailsCheck'])->middleware('jwtAuth'); // get version details of farm
Route::post('Cropping_season_detailsCheck', [DetailsCheckerController::class, 'Cropping_season_detailsCheck'])->middleware('jwtAuth'); // get version details of farm
Route::post('Recommended_crop_calendar_detailsCheck', [DetailsCheckerController::class, 'Recommended_crop_calendar_detailsCheck'])->middleware('jwtAuth'); // get version details of farm
Route::post('Activities_detailsCheck', [DetailsCheckerController::class, 'Activities_detailsCheck'])->middleware('jwtAuth'); // get version details of farm
Route::post('Activities_fert_detailsCheck', [DetailsCheckerController::class, 'Activities_fert_detailsCheck'])->middleware('jwtAuth'); // get version details of farm
Route::post('season_harvest_info_detailsCheck', [DetailsCheckerController::class, 'season_harvest_info_detailsCheck'])->middleware('jwtAuth'); // get version details of farm
Route::post('season_other_expenses_detailsCheck', [DetailsCheckerController::class, 'season_other_expenses_detailsCheck'])->middleware('jwtAuth'); // get version details of farm

//get all data using user id checker
Route::get('cropping_season_getAll', [DetailsCheckerController::class, 'cropping_season_getAll'])->middleware('jwtAuth'); 
Route::get('recommendedCropCalendar_getAll', [DetailsCheckerController::class, 'recommendedCropCalendar_getAll'])->middleware('jwtAuth'); 
Route::get('activities_getAll', [DetailsCheckerController::class, 'activities_getAll'])->middleware('jwtAuth'); 
Route::get('activities_ferts_getAll', [DetailsCheckerController::class, 'activities_ferts_getAll'])->middleware('jwtAuth'); 
Route::get('activities_chem_getAll', [DetailsCheckerController::class, 'activities_chem_getAll'])->middleware('jwtAuth'); 
Route::get('season_harvest_info_getAll', [DetailsCheckerController::class, 'season_harvest_info_getAll'])->middleware('jwtAuth'); 
Route::get('season_other_expenses_getAll', [DetailsCheckerController::class, 'season_other_expenses_getAll'])->middleware('jwtAuth'); 


//Farm
Route::post('farm/create', [FarmController::class, 'create_farm'])->middleware('jwtAuth');  //addfarm
Route::post('farm/delete', [FarmController::class, 'delete_farm'])->middleware('jwtAuth');
Route::post('farm/update', [FarmController::class, 'update_farm'])->middleware('jwtAuth'); //updatefarm
Route::get('farm', [FarmController::class, 'farm'])->middleware('jwtAuth'); // getAllFarm

//Cropping_season
Route::get('getAllCropSeason', [CroppingSeasonController::class, 'getAllCropSeason'])->middleware('jwtAuth'); // getAllFarm
Route::post('addCropSeason', [CroppingSeasonController::class, 'addCropSeason'])->middleware('jwtAuth');  // addCropSeason
Route::post('updateCropSeason', [CroppingSeasonController::class, 'updateCropSeason'])->middleware('jwtAuth'); //updatefarm

//RecommendedCropCalendar
Route::get('cropping_season/getRecommendedCropCalendar', [RecommendedCropCalendarController::class, 'getRecommendedCropCalendar'])->middleware('jwtAuth'); // getAllRecommendedCropCalendar
Route::post('cropping_season/addRecommendedCropCalendar', [RecommendedCropCalendarController::class, 'addRecommendedCropCalendar'])->middleware('jwtAuth');  // addRecommendedCropCalendar
Route::post('cropping_season/updateRecommendedCropCalendar', [RecommendedCropCalendarController::class, 'updateRecommendedCropCalendar'])->middleware('jwtAuth'); //updateRecommendedCropCalendar


//Cropping_season ACTIVITIES
Route::get('cropping_season/getAllActivities', [ActivitiesController::class, 'getAllActivities'])->middleware('jwtAuth'); // getAllCropSeasonActivities
Route::post('cropping_season/addActivity', [ActivitiesController::class, 'addActivity'])->middleware('jwtAuth');  // addCropSeasonActivity
Route::post('cropping_season/updateActivity', [ActivitiesController::class, 'updateActivity'])->middleware('jwtAuth'); //updateCropSeasonActivity
//Route::post('cropping_season/deleteActivity', [ActivitiesController::class, 'deleteActivity'])->middleware('jwtAuth'); // deleteCropSeasonActivity


//Activities fertilizer
Route::get('cropping_season/getActivitiesFert', [ActivitiesFertsController::class, 'getActivitiesFert'])->middleware('jwtAuth'); // getAllRecommendedCropCalendar
Route::post('cropping_season/addActivitiesFert', [ActivitiesFertsController::class, 'addActivitiesFert'])->middleware('jwtAuth');  // addRecommendedCropCalendar
Route::post('cropping_season/updateActivitiesFert', [ActivitiesFertsController::class, 'updateActivitiesFert'])->middleware('jwtAuth'); //updateRecommendedCropCalendar

//Activities Chemical
Route::get('cropping_season/getActivitiesChemical', [ActivitiesChemicalController::class, 'getActivitiesChemical'])->middleware('jwtAuth'); // getActivitiesChemical
Route::post('cropping_season/addActivitiesChemical', [ActivitiesChemicalController::class, 'addActivitiesChemical'])->middleware('jwtAuth');  // addActivitiesChemical
Route::post('cropping_season/updateActivitiesChemical', [ActivitiesChemicalController::class, 'updateActivitiesChemical'])->middleware('jwtAuth'); //updateActivitiesChemical

//Season harvest info
Route::get('cropping_season/getSeasonHarvestInfo', [SeasonHarvestInfoController::class, 'getSeasonHarvestInfo'])->middleware('jwtAuth'); // getSeasonHarvestInfo
Route::post('cropping_season/addSeasonHarvestInfo', [SeasonHarvestInfoController::class, 'addSeasonHarvestInfo'])->middleware('jwtAuth');  // addSeasonHarvestInfo
Route::post('cropping_season/updateSeasonHarvestInfo', [SeasonHarvestInfoController::class, 'updateSeasonHarvestInfo'])->middleware('jwtAuth'); //updateSeasonHarvestInfo

//Season harvest info change the controller
Route::get('cropping_season/getSeasonOtherExpenses', [SeasonOtherExpensesController::class, 'getSeasonOtherExpenses'])->middleware('jwtAuth'); // getSeasonOtherExpenses
Route::post('cropping_season/addSeasonOtherExpenses', [SeasonOtherExpensesController::class, 'addSeasonOtherExpenses'])->middleware('jwtAuth');  // addSeasonOtherExpenses
Route::post('cropping_season/updateSeasonOtherExpenses', [SeasonOtherExpensesController::class, 'updateSeasonOtherExpenses'])->middleware('jwtAuth'); //updateSeasonOtherExpenses

// info change the controller
Route::post('/addReportBugs', [ReportBugsController::class, 'addReportBugs'])->middleware('jwtAuth');  // addReportBugs