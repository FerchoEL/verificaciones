  <?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([], function (){
    Route::get('', [\App\Http\Controllers\Menu\HomeController::class, 'index'])->name('home');
    Route::apiResource('users',\App\Http\Controllers\UserController::class);
    Route::post('/login',[\App\Http\Controllers\AuthController::class,'login']);
    Route::apiResource('locations',\App\Http\Controllers\LocationController::class);
    Route::apiResource('chains',\App\Http\Controllers\ChainController::class);
    Route::apiResource('hauliers',\App\Http\Controllers\HaulierController::class);
    Route::apiResource('entities',\App\Http\Controllers\EntityController::class);
    Route::apiResource('verifications',\App\Http\Controllers\VerificationController::class);
    Route::apiResource('units',\App\Http\Controllers\UnitController::class);
    Route::apiResource('vehicles',\App\Http\Controllers\VehicleController::class);
    Route::apiResource('types',\App\Http\Controllers\TypeController::class);
    Route::apiResource('components',\App\Http\Controllers\ComponentController::class);
    Route::apiResource('fields',\App\Http\Controllers\FieldController::class);
    Route::apiResource('mailing_lists',\App\Http\Controllers\MailingListController::class);
    Route::apiResource('update_units',\App\Http\Controllers\UpdateUnitController::class);
    Route::apiResource('detail_values',\App\Http\Controllers\DetailValueController::class);
    Route::apiResource('catalog_special_features',\App\Http\Controllers\CatalogSpecialFeatureController::class);
    Route::apiResource('axis_catalogs',\App\Http\Controllers\AxisCatalogController::class);
    Route::apiResource('car_brands',\App\Http\Controllers\CarBrandController::class);
    Route::apiResource('supporting_features',\App\Http\Controllers\SupportingFeatureController::class);
    Route::apiResource('expired_verifications',\App\Http\Controllers\ExpiredVerificationController::class);
});
