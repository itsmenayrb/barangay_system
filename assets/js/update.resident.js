/**
 * Page Elements
 */
let updateForm = document.getElementById('form');
let fname = document.getElementById('fname');
let mname = document.getElementById('mname');
let lname = document.getElementById('lname');
let suffix = document.getElementById('suffix'); // Not Required
let birthday = document.getElementById('birthday');
let birthplace = document.getElementById('birthplace');
let number = document.getElementById('contactnumber');
let email = document.getElementById('email');
let password_input = document.getElementById('password'); // Not required
let confirm_password_input = document.getElementById('cpassword'); // Not required
let submit_button = document.getElementById('submit');

/**
 * A substitute for main function
 */
(function main() {
  submit_button.addEventListener('click', function(e) {
    e.preventDefault();

    let errors = [];

    let formData = new FormData(updateForm);

    /**
     * Check if all the required forms are not empty
     */

    // Take the iterator of the FormData
    for(let value of formData) {
      // Remove the items that are not required
      if(value[0] === 'Suffix' || value[0] === 'Password' || value[0] === 'Confirm-Password') {
        continue;
      }
        
      // Check if all the length of string are greater than 0
      if(value[1].length <= 0) {
        errors.push(value[0] + ' - this should not be empty');
      }
    }

    // Check if the email follows the proper patterns for emails
    // Regex found at https://stackoverflow.com/questions/46155/how-to-validate-an-email-address-in-javascript
    const EMAIL_PATTERN = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
    if(!EMAIL_PATTERN.test(email.value)) {
      errors.push('Email - this should be a valid email');
    }

    // Check if the password and cpassword are the same
    if(password_input.value !== confirm_password_input.value) {
      errors.push('Confirm Password - its not the same as the Password');
    }

    // If there are any errors, print them
    if(errors.length) {
      let errorMessage = 'Invalid values at \n';
      errors.forEach(value => errorMessage += '•' + value + '\n');
      alert(errorMessage);
      return;
    }

    return fetch('./includes/update.resident.request.handler.php', {
      method: 'POST',
      body: formData
    })
    .then(res => res.json())
    .then(data => {
      console.log(data);
      if(data.success) {
        window.location.href = "./index.php";
      }
    });
  });

  fname.addEventListener('input', EventHandler_RemoveNonAlphabeticCharacters);
  mname.addEventListener('input', EventHandler_RemoveNonAlphabeticCharacters);
  lname.addEventListener('input', EventHandler_RemoveNonAlphabeticCharacters);
  fname.addEventListener('input', EventHandler_ToUpperCase);
  lname.addEventListener('input', EventHandler_ToUpperCase);  
  mname.addEventListener('input', EventHandler_ToUpperCase);
})();

function EventHandler_RemoveNonAlphabeticCharacters(e) {
  const ALPHABET_PATTERN = /^[a-zA-Z]/;
  if(!ALPHABET_PATTERN.test(e.data)) {
    this.value = this.value.slice(0, this.value.length - 1);
  }
}

function EventHandler_ToUpperCase(e) {
  const ALPHABET_PATTERN = /^[a-zA-Z]/;
  if(ALPHABET_PATTERN.test(e.data)) {
    this.value = this.value.toUpperCase();
  }
}