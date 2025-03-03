<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-box" id="signUp" style="display:none;">
            <div class="login-header">Register</div>
            <form method="post" action="register.php">
                <div class="input-box">
                    <input type="text" class="input-field" name="empid" id="empid" placeholder="Enter Employee ID" autocomplete="off" required>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" name="password" id="password" placeholder="Password" autocomplete="off" required>
                </div>
                <input type="submit" class="btn" value="Submit" name="signUp">
            </form>
                <div class="links">
                    <p class="para">Already Have Account?</p>
                    <button id="signInButton">Sign In</button>
                </div>
    </div>

    <div class="login-box" id="signIn">
            <div class="login-header">Login</div>
            <form method="post" action="register.php">
                <?php if(isset($_GET['error'])){ ?>
                <div class="input-box2">
                    <?php echo $_GET['error']; ?>
                </div>    
                <?php } ?>
                <div class="input-box">
                    <input type="text" class="input-field" name="empid" id="empid" placeholder="Employee ID" autocomplete="off" required>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" name="password" id="password" placeholder="Password" autocomplete="off" required>
                </div>
                <label for="emp" class="dropdown">Login as</label>
                <select name="emp" id="emp" class="dn">
                    <option value="HR">HR</option>
                    <option value="Emp">Employee</option>
                </select>
                <input type="submit" class="btn" value="Submit" name="signIn">
            </form>
            <div class="links">
                <p class="para">Don't have account yet?</p>
                <button id="signUpButton">Sign Up</button>
            </div>
    </div>
    <script src="script.js"></script>
</body>
</html>