continuiamo a lavorare sul codice dei giorni scorsi, ma in una nuova repo e aggiungiamo una nuova entità Type. Per realizzare la repo nuova a partire da quella vecchia avete due modi: repo template oppure copiate la cartella.
Repo template: rendete la repo laravel-auth momentaneamente una repo template, createne una nuova chiamata laravel-one-to-many a partire da questa, clonatela in locale e quindi rendete laravel-auth nuovamente una repo normale.
Copiare la cartella: copiate la cartella laravel-auth. Rinominatela in laravel-one-to-many. Entrate dentro questa nuova cartella e cancellate la cartella nascosta .git.
L'entità Type rappresenta la tipologia di progetto ed è in relazione one to many con i progetti.
I task da svolgere sono diversi, ma alcuni di essi sono un ripasso di ciò che abbiamo fatto nelle lezioni dei giorni scorsi:

-   creare la migration per la tabella types
-   creare il model Type
-   creare la migration di modifica per la tabella projects per aggiungere la chiave esterna
-   aggiungere ai model Type e Project i metodi per definire la relazione one to many
-   visualizzare nella pagina di dettaglio di un progetto la tipologia associata, se presente
-   permettere all’utente di associare una tipologia nella pagina di creazione e modifica di un progetto
-   gestire il salvataggio dell’associazione progetto-tipologia con opportune regole di validazione
