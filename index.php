<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />

    <title>Task 1</title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://www.google.com/recaptcha/api.js?render=6LfIwqoUAAAAANpinyh8Y4abQkA1HOG0aT3DCh0Q"></script>
  </head>

  <body>
    <!-- navbar block -->
    <ul class="navbar justify-content-end align-items-center">
      <li><a href="">Gmail</a></li>
      <li><a href="">Images</a></li>

      <li>
        <button
          id="view-apps-button"
          data-toggle="modal"
          data-target="#apps-modal"
        >
          <img src="apps-icon.png" height="22px" alt="" />
        </button>
      </li>
      <li>
        <Button id="sign-up-button">Sign Up</Button>
      </li>
      <li>
        <button id="signin-profile">
          Sign In
        </button>
      </li>
    </ul>
    <!-- image/search/button block -->

    <div class="main">
      <img src="google-search-logo.png" alt="" />
      <form action="">
        <input type="text" name="" id="" />
        <br />
        <button id="searchBt">Google Search</button>
        <button>I'm feeling lucky</button>
      </form>
    </div>

    <!-- sign in dialog box using only javascript and css(no libraries)-->

    <div id="login-modal" class="login-modal">
      <!-- Modal content -->
      <div class="login-content">
        <div class="close-login">&times;</div>
        <img src="google-logo-small.gif" class="img-fluid" alt="" />
        <h3>Sign In</h3>
        <form action="">
          <label for="">Email</label>
          <br />
          <input type="email" name="" id="email" placeholder="Email Address" />
          <br />
          <label for="">Password</label>
          <br />
          <input type="password" name="" id="password" placeholder="Password" />
          <br />
          <input
            type="hidden"
            name="recaptcha_signin_response"
            id="recaptcha_signin_response"
          />
          <div>
            <button id="login-user-button">Login</button>
          </div>
        </form>
      </div>
    </div>
    <!-- Sign up dialog box-->
    <div class="signUpDialog">
      <div class="signUpContent">
        <div class="SignUpDialogHeader">
          <button type="button" id="closeSignUpDialogBox">
            &times;
          </button>
        </div>
        <img src="google-logo-small.gif" class="img-fluid" alt="" />
        <h3>Sign Up</h3>
        <form>
          <label for="">Email</label><br />
          <input type="text" name="SignUpEmail" id="SignUpEmail" />
          <label for="">Password</label><br />
          <input type="password" name="SignUpPassword" id="SignUpPassword" />
          <label for="">First Name</label><br />
          <input type="text" name="SignUpFirstName" id="SignUpFirstName" />
          <label for="">Last Name</label><br />
          <input type="text" name="SignUpLastName" id="SignUpLastName" />
          <label for="">Age</label><br />
          <input type="number" name="SignUpAge" id="SignUpAge" />
          <label for="">Address</label><br />
          <input type="text" name="SignUpAddress" id="SignUpAddress" />
          <input
            type="hidden"
            name="recaptcha_signup_response"
            id="recaptcha_signup_response"
          />
          <div><Button id="SignUpButton">Sign me Up!</Button></div>
        </form>
      </div>
    </div>

    <!-- apps dialog box -->

    <div class="modal" id="apps-modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>

          <!-- Modal body -->
          <div class="modal-body p-4">
            <div class="container">
              <div class="row text-center ">
                <div class="col-4">
                  <a href=""
                    ><img
                      src="AppLogos/1.png"
                      class="img-fluid"
                      alt=""
                    />FireBase</a
                  >
                </div>
                <div class="col-4">
                  <a href=""
                    ><img
                      src="AppLogos/2.png"
                      class="img-fluid"
                      alt=""
                    />Flutter</a
                  >
                </div>
                <div class="col-4">
                  <a href=""
                    ><img
                      src="AppLogos/3.png"
                      class="img-fluid"
                      alt=""
                    />Drive</a
                  >
                </div>
                <div class="col-4">
                  <a href=""
                    ><img
                      src="AppLogos/4.png"
                      class="img-fluid"
                      alt=""
                    />Maps</a
                  >
                </div>
                <div class="col-4">
                  <a href=""
                    ><img
                      src="AppLogos/5.png"
                      class="img-fluid"
                      alt=""
                    />Play</a
                  >
                </div>
                <div class="col-4">
                  <a href=""
                    ><img
                      src="AppLogos/6.png"
                      class="img-fluid d-block mx-auto"
                      alt=""
                    />Books</a
                  >
                </div>
              </div>
              <div class="row text-center align-items-end" id="extraLogos">
                <div class="col-4">
                  <a href=""
                    ><img
                      src="AppLogos/7.png"
                      class="img-fluid"
                      alt=""
                    />Stadia</a
                  >
                </div>
                <div class="col-4">
                  <a href=""
                    ><img
                      src="AppLogos/8.png"
                      class="img-fluid"
                      alt=""
                    />Tensorflow</a
                  >
                </div>
                <div class="col-4">
                  <a href=""
                    ><img
                      src="AppLogos/9.png"
                      class="img-fluid"
                      alt=""
                    />Waze</a
                  >
                </div>
                <div class="col-4">
                  <a href=""
                    ><img
                      src="AppLogos/10.png"
                      class="img-fluid"
                      alt=""
                    />Youtube</a
                  >
                </div>
                <div class="col-4">
                  <a href=""
                    ><img
                      src="AppLogos/11.png"
                      class="img-fluid d-block mx-auto"
                      alt=""
                    />Video</a
                  >
                </div>
                <div class="col-4">
                  <a href=""
                    ><img
                      src="AppLogos/12.png"
                      class="img-fluid d-block mx-auto"
                      alt=""
                    />Games</a
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" id="viewMoreBt">
              View More
            </button>
          </div>
        </div>
      </div>
    </div>

    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <script src="app.js"></script>
  </body>
</html>
