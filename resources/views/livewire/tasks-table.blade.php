<table class="table table-bordered dataTable" id="dataTable" role="grid"
       aria-describedby="dataTable_info" style="width: 100%;"
       width="100%" cellspacing="0" wire:sortable="updateTaskOrder">
    <thead>
    <tr role="row">
        <th class="sorting sorting_asc" tabindex="0"
            aria-controls="dataTable" rowspan="1" colspan="1"
            style="width: 271px;" aria-sort="ascending"
            aria-label="Name: activate to sort column descending">Name
        </th>
        <th class="sorting" tabindex="0" aria-controls="dataTable"
            rowspan="1" colspan="1" style="width: 403px;"
            aria-label="Position: activate to sort column ascending">
            Description
        </th>
        <th class="sorting" tabindex="0" aria-controls="dataTable"
            rowspan="1" colspan="1" style="width: 150px;"
            aria-label="Position: activate to sort column ascending">
            Actions
        </th>


    </tr>
    </thead>

    <tbody>

    @forelse($tasks as $task)
        <tr wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}">
            <td>{{ $task->name }}</td>
            <td>{!! $task->description !!}</td>
            <td>
                <a href="{{ route('admin.checklists.tasks.edit', [ $checklist->id, $task->id]) }}"
                   class="btn btn-secondary btn-sm"
                   data-dismiss="modal">
                    {{ __('Edit') }}
                </a>
                <button type="button" class="btn btn-danger btn-sm"
                        data-toggle="modal"
                        data-target="#deleteModal-2">{{ __('Delete') }}</button>
            </td>
        </tr>
    @empty
        <tr>
            <td>{{ __("Checklist don't have any tasks" ) }}</td>
            <td>{{ __("Checklist don't have any tasks" ) }}</td>
            <td>{{ __("Checklist don't have any tasks" ) }}</td>
        </tr>
    @endforelse


    </tbody>
</table>



