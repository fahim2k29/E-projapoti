<?php

namespace App\Http\Controllers;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;
use App\ClientComment;

class ClientCommentController extends Controller
{


    public function index()
    {
        $comments = ClientComment::all();
        return view('backend.pages.clientComment', compact('comments'));
    }

    public function show()
    {
        return view('backend.pages.clientCommentInsert');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'client_comment_serial' => 'required|numeric',
            'client_comment_name' => 'required',
            'image' => 'required',
            'client_comment_desc' => 'required',
            'client_comment_status' => 'required'
        ]);

        $clientCommentObject = new ClientComment;
        $clientCommentObject->serial = $request->client_comment_serial;
        $clientCommentObject->name = $request->client_comment_name;
        $clientCommentObject->desc = $request->client_comment_desc;
        $clientCommentObject->status = $request->client_comment_status;

        if ($request->file('image')){
            $images = $request->file('image');
            foreach ($images as $image){
                $rand = rand();
                $imageName = $rand.'.'.$image->getClientOriginalExtension();
                $image->move(public_path("images/product/".date("Y").'/'.date('M')),$imageName);
                $imgPath = "product/".date("Y").'/'.date('M').'/' .$imageName;
                $clientCommentObject->image = $imgPath;
            }
        }

        $clientCommentObject->save();
        return redirect()->route('clientComment')->with('success','Client Comment Created successfully!');
    }

    public function update(Request $request,$id)
   {
       $comments = ClientComment::find($id);
       return view('backend.pages.clientCommentUpdate',compact('comments'));
   }

    public function updateConfirm(Request $request, $id)
    {
        $request->validate([
            'client_comment_serial' => 'required|numeric',
            'client_comment_name' => 'required',
            'image' => 'required',
            'client_comment_desc' => 'required',
            'client_comment_status' => 'required'
        ]);

        $comments = ClientComment::find($id);
        $comments->serial =  $request->get('client_comment_serial');
        $comments->name =  $request->get('client_comment_name');
        // $comments->image =  $request->get('image');
        $comments->desc =  $request->get('client_comment_desc');
        $comments->status =  $request->get('client_comment_status');

        if ($request->file('image')){
            $images = $request->file('image');
            foreach ($images as $image){
                $rand = rand();
                $imageName = $rand.'.'.$image->getClientOriginalExtension();
                $image->move(public_path("images/product/".date("Y").'/'.date('M')),$imageName);
                $imgPath = "product/".date("Y").'/'.date('M').'/' .$imageName;
                $comments->image = $imgPath;
            }
        }

        $comments->save();

        return redirect()->route('clientComment')->with('success','Client Comment Updated successfully!');
    }

   public function delete(Request $request, $id)
   {
       $clientCommentObject = ClientComment::find($id);
       $clientCommentObject->delete();
       return redirect()->route('clientComment')->with('success','Client Comment Delete successfully!');
   }





}
