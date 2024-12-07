<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Customer;
use App\Models\Repairorder;
use App\Models\Complaint;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
     
        return view('home');
    }

    /** Create */
    public function carCreate(){
        $customers = Customer::all();
        return view('car/create',compact('customers'));
    }
    
    public function customerCreate(){
        return view('customer/create');
    }

    public function ROCreate($car_id){
        $car = Car::findOrFail($car_id);
        return view('repairorder/create',compact('car'));
    }

    public function userCreate(){
        if(auth()->user()->id==1){
            $users = User::where('id','>',1)->get();
            return view('user/create',compact('users'));  
        }else{
            return redirect()->back()->with('alert-danger','alert-danger')->with('status','permission denied');
        }

    }


    public function ROEdit($ro_id){
        $ro = Repairorder::findOrFail($ro_id);
        return view('repairorder/edit',compact('ro'));
    }



    public function userEdit($id){
        $user = User::find($id);
        return view('user/edit',compact('user'));
    }



    public function complaintsCreate($ro_id){
        return view('complaint/add',compact('ro_id'));
    }


    /** Store */

    /*-- More --*/
    public function complaintsMore($ro_id){
        $ro = Repairorder::find($ro_id);
        return view('complaint/more',compact('ro_id'));
    }

    public function complaintsMoreStore(Request $request) {
        $this->validate($request,[
            'descr'=>'required'
        ]);

        Complaint::create($request->all());
        return redirect()->route('complaintsShow',['ro_id'=>$request->repairorder_id])
        ->with('status','Add successfuly');
    }

    public function carStore(Request $request){
        $this->validate($request, [
            'plate' => 'required|unique:cars,plate|unique:cars,zone',
            'zone' => 'required',
            'customer_id' => 'required',
            'year' => 'required',
            'model' => 'required',
            'chasis' => 'required|unique:cars',
         ]);
        Car::create($request->all());
        return redirect()->back()->with('status','Done');
    }

    public function customerStore(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'tel' => 'required',
            'plate' => 'required',
            'zone' => 'required',
            'year' => 'required',
            'model' => 'required',
            'make' => 'required',
            'chasis' => 'required|unique:cars'
         ]);
        $customer = Customer::create($request->all());
        $cust_id  = $customer->id;
        $request->request->add(['customer_id' => $cust_id]);//add cutomerID to request
        $car = Car::create($request->all());
        return redirect()->route('ROCreate', ['car_id' => $car->id]);
    }

    public function userStore(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
         ]);
         $user = new User;
         $user->name = $request->name;
         $user->email = $request->email;
         $user->password = bcrypt($request->password);
         $user->plain_password = $request->password;
         $user->save();
         return redirect()->back()->with('status','User Added Succesfuly');
    }

    public function ROStore(Request $request){
        
        $this->validate($request,[
            'name'=>'required',
            'tel'=>'required',
            'plate'=>'required',
            'zone'=>'required',
            'year'=>'required',
            'model'=>'required',
            'make'=>'required',
            'chasis'=>'required',
            'km'=>'required',
            'kmType'=>'required'
        ]);
        $km = $request->km . ' ' . $request->kmType;
        $request->merge(['km' => $km]);
        $ro = Repairorder::create($request->all());
        return view('complaint/create',compact('ro'));

    }

    public function complaintStore(Request $request){


        $this->validate($request, [
            'descr' => 'required'
         ]);
        $roID   = $request->repairorder_id;
        $userID = $request->user_id;
        foreach($request->input('descr') as $descr){
            if($descr !=null){
                $c = new Complaint;            
                $c->descr = $descr;
                $c->user_id = $userID;
                $c->repairorder_id = $roID;
                $c->save();
                DB::table('repairorders')->where('id',$roID)
                ->update(['active'=>1]);    
            }
          
        }

        $ro = Repairorder::find($roID);
        return view('repairorder/print',compact('ro'));
    }

/** Edit */
    public function complaintsEdit($complaint_id){
        $comp = Complaint::find($complaint_id);
        return view('complaint/edit',compact('comp'));
    }

    public function statusChange(){
        $ros = DB::table('repairorders')
        ->orderBy('id', 'desc')
        ->limit(10)
        ->get();
        return view('status/change',compact('ros'));

    }

    public function statusEdit($id=0)
    {
        $ro = Repairorder::find($id);
        $status = DB::table('status_option')->orderBy('en_option','ASC')->get();
        return view('status.edit',compact('ro','status'));
    }

    public function statusUpdate(Request $request) {
        $status = DB::table('status_option')->where('id',$request->status)->first();
        Repairorder::where('id',$request->ro_id)
        ->update(['status'=>$status->en_option,'status_ar'=>$status->ar_option]);
        return redirect(route('status.change'));
    }

    /** Update */
    public function complaintsUpdate(Request $request){
        $this->validate($request, [
            'descr' => 'required'
         ]);
         Complaint::where('id',$request->comp_id)->update(['descr'=>$request->descr]);
        return redirect()->back()->with('status','Updated Succesfuly');
    }

    public function ROUpdate(Request $request){
        //return $request->all();
        $this->validate($request, [
            'km' => 'required'
         ]);
         Repairorder::where('id',$request->ro_id)->update(['km'=>$request->km]);
        return redirect()->back()->with('status','Updated Succesfuly');
    }

     public function userUpdate(Request $request){

        $this->validate($request,['name'=>'required']);

        $name           = $request->name;
        $plain_password = $request->plain_password;
         User::where('id',$request->id)
        ->update(['name'=>$name,'plain_password'=>$plain_password,'password'=>bcrypt($plain_password)]);

        return redirect()->route('userCreate')->with('status','done');
    }  

/** Search */
    public function searchPlate(Request $request){
        $plate = $request->plate;
        $zone = $request->zone;
        $plates = Car::where('plate','like',"%$plate%")
        ->where('zone','like',"%$zone%")
        ->paginate(30);
        return view('searchresult/plates',compact('plates'));
    }

    public function searchChasis(Request $request){
        $chasis = $request->chasis;
        $chasises = Car::where('chasis','like',"%$chasis%")->paginate(30);
        return view('searchresult/chasises',compact('chasises'));
    }

    public function searchTel(Request $request){
        $tel = $request->tel;
        $tels = Customer::where('tel','like',"%$tel%")->paginate(30);
        return view('searchresult/tels',compact('tels'));
    }

    public function searchName(Request $request){
        $name = $request->name;
        if($name != null){
            $names = Customer::where('name','like',"%$name%")->paginate(30);
            return view('searchresult/names',compact('names'));            
        }else{

            return redirect()->back()->with(['status'=>'please,specify the search key','alert'=>'alert-warning']);
        }

    }

    public function searchRO(Request $request){
        $ro_id = $request->ro;
        $ros = Repairorder::where('id','like',"%$ro_id%")
        ->paginate(30);

        if($ros != null){
            return view('searchresult/ro',compact('ros'));
        }else{
            return redirect()->back()->with('status','Not Found!');
        }
    }

    /** Show*/   
    public function ROShow($cust_id,$car_id){
        $ros = Repairorder::where(['customer_id'=>$cust_id,'car_id'=>$car_id])->get();
        return view('repairorder/show',compact('ros'));
    }

    public function carShow($cust_id){
        $cars = Car::where(['customer_id'=>$cust_id])->get();
        return view('car/show',compact('cars'));
    }

    public function complaintsShow($ro_id){
        $ro = Repairorder::where('id',$ro_id)->first();
        return view('complaint/show',compact('ro'));
    }

    public function statusShow(){
        return view('status/show');
    }

    

    /* print */
    public function print($roID) {
        $ro = Repairorder::find($roID);
        return view('repairorder/print',compact('ro'));
    }

    /* vin check */
    public function searchForVIN(Request $request) {

        $customers = Car::where('chasis','=',$request->data)->get();

        if(count($customers)==0)
        {
            return  array('result' => '<p class=text-success>Good, Not Found In records</p>' );
        }
        else{
            return array('result' => '<p class=text-danger>Oops, Found In records </p>' );
        }

        
    }




}
