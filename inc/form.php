<style>
    html {
        width:100%;
        height:90%;
    }
    body {
        width:100%;
        height:90%;
        display:flex;
        justify-content:center;
        align-items:center;
    }

    h2 {
        font-size:28px;
    }
    label {
        font-size:18px;
        font-weight:bold;
        display:block;
        padding:0.8rem 0;
    }
    input[type="password"] {
        font-size:18px;
        padding:1rem 2rem;
        width:100%;
    }
    .submit_container {
        padding:1rem 0;
    }
    .submit_btn {
        background-color:green;
        font-size:18px;
        border:0;
        color:#FFF;
        padding:1rem 2rem;
        cursor: pointer;
    }
    p {
        color:red;
        font-weight:bold;
    }

</style>
</head>
<body>
   <div class="form_container">
        <form action="<?php echo plugin_dir_url(__FILE__); ?>access.php" method="post">
            <h2>Enter the password to continue</h2>
            <label for="">Password</label>
            <?php 

                if(isset($_SESSION['SKAP_DEVELOPMENT_PASSWORD_ERROR']) && $_SESSION['SKAP_DEVELOPMENT_PASSWORD_ERROR'] == 1)
                {
                    echo '<p>You have entered an incorrect password.</p>';
                }
            
            ?>
            <input type="password" name="access_password" placeholder="Enter the password to continue">
            <div class="submit_container">
                <input type="submit" name="get_dev_access" value="GET ACCESS" class="submit_btn">
            </div>
        </form>    
    </div> 
</body>
</html>