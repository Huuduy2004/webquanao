<form action="{{ route('theme.change') }}" method="POST">
    @csrf
    <input type="hidden" name="theme" value="light">
    <button type="submit">Light Theme</button>
</form>

<form action="{{ route('theme.change') }}" method="POST">
    @csrf
    <input type="hidden" name="theme" value="dark">
    <button type="submit">Dark Theme</button>
</form>