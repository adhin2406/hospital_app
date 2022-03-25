$cd mpns
$composer install
$cp .env.example .env

# Setup Database Conf (.env)

$php artisan key:generate
import database yang ada di folder database

$php artisan serve

# Open http://127.0.0.1:8000

# Login (Default)

# email: admin@hospital.app

# password: password
# hospital_app
