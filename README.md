# republican-calendar

En me promenant sur Wikipédia, je suis tombée sur la liste des noms des jours dans le calendrier républicain (ou révolutionnaire). Et j'ai adoré. Parce qu'on connaît surtout les mois (Vendémiaire pour l'histoire, Germinal pour la littérature, Nivôse parce que c'est cool)... et on oublie que chaque jour avait un nom ! Cheval, Fléau, Carotte, Lupin... des noms qui raccrochaient à la réalité, à l'agriculture, à la vie de tous les jours, bien plus proche que celle des saints - c'était l'argument.

J'ai voulu faire une simple petite page qui présente le nom du jour courant, avec le mois et la saison. Pour les curieux⋅ses, vous trouverez vite comment ne pas être limité⋅e à aujourd'hui ;)

## Technique

PHP, avec l'API de Wikipédia (http://en.wikipedia.org/w/api.php), HTML/Sass : rien que du très classique. Il faut que PHP ait les droits suffisants pour créer des fichiers, car l'image n'est pas un hotlink de WP, c'est une copie locale dans le dossier `media`.

L'API de Wikipédia, quoiqu'un peu rude d'accès, est très facile à utiliser, et c'était un plaisir que de fouiner pour découvrir *la* requête qui me donnerait l'URL de l'image principale de l'article.

Il me reste à déterminer comment surpasser deux problèmes que j'ai rencontrés :
* le cas d'une page d'homonymie
* le cas où une page a plusieurs images principales, comment choisir la meilleure : exemple du Salpêtre https://fr.wikipedia.org/wiki/Nitrate_de_potassium, il aurait été tellement mieux d'avoir la photo du produit plutôt qu'un schéma de sa structure atomique (c'est cool aussi, mais pas pareil)

## Démo

Vous pouvez voir une démo ici : http://informatique.lamecarlate.net/web/experiences/republican-calendar/
