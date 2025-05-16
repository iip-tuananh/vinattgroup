<?php

namespace App\Model\Admin;

use App\Model\Common\File;
use Illuminate\Database\Eloquent\Model;

class AboutGallery extends Model
{
    protected $table = 'about_galleries';
    protected $fillable = ['about_id'];

    public function image()
    {
        return $this->morphOne(File::class, 'model');
    }

    public function removeFromDB() {
        if ($this->image) $this->image->removeFromDB();
        $this->delete();
    }
}
