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
                        <h2 class="h3 mb-4 text-gray-800">{{ __('Edit Checklist group') }}</h2>

                        <form
                            action="{{ route('admin.checklist_groups.checklists.update', [$checklistGroup->id, $checklist->id] ) }}"
                            method="POST" class="gy-2 gx-3 align-items-center">
                            @csrf
                            @method('PUT')
                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-body row">
                                    <div class="col-12 mb-3">
                                        <label for="formGroupExampleInput" class="form-label">{{ __('Name') }}</label>
                                        <input value="{{ $checklist->name }}" type="text" class="form-control"
                                               name="name" id="formGroupExampleInput">
                                    </div>
                                    <div class="col-12 text-right">
                                        <button type="submit"
                                                class="btn btn-primary ">{{ __('Seve Cheklist') }}</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                        <div class="col-12">
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#deleteModal">{{ __('Delete') }}</button>
                        </div>
                        <hr/>

                        @if ($errors->storetask->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->storetask->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h2 class="h3 mb-4 text-gray-800">{{ __('List of Tasks') }}</h2>


                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Tasks Table </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                @livewire('tasks-table', ['checklist' => $checklist])

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('admin.checklists.tasks.store', [ $checklist->id] ) }}" method="POST"
                              class="gy-2 gx-3 align-items-center">
                            @csrf
                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-body row">
                                    <div class="col-12 mb-3">
                                        <label for="formGroupExampleInput" class="form-label">{{ __('Name') }}</label>
                                        <input value="{{ old('name') }}" type="text" class="form-control" name="name"
                                               id="formGroupExampleInput">
                                        <label for="formGroupExampleInput"
                                               class="form-label mt-3">{{ __('Description') }}</label>
                                        <textarea rows="4" class="form-control" name="description"
                                                  id="task-textarea">{{ old('description') }}</textarea>
                                    </div>
                                    <div class="col-12 text-right">
                                        <button type="submit" class="btn btn-primary ">{{ __('Save Task') }}</button>
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
                <div
                    class="modal-body">{{ __('Select "Delete" below if you are ready to end your current session.') }} </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">{{ __('Cancel') }}</button>
                    <form
                        id="delete-form"
                        action="{{ route('admin.checklist_groups.checklists.destroy', [$checklistGroup->id, $checklist->id]) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            {{ __('Delete Checklist') }}
                        </button>
                    </form>
                    </hr>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal - 2-->
    <div class="modal fade" id="deleteModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Are you shure ?') }} </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div
                    class="modal-body">{{ __('Select "Delete" below if you are ready to delete to the end task') }} </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">{{ __('Cancel') }}</button>
                    @foreach($checklist->tasks as $task)
                        <form
                            class="delete-form2"
                            action="{{ route('admin.checklists.tasks.destroy', [ $checklist->id, $task->id]) }}"
                            method="POST">
                            @endforeach
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                {{ __('Delete Task') }}
                            </button>
                        </form>
                </div>
            </div>
        </div>
    </div>
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







