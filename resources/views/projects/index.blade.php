@extends('layouts.main')

@section('content')

    <section>
        <div class="container">
            @if(Session::has('success_message'))
                <div class="alert alert-success">
                    <span class="bi-ok"></span>
                    {!! session('success_message') !!}

                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
            @endif

            <div class="panel panel-default">

                <div class="panel-heading clearfix">

                    <div class="pull-left">
                        <h4 class="mt-5 mb-5">Projects</h4>
                    </div>

                    <div class="btn-group btn-group-sm pull-right" role="group">
                        <a href="{{ route('projects.project.create') }}" class="btn btn-success" title="Create New Project">
                            <span class="bi-plus" aria-hidden="true"></span>
                        </a>
                    </div>

                </div>

                @if(count($projects) == 0)
                    <div class="panel-body text-center">
                        <h4>No Projects Available.</h4>
                    </div>
                @else
                <div class="panel-body panel-body-with-table">
                    <div class="table-responsive">

                        <table class="table table-striped ">
                            <thead>
                                <tr>
                                    <th>Name</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td>{{ $project->name }}</td>

                                    <td>

                                        <form method="POST" action="{!! route('projects.project.destroy', $project->id) !!}" accept-charset="UTF-8">
                                        <input name="_method" value="DELETE" type="hidden">
                                        {{ csrf_field() }}

                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                <a href="{{ route('projects.project.show', $project->id ) }}" class="btn btn-info" title="Show Project">
                                                    <span class="bi-caret-up" aria-hidden="true"></span>
                                                </a>
                                                <a href="{{ route('projects.project.edit', $project->id ) }}" class="btn btn-primary" title="Edit Project">
                                                    <span class="bi-pencil" aria-hidden="true"></span>
                                                </a>

                                                <button type="submit" class="btn btn-danger" title="Delete Project" onclick="return confirm(&quot;Click Ok to delete Project.&quot;)">
                                                    <span class="bi-trash" aria-hidden="true"></span>
                                                </button>
                                            </div>

                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

                <div class="panel-footer">
                    {!! $projects->render() !!}
                </div>

                @endif

            </div>
        <div>
    </section>
@endsection
