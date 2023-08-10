<?php

    #db connection
    $conn = new mysqli('localhost','root','','h2o_watersupply');
    if($conn->connect_error)
    {
        echo "<script>alert('Something went wrong')</script>";
    }
    else
    {
        if(isset($_POST['user_email']))
        {
            $emailId=$_POST['user_email'];

            $checkdata=" SELECT user_email FROM user_table WHERE user_email='$emailId' ";

            $result = $conn->query($checkdata);

            if($result->num_rows > 0)
            {
                echo "Email Already Exist";
            }
            else
            {
                echo "null";
            }
        }
        if(isset($_POST['retailer_email']))
        {
            $emailId=$_POST['retailer_email'];

            $checkdata=" SELECT retailer_email FROM retailer_table WHERE retailer_email='$emailId' ";

            $result = $conn->query($checkdata);

            if($result->num_rows > 0)
            {
                echo "Email Already Exist";
            }
            else
            {
                echo "null";
            }
        }

         #user signup
        if(isset($_POST['user_signup']))
        {
            $email_array = [];
            $username = $_POST['name'];
            $useremail = $_POST['email'];
            $userphone = $_POST['phno'];
            $userpassword = $_POST['pass2'];
            $userplace = $_POST['place'];
            $userzipcode = $_POST['zip'];
            $userdistrict = $_POST['district'];
            
            $sql_query = "INSERT INTO user_table(user_name,user_email,user_phno,user_password,user_place,user_zipcode,user_district)
                        VALUES('$username','$useremail','$userphone','$userpassword','$userplace','$userzipcode','$userdistrict');";

            if($conn->query($sql_query)==True)
            {
                echo "<script>alert('Value inserted successfully')</script>";
                echo "<script>window.location.href = 'http://localhost/php_works/H20/project%20code%20files/signup/login.php';</script>";

            }
            else
            {
                echo "<script>alert('Something went wrong')</script>";
                echo "<script>window.location.href = 'http://localhost/php_works/H20/project%20code%20files/signup/signup.html';</script>";
            }
        }

        if(isset($_POST['retailer_signup']))
        {
            $email_array = [];
            $shopname = $_POST['shopname'];
            $ownername = $_POST['ownername'];
            $licensenumber = $_POST['licnum'];
            $retailer_phonenumber = $_POST['phno'];
            $retailer_address = $_POST['retailer_addr'];
            $retailer_email = $_POST['email'];
            $retailer_password = $_POST['pass2'];
            $retailer_place = $_POST['place'];
            $retailer_zip = $_POST['zip'];
            $retailer_district = $_POST['district'];

                $sql_query = "INSERT INTO retailer_table(shopname,ownername,licenseno,retailer_phno,retailer_address,retailer_email,retailer_password,retailer_place,retailer_zipcode,retailer_district)
                VALUES('$shopname','$ownername','$licensenumber','$retailer_phonenumber','$retailer_address','$retailer_email','$retailer_password','$retailer_place','$retailer_zip','$retailer_district');";

                if($conn->query($sql_query)==True)
                {
                    echo "<script>alert('Value inserted successfully')</script>";
                    echo "<script>window.location.href = 'http://localhost/php_works/H20/project%20code%20files/signup/login.php';</script>";

                }
                else
                {
                    echo "<script>alert('Something went wrong')</script>";
                    echo "<script>window.location.href = 'http://localhost/php_works/H20/project%20code%20files/signup/signup.html';</script>";
                }
            }

        if(isset($_POST['non_retailer_signup']))
        {
            $email_array=[];
            $nonretailername = $_POST['nonretailername'];
            $nonretaileremail = $_POST['nonretaileremail'];
            $nonretailerphno = $_POST['phno'];
            $nonretailerpassword = $_POST['pass2'];
            $nonretailerplace = $_POST['non_retailer_place'];
            $nonretailerzipcode = $_POST['zip'];
            $nonretailerdistrict = $_POST['district'];

            $data = $conn->query("SELECT non_retailer_email FROM non_retailers_table");
            if($data->num_rows>0)
            {
                while($row = $data->fetch_assoc())
                {
                    array_push($email_array,$row['non_retailer_email']);
                }
            }
            if(in_array($nonretaileremail,$email_array))
            {
                echo "<script>alert('Mail id already in use!')</script>";
                echo "<script>window.location.href = 'http://localhost/php_works/H20/project%20code%20files/signup/signup.html';</script>";
            }
            else
            {
                $sql_query = "INSERT INTO non_retailers_table(non_retailer_name,non_retailer_email,non_retailer_phno,non_retailer_password,non_retailer_place,non_retailer_zipcode,non_retailer_district)
                          VALUES('$nonretailername','$nonretaileremail','$nonretailerphno','$nonretailerpassword','$nonretailerplace','$nonretailerzipcode','$nonretailerdistrict');";

                if($conn->query($sql_query)==True)
                {
                    echo "<script>alert('Value inserted successfully')</script>";
                    echo "<script>window.location.href = 'http://localhost/php_works/H20/project%20code%20files/signup/login.php';</script>";

                }
                else
                {
                    echo "<script>alert('Something went wrong')</script>";
                    echo "<script>window.location.href = 'http://localhost/php_works/H20/project%20code%20files/signup/signup.html';</script>";
                }
            }
        }
    }
   
?>