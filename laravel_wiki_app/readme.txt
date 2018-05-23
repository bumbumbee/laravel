

1. Sukurti mini Wikipedijos aplikacija
	

Funkcionalumas:
	1. Autentifikacija ir autorizacija
	2. Irasu kurimas
	3. Irasu atvaizdavimas ir puslapiavimas
	3. Kategoriju kurimas (jas gales kurti tik admin vartotojas), irasu priskirimas kategorijoms.
	4. Irasu filtravimas pagal kategorijas
	5. Paieska


	Optional

	Statistikos isvedimas (admin puslapyje)
	Komentavimo modulis
	
Install instructions:
1. Clone git repository - git clone https://github.com/kazakevic/laravel_wiki_app.git
2. Rename .env.sample to .env and edit DB config 
3. Run "composer install" (form main project dir) from command line
4. Run "php artisan migrate"