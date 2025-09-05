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
 ❌ Why Not Google Maps API?
We intentionally **did not use Google Maps API** because:  
- Google Maps API requires a **valid billing account**, even for limited free usage.  
- Free quota is very restrictive, and costs increase quickly.  
- This project is meant to be **100% free and open-source**.  

---
Instead, we use **OpenStreetMap (OSM)**:  
- ✅ Completely free & open-source  
- ✅ No billing or credit card required  
- ✅ Provides geocoding (Nominatim) and restaurant search (Overpass API)  
- ✅ Lightweight and easy to integrate with Laravel  
----
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
