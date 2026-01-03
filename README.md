# Sporthal De Stelplaats – Laravel Webapplicatie

Dit project is een **volledig uitgewerkte Laravel webapplicatie** voor het beheer van een sporthal / sportclub, geïnspireerd op **Sporthal De Stelplaats (Leuven)**.

De applicatie bevat een **publiek gedeelte** voor bezoekers en een **beveiligd admin-gedeelte** voor beheerders.  
De focus ligt op **correct gebruik van Laravel**, backend-logica, authenticatie, autorisatie en CRUD-functionaliteiten.

---

##  Doel van het project

- Een realistische Laravel-applicatie bouwen
- Werken met MVC, routes, controllers, models en views
- Authenticatie en autorisatie correct toepassen
- Admin- en user-rollen scheiden
- CRUD-functionaliteiten implementeren
- Relaties tussen databanktabellen gebruiken
- Een duidelijke en onderhoudbare structuur opzetten

---

## stappenplan dependencies


---
##  Rollen & rechten

###  Bezoeker (Niet ingelogd)
- Homepage bekijken
- Nieuws bekijken
- FAQ bekijken
- Contactformulier invullen
- Publieke profielen bekijken
- Registreren / inloggen

###  user (ingelogd)
- Inloggen / uitloggen
- Eigen profiel aanpassen
  - Naam
  - Username
  - Verjaardag
  - Profielfoto (avatar)
  - Over mij
- Publiek profiel bekijken
- Publieke pagina’s blijven gebruiken

###  Admin
- Rechten van een gebruiker
- Admin dashboard
- Nieuws beheren (aanmaken, bewerken, verwijderen)
- FAQ categorieën beheren
- FAQ items beheren
- Gebruikers beheren
  - Gebruikers aanmaken
  - Gebruikers verwijderen
  - Adminrechten toekennen / afnemen
- Teams beheren
- Contactberichten bekijken beantwoorden

---

##  Default admin account

Bij het uitvoeren van de seeders wordt automatisch een admin-account aangemaakt:

- **Email:** admin@ehb.be  
- **Wachtwoord:** Password!321  
- **Rol:** admin  

##  Default user account
Bij het uitvoeren van de seeders wordt automatisch een admin-account aangemaakt:
- **Email:** test@test.be  
- **Wachtwoord:** 12345678  
- **Rol:** User  
---

## Functionaliteiten

### Publiek
- Homepage met info over de sporthal
- Nieuws-overzicht
- Nieuws detailpagina
- FAQ-pagina (per categorie)
- Contactformulier
- Publieke gebruikersprofielen

### Auth & User
- Registratie
- Login / logout
- Wachtwoord reset
- Profiel bewerken
- Uploaden van profielfoto

### Admin
- Admin dashboard
- Nieuwsbeheer (CRUD)
- FAQ categorieën (CRUD)
- FAQ items (CRUD)
- Gebruikersbeheer
- Teamsbeheer
- Contactberichten beantwoorden (mail)

---

##  Database

- **Database:** SQLite
- **Relaties:**
  - FAQ categorie → FAQ items (one-to-many)
  - Teams ↔ Users (many-to-many)
- **Migrations & seeders** aanwezig

---

##  Technisch overzicht

- Laravel (laatste versie)
- MVC-architectuur
- Resource controllers
- Eloquent ORM
- Middleware (`auth`, `admin`)
- Blade templating
- CSRF-beveiliging
- Validatie (client + server)
- File uploads
- Pagination
- Mail (contact replies)
- Admin & public layouts

---

## Bronnen
- Cursus Backend Web EHB
- Tailwindcss
- Microsoft Copilot voor ondersteuning bij schrijven, coderen en documentatie 
- ChatGPT voor aanvullende hulp en inspiratie tijdens de ontwikkeling


---

##  Installatie-instructies

### 1. Repository clonen
```bash
git clone https://github.com/lbscv/laravel.eindproject.git
cd laravel.project

### 2. Dependencies installeren
```bash
composer install
npm install
### 3. .env aanpassen voor SQLite DB
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
### 4. SQLite DB aanmaken
```bash
touch database/database.sqlite
### 5. Applicatiesleutel genereren
```bash
php artisan key:generate
### 6. migrations & seeders uitvoeren voor DB
```bash
php artisan migrate:fresh --seed
### 7. frontend starten
```bash
npm run dev
### 8. laravel server starten
```bash
php artisan serve

