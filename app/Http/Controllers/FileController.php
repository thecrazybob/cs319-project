<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\File         $file
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, File $file)
    {
        return view('file.show', compact('file'));
    }

    public static function addFilePathToArray(array $data)
    {
        $data['type'] = pathinfo($data['file_path'], PATHINFO_EXTENSION);

        return $data;
    }

    public static function store(array $data)
    {
        $data = FileController::addFilePathToArray($data);

        return File::create($data);
    }

    public static function update(int $fileId, array $data)
    {
        $data = FileController::addFilePathToArray($data);

        return File::find($fileId)->update($data);
    }
}
