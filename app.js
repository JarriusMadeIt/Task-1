//document elements
const viewAppsBt = document.querySelector("#view-apps-button");
const signinBt = document.querySelector("#signin-profile");
const viewMoreBt = document.querySelector("#viewMoreBt");
const searchBt = document.querySelector("#searchBt");

let isOpen = false;
//view more apps event
viewMoreBt.addEventListener("click", () => {
  const extraLogos = document.getElementById("extraLogos");
  if (isOpen == false) {
    extraLogos.classList.add("d-flex");
    isOpen = true;
    viewMoreBt.innerHTML = "View Less";
  } else {
    extraLogos.classList.remove("d-flex");
    isOpen = false;
    viewMoreBt.innerHTML = "View More";
  }
});

//event on search button clicked
searchBt.addEventListener("click", e => {
  e.preventDefault();
  let originalString = document.querySelector("input").value;
  if (originalString === "") {
    alert("Search field is empty");
  } else {
    let result = isPalindrome(originalString);
    if (result == true) {
      searchBt.innerHTML = originalString;
      document.querySelector("input").value = "";
    } else {
      document.querySelector("input").value = "";
      alert("Not a palindrome!");
    }
  }
});

//isPalindrome function
function isPalindrome(str) {
  //split to an array
  let array = str.split("");
  //reverse array
  array.reverse();
  //join array
  let strReverse = array.join("");

  console.log(strReverse);
  console.log(str);

  if (str === strReverse) {
    return true;
  } else {
    return false;
  }
}

//process of show the dialog box

//getting main div
const loginModal = document.getElementById("login-modal");
//getting close button(query Selector returns first element with class name '.close-login')
const closeModal = document.querySelector(".close-login");

//event to show dialog box
signinBt.addEventListener("click", () => {
  loginModal.style.display = "block";
  //create captcha token
  grecaptcha.ready(() => {
    grecaptcha
      .execute("6LfIwqoUAAAAANpinyh8Y4abQkA1HOG0aT3DCh0Q", { action: "signin" })
      .then(token => {
        var recaptchaResponse = document.getElementById(
          "recaptcha_signin_response"
        );
        recaptchaResponse.value = token;
        console.log(token);
      });
  });
});
//event to close dialog box
closeModal.addEventListener("click", () => {
  loginModal.style.display = "none";
});

//login functionality

const loginUserButton = document.getElementById("login-user-button");
loginUserButton.addEventListener("click", e => {
  e.preventDefault();

  let email = document.querySelector("#email").value;
  let password = document.querySelector("#password").value;
  let recaptchaResponse = document.getElementById("recaptcha_signin_response")
    .value;

  if (email === "") {
    alert("Email field is empty!");
  } else if (password === "") {
    alert("Password field is empty!");
  } else if (isRegexEmailCertified(email) == false) {
    alert("email not valid");
  }

  if (password != "" && email != "" && isRegexEmailCertified(email)) {
    //create JSON object

    const userLogin = {
      email: email.toLowerCase(),
      password: password,
      recaptcha_response: recaptchaResponse
    };

    const dataStr =
      "email=" +
      userLogin.email +
      "&password=" +
      userLogin.password +
      "&recaptcha_response=" +
      userLogin.recaptcha_response;

    //create ajax request
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "login.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function() {
      if (this.status == 200) {
        //if user has account Dialog will hide and json object will be displayed instead of sing in buton
        console.log(this.responseText);
        if (this.responseText == "404") {
          alert("No account exists with email " + userLogin.email);
        } else {
          //record found
          const foundAccount = JSON.parse(this.response);
          //checking credentials
          if (userLogin.password != foundAccount.password) {
            alert("incorrect password!");
          } else {
            let uiAccount = `<p>id: ${foundAccount.uid}</p>`;
            uiAccount += `<p>Email: ${foundAccount.email}</p>`;
            uiAccount += `<p>Name: ${foundAccount.firstName} ${
              foundAccount.lastName
            }</p>`;
            uiAccount += `<p>Age: ${foundAccount.age}
            </p>`;
            uiAccount += `<p>Address: ${foundAccount.address}
          </p>`;
            signinBt.classList.toggle("signedIn");
            signinBt.innerHTML = uiAccount;
          }
        }
      }
    };
    xhr.send(dataStr);

    //hide modal
    loginModal.style.display = "none";
    //clear fields
    document.querySelector("#email").value = "";
    document.querySelector("#password").value = "";
    signUpButton.style.display = "none";
    //save to web storage
  }
});
//sign up functionality
const signUpButton = document.getElementById("sign-up-button");
const closeSignUpButton = document.getElementById("closeSignUpDialogBox");
const SignUpDialog = document.querySelector(".signUpDialog");
const SignUpUser = document.getElementById("SignUpButton");

//displaying dialog box
signUpButton.addEventListener("click", () => {
  SignUpDialog.style.display = "block";

  ////////////////////////////////////////////
  grecaptcha.ready(() => {
    grecaptcha
      .execute("6LfIwqoUAAAAANpinyh8Y4abQkA1HOG0aT3DCh0Q", { action: "signup" })
      .then(token => {
        var recaptchaResponse = document.getElementById(
          "recaptcha_signup_response"
        );
        recaptchaResponse.value = token;
        console.log(token);
      });
  });
});
//closing dialog box
closeSignUpButton.addEventListener("click", () => {
  SignUpDialog.style.display = "none";
});
//signing up user
SignUpUser.addEventListener("click", e => {
  e.preventDefault();
  //extracting data

  let SignUpEmail = document.getElementById("SignUpEmail").value;
  let SignUpPassword = document.getElementById("SignUpPassword").value;
  let SignUpFirstName = document.getElementById("SignUpFirstName").value;
  let SignUpLastName = document.getElementById("SignUpLastName").value;
  let SignUpAge = document.getElementById("SignUpAge").value;
  let SignUpAddress = document.getElementById("SignUpAddress").value;
  var recaptchaResponse = document.getElementById("recaptcha_signup_response")
    .value;
  if (SignUpEmail === "") {
    document.getElementById("SignUpEmail").style.border = "3px solid red";
  } else if (isRegexEmailCertified(SignUpEmail) == false) {
    alert("email not valid");
  }
  if (SignUpPassword == "") {
    document.getElementById("SignUpPassword").style.border = "3px solid red";
  }
  if (SignUpFirstName == "") {
    document.getElementById("SignUpFirstName").style.border = "3px solid red";
  }
  if (SignUpLastName == "") {
    document.getElementById("SignUpLastName").style.border = "3px solid red";
  }
  if (SignUpAge == "") {
    document.getElementById("SignUpAge").style.border = "3px solid red";
  }
  if (SignUpAddress == "") {
    document.getElementById("SignUpAddress").style.border = "3px solid red";
  }

  if (
    SignUpEmail != "" &&
    SignUpPassword != "" &&
    SignUpFirstName != "" &&
    SignUpLastName != "" &&
    SignUpAge != "" &&
    SignUpAddress != "" &&
    isRegexEmailCertified(SignUpEmail)
  ) {
    //all fields have been filled and ready to be sent to server using ajax(post)

    //creating datastring
    let data = `SignUpEmail=${SignUpEmail.toLowerCase()}&SignUpPassword=${SignUpPassword}&SignUpFirstName=${SignUpFirstName}&SignUpLastName=${SignUpLastName}&SignUpAge=${SignUpAge}&SignUpAddress=${SignUpAddress}&recaptcha_response=${recaptchaResponse}`;

    console.log("******************************************");
    console.log("request data");
    console.log(data);
    console.log("******************************************");

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "SignUp.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
      if (this.status == 200) {
        if (this.responseText == "success") {
          SignUpDialog.style.display = "none";
          alert("User added to database");
        } else if (this.responseText == "bot") {
          console.log("bot");
        } else {
          alert(
            "An account already exists with this Email, try with another email"
          );
        }
      }
    };
    xhr.send(data);
  }
});

function isRegexEmailCertified(str) {
  let strReg = /@*.com/;
  if (strReg.test(str)) {
    return true;
  } else {
    return false;
  }
}
