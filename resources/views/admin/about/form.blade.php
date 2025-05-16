<style>
    .gallery-item {
        padding: 5px;
        padding-bottom: 0;
        border-radius: 2px;
        border: 1px solid #bbb;
        min-height: 100px;
        height: 100%;
        position: relative;
    }

    .gallery-item .remove {
        position: absolute;
        top: 5px;
        right: 5px;
    }

    .gallery-item .drag-handle {
        position: absolute;
        top: 5px;
        left: 5px;
        cursor: move;
    }

    .gallery-item:hover {
        background-color: #eee;
    }

    .gallery-item .image-chooser img {
        max-height: 150px;
    }

    .gallery-item .image-chooser:hover {
        border: 1px dashed green;
    }
</style>
<ul class="nav nav-tabs" id="myTab1" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="about-us-tab" data-toggle="tab" href="#about-us" role="tab" aria-controls="about-us" aria-selected="true">
            About us
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="product-process-tab" data-toggle="tab" href="#product-process" role="tab" aria-controls="product-process" aria-selected="true">
            Product process
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="certification-tab" data-toggle="tab" href="#certification" role="tab" aria-controls="certification" aria-selected="true">
            Certification
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="catalog-tab" data-toggle="tab" href="#catalog" role="tab" aria-controls="catalog" aria-selected="true">
            Catalog
        </a>
    </li>
</ul>
<div class="tab-content" id="myTabContent1">
    <div class="tab-pane fade show active p-3" id="about-us" role="tabpanel" aria-labelledby="about-us-tab">
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group custom-group mb-4">
                    <label class="form-label required-label">Title</label>
                    <input class="form-control " type="text" ng-model="form.title">
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>
                            <% errors.title[0] %>
                        </strong>
                    </span>
                </div>

                <div class="form-group custom-group mb-4">
                    <label class="form-label required-label">Description</label>
                    <textarea id="my-textarea" class="form-control" rows="5" ng-model="form.description"></textarea>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>
                            <% errors.description[0] %>
                        </strong>
                    </span>
                </div>

                <div class="form-group custom-group mb-4">
                    <label class="form-label required-label">Content</label>
                    <textarea class="form-control ck-editor" ck-editor rows="5" ng-model="form.content"></textarea>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>
                            <% errors.content[0] %>
                        </strong>
                    </span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group text-center">
                    <div class="main-img-preview">
                        <label for="">Image(600x600px)</label>
                        <p class="help-block-img">* Image format: jpg, png, max 2MB.</p>
                        <img class="thumbnail img-preview" ng-src="<% form.image.path %>">
                    </div>
                    <div class="input-group" style="width: 100%; text-align: center">
                        <div class="input-group-btn" style="margin: 0 auto">
                            <div class="fileUpload fake-shadow cursor-pointer">
                                <label class="mb-0" for="<% form.image.element_id %>">
                                    <i class="glyphicon glyphicon-upload"></i> Select image
                                </label>
                                <input class="d-none" id="<% form.image.element_id %>" type="file" class="attachment_upload" accept=".jpg,.jpeg,.png">
                            </div>
                        </div>
                    </div>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>
                            <% errors.image[0] %>
                        </strong>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade show p-3" id="product-process" role="tabpanel" aria-labelledby="product-process-tab">
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group custom-group mb-4">
                    <label class="form-label required-label">Product process Content</label>
                    <textarea class="form-control ck-editor" ck-editor rows="5" ng-model="form.production_process_content"></textarea>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>
                            <% errors.production_process_content[0] %>
                        </strong>
                    </span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group text-center">
                    <label for="">Gallery images(600x600px)</label>
                    <div class="row gallery-area border">
                        <div class="col-md-4 p-2" ng-repeat="g in form.galleries">
                            <div class="gallery-item">
                                <button class="btn btn-sm btn-danger remove" ng-click="form.removeGallery($index)">
                                    <i class="fa fa-times mr-0"></i>
                                </button>
                                <div class="form-group">
                                    <div class="img-chooser" title="Select image">
                                        <label for="<% g.image.element_id %>">
                                            <img ng-src="<% g.image.path %>">
                                            <input class="d-none" type="file" accept=".jpg,.png,.jpeg" id="<% g.image.element_id %>">
                                        </label>
                                    </div>
                                    <span class="invalid-feedback d-block" role="alert" ng-if="!errors['galleries.' + $index + '.image_obj']">
                                        <strong>
                                            <% errors['galleries.' + $index + '.image' ][0] %>
                                        </strong>
                                    </span>
                                    <span class="invalid-feedback">
                                        <strong>
                                            <% errors['galleries.' + $index + '.image_obj' ][0] %>
                                        </strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 p-2">
                            <label class="gallery-item d-flex align-items-center justify-content-center cursor-pointer" for="gallery-chooser">
                                <i class="fa fa-plus fa-2x text-secondary"></i>
                            </label>
                            <input class="d-none" type="file" accept=".jpg,.png,.jpeg" id="gallery-chooser" multiple>
                        </div>
                    </div>
                    <span class="invalid-feedback">
                        <strong>
                            <% errors.galleries[0] %>
                        </strong>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade show p-3" id="certification" role="tabpanel" aria-labelledby="certification-tab">
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group custom-group mb-4">
                    <label class="form-label required-label">Certification Content</label>
                    <textarea class="form-control ck-editor" ck-editor rows="5" ng-model="form.certificate_content"></textarea>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>
                            <% errors.certificate_content[0] %>
                        </strong>
                    </span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group text-center">
                    <label for="">Gallery images(600x600px)</label>
                    <div class="row gallery-area border">
                        <div class="col-md-4 p-2" ng-repeat="g in form.certificates">
                            <div class="gallery-item">
                                <button class="btn btn-sm btn-danger remove" ng-click="form.removeCertificate($index)">
                                    <i class="fa fa-times mr-0"></i>
                                </button>
                                <div class="form-group">
                                    <div class="img-chooser" title="Select image">
                                        <label for="<% g.image.element_id %>">
                                            <img ng-src="<% g.image.path %>">
                                            <input class="d-none" type="file" accept=".jpg,.png,.jpeg" id="<% g.image.element_id %>">
                                        </label>
                                    </div>
                                    <span class="invalid-feedback d-block" role="alert" ng-if="!errors['certificates.' + $index + '.image_obj']">
                                        <strong>
                                            <% errors['certificates.' + $index + '.image' ][0] %>
                                        </strong>
                                    </span>
                                    <span class="invalid-feedback">
                                        <strong>
                                            <% errors['certificates.' + $index + '.image_obj' ][0] %>
                                        </strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 p-2">
                            <label class="gallery-item d-flex align-items-center justify-content-center cursor-pointer" for="certificate-chooser">
                                <i class="fa fa-plus fa-2x text-secondary"></i>
                            </label>
                            <input class="d-none" type="file" accept=".jpg,.png,.jpeg" id="certificate-chooser" multiple>
                        </div>
                    </div>
                    <span class="invalid-feedback">
                        <strong>
                            <% errors.certificates[0] %>
                        </strong>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade show p-3" id="catalog" role="tabpanel" aria-labelledby="catalog-tab">
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group custom-group mb-4">
                    <label class="form-label required-label">Catalog Content</label>
                    <textarea class="form-control ck-editor" ck-editor rows="5" ng-model="form.catalog_content"></textarea>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>
                            <% errors.catalog_content[0] %>
                        </strong>
                    </span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group text-center">
                    <label for="">Gallery images(600x600px)</label>
                    <div class="mb-2">Please divide the catalog pages into images in order</div>
                    <div class="row gallery-area border">
                        <div class="col-md-4 p-2" ng-repeat="g in form.catalogs">
                            <div class="gallery-item">
                                <button class="btn btn-sm btn-danger remove" ng-click="form.removeCatalog($index)">
                                    <i class="fa fa-times mr-0"></i>
                                </button>
                                <div class="form-group">
                                    <div class="img-chooser" title="Select image">
                                        <label for="<% g.image.element_id %>">
                                            <img ng-src="<% g.image.path %>">
                                            <input class="d-none" type="file" accept=".jpg,.png,.jpeg" id="<% g.image.element_id %>">
                                        </label>
                                    </div>
                                    <span class="invalid-feedback d-block" role="alert" ng-if="!errors['catalogs.' + $index + '.image_obj']">
                                        <strong>
                                            <% errors['catalogs.' + $index + '.image' ][0] %>
                                        </strong>
                                    </span>
                                    <span class="invalid-feedback">
                                        <strong>
                                            <% errors['catalogs.' + $index + '.image_obj' ][0] %>
                                        </strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 p-2">
                            <label class="gallery-item d-flex align-items-center justify-content-center cursor-pointer" for="catalog-chooser">
                                <i class="fa fa-plus fa-2x text-secondary"></i>
                            </label>
                            <input class="d-none" type="file" accept=".jpg,.png,.jpeg" id="catalog-chooser" multiple>
                        </div>
                    </div>
                    <span class="invalid-feedback">
                        <strong>
                            <% errors.catalogs[0] %>
                        </strong>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="text-right">
    <button type="submit" class="btn btn-success btn-cons" ng-click="submit()" ng-disabled="loading.submit">
        <i ng-if="!loading.submit" class="fa fa-save"></i>
        <i ng-if="loading.submit" class="fa fa-spin fa-spinner"></i>
        Save
    </button>
    <a href="{{ route('services.index') }}" class="btn btn-danger btn-cons">
        <i class="fa fa-remove"></i> Cancel
    </a>
</div>
