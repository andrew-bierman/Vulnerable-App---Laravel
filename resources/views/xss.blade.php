
<div class="container">
    <h2>Test for XSS</h2>
    <p>Please don't include something like this:</p>
    <pre class="bg-gray-200 p-2 rounded"><code>&lt;script&gt;alert('XSS')&lt;/script&gt;</code></pre>
    <form action="{{ route('xss.store') }}" method="post">
        @csrf
        <textarea name="data" rows="5" cols="40">{{ old('data') }}</textarea>
        <br/>
        <button type="submit">Submit</button>
    </form>

    <h3>Stored Data (Vulnerable):</h3>
    {!! $storedData !!}

    <h3>Stored Data (Safe):</h3>
    {{ $storedData }}
</div>

