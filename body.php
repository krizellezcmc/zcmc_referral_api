<?php 
function body($firstName) {
    $body = '
    <body
    style="
        display: flex;
        justify-content: center;
        margin-top: 10px;
        font-family: Arial Light;
    "
    >
    <div
        style="
        width: 380px;
        height: 380px;
        "
    >
        <p
        class="text-top"
        style="
            font-size: 16px;
            font-weight: bold;
           
            margin-bottom: 30px;
        "
        >
        Hello, '.$firstName.'!
        </p>

        <div class="body" style="font-size: 14px; font-weight: light">
        <p>
            Welcome to Zamboanga City Medical Center. You have successfully
            registered an account.
        </p>

        <p>
            You may <a href="http://192.168.3.135:3000/">login here</a> to check
            your account status.
        </p>
        <p>
            If you have questions, you may contact us at
            zcmc.referral@gmail.com
        </p>
        </div>

        <!-- <hr class="line" /> -->

        <!-- <img src="./images/zcmc.png" height="40px" />
        <img src="./images/doh.png" height="40px" />
        <div class="footer">
            <img src="./images/zcmc.png" height="50px" style="float: right" />
            <p>
            Dr. Evanagelista St., Sta. Catalina <br />
            Zamboanga City Zamboanga del Sur <br />Philippines 7000
            </p>
        </div> -->
    </div>
    </body>';

    return $body;
 
}

?>
