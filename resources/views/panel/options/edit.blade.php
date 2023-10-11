@extends('panel.layout.app')
@section('title', 'Site Options')


@section('content')
    <form method="post" action="{{ route('panel.options.update', $row->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Contact detailes</h4>
                    </div>
                    <div class="card-body">

                        <div class="mb-3 row">
                            <label for="email" class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="email" id="email"
                                value="{{ $row->email }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="phone" class="col-md-2 col-form-label">phone</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="phone" id="phone"
                                       value="{{ $row->phone }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="phone_whatsap" class="col-md-2 col-form-label">Phone Whatsap</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="phone_whatsap" id="phone_whatsap"
                                       value="{{ $row->phone_whatsap }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="address" class="col-md-2 col-form-label">Address</label>
                            <div class="col-md-10">
                                <textarea
                                    name="address"
                                    class="form-control"
                                    id="address">{{ $row->address }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="map_embed" class="col-md-2 col-form-label">Map embed</label>
                            <div class="col-md-10">
                                <textarea
                                    name="map_embed"
                                    class="form-control"
                                    id="map_embed">{{ $row->map_embed }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">General</h4>
                    </div>
                    <div class="card-body">

                        <div class="mb-3 row">
                            <label for="site_title" class="col-md-3 col-form-label">Site title</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="site_title" id="site_title"
                                       value="{{ $row->site_title }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="meta_description" class="col-md-3 col-form-label">Meta description</label>
                            <div class="col-md-9">
                                <textarea
                                    name="meta_description"
                                    class="form-control"
                                    id="meta_description">{{ $row->meta_description }}</textarea>
                            </div>
                        </div>

                        {{--                        <div class="mb-3 row">--}}
                        {{--                            <label for="meta_keyword" class="col-md-3 col-form-label">Meta keywords</label>--}}
                        {{--                            <div class="col-md-9">--}}
                        {{--                                <textarea--}}
                        {{--                                    name="meta_keyword"--}}
                        {{--                                    class="form-control"--}}
                        {{--                                    id="meta_keyword">{{ $row->meta_keyword }}</textarea>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <div class="mb-3 row">
                            <label for="meta_description" class="col-md-3 col-form-label">Meta keywords</label>

                            <div class="col-md-9">
                                <label for="meta-keyword"
                                       class="form-label font-size-13 text-muted">Limited to 5
                                    values with remove button</label>
                                <input type="text"
                                       class="form-control"
                                       id="meta-keyword"
                                       name="meta_keywords"
                                       value="{{ $row->meta_keywords }}"
                                       placeholder="Enter something" />
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Logos</h4>
                    </div>
                    <div class="card-body">

                        <div class="mb-3 row">
                            <label for="favicon" class="col-md-2 col-form-label">Favicon</label>
                            <div class="col-md-10">
                                <input name="favicon"
                                       class="form-control form-control-md"
                                       id="favicon"
                                       type="file">
                                @if($row->favicon)
                                    <p>
                                        <a href="{{ url($row->favicon) }}">
                                            <img class="img-thumbnail"
                                                 style="max-width: 150px"
                                                 src="{{ url($row->favicon) }}" alt="">
                                        </a>
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="logo" class="col-md-2 col-form-label">Logo</label>
                            <div class="col-md-10">
                                <input name="logo"
                                       class="form-control form-control-md"
                                       id="logo"
                                       type="file">
                                @if($row->logo)
                                    <p>
                                        <a href="{{ url($row->logo) }}">
                                            <img class="img-thumbnail  mt-2"
                                                 style="max-width: 150px"
                                                 src="{{ url($row->logo) }}" alt="">
                                        </a>
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="logo_white" class="col-md-2 col-form-label">Logo White</label>
                            <div class="col-md-10">
                                <input name="logo_white"
                                       class="form-control form-control-md"
                                       id="logo_white"
                                       type="file">
                                @if($row->logo_white)
                                    <p class="">
                                        <a href="{{ url($row->logo_white) }}">
                                            <img class="img-thumbnail"
                                                 style="max-width: 150px"
                                                 src="{{ url($row->logo_white) }}" alt="">
                                        </a>
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="logo_social_share" class="col-md-2 col-form-label">Logo Social Share(OG image)</label>
                            <div class="col-md-10">
                                <input name="logo_social_share"
                                       class="form-control form-control-md"
                                       id="logo_social_share"
                                       type="file">
                                @if($row->logo_social_share)
                                    <p class="">
                                        <a href="{{ url($row->logo_social_share) }}">
                                            <img class="img-thumbnail"
                                                 style="max-width: 150px"
                                                 src="{{ url($row->logo_social_share) }}" alt="">
                                        </a>
                                    </p>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>


            </div>






            <div class="col-12 text-right">
                <div class="card">
                    <button type="submit"
                            class="btn btn-primary w-md float-end">Submit</button>
                </div>
            </div>

        </div>
    </form>
@endsection

@section('header-css-middle')
<link href="{{ asset('/panel/borex/assets/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('footer-js')
    <script src="{{ asset('/panel/borex/assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
{{--    <script src="{{ asset('/panel/borex/assets/js/pages/form-advanced.init.js') }}"></script>--}}

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var textRemove = new Choices(
            document.getElementById('meta-keyword'),
            {
                allowHTML: true,
                delimiter: ',',
                editItems: true,
                maxItemCount: 5,
                removeItemButton: true,
            }
        );
    });
    </script>
@endsection
