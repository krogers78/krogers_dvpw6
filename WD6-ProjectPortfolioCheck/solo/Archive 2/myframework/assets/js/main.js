// document ready function
$(document).ready(function () {
  // enable the use of popovers on the page
  $('[data-toggle="popover"]').popover() 

  $('#ajaxbtn').on('click', () => {
    let err = []
    // check if the username is empty and push to the err array
    if (emptyString($('#username').val()) || $('#username').val().match('^[a-zA-Z0-9_-]{1,20}$') === null) {
      $('#username').css('border-color', 'red')
      err.push('username')
     } else {
      $('#username').css('border-color', '#ced4da')
     }
    // check if the password is empty and push to the err array
    if (emptyString($('#password').val()) || $('#password').val().match('^[a-zA-Z0-9!@#$%]{6,}$') === null) {
      $('#password').css('border-color', 'red')
      err.push('password')
     } else {
      $('#password').css('border-color', '#ced4da')
     }

    if (err.length === 0) {
      $.ajax ({
        method: 'POST',
        url: '/home/ajaxParse',
        data: {
          'username':$('#username').val(), 
          'password':$('#password').val()
        },
        success: msg => {
              alert('Thanks for signing in!')
            } 
          })
        }
      })


  // Validate the Username
  $('#username').on('blur', () => {
    if (emptyString($('#username').val()) || $('#username').val().match('^[a-zA-Z0-9_-]{1,20}$') === null) {
      $('#username').css('border-color', 'red')
    } else {
      $('#username').css('border-color', '#ced4da')      
     }
   })
  // Validate the Password
  $('#password').on('blur', () => {
    if (emptyString($('#password').val()) || $('#password').val().match('^[a-zA-Z0-9!@#$%]{6,}$') === null) {
      $('#password').css('border-color', 'red')      
    } else {
      $('#password').css('border-color', '#ced4da')      
    }
   })
  // Validate the Bio
  $('#bio').on('blur', () => {
    if (emptyString($('#bio').val())) {
      $('#bio').css('border-color', 'red')            
    } else {
      $('#bio').css('border-color', '#ced4da')            
    }
   })
  // Validate the Age
  $('#age').on('blur', () => {
    if ($('#age').val() == null) {
      $('#age').css('border-color', 'red')
    } else {
      $('#age').css('border-color', '#ced4da')      
    }
   })
  $('#signup').on('click', e => {
    e.preventDefault()
    // Store the list of errors
    let err =[]
    // check if the username is empty and push to the err array
    if (emptyString($('#username').val()) || $('#username').val().match('^[a-zA-Z0-9_-]{1,20}$') === null) {
      $('#username').css('border-color', 'red')
      err.push('username')
    } else {
      $('#username').css('border-color', '#ced4da')
    }
    // check if the password is empty and push to the err array
    if (emptyString($('#password').val()) || $('#password').val().match('^[a-zA-Z0-9!@#$%]{6,}$') === null) {
      $('#password').css('border-color', 'red')
      err.push('password')
    } else {
      $('#password').css('border-color', '#ced4da')
    }
    // check if the bio is empty and push to the err array
    if (emptyString($('#bio').val())) {
      $('#bio').css('border-color', 'red')
      err.push('bio')
    } else {
      $('#bio').css('border-color', '#ced4da')
    }
    // check if the sex is empty and push to the err array
    if (!$('#male').is(':checked') && !$('#female').is(':checked') && !$('#other').is(':checked')) {
      $('#sex').css('border', '1px solid red')   
      err.push('sex')
    } else {
      $('#sex').css('border', 'none')
    }
    // check if the age is empty and push to the err array
    if ($('#age').val() == null) {
      $('#age').css('border-color', 'red')
      err.push('age')
    } else {
      $('#age').css('border-color', '#ced4da')
    }
    // Check to see if anything exists in the err array
    // If nothing exists then let the form submit
    if (err.length == 0) {
      $('#formsignup').submit()
    }
   })
  // check if the input is empty
  function emptyString(info) {
    if (info === '') {
      return true
    } else {
      return false
    }
   }


})