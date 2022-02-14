<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DatabaseController extends Controller{
    public function registerAccount(Request $request){
        $validateData=$request->validate([
            'first_name'            =>'required|alpha_num|max:25',
            'middle_name'           =>'required|alpha_num|max:25',
            'last_name'             =>'required|alpha_num|max:25',
            'gender'                =>'required',
            'role_id'               =>'required',
            'email'                 =>'required|email',
            'password'              =>'required|min:8|regex:(.*\d)',
            'display_picture_link'  =>'required|mimes:jpeg,png,jpg,gif,svg,'
        ]);
        $fileName=$request->display_picture_link->getClientOriginalName();
        $request->display_picture_link->storeAs('public/img/',$fileName);
        $password=$validateData['password'];

        $account=new User;
        $account->first_name = $validateData['first_name'];
        $account->middle_name = $validateData['middle_name'];
        $account->last_name = $validateData['last_name'];
        $account->role_id = $validateData['role_id'];
        $account->gender_id = $validateData['gender'];
        $account->password = bcrypt($password);
        $account->email = $validateData['email'];
        $account->display_picture_link = $fileName;
        $account->save();

        return redirect()->route('home', $request->lang);
}
    public function addCartItem(Request $request){
        $existBook = Order::where('ebook_id','=',$request->id)->where('account_id','=',Auth::user()->id)->get();
        if($existBook->isEmpty()){
            $cartItem = new Order;
            $cartItem->account_id = Auth::user()->id;
            $cartItem->ebook_id = $request->id;
            $cartItem->order_date = Carbon::today();
            $cartItem->save();
        }
        return redirect()->route('Success', $request->lang);
    }
    public function deleteCartItem(Request $request){
        Order::join('ebooks','ebooks.ebook_id','=','orders.ebook_id')
        ->where('account_id','=',Auth::user()->id)
        ->where('orders.ebook_id','=',$request->id)->delete();
        return redirect()->route('Cart', $request->lang);
    }
    public function updateProfile(Request $request){
        $validateData=$request->validate([
            'first_name'            =>'required|alpha_num|max:25',
            'last_name'             =>'required|alpha_num|max:25',
            'gender'                =>'required',
            'role_id'               =>'required',
            'email'                 =>'required|email',
            'password'              =>'required|min:8|regex:(.*\d)',
            'display_picture_link'  =>'required|mimes:jpeg,png,jpg,gif,svg,'
        ]);
        $fileName=$request->display_picture_link->getClientOriginalName();
        $request->display_picture_link->storeAs('public/img/',$fileName);
        if($validateData['role_id'] == 'Admin') $validateData['role_id'] = 1;
        else $validateData['role_id'] = 2;
        $account = User::find($request->id);
        $account->first_name = $validateData['first_name'];
        if(!empty($request->middle_name)){
            $account->middle_name = $request->middle_name;
        }
        $account->last_name = $validateData['last_name'];
        $account->role_id = $validateData['role_id'];
        $account->gender_id = $validateData['gender'];
        $account->email = $validateData['email'];
        $account->password = bcrypt($validateData['password']);
        $account->display_picture_link = $fileName;
        $account->update();
        return redirect()->route('saved', $request->lang);
    }
    public function updateRole(Request $request){
        $account = User::find($request->id);
        $account->role_id= $request->role_id;
        $account->update();
        return redirect()->route('Account Maintenance', $request->lang);
    }
    public function deleteAccount(Request $request){
        $account = User::find($request->id);
        $account->delete();
        return redirect()->route('Account Maintenance',$request->lang);
    }
}
