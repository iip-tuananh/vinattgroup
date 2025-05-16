<?php

namespace App\Model\Admin;

use App\Model\Common\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Helpers\FileHelper;

class About extends Model
{
    protected $fillable = [
        'title',
        'image',
        'content',
        'product_process_content',
        'certificate_content',
        'catalog_content',
    ];

    public function image()
    {
        return $this->morphOne(File::class, 'model')->where('custom_field', 'image');
    }

    public function galleries()
    {
        return $this->hasMany(AboutGallery::class, 'about_id', 'id');
    }

    public function certificates()
    {
        return $this->hasMany(AboutCertificate::class, 'about_id', 'id');
    }

    public function catalogs()
    {
        return $this->hasMany(AboutCatalog::class, 'about_id', 'id');
    }

    public function syncGalleries($galleries)
    {
        if ($galleries) {
            $exist_ids = [];
            foreach ($galleries as $g) {
                if (isset($g['id'])) array_push($exist_ids, $g['id']);
            }

            $deleted = AboutGallery::where('about_id', $this->id)->whereNotIn('id', $exist_ids)->get();
            foreach ($deleted as $item) {
                $item->removeFromDB();
            }

            for ($i = 0; $i < count($galleries); $i++) {
                $g = $galleries[$i];

                if (isset($g['id'])) $gallery = AboutGallery::find($g['id']);
                else $gallery = new AboutGallery();

                $gallery->about_id = $this->id;
                $gallery->sort = $i;
                $gallery->save();

                if (isset($g['image'])) {
                    if ($gallery->image) $gallery->image->removeFromDB();
                    $file = $g['image'];
                    FileHelper::uploadFile($file, 'about_gallery', $gallery->id, AboutGallery::class, null, 99);
                }
            }
        }
    }

    public function syncCertificates($certificates)
    {
        if ($certificates) {
            $exist_ids = [];
            foreach ($certificates as $c) {
                if (isset($c['id'])) array_push($exist_ids, $c['id']);
            }

            $deleted = AboutCertificate::where('about_id', $this->id)->whereNotIn('id', $exist_ids)->get();
            foreach ($deleted as $item) {
                $item->removeFromDB();
            }

            for ($i = 0; $i < count($certificates); $i++) {
                $c = $certificates[$i];

                if (isset($c['id'])) $certificate = AboutCertificate::find($c['id']);
                else $certificate = new AboutCertificate();

                $certificate->about_id = $this->id;
                $certificate->sort = $i;
                $certificate->save();

                if (isset($c['image'])) {
                    if ($certificate->image) $certificate->image->removeFromDB();
                    $file = $c['image'];
                    FileHelper::uploadFile($file, 'about_certificate', $certificate->id, AboutCertificate::class, null, 99);
                }
            }
        }
    }

    public function syncCatalogs($catalogs)
    {
        if ($catalogs) {
            $exist_ids = [];
            foreach ($catalogs as $c) {
                if (isset($c['id'])) array_push($exist_ids, $c['id']);
            }

            $deleted = AboutCatalog::where('about_id', $this->id)->whereNotIn('id', $exist_ids)->get();
            foreach ($deleted as $item) {
                $item->removeFromDB();
            }

            for ($i = 0; $i < count($catalogs); $i++) {
                $c = $catalogs[$i];

                if (isset($c['id'])) $catalog = AboutCatalog::find($c['id']);
                else $catalog = new AboutCatalog();

                $catalog->about_id = $this->id;
                $catalog->sort = $i;
                $catalog->save();

                if (isset($c['image'])) {
                    if ($catalog->image) $catalog->image->removeFromDB();
                    $file = $c['image'];
                    FileHelper::uploadFile($file, 'about_catalog', $catalog->id, AboutCatalog::class, null, 1);
                }
            }
        }
    }
}
