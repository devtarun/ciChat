# ciChat

A Simple PHP Apps for chating simulation using Codeigniter framework and API's.

### Installation Instructions
- Clone/download the repo.
- Create a database and upload the sql file in th repo.
- Change `$config['base_url']` to your url in `application\config\config.php`
- Update database details in `application\config\database.php`

### API's
You can use `POSTMAN` to check GET AND POST API.

GET - `http://localhost:8080/ciChat/home/getMsgs` - To get all messages.
POST - `http://localhost:8080/ciChat/home/sayhi/1` WHERE 1, 2 - is the user id in DB