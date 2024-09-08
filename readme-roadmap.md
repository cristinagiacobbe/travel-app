
nome repo: travel-app

## Crea il diario di viaggio delle tue vacanze estive

# Scelta dei linguaggi di programmazione e dei framework
- Poichè ho bisogno di inserire, manipolare, conservare dati, svilupperò l'applicazione in back-end.
- Utilizzerò PHP come linguaggio di programmazione e LARAVEL come framework.
- Per la visualizzazione delle mappe all'interno della mia app ho scelto LEAFLET.
- Poichè questo servizio è facilmente riproducibile utilizzando un file Javascript (non so se lo sia anche con PHP, mi riserverò di approfondire), 
per questa parte utilizzerò il linguaggio front-end JAVASCRIPT (problema: riuscirò a garantire la persistenza dei dati?)
- Per la condivisione della app prevedo di utilizzare NETLIFY (vedi diretta di Filippo app traduttore)

# Struttura della mia applicazione
- L'applicazione si compone di due parti, una accessibile agli utenti, una accessibile solo all'amministratore.
- La parte accessibile agli utenti prevede una welcome page, dove sono visibili in forma sintetica tutti i viaggi inseriti, e una pagina per ciascuno dei viaggi inseriti.
- All'interno di questa pagina, sarà visualizzabile il titolo del viaggio, la data e la mappa, con indicazione di tutte le tappe.
- Cliccando su ciascuna delle tappe, attraverso una modale, si potranno visualizzare i dettagli della tappa (collocazione, km percorsi, valutazione, annotazioni, ecc...)
- La parte riservata all'amministratore prevede invece, per ogni singolo viaggio, una "index view" dove in forma tabellare sono visibili tutte le tappe inserite, una "create view" dove poter aggiungere una tappa, una "edit view" per poter fare delle modifiche. Prevedo anche la possibilità di cancellare le singole tappe.
- Prevedo anche di inserire un collegamento dalla index view alla visione di dettaglio della tappa.

# Modello e campi
- Prevedo di usare come model la classe Travel a cui assegnerò i seguenti campi:
    - Titolo;
    - Descrizione;
    - Data;
    - Immagine;
    - Persone (che ho incontrato/conosciuto in questa tappa)
    - Annotazioni;
    - Valutazione: prevedo di inserirla numericamente e di visualizzarla tramite icone (stelle da 1 a 5 vupte/piene a seconda del valore)
    - Fatta/non fatta (per tenere conto della progressione del viaggio; potrebbe essere un campo "check-box")
    - FORSE: latitudine e longitudine (non da visualizzare, ma da usare per la localizzazione nelle mappe)

# Funzionalità per tenere traccia della progressione delle tappe del tuo viaggio (anche quando chiudi la pagina).
- Un'ipotesi è sfruttare l'opacità delle immagini (opaca per le tappe non ancora percorse e nitida per le tappe concluse)
Il campo "completed" mi aiuterà a distinguere le tappe concluse da quelle ancora da percorrere.

# Parti da sistemare/risolvere
- Quando cancello una tappa, come faccio a far ripartire l'id da 1?
- Aprire la modale dal marker sulla mappa: sono riuscita. Devo ancora inserire dinamicamente i valori della singola tappa in ciascuna modale: NON RIESCO A RICHIAMARE NELLA MODALE DINAMICAMENTE I VALORI DEL DATABASE
- Gestire l'opacità sulla mappa e/o sulla modale per distinguere le tappe fatte da quelle da fare (non sono riuscita)
- sostituire il valore 0/1 nel campo "complted" con si/no (non sono riuscita)
