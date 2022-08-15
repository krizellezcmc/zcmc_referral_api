<?php 
function accept($firstName) {
    $accept = '
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
            We would like to inform you that your account has been verified.
        </p>

        <p>
            You can now log in using your credentials. Thank you!
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

    return $accept;
 
}

?>
