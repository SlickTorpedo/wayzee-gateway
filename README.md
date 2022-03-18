**WANT TO INSTALL IT EASIER?**
If you want to install it with the check-balance addon:</br></br>
``wget https://nexussociety.net/curlrequests/includes.CONTAINS.zip``</br>

If you want to install it without the check-balance addon:</br></br>
``wget https://nexussociety.net/curlrequests/includes.EXCLUDES.zip``</br>

#
Then just go to https://yoursite.com/setup and it will run the setup script!


The token file will generate itself automatically don't worry!

The check-balance part is optional! It's just for people to check their account balance!
You will need to go to https://yoursite.com/setup in order to run the setup script! It will not work without it!

Please credit me if you use this, I'd appreciate it. The code is all open source though you may fork this or edit this as you wish and use it for yourself.

**IMPORTANT!!** There is sections that require you to input SQL data. I cannot include this in the install script because of security vulnerablities! I've set the credentials to default stuff but you will need to change this. It's the credentials for the database that hosts your pterodactyl panel! All the things that must be changed are in /payment-gateway/redirecting.php and if you're using it, in /check-balance. If you have not specified the SQL information, you will get errors when trying to complete the payments!

ALL THE FILES SHOULD BE CORRECT. You will need to create directorys on your server that match the ones in this repository minus the IMPORTANT one, that one just tells you to edit your PayPal.php file.

IF YOU WANT TO CHANGE THAT, YOU WILL NEED TO MODIFY CEARTAIN FILES

For help, contact Slick#7454 on discord :)

All credit for the billing module goes to Mubeen 

Join their discord: https://discord.gg/r6RBCuwn55 

This is just an addon for some people having some issues!

Purchase the main resource: https://pterodactyl-resources.com/resources/resource/13-billing-module-pterodacyl-17x--all-in-one-billing-system-/

The file in IMPORTANT/PayPal.php was created & coded by mubeen!

The first time you run the webpage, it may be a tad slow while it finds all the files! It won't happen after that though don't worry!
