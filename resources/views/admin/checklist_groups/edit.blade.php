@extends('layouts.app')

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('partials.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('partials.topbar')
                <!-- End of Topbar -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="fade-in">
                        <!-- Page Heading -->
                        <h1 class="h3 mb-4 text-gray-800">{{ __('Edit Checklist group') }}</h1>

                        <form action="{{ route('admin.checklist_groups.update', $checklistGroup->id ) }}" method="POST" class="gy-2 gx-3 align-items-center" >
                            @csrf
                            @method('PUT')
                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-body row">
                                    <div class="col-12 mb-3">
                                        <label for="formGroupExampleInput" class="form-label">{{ __('Name') }}</label>
                                        <input value="{{ $checklistGroup->name }}" type="text" class="form-control" name="name" id="formGroupExampleInput"  ">

                                    </div>
                                    <div class="col-12 text-right">
                                        <button type="submit" class="btn btn-primary ">{{ __('Seve') }}</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                        <div class="col-12">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">{{ __('Delete') }}</button>
                        </div>


                    </div>


                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('partials.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    <!-- Delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Are you shure ?') }} </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">{{ __('Select "Delete" below if you are ready to end your current session.') }} </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">{{ __('Cancel') }}</button>
                    <form id="delete-form" action="{{ route('admin.checklist_groups.destroy', $checklistGroup->id) }}"  method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            {{ __('Delete') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection







