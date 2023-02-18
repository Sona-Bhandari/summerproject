<html>
  <head>
    <script>
      function GEEKFORGEEKS() {
        var name =
          document.forms["RegForm"]["Name"];
        
        var phone =
          document.forms["RegForm"]["Telephone"];
        var Telephone =
          document.forms["RegForm"]["Subject"];
        var Gender =
          document.forms["RegForm"]["Gender"];
        var address =
          document.forms["RegForm"]["Address"];

        if (name.value == "") {
          window.alert("Please enter your name.");
          name.focus();
          return false;
        }

        if (address.value == "") {
          window.alert("Please enter your address.");
          address.focus();
          return false;
        }

        

        if (phone.value == "") {
          window.alert(
          "Please enter your telephone number.");
          phone.focus();
          return false;
        }

        if (Gender.value == "") {
          window.alert("Please enter your gender");
          Gender.focus();
          return false;
        }

        if (what.selectedIndex < 1) {
          alert("Please enter your course.");
          what.focus();
          return false;
        }

        return true;
      }
    </script>

    <style>
      div {
        box-sizing: border-box;
        width: 100%;
        border: 100px solid black;
        float: left;
        align-content: center;
        align-items: center;
      }

      form {
        margin: 0 auto;
        width: 600px;
      }
    </style>
  </head>

  <body>
    <h1 style="text-align: center;">REGISTRATION FORM</h1>
    <form action="connect.php"method="post"> 
      
      <p>Name: <input type="text"
              size="65" name="Name" /></p>
      <br />
      <p>Address: <input type="text"
              size="65" name="Address" />
    </p>
      
      <p>Gender: <input type="text"
            size="65" name="Gender" /></p>
      <br />
      <p>Telephone: <input type="text"
            size="65" name="Telephone" /></p>
      <br />

      <p>
        SELECT YOUR COURSE
        <select type="text" value="" name="Subject">
          <option>BTECH</option>
          <option>BBA</option>
          <option>BCA</option>
          <option>B.COM</option>
          <option>BIM</option>
        </select>
      </p>
      <br />
      <br />
      
      <p>
        <input type="submit"
           name="Submit" />
        <input type="reset"
          value="Reset" name="Reset" />
      </p>
    </form>
  </body>
</html>


