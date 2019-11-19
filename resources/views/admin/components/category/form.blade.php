<form action="{{ route('admin.category.store') }}" method="POST" enctype='multipart/form-data'>
  @csrf
  <div class="form-group row">
    <div class="col-sm-2">Is enabled</div>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="isCategoryEnabled" name="enable" value="1" checked>
        <label class="form-check-label" for="isCategoryEnabled">
          Check to yes
        </label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="categoryName" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="categoryName" placeholder="Name" name="name" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="categorySlug" class="col-sm-2 col-form-label">Slug</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="categorySlug" placeholder="Slug" name="slug" required>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2">Is full width Banner</div>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="isFullWidthBanner" name="full_width_banner" value="1" checked>
        <label class="form-check-label" for="isFullWidthBanner">
          Check to yes
        </label>
      </div>
    </div>
  </div>
  <div class="input-group row mb-3">
    <div class="col-sm-2" for="bannerImage">Full width Banner</div>
    <div class="col-sm-10">
        <input type="file" class="pl-1" name="banner_image" id="bannerImage">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2">Show short description</div>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="isShortDescription" name="show_short_description" value="1">
        <label class="form-check-label" for="isShortDescription">
          Check to yes
        </label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="shortDescription" class="col-sm-2 col-form-label">Short Description</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="shortDescription" placeholder="Short Description" name="short_description">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2">Show description</div>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="showDescription" name="show_description" value="1">
        <label class="form-check-label" for="showDescription">
          Check to yes
        </label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="description" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="description" rows="7" name="description"></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="metaTitle" class="col-sm-2 col-form-label">Meta title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="metaTitle" placeholder="Name" name="meta_title">
    </div>
  </div>
  <div class="form-group row">
    <label for="metakeyword" class="col-sm-2 col-form-label">Meta keywords</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="metakeyword" placeholder="Slug" name="meta_keyword">
    </div>
  </div>
  <div class="input-group row mb-3">
    <div class="col-sm-2">Meta Image</div>
    <div class="col-sm-10">
        <input type="file" class="pl-1" id="metaImage" name="meta_image">
    </div>
  </div>
  <div class="form-group row">
    <label for="metaDescription" class="col-sm-2 col-form-label">Meta Description</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="metaDescription" rows="3" name="meta_description"></textarea>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
  </div>
</form>
