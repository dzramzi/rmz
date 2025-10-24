<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\FileUpload;
use Redirect;
use DB;
use File;

class FileUploadController extends Controller
{

    public function fileview(Request $request)
    {
      $files = FileUpload::latest()->paginate(20);
      return view('file-upload', ['files'=>$files]);
    }

    public function uploadTheFile(Request $request)
    {
        $rules = array(
          'attachment' => 'mimes:jpeg,png,jpg,gif,svg,pdf,webp|max:5000',
        );
        $messages = array(
          'attachment' => ' Image need Less then 5Mb.',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {

        return redirect()->route('fileviews')->with('status-alert', 'No file added, Image need Less then 1Mb');

        }else{

        if($request->file_name=="")
        {
        $imageName = time() . '.' . $request->attachment->extension();
        }
        else
        {
        $imageName = $request->file_name . '.' . $request->attachment->extension();
        }

        if (FileUpload::where('file_name', '=', $imageName)->exists()) {
         return redirect()->route('fileviews')->with('status-alert', 'Name Already exists');
        }

        //remove image before upload
        $path = $request->attachment->move("storage/attachment/", $imageName);
        $departmentname['file_name'] = $imageName;
        $departmentname['file_path_location'] = $path;
        FileUpload::create($departmentname);
        return redirect()->route('fileviews')->with('status-success', 'Successfully Added');

        }

    }


    public function delete_file($id)
    {

        $file = FileUpload::where('id', $id)->first();
        $f_name = $file->file_name;
        $file_path = 'storage/attachment/'.$f_name;
        unlink($file_path);
        DB::delete('delete from file_uploads where id = ?',[$id]);
        return redirect(route('fileviews'))->with('status-alert', 'File Has Been deleted');
    }


}
