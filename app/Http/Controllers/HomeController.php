<?php

namespace App\Http\Controllers;

use App\File;
use App\Http\Requests\StoreUserFileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $files = File::query()
            ->where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();
        $countOfFiles = File::query()
            ->where('user_id', auth()->user()->id)
            ->count();
        return view('home', [
            'files' => $files,
            'countOfFiles' => $countOfFiles
        ]);
    }

    public function store(StoreUserFileRequest $request)
    {
        $file = new File;

        $file->name = $request->file('name')->store('files', 'public');
        $file->comment = $request->get('comment');
        $file->deleted_at = $request->get('deleted_at');
        $file->user_id = $request->user()->id;

        $file->save();

        return redirect()->route('home');
    }

    public function create()
    {
        return view('form');
    }

    public function getFileDetails($id)
    {
        return view('details', ['file' => File::query()->find($id)]);
    }

    public function generateLink(Request $request) {
        dd(md5(rand(1, 10) . microtime()));
    }

    public function destroy($id) {
        try {
            File::query()->where('id', $id)->delete();
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
        return redirect()->route('home');
    }
}
