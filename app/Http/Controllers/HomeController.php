<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\University;
use App\Country;
use App\Program;
use App\ProgramDetail;
use Validator;
use Mail;
use App\Countrydetail;
use App\Partner;
use App\Section;
use App\Franchise;
use App\Subsection;
use App\ProgramType;
use App\StaticPage;
use App\Team;


class HomeController extends Controller
{
    public function allcots()
    {
       return $cots = Country::where('delstatus', 1)->orderBy('name')->get();    
    }
    
    public function cats()
    {
        return $cats = Category::where(['delstatus' => 1, 'display' => 0])->orderBy('name')->get();

    }
    
    public function allcats()
    {
        return $cats = Category::where(['delstatus' => 1])->orderBy('name')->get();

    }
    
    public function services()
    {
        return Section::where('delstatus',1)->orderBy('id','desc')->get();
    }
    
    public function allcountries()
    {
        return Country::where('delstatus',1)->orderBy('name')->limit(12)->get();
    }


    public function index()
    {
    	$unis = University::where('delstatus', 1)->take(6)->get();
    	$cots = Country::where('delstatus', 1)->take(3)->get();
    	return view('mainpages.home', ['cats' => $this->cats(), 'unis' => $unis, 'cots' => $cots, 'services' => $this->services(), 'countries' => $this->allcountries(), 'allcots' => $this->allcots()]);
    }

    public function About()
    {
        $teams = Team::get();
        return view('mainpages.about', ['cats' => $this->cats(), 'services' => $this->services(), 'countries' => $this->allcountries(), 'teams' => $teams, 'allcots' => $this->allcots()]);
    }
    public function Contact()
    {
        return view('mainpages.contact', ['cats' => $this->cats(), 'services' => $this->services(), 'countries' => $this->allcountries(), 'allcots' => $this->allcots()]);
    }

    public function Countries()
    {
        $cots = Country::where('delstatus', 1)->get();
        return view('mainpages.countries', ['cots' => $cots, 'cats' => $this->cats(), 'services' => $this->services(), 'countries' => $this->allcountries(), 'allcots' => $this->allcots()]);
    }

    public function Search()
    {
    	$unis = University::where('delstatus', 1)->get();
    	$cots = Country::where('delstatus', 1)->get();
    	$types = ProgramType::where('delstatus', 1)->get();
    	
    	$programs = Program::where('delstatus',1);
    	if(!empty($_GET['category']))
    	{ 
     		 $programs->where('category',$_GET['category']);         
    	}
    	if(!empty($_GET['country']))
    	{ 
     		 $programs->where('country',$_GET['country']);         
    	}
    	if(!empty($_GET['university']))
    	{ 
     		 $programs->where('university',$_GET['university']);         
    	}
    	if(!empty($_GET['type']))
    	{ 
     		 $programs->where('program_type',$_GET['type']);         
    	}

        if(!empty($_GET['proname']))
        {
            $programs->where('program_name','like','%'.$_GET['proname'].'%');   
        }


    	 $programs1 = $programs->paginate(15);

    	return view('mainpages.search', ['types' => $types, 'programs' => $programs1, 'cats' => $this->allcats(), 'unis' => $unis, 'cots' => $cots, 'services' => $this->services(), 'countries' => $this->allcountries(), 'allcots' => $this->allcots()]);
    }

    public function UniPage($slug='')
    {
       \DB::enableQueryLog();
    	$uniinfo = University::where(['delstatus' =>1, 'slug' => $slug])->first();
    	$cots = Country::where('delstatus', 1)->orderBy('name')->get();

        if(!empty($uniinfo)) {
    	$catsb = Program::where(['delstatus' =>1,'program_type' => 'Bachelor', 'university' => $uniinfo->id])->select('id','category')->groupBy('category')->get();
    //	return \DB::getQueryLog();
    	$catsm = Program::where(['delstatus' =>1,'program_type' => 'Master', 'university' => $uniinfo->id])->select('id','category')->groupBy('category')->get();
    	$catsd = Program::where(['delstatus' =>1,'program_type' => 'PhD', 'university' => $uniinfo->id])->select('id','category')->groupBy('category')->get();
    	$ddeg = Program::where(['delstatus' =>1,'program_type' => 'Double Degree Programs', 'university' => $uniinfo->id])->select('category')->groupBy('id','category')->get();
    	
    	$onet = Program::where(['delstatus' =>1,'program_type' => 'One-tier Master', 'university' => $uniinfo->id])->select('id','category')->groupBy('category')->get();
    	
    	$ndg = Program::where(['delstatus' =>1,'program_type' => 'Non-Degree Program', 'university' => $uniinfo->id])->select('id','category')->groupBy('category')->get();
    	$lngc = Program::where(['delstatus' =>1,'program_type' => 'Language/Preparatory Course', 'university' => $uniinfo->id])->select('id','category')->groupBy('category')->get();
    	return view('mainpages.unipage', ['unid'=>$uniinfo, 'catsb' => $catsb, 'catsm' => $catsm, 'catsd' => $catsd,'cats' => $this->cats(),
    	'services' => $this->services(), 'countries' => $this->allcountries(), 'ddeg' => $ddeg, 'onet' => $onet, 'ndg' => $ndg, 'lngc' => $lngc, 'cots' => $cots, 'allcots' => $this->allcots()]);
    
        }else {return view('mainpages.404', ['cats' => $this->allcats(), 'services' => $this->services(), 'countries' => $this->allcountries(), 'cots' => $cots, 'allcots' => $this->allcots()]);}
        }

    public function ProgramPage($university = null, $program = null)
    {
    	if(!empty($university) and !empty($program)){
    	$uniinfo = University::where(['delstatus' =>1, 'slug' => $university])->first();
    	$proinfo = Program::where(['delstatus' =>1, 'slug' => $program])->first();
    	return view('mainpages.propage', ['unid' => $uniinfo, 'proinfo' => $proinfo, 'cats' => $this->cats(), 'services' => $this->services(), 'countries' => $this->allcountries(), 'allcots' => $this->allcots()]);
        }
        else {return back();}
    }

    public function CountryUni($university)
    {
        $slug = str_slug(strtolower($university));
        
        $cid = Country::where('slug', $slug)->first();
      
        $unis = University::where(['delstatus' => 1, 'country_id' => $cid->id])->get();
        $countryd = Countrydetail::where(['delstatus' => 1, 'country_id' => $cid->id])->first();
        return view('mainpages.unilist', ['unis' => $unis,'countryd' =>$countryd,'cid' => $cid, 'cats' => $this->cats(), 'services' => $this->services(), 'countries' => $this->allcountries(), 'allcots' => $this->allcots()]);
    }

    public function SubmitContact(Request $req)
    {
        $firstname = $req->name_contact;
        $lastname = $req->lastname_contact;
        $email = $req->email_contact;
        $phone = $req->phone_contact;
        $msg = $req->message_contact;
        try{
            Validator::make($req->all(), [
        'name_contact' => 'required',
        'email_contact' => 'required|email',
        'message_contact' => 'required',
        'verify_contact' => 'required|integer|between:1,10'
       ])->setAttributeNames([
        'name_contact' => 'First Name',
        'email_contact' => 'Email',
        'message_contact' => 'Message',
        'verify_contact' => 'Veirfy Answer',
       ])->validate();} catch(\Exception $e){return $e->getMessage();
           
       }
       
       try { 
           Mail::send('mainpages.mail', ['firstname' => $firstname, 'lastname' => $lastname, 'email'=>$email, 'phone'=>$phone,'msg'=>$msg], function($message) 
       {
        $message->from('info@gilleducationconsultant.com', 'Gill Education');
        $message->subject('New Inquery');
        $message->to('orbrise@gmail.com', ' Gill Education Consultant');
      });
      return back()->with('msg','We received your email our representative will contact you shortly ');
       } catch (\Exception $e) {return back()->with('msg', 'Error, try again');}

    }
    
    public function Partners()
    {
        $allp = Partner::where('delstatus', 1)->get();
        return view('mainpages.partners',['cats' => $this->cats(), 'partners' => $allp, 'services' => $this->services(), 'countries' => $this->allcountries(), 'allcots' => $this->allcots() ]);
    }
    
    public function ServiceCountries($id='')
    {

        $cots = Country::where('delstatus', 1)->orderBy('name')->get();
        if(!empty($id))
        {
            $find = Subsection::where(['delstatus' => 1, 'section_id' => $id])->select('id',"countries")->distinct()->get();
            if(!empty($find)){
             $conts = $find;
            return view('mainpages.servicecountries', ['cats' => $this->cats(), 'services' => $this->services(), 'conts' => $conts, 'secid' => $id, 'countries' => $this->allcountries(), 'cots' => $cots, 'allcots' => $this->allcots()]);
            } else {return view('mainpages.servicepage', ['secdetail' => $find, 'countdetail' => '', 'cats' => $this->cats(), 'services' => $this->services(), 'countries' => $this->allcountries(), 'cots' => $cots, 'allcots' => $this->allcots() ]);}
        } 
    }
    
    public function ServicePage($id='', $cid = '')
    {
        
        $find = Subsection::where(['delstatus' => 1, 'id' => $id])->first();
       // return json_encode($find);
       if($find->unistatus == 1){
           $universites = University::where(['country_id' => $find->countries, 'delstatus' => 1])->get();
       } else {$universites = '';}
        $conid = Country::where(['delstatus' => 1, 'id' => $cid])->first();
        return view('mainpages.servicepage', ['secdetail' => $find, 'countdetail' => $conid, 'cats' => $this->cats(), 'services' => $this->services(), 'countries' => $this->allcountries(), 'universties' => $universites,  'allcots' => $this->allcots() ]);
        
    }
    
    public function Franchises()
    {
        $allp = Franchise::where('delstatus', 1)->get();
        return view('mainpages.franchises',['cats' => $this->cats(), 'franchises' => $allp, 'services' => $this->services(), 'countries' => $this->allcountries(), 'allcots' => $this->allcots()]);
    }
    
     public function SubmitEnq(Request $req)
    {   
        
        $int = $req->interetedin; $dob = $req->dob; $geder = $req->gender; $email = $req->email; $phone = $req->phone; $socialnum = $req->socialnumber;
        $city = $req->city; $state = $req->state; $country= $req->country; $langtest = $req->langtest; $material = $req->material; $descoun = $req->desirecountry; $course = $req->desirecourse;
        $firstname = $req->fname;
        $lastname = $req->lname;
        $email = $req->email;
        $phone = $req->phone;
        $msg = $req->message_contact;
        
        Validator::make($req->all(), [
        'interetedin' => 'required',
        'fname' => 'required',
        
        'dob' => 'required',
        'gender' => 'required',
        'email' => 'required|email',
        'phone' => 'required|numeric',
        'countrycode' => 'required',
        'socialnumber' => 'required',
        'city' => 'required',
        'state' => 'required',
        'country' => 'required',
        'langtest' => 'required',
        'material' => 'required',
        'desirecountry' => 'required',
        'desirecourse' => 'required',
        'message_contact' => 'required',
        'verify_contact' => 'required|integer|between:1,10'
       ])->setAttributeNames([
        'interetedin' => 'Interested Type',
        'fname' => 'First Name',
        'dob' => 'Date of Birth',
        'gender' => 'Gender',
        'email' => 'Email',
        'phone' => 'Phone Number',
        'socialnumber' => 'Social Number',
        'city' => 'City',
        'state' => 'State',
        'country' => 'Country',
        'langtest' => 'Language Test',
        'material' => 'Material Status',
        'desirecountry' => 'Desire Country',
        'desirecourse' => 'Desire Course',
        'message_contact' => 'Message',
        'verify_contact' => 'Veirfy Answer',
       ])->validate();
           
       try { 
           Mail::send('mainpages.enq', $req->all(), function($message) 
       {
        $message->from('info@gilleducationconsultant.com', 'Gill Education');
        $message->subject('New Inquery');
        $message->to('info@gilleducationconsultant.com', ' Gill Education Consultant');
      });
      return back()->with('msg','We received your email our representative will contact you shortly ');
       } catch (\Exception $e) {return back()->with('msg', $e->getMessage());}

    }
	
	public function AllUnis()
	{
		$getall = University::where('delstatus', 1)->get();
		return view('mainpages.allunis', ['unis' => $getall, 'cats' => $this->cats(), 'services' => $this->services(), 'countries' => $this->allcountries(), 'allcots' => $this->allcots()]);
	}
	
	public function BecomeAgent()
	{
	    $sections = Section::where('delstatus',1)->get();
		$cots = Country::where('delstatus', 1)->orderBy('name')->get();
		return view('mainpages.agent', ['allcots' => $cots, 'cats' => $this->cats(), 'services' => $this->services(), 'countries' => $this->allcountries(), 'sections' => $sections, 'allcots' => $this->allcots()]);
	}
	
	public function BecomeAgentPost(Request $req)
	{
	    $data['agent_name'] =$req->agent_name;
        $data['company_name'] =$req->company_name;
        $data['country'] =$req->country;
        $data['company_address'] =$req->company_address;
        $data['interested_in'] =$req->interested_in;
        $data['starting_year'] =$req->starting_year;
        $data['message'] = $req->message;
		
		$attributes = [
		'agent_name' => 'Agent Name',
		'company_name' => 'Company Name',
		'country' => 'Country',
		'company_address' => 'Company Address',
		'interested_in' => 'Interested In',
		'starting_year' => 'Starting Year',
		'message' => 'Message',
		
		];
		
		$validator = Validator::make($req->all(),[
		'agent_name' => 'required',
		'company_name' => 'required',
		'country' => 'required',
		'company_address' => 'required',
		'interested_in' => 'required',
		'starting_year' => 'required',
		'message' => 'required',
		])->setAttributeNames($attributes);
		
		if($validator->fails())
		{
			return back()->withInput()->withErrors($validator);
		}
		$data = $req->all();
		try { 
           Mail::send('mainpages.agentenq', ['data' => $data], function($message) 
       {
        $message->from('info@gilleducationconsultant.com', 'Gill Education');
        $message->subject('New Agent Registration');
        $message->to('orbrise@gmail.com', ' Gill Education Consultant');
      });
      return back()->with('msg','We received your email our representative will contact you shortly ');
       } catch (\Exception $e) {return back()->with('msg', $e->getMessage());}
	   
		
		
	}

}
