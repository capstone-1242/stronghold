If adding SFTP, just past this into your file `sftp.json` and it should auto update to filezilla:

```json
{
    "name": "St Philip",
    "host": "dmitstudent.ca",
    "protocol": "ftp",
    "username": "stronghold",
    "password": "HelpingWithHope1!",
    "remotePath": "/public_html/stronghold",
    "uploadOnSave": true,
    "secure":true,
    "secureOptions": {
        "rejectUnauthorized": false
    }
}
```
