
<div class="col-12 col-md-9">
    <div class="card">
        <div class="card-header justify-content-center">
            <h2 class="mb-0">{{ __('Thông tin thành viên') }}</h2>
        </div>
        <div class="row card-body">
            <!-- title -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Tiêu đề') }}:</label>
                    <x-input name="title" :value="old('title')" :required="true"
                        :placeholder="__('Tiêu đề')" />
                </div>
            </div>
            <!-- Slug -->

            <!-- excerpt -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Đoạn trích ngắn') }}:</label>
                    <x-input name="excerpt" :value="old('excerpt')" :required="true"
                        :placeholder="__('Đoạn trích ngắn')" />
                </div>
            </div>
            <!-- content -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Nội dung') }}:</label>
                    <textarea name="content" class="ckeditor visually-hidden">{{ old('content') }}</textarea>
                </div>
            </div>

            <!-- Status -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Status') }}:</label>
                    <x-select name="status" :required="true">
                        <x-option value="" :title="__('Chọn status')" />
                        @foreach ($status as $key => $value)
                            <x-option :value="$key" :title="__($value)" />
                        @endforeach
                    </x-select>
                </div>
            </div>

        </div>
    </div>
</div>
