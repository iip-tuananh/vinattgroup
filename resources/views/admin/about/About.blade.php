@include('admin.products.ProductGallery')
<script>
    class About extends BaseClass {
        no_set = [];

        before(form) {
            this.image = {};
        }

        after(form) {

        }

        // Ảnh đại diện
        get image() {
            return this._image;
        }

        set image(value) {
            this._image = new Image(value, this);

        }

        clearImage() {
            if (this.image) this.image.clear();
        }

        get galleries() {
            return this._galleries || [];
        }

        set galleries(value) {
            this._galleries = (value || []).map(val => new ProductGallery(val, this));
        }

        addGallery(gallery) {
            if (!this._galleries) this._galleries = [];
            let new_gallery = new ProductGallery(gallery, this);
            this._galleries.push(new_gallery);
            return new_gallery;
        }

        removeGallery(index) {
            this._galleries.splice(index, 1);
        }


        get certificates() {
            return this._certificates || [];
        }

        set certificates(value) {
            this._certificates = (value || []).map(val => new ProductGallery(val, this));
        }

        addCertificate(certificate) {
            if (!this._certificates) this._certificates = [];
            let new_certificate = new ProductGallery(certificate, this);
            this._certificates.push(new_certificate);
            return new_certificate;
        }

        removeCertificate(index) {
            this._certificates.splice(index, 1);
        }

        get catalogs() {
            return this._catalogs || [];
        }

        set catalogs(value) {
            this._catalogs = (value || []).map(val => new ProductGallery(val, this));
        }

        addCatalog(catalog) {
            if (!this._catalogs) this._catalogs = [];
            let new_catalog = new ProductGallery(catalog, this);
            this._catalogs.push(new_catalog);
            return new_catalog;
        }

        removeCatalog(index) {
            this._catalogs.splice(index, 1);
        }

        get submit_data() {
            let data = {
                title: this.title,
                description: this.description,
                content: this.content,
                production_process_content: this.production_process_content,
                certificate_content: this.certificate_content,
                catalog_content: this.catalog_content,
            }

            data = jsonToFormData(data);

            let image = this.image.submit_data;

            if (image) data.append('image', image);

            this.galleries.forEach((g, i) => {
                if (g.id) data.append(`galleries[${i}][id]`, g.id);
                let gallery = g.image.submit_data;
                if (gallery) data.append(`galleries[${i}][image]`, gallery);
                else data.append(`galleries[${i}][image_obj]`, g.id);
            })

            this.certificates.forEach((c, i) => {
                if (c.id) data.append(`certificates[${i}][id]`, c.id);
                let certificate = c.image.submit_data;
                if (certificate) data.append(`certificates[${i}][image]`, certificate);
                else data.append(`certificates[${i}][image_obj]`, c.id);
            })

            this.catalogs.forEach((c, i) => {
                if (c.id) data.append(`catalogs[${i}][id]`, c.id);
                let catalog = c.image.submit_data;
                if (catalog) data.append(`catalogs[${i}][image]`, catalog);
                else data.append(`catalogs[${i}][image_obj]`, c.id);
            })

            return data;
        }
    }
</script>