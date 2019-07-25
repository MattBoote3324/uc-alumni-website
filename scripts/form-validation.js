function validInput(input) {
    var banned = "0123456789`~!@#$%^&*()-_=+[{]}\|;:'\",<.>/?";
    for (i = 0, len = banned.length; i < len; i++) {
        if (city.includes(banned[i])) {
            return false
        }
    }

    return true;
}

function validateForm() {
    var name = document.forms["contact-form"]["name"].value;
    var email = document.forms["contact-form"]["email"].value;
    var message = document.forms["contact-form"]["message-input"].value;

    if (name == null || name == "" || email == null || email =="" || message == null || message == "") {
        alert("Please enter your name, email address and message.");
        return false;
    } else if (!validInput(name)) {
        alert("Names cannot contain numbers or symbols.")
        return false;
    } else if (true != (email.includes("@") && email.includes("."))) {
        alert("Make sure your email conatins '@' and '.' symbols.")
    }
}
