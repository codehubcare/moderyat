<?php

namespace Codehubcare\Moderyat\Http\Controllers;

use App\Http\Controllers\Controller;
use Codehubcare\Moderyat\Http\Requests\FileStoreRequest;
use Codehubcare\Moderyat\Http\Requests\FileUpdateRequest;
use Codehubcare\Moderyat\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index(Request $request)
    {
        $files = File::latest()->simplePaginate();

        return view('moderyat::files.index', compact('files'));
    }

    public function create()
    {
        $file = new File();

        return view('moderyat::files.create', compact('file'));
    }

    public function store(FileStoreRequest $request)
    {
        $file = File::create(
            [
                'title' => $request['title'],
                'file' => 'uploading',
                'user_id' => auth()->user()->id,
            ]
        );

        $this->handleFileUploadFor($file);

        return redirect()->route('files.index')->withSuccess('New file uploaded.');
    }

    public function show(File $file)
    {
        return view('moderyat::files.show', compact('file'));
    }

    public function edit(File $file)
    {
        return view('moderyat::files.edit', compact('file'));
    }

    public function update(FileUpdateRequest $request, File $file)
    {

        $file->update(
            [
                'title' => $request['title'],
            ]
        );

        $this->handleFileUploadFor($file);

        return redirect()->route('files.index')->withSuccess('File updated.');
    }

    public function destroy(File $file)
    {
        $file->deleteFileOf('file');
        $file->delete();

        return redirect()->route('files.index')->withSuccess('File deleted.');
    }

    private function handleFileUploadFor($file)
    {
        if (request()->hasFile('file')) {
            $file->uploadFile('file', 'files');
        }
    }
}
