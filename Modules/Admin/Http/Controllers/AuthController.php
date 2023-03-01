<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\UserMaster;
use App\Models\LoginHistory;

class AuthController extends AdminController {

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function get_login() {
        $data = [];

        return view('admin::auth.login', $data);
    }

    public function post_login(Request $request) {

        $validator = Validator::make($request->all(), [
                    'email' => 'required|email',
                    'password' => 'required|min:6'
        ]);

        if ($validator->passes()) {
            $model = UserMaster::where('email', $request->input('email'))
                    //->whereIn('type_id', [1,4])
                    ->where('type_id', '=', '1')
                    ->where('status', '1')
                    ->first();


            if ($model) {

                if (Hash::check($request->password, $model->password)) {
                    Auth::guard('backend')->login($model);

                    $ip = $this->get_user_ip();

                    //---------Previous user logout------------
                    $prev_login = \App\Models\LoginHistory::where('user_master_id', Auth()->guard('backend')->id())->where('ip', $ip)->orderBy('id', 'DESC')->first();
                    if ($prev_login) {
                        if ($prev_login->type == 'login') {

                            $minutes_to_add = 60;
                            $time = new \DateTime(date('Y-m-d H:i:s'));
                            $time->add(new \DateInterval('PT' . $minutes_to_add . 'M'));
                            $stamp = $time->format('Y-m-d H:i:s');

                            if (date('Y-m-d H:i:s') > $stamp) {
                                $upd_time = $stamp;
                            } else {
                                $upd_time = date('Y-m-d H:i:s');
                            }

                            $login = new LoginHistory();
                            $login->user_master_id = Auth()->guard('backend')->user()->id;
                            $login->type = 'logout';
                            $login->ip = $ip;
                            $login->created_at = $upd_time;
                            $login->save();
                        }
                    }


                    $login = new LoginHistory();
                    $login->user_master_id = Auth()->guard('backend')->user()->id;
                    $login->type = 'login';
                    $login->ip = $ip;
                    $login->created_at = date('Y-m-d H:i:s');
                    $login->save();


                    return redirect()->route('admin-dashboard')->with('success_msg', 'You have successfully login');
                } else {
                    return redirect()->back()->withErrors($validator)->withInput()->with('error_msg', 'Login Failed!! Please check your credentials');
                }
            } else {
                return redirect()->back()->withErrors($validator)->withInput()->with('error_msg', 'Login Failed!! Please check your credentials');
            }
        } else {
            return redirect()->back()->withErrors($validator)->withInput()->with('error_msg', 'Login Failed!! Please check the below error');
        }
    }

    public function logout() {
        $ip = $this->get_user_ip();
        $login = new LoginHistory();
        $login->user_master_id = Auth()->guard('backend')->user()->id;
        $login->type = 'logout';
        $login->ip = $ip;
        $login->created_at = date('Y-m-d H:i:s');
        $login->save();
        Auth::guard('backend')->logout();
        return redirect('admin/admin-login')->with('success_msg', 'You have been successfully logout !!');
    }

    

   

}
