# Graduation-Thesis
The solution for the graduation thesis of 2021

This project was one of the biggest I have done and it includes using HTML, CSS, PHP and MySQL to create the website.

HOW TO SETUP
In order to run this project successfuly you need to import the database.
Afterwards change the connection properties.
1. api\index.php
2. classes\DB.php

Now you can successfuly launch the application however you are still unable to post images for the reason being the application uses access tokens for imgur
to upload and retrieve photos (You can post, but only the caption).

On Imgur you are requested to create an access token for your account which then you can paste it in:
classes\Image.php

Lastly alter the mail class to contain your own mail and password.
classes\Mail.php

I hope the instructions were helpfull

Have a great day

