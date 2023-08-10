const error_msg = [];
function openTab(event, tabName) {
    var i, tabcontent, tablinks;
    
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    
    document.getElementById(tabName).style.display = "block";
    event.currentTarget
}
//USER VALIDATION
//Function for email validation
function user_checkemail()
{
  var email = document.getElementsByName('email')[0].value;
  if(email)
  {
    $.ajax({
      type: 'post',
      url: 'signup_php.php',
      data:{
       user_email:email,
      },
      success: function (response) {
        if(response == "Email Already Exist")
        {
          if(!("Email Already Exist" in error_msg))
          {
            error_msg.push("Email Already Exist");
            show_user_error();
          }
        }
        else
        {
          var indexToRemove = error_msg.indexOf("Email Already Exist");
          if (indexToRemove !== -1) {
            error_msg.splice(indexToRemove, 1);
          }
          show_user_error();
        }
      }
    });
  }
}
//Function for phone number validation
function user_checkphonenumber()
    {
      var phonenumber = document.getElementsByName('phno')[0].value;
      var regex = new RegExp("[6-9]{1}[0-9]{9}");
      if(!regex.test(phonenumber))
      {
        if(!("invalid phone number" in error_msg))
        {
          error_msg.push("invalid phone number");
          show_user_error();
        }
      }
      else
      {
        var indexToRemove = error_msg.indexOf("invalid phone number");
        if (indexToRemove !== -1) {
          error_msg.splice(indexToRemove, 1);
        }
        show_user_error();
      }
    }

//function for zip code validation
  function user_checkzipcode()
    {
      var zipcode = document.getElementsByName('zip')[0].value;
      if(zipcode.length !== 6)
      {
        if(!("invalid zipcode" in error_msg))
        {
          error_msg.push("invalid zipcode");
          show_user_error();
        }
      }
      else
      {
        var indexToRemove = error_msg.indexOf("invalid zipcode");
        if (indexToRemove !== -1) {
          error_msg.splice(indexToRemove, 1);
        }
        show_user_error();
      }
    }
  //Function for password validation
function user_checkpassword()
{
  var pass1 = document.getElementsByName('pass1')[0].value;
  var pass2 = document.getElementsByName('pass2')[0].value;
  if(pass1 != pass2)
  {
    if(!("Password not same" in error_msg))
        {
          error_msg.push("Password not same");
          show_user_error();
        }
  }
  else if (pass1.length < 6 || pass2.length < 6)
  {
    if(!("password should have 6+ characters" in error_msg))
        {
          error_msg.push("password should have 6+ characters");
          show_user_error();
        }
  }
  else
  {
    var indexToRemove = error_msg.indexOf("Password not same");
    if (indexToRemove !== -1) {
      error_msg.splice(indexToRemove, 1);
    }
    var indexToRemove2 = error_msg.indexOf("password should have 6+ characters");
    if (indexToRemove2 !== -1) {
      error_msg.splice(indexToRemove2, 1);
    }
    show_user_error();
  }
}

function show_user_error()
{
  if (error_msg && error_msg.length === 0) {
    document.getElementById("user_status").innerText = "";
  } else {
    document.getElementById("user_status").innerText = error_msg[error_msg.length-1];
  }

}

//USER VALIDATION
//Function for email validation
function retailer_checkemail()
{
  var email = document.getElementsByName('email')[1].value;
  if(email)
  {
    $.ajax({
      type: 'post',
      url: 'signup_php.php',
      data:{
       retailer_email:email,
      },
      success: function (response) {
        if(response == "Email Already Exist")
        {
          if(!("Email Already Exist" in error_msg))
          {
            error_msg.push("Email Already Exist");
            show_retailer_error();
          }
        }
        else
        {
          var indexToRemove = error_msg.indexOf("Email Already Exist");
          if (indexToRemove !== -1) {
            error_msg.splice(indexToRemove, 1);
          }
          show_retailer_error();
        }
      }
    });
  }
}
//Function for phone number validation
function retailer_checkphonenumber()
    {
      var phonenumber = document.getElementsByName('phno')[1].value;
      var regex = new RegExp("[6-9]{1}[0-9]{9}");
      if(!regex.test(phonenumber))
      {
        if(!("invalid phone number" in error_msg))
        {
          error_msg.push("invalid phone number");
          show_retailer_error();
        }
      }
      else
      {
        var indexToRemove = error_msg.indexOf("invalid phone number");
        if (indexToRemove !== -1) {
          error_msg.splice(indexToRemove, 1);
        }
        show_retailer_error();
      }
    }

//function for zip code validation
  function retailer_checkzipcode()
    {
      var zipcode = document.getElementsByName('zip')[1].value;
      if(zipcode.length !== 6)
      {
        if(!("invalid zipcode" in error_msg))
        {
          error_msg.push("invalid zipcode");
          show_retailer_error();
        }
      }
      else
      {
        var indexToRemove = error_msg.indexOf("invalid zipcode");
        if (indexToRemove !== -1) {
          error_msg.splice(indexToRemove, 1);
        }
        show_retailer_error();
      }
    }
  //Function for password validation
function retailer_checkpassword()
{
  var pass1 = document.getElementsByName('pass1')[1].value;
  var pass2 = document.getElementsByName('pass2')[1].value;
  if(pass1 != pass2)
  {
    if(!("Password not same" in error_msg))
        {
          error_msg.push("Password not same");
          show_retailer_error();
        }
  }
  else if (pass1.length < 6 || pass2.length < 6)
  {
    if(!("password should have 6+ characters" in error_msg))
        {
          error_msg.push("password should have 6+ characters");
          show_retailer_error();
        }
  }
  else
  {
    var indexToRemove = error_msg.indexOf("Password not same");
    if (indexToRemove !== -1) {
      error_msg.splice(indexToRemove, 1);
    }
    var indexToRemove2 = error_msg.indexOf("password should have 6+ characters");
    if (indexToRemove2 !== -1) {
      error_msg.splice(indexToRemove2, 1);
    }
    show_retailer_error();
  }
}

function show_retailer_error()
{
  if (error_msg && error_msg.length === 0) {
    document.getElementById("retailer_status").innerText = "";
  } else {
    document.getElementById("retailer_status").innerText = error_msg[error_msg.length-1];
  }

}