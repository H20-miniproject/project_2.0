<!DOCTYPE html>
<html>
<head>
  <title>Signup Page</title>
  <link rel="stylesheet" type="text/css" href="siginup.css">
  <meta name="viewport" content="width=device-width, initial-scale=5">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Montserrat&display=swap');
  </style>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
  </script>
   <script src="signup.js"></script>
</head>
<body>
  <div class="container">
    <div class="contact-box">
      <div class="right">
        <div class="tabs">
          <button class="tablink" onclick="openTab(event, 'user1')">User</button>
          <button class="tablink" onclick="openTab(event, 'user2')">Retailer</button>
          <button class="tablink" onclick="openTab(event, 'user3')">Non Retailer</button>
        </div>
  
        <div id="user1" class="tabcontent active">
          <h2 style="font-family: 'Montserrat', sans-serif;">user signup</h2>
          <form action="signup_php.php" method="post" onsubmit="return user_validation()">
            <table>
              <tr>
                <span id="user_status" style="color: red;font-weight: bold;" class="fade-in"></span>
                <td colspan="2">
                  <input class="field" type="text" placeholder="username" name="name" required>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <input class="field" type="email" placeholder="email" name="email" onfocusout="user_checkemail()" required>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <input type="tel" class="field" placeholder="phone number" maxlength="10" name="phno" onfocusout="user_checkphonenumber()" required>
                </td>
              </tr>
              <tr>
                <td>
                  <input class="field" type="password" placeholder="password" name="pass1" required>
                </td>
                <td>
                  <input class="field" type="password" placeholder="confirm password" name="pass2" onfocusout="user_checkpassword()" required>
                </td>
              </tr>
              <tr>
                <td>
                  <input class="field" type="text" placeholder="place" name="place" required>
                </td>
                <td>
                  <input class="field" type="tel" placeholder="zip code" maxlength="6" name="zip" onfocusout="user_checkzipcode()" required>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <select class="field" name="district" required>
                    <?php include 'get_district.php'; ?>
                  </select>                  
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <input class="btn" type="submit" value="Sign Up" name="user_signup">
                </td>
              </tr>
            </table>
          </form>
        </div>
  
        <div id="user2" class="tabcontent">
          <h2 style="font-family: 'Montserrat', sans-serif;">Retailer Signup</h2>
          <form action="signup_php.php" method="post" onsubmit="return retailer_validation()">
            <table>
              <tr>
                <span id="retailer_status" style="color: red;font-weight: bold;" class="fade-in"></span>
                <td>
                  <input class="field" type="text" placeholder="shopname" name="shopname" required>
                </td>
                <td>
                  <input class="field" type="text" placeholder="ownername" name="ownername" required>
                </td>
              </tr>
              <tr>
                <td>
                  <input class="field" type="text" placeholder="license no" name="licnum" required>
                </td>
                <td>
                  <input type="tel" class="field" placeholder="phone number" maxlength="10" name="phno" onfocusout="retailer_checkphonenumber()" required>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <input class="field" placeholder="Address..." maxlength="100" name="retailer_addr" required></input>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <input class="field" type="email" placeholder="email" name="email" onfocusout="retailer_checkemail()" required>
                </td>
              </tr>
              <tr>
                <td>
                  <input class="field" type="password" placeholder="password" name="pass1" required>
                </td>
                <td>
                  <input class="field" type="password" placeholder="confirm password" name="pass2" onfocusout="retailer_checkpassword()" required>
                </td>
              </tr>
              <tr>
                <td>
                  <input class="field" type="text" placeholder="place" name="place" required>
                </td>
                <td>
                  <input class="field" type="tel" placeholder="zip code" maxlength="6" name="zip" onfocusout="retailer_checkzipcode()" required>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <select class="field" name="district" required>
                    <?php include 'get_district.php'; ?>
                  </select>                  
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <input class="btn" type="submit" value="Sign Up" name="retailer_signup">
                </td>
              </tr>
            </table>
          </form>
        </div>
  
        <div id="user3" class="tabcontent">
          <h2 style="font-family: 'Montserrat', sans-serif;">Non Retailer signup</h2>
          <form action="signup_php.php" method="post" onsubmit="return non_retailer_validation()">
            <table>
              <tr>
              <span id="non_retailer_status" style="color: red;font-weight: bold;" class="fade-in"></span>
                <td colspan="2">
                  <input class="field" type="text" placeholder="username" name="nonretailername">
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <input class="field" type="email" placeholder="email" name="nonretaileremail" onfocusout='non_retailer_checkemail()'>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <input type="tel" class="field" placeholder="phone number" maxlength="10" name="phno" id="phnoinput" onfocusout="non_retailer_checkphonenumber()" required>
                </td>
              </tr>
              <tr>
                <td>
                  <input class="field" type="password" placeholder="password" name="pass1">
                </td>
                <td>
                  <input class="field" type="password" placeholder="confirm password" name="pass2" onfocusout="non_retailer_checkpassword()">
                </td>
              </tr>
              <tr>
                <td>
                  <input class="field" type="text" placeholder="place" name="non_retailer_place">
                </td>
                <td>
                  <input class="field" type="tel" placeholder="zip code" maxlength="6" name="zip" onfocusout="non_retailer_checkzipcode()">
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <select class="field" name="district" required>
                    <?php include 'get_district.php'; ?>
                  </select>                  
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <input class="btn" type="submit" value="Sign Up" name="non_retailer_signup">
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- validation -->
  <script>
    function user_validation()
    {
      if(document.getElementById("user_status").innerText == "")
      {
        return true;
      }
      else
      {
        return false;
      }
    }
    function retailer_validation()
    {
      if(document.getElementById("retailer_status").innerText == "")
      {
        return true;
      }
      else
      {
        return false;
      }
    }
    function non_retailer_validation()
    {
      if(document.getElementById("non_retailer_status").innerText == "")
      {
        return true;
      }
      else
      {
        return false;
      }
    }
  </script>

</body>
</html>