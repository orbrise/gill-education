<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Country;
use App\University;
use App\Program;
use App\Unidetail;
use App\ProgramDetail;
use App\ProgramType;
use Image;
use App\Countrydetail;
use App\Subcat;
use App\Partner;
use App\Section;
use App\Franchise;
use App\Subsection;
use App\StaticPage;
use App\Team;

class MainController extends Controller
{
    public function index()
    {
    	return view('admin.dashboard');
    }
    
    public function Subcats()
    {
        $allcats = Category::where('delstatus',1)->where('display',0)->get();
        return view('admin.subcat', ['cats' => $allcats]);
    }
     
     public function AddSubCat(Request $req)
     {
         $pcat = $req->pcat;
         $subcat = $req->subcat;
         Subcat::firstOrCreate(['pcat' => $pcat, 'name' => $subcat,'delstatus' => 1],['pcat' => $pcat, 'name' => $subcat]);
         return '<br><span class="text-success">'.$subcat. ' has been added successfully</span>';
     }
     
     public function FindSubCat(Request $req)
     {
         $pcat = $req->pcat;
         $finds= Subcat::where(['delstatus' => 1, 'pcat' => $pcat])->get();
         return view('admin.ajax.page', ['findsubcats' => $finds,'fscat' => 1]);
     }
     
     public function UpdateSubCat(Request $req)
     {
         $id = $req->id;
         $name = $req->name;
         $find = Subcat::find($id);
         $find->name = $name;
         if($find->save()){return '<span class="text-success">Name successfuully Saved</span>';} else {return 'error! try again';}
     }
     
     public function ShowSubCat(Request $req)
     {
         $pcat = $req->pcat;
         $find = Subcat::where(['delstatus' => 1, 'pcat' => $pcat])->get();
         return view('admin.ajax.page', ['scats' => $find,'sscat' => 1]);
         
     }
     
     public function DeleteSubCat(Request $req)
     {
         $id = $req->id;
         $del = Subcat::find($id);
         $del->delstatus = 0;
         $del->save();
     } 
     
    public function Country()
    {
    	$allc = Country::get();
    	return view('admin.country', ['allc' => $allc]);
    }

    public function AddCountry(Request $req)
    {
    	$add = new Country;
    	$add->name = $req->name;
    	$add->slug = str_replace(" ","-", strtolower($req->name));
    	if($req->hasFile('flag'))
    	{
    		$file = $req->flag;
    		$ext = $req->file('flag')->getClientOriginalExtension();
            if($ext == 'jpg' or $ext == 'png' or $ext == 'jpeg')
            {
            	$newname = date("His").'.'.$ext;
                $image = Image::make($file);
                $image->resize(300,181, function ($constraint) {
    			$constraint->aspectRatio();
				});
                $image->resizeCanvas(300, 181, 'center', false, array(255, 255, 255, 0));
                $image->save('public/assets/countries/'.$newname, 60);
                $add->flag = $newname;
            }
    	}
    	if($add->save()){
    		return back()->with('successmsg', 'successfully added');
    	}
    }

    public function UpdateCountry(Request $req)
    {
    	$add = Country::find($req->id);
    	$add->name = $req->name;
    	$add->slug = str_replace(' ', '-', strtolower($req->name));
    	if($req->hasFile('flag'))
    	{
    		$file = $req->flag;
    		$ext = $req->file('flag')->getClientOriginalExtension();
            if($ext == 'jpg' or $ext == 'png' or $ext == 'jpeg')
            {
            	$newname = date("His").'.'.$ext;
                $image = Image::make($file);
                $image->resize(300, 181, function ($constraint) {
    			$constraint->aspectRatio();
				});
                $image->resizeCanvas(300, 181, 'center', false, '#fff');
                $image->save('public/assets/countries/'.$newname, 60);
                $add->flag = $newname;
            }
    	}
    	if($add->save()){
    		return back()->with('successmsg', 'successfully added');
    	}
    }
    
    public function CountryDetail($id='')
    {
        if(!empty($id))
        {
            $countryd = Countrydetail::where(['delstatus' => 1, 'country_id'=>$id])->first();
            return view('admin.countrydetail', ['countryd' => $countryd, 'id' =>$id]);
        }
    }
    
    public function UpdateCountryDetail(Request $req)
    {
        $update = Countrydetail::updateOrCreate(
            ['country_id' => $req->country_id],
            ['long_desc' => $req->long_desc,'link1name' => $req->link1name, 'link1url' => $req->link1url, 'link2name' => $req->link2name, 'link2url' => $req->link2url]);
            return back()->with('successmsg', 'successfully updated');
    }

    public function Universities()
    {
    	$allu = University::where('delstatus', 1)->get();
    	$allc = Country::where('delstatus', 1)->get();
    	if(!empty($_GET['country']))
    	{
    		$con = $_GET['country'];
    		$unis = University::where(['country_id' => $con])->get();
    		
    	} else {$unis='';}

    	return view('admin.university', ['allu' => $allu, 'allc' => $allc, 'unis' => $unis]);
    }

    public function AddUni(Request $req)
    {
        $add = new University;
    	$add->name = $req->name;
    	$add->slug = str_replace(" ", "-", strtolower($req->name));
    	$add->country_id = $req->country;
    	$add->city = $req->city;
    	if($req->hasFile('logo'))
    	{
    		$file = $req->logo;
    		$ext = $req->file('logo')->getClientOriginalExtension();
            if($ext == 'jpg' or $ext == 'png' or $ext == 'jpeg')
            {
            	$newname = date("His").'.'.$ext;
                $image = Image::make($file);
                $image->resize(300, 119, function ($constraint) {
    			$constraint->aspectRatio();
				});
                $image->resizeCanvas(300, 119, 'center', false, '#fff');
                $image->save('public/assets/universities/'.$newname, 60);
                $add->logo = $newname;
            }
    	}
    	if($add->save()){
    		return back()->with('successmsg', 'successfully added');
    	}
    }

    public function UpdateUni(Request $req)
    {

        $add = University::find($req->id);
    	$add->name = $req->name;
    	$add->slug = str_replace(" ", "-", strtolower($req->name));
    	$add->country_id = $req->country;
    	$add->city = $req->city;
    	if($req->hasFile('logo'))
    	{
    		$file = $req->logo;
    		$ext = $req->file('logo')->getClientOriginalExtension();
            if($ext == 'jpg' or $ext == 'png' or $ext == 'jpeg')
            {
            	$newname = date("His").'.'.$ext;
                $image = Image::make($file);
                $image->resize(300, 119, function ($constraint) {
    			$constraint->aspectRatio();
				});
                $image->resizeCanvas(300, 119, 'center', false, '#fff');
                $image->save('public/assets/universities/'.$newname, 60);
                $add->logo = $newname;
            }
    	}
    	if($add->save()){
    		return back()->with('successmsg', 'successfully added');
    	}
    }

     public function Programs()
    {
    	$allu = University::orderBy('name')->get();
    	$allc = Category::where('delstatus', 1)->get();
    	$types = ProgramType::where('delstatus',1)->get();
    	$subcats = Subcat::where('delstatus',1)->get();

    	if(!empty($_GET['uni']) && !empty($_GET['category']))
    	{
    	    $uni = $_GET['uni'];
          	$pro = $_GET['category'];
          	
    	    if($_GET['category'] == 'All')
    	    {
    	        $pros = Program::where(['university' => $uni])->get();
    	    } else {
    		
    		$pros = Program::where(['university' => $uni, 'category' => $pro])->get();
    	    }
    		
    	} else {$pros='';}

    	return view('admin.course', ['allu' => $allu, 'allc' => $allc, 'pros' => $pros, 'types' => $types, 'subcats' => $subcats]);
    }

    public function AddPro(Request $req)
    {
        $contid = University::find($req->uni);
        $add = new Program;
    	$add->program_name = $req->name;
        $add->slug = str_replace(" ", "-", strtolower($req->name));
        $add->country = $contid->country_id;
    	$add->university = $req->uni;
    	$add->category = $req->category;
    	$add->program_type = $req->type; 
    	$add->subcat = $req->subcat;
    	if($add->save()){
    		return back()->with('successmsg', 'successfully added');
    	}
    }

    public function UpdatePro(Request $req)
    {
    	$add = Program::find($req->id);
    	$add->program_name = $req->name;
        $add->slug = str_replace(" ", "-", strtolower($req->name));
    	$add->university = $req->uni;
    	$add->category = $req->category;
    	$add->program_type = $req->type; 
    	$add->subcat = $req->subcat;
    	if($add->save()){
    		return back()->with('successmsg', 'successfully added');
    	}
    }

    public function UniDetails($uni ='')
    {
    	if(!empty($uni))
    	{
    		$unid = University::where(['slug' => $uni, 'delstatus' => 1])->first();
    		$unidetails = Unidetail::where(['slug' => $uni, 'delstatus' => 1])->first();
    		return view('admin.unidetail', ['unid' => $unid, 'unidd' => $unidetails]);

    	} else {return back();}
    }

    public function UpdateUniDetail(Request $req)
    {
    	$uniid = $req->uniid;
    	$uniname = $req->uniname;
    	$slug = str_replace(" ", "-", strtolower($uniname));
    	Unidetail::updateOrCreate(['uni_name'=>$uniname, 'uni_id' => $uniid, 'delstatus' => 1],
    		[
    			'uni_name' => $uniname,
    			'slug' => $slug,
    			'uni_id' => $uniid,
    			'short_desc' => $req->sdesc,
    			'long_desc' => $req->longdesc,
    			'ranking' => $req->ranking,
    			'video_url' => $req->vlink
    	]);

    	if($req->hasFile('fimg'))
    	{
    		$file = $req->fimg;
    		$ext = $req->file('fimg')->getClientOriginalExtension();
            if($ext == 'jpg' or $ext == 'png' or $ext == 'jpeg')
            {
            	$newname = date("His").'.'.$ext;
                $image = Image::make($file);
                //$image->resize(300, null, function ($constraint) {
    			//$constraint->aspectRatio();
				//});
                $image->save('public/assets/universities/fimg/'.$newname, 60);
                Unidetail::updateOrCreate(['uni_name'=>$uniname, 'uni_id' => $uniid, 'delstatus' => 1],
    		[
    			'featured_img' => $newname
    	]);

            }
    	}

    	return redirect('/admin/details/'.$slug)->with('successmsg', 'successfully updated');

    }

    public function UpdateProDetail($id='')
    {

        if(!empty($id))
        {
            $pro = Program::find($id);
            return view('admin.progamdetail', ['pro' => $pro]);

        }else {
            return back();
        }
    }

    public function PostProDetail(Request $req)
    {
        $fp = ProgramDetail::find($req->prodid);
        ProgramDetail::updateOrCreate([ 'program_id' => $req->proid, 'university_id'=>$req->uniid],[

        'program_id' =>$req->proid ,'university_id' => $req->uniid ,'university_name' => $req->uniname,'degree' => $req->degree, 'discipline' => $req->dis,'duration' => $req->duration,'uni_web' => $req->uniweb, 'description' => $req->desc
    ]);
        return back()->with('successmsg', 'successfully Updated');
    }
    
    public function Partners()
    {
        $allp = Partner::where('delstatus', 1)->get();
        $allc = Country::where(['delstatus' => 1])->get();
        return view('admin.partners', ['allc' => $allc, 'partners' => $allp]);
    }
    
    public function AddPartner(Request $req)
    {
        $add = new Partner;
        $add->name = $req->cpname;
        $add->bname = $req->bname;
        $add->baddress = $req->baddress;
        $add->country = $req->country;
        $add->email = $req->email;
        
        if($req->hasFile('img'))
    	{
    		$file = $req->img;
    		$ext = $req->file('img')->getClientOriginalExtension();
            if($ext == 'jpg' or $ext == 'png' or $ext == 'jpeg')
            {
            	$newname = date("His").'.'.$ext;
                $image = Image::make($file);
                //$image->resize(300, null, function ($constraint) {
    			//$constraint->aspectRatio();
				//});
                $image->save('public/assets/partners/'.$newname, 60);
                $add->img = $newname;

            }
    	}
    	
        if($add->save()){return back()->with('successmsg', 'Successfully Addedd');} else {return back()->with('errormsg', 'ther is error');}
    }
    
    public function UpdatePartner(Request $req)
    {
        $add = Partner::find($req->pid);
        $add->name = $req->cpname;
        $add->bname = $req->bname;
        $add->baddress = $req->baddress;
        $add->country = $req->country;
        $add->email = $req->email;
        if($req->hasFile('img'))
    	{
    		$file = $req->img;
    		$ext = $req->file('img')->getClientOriginalExtension();
            if($ext == 'jpg' or $ext == 'png' or $ext == 'jpeg')
            {
            	$newname = date("His").'.'.$ext;
                $image = Image::make($file);
                //$image->resize(300, null, function ($constraint) {
    			//$constraint->aspectRatio();
				//});
				if(!empty($add->img) and file_exists('public/assets/partners/'.$add->img)){
				unlink('public/assets/partners/'.$add->img);
				}
                $image->save('public/assets/partners/'.$newname, 60);
                $add->img = $newname;

            }
    	}
        if($add->save()){return back()->with('successmsg', 'Successfully Addedd');} else {return back()->with('errormsg', 'ther is error');}
        
    }
    public function DelPartner($id='')
    {
        $add = Partner::find($id);
        $add->delstatus = 0;
        if($add->save()){return back()->with('successmsg', 'Successfully Addedd');} else {return back()->with('errormsg', 'ther is error');}
        
    }
    
    public function DeactivateUni($id = '')
    {
        if(!empty($id))
        {
            $uni = University::find($id);
            $uni->delstatus = 0;
            if ($uni->save()) 
            {$prog = Program::where(['university' => $id, 'delstatus' => 1])->update(['delstatus' => 0]);
             return back()->with('successmsg', 'University deactivate successfully');   
            }
        } else {return back();}
    }
    public function ActivateUni($id = '')
    {
        if(!empty($id))
        {
            $uni = University::find($id);
            $uni->delstatus = 1;
            if ($uni->save()) 
            {$prog = Program::where(['university' => $id, 'delstatus' => 0])->update(['delstatus' => 1]);
             return back()->with('successmsg', 'University deactivate successfully');   
            }
        } else {return back();}
    }
    
    public function DeactivatePro($id = '')
    {
        if(!empty($id))
        {
            $prog = Program::where(['id' => $id, 'delstatus' => 1])->update(['delstatus' => 0]);
             return back()->with('successmsg', 'Program deactivate successfully');   
        
        } else {return back();}
    }
    public function ActivatePro($id = '')
    {
        if(!empty($id))
        {
            $prog = Program::where(['id' => $id, 'delstatus' => 0])->update(['delstatus' => 1]);
             return back()->with('successmsg', 'Program deactivate successfully');   
        
        } else {return back();}
    }
    
    public function Sections()
    {
        $sections = Section::get();
        return view('admin.sections', ['sections' => $sections]);
    }
    
    public function AddSection(Request $req)
    {
        $add = new Section;
        $add->name = $req->name;
        if($add->save())
        {
            return back()->with('successmsg','Successfully Added');
        } else {return back()->with('errormsg', 'error');}
    }
    
    public function AddSubSection(Request $req)
    {
        $add = new SubSection;
        $add->name = $req->name;
        $add->section_id = $req->sectionid;
        if($add->save())
        {
            return back()->with('successmsg','Successfully Added');
        } else {return back()->with('errormsg', 'error');}
    }
    
    public function UpdateSection(Request $req)
    {
        $id = $req->id;
        $upd  = Section::find($id);
        $upd->name = $req->name;
        $upd->save();
        return back()->with('successmsg','Successfully Updated');
    }
    
    public function UpdateSubSection(Request $req)
    {
        $id = $req->id;
        $upd  = SubSection::find($id);
        $upd->name = $req->name;
        $upd->save();
        return back()->with('successmsg','Successfully Updated');
    }
    
    public function SubSections($id)
    {
        $d = Subsection::find($id);
        $selc = (!empty($d->countries)) ? $d->countries : 0; 
        $selectdconts = explode(",", $selc);
        $cons = Country::where('delstatus', 1)->get();
        $sections = Subsection::where(["section_id" => $id, "delstatus" =>1])->get();
        return view('admin.subsections', ['sd'=>$d, 'cons' => $cons, 'selectedconts' => $selectdconts, "sections" => $sections, 'sectionid' => $id]);
    }
    
    public function SectionDetail($id = '')
    {
        $d = Subsection::find($id);
        $selectdconts = explode(",", $d->countries);
        $cons = Country::where('delstatus', 1)->get();
        return view('admin.sectiondetails', ['sd'=>$d, 'cons' => $cons, 'selectedconts' => $selectdconts]);
    }
    
    public function UpdateSectionDetail(Request $req)
    {
        $id = $req->id;
        $upd = Subsection::find($id);
        $upd->detail = $req->detail;
        $upd->countries = implode(",",$req->conts);
        $upd->link1name = $req->link1name;
        $upd->link1url = $req->link1url;
        $upd->link2name = $req->link2name;
        $upd->link2url = $req->link2url;
        $upd->scholarship = $req->scholarship;
        $upd->unistatus = (isset($req->unistatus)) ? 1 : 0;
        $upd->save();
        return back()->with('successmsg', 'Successfully Updated');
    }
    
    public function Franchises()
    {
        $allp = Franchise::where('delstatus', 1)->get();
        $allc = Country::where(['delstatus' => 1])->get();
        return view('admin.franchise', ['allc' => $allc, 'franchises' => $allp]);
    }
    
     public function AddFranchise(Request $req)
    {
        $add = new Franchise;
        $add->name = $req->cpname;
        $add->bname = $req->bname;
        $add->baddress = $req->baddress;
        $add->country = $req->country;
        $add->email = $req->email;
        if($add->save()){return back()->with('successmsg', 'Successfully Addedd');} else {return back()->with('errormsg', 'there is error');}
    }
    
    public function UpdateFranchise(Request $req)
    {
        $add = Franchise::find($req->pid);
        $add->name = $req->cpname;
        $add->bname = $req->bname;
        $add->baddress = $req->baddress;
        $add->country = $req->country;
        $add->email = $req->email;
        if($add->save()){return back()->with('successmsg', 'Successfully Addedd');} else {return back()->with('errormsg', 'there is error');}
        
    }
    public function DelFranchise($id='')
    {
        $add = Franchise::find($id);
        $add->delstatus = 0;
        if($add->save()){return back()->with('successmsg', 'Successfully Addedd');} else {return back()->with('errormsg', 'there is error');}
        
    }
     public function Delcountry($id='')
    {
        $add = Country::find($id);
        $add->delstatus = 0;
        if($add->save()){
            $allu = University::where(['country_id' => 1])->update(['delstatus' => 0]);
            return back()->with('successmsg', 'Successfully deactivate');} else {return back()->with('errormsg', 'there is error');
            }
        
    }
    public function ACcountry($id='')
    {
        $add = Country::find($id);
        $add->delstatus = 1;
        if($add->save()){
            $allu = University::where(['country_id' => 0])->update(['delstatus' => 1]);
            return back()->with('successmsg', 'Successfully activate');} else {return back()->with('errormsg', 'there is error');
            }
        
    }
    
    public function SectionDeactivate($id)
    {
       $add = Section::find($id);
        $add->delstatus = 0;
        if($add->save()){
            return back()->with('successmsg', 'Successfully deactivate');} else {return back()->with('errormsg', 'there is error');
            }
    }
    public function SectionActivate($id)
    {
       $add = Section::find($id);
        $add->delstatus = 1;
        if($add->save()){
            return back()->with('successmsg', 'Successfully activate');} else {return back()->with('errormsg', 'there is error');
            }
    }
    
    public function SubSectionDeactivate($id)
    {
       $add = Subsection::find($id);
        $add->delstatus = 0;
        if($add->save()){
            return back()->with('successmsg', 'Successfully deactivate');} else {return back()->with('errormsg', 'there is error');
            }
    }
    public function SubSectionActivate($id)
    {
       $add = Subsection::find($id);
        $add->delstatus = 1;
        if($add->save()){
            return back()->with('successmsg', 'Successfully activate');} else {return back()->with('errormsg', 'there is error');
            }
    }
    
    public function AboutPage()
    {
        $about = StaticPage::where('page', 'about')->first();
        return view('admin.about', ['about' => $about]);
    }
    
    public function AddAboutPage(Request $req)
    {
        $about = StaticPage::updateOrCreate(['page' => 'about'],['page' => 'about', 'content' => $req->long_desc]);
        return back()->with('successmsg', 'Successfully Updated');
    }
    
    public function ManageTeam()
    {
        $team = Team::get();
        return view('admin.manageteam', ['teams' => $team]);
    }
    
    public function AddTeam(Request $req)
    {
    	$add = new Team;
    	$add->name = $req->name;
    	$add->desig = $req->desig;
    	if($req->hasFile('profilepic'))
    	{
    		$file = $req->profilepic;
    		$ext = $req->file('profilepic')->getClientOriginalExtension();
            if($ext == 'jpg' or $ext == 'png' or $ext == 'jpeg')
            {
            	$newname = date("His").'.'.$ext;
                $image = Image::make($file);
                $image->resize(300,500, function ($constraint) {
    			$constraint->aspectRatio();
				});
                $image->resizeCanvas(300, 500, 'center', false, array(255, 255, 255, 0));
                $image->save('public/assets/profilepic/'.$newname, 60);
                $add->profilepic = $newname;
            }
    	}
    	if($add->save()){
    		return back()->with('successmsg', 'successfully added');
    	}
    }
    
    public function DeleteTeam(Request $req)
    {
        $del = Team::find($req->id);
        if($del->delete())
        {
            return back()->with('successmsg', 'successfully deleted');
        }
    }
    
    
}
