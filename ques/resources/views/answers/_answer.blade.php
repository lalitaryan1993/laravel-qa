<div class="media post">
    <div class="d-flex flex-column vote-controls">

        @include('shared._vote',[
            'model' => $answer
            ])

    </div>


    <div class="media-body">
        {!! $answer->body_html !!}

        <div class="row">
            <div class="col-4">
                <div class="ml-auto">
                    {{-- Using Policies --}}
                        @can('update', $answer)
                        <a href="{{ route('questions.answers.edit', [$question->id, $answer->id]) }}" class="btn btn-sm btn-outline-info">Edit</a>
                        @endcan
                        @can('delete', $answer)
                    <form class="d-inline" action="{{ route('questions.answers.destroy', [$question->id, $answer->id]) }}" method="post">
                    @method('DELETE')
                    @csrf
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this answer')">Delete</button>
                    </form>
                    {{-- @endif --}}
                    @endcan

                </div>

            </div>
            <div class="col-4"></div>
            <div class="col-4">
                {{-- @include('shared._author', [
                    'model' => $answer,
                    'label' => 'answered'
                ]) --}}
                {{-- now using vuejs. --}}
                <user-info :model="{{ $answer }}" label="Answered"></user-info>
                </div>

        </div>


    </div>
</div>
