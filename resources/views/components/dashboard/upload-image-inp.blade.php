<div class="fv-column mb-5 fv-plugins-icon-container d-flex justify-content-center">
    <!--begin::Image input-->
    <div class="image-input image-input-outline" data-kt-image-input="true">

        <!-- begin :: Image preview wrapper -->
        <div class="image-input-wrapper w-125px h-125px" id="{{ $name . '_inp' }}"
            style="background-image: url('{{ $image }}')"></div>
        <!-- end   :: Image preview wrapper -->

        @if ($type === 'editable')
            <!-- begin :: Edit button -->
            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click">
                <i class="bi bi-pencil-fill fs-7"></i>

                <!-- begin :: Inputs-->
                <input type="file" name="{{ $name }}" accept="image/*" />
                <!-- end   :: Inputs-->

            </label>
            <!-- end   :: Edit button -->
        @else
            <!-- begin :: Edit button -->
            <a data-fslightbox="image" href="{{ $image }}">
                <!-- begin :: Show button -->
                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click">
                    <i class="bi bi-eye fs-7"></i>
                </label>
                <!-- end   :: Show button -->
            </a>
            <!-- end   :: Edit button -->
        @endif

    </div>
    <!--end::Image input-->
</div>

<div class="fv-plugins-message-container invalid-feedback text-center" id="{{ $name }}"></div>
