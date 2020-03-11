<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\news_list;
use Session;
class NewsController extends Controller
{
    //

    public function add_news_interface()
    {
    	return view('dashboard.add_news');
    }

    public function view_news_interface()

    {
     $school_id= Session::get('school_id');

      $newses = news_list::where('school_id','=',$school_id)->get();


      return view ('dashboard.view_news',['newses'=>$newses]); 
    }
      

     public function submit_news(Request $request)
     
     {  
       $school_id= Session::get('school_id');
     	 date_default_timezone_set('Asia/Dhaka');
     $date = date('d F Y');
     	$notice = $request->notice;
      $title = $request->news_title;
     	 $image = time().'.'.request()->file->getClientOriginalExtension();
     	 //file_put_contents('tes.txt', $image);
     	// request()->file->move(public_path('news_image'), $image);
     	
     	request()->file->move(base_path('sazid_school/news_image'), $image);

          $news = new news_list();
          $news->news = $notice;
          $news->title = $title;
          $news->school_id = $school_id;
          $news->image = $image;
          $news->date = $date;
          $news->save();


     } 

}
