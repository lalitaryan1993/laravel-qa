<div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{ $answersCount. " ". Str::plural('Answer', $answersCount) }}</h2>
                    </div>
                    <hr>

                    @include('layouts._messages')

                    @foreach ($answers as $answer)
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a href="" class="vote-up" title="This answer is useful">
                                <i class="fas fa-caret-up fa-2x" aria-hidden="true"></i>
                            </a>
                            <span class="votes-count">12</span>
                            <a title="This answer is not useful" class="vote-down off">
                                <i class="fas fa-caret-down fa-2x" aria-hidden="true"></i>
                            </a>
                            <a class="vote-accepted mt-2" title="Mark this answer as best answer">
                                <i class="fas fa-check fa-2x" aria-hidden="true"></i>

                            </a>

                        </div>


                        <div class="media-body">
                            {!! $answer->body_html !!}
                            <div class="float-right">
                                <span class="text-muted">Answered {{$answer->created_date }} </span>
                                <div class="media mt-2">
                                    <a href="{{ $answer->user->url }}" class="pr-2">
                                        <img src="{{ $answer->user->avatar }}" alt="">
                                    </a>
                                    <div class="media-body mt-1">
                                    <a href="{{ $answer->user->url }}">
                                        {{$answer->user->name}}
                                    </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
