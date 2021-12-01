<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $uploadedFilesStatistics = [];
        if (auth()->user()->is_admin === 1) {
            // Get the number of uploaded files at january this year
            $uploadedFilesStatistics[] = File::whereMonth('created_at', '01')->whereYear('created_at', date('Y'))->count();
            $uploadedFilesStatistics[] = File::whereMonth('created_at', '02')->whereYear('created_at', date('Y'))->count();
            $uploadedFilesStatistics[] = File::whereMonth('created_at', '03')->whereYear('created_at', date('Y'))->count();
            $uploadedFilesStatistics[] = File::whereMonth('created_at', '04')->whereYear('created_at', date('Y'))->count();
            $uploadedFilesStatistics[] = File::whereMonth('created_at', '05')->whereYear('created_at', date('Y'))->count();
            $uploadedFilesStatistics[] = File::whereMonth('created_at', '06')->whereYear('created_at', date('Y'))->count();
            $uploadedFilesStatistics[] = File::whereMonth('created_at', '07')->whereYear('created_at', date('Y'))->count();
            $uploadedFilesStatistics[] = File::whereMonth('created_at', '08')->whereYear('created_at', date('Y'))->count();
            $uploadedFilesStatistics[] = File::whereMonth('created_at', '09')->whereYear('created_at', date('Y'))->count();
            $uploadedFilesStatistics[] = File::whereMonth('created_at', '10')->whereYear('created_at', date('Y'))->count();
            $uploadedFilesStatistics[] = File::whereMonth('created_at', '11')->whereYear('created_at', date('Y'))->count();
            $uploadedFilesStatistics[] = File::whereMonth('created_at', '12')->whereYear('created_at', date('Y'))->count();

            $latestFiles = File::latest()->take(5)->get();
            return view('panel.dashboard.admin', compact('latestFiles', 'uploadedFilesStatistics'));
        } else {
            // Get the number of uploaded files at january this year
            $uploadedFilesStatistics[] = File::where('user_id', auth()->user()->id)->whereMonth('created_at', '01')->whereYear('created_at', date('Y'))->count();
            $uploadedFilesStatistics[] = File::where('user_id', auth()->user()->id)->whereMonth('created_at', '02')->whereYear('created_at', date('Y'))->count();
            $uploadedFilesStatistics[] = File::where('user_id', auth()->user()->id)->whereMonth('created_at', '03')->whereYear('created_at', date('Y'))->count();
            $uploadedFilesStatistics[] = File::where('user_id', auth()->user()->id)->whereMonth('created_at', '04')->whereYear('created_at', date('Y'))->count();
            $uploadedFilesStatistics[] = File::where('user_id', auth()->user()->id)->whereMonth('created_at', '05')->whereYear('created_at', date('Y'))->count();
            $uploadedFilesStatistics[] = File::where('user_id', auth()->user()->id)->whereMonth('created_at', '06')->whereYear('created_at', date('Y'))->count();
            $uploadedFilesStatistics[] = File::where('user_id', auth()->user()->id)->whereMonth('created_at', '07')->whereYear('created_at', date('Y'))->count();
            $uploadedFilesStatistics[] = File::where('user_id', auth()->user()->id)->whereMonth('created_at', '08')->whereYear('created_at', date('Y'))->count();
            $uploadedFilesStatistics[] = File::where('user_id', auth()->user()->id)->whereMonth('created_at', '09')->whereYear('created_at', date('Y'))->count();
            $uploadedFilesStatistics[] = File::where('user_id', auth()->user()->id)->whereMonth('created_at', '10')->whereYear('created_at', date('Y'))->count();
            $uploadedFilesStatistics[] = File::where('user_id', auth()->user()->id)->whereMonth('created_at', '11')->whereYear('created_at', date('Y'))->count();
            $uploadedFilesStatistics[] = File::where('user_id', auth()->user()->id)->whereMonth('created_at', '12')->whereYear('created_at', date('Y'))->count();

            $latestFiles = File::where('user_id', auth()->user()->id)->latest()->take(5)->get();
            return view('panel.dashboard.user', compact('latestFiles', 'uploadedFilesStatistics'));
        }
    }
}
