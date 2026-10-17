# STREET REEL (partial design preview)

No database needed. Movie data is in `includes/data.php` and the cart lives in the PHP session.

## Run it
1. Copy this folder into `xampp/htdocs/` (e.g. `C:\xampp\htdocs\streetreel-partial`).
2. Start **Apache** in the XAMPP Control Panel. MySQL is not needed.
3. Open **http://localhost/streetreel-partial/index.html** (not by double-clicking the file).

## What's in this build
- `index.html` : homepage with hero, search, genre filters, sorting, poster wall
- `movie.php` : movie detail page with related films
- `cart.php` : working cart (session based)
- `login.php`, `register.php` : designed forms, not connected (nothing is saved)
- `api/` : JSON endpoints the homepage uses (`movies`, `cart`, `session`) + generated SVG posters
- `includes/config.php` : change the brand name, tagline, currency

## Not in this build
Real accounts, checkout, order history and the admin panel. Those are in the full version (`streetreel.zip`) which uses MySQL.

Needs internet for Tailwind and Google Fonts (CDN).
