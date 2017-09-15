<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\About;
use App\Contact;
use App\Comment;
use App\Http\Requests\ModifyAboutRequest;
use App\Http\Requests\ModifyContactRequest;
use Session;

class AdminController extends Controller
{
    public function home(){
        return view("admin.home");
    }

    public function about(){
        $data = About::all();

        return view("admin.about")->with('data', $data[0]);
    }

    public function about_modify(ModifyAboutRequest $request){
        $data = About::all();
        $record = $data[0];

        $record->naslov = $request->input('title');
        $record->sadrzaj = $request->input('text');
        $record->save();

        Session::flash('admin_flash_message','About page successfully updated!');
        return view("admin.about")->with('data', $record);
    }

    public function contact(){
        $data = Contact::all();

        return view("admin.contact")->with('data', $data[0]);
    }

    public function contact_modify(ModifyContactRequest $request){
        $data = Contact::all();
        $record = $data[0];

        $record->naslov = $request->input('title');
        $record->sadrzaj = $request->input('text');
        $record->save();

        Session::flash('admin_flash_message','Contact page successfully updated!');
        return view("admin.contact")->with('data', $record);
    }

    public function comments(){
        $data = Comment::where('odobren', '=', '0')->paginate(10);

        return view("admin.comments")->with('data', $data);
    }

    public function comments_approve($id){
        $comment = Comment::where('id', '=', $id)->get();
        $comment[0]->odobren = 1;
        $comment[0]->save();

        return redirect('/admin/comments');
    }

    public function comments_delete($id){
        $comment = Comment::where('id', '=', $id)->get();
        $comment[0]->delete();

        return redirect('/admin/comments');
    }
}
