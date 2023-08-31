<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="antialiased bg-gray-100">
    <div class="max-w-5xl mx-auto p-8">
        <h1 class="text-3xl font-semibold mb-6">List of OWASP Vulnerabilities and Examples</h1>
        <ol class="list-decimal pl-8 space-y-4">
            <li>
                <p class="font-semibold mb-1">A01:2021-Broken Access Control:</p>
                <p class="mb-2"><span class="font-medium">Issue:</span> The showProfile function directly fetches user
                    details based on user ID without proper authentication or authorization.</p>
                <p class="mb-4"><span class="font-medium">Exploit:</span> Anyone can view any user's profile by
                    manipulating the user ID in the URL.</p>
                <p class="mb-4"><span class="font-medium">Solution:</span> Use Laravel's built-in authentication and
                    authorization functionality to restrict access to the showProfile function.</p>
                <p class="mb-4"><span class="font-medium">Example:</span> <a href="/profile/1">/profile/1</a>
            </li>
            <li>
                <p class="font-semibold mb-1">A1 - Pt2:2021-Cross-Site Scripting (XSS):</p>
                <p class="mb-2"><span class="font-medium">Issue:</span> The application doesn't sanitize
                    user inputs, allowing for malicious scripts to execute in another user's browser.</p>
                <p class="mb-4"><span class="font-medium">Exploit:</span> Attackers can input malicious scripts which,
                    when viewed by other users, execute in their browsers to steal data or impersonate them.</p>
                <p class="mb-4"><span class="font-medium">Solution:</span> Sanitize and validate user inputs. Use
                    Laravel's built-in escaping methods and avoid displaying raw user data.</p>
                <p><span class="font-medium">Incorrect Approach:</span></p>
                <pre class="bg-gray-200 p-2 rounded"><code>echo $user_input;</code></pre>
                <p><span class="font-medium">Correct Approach:</span></p>
                <pre class="bg-gray-200 p-2 rounded"><code>echo e($user_input);</code></pre>
                <p class="mb-4"><span class="font-medium">Example:</span> <a href="/xss">/xss</a>
            </li>
            <li>
                <p class="font-semibold mb-1">A02:2021-Cryptographic Failures:</p>
                <p class="mb-2"><span class="font-medium">Issue:</span> Passwords are stored and checked in plaintext.
                </p>
                <p class="mb-4"><span class="font-medium">Fix:</span> Use Laravel's built-in hashing functionality to
                    store and verify passwords.</p>
                {{-- example --}}
                <p><span class="font-medium">Example:</span></p>
                <pre class="bg-gray-200 p-2 rounded"><code>if($input_password == $user->password) { /* wrong way */ }
if(Hash::check($input_password, $user->password)) { /* right way */ }</code></pre>
            </li>
            <li>
                <p class="font-semibold mb-1">A03:2021-Injection:</p>
                <p class="mb-2"><span class="font-medium">Issue:</span> The login function uses raw SQL queries to
                    fetch user details from the database.</p>
                <p class="mb-4"><span class="font-medium">Exploit:</span> An attacker can inject SQL code into the
                    username and password fields to bypass authentication.</p>
                <p class="mb-4"><span class="font-medium">Fix:</span> Use Laravel's built-in query builder or Eloquent
                    ORM to fetch user details from the database.</p>
                <p><span class="font-medium">Bad Example:</span></p>
                <pre class="bg-gray-200 p-2 rounded"><code>$users = DB::select('SELECT * FROM users WHERE username = ' . $input_username);</code></pre>
                <p><span class="font-medium">Good Example:</span></p>
                <pre class="bg-gray-200 p-2 rounded"><code>$users = DB::table('users')->where('username', $input_username)->get();</code></pre>
                <p class="mb-4"><span class="font-medium">Real Example:</span> <a href="/login">/login</a>

            </li>
            <li>
                <p class="font-semibold mb-1">A04:2021-Insecure Design:</p>
                <p class="mb-2"><span class="font-medium">Issue:</span> The login function uses the username field to
                    fetch user details from the database.</p>
                <p class="mb-4"><span class="font-medium">Exploit:</span> An attacker can bypass authentication by
                    guessing the username of a valid user.</p>
                <p class="mb-4"><span class="font-medium">Fix:</span> Use the email field to fetch user details from
                    the database.</p>

            </li>
            <li>
                <p class="font-semibold mb-1">A05:2021-Security Misconfiguration:</p>
                <p class="mb-2"><span class="font-medium">Issue:</span> The application is running in debug mode.</p>
                <p class="mb-4"><span class="font-medium">Exploit:</span> An attacker can view sensitive information
                    such as environment variables and stack traces.</p>
                <p class="mb-4"><span class="font-medium">Fix:</span> Set APP_DEBUG=false in the .env file.</p>
            </li>
            <li>
                <p class="font-semibold mb-1">A06:2021-Vulnerable and Outdated Components:</p>
                <p class="mb-2"><span class="font-medium">Issue:</span> The application is using an outdated version
                    of Laravel.</p>
                <p class="mb-4"><span class="font-medium">Exploit:</span> An attacker can exploit known
                    vulnerabilities in the outdated version of Laravel.</p>
                <p class="mb-4"><span class="font-medium">Fix:</span> Update Laravel to the latest version.</p>
            </li>
            <li>
                <p class="font-semibold mb-1">A07:2021-Identification and Authentication Failures:</p>
                <p class="mb-2"><span class="font-medium">Issue:</span> The login function does not use CSRF tokens.
                </p>
                <p class="mb-4"><span class="font-medium">Exploit:</span> An attacker can perform a CSRF attack to
                    bypass authentication.</p>
                <p class="mb-4"><span class="font-medium">Fix:</span> Use Laravel's built-in CSRF protection.</p>
                <p><span class="font-medium">Example:</span></p>
                <pre class="bg-gray-200 p-2 rounded"><code>&lt;form method="post" action="/login"&gt;
@ csrf
&lt;!-- Other form fields --&gt;
&lt;/form&gt;</code></pre>

            </li>
            <li>
                <p class="font-semibold mb-1">A08:2021-Software and Data Integrity Failures:</p>
                <p class="mb-2"><span class="font-medium">Issue:</span> The application is using an outdated version
                    of PHP.</p>
                <p class="mb-4"><span class="font-medium">Exploit:</span> An attacker can exploit known
                    vulnerabilities in the outdated version of PHP.</p>
                <p class="mb-4"><span class="font-medium">Fix:</span> Update PHP to the latest version.</p>
            </li>
            <li>
                <p class="font-semibold mb-1">A09:2021-Security Logging and Monitoring Failures:</p>
                <p class="mb-2"><span class="font-medium">Issue:</span> The application is not logging any security
                    events.</p>
                <p class="mb-4"><span class="font-medium">Exploit:</span> An attacker can perform malicious
                    activities
                    without being detected.</p>
                <p class="mb-4"><span class="font-medium">Fix:</span> Use Laravel's built-in logging functionality
                    to
                    log security events.</p>
            </li>
            <li>
                <p class="font-semibold mb-1">A10:2021-Server-Side Request Forgery:</p>
                <p class="mb-2"><span class="font-medium">Issue:</span> The application uses the file_get_contents
                    function to fetch the contents of a URL.</p>
                <p class="mb-4"><span class="font-medium">Exploit:</span> An attacker can perform a SSRF attack to
                    fetch the contents of internal URLs.</p>
                <p class="mb-4"><span class="font-medium">Fix:</span> Use Laravel's built-in HTTP client to fetch
                    the
                    contents of a URL.</p>
                <p><span class="font-medium">Bad Example:</span></p>
                <pre class="bg-gray-200 p-2 rounded"><code>$contents = file_get_contents($url);</code></pre>
                <p><span class="font-medium">Good Example:</span></p>
                <pre class="bg-gray-200 p-2 rounded"><code>$response = Http::get($url);
$contents = $response->body();</code></pre>
            </li>


        </ol>
    </div>
</body>

</html>
