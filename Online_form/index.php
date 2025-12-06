<?php 
// If form is submitted, capture data
$isSubmitted = isset($_POST['submit']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Registration Form</title>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f4f9;
        }

        .container {
            width: 420px;
            background: #fff;
            padding: 20px;
            margin: 40px auto;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #0066ff;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
        }

        button:hover {
            background: #0044aa;
            cursor: pointer;
        }

        .box {
            padding: 10px;
            background: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>

    <script>
        $(document).ready(function () {

            $("#regForm").on("submit", function (e) {

                let name = $("#name").val().trim();
                let email = $("#email").val().trim();
                let phone = $("#phone").val().trim();
                let gender = $("#gender").val();
                let address = $("#address").val().trim();

                if (name === "" || email === "" || phone === "" ||
                    gender === "" || address === "") {

                    alert("All fields are required!");
                    e.preventDefault();
                }
            });

        });
    </script>

</head>

<body>

<div class="container">

    <?php if (!$isSubmitted) { ?>

        <h2>Online Registration Form</h2>

        <form id="regForm" method="POST">

            <label>Full Name:</label>
            <input type="text" name="name" id="name">

            <label>Email:</label>
            <input type="email" name="email" id="email">

            <label>Phone Number:</label>
            <input type="text" name="phone" id="phone">

            <label>Gender:</label>
            <select name="gender" id="gender">
                <option value="">-- Select --</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>

            <label>Address:</label>
            <textarea name="address" id="address"></textarea>

            <button type="submit" name="submit">Submit Application</button>
        </form>

    <?php } else { ?>

        <h2>Application Submitted Successfully</h2>

        <p><strong>Name:</strong> <?php echo $_POST['name']; ?></p>
        <p><strong>Email:</strong> <?php echo $_POST['email']; ?></p>
        <p><strong>Phone:</strong> <?php echo $_POST['phone']; ?></p>
        <p><strong>Gender:</strong> <?php echo $_POST['gender']; ?></p>

        <p><strong>Address:</strong></p>
        <div class="box"><?php echo nl2br($_POST['address']); ?></div>

        <br>
        <button onclick="window.location.href='index.php'">Submit Another Response</button>

    <?php } ?>

</div>

</body>
</html>
