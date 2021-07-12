# api_project
Simple REST Api in PHP

Obsługa api.
Wszystkie operacje przeprowadzamy z adresu:
ApiController.php i dalej metodą get wybieramy operacje dopisując: ?do=
Np. ApiController.php?do=list - listuje wszystkie wpisy
Wszystkie funkcje API, działania na wpisach
GET
?do=list - listuje wszystkie wpisy (entries)
?do=list&category_id={ID} - listuje wszystkie wpisy w danej kategorii z tabeli categories np. ApiController.php?do=list&category_id=2
?do=list&id={ID} - wypisuje wpis (entries) po konkretnym id
?do=list&url={url lub domena} - wypisuje wpis po domenie lub url
?do=delete&id={id} - kasuje wpis po id 
POST
ApiController.php?do=create i dalej metodą POST 
key               value
company_name      nazwa firmy 
category_id       id kategorii z tabeli categories
url               adres url strony firmy 
adress            adres fizyczny firmy 
description       krótki opis firmy 

ApiController.php?do=update&id={id} i dalej metodą POST 
"key"               "value"
company_name      edycja nazwa firmy 
category_id       edycja id kategorii z tabeli categories
url               edycja adres url strony firmy 
adress            edycja adres fizyczny firmy 
description       edycja krótki opis firmy 

Działania na kategoriach
GET
?do=listCat - listuje wszystkie kategorie (categories)
?do=listCat&id={id} - wypisuje kategorie (categories) po konkretnym id
?do=deleteCat&id={id} - kasuje kategorie po id 
POST
ApiController.php?do=createCat i dalej metodą POST 
key               value
category_name     nazwa kategorii 
view_order        kolejność wyświetlania

ApiController.php?do=updateCat&id={id} i dalej metodą POST 
key               value
category_name     edycja nazwa kategorii 
