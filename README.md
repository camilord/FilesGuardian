# FilesGuardian
Files Guardian is command script to monitor your web server files when its changed or 
any malicious files or folders added, will automatically delete it for you and notify you the list.

### Database Schema
```
files_guardian.db
 |
 +- locked_files
 |   +- id (pk)
 |   +- md5_hash
 |   +- file_path
 |   +- created
 |   +- deleted
 |
 +- locked_folders
     +- id (pk)
     +- path
     +- created
     +- deleted  
```        
## Configurations

`dictionary/exclusoin.conf.json` - where the list of directory and files that you want to exclude from scanning, locking and guarding

`dictionary/extensions.conf.json` - list of file extensions that you think it can be infected with malware, script kiddies etc

`dictionary/known.rubbish` - known rubbish I experience and added as default dictionary. It is the contents of php scripts they infected.

`admin.conf.json` - list of people to get the notification when malicious files/folders have found

`mail.conf.json` - smtp credentials configuration


## Usage

the command below is to scan the specified path
```bash
php console.php guardian:execute --mode=scan /var/www/html
```

the command below is to lockdown the files and folders on the specified path, or freeze state.
```bash
php console.php guardian:execute --mode=lock /var/www/html
```

### Enable guarding your files
the command below is to guard the specified folder,
so, if there are foreign files and folders will be added or created or 
even the files are modified, it will be deleted automatically.

there are two options, aggressive and passive...

for aggressive mode, use and add this to cron:
```bash
0 * * * * php /root/FilesGuardian/console.php guardian:execute --mode=guard --action=delete "/var/www/html"
```
meaning, if any malicious files or folders found, will automatically delete it and notify you (make sure you configure the `mail.conf.json`).

for passive mode, use ad add this to cron:
```bash
0 * * * * php /root/FilesGuardian/console.php guardian:execute --mode=guard --action=notify "/var/www/html"
```
meaning, if any malicious files/folders found, will notify you (reminder to configure the `mail.conf.json`)


### Warning
before setting up the cron, make sure you do the following:
- run `--mode=lock` before running `--mode=guard`
- exclude the folders that saves files or any folder or path that generates new files, add it to `dictionary/exclusion.conf.json`
- folder exclusion should be full path
- on aggressive mode (`--acton=delete`), a reminder that it will delete the files automatically.  