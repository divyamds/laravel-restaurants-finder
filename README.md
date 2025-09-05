# 🍽️ Laravel Restaurant Finder

A Laravel web app to search for top restaurants in any city using **OpenStreetMap (Nominatim + Overpass API)**.  
 

---

## 🚀 Features
- Search restaurants by city name  
- Shows **name, address, rating (alias), and map link**  
- Uses **OpenStreetMap** APIs (free & open)  
- Mobile-friendly UI with Bootstrap  
- Free hosting on Render  

---

## 🛠️ Tech Stack
- **Backend**: Laravel 10 (PHP 8+)  
- **Frontend**: Blade + Bootstrap 5  
- **API**: OpenStreetMap (Nominatim + Overpass)  


---

## 📦 Installation (Local)
1. Clone the repo:
   ```bash
   git clone https://github.com/your-username/laravel-restaurants-finder.git
   cd laravel-restaurants-finder
Install dependencies:

composer install
npm install && npm run dev


Create .env file:

cp .env.example .env
php artisan key:generate


Run Laravel server:

php artisan serve


Open in browser:

http://127.0.0.1:8000/restaurants
