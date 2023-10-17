@extends('panel.layout.app')
@section('title', 'Menu')

@section('content')

    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="mb-3">
                <h5 class="card-title">Menu List</h5>
            </div>
        </div>

        <div class="col-md-6">
            <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">

                <div>
                    <a href="#"
                       data-bs-toggle="modal"
                       data-bs-target="#myModal"
                       class="btn btn-primary">
                        <i class="bx bx-plus me-1"></i>
                        Add New
                    </a>


                    {{-- dont remove this edit button--}}
                    <a href="#"
                       style="display: none"
                       data-bs-toggle="modal"
                       data-bs-target="#myModalEditMenuItem"
                       id="editMenuOpenModalBtn"
                       class="btn btn-primary">
                        <i class="bx bx-plus me-1"></i>
                        Edit
                    </a>
                </div>


            </div>

        </div>
    </div>
{{--    end header--}}
    <form action="{{route('panel.menu.store')}}" method="post">
        @csrf

        <div class="card">
                <div class="row">
    {{--                menu list--}}
                    <div class="col-md-6">
                        <div class="p-4">
                            <div class="dd nestable">
                                <ol class="dd-list">

                                    <!--- Initial Menu Items --->

                                    @if($rows && $rows->count() > 0)
                                        @foreach($rows as $row)
                                            <li class="dd-item"
                                                data-id="{{$row->id}}"
                                                data-name="{{$row->name}}"
                                                data-slug="{{$row->slug}}"
                                                data-new="0"
                                                data-deleted="0">
                                                <div class="dd-handle">{{$row->name}}</div>
                                                <span class="button-delete btn btn-default btn-xs pull-right"
                                                      data-owner-id="{{$row->id}}"
                                                >
                                                <i class="fas fa-times"></i>
                                            </span>
                                                <span class="button-edit btn btn-default btn-xs pull-right"
                                                      data-owner-id="{{$row->id}}">
                                                <i class="fas fa-edit"></i>
                                            </span>

                                                @if($row->children)
                                                    @include('panel.menu.children', ["children"=>$row->children])
                                                @endif
                                            </li>
                                        @endforeach
                                    @endif




                                    <!--------------------------->

                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="p-4">
                            <h2 class="text-center">Output:</h2>
                            <textarea class="form-control" name="json_output" id="json-output" rows="5"></textarea>
                        </div>
                    </div>
                </div>
        </div>
        <div class="card">
            <button type="submit" class="btn btn-primary w-md float-end">ssSubmit</button>
        </div>
    </form>





    <!-- modal add menu item -->
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="form-inline" id="menu-add">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Add new menu item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label for="addInputName">Name</label>
                            <input type="text" class="form-control" id="addInputName" placeholder="Item name" required>
                        </div>
                        <div class="form-group">
                            <label for="addInputSlug">Slug</label>
                            <input type="text" class="form-control" id="addInputSlug" placeholder="item-slug" required>
                        </div>
{{--                        <button class="btn btn-info" id="addButton">Add</button>--}}

                </div>
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit"
                            id="addButton"
                            class="btn btn-primary">Save changes</button>
                </div>

            </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- modal edit menu item -->
    <div id="myModalEditMenuItem" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="" id="menu-editor" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Edit menu item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            <h3>Editing <span id="currentEditName"></span></h3>
                            <div class="form-group">
                                <label for="addInputName">Name</label>
                                <input type="text" class="form-control" id="editInputName" placeholder="Item name" required>
                            </div>
                            <div class="form-group">
                                <label for="addInputSlug">Slug</label>
                                <input type="text" class="form-control" id="editInputSlug" placeholder="item-slug">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button"
                                class="btn btn-secondary waves-effect"
                                data-bs-dismiss="modal">Close</button>
                        <button type="button"
                                id="editButton"
                                class="btn btn-primary">Save changes</button>
                    </div>

                </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('header-css-bottom')
    <link href="{{ asset('/panel/Nestable-master/style.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('footer-js-top')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


@endsection

@section('footer-js-bottom')
    <script src="{{ asset('/panel/borex/assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

    <script src="{{ asset('/panel/Nestable-master/jquery.nestable.js') }}"></script>
    <script src="{{ asset('/panel/Nestable-master/jquery.nestable++.js') }}"></script>

    <script>
        $('.dd.nestable').nestable({
            maxDepth: 3
        }).on('change', updateOutput);

    </script>

    <script>

        //jquery
        $(document).ready(function(){
            //new bootstrap.Modal($('#myModal')).show();
        });


    </script>
@endsection
