<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $files = File::orderBy('id', 'desc')->where('is_public', 1)->get();

        return view('index', compact('files'));
    }

    public function downloadFileConfirmPassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $file = File::where('id', $id)->where('password', $request->password)->first();

        if ($file) {
            // return download file from storage folder with name files

            $message = [
                'success' => 'File berhasil didownload',
                'file' => $file,
            ];

            return redirect()->back()->with($message);
        } else {
            return redirect()->back()->with('error', 'Password salah');
        }
    }
}
