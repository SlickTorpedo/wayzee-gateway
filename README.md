**NOTE, THIS REQUIRES A PAYPAL BUISNESS ACCOUNT TO WORK!**

**WANT TO INSTALL IT EASIER?**</br></br>
If you want to install it with the check-balance addon: (Not Supported or updated)</br>
``cd /var/www/pterodactyl/public/``<br>
``wget https://nexussociety.net/curlrequests/includes/CONTAINS.zip``</br>
``unzip CONTAINS.zip``<br>

#

If you want to install it without the check-balance addon: (Recommended & Simpler)</br>
``cd /var/www/pterodactyl/public/``<br>
``wget https://nexussociety.net/curlrequests/includes/EXCLUDES.zip``</br>
``unzip EXCLUDES.zip``<br>

#
You must go to the IMPORTANT file and read what's in there or none of this will work!

Then just go to https://yoursite.com/setup and it will run the setup script!


The token file will generate itself automatically don't worry!

The check-balance part is optional! It's just for people to check their account balance!
You will need to go to https://yoursite.com/setup in order to run the setup script! It will not work without it!

Check balance is **not** supported! It's there if you would like to edit the code and for you to copy and paste and modify but it's not updated and not supported. There are some issues with it like you must get the images and js from my website yourself so it's there for you to learn with!

Please credit me if you use this, I'd appreciate it. The code is all open source though you may fork this or edit this as you wish and use it for yourself.

#

**IMPORTANT!!** There is sections that require you to input SQL data. I cannot include this in the install script because of security vulnerablities! I've set the credentials to default stuff but you will need to change this. It's the credentials for the database that hosts your pterodactyl panel! All the things that must be changed are in /payment-gateway/redirecting.php and if you're using it, in /check-balance. If you have not specified the SQL information, you will get errors when trying to complete the payments!

#

ALL THE FILES SHOULD BE CORRECT. You will need to create directorys on your server that match the ones in this repository minus the IMPORTANT one, that one just tells you to edit your PayPal.php file.

IF YOU WANT TO CHANGE THAT, YOU WILL NEED TO MODIFY CEARTAIN FILES

For help, click here: https://discord.gg/tN7AX9m8mS

All credit for the billing module goes to Mubeen 

Join their discord: https://discord.gg/r6RBCuwn55 

This is just an addon for some people having some issues!

Purchase the main resource: https://pterodactyl-resources.com/resources/resource/13-billing-module-pterodacyl-17x--all-in-one-billing-system-/

The file in IMPORTANT/PayPal.php was created & coded by mubeen!

The first time you run the webpage, it may be a tad slow while it finds all the files! It won't happen after that though don't worry!

*I don't recommend the check balance at all it's just mostly so you can learn to turn a email into a user Id and then check their account balance but the CSS & JS is outdated and it's not got the proper images. In the future I may change this idk*
