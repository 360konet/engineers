<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Super\ProjectsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ArchitectController;
use App\Http\Controllers\Admin\CivilController;
use App\Http\Controllers\Admin\ElectricalController;
use App\Http\Controllers\Admin\FinanceController;
use App\Http\Controllers\Admin\OrderlyController;
use App\Http\Controllers\Admin\QuantitativeController;
use App\Http\Controllers\Admin\CompletedController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ComplainController;
use App\Http\Controllers\Admin\BackupController;
use App\Http\Controllers\Super\UsersController;
use App\Http\Controllers\Super\HelpController;
use App\Http\Controllers\Super\TechnicianController;
use App\Http\Controllers\Super\DepartmentController;
use App\Http\Controllers\Super\StoresController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Architect
Route::get('/architect', [ArchitectController::class, 'architect']);
Route::post('/forward-architect/{id}', [ArchitectController::class, 'architect_department_forward']);
Route::get('/architect-share', [ArchitectController::class, 'architect_share']);
Route::post('/share-architect-project', [ArchitectController::class, 'share_architect_project']);
Route::get('/architect-backup', [ArchitectController::class, 'architect_backup']);
Route::post('/forward-architect-share/{id}', [ArchitectController::class, 'architect_department_forward_share']);
Route::get('/architect-part1', [ArchitectController::class, 'architect_part1']);
Route::get('/architect-filtering', [ArchitectController::class, 'architect_filtering']);
Route::get('/architect-pending', [ArchitectController::class, 'architect_pending']);
Route::post('/pending-architect-project', [ArchitectController::class, 'pending_architect_project']);
Route::post('/forward-architect-pending/{id}', [ArchitectController::class, 'architect_department_forward_pending']);
Route::get('/architect-completed', [ArchitectController::class, 'architect_completed']);
Route::post('/completed-architect-project', [ArchitectController::class, 'completed_architect_project']);
Route::post('/forward-architect-completed/{id}', [ArchitectController::class, 'architect_department_forward_completed']);
Route::post('/backup-architect-project', [ArchitectController::class, 'backup_architect_project']);
Route::get('/help-architect',[ArchitectController::class,'help_architect']);
Route::post('/help-architect-submit',[ArchitectController::class,'help_architect_submit']);


//Electricals
Route::get('/electricals', [ElectricalController::class, 'electricals']);
Route::post('/forward-electricals/{id}', [ElectricalController::class, 'electricals_department_forward']);
Route::get('/electricals-share', [ElectricalController::class, 'electricals_share']);
Route::post('/share-electricals-project', [ElectricalController::class, 'share_electricals_project']);
Route::get('/electricals-backup', [ElectricalController::class, 'electricals_backup']);
Route::post('/forward-electricals-share/{id}', [ElectricalController::class, 'electricals_department_forward_share']);
Route::get('/electricals-part1', [ElectricalController::class, 'electricals_part1']);
Route::get('/electricals-filtering', [ElectricalController::class, 'electricals_filtering']);
Route::get('/electricals-pending', [ElectricalController::class, 'electricals_pending']);
Route::post('/pending-electricals-project', [ElectricalController::class, 'pending_electricals_project']);
Route::post('/forward-electricals-pending/{id}', [ElectricalController::class, 'electricals_department_forward_pending']);
Route::get('/electricals-completed', [ElectricalController::class, 'electricals_completed']);
Route::post('/completed-electricals-project', [ElectricalController::class, 'completed_electricals_project']);
Route::post('/forward-electricals-completed/{id}', [ElectricalController::class, 'electricals_department_forward_completed']);
Route::post('/backup-electricals-project', [ElectricalController::class, 'backup_electricals_project']);


//Civil Works
Route::get('/civil', [CivilController::class, 'civil']);
Route::post('/forward-civil/{id}', [CivilController::class, 'civil_department_forward']);
Route::get('/civil-share', [CivilController::class, 'civil_share']);
Route::post('/share-civil-project', [CivilController::class, 'share_civil_project']);
Route::get('/civil-backup', [CivilController::class, 'civil_backup']);
Route::post('/forward-civil-share/{id}', [CivilController::class, 'civil_department_forward_share']);
Route::get('/civil-part1', [CivilController::class, 'civil_part1']);
Route::get('/civil-filtering', [CivilController::class, 'civil_filtering']);
Route::get('/civil-pending', [CivilController::class, 'civil_pending']);
Route::post('/pending-civil-project', [CivilController::class, 'pending_civil_project']);
Route::post('/forward-civil-pending/{id}', [CivilController::class, 'civil_department_forward_pending']);
Route::get('/civil-completed', [CivilController::class, 'civil_completed']);
Route::post('/completed-civil-project', [CivilController::class, 'completed_civil_project']);
Route::post('/forward-civil-completed/{id}', [CivilController::class, 'civil_department_forward_completed']);
Route::post('/backup-civil-project', [CivilController::class, 'backup_civil_project']);


//Quantitative Surveyors
Route::get('/quantity', [QuantitativeController::class, 'quantity']);
Route::post('/forward-quantity/{id}', [QuantitativeController::class, 'quantity_department_forward']);
Route::get('/quantity-share', [QuantitativeController::class, 'quantity_share']);
Route::post('/share-quantity-project', [QuantitativeController::class, 'share_quantity_project']);
Route::get('/quantity-backup', [QuantitativeController::class, 'quantity_backup']);
Route::post('/forward-quantity-share/{id}', [QuantitativeController::class, 'quantity_department_forward_share']);
Route::get('/quantity-part1', [QuantitativeController::class, 'quantity_part1']);
Route::get('/quantity-filtering', [QuantitativeController::class, 'quantity_filtering']);
Route::get('/quantity-pending', [QuantitativeController::class, 'quantity_pending']);
Route::post('/pending-quantity-project', [QuantitativeController::class, 'pending_quantity_project']);
Route::post('/forward-quantity-pending/{id}', [QuantitativeController::class, 'quantity_department_forward_pending']);
Route::get('/quantity-completed', [QuantitativeController::class, 'quantity_completed']);
Route::post('/completed-quantity-project', [QuantitativeController::class, 'completed_quantity_project']);
Route::post('/forward-quantity-completed/{id}', [QuantitativeController::class, 'quantity_department_forward_completed']);
Route::post('/backup-quantity-project', [QuantitativeController::class, 'backup_quantity_project']);


//Orderly Room
Route::get('/orderly', [OrderlyController::class, 'orderly']);
Route::post('/forward-orderly/{id}', [OrderlyController::class, 'orderly_department_forward']);
Route::get('/orderly-share', [OrderlyController::class, 'orderly_share']);
Route::post('/share-orderly-project', [OrderlyController::class, 'share_orderly_project']);
Route::get('/orderly-backup', [OrderlyController::class, 'orderly_backup']);
Route::post('/forward-orderly-share/{id}', [OrderlyController::class, 'orderly_department_forward_share']);
Route::get('/orderly-part1', [OrderlyController::class, 'orderly_part1']);
Route::get('/orderly-filtering', [OrderlyController::class, 'orderly_filtering']);
Route::get('/orderly-pending', [OrderlyController::class, 'orderly_pending']);
Route::post('/pending-orderly-project', [OrderlyController::class, 'pending_orderly_project']);
Route::post('/forward-orderly-pending/{id}', [OrderlyController::class, 'orderly_department_forward_pending']);
Route::get('/orderly-completed', [OrderlyController::class, 'orderly_completed']);
Route::post('/completed-orderly-project', [OrderlyController::class, 'completed_orderly_project']);
Route::post('/forward-orderly-completed/{id}', [OrderlyController::class, 'orderly_department_forward_completed']);
Route::post('/backup-orderly-project', [OrderlyController::class, 'backup_orderly_project']);
Route::post('/orderly-part1-submit',[OrderlyController::class,'orderly_part1_submit']);

//Finance
Route::get('/finances', [FinanceController::class, 'finances']);
Route::post('/forward-finances/{id}', [FinanceController::class, 'finances_department_forward']);
Route::get('/finances-share', [FinanceController::class, 'finances_share']);
Route::post('/share-finances-project', [FinanceController::class, 'share_finances_project']);
Route::get('/finances-backup', [FinanceController::class, 'finances_backup']);
Route::post('/forward-finances-share/{id}', [FinanceController::class, 'finances_department_forward_share']);
Route::get('/finances-part1', [FinanceController::class, 'finances_part1']);
Route::get('/finances-filtering', [FinanceController::class, 'finances_filtering']);
Route::get('/finances-pending', [FinanceController::class, 'finances_pending']);
Route::post('/pending-finances-project', [FinanceController::class, 'pending_finances_project']);
Route::post('/forward-finances-pending/{id}', [FinanceController::class, 'finances_department_forward_pending']);
Route::get('/finances-completed', [FinanceController::class, 'finances_completed']);
Route::post('/completed-finances-project', [FinanceController::class, 'completed_finances_project']);
Route::post('/forward-finances-completed/{id}', [FinanceController::class, 'finances_department_forward_completed']);
Route::post('/backup-finances-project', [FinanceController::class, 'backup_finances_project']);

//Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/change-department/{id}', [HomeController::class, 'change_department']);


//Projects
Route::get('/new-project', [ProjectsController::class, 'new_project']);
Route::post('/add-project', [ProjectsController::class, 'add_project']);
Route::get('/download-project/{filename}', [ProjectsController::class, 'view_file'])->name('download.project');
Route::post('/pending-forward/{id}', [ProjectsController::class, 'pending_forward']);


// Architect Works
Route::get('/architect-works', [ArchitectController::class, 'architect_works']);
Route::post('/architect-forward/{id}', [ArchitectController::class, 'architect_forward']);



//Electrical Works
Route::get('/electrical-works', [ElectricalController::class, 'electrical_works']);
Route::post('/electricals-forward/{id}', [ElectricalController::class, 'electricals_forward']);



// Civil Works
Route::get('/civil-works', [CivilController::class, 'civil_works']);
Route::post('/civil-forward/{id}', [CivilController::class, 'civil_forward']);



//Quantitative Surveyors Works
Route::get('/quantitative-surveyors-works', [QuantitativeController::class, 'quantitative_surveyors_works']);
Route::post('/quantitative-forward/{id}', [QuantitativeController::class, 'quantitative_forward']);



//Orderly Room Operations
Route::get('/orderly-room-operations', [OrderlyController::class, 'orderly_room_operations']);
Route::post('/orderly-forward/{id}', [OrderlyController::class, 'orderly_forward']);


//Finance
Route::get('/finance', [FinanceController::class, 'finance']);
Route::post('/finance-forward/{id}', [FinanceController::class, 'finance_forward']);

//Completed
Route::get('/completed-works', [CompletedController::class, 'completed_works']);
Route::post('/completed-forward/{id}', [CompletedController::class, 'completed_forward']);

//Report
Route::get('/generate-reports', [ReportController::class, 'generate_reports']);
Route::post('/filter-projects', [ReportController::class,'filter_projects'])->name('filter');

//Complains
Route::get('/complains', [ComplainController::class, 'complains']);

//Backup
Route::get('/backups', [BackupController::class, 'backups']);

//Users
Route::get('/users', [UsersController::class, 'users']);
Route::get('/add-account', [UsersController::class, 'add_account']);
Route::post('/add-new-account', [UsersController::class, 'add_new_account']);
Route::post('/send-sms', [UsersController::class, 'send'])->name('send.sms');
Route::put('/users/{id}', [UsersController::class, 'update'])->name('users.update');
Route::get('/delete-users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
Route::post('/send-bulk-sms', [UsersController::class, 'sendBulkSMS'])->name('send.bulk.sms');



//HelpDesk
Route::get('/help-desk', [HelpController::class, 'index']);

//Report
Route::get('/report', [HelpController::class, 'report']);
Route::post('/generate-report', [HelpController::class, 'generateReport']);

//complains
Route::get('/newcomplains', [HelpController::class, 'newcomplains']);
Route::get('/addcomplain', [HelpController::class, 'addcomplain']);
Route::post('/addnewcomplain', [HelpController::class, 'addnewcomplain']);
Route::get('/edit-status-{id}', [HelpController::class, 'editstatus']);
Route::put('/editcomplain-{id}', [HelpController::class, 'editcomplain']);

Route::get('delete-complain-{id}', [HelpControllerr::class, 'deletecomplain']);

Route::get('/processingcomplains', [HelpController::class, 'processingcomplains']);
Route::get('/fixedcomplains', [HelpController::class, 'fixedcomplains']);
Route::get('/unfixablecomplains', [HelpController::class, 'unfixablecomplains']);

//Technicians
Route::get('/technicians', [TechnicianController::class, 'technicians']);
Route::get('/addtechnician', [TechnicianController::class, 'addtechnician']);
Route::post('/addnewtechnician', [TechnicianController::class, 'addnewtechnician']);
Route::get('/delete-technician-{id}', [TechnicianController::class, 'deletetechnician']);

//Departments
Route::get('/departments', [DepartmentController::class, 'departments']);
Route::get('/adddepartment', [DepartmentController::class, 'adddepartment']);
Route::post('/addnewdepartment', [DepartmentController::class, 'addnewdepartment']);
Route::get('/delete-department/{id}', [DepartmentController::class, 'deletedepartment']);

//Stores
Route::get('/stores-dashboard', [StoresController::class, 'stores_dashboard']);
Route::get('/stores-in-stock', [StoresController::class, 'stores_in_stock']);
Route::post('/stocks/store', [StoresController::class, 'store'])->name('stocks.store');
Route::get('/stocks/data', [StoresController::class, 'getStocks'])->name('stocks.data');
Route::get('stores-out-stock', [StoresController::class, 'stores_out_stock']);


});
