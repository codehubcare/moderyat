<?php

namespace Codehubcare\Moderyat\Traits;

use Illuminate\Support\Facades\Storage;

trait Fileable
{
    public function uploadFile($fieldName, $path)
    {
        if ($this[$fieldName]) {
            $this->deleteFileOf($fieldName);
        }

        $this[$fieldName] = request()->file($fieldName)->store($path, 'public');
        $this->save();
    }

    public function hasFileOf($fieldName)
    {
        return $this[$fieldName] !== null;
    }

    public function deleteFileOf($fieldName)
    {
        if ($this->hasFileOf($fieldName)) {
            Storage::disk('public')->delete($this[$fieldName]);
            $this[$fieldName] = null;
            $this->save();
        }
    }

    public function getFilePathOf($fieldName)
    {
        return Storage::disk('public')->path($this[$fieldName]);
    }

    public function getFileUrlOf($fieldName)
    {
        return url('storage/'.$this[$fieldName]);
    }

    public function isFileExistsOf($fieldName)
    {
        return $this->hasFileOf($fieldName) && Storage::disk('public')->exists($this[$fieldName]);
    }
}
