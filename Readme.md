### Gesparc
Gestion de parc automobile privé
## Supports
# Framework
Symfony 6.2.7
# Langages
PHP 8.2 HTML 5 CSS 3 SASS Javascript
# Gestion de versions
git init 
git add README.md 
git commit -m "first commit" 
git branch -M main 
git remote add origin https://github.com/jybast/gesparc.git 
git push -u origin main

## Configuration
*    Créer et Configurer le fichier .env.local:
*    Supprimer le répertoire /assets
*    Créer la base de données : symfony console doctrine:database:create
*    Créer les dossiers /assets (css, img, js, scss) dans /public
*    Créer dossiers /uploads (images, documents) et /docs dans /public
*    Intégrer Bootstrap 5 dans twig.yaml : 
*        form_themes: ['bootstrap_5_layout.html.twig']
*        paths:# Chemin pour les images du site dans les url : '%kernel.project_dir%/public/assets/img': images
*    Configurer les chemins d'accès à /uploads/images et /uploads/documents dans services.yaml
*    Intégrer fichiers bootstrap css et js
*    intégrer fontAwesome : <script src="https://kit.fontawesome.com/88d4e45bc1.js" crossorigin="anonymous"></script>    
*    supprimer les références webpack dans base.html.twig
*    composer remove webpack
*    Commenter  #Symfony\Component\Mailer\Messenger\SendEmailMessage: async dans messenger.yaml, pour utilisation de Mailhog
*    configurer base.html.twig

## Système d'authentification et enregistrement
*    Créer l'entité User
*    Créer un MainController de pages statiques (accueil, contact, infos)
*    symfony console make:auth
*    Adapter le template/security.login.html.twig 
*    symfony console make:registration-form
*    composer require symfonycasts/verify-email-bundle
*    composer require symfonycasts/reset-password-bundle
*    symfony console make:reset-password

## Cas d'utilisation
# Cas d'utilisation utilisateur
    Cas d'utilisation "Visiter la page d'accueil"
*    - Front-end : la page d'accueil, la page contact, la page Infos, RGPD
    - Back-end : Envoi de mails
*    Cas d'utilisation "s'enregistrer"
*    Cas d'utilisation "se connecter"
*    Cas d'utilisation "Consulter / Modifier le profil / ajout image"
*    Cas d'utilisation "Modifier le mot de passe"
*    Cas d'utilisation " Données personnelles PDF" : composer require dompdf/dompdf

# Interface d'administration
* Installer easyAdmin : composer require easycorp/easyadmin-bundle
* Configurer easyAdmin

## TO DO
# cas d'utilisation conducteur
* Enregistrer un trajet
# cas d'utilisation manager
Cas d'utilisation "Gerer le parc"
# cas d'utilisation administrateur



## Entity et base de données
    Créer les entités de la base de données
    
    Préparer mise en place traduction multilingue
    -> symfony console translation:extract --force --prefix="gf_" fr

    Préparer backend Administrateur : composer require easycorp/easyadmin-bundle
    
    
    page contact
        formulaire contact
        envoi de mail
        carte openStreetMap intégrer CKEditor 5
