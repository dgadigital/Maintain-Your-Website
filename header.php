
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="format-detection" content="telephone=no">

  <title>Modular Gulp Template</title>

  <link rel="icon" href="./assets/images/favicon.ico">
  <link rel="stylesheet" type="text/css" href="./styles/main.min.css">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <!--[if lte IE 9]>
    <link href="stylesheets/non-responsive.css" rel="stylesheet" />
  <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
  <!--[if lt IE 9]>
    <div id="browser-notification" class="alert alert-danger">
      <div class="container">
        We are sorry but it looks like your <a href="http://www.whatbrowser.org/intl/en_us/" target=_blank>browser</a> doesn't support our website features. In order to get the full experience please download a new version of <a title="Download Chrome" href="http://www.google.com/chrome/" target=_blank>Chrome</a>, <a title="Download Safari" href="http://www.apple.com/safari/download/" target=_blank>Safari</a>, <a title="Download Firefox" href="http://www.mozilla.com/firefox/" target=_blank>Firefox</a>, or <a title="Download Internet Explorer" href="http://www.microsoft.com/windows/internet-explorer/default.aspx" target=_blank>Internet Explorer</a>.
      </div>
    </div>
  <![endif]-->

  <header>


  <nav class="navbar navbar-expand-xl fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="./assets/images/logo.png" alt="Logo" class="img-fluid"> 
      </a>
      

      <div class="right-wrapper">
        <div class="navbar-collapse">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Solutions</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Free Audit</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="/platforms.html" id="navbarDropdown">
                Platforms
              </a>
            
              <a class="dropdown-toggle" href="#" id="dropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                  <path d="M4.32982 9.48485C3.52339 8.67842 4.09453 7.29956 5.23499 7.29956L15.3472 7.29956C16.4877 7.29956 17.0588 8.67842 16.2524 9.48484L11.1963 14.541C10.6964 15.0409 9.88583 15.0409 9.38592 14.5409L4.32982 9.48485Z" fill="#16A34A"/>
                </svg>
              </a>
              <div class="dropdown-menu box-style" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Wordpress</a>
                <a class="dropdown-item" href="#">Joomla</a>
                <a class="dropdown-item" href="#">Drupal</a>
                <a class="dropdown-item" href="#">Shopify</a>
                <a class="dropdown-item" href="#">Magento</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Our Works</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="/platforms.html" id="navbarDropdown">
                Resources
              </a>
            
              <a class="dropdown-toggle" href="#" id="dropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                  <path d="M4.32982 9.48485C3.52339 8.67842 4.09453 7.29956 5.23499 7.29956L15.3472 7.29956C16.4877 7.29956 17.0588 8.67842 16.2524 9.48484L11.1963 14.541C10.6964 15.0409 9.88583 15.0409 9.38592 14.5409L4.32982 9.48485Z" fill="#16A34A"/>
                </svg>
              </a>
              <div class="dropdown-menu box-style" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Wordpress</a>
                <a class="dropdown-item" href="#">Joomla</a>
                <a class="dropdown-item" href="#">Drupal</a>
                <a class="dropdown-item" href="#">Shopify</a>
                <a class="dropdown-item" href="#">Magento</a>
              </div>
            </li>
          </ul>
        </div>
        <div class="hamburger-wrapper">
          <a href="" class="btn btn-solid ml-3">Contact Us</a>
          <!-- <button class="navbar-toggler custom-toggler" type="button">
            <span class="navbar-toggler-icon"></span>
          </button> -->

          <button class="navbar-toggler custom-toggler" type="button">
            <span class="bar bar-1"></span>
            <span class="bar bar-2"></span>
            <span class="bar bar-3"></span>
          </button>

        </div>
      </div>

    </div>
  </nav>


  </header>

  <main>