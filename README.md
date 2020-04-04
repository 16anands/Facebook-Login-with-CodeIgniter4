
# Facebook-Login-with-CodeIgniter
A secure, fast, and convenient way for users to log into your app, and for your app to ask for permissions to access data.
##  Prerequisite
* **XAMPP**
-- [x] XAMPP is a completely free, easy to install Apache distribution containing MariaDB, PHP, and Perl. The XAMPP open source package has been set up to be incredibly easy to install and to use.
[XAMPP Download Link](https://www.apachefriends.org/index.html)
* **CodeIgniter Web Framework**
-- [x] CodeIgniter is a powerful PHP framework with a very small footprint, built for developers who need a simple and elegant toolkit to create full-featured web applications.
[CodeIgniter Download Link](https://codeigniter.com/)
* **Facebook Developer App**
-- [x] Every third party app that integrates Facebook login needs to create a Facebook developer app. A developer app helps Facebook track the third party app and provides additional configuration options.
[Facebook for Developers](https://developers.facebook.com/docs/apps/)
### Step 1. **Download and Install XAMPP**
### Step 1. **Creating a Facebook Developer App**
* Visit the [Facebook Developer Apps Page](https://developers.facebook.com/apps/) and click _Add a New App_. Select _Website_ as the platform.
* Enter an app name and click _Create new Facebook App ID_.
* Select your app category and click  _Create App ID_.
* Click _Skip Quick Start_ in the top right corner.
* Make a note of the _App ID_.
### Step 3. **Creating a CodeIgniter App**
* Clone https://github.com/16anands/Facebook-Login-with-CodeIgniter.git 
* Place it in _**C:\xampp\htdocs**_
* Open  C:\xampp\htdocs\Facebook_Login\app\Views\home.php
* Replace **'APP ID'** with your facebook _**App ID**_.
* Open web browser and type _[http://localhost/Facebook_login/public/]
* Click _**Log in With Facebook**_ button.
* Enter your Credentials which you used to create the Developer Account on facebook.
* You will see your Name and Email on the page, then click _**Logout**_.
> _**OR**_ 
* Download CodeIgniter Web Framework https://github.com/codeigniter4/framework/archive/v4.0.2.zip
* Extract the folder and place it in _**C:\xampp\htdocs**_
* Rename the folder to something simpler like : _Facebook_login_
* Open web browser and type _[http://localhost/Facebook_login/public/](http://localhost/Facebook_login/public/)_
* CodeIgniter Welcome page will load.
* Open _C:\xampp\htdocs\Facebook_Login\app\Controllers\Home.php_
* Change the _View_ name to _**home**_.
* Open  C:\xampp\htdocs\Facebook_Login\app\Views
* Create a new file named _**home.php**_
* Add the following code :
```php
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
```
* Replace **'APP ID'** with your facebook _**App ID**_.
* Refresh the web page and click _**Log in With Facebook**_ button.
* Enter your Credentials which you used to create the Developer Account on facebook.
* You will see your Name and Email on the page, then click _**Logout**_.

