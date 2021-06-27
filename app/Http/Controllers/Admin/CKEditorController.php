<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $file = $request->file('upload');
            //get filename without extension
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

            $fileName = $fileName.'-'.time().'.'.$file->getClientOriginalExtension();
      
            $file->move(public_path('uploads'),$fileName);
 
            $ckeditor = $request->input('CKEditorFuncNum');
            $url = asset('uploads/'.$fileName);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($ckeditor, '$url', '$msg')</script>";
             
            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }
}
