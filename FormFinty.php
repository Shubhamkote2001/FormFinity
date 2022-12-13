

<html>
<head>
    <title>Yoga Classes Registration Form</title>
    <style type="text/css">
        body {
            background-color: pink;
            font-family: "Times New Roman";
        }
        table.form-container {
            padding: 20px;
            margin: 0 auto;
            width: 500px;
            background-color: #f2f2f2;
            border-radius: 10px;
        }
        .form-control {
            width: 100%;
            height: 35px;
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        .form-control:focus {
            border-color: #36a5d5;
        }
        .form-label {
            text-align: left;
            padding: 0;
            margin: 0;
        }
        .form-btn {
            background-color: #36a5d5;
            border: none;
            color: #fff;
            padding: 8px 20px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <table class="form-container">
        <tr>
            <th colspan="2"><h3>YOGA CLASSES REGISTRATION FORM</h3></th>
        </tr>
        <form action="register.php" method="post" autocomplete="off" onsubmit="return validateForm()">
            <tr>
                <td><label class="form-label" for="name">Name: </label></td>
                <td>
                    <input type="text" class="form-control"  id="name" placeholder="Your name" name="name" required>
                </td>
            </tr>
            <tr>
                <td><label class="form-label" for="age">Age: </label></td>
                <td>
                    <input type="text" class="form-control"  id="age" placeholder="Your age" name="age" required>
                </td>
            </tr>
            <tr>
                <td><label class="form-label" for="batch">Batch: </label></td>
                <td>
                    <select  id="batch" class="form-control" name="batch" required>
                        <option value="">Select Batch</option>
                        <option value="6-7AM">6-7AM</option>
                        <option value="7-8AM">7-8AM</option>
                        <option value="8-9AM">8-9AM</option>
                        <option value="5-6PM">5-6PM</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label class="form-label" for="payment">Payment: </label></td>
                <td>
                    <input type="number" class="form-control"  id="payment" placeholder="Monthly Fee" min="500" name="payment" required>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" class="form-btn" value="Register">
                </td>
            </tr>
        </form>
    </table>
    <script type="text/javascript">
        function validateForm() {
            var age = document.getElementById("age").value;
            var payment = document.getElementById("payment").value;

            if (age < 18 || age > 65) {
                alert("Age must be between 18 and 65 years.");
                return false;
            }
            if (payment < 500) {
                alert("Monthly fee must be at least 500 INR.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>





<?php

$name = $_POST['name'];
$age = $_POST['age'];
$batch = $_POST['batch'];
$payment = $_POST['payment'];

$conn = mysqli_connect("localhost", "root", "", "shubham kote");
if(!$conn) {
    die("Connection failed:" .mysqli_connect_error());
}

$sql = "INSERT INTO yoga (name, age, batch, payment) 
        VALUES ('$name', '$age', '$batch', '$payment')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " .$sql. "<br>" .mysqli_error($conn);
}

mysqli_close($conn);

?>
