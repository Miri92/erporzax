@extends('panel.layout.app')
@section('title', 'User - Edit')


@section('content')
    <div class="row">

        <div class="col-12">

            <form method="post" action="{{ route('panel.user.update', $user) }}" enctype="multipart/form-data">


                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit User</h4>
                    </div>
                    <div class="card-body">

                        <div class="mb-3 row">
                            <label for="name" class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name"
                                       value="{{ $user->name }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="last_name" class="col-md-2 col-form-label">Last Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="last_name" id="last_name"
                                       value="{{ $user->last_name }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="email" class="col-md-2 col-form-label">E-mail</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="email" id="email"
                                       value="{{ $user->email }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password" class="col-md-2 col-form-label">Password</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="password" id="password"
                                       value="">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="confirm-password" class="col-md-2 col-form-label">Password Confirm</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="confirm-password" id="confirm-password"
                                       value="">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="mobile" class="col-md-2 col-form-label">Mobile</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="mobile" id="mobile"
                                       value="{{ $user->mobile }}">
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="avatar" class="col-md-2 col-form-label">Avatar</label>
                            <div class="col-md-10">
                                <input name="avatar"
                                       class="form-control form-control-md" id="avatar" type="file">
                                @if($user->avatar)
                                    <p>
                                        <a href="{{ url($user->avatar) }}">
                                            <img class="img-thumbnail"
                                                 style="max-width: 150px"
                                                 src="{{ url($user->avatar) }}" alt="">
                                        </a>
                                    </p>
                                @endif
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-primary w-md float-end">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>


                @csrf
            </form>

        </div>
    </div>
@endsection
