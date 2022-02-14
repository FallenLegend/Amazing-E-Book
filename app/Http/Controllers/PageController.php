<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Models\Order;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller{
    public function landingPage(){
        return redirect()->route('index',['lang'=>'en']);
    }
    public function indexPage($lang){
        App::setLocale($lang);
        return view('indexPage', ['lang'=>$lang]);
    }
    public function signUpPage($lang){
        App::setLocale($lang);
        $roles = Role::all();
        return view('register', ['roles' => $roles, 'lang'=>$lang]);
    }
    public function loginPage($lang){
        App::setLocale($lang);
        return view('login',['lang'=>$lang]);
    }
    public function homePage($lang){
        App::setLocale($lang);
        $books = Ebook::all();
        return view('homePage', ['books'=>$books, 'lang'=>$lang]);
    }
    public function eBookDetailPage(Request $request){
        App::setLocale($request->lang);
        $book = Ebook::where('ebook_id', '=', $request->id)->get();
        return view('eBookDetailPage', ['book'=>$book, 'lang'=>$request->lang]);
    }
    public function cartPage($lang){
        App::setLocale($lang);
        $books = Order::join('ebooks','ebooks.ebook_id','=','orders.ebook_id')
        ->where('account_id','=',Auth::user()->id)->get();
        return view('cartPage', ['books'=>$books, 'lang'=>$lang]);
    }
    public function successPage($lang){
        App::setLocale($lang);
        return view('successPage',['lang'=>$lang]);
    }
    public function logOutSuccessPage($lang){
        App::setLocale($lang);
        return view('logOutSuccessPage',['lang'=>$lang]);
    }
    public function profilePage($lang){
        App::setLocale($lang);
        return view('profilePage',['lang'=>$lang]);
    }
    public function savedPage($lang){
        App::setLocale($lang);
        return view('savedPage',['lang'=>$lang]);
    }
    public function accountMaintenancePage($lang){
        App::setLocale($lang);
        $accounts = User::join('roles','roles.role_id','=','users.role_id')->get();
        return view('accountMaintenancePage',['accounts'=>$accounts, 'lang'=>$lang]);
    }
    public function updateRolePage(Request $request){
        App::setLocale($request->lang);
        $targetAccount = User::find($request->id);
        $roles=Role::all();
        return view('updateRolePage', ['targetAccount'=>$targetAccount,'roles'=>$roles, 'lang'=>$request->lang]);
    }
}
