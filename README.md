# hw2
# Tables for HW1

# 1. Useres table 

```sql
CREATE TABLE users (username varchar(255) PRIMARY KEY, password varchar(255));
INSERT INTO users VALUES("Amelia-Earhart","Youaom139&yu7");
INSERT INTO users VALUES("Otto","StarWars2*");
```

```sql
CREATE TABLE ratings (id int(1) PRIMARY KEY, username varchar(255), song varchar(255), rating int(1));
INSERT INTO ratings VALUES(1, "Amelia-Earhart", "Freeway", 3);
INSERT INTO ratings VALUES(2, "Amelia-Earhart", "Days of Wine and Roses", 4);
INSERT INTO ratings VALUES(3, "Otto", "Days of Wine and Roses", 5);
INSERT INTO ratings VALUES(4, "Amelia-Earhart", "These Walls", 4);
```

```sql
CREATE TABLE artists (song varchar(255) PRIMARY KEY, artist varchar(255));
INSERT INTO artists VALUES("Freeway", "Aimee Mann");
INSERT INTO artists VALUES("Days of Wine and Roses", "Bill Evans");
INSERT INTO artists VALUES("These Walls", "Kendrick Lamar" "Otto");
```

Link to data base: http://localhost:8080/phpmyadmin/index.php?route=/database/structure&server=1&db=music-db

