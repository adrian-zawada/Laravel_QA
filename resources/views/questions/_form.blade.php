@csrf
<div class="form-group">
    <label for="question-title">Question Title</label>
<input type="text" name="title" id="question-title" value="{{ old('title') }}" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}">

    @if ($errors->has('title'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('title') }}</strong>
        </div>
    @endif
</div>
<div class="form-group">
    <label for="question-title">Explain your question</label>
<textarea name="body" id="question-body" cols="30" rows="10" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}">{{ old('body') }}</textarea>
    @if ($errors->has('body'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('body') }}</strong>
        </div>
    @endif
</div>
<div class="form-group">
    <button type="submit" class="btn btn-outline-primary btn-lg">{{ $buttonText }}</button>
</div>