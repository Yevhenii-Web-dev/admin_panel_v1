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
                @if ($errors->storetask->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->storetask->all() as $error)
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

                        <form action="{{ route('admin.checklists.tasks.update', [$checklist->id, $task->id] ) }}"
                              method="POST" class="gy-2 gx-3 align-items-center">
                            @csrf
                            @method('PUT')
                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-body row">
                                    <div class="col-12 mb-3">
                                        <label for="formGroupExampleInput" class="form-label">{{ __('Name') }}</label>
                                        <input value="{{ $task->name }}" type="text" class="form-control" name="name"
                                               id="formGroupExampleInput">
                                        <label for="formGroupExampleInput"
                                               class="form-label mt-3">{{ __('Description') }}</label>
                                        <textarea rows="4" class="form-control" name="description"
                                                  id="task-textarea">{{ $task->description }}</textarea>
                                    </div>
                                    <div class="col-12 text-right">
                                        <button type="submit" class="btn btn-primary ">{{ __('Seve') }}</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                        <div class="col-12">
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#deleteModal">{{ __('Delete') }}</button>
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
@endsection


@section('scripts')
    <script type="text/javascript">
        ClassicEditor
            .create(document.querySelector('#task-textarea'))
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection




