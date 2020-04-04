<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Facebook Login with CodeIgniter 4!</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- STYLES -->
	<style {csp-style-nonce}>
		* {
			transition: background-color 300ms ease, color 300ms ease;
		}
		*:focus {
			background-color: rgba(221, 72, 20, .2);
			outline: none;
		}
		html, body {
			color: rgba(33, 37, 41, 1);
			font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
			font-size: 16px;
			margin: 0;
			padding: 0;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
			text-rendering: optimizeLegibility;
		}
		header {
			background-color: rgba(247, 248, 249, 1);
			padding: .4rem 0 0;
		}
		header .heroe {
			margin: 0 auto;
			max-width: 1100px;
			padding: 1rem 1.75rem 1.75rem 1.75rem;
		}
		header .heroe h1 {
			font-size: 2.5rem;
			font-weight: 500;
		}
		section {
			margin: 0 auto;
			max-width: 1100px;
			padding: 2.5rem 1.75rem 3.5rem 1.75rem;
		}
		section h1 {
			margin-bottom: 2.5rem;
		}
		section pre {
			background-color: rgba(247, 248, 249, 1);
			border: 1px solid rgba(242, 242, 242, 1);
			display: block;
			font-size: .9rem;
			margin: 2rem 0;
			padding: 1rem 1.5rem;
			white-space: pre-wrap;
			word-break: break-all;
		}
		section code {
			display: block;
		}
	</style>
</head>
<body>
<!-- HEADER: MENU + HEROE SECTION -->
<header>
	<div class="heroe">
		<h1>Facebook Login with CodeIgniter <?= CodeIgniter\CodeIgniter::CI_VERSION ?></h1>
	</div>
</header>
<!-- CONTENT -->
<section>
	<h1>Facebook Login</h1>

	<div class="fb-login-button" data-scope="name,email" data-width="" data-size="large" data-button-type="login_with" data-layout="rounded" data-auto-logout-link="true" data-use-continue-as="false" data-onlogin="checkLoginState();"></div>

	<p>Logged-in  as </p>

	<pre><code id="name">Logged-in Name</code></pre>

	<p>with</p>

	<pre><code id="email">Logged-in User's Email</code></pre>

</section>  
<!-- SCRIPTS -->
<script>
    //Facebook SDK for Javascript
    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    //Application Initialisation
    window.fbAsyncInit = function() {
        FB.init({
            appId      : 'APP ID', //replace with your APP ID
            cookie     : true,
            xfbml      : true,
            version    : 'v6.0'
        });
        FB.AppEvents.logPageView();   
    };
    
    function checkLoginState() { 
        FB.getLoginStatus(function(response) {   
            statusChangeCallback(response);
        });
    }
    
    function statusChangeCallback(response) {  
        if (response.status === 'connected') {   
            var userId = response.authResponse.userID;
            getUserInfo(userId);  
        }
    }
    
    function getUserInfo(userId) {                    
        FB.api(
            '/'+userId+'/?fields=id,name,email',
            'GET',
            {},
            function(response) {
                console.log(response);
                document.getElementById('name').innerHTML = response.name;
                document.getElementById('email').innerHTML = response.email;
            }
        );
    }
</script>
<!-- -->
</body>
</html>
