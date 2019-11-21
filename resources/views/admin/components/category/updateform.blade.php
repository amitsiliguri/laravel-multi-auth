<form action="{{ route('admin.category.store') }}" method="POST" enctype='multipart/form-data'>
  @csrf
  @method('PUT')
  <div class="form-group row">
    <div class="col-sm-2">Is enabled</div>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="isCategoryEnabled" name="enable" value="{{$category->enable}}" checked>
        <label class="form-check-label" for="isCategoryEnabled">
          Check to yes
        </label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="categoryName" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="categoryName" placeholder="Name" name="name" value="{{$category->name}}" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="categorySlug" class="col-sm-2 col-form-label">Slug</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="categorySlug" placeholder="Slug" name="slug" value="{{$category->slug}}" required>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2">Is full width Banner</div>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="isFullWidthBanner" name="full_width_banner" value="{{$category->full_width_banner}}" checked>
        <label class="form-check-label" for="isFullWidthBanner">
          Check to yes
        </label>
      </div>
    </div>
  </div>
  <div class="input-group row mb-3">
    <div class="col-sm-2" for="bannerImage">Full width Banner</div>
    <div class="col-sm-10">
        <input type="file" class="pl-1" name="banner_image" id="bannerImage" value="{{$category->banner_image}}">
        @if($category->banner_image)
          <img src="/storage/media/catalog/category/cover/{{$category->banner_image}}" alt="{{$category->name}}" class="img-fluid my-1 ml-1">
        @endIf
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2">Show short description</div>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="isShortDescription" name="show_short_description" value="{{$category->show_short_description}}">
        <label class="form-check-label" for="isShortDescription">
          Check to yes
        </label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="shortDescription" class="col-sm-2 col-form-label">Short Description</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="shortDescription" placeholder="Short Description" name="short_description" value="{{$category->short_description}}">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2">Show description</div>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="showDescription" name="show_description" value="{{$category->show_description}}">
        <label class="form-check-label" for="showDescription">
          Check to yes
        </label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="description" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="description" rows="7" name="description">{{$category->description}}</textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="metaTitle" class="col-sm-2 col-form-label">Meta title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="metaTitle" placeholder="Name" name="meta_title" value="{{$category->meta_title}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="metakeyword" class="col-sm-2 col-form-label">Meta keywords</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="metakeyword" placeholder="Slug" name="meta_keyword" value="{{$category->meta_keyword}}">
    </div>
  </div>
  <div class="input-group row mb-3">
    <div class="col-sm-2">Meta Image</div>
    <div class="col-sm-10">
        <input type="file" class="pl-1" id="metaImage" name="meta_image" value="{{$category->meta_image}}">
        @if($category->meta_image)
          <img src="/storage/media/catalog/category/meta/{{$category->meta_image}}" alt="{{$category->meta_title}}" class="img-fluid my-1 ml-1">
        @endIf
    </div>
  </div>
  <div class="form-group row">
    <label for="metaDescription" class="col-sm-2 col-form-label">Meta Description</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="metaDescription" rows="3" name="meta_description">{{$category->meta_description}}</textarea>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
  </div>
</form>
