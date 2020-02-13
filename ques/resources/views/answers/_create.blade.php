<div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3>Your Answer</h3>
                    </div>
                    <hr>

                    <form action="{{ route('questions.answers.store', $question->id) }}" method="post">
                        @csrf

                        <div class="form-group">
                          {{-- <label for=""></label> --}}
                          <textarea class="form-control @error('body') is-invalid @enderror" name="body" rows="7"></textarea>
                            @error('body')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-lg">Submit</button>
                        </div>

                    </form>



                </div>
            </div>
        </div>
 </div>
