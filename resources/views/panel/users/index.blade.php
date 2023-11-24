@extends('panel.layout.app')
@section('title', 'Users')


@section('content')



    <!-- end row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="">
                <div class="table-responsive">
                    <table class="table project-list-table table-nowrap align-middle table-borderless">
                        <thead>
                        <tr>
                            <th scope="col">First & last name</th>
                            <th scope="col">Role</th>
                            <th scope="col">Email</th>
                            <th scope="col">Registered date</th>
                            <th scope="col" style="width: 200px;">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @if($users && $users->count() >0)
                            @foreach($users as $user)
                                <tr>

                                    <td>

                                        @if($user)
                                            <img src="{{asset('uploads/'.$user->avatar)}}"
                                                 alt=""
                                                 class="avatar-sm rounded-circle me-2">
                                        @else
                                            <img src="{{asset('/panel/borex/assets/images/users/nophoto.png')}}"
                                                 alt=""
                                                 class="avatar-sm rounded-circle me-2">
                                        @endif
                                        {{$user->name}} {{$user->last_name}}
                                    </td>
                                    <td><span class="badge badge-soft-success text-success mb-0 fw-bold">{{$user->role->name}}</span></td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a href="{{route('panel.user.edit', $user)}}"
                                                   data-bs-toggle="tooltip"
                                                   data-bs-placement="top"
                                                   title="Edit" class="px-2 text-primary">
                                                    <i class="bx bx-pencil font-size-18"></i>
                                                </a>
                                            </li>

                                        </ul>
                                    </td>
                                </tr>
                            @endforeach

                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row g-0 align-items-center pb-4">

        <div class="col-sm-12">
            <div class="float-sm-end">
                <ul class="pagination mb-sm-0">
                    <li class="page-item disabled">
                        <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                    </li>
                    <li class="page-item active">
                        <a href="#" class="page-link">1</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">2</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">3</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">4</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">5</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
