@extends('layouts.app')

@section('inline_css')
    @vite(['resources/js/plugins/toastr/toastr.min.css'])
@endsection

@section('page_title')
    {{ __('labels.projects') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">{{ __('labels.projects') }}</li>
@endsection

@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('labels.projects') }}</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 20%">
                            {{ __('labels.project') }}
                        </th>
                        <th style="width: 15%">
                            {{ __('labels.project_plan_effort') }}
                        </th>
                        <th style="width: 15%">
                            {{ __('labels.project_actual_effort') }}
                        </th>
                        <th>
                            {{ __('labels.project_start_date') }}
                        </th>
                        <th style="width: 8%" class="text-center">
                            {{ __('labels.project_end_date') }}
                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>
                                {{ $project->id }}
                            </td>
                            <td>
                                <a>
                                    {{ $project->name }}
                                </a>
                                <br />
                                <small>
                                    {{ $project->description }}
                                </small>
                            </td>
                            <td>
                                {{ rtrim(rtrim(number_format($project->estimated_budget / 24 / 22, 3), '0'), '.') }}
                                {{ __('units.mm') }} - 
                                {{ rtrim(rtrim(number_format($project->estimated_budget / 24, 2), '0'), '.') }}
                                {{ __('units.md') }} - 
                                {{ rtrim(rtrim(number_format($project->estimated_budget, 1), '0'), '.') }}
                                {{ __('units.hours') }}
                            </td>
                            <td>
                                {{ rtrim(rtrim(number_format($project->total_actual_effort / 24 / 22, 3), '0'), '.') }}
                                {{ __('units.mm') }} - 
                                {{ rtrim(rtrim(number_format($project->total_actual_effort / 24, 2), '0'), '.') }}
                                {{ __('units.md') }} - 
                                {{ rtrim(rtrim(number_format($project->total_actual_effort, 1), '0'), '.') }}
                                {{ __('units.hours') }}
                            </td>
                            <td>
                                {{ $project->start_date?->format('Y-m-d') ?? 'N/A' }}
                            </td>
                            <td class="project-state">
                                {{ $project->end_date?->format('Y-m-d') ?? 'N/A' }}
                            </td>
                            <td class="text-center">
                                @if ($project->trashed())
                                    <!-- Nếu tenant đã xóa mềm -->
                                    <form method="POST" action="{{ route('projects.restore', $project->id) }}">
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-success btn-sm">{{ __('labels.restore') }}</button>
                                    </form>
                                @else
                                    <a class="btn btn-primary btn-sm" href="{{ route('projects.show', $project->id) }}">
                                        <i class="fas fa-folder">
                                        </i>
                                        {{ __('labels.view') }}
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{ route('projects.edit', $project->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        {{ __('labels.edit') }}
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#" data-toggle="modal"
                                        data-target="#confirmDeleteModal" data-project-id="{{ $project->id }}"
                                        data-project-name="{{ $project->name }}">
                                        <i class="fas fa-trash">
                                        </i>
                                        {{ __('labels.delete') }}
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer d-flex justify-content-between align-items-center" style="padding: 0.5rem 1rem;">
            <div class="d-flex">
                {!! __('labels.showing_entries', [
                    'start' => $projects->firstItem(),
                    'end' => $projects->lastItem(),
                    'total' => $projects->total(),
                ]) !!}
            </div>
            <div class="pagination-wrapper ml-auto">
                {{ $projects->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
    <!-- /.card -->
    <!-- Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('labels.confirm_delete_project') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{!! __('labels.confirm_delete_project_message') !!}</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light"
                        data-dismiss="modal">{{ __('labels.cancel') }}</button>
                    <form method="POST" id="deleteProjectForm">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-light">{{ __('labels.delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('inline_js')
    @vite(['resources/js/plugins/toastr/toastr.min.js'])
@endsection

@section('custom_inline_js')
    <script>
        $('#confirmDeleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Nút được click để mở modal
            var projectId = button.data('project-id'); // Lấy ID của project
            var projectName = button.data('project-name'); // Lấy tên của project

            var modal = $(this);
            modal.find('#projectName').text(projectName); // Hiển thị tên project
            var deleteUrl = '/projects/' + projectId;
            modal.find('#deleteProjectForm').attr('action', deleteUrl); // Cập nhật URL trong action
        });

        @if (session('success'))
            $(function() {
                toastr.success("{{ session('success') }}");
            });
        @endif
    </script>
@endsection
