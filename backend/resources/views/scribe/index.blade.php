<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>MouridConnect API Documentation</title>

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
        var tryItOutBaseUrl = "http://localhost:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.9.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.9.0.js") }}"></script>

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
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-auth-register">
                                <a href="#endpoints-POSTapi-auth-register">POST api/auth/register</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-auth-login">
                                <a href="#endpoints-POSTapi-auth-login">POST api/auth/login</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-categories">
                                <a href="#endpoints-GETapi-categories">GET api/categories</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-categories--category_id-">
                                <a href="#endpoints-GETapi-categories--category_id-">GET api/categories/{category_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-shops">
                                <a href="#endpoints-GETapi-shops">GET api/shops</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-shops--shop_slug-">
                                <a href="#endpoints-GETapi-shops--shop_slug-">GET api/shops/{shop_slug}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-products">
                                <a href="#endpoints-GETapi-products">Liste des produits</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-products--product_slug-">
                                <a href="#endpoints-GETapi-products--product_slug-">GET api/products/{product_slug}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-products--product_slug--reviews">
                                <a href="#endpoints-GETapi-products--product_slug--reviews">GET api/products/{product_slug}/reviews</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-auth-me">
                                <a href="#endpoints-GETapi-auth-me">GET api/auth/me</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-auth-logout">
                                <a href="#endpoints-POSTapi-auth-logout">POST api/auth/logout</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-shops">
                                <a href="#endpoints-POSTapi-shops">POST api/shops</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-shops--shop_slug-">
                                <a href="#endpoints-PUTapi-shops--shop_slug-">PUT api/shops/{shop_slug}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-shops--shop_slug-">
                                <a href="#endpoints-DELETEapi-shops--shop_slug-">DELETE api/shops/{shop_slug}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-products">
                                <a href="#endpoints-POSTapi-products">POST api/products</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-products--product_slug-">
                                <a href="#endpoints-PUTapi-products--product_slug-">PUT api/products/{product_slug}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-products--product_slug-">
                                <a href="#endpoints-DELETEapi-products--product_slug-">DELETE api/products/{product_slug}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-products--product_slug--reviews">
                                <a href="#endpoints-POSTapi-products--product_slug--reviews">POST api/products/{product_slug}/reviews</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-reviews--review_id-">
                                <a href="#endpoints-DELETEapi-reviews--review_id-">DELETE api/reviews/{review_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-vendor-shops">
                                <a href="#endpoints-GETapi-vendor-shops">GET api/vendor/shops</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-vendor-products">
                                <a href="#endpoints-GETapi-vendor-products">GET api/vendor/products</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-vendor-stats">
                                <a href="#endpoints-GETapi-vendor-stats">GET api/vendor/stats</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PATCHapi-admin-shops--shop_slug--verify">
                                <a href="#endpoints-PATCHapi-admin-shops--shop_slug--verify">PATCH api/admin/shops/{shop_slug}/verify</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-admin-users">
                                <a href="#endpoints-GETapi-admin-users">GET api/admin/users</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PATCHapi-admin-users--user_id--role">
                                <a href="#endpoints-PATCHapi-admin-users--user_id--role">PATCH api/admin/users/{user_id}/role</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: April 12, 2026</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>API REST du Souk Mouride — marketplace de la communauté mouride mondiale. Produits, boutiques, catégories, authentification.</p>
<aside>
    <strong>Base URL</strong>: <code>http://localhost:8000</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-POSTapi-auth-register">POST api/auth/register</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/auth/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"b\",
    \"email\": \"zbailey@example.net\",
    \"password\": \"-0pBNvYgxw\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "b",
    "email": "zbailey@example.net",
    "password": "-0pBNvYgxw"
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
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-register"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-register">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
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
                    onclick="tryItOut('POSTapi-auth-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-register"
                    onclick="cancelTryOut('POSTapi-auth-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-register"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
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
<p>Example: <code>application/json</code></p>
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
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-auth-register"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-auth-register"
               value="zbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>zbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-auth-register"
               value="-0pBNvYgxw"
               data-component="body">
    <br>
<p>Must be at least 8 characters. Example: <code>-0pBNvYgxw</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-auth-login">POST api/auth/login</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/auth/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"gbailey@example.net\",
    \"password\": \"|]|{+-\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "gbailey@example.net",
    "password": "|]|{+-"
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
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
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
                    onclick="tryItOut('POSTapi-auth-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-login"
                    onclick="cancelTryOut('POSTapi-auth-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
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
<p>Example: <code>application/json</code></p>
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
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-auth-login"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>gbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-auth-login"
               value="|]|{+-"
               data-component="body">
    <br>
<p>Example: <code>|]|{+-</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-categories">GET api/categories</h2>

<p>
</p>



<span id="example-requests-GETapi-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/categories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/categories"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-categories">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Commerce &amp; Distribution&quot;,
            &quot;slug&quot;: &quot;commerce-distribution&quot;,
            &quot;icon&quot;: &quot;🛒&quot;,
            &quot;description&quot;: null,
            &quot;parent_id&quot;: null,
            &quot;children&quot;: [
                {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;&Eacute;piceries &amp; alimentation africaine&quot;,
                    &quot;slug&quot;: &quot;epiceries-alimentation-africaine&quot;,
                    &quot;icon&quot;: &quot;🛒&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 1
                },
                {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Import-export&quot;,
                    &quot;slug&quot;: &quot;import-export&quot;,
                    &quot;icon&quot;: &quot;🛒&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 1
                },
                {
                    &quot;id&quot;: 4,
                    &quot;name&quot;: &quot;Grossistes &amp; d&eacute;taillants&quot;,
                    &quot;slug&quot;: &quot;grossistes-detaillants&quot;,
                    &quot;icon&quot;: &quot;🛒&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 1
                },
                {
                    &quot;id&quot;: 5,
                    &quot;name&quot;: &quot;Produits s&eacute;n&eacute;galais en diaspora&quot;,
                    &quot;slug&quot;: &quot;produits-senegalais-en-diaspora&quot;,
                    &quot;icon&quot;: &quot;🛒&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 1
                }
            ]
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;Restauration &amp; Alimentation&quot;,
            &quot;slug&quot;: &quot;restauration-alimentation&quot;,
            &quot;icon&quot;: &quot;🍽️&quot;,
            &quot;description&quot;: null,
            &quot;parent_id&quot;: null,
            &quot;children&quot;: [
                {
                    &quot;id&quot;: 7,
                    &quot;name&quot;: &quot;Restaurants africains &amp; halal&quot;,
                    &quot;slug&quot;: &quot;restaurants-africains-halal&quot;,
                    &quot;icon&quot;: &quot;🍽️&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 6
                },
                {
                    &quot;id&quot;: 8,
                    &quot;name&quot;: &quot;Traiteurs &amp; cuisini&egrave;res &agrave; domicile&quot;,
                    &quot;slug&quot;: &quot;traiteurs-cuisinieres-a-domicile&quot;,
                    &quot;icon&quot;: &quot;🍽️&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 6
                },
                {
                    &quot;id&quot;: 9,
                    &quot;name&quot;: &quot;Vente de thi&eacute;boudienne, maf&eacute;, yassa&quot;,
                    &quot;slug&quot;: &quot;vente-de-thieboudienne-mafe-yassa&quot;,
                    &quot;icon&quot;: &quot;🍽️&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 6
                },
                {
                    &quot;id&quot;: 10,
                    &quot;name&quot;: &quot;P&acirc;tisseries &amp; g&acirc;teaux africains&quot;,
                    &quot;slug&quot;: &quot;patisseries-gateaux-africains&quot;,
                    &quot;icon&quot;: &quot;🍽️&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 6
                },
                {
                    &quot;id&quot;: 11,
                    &quot;name&quot;: &quot;Vente de caf&eacute; Touba&quot;,
                    &quot;slug&quot;: &quot;vente-de-cafe-touba&quot;,
                    &quot;icon&quot;: &quot;🍽️&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 6
                }
            ]
        },
        {
            &quot;id&quot;: 12,
            &quot;name&quot;: &quot;Mode &amp; Artisanat&quot;,
            &quot;slug&quot;: &quot;mode-artisanat&quot;,
            &quot;icon&quot;: &quot;👗&quot;,
            &quot;description&quot;: null,
            &quot;parent_id&quot;: null,
            &quot;children&quot;: [
                {
                    &quot;id&quot;: 13,
                    &quot;name&quot;: &quot;Couturiers &amp; tailleurs&quot;,
                    &quot;slug&quot;: &quot;couturiers-tailleurs&quot;,
                    &quot;icon&quot;: &quot;👗&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 12
                },
                {
                    &quot;id&quot;: 14,
                    &quot;name&quot;: &quot;Tissus wax &amp; bazin&quot;,
                    &quot;slug&quot;: &quot;tissus-wax-bazin&quot;,
                    &quot;icon&quot;: &quot;👗&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 12
                },
                {
                    &quot;id&quot;: 15,
                    &quot;name&quot;: &quot;Bijoux &amp; accessoires&quot;,
                    &quot;slug&quot;: &quot;bijoux-accessoires&quot;,
                    &quot;icon&quot;: &quot;👗&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 12
                },
                {
                    &quot;id&quot;: 16,
                    &quot;name&quot;: &quot;Chaussures artisanales&quot;,
                    &quot;slug&quot;: &quot;chaussures-artisanales&quot;,
                    &quot;icon&quot;: &quot;👗&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 12
                },
                {
                    &quot;id&quot;: 17,
                    &quot;name&quot;: &quot;Boubous &amp; tenues traditionnelles&quot;,
                    &quot;slug&quot;: &quot;boubous-tenues-traditionnelles&quot;,
                    &quot;icon&quot;: &quot;👗&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 12
                }
            ]
        },
        {
            &quot;id&quot;: 18,
            &quot;name&quot;: &quot;BTP &amp; Services&quot;,
            &quot;slug&quot;: &quot;btp-services&quot;,
            &quot;icon&quot;: &quot;🏗️&quot;,
            &quot;description&quot;: null,
            &quot;parent_id&quot;: null,
            &quot;children&quot;: [
                {
                    &quot;id&quot;: 19,
                    &quot;name&quot;: &quot;Ma&ccedil;ons &amp; entrepreneurs BTP&quot;,
                    &quot;slug&quot;: &quot;macons-entrepreneurs-btp&quot;,
                    &quot;icon&quot;: &quot;🏗️&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 18
                },
                {
                    &quot;id&quot;: 20,
                    &quot;name&quot;: &quot;Plombiers &amp; &eacute;lectriciens&quot;,
                    &quot;slug&quot;: &quot;plombiers-electriciens&quot;,
                    &quot;icon&quot;: &quot;🏗️&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 18
                },
                {
                    &quot;id&quot;: 21,
                    &quot;name&quot;: &quot;Menuisiers &amp; charpentiers&quot;,
                    &quot;slug&quot;: &quot;menuisiers-charpentiers&quot;,
                    &quot;icon&quot;: &quot;🏗️&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 18
                },
                {
                    &quot;id&quot;: 22,
                    &quot;name&quot;: &quot;D&eacute;coration &amp; am&eacute;nagement int&eacute;rieur&quot;,
                    &quot;slug&quot;: &quot;decoration-amenagement-interieur&quot;,
                    &quot;icon&quot;: &quot;🏗️&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 18
                }
            ]
        },
        {
            &quot;id&quot;: 23,
            &quot;name&quot;: &quot;Sant&eacute; &amp; Bien-&ecirc;tre&quot;,
            &quot;slug&quot;: &quot;sante-bien-etre&quot;,
            &quot;icon&quot;: &quot;🌿&quot;,
            &quot;description&quot;: null,
            &quot;parent_id&quot;: null,
            &quot;children&quot;: [
                {
                    &quot;id&quot;: 24,
                    &quot;name&quot;: &quot;Coiffeurs &amp; barbiers africains&quot;,
                    &quot;slug&quot;: &quot;coiffeurs-barbiers-africains&quot;,
                    &quot;icon&quot;: &quot;🌿&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 23
                },
                {
                    &quot;id&quot;: 25,
                    &quot;name&quot;: &quot;Produits cosm&eacute;tiques naturels&quot;,
                    &quot;slug&quot;: &quot;produits-cosmetiques-naturels&quot;,
                    &quot;icon&quot;: &quot;🌿&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 23
                },
                {
                    &quot;id&quot;: 26,
                    &quot;name&quot;: &quot;Huiles &amp; savons traditionnels&quot;,
                    &quot;slug&quot;: &quot;huiles-savons-traditionnels&quot;,
                    &quot;icon&quot;: &quot;🌿&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 23
                },
                {
                    &quot;id&quot;: 27,
                    &quot;name&quot;: &quot;Th&eacute;rapeutes &amp; praticiens&quot;,
                    &quot;slug&quot;: &quot;therapeutes-praticiens&quot;,
                    &quot;icon&quot;: &quot;🌿&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 23
                }
            ]
        },
        {
            &quot;id&quot;: 28,
            &quot;name&quot;: &quot;Agriculture &amp; Terroir&quot;,
            &quot;slug&quot;: &quot;agriculture-terroir&quot;,
            &quot;icon&quot;: &quot;🌾&quot;,
            &quot;description&quot;: null,
            &quot;parent_id&quot;: null,
            &quot;children&quot;: [
                {
                    &quot;id&quot;: 29,
                    &quot;name&quot;: &quot;Arachides &amp; produits du S&eacute;n&eacute;gal&quot;,
                    &quot;slug&quot;: &quot;arachides-produits-du-senegal&quot;,
                    &quot;icon&quot;: &quot;🌾&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 28
                },
                {
                    &quot;id&quot;: 30,
                    &quot;name&quot;: &quot;&Eacute;pices &amp; condiments africains&quot;,
                    &quot;slug&quot;: &quot;epices-condiments-africains&quot;,
                    &quot;icon&quot;: &quot;🌾&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 28
                },
                {
                    &quot;id&quot;: 31,
                    &quot;name&quot;: &quot;Fruits &amp; l&eacute;gumes africains&quot;,
                    &quot;slug&quot;: &quot;fruits-legumes-africains&quot;,
                    &quot;icon&quot;: &quot;🌾&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 28
                },
                {
                    &quot;id&quot;: 32,
                    &quot;name&quot;: &quot;Miel &amp; produits naturels&quot;,
                    &quot;slug&quot;: &quot;miel-produits-naturels&quot;,
                    &quot;icon&quot;: &quot;🌾&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 28
                }
            ]
        },
        {
            &quot;id&quot;: 33,
            &quot;name&quot;: &quot;Tech &amp; Services Num&eacute;riques&quot;,
            &quot;slug&quot;: &quot;tech-services-numeriques&quot;,
            &quot;icon&quot;: &quot;📱&quot;,
            &quot;description&quot;: null,
            &quot;parent_id&quot;: null,
            &quot;children&quot;: [
                {
                    &quot;id&quot;: 34,
                    &quot;name&quot;: &quot;D&eacute;veloppeurs web &amp; mobile&quot;,
                    &quot;slug&quot;: &quot;developpeurs-web-mobile&quot;,
                    &quot;icon&quot;: &quot;📱&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 33
                },
                {
                    &quot;id&quot;: 35,
                    &quot;name&quot;: &quot;Graphistes &amp; cr&eacute;atifs&quot;,
                    &quot;slug&quot;: &quot;graphistes-creatifs&quot;,
                    &quot;icon&quot;: &quot;📱&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 33
                },
                {
                    &quot;id&quot;: 36,
                    &quot;name&quot;: &quot;Comptables &amp; conseillers fiscaux&quot;,
                    &quot;slug&quot;: &quot;comptables-conseillers-fiscaux&quot;,
                    &quot;icon&quot;: &quot;📱&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 33
                },
                {
                    &quot;id&quot;: 37,
                    &quot;name&quot;: &quot;Agents immobiliers&quot;,
                    &quot;slug&quot;: &quot;agents-immobiliers&quot;,
                    &quot;icon&quot;: &quot;📱&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 33
                }
            ]
        },
        {
            &quot;id&quot;: 38,
            &quot;name&quot;: &quot;Transport &amp; Logistique&quot;,
            &quot;slug&quot;: &quot;transport-logistique&quot;,
            &quot;icon&quot;: &quot;🚗&quot;,
            &quot;description&quot;: null,
            &quot;parent_id&quot;: null,
            &quot;children&quot;: [
                {
                    &quot;id&quot;: 39,
                    &quot;name&quot;: &quot;Transporteurs de marchandises&quot;,
                    &quot;slug&quot;: &quot;transporteurs-de-marchandises&quot;,
                    &quot;icon&quot;: &quot;🚗&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 38
                },
                {
                    &quot;id&quot;: 40,
                    &quot;name&quot;: &quot;Chauffeurs &amp; VTC&quot;,
                    &quot;slug&quot;: &quot;chauffeurs-vtc&quot;,
                    &quot;icon&quot;: &quot;🚗&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 38
                },
                {
                    &quot;id&quot;: 41,
                    &quot;name&quot;: &quot;D&eacute;m&eacute;nageurs&quot;,
                    &quot;slug&quot;: &quot;demenageurs&quot;,
                    &quot;icon&quot;: &quot;🚗&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 38
                },
                {
                    &quot;id&quot;: 42,
                    &quot;name&quot;: &quot;Envoi de colis S&eacute;n&eacute;gal &harr; Diaspora&quot;,
                    &quot;slug&quot;: &quot;envoi-de-colis-senegal-diaspora&quot;,
                    &quot;icon&quot;: &quot;🚗&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 38
                }
            ]
        },
        {
            &quot;id&quot;: 43,
            &quot;name&quot;: &quot;&Eacute;ducation &amp; Formation&quot;,
            &quot;slug&quot;: &quot;education-formation&quot;,
            &quot;icon&quot;: &quot;🎓&quot;,
            &quot;description&quot;: null,
            &quot;parent_id&quot;: null,
            &quot;children&quot;: [
                {
                    &quot;id&quot;: 44,
                    &quot;name&quot;: &quot;Cours particuliers&quot;,
                    &quot;slug&quot;: &quot;cours-particuliers&quot;,
                    &quot;icon&quot;: &quot;🎓&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 43
                },
                {
                    &quot;id&quot;: 45,
                    &quot;name&quot;: &quot;Formations professionnelles&quot;,
                    &quot;slug&quot;: &quot;formations-professionnelles&quot;,
                    &quot;icon&quot;: &quot;🎓&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 43
                },
                {
                    &quot;id&quot;: 46,
                    &quot;name&quot;: &quot;Cours de wolof pour enfants diaspora&quot;,
                    &quot;slug&quot;: &quot;cours-de-wolof-pour-enfants-diaspora&quot;,
                    &quot;icon&quot;: &quot;🎓&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 43
                },
                {
                    &quot;id&quot;: 47,
                    &quot;name&quot;: &quot;Coaching &amp; mentorat&quot;,
                    &quot;slug&quot;: &quot;coaching-mentorat&quot;,
                    &quot;icon&quot;: &quot;🎓&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 43
                }
            ]
        },
        {
            &quot;id&quot;: 48,
            &quot;name&quot;: &quot;Services Religieux&quot;,
            &quot;slug&quot;: &quot;services-religieux&quot;,
            &quot;icon&quot;: &quot;🕌&quot;,
            &quot;description&quot;: null,
            &quot;parent_id&quot;: null,
            &quot;children&quot;: [
                {
                    &quot;id&quot;: 49,
                    &quot;name&quot;: &quot;Vente de livres islamiques&quot;,
                    &quot;slug&quot;: &quot;vente-de-livres-islamiques&quot;,
                    &quot;icon&quot;: &quot;🕌&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 48
                },
                {
                    &quot;id&quot;: 50,
                    &quot;name&quot;: &quot;Chapelets &amp; articles religieux&quot;,
                    &quot;slug&quot;: &quot;chapelets-articles-religieux&quot;,
                    &quot;icon&quot;: &quot;🕌&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 48
                },
                {
                    &quot;id&quot;: 51,
                    &quot;name&quot;: &quot;Photos &amp; tableaux de Touba&quot;,
                    &quot;slug&quot;: &quot;photos-tableaux-de-touba&quot;,
                    &quot;icon&quot;: &quot;🕌&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 48
                },
                {
                    &quot;id&quot;: 52,
                    &quot;name&quot;: &quot;Parfums &amp; encens&quot;,
                    &quot;slug&quot;: &quot;parfums-encens&quot;,
                    &quot;icon&quot;: &quot;🕌&quot;,
                    &quot;description&quot;: null,
                    &quot;parent_id&quot;: 48
                }
            ]
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categories"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-categories" data-method="GET"
      data-path="api/categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-categories"
                    onclick="tryItOut('GETapi-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-categories"
                    onclick="cancelTryOut('GETapi-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-categories"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
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
<p>Example: <code>application/json</code></p>
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
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-categories--category_id-">GET api/categories/{category_id}</h2>

<p>
</p>



<span id="example-requests-GETapi-categories--category_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/categories/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/categories/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-categories--category_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Commerce &amp; Distribution&quot;,
        &quot;slug&quot;: &quot;commerce-distribution&quot;,
        &quot;icon&quot;: &quot;🛒&quot;,
        &quot;description&quot;: null,
        &quot;parent_id&quot;: null,
        &quot;children&quot;: [
            {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;&Eacute;piceries &amp; alimentation africaine&quot;,
                &quot;slug&quot;: &quot;epiceries-alimentation-africaine&quot;,
                &quot;icon&quot;: &quot;🛒&quot;,
                &quot;description&quot;: null,
                &quot;parent_id&quot;: 1
            },
            {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Import-export&quot;,
                &quot;slug&quot;: &quot;import-export&quot;,
                &quot;icon&quot;: &quot;🛒&quot;,
                &quot;description&quot;: null,
                &quot;parent_id&quot;: 1
            },
            {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Grossistes &amp; d&eacute;taillants&quot;,
                &quot;slug&quot;: &quot;grossistes-detaillants&quot;,
                &quot;icon&quot;: &quot;🛒&quot;,
                &quot;description&quot;: null,
                &quot;parent_id&quot;: 1
            },
            {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Produits s&eacute;n&eacute;galais en diaspora&quot;,
                &quot;slug&quot;: &quot;produits-senegalais-en-diaspora&quot;,
                &quot;icon&quot;: &quot;🛒&quot;,
                &quot;description&quot;: null,
                &quot;parent_id&quot;: 1
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-categories--category_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-categories--category_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categories--category_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-categories--category_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categories--category_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-categories--category_id-" data-method="GET"
      data-path="api/categories/{category_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-categories--category_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-categories--category_id-"
                    onclick="tryItOut('GETapi-categories--category_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-categories--category_id-"
                    onclick="cancelTryOut('GETapi-categories--category_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-categories--category_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/categories/{category_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-categories--category_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-categories--category_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="category_id"                data-endpoint="GETapi-categories--category_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the category. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-shops">GET api/shops</h2>

<p>
</p>



<span id="example-requests-GETapi-shops">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/shops" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/shops"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-shops">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Baay Fall Textiles&quot;,
            &quot;slug&quot;: &quot;baay-fall-textiles-6798&quot;,
            &quot;description&quot;: &quot;Tenetur est non alias. Sed quisquam aperiam voluptas dolores molestias dicta autem. Qui delectus ut alias velit omnis ducimus dignissimos.\n\nSimilique enim aut aut qui. Occaecati aspernatur consectetur ea. Debitis dolores ipsa eos in. Odit sit qui omnis voluptates ratione rerum velit.&quot;,
            &quot;logo&quot;: null,
            &quot;cover_image&quot;: null,
            &quot;country&quot;: &quot;US&quot;,
            &quot;city&quot;: &quot;New York&quot;,
            &quot;phone&quot;: &quot;+221 15 172 33 01&quot;,
            &quot;whatsapp&quot;: &quot;+221 00 002 01 53&quot;,
            &quot;email&quot;: &quot;aurelio.stanton@bashirian.org&quot;,
            &quot;website&quot;: null,
            &quot;level&quot;: &quot;basic&quot;,
            &quot;is_verified&quot;: false,
            &quot;views_count&quot;: 2685,
            &quot;contacts_count&quot;: 28,
            &quot;owner&quot;: {
                &quot;id&quot;: 30,
                &quot;name&quot;: &quot;Ibrahima Seck&quot;,
                &quot;email&quot;: &quot;ibrahima.seck238@gmail.com&quot;
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Touba D&eacute;lices&quot;,
            &quot;slug&quot;: &quot;touba-delices-2354&quot;,
            &quot;description&quot;: &quot;Nihil voluptates possimus tenetur vitae repellat perspiciatis consequatur qui. Excepturi ut nam tempore dolorum aperiam optio. Eius eius ipsam sint quaerat repudiandae.\n\nPerspiciatis et aut reiciendis dolorem. Quod facilis quaerat porro rem nesciunt. Itaque saepe dolores quo reprehenderit consequuntur.&quot;,
            &quot;logo&quot;: null,
            &quot;cover_image&quot;: null,
            &quot;country&quot;: &quot;CA&quot;,
            &quot;city&quot;: &quot;Montr&eacute;al&quot;,
            &quot;phone&quot;: &quot;+221 98 418 96 92&quot;,
            &quot;whatsapp&quot;: &quot;+221 30 246 83 81&quot;,
            &quot;email&quot;: &quot;domenick22@lockman.org&quot;,
            &quot;website&quot;: &quot;http://quitzon.com/&quot;,
            &quot;level&quot;: &quot;premium&quot;,
            &quot;is_verified&quot;: true,
            &quot;views_count&quot;: 2999,
            &quot;contacts_count&quot;: 217,
            &quot;owner&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Serigne Thiam&quot;,
                &quot;email&quot;: &quot;serigne.thiam914@gmail.com&quot;
            }
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Ndigu&euml;l Services&quot;,
            &quot;slug&quot;: &quot;ndiguel-services-6468&quot;,
            &quot;description&quot;: &quot;Qui eius adipisci aut maxime qui exercitationem. Laudantium reprehenderit praesentium ratione alias qui. Velit minus aspernatur non numquam sint. Eos aut quia et architecto vel.\n\nEa dolorum culpa reprehenderit facere libero perferendis dolores. Numquam consequatur itaque eum distinctio quaerat. Quo voluptates sint perferendis animi et repellat.&quot;,
            &quot;logo&quot;: null,
            &quot;cover_image&quot;: null,
            &quot;country&quot;: &quot;SN&quot;,
            &quot;city&quot;: &quot;Thi&egrave;s&quot;,
            &quot;phone&quot;: &quot;+221 54 917 90 67&quot;,
            &quot;whatsapp&quot;: &quot;+221 59 599 31 08&quot;,
            &quot;email&quot;: &quot;purdy.hope@mitchell.com&quot;,
            &quot;website&quot;: &quot;https://www.heller.com/aliquam-natus-sequi-atque-consequatur-necessitatibus-sapiente-optio&quot;,
            &quot;level&quot;: &quot;premium&quot;,
            &quot;is_verified&quot;: false,
            &quot;views_count&quot;: 4501,
            &quot;contacts_count&quot;: 348,
            &quot;owner&quot;: {
                &quot;id&quot;: 33,
                &quot;name&quot;: &quot;Serigne Sarr&quot;,
                &quot;email&quot;: &quot;serigne.sarr685@gmail.com&quot;
            }
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Dakar Mode&quot;,
            &quot;slug&quot;: &quot;dakar-mode-3717&quot;,
            &quot;description&quot;: &quot;Quo illum libero non expedita cumque sint. Ex dignissimos unde exercitationem repudiandae. Et amet voluptatem voluptatem dolores fuga quod. Distinctio quia et consequatur.\n\nRatione voluptatem dolor ducimus esse sunt et quo. Dolores possimus voluptatum quasi sed. Non aut sunt velit dolor. Eum dolorum sit sapiente incidunt consectetur numquam sed.&quot;,
            &quot;logo&quot;: null,
            &quot;cover_image&quot;: null,
            &quot;country&quot;: &quot;SN&quot;,
            &quot;city&quot;: &quot;Diourbel&quot;,
            &quot;phone&quot;: &quot;+221 59 887 05 07&quot;,
            &quot;whatsapp&quot;: &quot;+221 10 741 16 77&quot;,
            &quot;email&quot;: &quot;terry.natalia@jacobs.com&quot;,
            &quot;website&quot;: null,
            &quot;level&quot;: &quot;basic&quot;,
            &quot;is_verified&quot;: false,
            &quot;views_count&quot;: 3591,
            &quot;contacts_count&quot;: 44,
            &quot;owner&quot;: {
                &quot;id&quot;: 39,
                &quot;name&quot;: &quot;Abdoulaye Manga&quot;,
                &quot;email&quot;: &quot;abdoulaye.manga811@gmail.com&quot;
            }
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Mouride Import Export&quot;,
            &quot;slug&quot;: &quot;mouride-import-export-8996&quot;,
            &quot;description&quot;: &quot;Eius soluta officiis reprehenderit deserunt quam voluptatem ipsam. Aliquid ut similique molestiae voluptates laudantium. Voluptate eos sunt perspiciatis quia asperiores sit cupiditate.\n\nInventore labore autem possimus vitae eum quis aut. Nulla laboriosam non at iusto.&quot;,
            &quot;logo&quot;: null,
            &quot;cover_image&quot;: null,
            &quot;country&quot;: &quot;FR&quot;,
            &quot;city&quot;: &quot;Marseille&quot;,
            &quot;phone&quot;: &quot;+221 60 482 91 23&quot;,
            &quot;whatsapp&quot;: &quot;+221 30 701 82 48&quot;,
            &quot;email&quot;: &quot;shana.conn@ebert.biz&quot;,
            &quot;website&quot;: &quot;http://www.kohler.com/&quot;,
            &quot;level&quot;: &quot;basic&quot;,
            &quot;is_verified&quot;: true,
            &quot;views_count&quot;: 3201,
            &quot;contacts_count&quot;: 436,
            &quot;owner&quot;: {
                &quot;id&quot;: 12,
                &quot;name&quot;: &quot;Seynabou Diallo&quot;,
                &quot;email&quot;: &quot;seynabou.diallo140@gmail.com&quot;
            }
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;Xam-Xam Formation&quot;,
            &quot;slug&quot;: &quot;xam-xam-formation-7859&quot;,
            &quot;description&quot;: &quot;Quia quo similique perspiciatis ut pariatur sit consequatur. Est ullam quis et qui. Cum nam amet ut provident officiis omnis iure. Voluptas est praesentium sunt culpa.\n\nBlanditiis fuga ullam aperiam et est et debitis sequi. Esse saepe iure qui consequatur quod laborum inventore. Et eius unde sequi dolorem ut aut aut voluptate.&quot;,
            &quot;logo&quot;: null,
            &quot;cover_image&quot;: null,
            &quot;country&quot;: &quot;SN&quot;,
            &quot;city&quot;: &quot;Dakar&quot;,
            &quot;phone&quot;: &quot;+221 69 143 33 69&quot;,
            &quot;whatsapp&quot;: &quot;+221 42 760 44 33&quot;,
            &quot;email&quot;: &quot;lang.maude@marks.com&quot;,
            &quot;website&quot;: &quot;http://bernier.com/voluptatibus-eos-a-quod-fugiat-architecto-tempora-expedita-quia&quot;,
            &quot;level&quot;: &quot;basic&quot;,
            &quot;is_verified&quot;: true,
            &quot;views_count&quot;: 1852,
            &quot;contacts_count&quot;: 259,
            &quot;owner&quot;: {
                &quot;id&quot;: 41,
                &quot;name&quot;: &quot;Mariama Fall&quot;,
                &quot;email&quot;: &quot;mariama.fall172@gmail.com&quot;
            }
        },
        {
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;Touba Cosmetics&quot;,
            &quot;slug&quot;: &quot;touba-cosmetics-380&quot;,
            &quot;description&quot;: &quot;Et eaque laudantium ad natus rerum nostrum. Tenetur quisquam voluptatem ipsum esse. Temporibus omnis velit amet nihil possimus quo officia. Ipsam perspiciatis facere modi.\n\nFugiat voluptate sed enim dignissimos qui. Quia quam et corrupti sed ipsam. Necessitatibus autem nostrum quos voluptas iste.&quot;,
            &quot;logo&quot;: null,
            &quot;cover_image&quot;: null,
            &quot;country&quot;: &quot;SN&quot;,
            &quot;city&quot;: &quot;Touba&quot;,
            &quot;phone&quot;: &quot;+221 26 139 96 20&quot;,
            &quot;whatsapp&quot;: &quot;+221 30 578 77 23&quot;,
            &quot;email&quot;: &quot;nwuckert@rohan.com&quot;,
            &quot;website&quot;: null,
            &quot;level&quot;: &quot;basic&quot;,
            &quot;is_verified&quot;: false,
            &quot;views_count&quot;: 4557,
            &quot;contacts_count&quot;: 274,
            &quot;owner&quot;: {
                &quot;id&quot;: 16,
                &quot;name&quot;: &quot;Rokhaya Diallo&quot;,
                &quot;email&quot;: &quot;rokhaya.diallo65@gmail.com&quot;
            }
        },
        {
            &quot;id&quot;: 8,
            &quot;name&quot;: &quot;S&eacute;n&eacute;gal Artisanat&quot;,
            &quot;slug&quot;: &quot;senegal-artisanat-514&quot;,
            &quot;description&quot;: &quot;Corporis quis earum cum molestiae dolorem. Id et repellendus vitae ratione officiis officiis. Veniam suscipit nisi architecto magni quia nihil.\n\nTemporibus reiciendis ipsum aut. Unde minus non architecto optio. Deserunt ipsa modi eos est.&quot;,
            &quot;logo&quot;: null,
            &quot;cover_image&quot;: null,
            &quot;country&quot;: &quot;SN&quot;,
            &quot;city&quot;: &quot;Thi&egrave;s&quot;,
            &quot;phone&quot;: &quot;+221 05 506 07 15&quot;,
            &quot;whatsapp&quot;: &quot;+221 20 456 61 94&quot;,
            &quot;email&quot;: &quot;rau.danny@deckow.info&quot;,
            &quot;website&quot;: null,
            &quot;level&quot;: &quot;premium&quot;,
            &quot;is_verified&quot;: false,
            &quot;views_count&quot;: 4782,
            &quot;contacts_count&quot;: 38,
            &quot;owner&quot;: {
                &quot;id&quot;: 14,
                &quot;name&quot;: &quot;Saliou Diagne&quot;,
                &quot;email&quot;: &quot;saliou.diagne720@gmail.com&quot;
            }
        },
        {
            &quot;id&quot;: 9,
            &quot;name&quot;: &quot;Diaspora Connect&quot;,
            &quot;slug&quot;: &quot;diaspora-connect-3314&quot;,
            &quot;description&quot;: &quot;Repellat alias earum est ullam natus corporis. Nihil beatae error saepe beatae quasi corporis eligendi. Dolore nisi quae sed sit assumenda corporis.\n\nFugit sit blanditiis aut. Rerum odio neque facere qui facere. Debitis ut deleniti non odit voluptate.&quot;,
            &quot;logo&quot;: null,
            &quot;cover_image&quot;: null,
            &quot;country&quot;: &quot;BE&quot;,
            &quot;city&quot;: &quot;Bruxelles&quot;,
            &quot;phone&quot;: &quot;+221 13 353 69 08&quot;,
            &quot;whatsapp&quot;: &quot;+221 03 400 37 39&quot;,
            &quot;email&quot;: &quot;hwuckert@douglas.net&quot;,
            &quot;website&quot;: &quot;http://www.runte.net/doloribus-perspiciatis-aut-deleniti-culpa.html&quot;,
            &quot;level&quot;: &quot;basic&quot;,
            &quot;is_verified&quot;: false,
            &quot;views_count&quot;: 2915,
            &quot;contacts_count&quot;: 370,
            &quot;owner&quot;: {
                &quot;id&quot;: 12,
                &quot;name&quot;: &quot;Seynabou Diallo&quot;,
                &quot;email&quot;: &quot;seynabou.diallo140@gmail.com&quot;
            }
        },
        {
            &quot;id&quot;: 10,
            &quot;name&quot;: &quot;Modou-Modou Shop&quot;,
            &quot;slug&quot;: &quot;modou-modou-shop-4186&quot;,
            &quot;description&quot;: &quot;Vitae sit rerum ut eveniet recusandae et quisquam praesentium. Non eaque suscipit suscipit. Eius ratione iusto laboriosam quasi assumenda veritatis.\n\nIure esse repellendus exercitationem ratione deleniti debitis odit. Iste praesentium optio perferendis ut. Ut eum minus quia quos. Recusandae beatae voluptatem mollitia dolorem.&quot;,
            &quot;logo&quot;: null,
            &quot;cover_image&quot;: null,
            &quot;country&quot;: &quot;SN&quot;,
            &quot;city&quot;: &quot;Diourbel&quot;,
            &quot;phone&quot;: &quot;+221 57 087 59 52&quot;,
            &quot;whatsapp&quot;: &quot;+221 93 324 08 57&quot;,
            &quot;email&quot;: &quot;eldred.ebert@botsford.com&quot;,
            &quot;website&quot;: &quot;http://emmerich.org/&quot;,
            &quot;level&quot;: &quot;basic&quot;,
            &quot;is_verified&quot;: true,
            &quot;views_count&quot;: 1093,
            &quot;contacts_count&quot;: 412,
            &quot;owner&quot;: {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Nd&eacute;ye Kane&quot;,
                &quot;email&quot;: &quot;nd&eacute;ye.kane590@gmail.com&quot;
            }
        },
        {
            &quot;id&quot;: 11,
            &quot;name&quot;: &quot;Caf&eacute; Touba Paris&quot;,
            &quot;slug&quot;: &quot;cafe-touba-paris-9352&quot;,
            &quot;description&quot;: &quot;Quibusdam quibusdam molestiae cumque animi. Quia temporibus ad voluptatibus eius provident. Minima et aliquid unde non.\n\nSit culpa consequatur voluptate fuga est alias. Corporis sunt dolores voluptatem id omnis. Expedita nostrum tempora qui reprehenderit. Et id eveniet provident nam velit accusamus odio.&quot;,
            &quot;logo&quot;: null,
            &quot;cover_image&quot;: null,
            &quot;country&quot;: &quot;CA&quot;,
            &quot;city&quot;: &quot;Montr&eacute;al&quot;,
            &quot;phone&quot;: &quot;+221 21 883 66 83&quot;,
            &quot;whatsapp&quot;: &quot;+221 34 922 23 59&quot;,
            &quot;email&quot;: &quot;gunner80@goldner.com&quot;,
            &quot;website&quot;: null,
            &quot;level&quot;: &quot;basic&quot;,
            &quot;is_verified&quot;: false,
            &quot;views_count&quot;: 404,
            &quot;contacts_count&quot;: 178,
            &quot;owner&quot;: {
                &quot;id&quot;: 29,
                &quot;name&quot;: &quot;Seynabou Diallo&quot;,
                &quot;email&quot;: &quot;seynabou.diallo300@gmail.com&quot;
            }
        },
        {
            &quot;id&quot;: 12,
            &quot;name&quot;: &quot;Wax &amp; Bazin Premium&quot;,
            &quot;slug&quot;: &quot;wax-bazin-premium-4613&quot;,
            &quot;description&quot;: &quot;Voluptatum ad ut corporis tempora non. Et non quod deserunt voluptas dolorem ea reprehenderit. Doloribus illo blanditiis accusamus autem ipsa praesentium inventore. Quia magnam numquam voluptatem rerum blanditiis repellendus.\n\nCorrupti doloribus suscipit est est quae earum commodi molestiae. Ex nam ipsam aut autem.&quot;,
            &quot;logo&quot;: null,
            &quot;cover_image&quot;: null,
            &quot;country&quot;: &quot;US&quot;,
            &quot;city&quot;: &quot;New York&quot;,
            &quot;phone&quot;: &quot;+221 19 814 11 08&quot;,
            &quot;whatsapp&quot;: &quot;+221 26 245 40 29&quot;,
            &quot;email&quot;: &quot;corkery.tom@skiles.com&quot;,
            &quot;website&quot;: &quot;http://www.goodwin.com/&quot;,
            &quot;level&quot;: &quot;premium&quot;,
            &quot;is_verified&quot;: true,
            &quot;views_count&quot;: 4836,
            &quot;contacts_count&quot;: 126,
            &quot;owner&quot;: {
                &quot;id&quot;: 31,
                &quot;name&quot;: &quot;Ibrahima Diouf&quot;,
                &quot;email&quot;: &quot;ibrahima.diouf307@gmail.com&quot;
            }
        },
        {
            &quot;id&quot;: 13,
            &quot;name&quot;: &quot;Cheikh Ibra Mode&quot;,
            &quot;slug&quot;: &quot;cheikh-ibra-mode-3829&quot;,
            &quot;description&quot;: &quot;Nostrum tenetur sint asperiores et quod cumque. Atque quos fuga quidem. Et quia impedit debitis cumque porro officia dignissimos.\n\nPlaceat quia alias porro ab. Minus est ipsa voluptas voluptatem aut. Ex quae aliquid ea qui. Cumque iure accusantium in suscipit iusto quaerat.&quot;,
            &quot;logo&quot;: null,
            &quot;cover_image&quot;: null,
            &quot;country&quot;: &quot;SN&quot;,
            &quot;city&quot;: &quot;Touba&quot;,
            &quot;phone&quot;: &quot;+221 26 060 30 42&quot;,
            &quot;whatsapp&quot;: &quot;+221 93 534 20 10&quot;,
            &quot;email&quot;: &quot;alexandrea14@mohr.com&quot;,
            &quot;website&quot;: &quot;http://www.smith.info/eos-voluptates-ut-a-numquam-eum-ad&quot;,
            &quot;level&quot;: &quot;premium&quot;,
            &quot;is_verified&quot;: false,
            &quot;views_count&quot;: 729,
            &quot;contacts_count&quot;: 328,
            &quot;owner&quot;: {
                &quot;id&quot;: 51,
                &quot;name&quot;: &quot;Rokhaya Sow&quot;,
                &quot;email&quot;: &quot;rokhaya.sow564@gmail.com&quot;
            }
        },
        {
            &quot;id&quot;: 14,
            &quot;name&quot;: &quot;Serigne Touba Store&quot;,
            &quot;slug&quot;: &quot;serigne-touba-store-247&quot;,
            &quot;description&quot;: &quot;Totam eveniet odit doloremque libero sit odio. Temporibus occaecati ex qui harum culpa optio ab. In odit nostrum velit suscipit qui aspernatur dolorem voluptate. Deserunt fuga id harum in consequatur voluptatibus.\n\nRerum necessitatibus voluptatem repudiandae magnam ut. Architecto molestias est quas consequatur temporibus rerum. Est repellendus in aperiam voluptas consequatur ipsam aut ut.&quot;,
            &quot;logo&quot;: null,
            &quot;cover_image&quot;: null,
            &quot;country&quot;: &quot;BE&quot;,
            &quot;city&quot;: &quot;Bruxelles&quot;,
            &quot;phone&quot;: &quot;+221 82 072 34 46&quot;,
            &quot;whatsapp&quot;: &quot;+221 86 543 54 75&quot;,
            &quot;email&quot;: &quot;lindsay.waelchi@bailey.org&quot;,
            &quot;website&quot;: null,
            &quot;level&quot;: &quot;pro&quot;,
            &quot;is_verified&quot;: true,
            &quot;views_count&quot;: 606,
            &quot;contacts_count&quot;: 385,
            &quot;owner&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Vendeur Test&quot;,
                &quot;email&quot;: &quot;vendor@souk-mouride.com&quot;
            }
        },
        {
            &quot;id&quot;: 15,
            &quot;name&quot;: &quot;Ndig&euml;l BTP&quot;,
            &quot;slug&quot;: &quot;ndigel-btp-1642&quot;,
            &quot;description&quot;: &quot;Magni mollitia voluptas quis autem ut. Quo placeat aut itaque consequatur et. Aut aut quos vel ut deserunt. Explicabo ut temporibus repellat maxime.\n\nAb inventore fugit ducimus. Repellat sunt tenetur quibusdam odio aperiam beatae maiores perspiciatis. Provident dolor veritatis aut dignissimos enim.&quot;,
            &quot;logo&quot;: null,
            &quot;cover_image&quot;: null,
            &quot;country&quot;: &quot;IT&quot;,
            &quot;city&quot;: &quot;Rome&quot;,
            &quot;phone&quot;: &quot;+221 47 327 68 90&quot;,
            &quot;whatsapp&quot;: &quot;+221 21 592 15 39&quot;,
            &quot;email&quot;: &quot;mervin.pagac@auer.com&quot;,
            &quot;website&quot;: null,
            &quot;level&quot;: &quot;basic&quot;,
            &quot;is_verified&quot;: false,
            &quot;views_count&quot;: 4092,
            &quot;contacts_count&quot;: 435,
            &quot;owner&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Oumar Sy&quot;,
                &quot;email&quot;: &quot;oumar.sy252@gmail.com&quot;
            }
        },
        {
            &quot;id&quot;: 16,
            &quot;name&quot;: &quot;Baobab Saveurs&quot;,
            &quot;slug&quot;: &quot;baobab-saveurs-9736&quot;,
            &quot;description&quot;: &quot;Veniam sed officiis atque fugit. Corrupti molestiae accusamus aut eaque totam qui consequuntur. Voluptatum sed nam perferendis et suscipit.\n\nVoluptate quis voluptate ut recusandae commodi culpa. Ut maxime ipsum iusto blanditiis aut eveniet. Vitae voluptatem aliquid et a. Ut inventore aut sequi fugiat nulla.&quot;,
            &quot;logo&quot;: null,
            &quot;cover_image&quot;: null,
            &quot;country&quot;: &quot;CH&quot;,
            &quot;city&quot;: &quot;Gen&egrave;ve&quot;,
            &quot;phone&quot;: &quot;+221 58 304 17 15&quot;,
            &quot;whatsapp&quot;: &quot;+221 99 325 85 89&quot;,
            &quot;email&quot;: &quot;brisa23@steuber.com&quot;,
            &quot;website&quot;: &quot;http://www.rohan.org/aperiam-sit-rerum-adipisci-voluptas&quot;,
            &quot;level&quot;: &quot;basic&quot;,
            &quot;is_verified&quot;: false,
            &quot;views_count&quot;: 1952,
            &quot;contacts_count&quot;: 259,
            &quot;owner&quot;: {
                &quot;id&quot;: 19,
                &quot;name&quot;: &quot;Assane Thiam&quot;,
                &quot;email&quot;: &quot;assane.thiam119@gmail.com&quot;
            }
        },
        {
            &quot;id&quot;: 17,
            &quot;name&quot;: &quot;Thi&eacute;bou Dieune Traiteur&quot;,
            &quot;slug&quot;: &quot;thiebou-dieune-traiteur-9743&quot;,
            &quot;description&quot;: &quot;Nihil incidunt ut consequuntur. Eveniet ab dolorem totam quis. Ut suscipit aut dicta et dolores magnam. Nihil fuga tempore aliquid suscipit explicabo iste officia.\n\nVoluptas ut cupiditate ut. Non repellat aspernatur quo impedit ratione rerum. Eveniet qui repellat similique eos totam delectus quia.&quot;,
            &quot;logo&quot;: null,
            &quot;cover_image&quot;: null,
            &quot;country&quot;: &quot;FR&quot;,
            &quot;city&quot;: &quot;Paris&quot;,
            &quot;phone&quot;: &quot;+221 46 659 57 75&quot;,
            &quot;whatsapp&quot;: &quot;+221 93 347 17 90&quot;,
            &quot;email&quot;: &quot;oflatley@adams.com&quot;,
            &quot;website&quot;: &quot;http://cruickshank.com/&quot;,
            &quot;level&quot;: &quot;basic&quot;,
            &quot;is_verified&quot;: true,
            &quot;views_count&quot;: 1397,
            &quot;contacts_count&quot;: 152,
            &quot;owner&quot;: {
                &quot;id&quot;: 33,
                &quot;name&quot;: &quot;Serigne Sarr&quot;,
                &quot;email&quot;: &quot;serigne.sarr685@gmail.com&quot;
            }
        },
        {
            &quot;id&quot;: 18,
            &quot;name&quot;: &quot;Jolof Rice Catering&quot;,
            &quot;slug&quot;: &quot;jolof-rice-catering-9695&quot;,
            &quot;description&quot;: &quot;Ducimus vel dolorem qui est nihil dolorem itaque necessitatibus. Omnis voluptatem commodi odit animi velit. Enim molestias dignissimos rerum et cum accusantium ut soluta. Eveniet cum eius nostrum nisi ad blanditiis et cumque.\n\nInventore atque provident repellat voluptas. Aspernatur repudiandae ratione voluptatum non rerum et quidem et. Et asperiores velit placeat commodi eos aut asperiores. Tempora voluptatem sequi illum blanditiis.&quot;,
            &quot;logo&quot;: null,
            &quot;cover_image&quot;: null,
            &quot;country&quot;: &quot;SN&quot;,
            &quot;city&quot;: &quot;Dakar&quot;,
            &quot;phone&quot;: &quot;+221 19 079 21 71&quot;,
            &quot;whatsapp&quot;: &quot;+221 12 894 18 38&quot;,
            &quot;email&quot;: &quot;gvonrueden@gutkowski.com&quot;,
            &quot;website&quot;: null,
            &quot;level&quot;: &quot;basic&quot;,
            &quot;is_verified&quot;: true,
            &quot;views_count&quot;: 2368,
            &quot;contacts_count&quot;: 341,
            &quot;owner&quot;: {
                &quot;id&quot;: 43,
                &quot;name&quot;: &quot;Aissatou Camara&quot;,
                &quot;email&quot;: &quot;aissatou.camara284@gmail.com&quot;
            }
        },
        {
            &quot;id&quot;: 19,
            &quot;name&quot;: &quot;Grand Boubou Couture&quot;,
            &quot;slug&quot;: &quot;grand-boubou-couture-6844&quot;,
            &quot;description&quot;: &quot;Excepturi facilis omnis optio et consectetur sapiente. Qui quia et rerum enim vel. Deleniti magnam amet dolore facere. Aut dolore mollitia soluta distinctio voluptatem nostrum vel error.\n\nIn quidem voluptatem illo earum quos eum. Eaque vel praesentium veritatis ex laborum iusto. Et explicabo nostrum et ipsum fugiat. Error inventore doloribus voluptatem placeat dolores mollitia.&quot;,
            &quot;logo&quot;: null,
            &quot;cover_image&quot;: null,
            &quot;country&quot;: &quot;ES&quot;,
            &quot;city&quot;: &quot;Barcelone&quot;,
            &quot;phone&quot;: &quot;+221 77 873 11 11&quot;,
            &quot;whatsapp&quot;: &quot;+221 95 054 05 75&quot;,
            &quot;email&quot;: &quot;mosciski.marlene@bogan.net&quot;,
            &quot;website&quot;: null,
            &quot;level&quot;: &quot;pro&quot;,
            &quot;is_verified&quot;: false,
            &quot;views_count&quot;: 4835,
            &quot;contacts_count&quot;: 404,
            &quot;owner&quot;: {
                &quot;id&quot;: 31,
                &quot;name&quot;: &quot;Ibrahima Diouf&quot;,
                &quot;email&quot;: &quot;ibrahima.diouf307@gmail.com&quot;
            }
        },
        {
            &quot;id&quot;: 20,
            &quot;name&quot;: &quot;S&eacute;n&eacute;gal Fresh Products&quot;,
            &quot;slug&quot;: &quot;senegal-fresh-products-9518&quot;,
            &quot;description&quot;: &quot;Dolorem aut rerum ipsa sint. Voluptatum quam nisi nemo iste adipisci totam inventore. Exercitationem nemo et cumque officia voluptatem sit.\n\nProvident perferendis facilis distinctio esse provident non distinctio. Nisi hic fuga consequatur ut totam. Necessitatibus sequi nihil voluptas officiis. Maxime eos et quisquam tempore sit.&quot;,
            &quot;logo&quot;: null,
            &quot;cover_image&quot;: null,
            &quot;country&quot;: &quot;FR&quot;,
            &quot;city&quot;: &quot;Lyon&quot;,
            &quot;phone&quot;: &quot;+221 29 003 94 08&quot;,
            &quot;whatsapp&quot;: &quot;+221 40 754 27 47&quot;,
            &quot;email&quot;: &quot;clement60@stracke.org&quot;,
            &quot;website&quot;: &quot;http://www.stokes.com/voluptatem-aut-ut-et-ducimus-voluptates&quot;,
            &quot;level&quot;: &quot;premium&quot;,
            &quot;is_verified&quot;: true,
            &quot;views_count&quot;: 1228,
            &quot;contacts_count&quot;: 448,
            &quot;owner&quot;: {
                &quot;id&quot;: 28,
                &quot;name&quot;: &quot;Abdoulaye Fall&quot;,
                &quot;email&quot;: &quot;abdoulaye.fall602@gmail.com&quot;
            }
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://localhost:8000/api/shops?page=1&quot;,
        &quot;last&quot;: &quot;http://localhost:8000/api/shops?page=3&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: &quot;http://localhost:8000/api/shops?page=2&quot;
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 3,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/shops?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/shops?page=2&quot;,
                &quot;label&quot;: &quot;2&quot;,
                &quot;page&quot;: 2,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/shops?page=3&quot;,
                &quot;label&quot;: &quot;3&quot;,
                &quot;page&quot;: 3,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/shops?page=2&quot;,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: 2,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://localhost:8000/api/shops&quot;,
        &quot;per_page&quot;: 20,
        &quot;to&quot;: 20,
        &quot;total&quot;: 50
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-shops" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-shops"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-shops"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-shops" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-shops">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-shops" data-method="GET"
      data-path="api/shops"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-shops', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-shops"
                    onclick="tryItOut('GETapi-shops');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-shops"
                    onclick="cancelTryOut('GETapi-shops');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-shops"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/shops</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-shops"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-shops"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-shops--shop_slug-">GET api/shops/{shop_slug}</h2>

<p>
</p>



<span id="example-requests-GETapi-shops--shop_slug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/shops/baay-fall-textiles-6798" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/shops/baay-fall-textiles-6798"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-shops--shop_slug-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Baay Fall Textiles&quot;,
        &quot;slug&quot;: &quot;baay-fall-textiles-6798&quot;,
        &quot;description&quot;: &quot;Tenetur est non alias. Sed quisquam aperiam voluptas dolores molestias dicta autem. Qui delectus ut alias velit omnis ducimus dignissimos.\n\nSimilique enim aut aut qui. Occaecati aspernatur consectetur ea. Debitis dolores ipsa eos in. Odit sit qui omnis voluptates ratione rerum velit.&quot;,
        &quot;logo&quot;: null,
        &quot;cover_image&quot;: null,
        &quot;country&quot;: &quot;US&quot;,
        &quot;city&quot;: &quot;New York&quot;,
        &quot;phone&quot;: &quot;+221 15 172 33 01&quot;,
        &quot;whatsapp&quot;: &quot;+221 00 002 01 53&quot;,
        &quot;email&quot;: &quot;aurelio.stanton@bashirian.org&quot;,
        &quot;website&quot;: null,
        &quot;level&quot;: &quot;basic&quot;,
        &quot;is_verified&quot;: false,
        &quot;views_count&quot;: 2686,
        &quot;contacts_count&quot;: 28,
        &quot;owner&quot;: {
            &quot;id&quot;: 30,
            &quot;name&quot;: &quot;Ibrahima Seck&quot;,
            &quot;email&quot;: &quot;ibrahima.seck238@gmail.com&quot;
        },
        &quot;products&quot;: []
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-shops--shop_slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-shops--shop_slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-shops--shop_slug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-shops--shop_slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-shops--shop_slug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-shops--shop_slug-" data-method="GET"
      data-path="api/shops/{shop_slug}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-shops--shop_slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-shops--shop_slug-"
                    onclick="tryItOut('GETapi-shops--shop_slug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-shops--shop_slug-"
                    onclick="cancelTryOut('GETapi-shops--shop_slug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-shops--shop_slug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/shops/{shop_slug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-shops--shop_slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-shops--shop_slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>shop_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="shop_slug"                data-endpoint="GETapi-shops--shop_slug-"
               value="baay-fall-textiles-6798"
               data-component="url">
    <br>
<p>The slug of the shop. Example: <code>baay-fall-textiles-6798</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-products">Liste des produits</h2>

<p>
</p>

<p>Retourne la liste paginée des produits actifs avec filtres optionnels.</p>

<span id="example-requests-GETapi-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/products?page=1&amp;per_page=24&amp;search=boubou&amp;category=3&amp;parent_category=1&amp;featured=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/products"
);

const params = {
    "page": "1",
    "per_page": "24",
    "search": "boubou",
    "category": "3",
    "parent_category": "1",
    "featured": "1",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-products">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://localhost:8000/api/products?page=1&quot;,
        &quot;last&quot;: &quot;http://localhost:8000/api/products?page=1&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: null
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: null,
        &quot;last_page&quot;: 1,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/products?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://localhost:8000/api/products&quot;,
        &quot;per_page&quot;: 24,
        &quot;to&quot;: null,
        &quot;total&quot;: 0
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-products" data-method="GET"
      data-path="api/products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products"
                    onclick="tryItOut('GETapi-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products"
                    onclick="cancelTryOut('GETapi-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
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
<p>Example: <code>application/json</code></p>
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
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-products"
               value="1"
               data-component="query">
    <br>
<p>Numéro de page. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-products"
               value="24"
               data-component="query">
    <br>
<p>Nombre de résultats par page (max 100). Example: <code>24</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-products"
               value="boubou"
               data-component="query">
    <br>
<p>Recherche par nom. Example: <code>boubou</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="category"                data-endpoint="GETapi-products"
               value="3"
               data-component="query">
    <br>
<p>ID d'une sous-catégorie. Example: <code>3</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>parent_category</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="parent_category"                data-endpoint="GETapi-products"
               value="1"
               data-component="query">
    <br>
<p>ID d'une catégorie parente. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>featured</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="GETapi-products" style="display: none">
            <input type="radio" name="featured"
                   value="1"
                   data-endpoint="GETapi-products"
                   data-component="query"             >
            <code>true</code>
        </label>
        <label data-endpoint="GETapi-products" style="display: none">
            <input type="radio" name="featured"
                   value="0"
                   data-endpoint="GETapi-products"
                   data-component="query"             >
            <code>false</code>
        </label>
    <br>
<p>Filtrer les produits en avant. Example: <code>true</code></p>
            </div>
                </form>

                    <h2 id="endpoints-GETapi-products--product_slug-">GET api/products/{product_slug}</h2>

<p>
</p>



<span id="example-requests-GETapi-products--product_slug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/products/grand-boubou-brode-homme-90010" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/products/grand-boubou-brode-homme-90010"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-products--product_slug-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Grand Boubou brod&eacute; homme&quot;,
        &quot;slug&quot;: &quot;grand-boubou-brode-homme-90010&quot;,
        &quot;description&quot;: &quot;Inventore eligendi quasi consectetur saepe doloribus minus earum ea. Suscipit vel et veniam eos.\n\nCupiditate asperiores qui quia omnis quibusdam quidem non unde. Tempora odio at veritatis non explicabo accusamus eum. Maiores cumque cumque qui eos fuga sint voluptas.\n\nUt non libero aliquid tenetur ab eveniet voluptas. Praesentium expedita vel beatae ut sint. Aut qui laborum sunt aut consequatur aliquam iste. Optio et laudantium aut est rerum.&quot;,
        &quot;price_fcfa&quot;: &quot;45000.00&quot;,
        &quot;price_eur&quot;: 68.6,
        &quot;price_promo_fcfa&quot;: null,
        &quot;price_promo_eur&quot;: null,
        &quot;unit&quot;: &quot;unit&eacute;&quot;,
        &quot;stock&quot;: 29,
        &quot;min_order&quot;: 1,
        &quot;delivery_zones&quot;: [
            &quot;France&quot;,
            &quot;S&eacute;n&eacute;gal&quot;
        ],
        &quot;delivery_delay&quot;: &quot;3-5 jours&quot;,
        &quot;delivery_free&quot;: false,
        &quot;is_available&quot;: true,
        &quot;is_featured&quot;: true,
        &quot;average_rating&quot;: 4,
        &quot;views_count&quot;: 1611,
        &quot;contacts_count&quot;: 114,
        &quot;shop&quot;: {
            &quot;id&quot;: 25,
            &quot;name&quot;: &quot;Dakar Logistics&quot;,
            &quot;slug&quot;: &quot;dakar-logistics-4158&quot;,
            &quot;description&quot;: &quot;Est iste velit in architecto et nam non sed. Occaecati consequatur exercitationem excepturi et vitae alias ut. Quod dolorem odit asperiores autem voluptatum aut. Qui rerum et quos sit temporibus labore.\n\nCorporis nemo dolores ut dolor voluptatum. Saepe eos doloremque quia nulla quisquam voluptas voluptatem quia. Nam dolor qui ut dolorem non asperiores. Accusantium voluptas eum nesciunt et veritatis.&quot;,
            &quot;logo&quot;: null,
            &quot;cover_image&quot;: null,
            &quot;country&quot;: &quot;IT&quot;,
            &quot;city&quot;: &quot;Milan&quot;,
            &quot;phone&quot;: &quot;+221 89 766 60 06&quot;,
            &quot;whatsapp&quot;: &quot;+221 85 499 75 28&quot;,
            &quot;email&quot;: &quot;carlotta28@hudson.info&quot;,
            &quot;website&quot;: &quot;https://abshire.com/placeat-at-alias-reprehenderit-autem-molestiae.html&quot;,
            &quot;level&quot;: &quot;pro&quot;,
            &quot;is_verified&quot;: false,
            &quot;views_count&quot;: 2030,
            &quot;contacts_count&quot;: 398,
            &quot;owner&quot;: {
                &quot;id&quot;: 38,
                &quot;name&quot;: &quot;Lamine Faye&quot;,
                &quot;email&quot;: &quot;lamine.faye175@gmail.com&quot;
            }
        },
        &quot;category&quot;: {
            &quot;id&quot;: 13,
            &quot;name&quot;: &quot;Couturiers &amp; tailleurs&quot;,
            &quot;slug&quot;: &quot;couturiers-tailleurs&quot;,
            &quot;icon&quot;: &quot;👗&quot;,
            &quot;description&quot;: null,
            &quot;parent_id&quot;: 12,
            &quot;parent&quot;: {
                &quot;id&quot;: 12,
                &quot;name&quot;: &quot;Mode &amp; Artisanat&quot;,
                &quot;slug&quot;: &quot;mode-artisanat&quot;,
                &quot;icon&quot;: &quot;👗&quot;,
                &quot;description&quot;: null,
                &quot;parent_id&quot;: null
            }
        },
        &quot;images&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;url&quot;: &quot;https://picsum.photos/seed/200/800/600&quot;,
                &quot;url_thumbnail&quot;: &quot;https://picsum.photos/seed/200/400/300&quot;,
                &quot;is_main&quot;: true,
                &quot;order&quot;: 0,
                &quot;alt_text&quot;: &quot;Grand Boubou brod&eacute; homme&quot;
            },
            {
                &quot;id&quot;: 2,
                &quot;url&quot;: &quot;https://picsum.photos/seed/180/800/600&quot;,
                &quot;url_thumbnail&quot;: &quot;https://picsum.photos/seed/180/400/300&quot;,
                &quot;is_main&quot;: false,
                &quot;order&quot;: 1,
                &quot;alt_text&quot;: &quot;Grand Boubou brod&eacute; homme&quot;
            },
            {
                &quot;id&quot;: 3,
                &quot;url&quot;: &quot;https://picsum.photos/seed/190/800/600&quot;,
                &quot;url_thumbnail&quot;: &quot;https://picsum.photos/seed/190/400/300&quot;,
                &quot;is_main&quot;: false,
                &quot;order&quot;: 2,
                &quot;alt_text&quot;: &quot;Grand Boubou brod&eacute; homme&quot;
            },
            {
                &quot;id&quot;: 4,
                &quot;url&quot;: &quot;https://picsum.photos/seed/130/800/600&quot;,
                &quot;url_thumbnail&quot;: &quot;https://picsum.photos/seed/130/400/300&quot;,
                &quot;is_main&quot;: false,
                &quot;order&quot;: 3,
                &quot;alt_text&quot;: &quot;Grand Boubou brod&eacute; homme&quot;
            }
        ],
        &quot;main_image&quot;: {
            &quot;id&quot;: 1,
            &quot;url&quot;: &quot;https://picsum.photos/seed/200/800/600&quot;,
            &quot;url_thumbnail&quot;: &quot;https://picsum.photos/seed/200/400/300&quot;,
            &quot;is_main&quot;: true,
            &quot;order&quot;: 0,
            &quot;alt_text&quot;: &quot;Grand Boubou brod&eacute; homme&quot;
        },
        &quot;reviews&quot;: [
            {
                &quot;id&quot;: 27,
                &quot;rating&quot;: 3,
                &quot;comment&quot;: &quot;Produit correct, correspond &agrave; la description.&quot;,
                &quot;is_verified_purchase&quot;: true,
                &quot;user&quot;: {
                    &quot;id&quot;: 40,
                    &quot;name&quot;: &quot;Pape Fall&quot;,
                    &quot;email&quot;: &quot;pape.fall920@gmail.com&quot;
                },
                &quot;created_at&quot;: &quot;2026-04-12&quot;
            },
            {
                &quot;id&quot;: 29,
                &quot;rating&quot;: 4,
                &quot;comment&quot;: &quot;Vendeur tr&egrave;s s&eacute;rieux, livraison rapide. Je recommande vivement.&quot;,
                &quot;is_verified_purchase&quot;: false,
                &quot;user&quot;: {
                    &quot;id&quot;: 43,
                    &quot;name&quot;: &quot;Aissatou Camara&quot;,
                    &quot;email&quot;: &quot;aissatou.camara284@gmail.com&quot;
                },
                &quot;created_at&quot;: &quot;2026-04-12&quot;
            },
            {
                &quot;id&quot;: 28,
                &quot;rating&quot;: 5,
                &quot;comment&quot;: &quot;Boubou superbe, tr&egrave;s bien cousu. Mon mari est ravi !&quot;,
                &quot;is_verified_purchase&quot;: true,
                &quot;user&quot;: {
                    &quot;id&quot;: 44,
                    &quot;name&quot;: &quot;Mamadou Faye&quot;,
                    &quot;email&quot;: &quot;mamadou.faye144@gmail.com&quot;
                },
                &quot;created_at&quot;: &quot;2026-04-12&quot;
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-products--product_slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-products--product_slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products--product_slug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-products--product_slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products--product_slug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-products--product_slug-" data-method="GET"
      data-path="api/products/{product_slug}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products--product_slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products--product_slug-"
                    onclick="tryItOut('GETapi-products--product_slug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products--product_slug-"
                    onclick="cancelTryOut('GETapi-products--product_slug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products--product_slug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products/{product_slug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-products--product_slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-products--product_slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product_slug"                data-endpoint="GETapi-products--product_slug-"
               value="grand-boubou-brode-homme-90010"
               data-component="url">
    <br>
<p>The slug of the product. Example: <code>grand-boubou-brode-homme-90010</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-products--product_slug--reviews">GET api/products/{product_slug}/reviews</h2>

<p>
</p>



<span id="example-requests-GETapi-products--product_slug--reviews">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/products/grand-boubou-brode-homme-90010/reviews" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/products/grand-boubou-brode-homme-90010/reviews"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-products--product_slug--reviews">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 27,
            &quot;rating&quot;: 3,
            &quot;comment&quot;: &quot;Produit correct, correspond &agrave; la description.&quot;,
            &quot;is_verified_purchase&quot;: true,
            &quot;user&quot;: {
                &quot;id&quot;: 40,
                &quot;name&quot;: &quot;Pape Fall&quot;,
                &quot;email&quot;: &quot;pape.fall920@gmail.com&quot;
            },
            &quot;created_at&quot;: &quot;2026-04-12&quot;
        },
        {
            &quot;id&quot;: 28,
            &quot;rating&quot;: 5,
            &quot;comment&quot;: &quot;Boubou superbe, tr&egrave;s bien cousu. Mon mari est ravi !&quot;,
            &quot;is_verified_purchase&quot;: true,
            &quot;user&quot;: {
                &quot;id&quot;: 44,
                &quot;name&quot;: &quot;Mamadou Faye&quot;,
                &quot;email&quot;: &quot;mamadou.faye144@gmail.com&quot;
            },
            &quot;created_at&quot;: &quot;2026-04-12&quot;
        },
        {
            &quot;id&quot;: 29,
            &quot;rating&quot;: 4,
            &quot;comment&quot;: &quot;Vendeur tr&egrave;s s&eacute;rieux, livraison rapide. Je recommande vivement.&quot;,
            &quot;is_verified_purchase&quot;: false,
            &quot;user&quot;: {
                &quot;id&quot;: 43,
                &quot;name&quot;: &quot;Aissatou Camara&quot;,
                &quot;email&quot;: &quot;aissatou.camara284@gmail.com&quot;
            },
            &quot;created_at&quot;: &quot;2026-04-12&quot;
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://localhost:8000/api/products/grand-boubou-brode-homme-90010/reviews?page=1&quot;,
        &quot;last&quot;: &quot;http://localhost:8000/api/products/grand-boubou-brode-homme-90010/reviews?page=1&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: null
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/products/grand-boubou-brode-homme-90010/reviews?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://localhost:8000/api/products/grand-boubou-brode-homme-90010/reviews&quot;,
        &quot;per_page&quot;: 15,
        &quot;to&quot;: 3,
        &quot;total&quot;: 3
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-products--product_slug--reviews" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-products--product_slug--reviews"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products--product_slug--reviews"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-products--product_slug--reviews" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products--product_slug--reviews">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-products--product_slug--reviews" data-method="GET"
      data-path="api/products/{product_slug}/reviews"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products--product_slug--reviews', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products--product_slug--reviews"
                    onclick="tryItOut('GETapi-products--product_slug--reviews');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products--product_slug--reviews"
                    onclick="cancelTryOut('GETapi-products--product_slug--reviews');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products--product_slug--reviews"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products/{product_slug}/reviews</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-products--product_slug--reviews"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-products--product_slug--reviews"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product_slug"                data-endpoint="GETapi-products--product_slug--reviews"
               value="grand-boubou-brode-homme-90010"
               data-component="url">
    <br>
<p>The slug of the product. Example: <code>grand-boubou-brode-homme-90010</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-auth-me">GET api/auth/me</h2>

<p>
</p>



<span id="example-requests-GETapi-auth-me">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/auth/me" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/me"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-auth-me">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-auth-me" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-auth-me"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-auth-me"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-auth-me" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-auth-me">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-auth-me" data-method="GET"
      data-path="api/auth/me"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-auth-me', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-auth-me"
                    onclick="tryItOut('GETapi-auth-me');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-auth-me"
                    onclick="cancelTryOut('GETapi-auth-me');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-auth-me"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/auth/me</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-auth-me"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-auth-me"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-auth-logout">POST api/auth/logout</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/auth/logout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/logout"
);

const headers = {
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
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-auth-logout" data-method="POST"
      data-path="api/auth/logout"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-logout"
                    onclick="tryItOut('POSTapi-auth-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-logout"
                    onclick="cancelTryOut('POSTapi-auth-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-logout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
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
<p>Example: <code>application/json</code></p>
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
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-shops">POST api/shops</h2>

<p>
</p>



<span id="example-requests-POSTapi-shops">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/shops" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "name=b"\
    --form "description=Eius et animi quos velit et."\
    --form "country=vd"\
    --form "city=l"\
    --form "address=architecto"\
    --form "phone=n"\
    --form "whatsapp=g"\
    --form "email=rowan.gulgowski@example.com"\
    --form "website=http://www.dach.com/mollitia-modi-deserunt-aut-ab-provident-perspiciatis-quo.html"\
    --form "logo=@/private/var/folders/ks/49p8ly393j32k9nqtlbf6g940000gn/T/phpbb39o89pmog2fcnTgQK" \
    --form "cover_image=@/private/var/folders/ks/49p8ly393j32k9nqtlbf6g940000gn/T/phpra46i3nnka3l3BfeOsR" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/shops"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'b');
body.append('description', 'Eius et animi quos velit et.');
body.append('country', 'vd');
body.append('city', 'l');
body.append('address', 'architecto');
body.append('phone', 'n');
body.append('whatsapp', 'g');
body.append('email', 'rowan.gulgowski@example.com');
body.append('website', 'http://www.dach.com/mollitia-modi-deserunt-aut-ab-provident-perspiciatis-quo.html');
body.append('logo', document.querySelector('input[name="logo"]').files[0]);
body.append('cover_image', document.querySelector('input[name="cover_image"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-shops">
</span>
<span id="execution-results-POSTapi-shops" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-shops"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shops"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-shops" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shops">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-shops" data-method="POST"
      data-path="api/shops"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-shops', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-shops"
                    onclick="tryItOut('POSTapi-shops');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-shops"
                    onclick="cancelTryOut('POSTapi-shops');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-shops"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/shops</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-shops"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-shops"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-shops"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-shops"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>country</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="country"                data-endpoint="POSTapi-shops"
               value="vd"
               data-component="body">
    <br>
<p>Must be 2 characters. Example: <code>vd</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>city</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="city"                data-endpoint="POSTapi-shops"
               value="l"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>l</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="POSTapi-shops"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="POSTapi-shops"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 30 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>whatsapp</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="whatsapp"                data-endpoint="POSTapi-shops"
               value="g"
               data-component="body">
    <br>
<p>Must not be greater than 30 characters. Example: <code>g</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-shops"
               value="rowan.gulgowski@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>rowan.gulgowski@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>website</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="website"                data-endpoint="POSTapi-shops"
               value="http://www.dach.com/mollitia-modi-deserunt-aut-ab-provident-perspiciatis-quo.html"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://www.dach.com/mollitia-modi-deserunt-aut-ab-provident-perspiciatis-quo.html</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>logo</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="logo"                data-endpoint="POSTapi-shops"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 2048 kilobytes. Example: <code>/private/var/folders/ks/49p8ly393j32k9nqtlbf6g940000gn/T/phpbb39o89pmog2fcnTgQK</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cover_image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="cover_image"                data-endpoint="POSTapi-shops"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 4096 kilobytes. Example: <code>/private/var/folders/ks/49p8ly393j32k9nqtlbf6g940000gn/T/phpra46i3nnka3l3BfeOsR</code></p>
        </div>
        </form>

                    <h2 id="endpoints-PUTapi-shops--shop_slug-">PUT api/shops/{shop_slug}</h2>

<p>
</p>



<span id="example-requests-PUTapi-shops--shop_slug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/shops/baay-fall-textiles-6798" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "name=b"\
    --form "description=Eius et animi quos velit et."\
    --form "country=vd"\
    --form "city=l"\
    --form "address=architecto"\
    --form "phone=n"\
    --form "whatsapp=g"\
    --form "email=rowan.gulgowski@example.com"\
    --form "website=http://www.dach.com/mollitia-modi-deserunt-aut-ab-provident-perspiciatis-quo.html"\
    --form "logo=@/private/var/folders/ks/49p8ly393j32k9nqtlbf6g940000gn/T/phpv6po31kbl0ptafLy5Os" \
    --form "cover_image=@/private/var/folders/ks/49p8ly393j32k9nqtlbf6g940000gn/T/phpot3ckp1n7p442PRVDaL" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/shops/baay-fall-textiles-6798"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'b');
body.append('description', 'Eius et animi quos velit et.');
body.append('country', 'vd');
body.append('city', 'l');
body.append('address', 'architecto');
body.append('phone', 'n');
body.append('whatsapp', 'g');
body.append('email', 'rowan.gulgowski@example.com');
body.append('website', 'http://www.dach.com/mollitia-modi-deserunt-aut-ab-provident-perspiciatis-quo.html');
body.append('logo', document.querySelector('input[name="logo"]').files[0]);
body.append('cover_image', document.querySelector('input[name="cover_image"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-shops--shop_slug-">
</span>
<span id="execution-results-PUTapi-shops--shop_slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-shops--shop_slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-shops--shop_slug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-shops--shop_slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-shops--shop_slug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-shops--shop_slug-" data-method="PUT"
      data-path="api/shops/{shop_slug}"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-shops--shop_slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-shops--shop_slug-"
                    onclick="tryItOut('PUTapi-shops--shop_slug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-shops--shop_slug-"
                    onclick="cancelTryOut('PUTapi-shops--shop_slug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-shops--shop_slug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/shops/{shop_slug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-shops--shop_slug-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-shops--shop_slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>shop_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="shop_slug"                data-endpoint="PUTapi-shops--shop_slug-"
               value="baay-fall-textiles-6798"
               data-component="url">
    <br>
<p>The slug of the shop. Example: <code>baay-fall-textiles-6798</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-shops--shop_slug-"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-shops--shop_slug-"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>country</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="country"                data-endpoint="PUTapi-shops--shop_slug-"
               value="vd"
               data-component="body">
    <br>
<p>Must be 2 characters. Example: <code>vd</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>city</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="city"                data-endpoint="PUTapi-shops--shop_slug-"
               value="l"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>l</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="PUTapi-shops--shop_slug-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="PUTapi-shops--shop_slug-"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 30 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>whatsapp</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="whatsapp"                data-endpoint="PUTapi-shops--shop_slug-"
               value="g"
               data-component="body">
    <br>
<p>Must not be greater than 30 characters. Example: <code>g</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTapi-shops--shop_slug-"
               value="rowan.gulgowski@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>rowan.gulgowski@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>website</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="website"                data-endpoint="PUTapi-shops--shop_slug-"
               value="http://www.dach.com/mollitia-modi-deserunt-aut-ab-provident-perspiciatis-quo.html"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://www.dach.com/mollitia-modi-deserunt-aut-ab-provident-perspiciatis-quo.html</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>logo</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="logo"                data-endpoint="PUTapi-shops--shop_slug-"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 2048 kilobytes. Example: <code>/private/var/folders/ks/49p8ly393j32k9nqtlbf6g940000gn/T/phpv6po31kbl0ptafLy5Os</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cover_image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="cover_image"                data-endpoint="PUTapi-shops--shop_slug-"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 4096 kilobytes. Example: <code>/private/var/folders/ks/49p8ly393j32k9nqtlbf6g940000gn/T/phpot3ckp1n7p442PRVDaL</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-shops--shop_slug-">DELETE api/shops/{shop_slug}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-shops--shop_slug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/shops/baay-fall-textiles-6798" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/shops/baay-fall-textiles-6798"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-shops--shop_slug-">
</span>
<span id="execution-results-DELETEapi-shops--shop_slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-shops--shop_slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-shops--shop_slug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-shops--shop_slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-shops--shop_slug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-shops--shop_slug-" data-method="DELETE"
      data-path="api/shops/{shop_slug}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-shops--shop_slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-shops--shop_slug-"
                    onclick="tryItOut('DELETEapi-shops--shop_slug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-shops--shop_slug-"
                    onclick="cancelTryOut('DELETEapi-shops--shop_slug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-shops--shop_slug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/shops/{shop_slug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-shops--shop_slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-shops--shop_slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>shop_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="shop_slug"                data-endpoint="DELETEapi-shops--shop_slug-"
               value="baay-fall-textiles-6798"
               data-component="url">
    <br>
<p>The slug of the shop. Example: <code>baay-fall-textiles-6798</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-products">POST api/products</h2>

<p>
</p>



<span id="example-requests-POSTapi-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/products" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "shop_id=architecto"\
    --form "category_id=architecto"\
    --form "name=n"\
    --form "description=Eius et animi quos velit et."\
    --form "specifications=architecto"\
    --form "price=39"\
    --form "price_promo=84"\
    --form "unit=z"\
    --form "stock=77"\
    --form "min_order=35"\
    --form "delivery_zones=architecto"\
    --form "delivery_delay=n"\
    --form "delivery_free="\
    --form "images[]=@/private/var/folders/ks/49p8ly393j32k9nqtlbf6g940000gn/T/phprpjq0pt72tc340Bvp0S" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/products"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('shop_id', 'architecto');
body.append('category_id', 'architecto');
body.append('name', 'n');
body.append('description', 'Eius et animi quos velit et.');
body.append('specifications', 'architecto');
body.append('price', '39');
body.append('price_promo', '84');
body.append('unit', 'z');
body.append('stock', '77');
body.append('min_order', '35');
body.append('delivery_zones', 'architecto');
body.append('delivery_delay', 'n');
body.append('delivery_free', '');
body.append('images[]', document.querySelector('input[name="images[]"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-products">
</span>
<span id="execution-results-POSTapi-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-products" data-method="POST"
      data-path="api/products"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-products"
                    onclick="tryItOut('POSTapi-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-products"
                    onclick="cancelTryOut('POSTapi-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
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
<p>Example: <code>multipart/form-data</code></p>
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
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>shop_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="shop_id"                data-endpoint="POSTapi-products"
               value="architecto"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the shops table. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category_id"                data-endpoint="POSTapi-products"
               value="architecto"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the categories table. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-products"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-products"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>specifications</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="specifications"                data-endpoint="POSTapi-products"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="price"                data-endpoint="POSTapi-products"
               value="39"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>39</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price_promo</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="price_promo"                data-endpoint="POSTapi-products"
               value="84"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>84</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>unit</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="unit"                data-endpoint="POSTapi-products"
               value="z"
               data-component="body">
    <br>
<p>Must not be greater than 50 characters. Example: <code>z</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>stock</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="stock"                data-endpoint="POSTapi-products"
               value="77"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>77</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>min_order</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="min_order"                data-endpoint="POSTapi-products"
               value="35"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>35</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>delivery_zones</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="delivery_zones"                data-endpoint="POSTapi-products"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>delivery_delay</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="delivery_delay"                data-endpoint="POSTapi-products"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>delivery_free</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-products" style="display: none">
            <input type="radio" name="delivery_free"
                   value="true"
                   data-endpoint="POSTapi-products"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-products" style="display: none">
            <input type="radio" name="delivery_free"
                   value="false"
                   data-endpoint="POSTapi-products"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>images</code></b>&nbsp;&nbsp;
<small>file[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="images[0]"                data-endpoint="POSTapi-products"
               data-component="body">
        <input type="file" style="display: none"
               name="images[1]"                data-endpoint="POSTapi-products"
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 4096 kilobytes.</p>
        </div>
        </form>

                    <h2 id="endpoints-PUTapi-products--product_slug-">PUT api/products/{product_slug}</h2>

<p>
</p>



<span id="example-requests-PUTapi-products--product_slug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/products/grand-boubou-brode-homme-90010" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "name=b"\
    --form "description=Eius et animi quos velit et."\
    --form "specifications=architecto"\
    --form "price=39"\
    --form "price_promo=84"\
    --form "unit=z"\
    --form "stock=77"\
    --form "min_order=35"\
    --form "delivery_zones=architecto"\
    --form "delivery_delay=n"\
    --form "delivery_free=1"\
    --form "is_available="\
    --form "images[]=@/private/var/folders/ks/49p8ly393j32k9nqtlbf6g940000gn/T/phpapugp5hoklfd9QQIiHh" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/products/grand-boubou-brode-homme-90010"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('name', 'b');
body.append('description', 'Eius et animi quos velit et.');
body.append('specifications', 'architecto');
body.append('price', '39');
body.append('price_promo', '84');
body.append('unit', 'z');
body.append('stock', '77');
body.append('min_order', '35');
body.append('delivery_zones', 'architecto');
body.append('delivery_delay', 'n');
body.append('delivery_free', '1');
body.append('is_available', '');
body.append('images[]', document.querySelector('input[name="images[]"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-products--product_slug-">
</span>
<span id="execution-results-PUTapi-products--product_slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-products--product_slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-products--product_slug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-products--product_slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-products--product_slug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-products--product_slug-" data-method="PUT"
      data-path="api/products/{product_slug}"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-products--product_slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-products--product_slug-"
                    onclick="tryItOut('PUTapi-products--product_slug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-products--product_slug-"
                    onclick="cancelTryOut('PUTapi-products--product_slug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-products--product_slug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/products/{product_slug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-products--product_slug-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-products--product_slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product_slug"                data-endpoint="PUTapi-products--product_slug-"
               value="grand-boubou-brode-homme-90010"
               data-component="url">
    <br>
<p>The slug of the product. Example: <code>grand-boubou-brode-homme-90010</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="category_id"                data-endpoint="PUTapi-products--product_slug-"
               value=""
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the categories table.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-products--product_slug-"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-products--product_slug-"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>specifications</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="specifications"                data-endpoint="PUTapi-products--product_slug-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="price"                data-endpoint="PUTapi-products--product_slug-"
               value="39"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>39</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price_promo</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="price_promo"                data-endpoint="PUTapi-products--product_slug-"
               value="84"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>84</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>unit</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="unit"                data-endpoint="PUTapi-products--product_slug-"
               value="z"
               data-component="body">
    <br>
<p>Must not be greater than 50 characters. Example: <code>z</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>stock</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="stock"                data-endpoint="PUTapi-products--product_slug-"
               value="77"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>77</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>min_order</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="min_order"                data-endpoint="PUTapi-products--product_slug-"
               value="35"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>35</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>delivery_zones</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="delivery_zones"                data-endpoint="PUTapi-products--product_slug-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>delivery_delay</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="delivery_delay"                data-endpoint="PUTapi-products--product_slug-"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>delivery_free</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-products--product_slug-" style="display: none">
            <input type="radio" name="delivery_free"
                   value="true"
                   data-endpoint="PUTapi-products--product_slug-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-products--product_slug-" style="display: none">
            <input type="radio" name="delivery_free"
                   value="false"
                   data-endpoint="PUTapi-products--product_slug-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>is_available</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-products--product_slug-" style="display: none">
            <input type="radio" name="is_available"
                   value="true"
                   data-endpoint="PUTapi-products--product_slug-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-products--product_slug-" style="display: none">
            <input type="radio" name="is_available"
                   value="false"
                   data-endpoint="PUTapi-products--product_slug-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>images</code></b>&nbsp;&nbsp;
<small>file[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="images[0]"                data-endpoint="PUTapi-products--product_slug-"
               data-component="body">
        <input type="file" style="display: none"
               name="images[1]"                data-endpoint="PUTapi-products--product_slug-"
               data-component="body">
    <br>
<p>Must be an image. Must not be greater than 4096 kilobytes.</p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-products--product_slug-">DELETE api/products/{product_slug}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-products--product_slug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/products/grand-boubou-brode-homme-90010" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/products/grand-boubou-brode-homme-90010"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-products--product_slug-">
</span>
<span id="execution-results-DELETEapi-products--product_slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-products--product_slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-products--product_slug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-products--product_slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-products--product_slug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-products--product_slug-" data-method="DELETE"
      data-path="api/products/{product_slug}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-products--product_slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-products--product_slug-"
                    onclick="tryItOut('DELETEapi-products--product_slug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-products--product_slug-"
                    onclick="cancelTryOut('DELETEapi-products--product_slug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-products--product_slug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/products/{product_slug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-products--product_slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-products--product_slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product_slug"                data-endpoint="DELETEapi-products--product_slug-"
               value="grand-boubou-brode-homme-90010"
               data-component="url">
    <br>
<p>The slug of the product. Example: <code>grand-boubou-brode-homme-90010</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-products--product_slug--reviews">POST api/products/{product_slug}/reviews</h2>

<p>
</p>



<span id="example-requests-POSTapi-products--product_slug--reviews">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/products/grand-boubou-brode-homme-90010/reviews" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"rating\": 1,
    \"comment\": \"n\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/products/grand-boubou-brode-homme-90010/reviews"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "rating": 1,
    "comment": "n"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-products--product_slug--reviews">
</span>
<span id="execution-results-POSTapi-products--product_slug--reviews" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-products--product_slug--reviews"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-products--product_slug--reviews"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-products--product_slug--reviews" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-products--product_slug--reviews">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-products--product_slug--reviews" data-method="POST"
      data-path="api/products/{product_slug}/reviews"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-products--product_slug--reviews', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-products--product_slug--reviews"
                    onclick="tryItOut('POSTapi-products--product_slug--reviews');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-products--product_slug--reviews"
                    onclick="cancelTryOut('POSTapi-products--product_slug--reviews');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-products--product_slug--reviews"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/products/{product_slug}/reviews</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-products--product_slug--reviews"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-products--product_slug--reviews"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product_slug"                data-endpoint="POSTapi-products--product_slug--reviews"
               value="grand-boubou-brode-homme-90010"
               data-component="url">
    <br>
<p>The slug of the product. Example: <code>grand-boubou-brode-homme-90010</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>rating</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="rating"                data-endpoint="POSTapi-products--product_slug--reviews"
               value="1"
               data-component="body">
    <br>
<p>Must be at least 1. Must not be greater than 5. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>comment</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="comment"                data-endpoint="POSTapi-products--product_slug--reviews"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 1000 characters. Example: <code>n</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-reviews--review_id-">DELETE api/reviews/{review_id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-reviews--review_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/reviews/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/reviews/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-reviews--review_id-">
</span>
<span id="execution-results-DELETEapi-reviews--review_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-reviews--review_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-reviews--review_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-reviews--review_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-reviews--review_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-reviews--review_id-" data-method="DELETE"
      data-path="api/reviews/{review_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-reviews--review_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-reviews--review_id-"
                    onclick="tryItOut('DELETEapi-reviews--review_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-reviews--review_id-"
                    onclick="cancelTryOut('DELETEapi-reviews--review_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-reviews--review_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/reviews/{review_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-reviews--review_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-reviews--review_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>review_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="review_id"                data-endpoint="DELETEapi-reviews--review_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the review. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-vendor-shops">GET api/vendor/shops</h2>

<p>
</p>



<span id="example-requests-GETapi-vendor-shops">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/vendor/shops" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/vendor/shops"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-vendor-shops">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-vendor-shops" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-vendor-shops"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-vendor-shops"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-vendor-shops" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-vendor-shops">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-vendor-shops" data-method="GET"
      data-path="api/vendor/shops"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-vendor-shops', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-vendor-shops"
                    onclick="tryItOut('GETapi-vendor-shops');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-vendor-shops"
                    onclick="cancelTryOut('GETapi-vendor-shops');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-vendor-shops"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/vendor/shops</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-vendor-shops"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-vendor-shops"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-vendor-products">GET api/vendor/products</h2>

<p>
</p>



<span id="example-requests-GETapi-vendor-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/vendor/products" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/vendor/products"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-vendor-products">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-vendor-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-vendor-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-vendor-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-vendor-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-vendor-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-vendor-products" data-method="GET"
      data-path="api/vendor/products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-vendor-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-vendor-products"
                    onclick="tryItOut('GETapi-vendor-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-vendor-products"
                    onclick="cancelTryOut('GETapi-vendor-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-vendor-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/vendor/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-vendor-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-vendor-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-vendor-stats">GET api/vendor/stats</h2>

<p>
</p>



<span id="example-requests-GETapi-vendor-stats">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/vendor/stats" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/vendor/stats"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-vendor-stats">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-vendor-stats" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-vendor-stats"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-vendor-stats"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-vendor-stats" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-vendor-stats">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-vendor-stats" data-method="GET"
      data-path="api/vendor/stats"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-vendor-stats', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-vendor-stats"
                    onclick="tryItOut('GETapi-vendor-stats');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-vendor-stats"
                    onclick="cancelTryOut('GETapi-vendor-stats');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-vendor-stats"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/vendor/stats</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-vendor-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-vendor-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-PATCHapi-admin-shops--shop_slug--verify">PATCH api/admin/shops/{shop_slug}/verify</h2>

<p>
</p>



<span id="example-requests-PATCHapi-admin-shops--shop_slug--verify">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:8000/api/admin/shops/baay-fall-textiles-6798/verify" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/admin/shops/baay-fall-textiles-6798/verify"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PATCH",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHapi-admin-shops--shop_slug--verify">
</span>
<span id="execution-results-PATCHapi-admin-shops--shop_slug--verify" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-admin-shops--shop_slug--verify"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-admin-shops--shop_slug--verify"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-admin-shops--shop_slug--verify" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-admin-shops--shop_slug--verify">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-admin-shops--shop_slug--verify" data-method="PATCH"
      data-path="api/admin/shops/{shop_slug}/verify"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-admin-shops--shop_slug--verify', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-admin-shops--shop_slug--verify"
                    onclick="tryItOut('PATCHapi-admin-shops--shop_slug--verify');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-admin-shops--shop_slug--verify"
                    onclick="cancelTryOut('PATCHapi-admin-shops--shop_slug--verify');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-admin-shops--shop_slug--verify"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/admin/shops/{shop_slug}/verify</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-admin-shops--shop_slug--verify"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-admin-shops--shop_slug--verify"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>shop_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="shop_slug"                data-endpoint="PATCHapi-admin-shops--shop_slug--verify"
               value="baay-fall-textiles-6798"
               data-component="url">
    <br>
<p>The slug of the shop. Example: <code>baay-fall-textiles-6798</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-admin-users">GET api/admin/users</h2>

<p>
</p>



<span id="example-requests-GETapi-admin-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/admin/users" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/admin/users"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-admin-users">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-admin-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-users"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-users">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-users" data-method="GET"
      data-path="api/admin/users"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-users"
                    onclick="tryItOut('GETapi-admin-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-users"
                    onclick="cancelTryOut('GETapi-admin-users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-users"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/users</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-PATCHapi-admin-users--user_id--role">PATCH api/admin/users/{user_id}/role</h2>

<p>
</p>



<span id="example-requests-PATCHapi-admin-users--user_id--role">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:8000/api/admin/users/1/role" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"role\": \"vendor\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/admin/users/1/role"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "role": "vendor"
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHapi-admin-users--user_id--role">
</span>
<span id="execution-results-PATCHapi-admin-users--user_id--role" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-admin-users--user_id--role"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-admin-users--user_id--role"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-admin-users--user_id--role" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-admin-users--user_id--role">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-admin-users--user_id--role" data-method="PATCH"
      data-path="api/admin/users/{user_id}/role"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-admin-users--user_id--role', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-admin-users--user_id--role"
                    onclick="tryItOut('PATCHapi-admin-users--user_id--role');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-admin-users--user_id--role"
                    onclick="cancelTryOut('PATCHapi-admin-users--user_id--role');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-admin-users--user_id--role"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/admin/users/{user_id}/role</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-admin-users--user_id--role"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-admin-users--user_id--role"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="PATCHapi-admin-users--user_id--role"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>role</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="role"                data-endpoint="PATCHapi-admin-users--user_id--role"
               value="vendor"
               data-component="body">
    <br>
<p>Example: <code>vendor</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>vendor</code></li> <li><code>admin</code></li></ul>
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
