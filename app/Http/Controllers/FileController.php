<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadFile;
use App\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
    	return view('share');
    }

    public function store(UploadFile $request)
    {
    	try {
    		if(isset($request->share_file)) {
    			if(in_array($request->share_file->getClientOriginalExtension(), ['php', 'exe', 'bmp'])) {
    				return redirect()->back()->withErrors(['error' => 'That file extension is not allowed.']);
    			}
                $path = $request->file('share_file')->store('shared_files');
            }

            $file = File::create([
            	'file_name' => $request->file('share_file')->getClientOriginalName(),
            	'path' => $path,
            	'user_id' => Auth::user()->id
            ]);

            $url = route('file.show', base64_encode($file->id));
            return redirect('home')->with(['message' => 'File was succesfully uploaded. To view the file details go to ' . $url]);
    	} catch (Exception $e) {
    		Log::error($e->getMessage());
    		return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.']);
    	}
    }

    public function details($id, Request $request)
    {
    	$file = File::find(base64_decode($id));
    	if (! isset($file)) {
	        abort(404);
	    }
    	return view('details', compact('file'));
    }

    public function download($id)
    {
    	$file = File::find($id);
    	$path = Storage::disk('local')->path($file->path);
    	$file->download_count = $file->download_count + 1;
    	$file->save();
    	return response()->download($path, $file->file_name);
    }

    public function delete($id)
    {
    	File::find($id)->delete();
    	return redirect()->back();
    }

    public function listFiles()
    {
    	$files = File::where('user_id', Auth::user()->id)->get();
    	return view('files-list', compact('files'));
    }
}
