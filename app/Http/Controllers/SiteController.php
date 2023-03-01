<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\Thankyou;
/* * ************Request***************** */


/* * ****************Model*********************** */
use URL;
use DB;
use Artisan;
use App\Models\UserMaster;
use App\Models\Product;

class SiteController extends Controller {

    public function index() {
        // print_r(1);
        // exit;
        $data = [];
        $data['products']=Product::where('status','1')->get();
        return view('site.index', $data);
    }

    


    
    public function get_product_details($id) {
        $data = [];
        $data['product_detail'] = $details = Product::findOrFail(base64_decode($id));
        $data['related_products']  = Product::where('id','<>',base64_decode($id))->where('status','1')->get();
        if (!$details) {
            return redirect()->route('/')->with('error_msg', 'Something went wrong please check your input!');
        }
        return view('site.product_detail', $data);
    }



}
