@extends('dashboard.partials.master')
@push('styles')
    <link href="{{ asset('assets/dashboard/css/datatables' . (isDarkMode() ? '.dark' : '') . '.bundle.css') }}"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ asset('assets/dashboard/plugins/custom/datatables/datatables.bundle' . (isArabic() ? '.rtl' : '') . '.css') }}"
        rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <div class="container">
        <h3 class="mb-4">{{ __('Update Numbers') }}</h3>

        <form id="crud_form" class="ajax-form" action="{{ route('dashboard.numbers.update', 1) }}" method="post"
            data-success-callback="onAjaxSuccess" data-error-callback="onAjaxError">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-4 mb-4">
                    <label for="Parents_experiment" class="form-label">{{ __('Parents Experiment') }}</label>
                    <input type="number" name="Parents_experiment" class="form-control" id="Parents_experiment"
                        value="{{ old('Parents_experiment', $ourNumber->Parents_experiment) }}">
                </div>

                <div class="col-md-4 mb-4">
                    <label for="Traning_houres" class="form-label">{{ __('Training Hours') }}</label>
                    <input type="number" name="Traning_houres" class="form-control" id="Traning_houres"
                        value="{{ old('Traning_houres', $ourNumber->Traning_houres) }}">
                </div>

                <div class="col-md-4 mb-4">
                    <label for="Our_heroes" class="form-label">{{ __('Our Heroes') }}</label>
                    <input type="number" name="Our_heroes" class="form-control" id="Our_heroes"
                        value="{{ old('Our_heroes', $ourNumber->Our_heroes) }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <label for="Heroes_rate" class="form-label">{{ __('Heroes Rate') }}</label>
                    <input type="number" name="Heroes_rate" class="form-control" id="Heroes_rate"
                        value="{{ old('Heroes_rate', $ourNumber->Heroes_rate) }}">
                </div>

                <div class="col-md-4 mb-4">
                    <label for="Lessons" class="form-label">{{ __('Lessons') }}</label>
                    <input type="number" name="Lessons" class="form-control" id="Lessons"
                        value="{{ old('Lessons', $ourNumber->Lessons) }}">
                </div>

                <div class="col-md-4 mb-4">
                    <label for="Puzzles" class="form-label">{{ __('Puzzles') }}</label>
                    <input type="number" name="Puzzles" class="form-control" id="Puzzles"
                        value="{{ old('Puzzles', $ourNumber->Puzzles) }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <label for="Stars" class="form-label">{{ __('Stars') }}</label>
                    <input type="number" name="Stars" class="form-control" id="Stars"
                        value="{{ old('Stars', $ourNumber->Stars) }}">
                </div>

                <div class="col-md-4 mb-4">
                    <label for="Online" class="form-label">{{ __('Online') }}</label>
                    <input type="number" name="Online" class="form-control" id="Online"
                        value="{{ old('Online', $ourNumber->Online) }}">
                </div>

                <div class="col-md-4 mb-4">
                    <label for="Kids_Played" class="form-label">{{ __('Kids Played') }}</label>
                    <input type="number" name="Kids_Played" class="form-control" id="Kids_Played"
                        value="{{ old('Kids_Played', $ourNumber->Kids_Played) }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <label for="Games" class="form-label">{{ __('Games') }}</label>
                    <input type="number" name="Games" class="form-control" id="Games"
                        value="{{ old('Games', $ourNumber->Games) }}">
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">
                    <span class="indicator-label">{{ __('update') }}</span>
                    <span class="indicator-progress">
                        {{ __('Please wait...') }} <span
                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                </button>
            </div>
        </form>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/dashboard/js/global/datatable-config.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/datatables/cities.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/global/crud-operations.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#add_btn").click(function(e) {
                e.preventDefault();

                $("#form_title").text(__('Add new city'));
                $("[name='_method']").remove();
                $("#crud_form").trigger('reset');
                $("#crud_form").attr('action', `/dashboard/cities`);
            });


        });
    </script>
@endpush
