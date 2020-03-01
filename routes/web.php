<?php

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

Route::group(['namespace' => 'Admin', 'middleware' => 'web', 'prefix' => 'admin'], function(){
Route::get('/admin', 'MainController@index');
Route::get('/country', 'MainController@Country');
Route::post('/addcountry', 'MainController@AddCountry');
Route::post('/updatecountry', 'MainController@UpdateCountry');

Route::get('/universities', 'MainController@Universities');
Route::post('/adduni', 'MainController@AddUni');
Route::post('/updateuni', 'MainController@UpdateUni');

Route::get('/programs', 'MainController@Programs');
Route::post('/addpro', 'MainController@AddPro');
Route::post('/updatpro', 'MainController@UpdatePro');

Route::get('details/{uni}', 'MainController@UniDetails');
Route::post('/addunidetail', 'MainController@UpdateUniDetail');
Route::get('/programdetail/{id}', 'MainController@UpdateProDetail');
Route::post('/updateprod','MainController@PostProDetail');
Route::get('/countrydetail/{id}','MainController@CountryDetail');
Route::post('/addcountrydetail', 'MainController@UpdateCountryDetail');
Route::get('/subcats', 'MainController@Subcats');

Route::get('/partners', 'MainController@Partners');
Route::post('/addpartner', 'MainController@AddPartner');
Route::post('/updatepartner', 'MainController@UpdatePartner');
Route::get('delpartner/{id}', 'MainController@DelPartner');
Route::get('deactivate-uni/{id}', 'MainController@DeactivateUni');
Route::get('activate-uni/{id}', 'MainController@ActivateUni');
Route::get('deactivate-pro/{id}', 'MainController@DeactivatePro');
Route::get('activate-pro/{id}', 'MainController@ActivatePro');
Route::get('sections/', 'MainController@Sections');
Route::post('addsection/', 'MainController@AddSection');
Route::post('addsubsection/', 'MainController@AddSubSection');
Route::post('updatesection/', 'MainController@UpdateSection');
Route::post('updatesubsection/', 'MainController@UpdateSubSection');
Route::get('subsections/{id}', 'MainController@SubSections');
Route::get('sectiondetail/{id}', 'MainController@SectionDetail');
Route::post('/updatesecdetail', 'MainController@UpdateSectionDetail');
Route::get('/franchises', 'MainController@Franchises');
Route::post('/addfranchise', 'MainController@AddFranchise');
Route::post('/updatefranchise', 'MainController@UpdateFranchise');
Route::get('delfranchise/{id}', 'MainController@DelFranchise');
Route::get('deactivatecountry/{id}', 'MainController@Delcountry');
Route::get('activatecountry/{id}', 'MainController@ACcountry');
Route::get('sectiondeactivate/{id}', 'MainController@SectionDeactivate');
Route::get('sectionactivate/{id}', 'MainController@SectionActivate');
Route::get('subsectiondeactivate/{id}', 'MainController@SubSectionDeactivate');
Route::get('subsectionactivate/{id}', 'MainController@SubSectionActivate');
Route::get('about', 'MainController@AboutPage');

Route::post('addaboutdetail', 'MainController@AddAboutPage');
Route::get('manageteam', 'MainController@ManageTeam');
Route::post('addteam', 'MainController@AddTeam');
Route::post('deleteteam','MainController@DeleteTeam');

// ajax routes

Route::post('/getcat', 'AjaxController@GetCat');
Route::post('/addsubcat', 'MainController@AddSubCat');
Route::post('/findsubcat', 'MainController@FindSubCat');
Route::post('/updatscat', 'MainController@UpdateSubCat');
Route::post('/deletescat', 'MainController@DeleteSubCat');
Route::post('/getsubcats', 'MainController@ShowSubCat');
});

Route::get('/', 'HomeController@index');
Route::get('/about', 'HomeController@About');
Route::get('/contact', 'HomeController@Contact');
Route::get('/countries', 'HomeController@Countries');
Route::get('/search/', 'HomeController@Search');
Route::get('/university/{slug}', 'HomeController@UniPage');
Route::get('/program/{university}/{program}', 'HomeController@ProgramPage');
Route::get('/countries-uni/{university}', 'HomeController@CountryUni');
Route::post('/submitcontact', 'HomeController@SubmitContact');
Route::get('/partners', 'HomeController@Partners');
Route::get('/franchises', 'HomeController@Franchises');
Route::get('/services/{id}/countries', 'HomeController@ServiceCountries');
Route::get('/services/{id}/countries/{cid}', 'HomeController@ServicePage');
Route::post('/submitenq', 'HomeController@SubmitEnq');
Route::get('/all-universities', 'HomeController@AllUnis');
Route::get('/become-agent', 'HomeController@BecomeAgent');
Route::post('/becomeagent', 'HomeController@BecomeAgentPost');
																																																																					
