<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\About as ThisModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Exception;
use stdClass;
use App\Helpers\FileHelper;

class AboutController extends Controller
{
    protected $view = 'admin.about';
    protected $route = 'about';

    public function edit()
    {
        $about = ThisModel::with([
            'image',
            'galleries' => function ($query) {
                $query->with('image');
            },
            'certificates' => function ($query) {
                $query->with('image');
            },
            'catalogs' => function ($query) {
                $query->with('image');
            },
        ])->first();
        return view($this->view . '.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'description' => 'required',
                'content' => 'required',
                'image' => 'nullable|file|mimes:jpg,jpeg,png|max:2240',
                'production_process_content' => 'required',
                'certificate_content' => 'required',
                'catalog_content' => 'required',
                'galleries' => 'nullable|array',
                'certificates' => 'nullable|array',
                'catalogs' => 'nullable|array',
                'galleries.*.image' => 'nullable|file|mimes:jpg,jpeg,png|max:2240',
                'certificates.*.image' => 'nullable|file|mimes:jpg,jpeg,png|max:2240',
                'catalogs.*.image' => 'nullable|file|mimes:jpg,jpeg,png|max:2240',
            ],
            [
                'title.required' => 'Title is required',
                'description.required' => 'Description is required',
                'content.required' => 'Content is required',
                'image.file' => 'Image must be a file',
                'image.mimes' => 'Image must be a jpg, jpeg or png file',
                'image.max' => 'Image must be less than 2MB',
                'production_process_content.required' => 'Production process content is required',
                'certificate_content.required' => 'Certificate content is required',
                'catalog_content.required' => 'Catalog content is required',
                'galleries.array' => 'Galleries must be an array',
                'certificates.array' => 'Certificates must be an array',
                'catalogs.array' => 'Catalogs must be an array',
                'galleries.*.image.file' => 'Gallery image must be a file',
                'galleries.*.image.mimes' => 'Gallery image must be a jpg, jpeg or png file',
                'galleries.*.image.max' => 'Gallery image must be less than 2MB',
                'certificates.*.image.file' => 'Certificate image must be a file',
                'certificates.*.image.mimes' => 'Certificate image must be a jpg, jpeg or png file',
                'certificates.*.image.max' => 'Certificate image must be less than 2MB',
                'catalogs.*.image.file' => 'Catalog image must be a file',
                'catalogs.*.image.mimes' => 'Catalog image must be a jpg, jpeg or png file',
                'catalogs.*.image.max' => 'Catalog image must be less than 2MB',
            ]
        );
        $json = new stdClass();

        if ($validate->fails()) {
            $json->success = false;
            $json->errors = $validate->errors();
            $json->message = "Thao tác thất bại!";
            return Response::json($json);
        }

        DB::beginTransaction();
        try {
            $object = ThisModel::findOrFail($id);
            $object->title = $request->title;
            $object->description = $request->description;
            $object->content = $request->content;
            $object->production_process_content = $request->production_process_content;
            $object->certificate_content = $request->certificate_content;
            $object->catalog_content = $request->catalog_content;
            $object->save();

            if ($request->image) {
                if ($object->image) {
                    FileHelper::forceDeleteFiles($object->image->id, $object->id, ThisModel::class, 'image');
                }
                FileHelper::uploadFile($request->image, 'about', $object->id, ThisModel::class, 'image', 99);
            }

            $object->syncGalleries($request->galleries);
            $object->syncCertificates($request->certificates);
            $object->syncCatalogs($request->catalogs);

            DB::commit();
            $json->success = true;
            $json->message = "Thao tác thành công!";
            $json->data = $object;
            return Response::json($json);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
}
