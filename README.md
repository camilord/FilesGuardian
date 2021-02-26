# FilesGuardian
Files Guardian is command script to monitor your web server files when its change and notify you

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

## Usage

```bash
php console.php --mode=scan /var/www/html
```
the command above is to scan the specified path

```bash
php console.php --mode=lock /var/www/html
```
the command above is to lock down the specified path

```bash
0 * * * * php /root/FilesGuardian/console.php --mode=guard /var/www/html
```
the command above is to guard the folder specified,
if there are foreign files, it will be deleted automatically

### Warning
before setting up the cron, make sure you do the following:
- run `--mode=lock` before running guard
- exclude the folders that saves files or any folder or path that generates new files
- folder exclusion should be relative path 