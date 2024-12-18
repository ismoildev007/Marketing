 <?php
// admin controller
use App\Http\Controllers\admin\auth\LoginController as AdminController;
use App\Http\Controllers\admin\PageController as AdminPageController;
use App\Http\Controllers\admin\ProviderController as AdminProviderController;
use App\Http\Controllers\admin\MarketerController as AdminMarketerController;
use App\Http\Controllers\admin\ClientController as AdminClientController;
use App\Http\Controllers\admin\LanguageController as AdminLanguageController;
use App\Http\Controllers\admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\admin\ServiceController as AdminServiceController;
use App\Http\Controllers\admin\SkillController as AdminSkillController;
use App\Http\Controllers\admin\SectorController as AdminSectorController;

// provider controller
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\provider\auth\AuthController as ProviderAuthController;
use App\Http\Controllers\provider\PageController as ProviderPageController;
use App\Http\Controllers\provider\auth\RegistrationController as ProviderRegistrationController;
use App\Http\Controllers\provider\ReviewController;
use App\Http\Controllers\provider\TeamController as ProviderTeamController;
use App\Http\Controllers\provider\PortfoliosController as ProviderPortfoliosController;
use App\Http\Controllers\provider\ReviewController as ProviderReviewController;
use App\Http\Controllers\provider\AwardsController as ProviderAwardsController;
use App\Http\Controllers\provider\ServiceController as ProviderServiceController;
use App\Http\Controllers\provider\ContactController as ProviderContactController;
use App\Http\Controllers\provider\ManagerController as ProviderManagerController;

use Illuminate\Support\Facades\Route;


//client controller
use App\Http\Controllers\client\auth\LoginController as ClientLoginController;
use App\Http\Controllers\client\PageController as ClientPageController;

//frontend controller
use App\Http\Controllers\frontend\auth\ManageController;
use App\Http\Controllers\frontend\PageController;

//marketer controller
use App\Http\Controllers\marketer\auth\LoginController as MarketerLoginController;



Route::get('/', [PageController::class, 'home'])->name('home');

//admin routes start
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin_login');
Route::post('/authenticate', [AdminController::class, 'authenticate'])->name('admin_authenticate');
Route::post('/logout', [AdminController::class, 'logout'])->name('admin_logout');
Route::get('/change/password', [AdminController::class, 'changePassword']);
Route::post('/change/password', [AdminController::class, 'changePasswordCheck']);
 Route::middleware(['checkAdmin:admin', 'auth'])->group(function () {
     Route::prefix('admin')->group(function () {
         Route::get('dashboard', [AdminPageController::class, 'index'])->name('admin.dashboard');
         Route::resource('providers', AdminProviderController::class);
         Route::resource('marketers', AdminMarketerController::class);
         Route::resource('clients', AdminClientController::class);
         Route::resource('languages', AdminLanguageController::class);
         Route::resource('categories', AdminCategoryController::class);
         Route::resource('services', AdminServiceController::class);
         Route::resource('skills', AdminSkillController::class);
         Route::resource('sectors', AdminSectorController::class);
     });
 });
 //admin routes end

Route::get('/providers/{provider_id}/{category_id}', [PageController::class, 'serviceProvider'])->name('services-providers');

Route::get('/providers', [PageController::class, 'pageProvider'])->name('providers');
Route::get('/rating', [PageController::class, 'rating'])->name('rating');
Route::get('/marketers', [PageController::class, 'pageMarketers'])->name('marketers');
Route::get('/partners', [PageController::class, 'pagePartners'])->name('partners');

Route::get('/search-providers', [PageController::class, 'searchProviders'])->name('searchProviders');
Route::get('/search-marketers', [PageController::class, 'searchMarketers'])->name('searchMarketers');
Route::get('/search-partners', [PageController::class, 'searchPartners'])->name('searchPartners');

Route::get('/single-providers/{id}', [PageController::class, 'singleProviders'])->name('singleProviders');
Route::get('/single-marketers/{id}', [PageController::class, 'singleMarketers'])->name('singleMarketers');
Route::get('/single-partners', [PageController::class, 'singlePartners'])->name('singlePartners');
Route::get('/contacts', [PageController::class, 'contact'])->name('contacts');
Route::get('/single-reviews/{id}', [PageController::class, 'singleReviews'])->name('singleReviews');
Route::get('/search', [PageController::class, 'search'])->name('search');

// Loyiha ohirida olib tashlanadi, single-kerak emas.

// Auth (Autentifikatsiya) yo'nalishlari
Route::prefix('auth')->namespace('App\Http\Controllers\Auth')->group(function () {
    Route::get('/login', [ManageController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [ManageController::class, 'login'])->name('login');

});


Route::prefix('provider')->group(function () {
    Route::get('/register/company', [ProviderRegistrationController::class, 'showCompanyNameForm'])->name('providerRegisterStep1');
    Route::post('/register/company', [ProviderRegistrationController::class, 'handleCompanyName'])->name('providerRegisterStep1store');
    Route::get('/register/details', [ProviderRegistrationController::class, 'showCompanyDetailsForm'])->name('providerRegisterStep2');
    Route::post('/register/details', [ProviderRegistrationController::class, 'handleCompanyDetails'])->name('providerRegisterStep2store');
    Route::get('/register/manager', [ProviderRegistrationController::class, 'showManagerForm'])->name('providerRegisterStep3');
    Route::post('/register/manager', [ProviderRegistrationController::class, 'storeProviderWithCompany'])->name('providerRegisterStepstore');

    Route::get('/login', [ProviderAuthController::class, 'showProviderLoginForm'])->name('login.provider');
    Route::post('/login', [ProviderAuthController::class, 'providerLogin'])->name('provider.login');
    Route::post('/logout', [ProviderAuthController::class, 'logout'])->name('logout');


    Route::middleware(['checkProvider:provider', 'auth'])->group(function () {
        Route::get('/dashboard', [ProviderPageController::class, 'dashboard'])->name('provider.dashboard');
        Route::get('profile', [ProviderPageController::class, 'profile'])->name('providers.profile');
        Route::resource('service', ProviderServiceController::class);
        Route::resource('reviews', ProviderReviewController::class);
        Route::resource('provider', ProviderPageController::class);
        Route::resource('contacts', ProviderContactController::class);
        Route::resource('awards', ProviderAwardsController::class);
        Route::resource('portfolios', ProviderPortfoliosController::class);
        Route::resource('teams', ProviderTeamController::class);
        Route::resource('managers', ProviderManagerController::class);

    });
});


//  *****************************************************************************/
Route::prefix('marketer')->namespace('App\Http\Controllers')->group(function () {
    Route::get('/login', [MarketerLoginController::class, 'showMarketerLoginForm'])->name('login.marketer');
    Route::post('/login', [MarketerLoginController::class, 'marketerLogin'])->name('marketer.login');

    // Marketer uchun boshqa yo'nalishlar (agar mavjud bo'lsa, qo'shing)
});

/*****************************************************************************
 * Display Partner routes
 * @author Doniyor Rajapov
 *****************************************************************************/
Route::prefix('partner')->namespace('App\Http\Controllers')->group(function () {
    // Client login
    Route::get('/login', [ClientLoginController::class, 'showClientLoginForm'])->name('login.client');
    Route::post('/login', [ClientLoginController::class, 'clientLogin'])->name('client.login');

    // Client register
    Route::get('/register', [ClientLoginController::class, 'showRegistrationForm'])->name('register.client');
    Route::post('/register', [ClientLoginController::class, 'register'])->name('client.register');

    Route::middleware(['checkClient:client', 'auth'])->group(function () {
        Route::get('/dashboard', [ClientPageController::class, 'dashboard'])->name('client.dashboard');
        Route::get('/profile', [ClientPageController::class, 'profile'])->name('client.profile');
        Route::put('/profile/update', [ClientPageController::class, 'updateProfile'])->name('client.profile.update');
        Route::resource('lots', \App\Http\Controllers\client\ServiceController::class);
    });
});







Route::get('/reviews/confirm/{id}', [ProviderReviewController::class, 'confirm'])->name('reviews.confirm');

Route::get('/filter-providers', [PageController::class, 'filter'])->name('filter.providers');

Route::get('locale/{lang}', [LanguageController::class, 'changeLanguage']);
