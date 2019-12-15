@csrf
<div class="form-group">
    <label for="question-title">Question Title</label>
    <input type="text" name="title" id="question-title" value="{{ old('title', $question->title) }}" class="form-control @error('title') is-invalid @enderror">
    @error('title')
    <div class="invalid-feedback">
        <strong>{{ $message }}</strong>
    </div>
    @enderror
</div>

<div class="form-group">
    <label for="question-body">Explain your question</label>
    <textarea name="body" id="question-body" rows="10" class="form-control @error('body') is-invalid @enderror">{{ old('body', $question->body) }}</textarea>
    @error('body')
    <div class="invalid-feedback">
        <strong>{{ $message }}</strong>
    </div>
    @enderror

</div>

<div class="form-group">
<button class="btn btn-outline-primary btn-lg" type="submit">{{ $buttonText }}</button>
</div>
