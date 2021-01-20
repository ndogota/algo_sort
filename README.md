# algo_sort

* Tri par insertion (insertion_sort)
* Tri par sélection (selection_sort)
* Tri à bulle (bubble_sort)
* Tri shell (shell_sort)
* Tri fusion (merge_sort)
* Tri rapide (quick_sort)
* Tri peigne (comb_sort)


## Fonctionnement des algorithmes

### Tri par insertion (insertion_sort)

Le principe du tri par insertion est décomposé le tri en deux parties avec une partie déjà triée et une partie non triée. Il est utilisé pour des listes ou des tableaux.
La comparaison pourrait ce faire avec la façon que nous avons de ranger des cartes intuitivement.

Nous décalons dans la partie triée les valeurs triées, et par décalages successifs d'une unité nous trions l'intégralité du tableau.

### Tri par sélection (selection_sort)

Le principe du tri par insertion est de rechercher le plus grand afin de la placer à la fin du tableau et de recommencer avec le second plus grand du tableau,
le placer en avant avant-dernière position, et par itération sous forme quadratique jusqu'à parcourir la totalité du tableau.

Il suffit de doubler la taille du tableau, pour multiplier par 4 le temps d'execution.

### Tri à bulle (bubble_sort)

Le principe du tri par insertion est de rechercher le plus grand afin de la placer à la fin du tableau et de recommencer avec le second plus grand du tableau,
le placer en avant-avant-dernière position, et par itération sous forme quadratique jusqu'à parcourir la totalité du tableau.

Il suffit de doubler la taille du tableau, pour multiplier par 4 le temps d'exécution.

### Tri fusion (merge_sort)

Le principe du tri à fusion est de diviser pour mieux régner. Il est utilisé pour des listes ou des tableaux.
L'objectif est de trouver le milieu du tableau et d'avoir une fonction appelée de façon récursive pour rediviser et trier les petites parties.

L'algorithme se termine en fusionnant les différentes parties du tableau pour avoir le tableau trié.

### Tri rapide (quick_sort)

Le tri rapide est un tri par comparaison qui se base sur un principe de pivot. Il est utilisé pour des listes ou des tableaux.

Le pivot étant une valeur de référence qu'on choisit pour le comparer au reste de la donnée.
L'algorithme va donc permuter les différents éléments du tableau afin de comparer si chacun d'eux est inférieur ou supérieur au pivot.
Le choix du pivot a une importance sur les performances de l'algorithme de tri.

Il existe trois raisonnements pour choisir le pivot :
- Arbitraire, consiste à prendre la première ou dernière valeur du sous tableau.
- Aléatoire, consiste à choisir aléatoirement un élément du sous tableau.
- Optimal, consiste à prendre la valeur médiane du sous tableau.

Dans notre cas nous avons choisi le pivot arbitraire, étant donné la simplicité de la donnée à trier.

### Tri par sélection (selection_sort)

Le tri par sélection est un tri par comparaison simple. Il est utilisé pour des listes ou des tableaux.

L'algorithme de tri par comparaison repose sur le principe suivant, on considère que la donnée est divisée en deux.
Une partie triée (au départ c'est une partie qui est vide) et une partie non triée (au départ c'est toute la donné à analyser qui est dans cette partie).
L'algorithme va donc à chaque fois rechercher (dans la partie non triée) la plus petite valeur pour la mettre à la fin de la partie triée.
Concrètement ici l'algorithme va échanger cette valeur avec la première valeur de la partie non triée, et à l'itération suivante les deux parties étant réajustées, cette valeur sera donc la dernière valeur de la partie triée, et par conséquent la partie non triée sera réduite d'un.
Cette opération va être répétée pour chaque élément du tableau jusqu'à ce que la partie qu'on considère non triée soit vide.

### Tri de shell (shell_sort)

Le tri de shell est une amélioration du tri par insertion. Il est utilisé pour des listes ou des tableaux.

Pour rappel dans le tri par insertion, on déplace les données en les déplaçant de 1 (rendant son processus lent cela représente une faiblesse pour l'algorithme par insertion).
L'amélioration consiste donc à palier à ce déplacement de 1, en le déplaçant de N, N étant un grand nombre au début du tri il diminue progressivement jusqu'à arriver à la valeur de 1 à la fin.
Ce qui permet de conserver la force de l'algorithme par insertion qui est que si la liste est déjà à peu près trier c'est un algorithme très efficace.
Et donc plus on avance dans le processus, plus on a une donnée triée, et donc plus la valeur de N diminue pour maximiser l'efficacité du triage.

Il existe plusieurs moyens de diminuer N progressivement. Dans notre algorithme nous avons fait le choix de diviser la valeur de N par 2.2 à chaque fois, car il a été prouvé que cela améliore les performances.


## Benchmark

#### Nous allons analyser les différents algorithmes de tri en s'appuyant sur les données extraites lors des tests :

Pour nos tests nous avons testé les performances de chaque algorithme avec des éléments triés aléatoirement :

### Comparaison

| Nb éléments | 100 | 1 000 | 10 000 | 100 000 |
|---|---|---|---|---|
| insertion_sort | 99 | 243 665 | 24 749 458 | 99 999 |
| selection_sort | 4 950 | 499 500 | 49 995 000 | 4 999 950 000 |
| bubble_sort | 4 599 | 498 510 | 49 994 724 | 4 999 907 805 |
| shell_sort | 509 | 8 084 | 110 833 | 1 408 336 |
| merge_sort | 548 | 8 692 | 120 466 | 1 536 195 |
| quick_sort | 727  | 10 437 | 161 594 | 2 027 505 |
| comb_sort | 1 478 | 23 680 | 346 686 | 4 066 692 |

### Itération

| Nb éléments | 100 | 1 000 | 10 000 | 100 000 |
|---|---|---|---|---|
| insertion_sort | 2 512 | 243 665 | 24 749 458 | 2 508 257 116 |
| selection_sort | 5 050 | 500 500 | 50 005 000 | 5 000 050 000 |
| bubble_sort | 4 672 | 49 9465 | 50 004 700 | 5 000 007 514 |
| shell_sort | 843 | 14 656 | 207 829 | 2 745 621 |
| merge_sort | 0 | 0 | 0 | 0 |
| quick_sort | 0 | 0 | 0 | 0 |
| comb_sort | 1 496 | 23 707 | 346 724 | 4 066 736 |

### Temps (sec)

| Nb éléments | 100 | 1 000 | 10 000 | 100 000 |
|---|---|---|---|---|
| insertion_sort |  0.00 | 0.03 | 2.80 | 266.15 |
| selection_sort |  0.00 | 0.05 | 4.92 | 565.76 |
| bubble_sort | 0.00 | 0.06 | 5.90 | 551.89 |
| shell_sort | 0.00 | 0.00 | 0.04 | 0.52 |
| merge_sort | 0.00 | 0.00 | 0.03 | 0.26 |
| quick_sort | 0.00  | 0.00 | 0.03 | 0.35 |
| comb_sort | 0.00 | 0.04 | 6.24 | 1777.59 |

On constate que le tri à fusion (merge sort) et le tri rapide (quick sort) sont particulièrement efficaces sur des données importantes,
suivi de près par le tri de shell (shell sort).
Au niveau de la comparaison c'est le même constat, on retrouve le tri rapide, le tri à fusion et le tri de shell, qui se démarquent tous par le moins de comparaisons et qui sont très loin devant.
En effet les plus mauvais algorithmes ont un nombre de comparaisons environ 370 fois supérieur aux tris précédemment énoncé.
On constate donc que plus les nombres de comparaisons et d'itérations sont faible, plus le temps d'exécution est court.
Et que le tri rapide et le tri à fusion sont particulièrement bien conçu pour trier de grandes données.
