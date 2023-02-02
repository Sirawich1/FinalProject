<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use App\Models\motorcycle;
use App\Models\motorcycle_brand;
use App\Models\motorcycle_model;
use App\Models\motorcycles_color;
use App\Models\order;
use App\Models\parts;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    function index(){
        // $motorcycle = motorcycle::all();
        $motorcycle = DB::table('motorcycles')
        ->join('motorcycle_brands','motorcycle_Manufacturer','=','motorcycle_brands.id')
        ->join('motorcycle_models','motorcycle_Models','=','motorcycle_models.id')
        ->select('motorcycles.*','motorcycle_brands.brands_name','motorcycle_models.models_name')
        ->get();
        // $brand = motorcycle_brand::all();
        // $models = motorcycle_model::all();
        return view('AllCar',compact('motorcycle'));
        // return view('AllCar',compact('motorcycle','brand','models'));
    }
    function addPage(){
        $brands = motorcycle_brand::all();
        return view('AddCar', compact('brands'));
        // return view('AddCar');
    }

    //select box brand
    public function getBrand($id){
        $dataModels = motorcycle_model::where('brands_id',$id)->get();
        return response()->json($dataModels);
    }
    //select box getColor
    public function getColor($id){
        $dataColor = motorcycles_color::where('models_id',$id)->get();
        return response()->json($dataColor);
    }
    

    function buyCarPage(){
        return view('buycar');
    }
    function reserveCarPage(){
        return view('reserveCar');
    }

    public function detailPage($motorcycle_ID)
    {    
        $detail = motorcycle::find($motorcycle_ID);
        return view('CarDetail',compact('detail'));
    }

    public function SoftDeleteCar($motorcycle_ID)
    {
        motorcycle::find($motorcycle_ID)->delete();
        $motorcycle = motorcycle::all();
        return redirect()->back()->with('success', 'deleted successfully!');
    }

    //part
    public function showPartPage()
    {    
        $showparts = parts::all();
        return view('Allpart',compact('showparts'));
    }
    public function addpartPage()
    {    
        return view('AddPart');
    }


    // public function select_brands()
    // {
    //     $brands = motorcycle_brand::table('motorcycle_brands')->get();
    //     return view('AddCar', compact('brands'));
    // }


    public function insert_motocycles(Request $request)
    {
        $new_motorcycle = new motorcycle;
        $new_motorcycle->motorcycle_Models = $request->models;
        $new_motorcycle->motorcycle_Manufacturer = $request->Manufacturer;
        $new_motorcycle->motorcycle_Year = $request->Year;
        $new_motorcycle->motorcycle_LicensePlate = $request->LicensePlate;
        $new_motorcycle->motorcycle_Corlor = $request->color;
        $new_motorcycle->motorcycle_mileage = $request->mileage;
        $new_motorcycle->motorcycle_EngineNumber = $request->EngineNumber;
        $new_motorcycle->motorcycle_VinNumber = $request->VinNumber;
        $new_motorcycle->motorcycle_Price = $request->Price;
        $new_motorcycle->SoldOut = "N";
        $new_motorcycle->save();

        $motorcycle = motorcycle::all();
        return redirect('/AllCar');
    }

    public function insert_sell(Request $request)
    {
        //Customer Data
        $new_customer = new customer;
        $new_customer->customers_firstName = $request->firstName;
        $new_customer->customers_lastName = $request->lastName;
        $new_customer->customers_Gender = $request->Gender;
        $new_customer->customers_BirthDate = $request->BirthDate;
        $new_customer->customers_phoneNumber = $request->phoneNumber;
        $new_customer->customers_Address = $request->Address;

        $motorcycle_ID = $request->motorcycle_ID;
        $Price = $request->Price;

        $new_customer->save();

        //Customer Sell Order
        $new_sell = new order;
        $new_sell->OrderType_ID = 1;
        $new_sell->Employee_ID = 1;
        $new_sell->Customer_ID = $new_customer->id;
        $new_sell->Motorcycle_ID = $motorcycle_ID;
        $new_sell->Order_Price = $Price;
        $new_sell->Buys_Order_Status = '1';
        $new_sell->save();


    
        return redirect('/sellcar');

        // $table->string("customers_firstName");
        // $table->string("customers_lastName");
        // $table->string("customers_Gender");
        // $table->string("customers_BirthDate");
        // $table->string("customers_phoneNumber");
        // $table->string("customers_Address");

        

    }

    public function insert_parts(Request $request)
    {
        $new_part = new parts;
        $new_part->Parts_Name = $request->Name;
        $new_part->Parts_UnitPrice = $request->Price;
        $new_part->Parts_InStock = $request->Unit;
        $new_part->Parts_img = $request->Descript;
        $new_part->Parts_Description = $request->img;
        $new_part->save();

        $showparts = parts::all();
        return redirect('/Allpart');
    }
}
