🎓 Plateforme de Gestion Intelligente (UN-DAB)

📌 Description

La Plateforme de Gestion Intelligente est une application web développée en PHP permettant de gérer les activités académiques d’un établissement.

Elle intègre plusieurs modules comme :

- gestion des étudiants
- gestion des notes
- génération de bulletins PDF
- suivi académique
- modules étudiants (rendez-vous, services, etc.)

---

🚀 Fonctionnalités principales

🔐 Authentification

- Connexion avec session ("login.php")
- Protection des pages sensibles ("session_start()")

---

👨‍🎓 Gestion des étudiants

- Liste des étudiants
- Recherche dynamique
- Modification / suppression

---

📊 Gestion des notes

- Ajout de notes
- Liaison avec les étudiants
- Calcul automatique des moyennes

---

📄 Génération de bulletin PDF

👉 Fonction clé du projet

- Génération dynamique avec TCPDF
- Calcul automatique :
  - moyenne
  - mention
  - appréciation

Exemple :

Moyenne >= 16 → Très Bien
Moyenne >= 14 → Bien

✔️ Génération directe : "bulletin.php"
✔️ Téléchargement PDF : "bulletin_download.php"

---

📥 Export PDF

- Génération de fichiers PDF ("test_pdf.php")
- Sauvegarde sur serveur
- Téléchargement automatique

---

📌 Test de connexion base de données

Fichier :

test_db.php

✔️ Vérifie la connexion MySQL

---

📅 Module rendez-vous

Fichier :

rendez_vous.php

✔️ Interface Bootstrap
✔️ Affichage des rendez-vous étudiants

---

🧪 Fichiers de test

- "test_pdf.php"
- "test_db.php"
- "test_absence.php"

👉 Utilisés pour debug et développement

---

🛠️ Technologies utilisées

- PHP 7+
- Vs Code
- MySQL / MariaDB
- Bootstrap 5
- TCPDF (PDF)
- JavaScript

---

📂 Structure du projet

config/              → connexion base de données
vendor/              → librairie TCPDF
images/              → ressources visuelles

bulletin.php         → génération PDF
bulletin_download.php→ téléchargement PDF
test_pdf.php         → test PDF
test_db.php          → test connexion DB

dashboard.php        → tableau de bord
login.php            → authentification
rendez_vous.php      → module rendez-vous

---

⚙️ Installation

1. Cloner le projet

git clone https://github.com/DeybouAmadouBa/Plate-forme-de-Gestion-Intelligente.git

---

2. Copier dans serveur //100.115.92.202/... 

---

3. Configurer la base de données

Modifier :

config/database.php

---

4. Tester la connexion

php test_db.php

✔️ Résultat attendu :

Connexion OK

---

5. Lancer le projet

http://100.115.92.202/Plate-forme-de-gestion-intelligente/

---

⚠️ Problèmes connus

- Encodage des caractères (accents mal affichés)
- Noms de fichiers non normalisés
- Sécurité SQL à améliorer sur certaines pages

---

💡 Améliorations futures

- 🔐 Gestion des rôles (Admin / Prof / Étudiant)
- 📱 Version mobile optimisée
- 📊 Dashboard avancé
- 📧 Notifications email
- ☁️ Hébergement en ligne

---

👨‍💻 Auteur

Deybou Amadou Ba

Projet académique – Université Numérique UN-DAB

---

📜 Licence

Projet Fin D'études Licence 3 IDA 
