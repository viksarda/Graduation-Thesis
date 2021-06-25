# Graduation-Thesis
The solution for the graduation thesis of 2021

Because the filesize extends 100 I can only submit it compressed.

HOW TO SETUP
In order to run this project successfuly you need to import the database (the name of the database can be whatever you wish)
Afterwards change the variables of the connection to the DB:
1. api\index.php line 5
2. classes\DB.php line 5

Now you can successfuly laucng the application however you are still not allowed to post images for the reason being the application uses access tokens to use imgur
to upload them and retrieve them to there.

So you will need to make an account on imgur and request an access token for your account which then you can paste it in:
classes\Image.php line 9 (the long string)

That is mostly it excluding the email sender which you just change:
classes\Mail.php line 12 and 13 to match your own email with the password of the email.

I hope the instructions were helpfull and the solution is corretly sent

Have a nice day :)

