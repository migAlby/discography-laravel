#### entità e dati:



###### tabella:


wanted\_list (

&#x20;ID int NOT NULL,

&#x20;ArtistName varchar(255),

&#x20;AlbumName varchar(255),

&#x20;Year int,

&#x20;AlbumCover varchar(255),

&#x20;PRIMARY KEY (ID)

)

Uswers(id,firstname,lastname,email,password)







#### funzionalità / Azioni utente:



\- select --> lettura

\- insert into --> creazione

\- delete/update --> rimozione/modifica elemento

\- funzioni di servizio($\_SESSION,logiche di gestione file, chiamata servizi esterni come API)




funzioni:
---

###### 

* redirect(funz. di servizio/sparirà)
* sanitize(funz. di servizio/sparirà)
* get\_entry(lettura)
* add\_entry(creazione)
* delete\_entry(rimozione)
* log\_in(funz. di servizio/hashing/autenticazione)
* check\_session( funzione di servizio/gestione timeout sessione/ sparirà)
* check\_login(funzione di servizio/sparirà)
* logout(funzione di servizio/sparirà)

* add\_wanted(creazione)
* get\_from\_api(funzione di servizio)
* test\_api(funzione di servizio)















## punti di integrazione o logiche particolari:

