<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Dokumentasi API Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://127.0.0.1:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.10.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.10.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Cari">
    </div>

    <div id="toc">
                    <ul id="tocify-header-pendahuluan" class="tocify-header">
                <li class="tocify-item level-1" data-unique="pendahuluan">
                    <a href="#pendahuluan">Pendahuluan</a>
                </li>
                            </ul>
                    <ul id="tocify-header-autentikasi-request" class="tocify-header">
                <li class="tocify-item level-1" data-unique="autentikasi-request">
                    <a href="#autentikasi-request">Autentikasi Request</a>
                </li>
                            </ul>
                    <ul id="tocify-header-autentikasi" class="tocify-header">
                <li class="tocify-item level-1" data-unique="autentikasi">
                    <a href="#autentikasi">Autentikasi</a>
                </li>
                                    <ul id="tocify-subheader-autentikasi" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="autentikasi-POSTapi-auth-register">
                                <a href="#autentikasi-POSTapi-auth-register">Mendaftarkan user baru.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="autentikasi-POSTapi-auth-login">
                                <a href="#autentikasi-POSTapi-auth-login">Login dan mendapatkan access token.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="autentikasi-POSTapi-auth-logout">
                                <a href="#autentikasi-POSTapi-auth-logout">Logout dari user yang sedang aktif.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-kategori" class="tocify-header">
                <li class="tocify-item level-1" data-unique="kategori">
                    <a href="#kategori">Kategori</a>
                </li>
                                    <ul id="tocify-subheader-kategori" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="kategori-GETapi-categories">
                                <a href="#kategori-GETapi-categories">Menampilkan daftar kategori dengan pagination.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="kategori-POSTapi-categories">
                                <a href="#kategori-POSTapi-categories">Menyimpan kategori baru.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="kategori-PUTapi-categories--id-">
                                <a href="#kategori-PUTapi-categories--id-">Memperbarui kategori.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="kategori-DELETEapi-categories--id-">
                                <a href="#kategori-DELETEapi-categories--id-">Menghapus kategori.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-produk" class="tocify-header">
                <li class="tocify-item level-1" data-unique="produk">
                    <a href="#produk">Produk</a>
                </li>
                                    <ul id="tocify-subheader-produk" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="produk-GETapi-products">
                                <a href="#produk-GETapi-products">Menampilkan daftar produk dengan pagination dan relasi kategori.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="produk-POSTapi-products">
                                <a href="#produk-POSTapi-products">Menyimpan produk baru.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="produk-GETapi-products--id-">
                                <a href="#produk-GETapi-products--id-">Menampilkan detail produk beserta relasi kategori.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="produk-PUTapi-products--id-">
                                <a href="#produk-PUTapi-products--id-">Memperbarui produk.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="produk-DELETEapi-products--id-">
                                <a href="#produk-DELETEapi-products--id-">Menghapus produk beserta file gambarnya.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-transaksi" class="tocify-header">
                <li class="tocify-item level-1" data-unique="transaksi">
                    <a href="#transaksi">Transaksi</a>
                </li>
                                    <ul id="tocify-subheader-transaksi" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="transaksi-GETapi-transactions">
                                <a href="#transaksi-GETapi-transactions">Menampilkan daftar transaksi dengan pagination.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="transaksi-POSTapi-transactions">
                                <a href="#transaksi-POSTapi-transactions">Menyimpan transaksi baru.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="transaksi-GETapi-transactions--id-">
                                <a href="#transaksi-GETapi-transactions--id-">Menampilkan detail transaksi.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="transaksi-PUTapi-transactions--id-">
                                <a href="#transaksi-PUTapi-transactions--id-">Memperbarui status atau jumlah transaksi.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="transaksi-DELETEapi-transactions--id-">
                                <a href="#transaksi-DELETEapi-transactions--id-">Menghapus transaksi.</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">Lihat koleksi Postman</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">Lihat spesifikasi OpenAPI</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Dokumentasi didukung oleh Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Terakhir diperbarui: 05-06-2026</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="pendahuluan">Pendahuluan</h1>
<p>REST API mini e-commerce untuk kebutuhan UAS Web Service Application.</p>
<aside>
    <strong>URL Dasar</strong>: <code>http://127.0.0.1:8000</code>
</aside>
<pre><code>Dokumentasi ini menjelaskan endpoint autentikasi, kategori, dan produk untuk API mini e-commerce.

Gunakan endpoint login atau register untuk mendapatkan Bearer token, lalu kirim token tersebut ke endpoint yang dilindungi `auth:sanctum`.</code></pre>

        <h1 id="autentikasi-request">Autentikasi Request</h1>
<p>Untuk mengautentikasi request, sertakan header <strong><code>Authorization</code></strong> dengan nilai <strong><code>"Bearer {TOKEN_ANDA}"</code></strong>.</p>
<p>Semua endpoint yang membutuhkan autentikasi ditandai dengan badge <code>memerlukan autentikasi</code> pada dokumentasi di bawah ini.</p>
<p>Ambil token dari endpoint login atau register, lalu kirim sebagai header <code>Authorization: Bearer {token}</code>.</p>

        <h1 id="autentikasi">Autentikasi</h1>

    

                                <h2 id="autentikasi-POSTapi-auth-register">Mendaftarkan user baru.</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-register">
<blockquote>Contoh request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/auth/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Budi Santoso\",
    \"email\": \"budi@example.com\",
    \"password\": \"password123\",
    \"password_confirmation\": \"password123\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/auth/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Budi Santoso",
    "email": "budi@example.com",
    "password": "password123",
    "password_confirmation": "password123"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-register">
</span>
<span id="execution-results-POSTapi-auth-register" hidden>
    <blockquote>Response diterima<span
                id="execution-response-status-POSTapi-auth-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-register"
      data-empty-response-text="<Response kosong>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-register" hidden>
    <blockquote>Request gagal dengan error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-register">

Tips: Pastikan koneksi jaringan berjalan dengan baik.
Jika Anda pengelola API ini, pastikan server API sedang berjalan dan CORS sudah diaktifkan.
Anda juga bisa memeriksa console Dev Tools untuk informasi debug.</code></pre>
</span>
<form id="form-POSTapi-auth-register" data-method="POST"
      data-path="api/auth/register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-register"
                    onclick="tryItOut('POSTapi-auth-register');">Coba request ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-register"
                    onclick="cancelTryOut('POSTapi-auth-register');" hidden>Batal 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-register"
                    data-initial-text="Kirim Request 💥"
                    data-loading-text="⏱ Mengirim..."
                    hidden>Kirim Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Header</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-register"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-register"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Parameter Body</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-auth-register"
               value="Budi Santoso"
               data-component="body">
    <br>
<p>Full name. Contoh: <code>Budi Santoso</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-auth-register"
               value="budi@example.com"
               data-component="body">
    <br>
<p>User email. Contoh: <code>budi@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-auth-register"
               value="password123"
               data-component="body">
    <br>
<p>User password, minimum 8 characters. Contoh: <code>password123</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password_confirmation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password_confirmation"                data-endpoint="POSTapi-auth-register"
               value="password123"
               data-component="body">
    <br>
<p>Password confirmation. Contoh: <code>password123</code></p>
        </div>
        </form>

                    <h2 id="autentikasi-POSTapi-auth-login">Login dan mendapatkan access token.</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-login">
<blockquote>Contoh request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/auth/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"admin@example.com\",
    \"password\": \"password\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/auth/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "admin@example.com",
    "password": "password"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-login">
</span>
<span id="execution-results-POSTapi-auth-login" hidden>
    <blockquote>Response diterima<span
                id="execution-response-status-POSTapi-auth-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-login"
      data-empty-response-text="<Response kosong>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-login" hidden>
    <blockquote>Request gagal dengan error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-login">

Tips: Pastikan koneksi jaringan berjalan dengan baik.
Jika Anda pengelola API ini, pastikan server API sedang berjalan dan CORS sudah diaktifkan.
Anda juga bisa memeriksa console Dev Tools untuk informasi debug.</code></pre>
</span>
<form id="form-POSTapi-auth-login" data-method="POST"
      data-path="api/auth/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-login"
                    onclick="tryItOut('POSTapi-auth-login');">Coba request ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-login"
                    onclick="cancelTryOut('POSTapi-auth-login');" hidden>Batal 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-login"
                    data-initial-text="Kirim Request 💥"
                    data-loading-text="⏱ Mengirim..."
                    hidden>Kirim Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Header</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-login"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-login"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Parameter Body</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-auth-login"
               value="admin@example.com"
               data-component="body">
    <br>
<p>User email. Contoh: <code>admin@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-auth-login"
               value="password"
               data-component="body">
    <br>
<p>User password. Contoh: <code>password</code></p>
        </div>
        </form>

                    <h2 id="autentikasi-POSTapi-auth-logout">Logout dari user yang sedang aktif.</h2>

<p>
<small class="badge badge-darkred">memerlukan autentikasi</small>
</p>



<span id="example-requests-POSTapi-auth-logout">
<blockquote>Contoh request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/auth/logout" \
    --header "Authorization: Bearer {TOKEN_ANDA}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/auth/logout"
);

const headers = {
    "Authorization": "Bearer {TOKEN_ANDA}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-logout">
</span>
<span id="execution-results-POSTapi-auth-logout" hidden>
    <blockquote>Response diterima<span
                id="execution-response-status-POSTapi-auth-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-logout"
      data-empty-response-text="<Response kosong>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-logout" hidden>
    <blockquote>Request gagal dengan error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-logout">

Tips: Pastikan koneksi jaringan berjalan dengan baik.
Jika Anda pengelola API ini, pastikan server API sedang berjalan dan CORS sudah diaktifkan.
Anda juga bisa memeriksa console Dev Tools untuk informasi debug.</code></pre>
</span>
<form id="form-POSTapi-auth-logout" data-method="POST"
      data-path="api/auth/logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-logout"
                    onclick="tryItOut('POSTapi-auth-logout');">Coba request ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-logout"
                    onclick="cancelTryOut('POSTapi-auth-logout');" hidden>Batal 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-logout"
                    data-initial-text="Kirim Request 💥"
                    data-loading-text="⏱ Mengirim..."
                    hidden>Kirim Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Header</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-auth-logout"
               value="Bearer {TOKEN_ANDA}"
               data-component="header">
    <br>
<p>Contoh: <code>Bearer {TOKEN_ANDA}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="kategori">Kategori</h1>

    

                                <h2 id="kategori-GETapi-categories">Menampilkan daftar kategori dengan pagination.</h2>

<p>
<small class="badge badge-darkred">memerlukan autentikasi</small>
</p>



<span id="example-requests-GETapi-categories">
<blockquote>Contoh request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/categories?per_page=10" \
    --header "Authorization: Bearer {TOKEN_ANDA}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/categories"
);

const params = {
    "per_page": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {TOKEN_ANDA}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-categories">
    </span>
<span id="execution-results-GETapi-categories" hidden>
    <blockquote>Response diterima<span
                id="execution-response-status-GETapi-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categories"
      data-empty-response-text="<Response kosong>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-categories" hidden>
    <blockquote>Request gagal dengan error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categories">

Tips: Pastikan koneksi jaringan berjalan dengan baik.
Jika Anda pengelola API ini, pastikan server API sedang berjalan dan CORS sudah diaktifkan.
Anda juga bisa memeriksa console Dev Tools untuk informasi debug.</code></pre>
</span>
<form id="form-GETapi-categories" data-method="GET"
      data-path="api/categories"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-categories"
                    onclick="tryItOut('GETapi-categories');">Coba request ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-categories"
                    onclick="cancelTryOut('GETapi-categories');" hidden>Batal 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-categories"
                    data-initial-text="Kirim Request 💥"
                    data-loading-text="⏱ Mengirim..."
                    hidden>Kirim Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Header</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-categories"
               value="Bearer {TOKEN_ANDA}"
               data-component="header">
    <br>
<p>Contoh: <code>Bearer {TOKEN_ANDA}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Parameter Query</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>opsional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-categories"
               value="10"
               data-component="query">
    <br>
<p>Number of items per page. Contoh: <code>10</code></p>
            </div>
                </form>

                    <h2 id="kategori-POSTapi-categories">Menyimpan kategori baru.</h2>

<p>
<small class="badge badge-darkred">memerlukan autentikasi</small>
</p>



<span id="example-requests-POSTapi-categories">
<blockquote>Contoh request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/categories" \
    --header "Authorization: Bearer {TOKEN_ANDA}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Elektronik\",
    \"description\": \"Kumpulan produk elektronik.\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/categories"
);

const headers = {
    "Authorization": "Bearer {TOKEN_ANDA}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Elektronik",
    "description": "Kumpulan produk elektronik."
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-categories">
</span>
<span id="execution-results-POSTapi-categories" hidden>
    <blockquote>Response diterima<span
                id="execution-response-status-POSTapi-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-categories"
      data-empty-response-text="<Response kosong>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-categories" hidden>
    <blockquote>Request gagal dengan error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-categories">

Tips: Pastikan koneksi jaringan berjalan dengan baik.
Jika Anda pengelola API ini, pastikan server API sedang berjalan dan CORS sudah diaktifkan.
Anda juga bisa memeriksa console Dev Tools untuk informasi debug.</code></pre>
</span>
<form id="form-POSTapi-categories" data-method="POST"
      data-path="api/categories"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-categories"
                    onclick="tryItOut('POSTapi-categories');">Coba request ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-categories"
                    onclick="cancelTryOut('POSTapi-categories');" hidden>Batal 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-categories"
                    data-initial-text="Kirim Request 💥"
                    data-loading-text="⏱ Mengirim..."
                    hidden>Kirim Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Header</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-categories"
               value="Bearer {TOKEN_ANDA}"
               data-component="header">
    <br>
<p>Contoh: <code>Bearer {TOKEN_ANDA}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Parameter Body</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-categories"
               value="Elektronik"
               data-component="body">
    <br>
<p>Category name. Contoh: <code>Elektronik</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opsional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-categories"
               value="Kumpulan produk elektronik."
               data-component="body">
    <br>
<p>Category description. Contoh: <code>Kumpulan produk elektronik.</code></p>
        </div>
        </form>

                    <h2 id="kategori-PUTapi-categories--id-">Memperbarui kategori.</h2>

<p>
<small class="badge badge-darkred">memerlukan autentikasi</small>
</p>



<span id="example-requests-PUTapi-categories--id-">
<blockquote>Contoh request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/categories/1" \
    --header "Authorization: Bearer {TOKEN_ANDA}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Aksesoris\",
    \"description\": \"Produk pelengkap gadget.\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/categories/1"
);

const headers = {
    "Authorization": "Bearer {TOKEN_ANDA}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Aksesoris",
    "description": "Produk pelengkap gadget."
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-categories--id-">
</span>
<span id="execution-results-PUTapi-categories--id-" hidden>
    <blockquote>Response diterima<span
                id="execution-response-status-PUTapi-categories--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-categories--id-"
      data-empty-response-text="<Response kosong>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-categories--id-" hidden>
    <blockquote>Request gagal dengan error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-categories--id-">

Tips: Pastikan koneksi jaringan berjalan dengan baik.
Jika Anda pengelola API ini, pastikan server API sedang berjalan dan CORS sudah diaktifkan.
Anda juga bisa memeriksa console Dev Tools untuk informasi debug.</code></pre>
</span>
<form id="form-PUTapi-categories--id-" data-method="PUT"
      data-path="api/categories/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-categories--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-categories--id-"
                    onclick="tryItOut('PUTapi-categories--id-');">Coba request ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-categories--id-"
                    onclick="cancelTryOut('PUTapi-categories--id-');" hidden>Batal 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-categories--id-"
                    data-initial-text="Kirim Request 💥"
                    data-loading-text="⏱ Mengirim..."
                    hidden>Kirim Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/categories/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/categories/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Header</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-categories--id-"
               value="Bearer {TOKEN_ANDA}"
               data-component="header">
    <br>
<p>Contoh: <code>Bearer {TOKEN_ANDA}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-categories--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-categories--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Parameter URL</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-categories--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the category. Contoh: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Parameter Body</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opsional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-categories--id-"
               value="Aksesoris"
               data-component="body">
    <br>
<p>Category name. Contoh: <code>Aksesoris</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opsional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-categories--id-"
               value="Produk pelengkap gadget."
               data-component="body">
    <br>
<p>Category description. Contoh: <code>Produk pelengkap gadget.</code></p>
        </div>
        </form>

                    <h2 id="kategori-DELETEapi-categories--id-">Menghapus kategori.</h2>

<p>
<small class="badge badge-darkred">memerlukan autentikasi</small>
</p>



<span id="example-requests-DELETEapi-categories--id-">
<blockquote>Contoh request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/categories/1" \
    --header "Authorization: Bearer {TOKEN_ANDA}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/categories/1"
);

const headers = {
    "Authorization": "Bearer {TOKEN_ANDA}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-categories--id-">
</span>
<span id="execution-results-DELETEapi-categories--id-" hidden>
    <blockquote>Response diterima<span
                id="execution-response-status-DELETEapi-categories--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-categories--id-"
      data-empty-response-text="<Response kosong>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-categories--id-" hidden>
    <blockquote>Request gagal dengan error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-categories--id-">

Tips: Pastikan koneksi jaringan berjalan dengan baik.
Jika Anda pengelola API ini, pastikan server API sedang berjalan dan CORS sudah diaktifkan.
Anda juga bisa memeriksa console Dev Tools untuk informasi debug.</code></pre>
</span>
<form id="form-DELETEapi-categories--id-" data-method="DELETE"
      data-path="api/categories/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-categories--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-categories--id-"
                    onclick="tryItOut('DELETEapi-categories--id-');">Coba request ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-categories--id-"
                    onclick="cancelTryOut('DELETEapi-categories--id-');" hidden>Batal 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-categories--id-"
                    data-initial-text="Kirim Request 💥"
                    data-loading-text="⏱ Mengirim..."
                    hidden>Kirim Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/categories/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Header</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-categories--id-"
               value="Bearer {TOKEN_ANDA}"
               data-component="header">
    <br>
<p>Contoh: <code>Bearer {TOKEN_ANDA}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-categories--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-categories--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Parameter URL</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-categories--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the category. Contoh: <code>1</code></p>
            </div>
                    </form>

                <h1 id="produk">Produk</h1>

    

                                <h2 id="produk-GETapi-products">Menampilkan daftar produk dengan pagination dan relasi kategori.</h2>

<p>
<small class="badge badge-darkred">memerlukan autentikasi</small>
</p>



<span id="example-requests-GETapi-products">
<blockquote>Contoh request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/products?search=laptop&amp;per_page=10" \
    --header "Authorization: Bearer {TOKEN_ANDA}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/products"
);

const params = {
    "search": "laptop",
    "per_page": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {TOKEN_ANDA}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-products">
    </span>
<span id="execution-results-GETapi-products" hidden>
    <blockquote>Response diterima<span
                id="execution-response-status-GETapi-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products"
      data-empty-response-text="<Response kosong>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-products" hidden>
    <blockquote>Request gagal dengan error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products">

Tips: Pastikan koneksi jaringan berjalan dengan baik.
Jika Anda pengelola API ini, pastikan server API sedang berjalan dan CORS sudah diaktifkan.
Anda juga bisa memeriksa console Dev Tools untuk informasi debug.</code></pre>
</span>
<form id="form-GETapi-products" data-method="GET"
      data-path="api/products"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products"
                    onclick="tryItOut('GETapi-products');">Coba request ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products"
                    onclick="cancelTryOut('GETapi-products');" hidden>Batal 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products"
                    data-initial-text="Kirim Request 💥"
                    data-loading-text="⏱ Mengirim..."
                    hidden>Kirim Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Header</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-products"
               value="Bearer {TOKEN_ANDA}"
               data-component="header">
    <br>
<p>Contoh: <code>Bearer {TOKEN_ANDA}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-products"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-products"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Parameter Query</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opsional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-products"
               value="laptop"
               data-component="query">
    <br>
<p>Search by product name or description. Contoh: <code>laptop</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>opsional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-products"
               value="10"
               data-component="query">
    <br>
<p>Number of items per page. Contoh: <code>10</code></p>
            </div>
                </form>

                    <h2 id="produk-POSTapi-products">Menyimpan produk baru.</h2>

<p>
<small class="badge badge-darkred">memerlukan autentikasi</small>
</p>



<span id="example-requests-POSTapi-products">
<blockquote>Contoh request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/products" \
    --header "Authorization: Bearer {TOKEN_ANDA}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "category_id=1"\
    --form "name=Laptop Gaming"\
    --form "description=Laptop untuk kebutuhan gaming dan editing."\
    --form "price=15000000"\
    --form "stock=12"\
    --form "image=@/private/var/folders/1_/qxl0_bfn0nd3ndd2mg8g1v_40000gn/T/phpvv4b12f7dp4i7h84tS8" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/products"
);

const headers = {
    "Authorization": "Bearer {TOKEN_ANDA}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('category_id', '1');
body.append('name', 'Laptop Gaming');
body.append('description', 'Laptop untuk kebutuhan gaming dan editing.');
body.append('price', '15000000');
body.append('stock', '12');
body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-products">
</span>
<span id="execution-results-POSTapi-products" hidden>
    <blockquote>Response diterima<span
                id="execution-response-status-POSTapi-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-products"
      data-empty-response-text="<Response kosong>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-products" hidden>
    <blockquote>Request gagal dengan error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-products">

Tips: Pastikan koneksi jaringan berjalan dengan baik.
Jika Anda pengelola API ini, pastikan server API sedang berjalan dan CORS sudah diaktifkan.
Anda juga bisa memeriksa console Dev Tools untuk informasi debug.</code></pre>
</span>
<form id="form-POSTapi-products" data-method="POST"
      data-path="api/products"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-products"
                    onclick="tryItOut('POSTapi-products');">Coba request ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-products"
                    onclick="cancelTryOut('POSTapi-products');" hidden>Batal 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-products"
                    data-initial-text="Kirim Request 💥"
                    data-loading-text="⏱ Mengirim..."
                    hidden>Kirim Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Header</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-products"
               value="Bearer {TOKEN_ANDA}"
               data-component="header">
    <br>
<p>Contoh: <code>Bearer {TOKEN_ANDA}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-products"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Contoh: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-products"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Parameter Body</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="category_id"                data-endpoint="POSTapi-products"
               value="1"
               data-component="body">
    <br>
<p>Category id. Contoh: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-products"
               value="Laptop Gaming"
               data-component="body">
    <br>
<p>Product name. Contoh: <code>Laptop Gaming</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opsional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-products"
               value="Laptop untuk kebutuhan gaming dan editing."
               data-component="body">
    <br>
<p>Product description. Contoh: <code>Laptop untuk kebutuhan gaming dan editing.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="price"                data-endpoint="POSTapi-products"
               value="15000000"
               data-component="body">
    <br>
<p>Product price. Contoh: <code>15000000</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>stock</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="stock"                data-endpoint="POSTapi-products"
               value="12"
               data-component="body">
    <br>
<p>Product stock. Contoh: <code>12</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>opsional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="image"                data-endpoint="POSTapi-products"
               value=""
               data-component="body">
    <br>
<p>Product image file. Contoh: <code>/private/var/folders/1_/qxl0_bfn0nd3ndd2mg8g1v_40000gn/T/phpvv4b12f7dp4i7h84tS8</code></p>
        </div>
        </form>

                    <h2 id="produk-GETapi-products--id-">Menampilkan detail produk beserta relasi kategori.</h2>

<p>
<small class="badge badge-darkred">memerlukan autentikasi</small>
</p>



<span id="example-requests-GETapi-products--id-">
<blockquote>Contoh request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/products/1" \
    --header "Authorization: Bearer {TOKEN_ANDA}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/products/1"
);

const headers = {
    "Authorization": "Bearer {TOKEN_ANDA}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-products--id-">
    </span>
<span id="execution-results-GETapi-products--id-" hidden>
    <blockquote>Response diterima<span
                id="execution-response-status-GETapi-products--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products--id-"
      data-empty-response-text="<Response kosong>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-products--id-" hidden>
    <blockquote>Request gagal dengan error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products--id-">

Tips: Pastikan koneksi jaringan berjalan dengan baik.
Jika Anda pengelola API ini, pastikan server API sedang berjalan dan CORS sudah diaktifkan.
Anda juga bisa memeriksa console Dev Tools untuk informasi debug.</code></pre>
</span>
<form id="form-GETapi-products--id-" data-method="GET"
      data-path="api/products/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products--id-"
                    onclick="tryItOut('GETapi-products--id-');">Coba request ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products--id-"
                    onclick="cancelTryOut('GETapi-products--id-');" hidden>Batal 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products--id-"
                    data-initial-text="Kirim Request 💥"
                    data-loading-text="⏱ Mengirim..."
                    hidden>Kirim Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Header</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-products--id-"
               value="Bearer {TOKEN_ANDA}"
               data-component="header">
    <br>
<p>Contoh: <code>Bearer {TOKEN_ANDA}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Parameter URL</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-products--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Contoh: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="produk-PUTapi-products--id-">Memperbarui produk.</h2>

<p>
<small class="badge badge-darkred">memerlukan autentikasi</small>
</p>



<span id="example-requests-PUTapi-products--id-">
<blockquote>Contoh request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/products/1" \
    --header "Authorization: Bearer {TOKEN_ANDA}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "category_id=2"\
    --form "name=Keyboard Mechanical"\
    --form "description=Keyboard mechanical dengan switch tactile."\
    --form "price=750000"\
    --form "stock=20"\
    --form "image=@/private/var/folders/1_/qxl0_bfn0nd3ndd2mg8g1v_40000gn/T/phpt3624i2c5pdlb1SIZTO" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/products/1"
);

const headers = {
    "Authorization": "Bearer {TOKEN_ANDA}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('category_id', '2');
body.append('name', 'Keyboard Mechanical');
body.append('description', 'Keyboard mechanical dengan switch tactile.');
body.append('price', '750000');
body.append('stock', '20');
body.append('image', document.querySelector('input[name="image"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-products--id-">
</span>
<span id="execution-results-PUTapi-products--id-" hidden>
    <blockquote>Response diterima<span
                id="execution-response-status-PUTapi-products--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-products--id-"
      data-empty-response-text="<Response kosong>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-products--id-" hidden>
    <blockquote>Request gagal dengan error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-products--id-">

Tips: Pastikan koneksi jaringan berjalan dengan baik.
Jika Anda pengelola API ini, pastikan server API sedang berjalan dan CORS sudah diaktifkan.
Anda juga bisa memeriksa console Dev Tools untuk informasi debug.</code></pre>
</span>
<form id="form-PUTapi-products--id-" data-method="PUT"
      data-path="api/products/{id}"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-products--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-products--id-"
                    onclick="tryItOut('PUTapi-products--id-');">Coba request ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-products--id-"
                    onclick="cancelTryOut('PUTapi-products--id-');" hidden>Batal 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-products--id-"
                    data-initial-text="Kirim Request 💥"
                    data-loading-text="⏱ Mengirim..."
                    hidden>Kirim Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/products/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/products/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Header</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-products--id-"
               value="Bearer {TOKEN_ANDA}"
               data-component="header">
    <br>
<p>Contoh: <code>Bearer {TOKEN_ANDA}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-products--id-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Contoh: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Parameter URL</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-products--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Contoh: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Parameter Body</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>opsional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="category_id"                data-endpoint="PUTapi-products--id-"
               value="2"
               data-component="body">
    <br>
<p>Category id. Contoh: <code>2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opsional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-products--id-"
               value="Keyboard Mechanical"
               data-component="body">
    <br>
<p>Product name. Contoh: <code>Keyboard Mechanical</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opsional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-products--id-"
               value="Keyboard mechanical dengan switch tactile."
               data-component="body">
    <br>
<p>Product description. Contoh: <code>Keyboard mechanical dengan switch tactile.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>opsional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="price"                data-endpoint="PUTapi-products--id-"
               value="750000"
               data-component="body">
    <br>
<p>Product price. Contoh: <code>750000</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>stock</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>opsional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="stock"                data-endpoint="PUTapi-products--id-"
               value="20"
               data-component="body">
    <br>
<p>Product stock. Contoh: <code>20</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>opsional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="image"                data-endpoint="PUTapi-products--id-"
               value=""
               data-component="body">
    <br>
<p>New product image file. Contoh: <code>/private/var/folders/1_/qxl0_bfn0nd3ndd2mg8g1v_40000gn/T/phpt3624i2c5pdlb1SIZTO</code></p>
        </div>
        </form>

                    <h2 id="produk-DELETEapi-products--id-">Menghapus produk beserta file gambarnya.</h2>

<p>
<small class="badge badge-darkred">memerlukan autentikasi</small>
</p>



<span id="example-requests-DELETEapi-products--id-">
<blockquote>Contoh request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/products/1" \
    --header "Authorization: Bearer {TOKEN_ANDA}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/products/1"
);

const headers = {
    "Authorization": "Bearer {TOKEN_ANDA}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-products--id-">
</span>
<span id="execution-results-DELETEapi-products--id-" hidden>
    <blockquote>Response diterima<span
                id="execution-response-status-DELETEapi-products--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-products--id-"
      data-empty-response-text="<Response kosong>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-products--id-" hidden>
    <blockquote>Request gagal dengan error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-products--id-">

Tips: Pastikan koneksi jaringan berjalan dengan baik.
Jika Anda pengelola API ini, pastikan server API sedang berjalan dan CORS sudah diaktifkan.
Anda juga bisa memeriksa console Dev Tools untuk informasi debug.</code></pre>
</span>
<form id="form-DELETEapi-products--id-" data-method="DELETE"
      data-path="api/products/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-products--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-products--id-"
                    onclick="tryItOut('DELETEapi-products--id-');">Coba request ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-products--id-"
                    onclick="cancelTryOut('DELETEapi-products--id-');" hidden>Batal 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-products--id-"
                    data-initial-text="Kirim Request 💥"
                    data-loading-text="⏱ Mengirim..."
                    hidden>Kirim Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/products/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Header</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-products--id-"
               value="Bearer {TOKEN_ANDA}"
               data-component="header">
    <br>
<p>Contoh: <code>Bearer {TOKEN_ANDA}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Parameter URL</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-products--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Contoh: <code>1</code></p>
            </div>
                    </form>

                <h1 id="transaksi">Transaksi</h1>

    

                                <h2 id="transaksi-GETapi-transactions">Menampilkan daftar transaksi dengan pagination.</h2>

<p>
<small class="badge badge-darkred">memerlukan autentikasi</small>
</p>



<span id="example-requests-GETapi-transactions">
<blockquote>Contoh request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/transactions?status=paid&amp;per_page=10" \
    --header "Authorization: Bearer {TOKEN_ANDA}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/transactions"
);

const params = {
    "status": "paid",
    "per_page": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {TOKEN_ANDA}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-transactions">
    </span>
<span id="execution-results-GETapi-transactions" hidden>
    <blockquote>Response diterima<span
                id="execution-response-status-GETapi-transactions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-transactions"
      data-empty-response-text="<Response kosong>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-transactions" hidden>
    <blockquote>Request gagal dengan error:</blockquote>
    <pre><code id="execution-error-message-GETapi-transactions">

Tips: Pastikan koneksi jaringan berjalan dengan baik.
Jika Anda pengelola API ini, pastikan server API sedang berjalan dan CORS sudah diaktifkan.
Anda juga bisa memeriksa console Dev Tools untuk informasi debug.</code></pre>
</span>
<form id="form-GETapi-transactions" data-method="GET"
      data-path="api/transactions"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-transactions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-transactions"
                    onclick="tryItOut('GETapi-transactions');">Coba request ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-transactions"
                    onclick="cancelTryOut('GETapi-transactions');" hidden>Batal 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-transactions"
                    data-initial-text="Kirim Request 💥"
                    data-loading-text="⏱ Mengirim..."
                    hidden>Kirim Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/transactions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Header</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-transactions"
               value="Bearer {TOKEN_ANDA}"
               data-component="header">
    <br>
<p>Contoh: <code>Bearer {TOKEN_ANDA}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-transactions"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-transactions"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Parameter Query</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opsional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-transactions"
               value="paid"
               data-component="query">
    <br>
<p>Filter by transaction status. Contoh: <code>paid</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>opsional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-transactions"
               value="10"
               data-component="query">
    <br>
<p>Number of items per page. Contoh: <code>10</code></p>
            </div>
                </form>

                    <h2 id="transaksi-POSTapi-transactions">Menyimpan transaksi baru.</h2>

<p>
<small class="badge badge-darkred">memerlukan autentikasi</small>
</p>



<span id="example-requests-POSTapi-transactions">
<blockquote>Contoh request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/transactions" \
    --header "Authorization: Bearer {TOKEN_ANDA}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"user_id\": 1,
    \"product_id\": 1,
    \"quantity\": 2,
    \"status\": \"paid\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/transactions"
);

const headers = {
    "Authorization": "Bearer {TOKEN_ANDA}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": 1,
    "product_id": 1,
    "quantity": 2,
    "status": "paid"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-transactions">
</span>
<span id="execution-results-POSTapi-transactions" hidden>
    <blockquote>Response diterima<span
                id="execution-response-status-POSTapi-transactions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-transactions"
      data-empty-response-text="<Response kosong>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-transactions" hidden>
    <blockquote>Request gagal dengan error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-transactions">

Tips: Pastikan koneksi jaringan berjalan dengan baik.
Jika Anda pengelola API ini, pastikan server API sedang berjalan dan CORS sudah diaktifkan.
Anda juga bisa memeriksa console Dev Tools untuk informasi debug.</code></pre>
</span>
<form id="form-POSTapi-transactions" data-method="POST"
      data-path="api/transactions"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-transactions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-transactions"
                    onclick="tryItOut('POSTapi-transactions');">Coba request ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-transactions"
                    onclick="cancelTryOut('POSTapi-transactions');" hidden>Batal 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-transactions"
                    data-initial-text="Kirim Request 💥"
                    data-loading-text="⏱ Mengirim..."
                    hidden>Kirim Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/transactions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Header</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-transactions"
               value="Bearer {TOKEN_ANDA}"
               data-component="header">
    <br>
<p>Contoh: <code>Bearer {TOKEN_ANDA}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-transactions"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-transactions"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Parameter Body</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="POSTapi-transactions"
               value="1"
               data-component="body">
    <br>
<p>User id. Contoh: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product_id"                data-endpoint="POSTapi-transactions"
               value="1"
               data-component="body">
    <br>
<p>Product id. Contoh: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="quantity"                data-endpoint="POSTapi-transactions"
               value="2"
               data-component="body">
    <br>
<p>Quantity purchased. Contoh: <code>2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opsional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTapi-transactions"
               value="paid"
               data-component="body">
    <br>
<p>Transaction status. Contoh: <code>paid</code></p>
        </div>
        </form>

                    <h2 id="transaksi-GETapi-transactions--id-">Menampilkan detail transaksi.</h2>

<p>
<small class="badge badge-darkred">memerlukan autentikasi</small>
</p>



<span id="example-requests-GETapi-transactions--id-">
<blockquote>Contoh request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/transactions/1" \
    --header "Authorization: Bearer {TOKEN_ANDA}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/transactions/1"
);

const headers = {
    "Authorization": "Bearer {TOKEN_ANDA}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-transactions--id-">
    </span>
<span id="execution-results-GETapi-transactions--id-" hidden>
    <blockquote>Response diterima<span
                id="execution-response-status-GETapi-transactions--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-transactions--id-"
      data-empty-response-text="<Response kosong>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-transactions--id-" hidden>
    <blockquote>Request gagal dengan error:</blockquote>
    <pre><code id="execution-error-message-GETapi-transactions--id-">

Tips: Pastikan koneksi jaringan berjalan dengan baik.
Jika Anda pengelola API ini, pastikan server API sedang berjalan dan CORS sudah diaktifkan.
Anda juga bisa memeriksa console Dev Tools untuk informasi debug.</code></pre>
</span>
<form id="form-GETapi-transactions--id-" data-method="GET"
      data-path="api/transactions/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-transactions--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-transactions--id-"
                    onclick="tryItOut('GETapi-transactions--id-');">Coba request ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-transactions--id-"
                    onclick="cancelTryOut('GETapi-transactions--id-');" hidden>Batal 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-transactions--id-"
                    data-initial-text="Kirim Request 💥"
                    data-loading-text="⏱ Mengirim..."
                    hidden>Kirim Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/transactions/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Header</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-transactions--id-"
               value="Bearer {TOKEN_ANDA}"
               data-component="header">
    <br>
<p>Contoh: <code>Bearer {TOKEN_ANDA}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-transactions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-transactions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Parameter URL</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-transactions--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the transaction. Contoh: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="transaksi-PUTapi-transactions--id-">Memperbarui status atau jumlah transaksi.</h2>

<p>
<small class="badge badge-darkred">memerlukan autentikasi</small>
</p>



<span id="example-requests-PUTapi-transactions--id-">
<blockquote>Contoh request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/transactions/1" \
    --header "Authorization: Bearer {TOKEN_ANDA}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"quantity\": 3,
    \"status\": \"paid\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/transactions/1"
);

const headers = {
    "Authorization": "Bearer {TOKEN_ANDA}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "quantity": 3,
    "status": "paid"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-transactions--id-">
</span>
<span id="execution-results-PUTapi-transactions--id-" hidden>
    <blockquote>Response diterima<span
                id="execution-response-status-PUTapi-transactions--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-transactions--id-"
      data-empty-response-text="<Response kosong>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-transactions--id-" hidden>
    <blockquote>Request gagal dengan error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-transactions--id-">

Tips: Pastikan koneksi jaringan berjalan dengan baik.
Jika Anda pengelola API ini, pastikan server API sedang berjalan dan CORS sudah diaktifkan.
Anda juga bisa memeriksa console Dev Tools untuk informasi debug.</code></pre>
</span>
<form id="form-PUTapi-transactions--id-" data-method="PUT"
      data-path="api/transactions/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-transactions--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-transactions--id-"
                    onclick="tryItOut('PUTapi-transactions--id-');">Coba request ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-transactions--id-"
                    onclick="cancelTryOut('PUTapi-transactions--id-');" hidden>Batal 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-transactions--id-"
                    data-initial-text="Kirim Request 💥"
                    data-loading-text="⏱ Mengirim..."
                    hidden>Kirim Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/transactions/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/transactions/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Header</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-transactions--id-"
               value="Bearer {TOKEN_ANDA}"
               data-component="header">
    <br>
<p>Contoh: <code>Bearer {TOKEN_ANDA}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-transactions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-transactions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Parameter URL</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-transactions--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the transaction. Contoh: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Parameter Body</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opsional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="user_id"                data-endpoint="PUTapi-transactions--id-"
               value=""
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the users table.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opsional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product_id"                data-endpoint="PUTapi-transactions--id-"
               value=""
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the products table.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>opsional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="quantity"                data-endpoint="PUTapi-transactions--id-"
               value="3"
               data-component="body">
    <br>
<p>Quantity purchased. Contoh: <code>3</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>opsional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-transactions--id-"
               value="paid"
               data-component="body">
    <br>
<p>Transaction status. Contoh: <code>paid</code></p>
        </div>
        </form>

                    <h2 id="transaksi-DELETEapi-transactions--id-">Menghapus transaksi.</h2>

<p>
<small class="badge badge-darkred">memerlukan autentikasi</small>
</p>



<span id="example-requests-DELETEapi-transactions--id-">
<blockquote>Contoh request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/transactions/1" \
    --header "Authorization: Bearer {TOKEN_ANDA}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/transactions/1"
);

const headers = {
    "Authorization": "Bearer {TOKEN_ANDA}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-transactions--id-">
</span>
<span id="execution-results-DELETEapi-transactions--id-" hidden>
    <blockquote>Response diterima<span
                id="execution-response-status-DELETEapi-transactions--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-transactions--id-"
      data-empty-response-text="<Response kosong>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-transactions--id-" hidden>
    <blockquote>Request gagal dengan error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-transactions--id-">

Tips: Pastikan koneksi jaringan berjalan dengan baik.
Jika Anda pengelola API ini, pastikan server API sedang berjalan dan CORS sudah diaktifkan.
Anda juga bisa memeriksa console Dev Tools untuk informasi debug.</code></pre>
</span>
<form id="form-DELETEapi-transactions--id-" data-method="DELETE"
      data-path="api/transactions/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-transactions--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-transactions--id-"
                    onclick="tryItOut('DELETEapi-transactions--id-');">Coba request ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-transactions--id-"
                    onclick="cancelTryOut('DELETEapi-transactions--id-');" hidden>Batal 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-transactions--id-"
                    data-initial-text="Kirim Request 💥"
                    data-loading-text="⏱ Mengirim..."
                    hidden>Kirim Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/transactions/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Header</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-transactions--id-"
               value="Bearer {TOKEN_ANDA}"
               data-component="header">
    <br>
<p>Contoh: <code>Bearer {TOKEN_ANDA}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-transactions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-transactions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Contoh: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Parameter URL</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-transactions--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the transaction. Contoh: <code>1</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
