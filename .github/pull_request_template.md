## [TICKET-ID] Titre du ticket

**Statut** : ✅ Résolu / ⏳ En cours / 🔶 Partiellement résolu

---

### Problème identifié

[Décrivez la cause racine du bug/problème en 2-4 phrases]

**Exemple** :
> La recherche ne fonctionne pas avec les accents car la collation de la table `articles` est configurée en `latin1_general_ci` au lieu de `utf8mb4_unicode_ci`. Les comparaisons de chaînes sont donc sensibles aux accents.

---

### Solution implémentée

[Décrivez votre correction avec détails techniques, incluez les fichiers modifiés et configurations changées]

**Exemple** :
> J'ai modifié la migration `create_articles_table.php` pour changer la collation de `latin1_general_ci` vers `utf8mb4_unicode_ci`. J'ai également mis à jour `config/database.php` pour forcer utf8mb4 par défaut.

**Code clé (optionnel)** :
```php
// Exemple de code corrigé si pertinent
```

---

### Tests effectués

[Comment avez-vous vérifié que ça fonctionne ?]

**Exemple** :
- [ ] Recherche "cafe" trouve l'article "Le café du matin"
- [ ] Recherche "café" trouve aussi l'article
- [ ] Recherche "CAFE" fonctionne (insensible à la casse)

---

### Réponses aux questions à considérer

[Répondez aux questions posées dans TICKETS.md pour ce ticket. Numérotez vos réponses.]

**Q1** : [Première question du ticket]
> [Votre réponse]

**Q2** : [Deuxième question du ticket]  
> [Votre réponse]

*(Ajoutez autant de questions/réponses que nécessaire selon le ticket)*

---

### Temps passé

Environ X heures

---

### Difficultés rencontrées (optionnel)

[Mentionnez les blocages éventuels et comment vous les avez résolus - laissez vide si aucune difficulté]

---

### Checklist

- [ ] Code fonctionne localement
- [ ] Tests manuels passés
- [ ] Commits avec messages clairs
- [ ] Documentation mise à jour si nécessaire

