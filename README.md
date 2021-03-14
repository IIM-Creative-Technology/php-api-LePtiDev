
## Présentation

Cette api a été créée dans le cadre d'un cours sur la création de d'une api sur laravel. cela est donc un projet étudiant et aucunement un projet professionnel.

## Installation

Pour installer le projet vous devez d'abord dans un premier temps le `cloner sur votre machine.

Une fois cette étape faite vous devez lancer cette commande :

```
composer install
```

Lors de l'installation composer va installer toutes les dépendances. Vous allez devoir par la suite configurer votre environment.

Vous allez devoir aller dans la fichier `.env` du projet et configurer votre base de donnée
Il faudra donc par la suite lancer les seeds qui vous permettrons d'obtenir de la data.
```
php artisan db:seed
```

Attention à bien créé la base de donnée avant.

Une fois le projet installer n'oublier de générer la clé JWT dans le ````.env```` grace a la commande :
```
php artisan jwt:secret
```

Une fois toute ces étapes faite vous pouvez commencer utilisé l'api
## Insomnia

Si vous possédez insomnia vous trouverez a la racine du projet un dossier ````Request Schema````
avec à l'intérieur un json qui vous permet d'importer toutes les requêtes au seins d'insomnia.


## Identification

L'api utilise un système d'identification par JWT. Seul les personnes suivante peuvent se connecter.

| Nom               | Email                                 |  Mot de passe    |
| ------------------|:--------------------------------------|:----------------:|
| Karine Mousdik    | karine.mousdik@devinci.fr             | karine1234       |
| Nicolas Rauber    | nicolas.rauber@devinci.fr             | nicolas1234      |
| Alexis Bougy      | alexis.bougy@devinci.fr               | alexy1234        |

Pour vous connecter vous devez avant tout obtenir un token jwt afin de faire des requêtes.
Pour cela vous devez vous rendre sur cette adresse : 

```
http://127.0.0.1:8000/api/auth/login
```
Vous passez dans le body de la requête votre email et votre mot de passe afin d'obtenir votre token.

Une fois votre token obtenu vous pouvez faire une requête en vous authentifiant a chaque fois. Pour cela vous devez utiliser un bearer token et y glisser le token obtenu grace a la requête de login.

__Si vous n'utilisez pas votre token la requête ne fonctionnera pas.__

## Documentation

Pour chaque type de recherche vous trouverez la documentation si dessous. Attention à bien veiller a respecté les code demander sinon l'api vous enverra une erreur.

Voici une liste d'erreur que vous pourrez trouvez: 

- `404` ( L'élément demandé n'a pas été trouvé )
- `200` ( Tout ce passe bien )
- `303` ( L'élément existe déjà en base de donnée)
- `422` ( La requette faite n'est pas bien constitué)

Chaque requête renvoie obligatoirement quelque chose. Elle renvoie le code d'erreur mais aussi le message avec. Vou pourrez donc l'afficher coté client.

Les requêtes doivent être composée exactement comme ci-dessous.

### Classes


| Methods     | Action                                 |  Adresse                                           | Params          |
| ----------- |:---------------------------------------|:--------------------------------------------------:| ---------------:|
| `GET`       | Liste de toute les classes             | http://127.0.0.1:8000/api/classrooms               |                 |
| `GET`       | Afficher juste une classe              | http://127.0.0.1:8000/api/classrooms/{id}          | Id de la classe |
| `GET`       | Liste de toute les etudiant d'un classe| http://127.0.0.1:8000/api/classrooms/students/{id} | Id de la classe |
| `POST`      | Ajouter une classe                     | http://127.0.0.1:8000/api/classrooms               | Body query      |
| `PUT`       | Modifier une classe                    | http://127.0.0.1:8000/api/classrooms               | Body query      |


#### exemple: Body query POST

| Key              | Value                                  |
| ---------------- |:---------------------------------------|
| name             | Classroom 34                           |
| promotion_date   | 2015                                   |


#### exemple: Body query PUT

| Key              | Value                                  |
| ---------------- |:---------------------------------------|
| id               | 1                                      |
| name             | Classroom 34                           |
| promotion_date   | 2015                                   |



---

### Cours


| Methods     | Action                                 |  Adresse                                           | Params          |
| ----------- |:---------------------------------------|:--------------------------------------------------:| ---------------:|
| `GET`       | Liste tout les cours                   | http://127.0.0.1:8000/api/courses                  |                 |
| `GET`       | Afficher juste un cours                | http://127.0.0.1:8000/api/courses/{id}             | Id du cours     |
| `POST`      | Ajouter un cours                       | http://127.0.0.1:8000/api/courses                  | Body query      |
| `PUT`       | Modifier un cours                      | http://127.0.0.1:8000/api/courses                  | Body query      |

#### exemple: Body query POST

| Key              | Value                                  |
| ---------------- |:---------------------------------------|
| name             | Classroom 34                           |
| start            | 0139-11-13 20:30:42                    |
| end              | 0139-12-13 20:30:42                    |
| classroom_id     | 1                                      |
| speaker_id       | 7                                      |


#### exemple: Body query PUT

| Key              | Value                                  |
| ---------------- |:---------------------------------------|
| id               | 7                                      |
| name             | Classroom 34                           |
| start            | 0139-11-13 20:30:42                    |
| end              | 0139-12-13 20:30:42                    |
| classroom_id     | 1                                      |
| speaker_id       | 7                                      |


Attention le formait de la date doit être exactement comme si dessous :
````Y-m-d H:i:s````. La date ne dois pas dépasser les 5 jours maximum soit 1 semaine de cours. 


---

### Intervenant

| Methods     | Action                                 |  Adresse                                           | Params              |
| ----------- |:---------------------------------------|:--------------------------------------------------:| -------------------:|
| `GET`       | Liste de tous les intervenants         | http://127.0.0.1:8000/api/speakers                 |                     |
| `GET`       | Afficher juste un intervenants         | http://127.0.0.1:8000/api/speakers/{id}            | Id de l'intervenant |
| `POST`      | Ajouter un intervenant                 | http://127.0.0.1:8000/api/speakers                 | Body query          |
| `PUT`       | Modifier un intervenant                | http://127.0.0.1:8000/api/speakers                 | Body query          |


#### exemple: Body query POST

| Key              | Value                                  |
| ---------------- |:---------------------------------------|
| first_name       | Pierre                                 |
| last_name        | Grimaud                                |
| year             | 2017                                   |


#### exemple: Body query PUT

| Key              | Value                                  |
| ---------------- |:---------------------------------------|
| id               | 2                                      |
| first_name       | Pierre                                 |
| last_name        | Grimaud                                |
| year             | 2016                                   |


---

### Notes

| Methods     | Action                                 |  Adresse                                           | Params              |
| ----------- |:---------------------------------------|:--------------------------------------------------:| -------------------:|
| `GET`       | Liste toute les notes d'un étudiant    | http://127.0.0.1:8000/api/marks/students/{id}      | Id de l'étudiant    |
| `POST`      | Ajoute une note                        | http://127.0.0.1:8000/api/marks                    | Body query          |

#### exemple: Body query POST

| Key              | Value                                  |
| ---------------- |:---------------------------------------|
| course_id        | 10                                     |
| student_id       | 2                                      |
| mark             | 17                                     |

---

### Étudiant

| Methods     | Action                                 |  Adresse                                           | Params              |
| ----------- |:---------------------------------------|:--------------------------------------------------:| -------------------:|
| `GET`       | Liste de tous les élèves               | http://127.0.0.1:8000/api/students                 |                     |
| `GET`       | Afficher juste un élève                | http://127.0.0.1:8000/api/students/{id}            | Id de l'élève       |
| `GET`       | Afficher les notes de l'élève          | http://127.0.0.1:8000/api/students/marks/{id}      | Id de l'élève       |
| `POST`      | Ajouter un élève                       | http://127.0.0.1:8000/api/students                 | Body query          |
| `PUT`       | Modifier un élève                      | http://127.0.0.1:8000/api/students                 | Body query          |
| `DELETE`    | Supprimer un élève                     | http://127.0.0.1:8000/api/students/{id}            | Id de l'élève       |

#### exemple: Body query POST

| Key              | Value                                  |
| ---------------- |:---------------------------------------|
| first_name       | Quentin                                |
| last_name        | Guerrier                               |
| age              | 22                                     |
| year             | 2018                                   |
| classroom_id     | 2                                      |


#### exemple: Body query PUT

| Key              | Value                                  |
| ---------------- |:---------------------------------------|
| id               | 2                                      |
| first_name       | Quentin                                |
| last_name        | Guerrier                               |
| age              | 22                                     |
| year             | 2018                                   |
| classroom_id     | 2                                      |
