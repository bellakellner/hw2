Assuming all necesarry packages in the console and programs in the computer have been installed.

Step 1) Activate Xammp MySQL

Step 2) Create a databse named 'musicdb'

Step 3) Run file 'music_databases.sql' to add the tables in the database. I ran the query in the Navicat program, I believe you could do the same in PhpMyAdmin. 

step 4) activate virtual environment by doing the following 'venv/Script/activate.bat' in Windows, I believe it might be 'venv/Script/activate'

OPTIONALS {

    Step 5) run migrations if needed "python manage.py makemigrations"

    Step 6) "python manage.py migrate"

    PS Windows uses 'python' MAC uses 'python3'
}


step 7) run the server "python manage.py runserver"

Step 8) Have fun!