Beskrivning av BokRejset
Webbtjänst där användare kan logga böcker de läst, antal sidor och recension för boken. En användares totala antal lästa sidor ska visas i en high-score-tabell. Syftet är att uppmuntra personer att läsa böcker.


Databasen består av 4 tabeller:

Users
id int
first_name varchar(32)
last_name varchar(32)

Books
id int
title varchar(32)
year int
author_id int

Author
id int
first_name varchar(32)
last_name varchar(32)

Userbook
id int
user_id int
book_id int
pages int
comment varchar(200)


Navigering
5 länkar till olika sidor:
    hem
    användare
    böcker
    författare
    revy
Hem
På hemsidan visas resultattabell med sökfält samt en knapp för att registrera lästa boken

Användare
Sidan där man kan skapa användare samt se en lista på alla registrerade användare som är länkar i sin tur till användarens sida. Klickar man på ett namn så kan man se alla dess person info, dvs upgifter, hur många böcker den personen har läst, sidor samt kommentarer. 
CRUD är implementerat på sidan, så man kan uppdatera personens upgifter samt ta bort personen. 

Böcker
Består av:
    sökfält för att söka speciel book
    formulär för attt skapa en ny bok
    en lista på alla böcker med dess titel och antal personer som har läst denna bo

Författare
    formulär för attt skapa en ny författare
    en lista på alla förafattare


OBS! CRUD finns bara på users sida. Har inte hunnit att implementera på andra ställen. 