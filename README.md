# Original Gdrive Sharer (Edited + player) By Iqbal Rifai

### Demo FrontPage 
[Here](https://files.0wo.me)
![FrontPage](https://a.safe.moe/inWacrV.png)
### Demo Download Page
[Here](https://files.0wo.me/file/7)
### Install


1. Create an OAuth 2.0 client ID [See Video](https://www.youtube.com/watch?v=o425vQXpigw), when you finish opening the config file base/data/settings/config.json

2. edit

3. site.domain: Your domain
4. drive.client.id: Client ID
5. drive.client.secret: Client secret
6. drive.redirect.uris: A valid redirect URI

7. save

8. Enable google drive fire how to open console.developer.google.com click dashboard > enable api > select google drive.

9. after that you login with the account to be admin. 
10. open user base/data/user/{email}.json file
11. edit
12. role: admin
13. save
14. done

###### NB: If login error occurs, no name etc please change open base folder and change all existing premision folders there to 777. If the login name does not appear, open the login.php file and replace file_get_contents to load.
