# AzubiTask-Pro 🚀

### Professionelles Aufgabenverwaltungssystem für Auszubildende

AzubiTask-Pro ist eine moderne RESTful API, entwickelt mit **Laravel 11**. Das System wurde konzipiert, um die Verwaltung von Aufgaben für Auszubildende durch Automatisierung und klare Strukturen zu optimieren.

#### 🛠️ Technischer Stack
* [cite_start]**Backend:** Laravel 11 (PHP 8.x)[cite: 54].
* [cite_start]**Datenbank:** MySQL[cite: 54].
* **Authentifizierung:** Laravel Sanctum (Token-basiert).
* [cite_start]**Architektur:** REST API mit API-Resources[cite: 54, 57].

#### ✨ Hauptmerkmale (Features)
* **Sicheres Auth-System:** Implementierung von Registrierung und Login mit Bearer-Token-Validierung via Sanctum.
* [cite_start]**Effizientes Task-Management:** Vollständiges CRUD-System für Aufgaben[cite: 56].
* [cite_start]**Automatisierte Logik:** Intelligente Berechnung der Dringlichkeit (`is_urgent`) basierend auf Deadlines[cite: 58].
* [cite_start]**Strukturierte Daten:** Bereitstellung von JSON-Daten für eine nahtlose React-Integration[cite: 57].

#### 🚀 Schnelle Einrichtung
1. [cite_start]Repository klonen: `git clone https://github.com/samir4323/AzubiTask-Pro.git`[cite: 60].
2. `composer install` ausführen.
3. `.env`-Datei konfigurieren und `php artisan migrate` ausführen.