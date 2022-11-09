<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        html,
body {
  height: 100%;
}

body {
  margin: 0;
  background: linear-gradient(45deg, #49a09d, #5f2c82);
  font-family: sans-serif;
  font-weight: 100;
}
.top{
  color: wheat;
}

.container {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

table {
  margin-left: 330px;
  text-align: center;
  width: 900px;
  border-collapse: collapse;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0,0,0,0.2);
  border-color: aqua;
}

th,
td {
  padding: 15px;
  background-color: rgba(255,255,255,0.2);
  color: #fff;
}

th {
  text-align: left;
}

thead {
  th {
    background-color: #55608f;
  }
}
 thead tr th{
  color: aquamarine;
  text-align: center;
 }
tbody {
  tr {
    &:hover {
      background-color: rgba(255,255,255,0.3);
    }
  }
  td {
    position: relative;
    &:hover {
      &:before {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        top: -9999px;
        bottom: -9999px;
        background-color: rgba(255,255,255,0.2);
        z-index: -1;
      }
    }
  }
}
      }
    </style>
    <title>HOME</title>
  </head>
  <body>
    <center class="top"><h1>HELLO FARMER <br> Here are the orders for you to deliver</h1></center>
    <table border="1" cellspacing="5" cellpadding="5" width="100%">
      <thead>
        <tr>
          <th>Order No.</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>address</th>
          <th>paymet mode</th>
          <th>proudcts</th>
          <th>amount paid</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require_once('cnkt.php');
        $result = $conn->prepare("SELECT * FROM orders "); 
        $result->execute(); for($i=0; $row = $result->fetch();
        $i++){ 
          ?>
        <tr>
          <td>
            <label><?php echo $row['id']; ?></label>
          </td>
          <td>
            <label><?php echo $row['name']; ?></label>
          </td>
          <td>
            <label><?php echo $row['email']; ?></label>
          </td>
          <td>
            <label><?php echo $row['phone']; ?></label>
          </td>
          <td>
            <label><?php echo $row['address']; ?></label>
          </td>
          <td>
            <label><?php echo $row['pmode']; ?></label>
          </td>
          <td>
            <label><?php echo $row['products']; ?></label>
          </td>
          <td>
            <label><?php echo "Rs. " . $row['amount_paid']; ?></label>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <br><br><br>
    <center><input type="button" value="DELIVER" onclick="myFunction()" /></center>
<script>
  function myFunction(){
    var order = prompt("Please enter the order number you want to deliver", "");alert("You have 45 mins to deliver order no. "+order);

  }
</script>
  </body>
</html>
<!-- alert('you can now deliver to the given address'); -->