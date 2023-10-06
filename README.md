# TEST UPDATHE INFOMRATION THE USER
This repository contains a project that allows the creation of users using a combination of web technologies, including MySQL, AJAX, JavaScript, PHP, HTML5 and an MVC (Model-View-Controller) architecture. Below you will find information on how to configure and run the project.
## Previous requirements
Make sure you have the following installed in your development environment:

 - MySQL
 - Server web (por ejemplo, Apache)
 - PHP
 - Navegador web moderno

 ## Setting
 1 Clone this repository to your local system:
        
        git clone https://github.com/tuusuario/tuproyecto.git

 2 Create a MySQL database for the project and configure the credentials in the config/database.php file. Make sure the db prueba_user and user    table is correctly configured with the necessary fields.

 3 Configure your web server to point to the root directory of the project.

 ## Use
 1 Access the project through your web browser:

        http://localhost/tuproyecto/
 2 On the home page, you will be able to see all the users.
 3 The application will use AJAX to send the request to the PHP server, which will process the information and store it in the MySQL database.
 4 If the operation is successful, you will receive a list of users.

 ## Project Structure
index.php: Home page containing the  list of existing users.

assets/: Folder containing static files such as CSS and JavaScript.

controllers/: Folder containing the MVC architecture controllers.

models/: Folder that contains the MVC architecture models to interact with the database.

views/: Folder containing the application's HTML views.
## Contribute
If you would like to contribute to this project, we would be happy to receive your contributions! You can open an issue or submit a pull request on GitHub.
## License
This project is licensed under the MIT License. See the LICENSE file for more details.

## Author
Yon Fredy Romero Vargas
Thank you for using this project! If you have any questions or comments, please do not hesitate to contact us.