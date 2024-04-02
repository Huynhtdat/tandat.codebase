<div class="col-12 col-md-3">
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Đăng') }}
        </div>
        <div class="card-body p-2">
            <x-button.submit :title="__('Thêm')" />
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            @lang('category')
        </div>
        <div class="card-body">
            <x-select name="categories_id[]" class="select2-bs5-ajax" :data-url="route('admin.search.select.category')" :multiple="true"></x-select>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            {{ __('Avatar') }}
        </div>
        <div class="card-body p-2">
            <x-input.image-ckfinder :value="old('image')" name="image" showImage="Image" />
        </div>
    </div>
</div>
