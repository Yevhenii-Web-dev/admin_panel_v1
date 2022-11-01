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
                        <h1 class="h3 mb-4 text-gray-800">{{ __('New Checklist group') }}</h1>

                        <form action="{{ route('admin.checklist_groups.store') }}" method="POST" class="gy-2 gx-3 align-items-center" >
                            @csrf
                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-body row">
                                    <div class="col-12 mb-3">
                                        <label for="formGroupExampleInput" class="form-label">{{ __('Name') }}</label>
                                        <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="{{ __('Checklist group name') }} ">

                                    </div>
                                    <div class="col-12 text-right">
                                        <button type="submit" class="btn btn-primary ">{{ __('Seve') }}</button>
                                    </div>
                                </div>
                            </div>

                        </form>

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
@endsection







