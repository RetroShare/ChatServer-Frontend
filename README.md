rs-w2c : Retroshare Chat Server Frontend
======

This is the source code for the Retroshare Chat Server PHP Frontend.

People can add their RS-Key to the chatserver and receive the Key from the chatserver in advance to add it to their Friendlist. 
The RS-Key of the user is saved in /home/<user>/.retroshare/chatserver/NEWCERTS/, defined in config.ini. 
The chatserver checks every 30 seconds the Keys from the NEWCERTS directory and adds the RS-Keys to the keyring and Friendlist. 

Translation is done in directory i18n. 
This frontend is prepared for https://github.com/cavebeat/retroshare-chatserver 

Pls send me any translations as a pull request, inside RetroShare or per mail. 

Thanks
