function formhash(form, password) {
    // Create a new element input, this will be our hashed password field.
    var p = document.createElement("input");

    // Add the new element to our form.
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);

    // Make sure the plaintext password doesn't get sent.
    password.value = "";

    // Finally submit the form.
    form.submit();
}


function invalidCity(city) {
    var banned = "0123456789`~!@#$%^&*()-_=+[{]}\|;:'\",<.>/?";
    for (i = 0, len = banned.length; i < len; i++) {
        if (city.includes(banned[i])) {
            return true
        }
    }

    return false;
}


function checkAddress(form) {
    var city = document.forms["address-form"]["city"].value;
    var postcode = document.forms["address-form"]["postcode"].value;
    var country = document.forms["address-form"]["country"].value;

    if (city == null || city == "" || postcode == null || postcode =="" || country == null || country == "") {
        alert("Please enter your name, email address and message.");
        return false;
    } else if (invalidCity(city)) {
        alert("City name cannot contain may not contain numbers or symbols.");
        return false;
    } else {
        form.submit();
    }
}
