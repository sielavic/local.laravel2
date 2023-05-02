<!DOCTYPE html>
<html lang="en">
<form id="comment" action="{{ route('guestbook.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="inputName">Имя:</label>
        <input type="text" class="form-control" id="inputName" name="name" placeholder="Ваше имя"
               value="{{ old('name') }}" required>{{--        получаем старое значение ввода--}}
        @error('name')
        <div class="alert alert-danger my-2">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="inputMessage">Сообщение:</label>
        <textarea class="form-control" id="inputMessage" name="message" rows="5" placeholder="Ваше сообщение"
                  required>{{ old('message') }}</textarea>{{--        получаем старое значение ввода--}}
        @error('message')
        <div class="alert alert-danger my-2">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
{{--        {!! NoCaptcha::renderJs() !!}--}}
{{--        {!! NoCaptcha::display() !!}--}}

        <script src="https://www.google.com/recaptcha/api.js"></script>
        <div class="g-recaptcha" data-sitekey="6LcBgsclAAAAAL4B0PCa8GtQU8dC9qaWGjw94dLP"></div>
        @error('g-recaptcha-response')
        <div class="alert alert-danger my-2">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="g-recaptcha btn btn-primary"
            data-sitekey="6LcBgsclAAAAAL4B0PCa8GtQU8dC9qaWGjw94dLP"
            data-callback='onSubmit'
            data-action='submit' >Отправить</button>
</form>
</html>
<script>

        function onSubmit(token) {
        document.getElementById("comment").submit();
    }

</script>
