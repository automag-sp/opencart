<?php


define("lang_iso_code","it");
define("smscurrency","EUR");


define("lang_alphabet","A;À;B;C;D;E;È;F;G;H;I;Ì;L;M;N;O;Ò;P;Q;R;S;T;U;Ù;V;Z");




//new
define("v_all_years","Tutti gli anni");
define("v_menu_setting", "Impostazioni");



// About.php
define("v_about_about","Riguardo il modulo");
define("v_about_version","Presta SMS modulo, versione");
define("v_about_copyright","Copyright © TOPefekt s.r.o., Tutti i diritti riservati");
define("v_about_developer","Developer:");
define("v_about_topefekt","TOPefekt s.r.o.");
define("v_about_address","Indirizzo:");
define("v_about_street","B. Nemcove 767/13");
define("v_about_city","78701 Sumperk");
define("v_about_state","Repubblica Ceca");
define("v_about_vat","partita IVA: CZ29444268");
define("v_about_phone","Telefono Ufficio:");
define("v_about_phonenr","+420 581 110 998");
define("v_about_mail","E-mail:");
define("v_about_mailsales","sales@topefekt.com");
define("v_about_mailsupport","support@topefekt.com");
define("v_about_web","Web:");
define("v_about_website_name","www.presta-sms.com");
define("v_about_website_url","www.presta-sms.com/it/index.html");



// AdminSms.php
define("v_adminsms_adminsms","Admin SMS");
define("v_adminsms_description","Selezionare gli eventi durante i quali devono essere gli amministratori del negozio notificati via SMS e personalizzare il testo dei messaggi.");
define("v_adminsms_unicodesms","Unicode SMS");
define("v_adminsms_unicode","unicode");
define("v_adminsms_unicodetext","Selezionare solo se si desidera utilizzare cinese, arabo, greco, ebraico, coreano, cirillico, ecc o segni diacritici nel testo del messaggio SMS (testo Unicode consente di inserire caratteri in tutti i font e vari altri simboli contemporaneamente. Numero di caratteri in uno SMS sarà ridotto a 70).");
define("v_adminsms_unicodesave","Salva");
define("v_adminsms_smsactive","Invio di notifiche via SMS è ATTIVA");
define("v_adminsms_smsnotactive","Invio di notifiche via SMS non è attivo. Per attivare l`invio di SMS segnare almeno un amministratore.");
define("v_adminsms_statusupdate","Aggiornare stato dell`ordine");
define("v_adminsms_account","Conto");
define("v_adminsms_product","Prodotto");
define("v_adminsms_orderstatus","Stato di ordine");
define("v_adminsms_order","Ordine");
define("v_adminsms_adminsmsnotactive","Admin SMS - non attivo");
define("v_adminsms_addadmin","Si prega di aggiungere almeno un amministratore!");
define("v_adminsms_usernotactive","Profilo utente non è attivo! Per registrarti clicca sulla scheda SMS nel menu principale. Modulo ti visualizzata la schermata per l`inserimento dei dati di registrazione. Se hai gia utilizzato il nostro modulo in passato e ricordi il tuo nome utente e password, compila il modulo per il conto esistente. In caso contrario, inserisci la tua e-mail, accetti le condizioni di licenza e clica per registrarti.");
define("v_adminsms_invalidtext","SMS testo non valido");
define("v_adminsms_smssaved","Testo di SMS è stato salvato.");
define("v_adminsms_unicodesaved","Unicode salvato");
define("v_adminsms_jschar","char");
define("v_adminsms_jschars","chars");
define("v_adminsms_jslabel","etichetta");
define("v_adminsms_jssmstext","testo di SMS");
define("v_adminsms_jstotalsms","sms totale:");
define("v_adminsms_smstext","testo SMS");
define("v_adminsms_preview","Anteprima");
define("v_adminsms_admins","Amministratori");
define("v_adminsms_save","Salva");
define("v_adminsms_cancel","Anulla");
define("v_adminsms_restoreunsaved","Ripristinare le modifiche non salvate allo stato originale."); //new



// AdminSmsProfile.php
define("v_adminsmsprofile_profilenotactive","Profilo utente - non attivo");
define("v_adminsmsprofile_profileactive","Profilo utente - attivo");
define("v_adminsmsprofile_newaccount","Nuovo conto di utente");
define("v_adminsmsprofile_notregistered","Non sei ancora registrato? Crea un account ora!");
define("v_adminsmsprofile_email","Email:");
define("v_adminsmsprofile_company","Nome di società:");
define("v_adminsmsprofile_street","Strada:");
define("v_adminsmsprofile_city","Città:");
define("v_adminsmsprofile_zip","CAP:");
define("v_adminsmsprofile_country","Paese:");
define("v_adminsmsprofile_id","Codice fiscale:");
define("v_adminsmsprofile_vat","Codice IVA:");
define("v_adminsmsprofile_refererid","Referer ID:");
define("v_adminsmsprofile_licence","Visualizza condizioni di licenza:");
define("v_adminsmsprofile_agree","Accetto");
define("v_adminsmsprofile_notagree","Non accetto");
define("v_adminsmsprofile_register","Registro");
define("v_adminsmsprofile_required","Campo obbligatorio");
define("v_adminsmsprofile_sign","Accedi");
define("v_adminsmsprofile_signtext","Se hai già un account, accedi.");
define("v_adminsmsprofile_username","Nome utente:");
define("v_adminsmsprofile_password","Password:");
define("v_adminsmsprofile_login","Log in");
define("v_adminsmsprofile_editaccount","Modifica account utente");
define("v_adminsmsprofile_save","Salva");
define("v_adminsmsprofile_accountinfo","Informazioni di profilo di utente");
define("v_adminsmsprofile_credit","Credito di SMS:");
define("v_adminsmsprofile_addadmin","Aggiungi amministratori");
define("v_adminsmsprofile_name","Nome:");
define("v_adminsmsprofile_mobilenr","Numero di cellulare:");
define("v_adminsmsprofile_edit","Modifica");
define("v_adminsmsprofile_add","Aggiungi");
define("v_adminsmsprofile_settings","Altre impostazioni");
define("v_adminsmsprofile_simulate","Simulare l`invio di SMS:");
define("v_adminsmsprofile_simulatehint","Permette di provare l`invio di SMS in modulo e di visualizzare gli SMS inviati nella storia SMS con uno status speciale.");
define("v_adminsmsprofile_deletedb","Elimina database:");
define("v_adminsmsprofile_deletedbhint","Permette di decidere se le attuali impostazioni SMS e il database di SMS inviati sono conservati durante la disinstallazione di SMS modulo Prestashop.");
define("v_adminsmsprofile_report","Rapporti di consegna:");
define("v_adminsmsprofile_reporthint","Consente di visualizzare i rapporti di consegna degli SMS in tabella storia SMS.");
define("v_adminsmsprofile_lowcredit","Avviso di credito basso:");
define("v_adminsmsprofile_lowcredithint"," Permette di ricevere e-mail quando il tuo credito per gli SMS è basso.");
define("v_adminsmsprofile_dremail","Indirizzo elettronico per la conferma della consegna:");
define("v_adminsmsprofile_dremailhint","Permette di ricevere e-mail con il rapporto di consegna degli SMS.");
define("v_adminsmsprofile_admincreated","Amministratore è stato creato.");
define("v_adminsmsprofile_agreetext","Devi accettare i termini della licenza.");
define("v_adminsmsprofile_accountcreated","La registrazione e avvenuta con successo. Nella Sua casella postale elettronica e stata inviata una email per l’autenticazione dell’indirizzo di posta elettronica e per l’ottenimento gratuito di 5 crediti.");
define("v_adminsmsprofile_addaccounttext","è possibile aggiungere un altro account dopo");
define("v_adminsmsprofile_minutes"," minuti");
define("v_adminsmsprofile_cantconnect","non di può connettere al SMS server ");
define("v_adminsmsprofile_loginok","Sei loged in.");
define("v_adminsmsprofile_error","errore");
define("v_adminsmsprofile_invalidemail","E-mail per avviso di recapito non e valido .");
define("v_adminsmsprofile_invalidemail2","E-mail non valido");
define("v_adminsmsprofile_accountchanged","L`account è stato cambiato.");
define("v_adminsmsprofile_accountchanged2","L`account è stato cambiato, ma l`URL di Modulo per DR non risponde.");
define("v_adminsmsprofile_changeaccounttext","Poi cambiare conto dopo ");
define("v_adminsmsprofile_seeconds"," secondi");
define("v_adminsmsprofile_invalidname","Mome non valido");
define("v_adminsmsprofile_invalidnumber","Numero non valido");
define("v_adminsmsprofile_adminchanged","Amministratore e stato camibato.");
define("v_adminsmsprofile_admindeleted","Amministratore e stato cancellato.");
define("v_adminsmsprofile_nochanges","non sono state fatte le modifiche");
define("v_adminsmsprofile_loginerror","login error");
define("v_adminsmsprofile_confirmdelete","Voi veramente eliminare");
define("v_adminsmsprofile_deleteadmin","CANCELLA amministratore");
define("v_adminsmsprofile_editadmin","MODIFICA amministratore");
define("v_adminsmsprofile_intformat","in formato internazionale, senza 0 o segno + , ad esempio, 393489877207");
define("v_adminsmsprofile_uninstall","(quando si disinstalla)");
define("v_adminsmsprofile_noalert","(0 = nessun allarme)");
define("v_adminsmsprofile_filluser","Inserisci nome utente e password.");

// CustomerSms.php
define("v_customersms_customersms","Clienti SMS - ");
define("v_customersms_notactive","Clienti SMS - non attivi");
define("v_customersms_langversion"," versione di lingua");
define("v_customersms_description","Selezionare gli eventi durante i quali devono essere clienti notificati via SMS e personalizzare il testo del messaggo. È inoltre possibile aggiungere una nuova versione lingua dei messaggi SMS per ogni paese separatamente. Nei paesi con lingua non definita verrà utilizzata la versione in lingua predefinita.");
define("v_customersms_addsms","Aggiungi versione di testo SMS");
define("v_customersms_country","Seleziona il paese: ");
define("v_customersms_unicodesms","Unicode SMS");
define("v_customersms_unicodetext","Selezionare solo se si desidera utilizzare cinese, arabo, greco, ebraico, coreano, cirillico, ecc o segni diacritici nel testo del messaggio SMS (testo Unicode consente di inserire caratteri in tutti i font e vari altri simboli contemporaneamente. Numero di caratteri in uno SMS sarà ridotto a 70).");
define("v_customersms_orderstatus","Stado di ordine");
define("v_customersms_smsactive","Invio di notifiche via SMS è ATTIVA");
define("v_customersms_smsnotactive","Invio di notifiche via SMS non è attivo. Per attivare l`invio di SMS verificare â  Activeâ   in dettaglio lo stato desiderato."); // edit
define("v_customersms_statusupdate"," Aggiornamento dello stato di ordine");
define("v_customersms_account","Conto");
define("v_customersms_usernotactive","Profilo utente non è attivo! Per registrarti clicca sulla scheda SMS nel menu principale. Modulo visualizza la schermata per l`inserimento dei dati di registrazione. Se era utilizzato il nostro modulo in passato e ricordi nome utente e password, compila il modulo di account. In caso contrario, inserire la tua e-mail, accetti le condizioni di licenza e clicca per registrazione.");
define("v_customersms_invalidtext","SMS testo non valido");
define("v_customersms_smssaved","Testo di SMS salvato.");
define("v_customersms_smsdeleted","Versione di testo SMS e stato cancellato.");
define("v_customersms_confirmdelete","Veramente cancellare?");
define("v_customersms_langdelete","CANCELLARE versione di lingua");
define("v_customersms_smstext","SMS testo");
define("v_customersms_unicode","unicode");
define("v_customersms_versionfor","SMS testo versione per ");
define("v_customersms_wassaved"," e stato salvato");
define("v_customersms_preview","Anteprima");
define("v_customersms_active","Attivo");
define("v_customersms_save","Salva");
define("v_customersms_cancel","Cancella");
define("v_customersms_jstotalsms","sms tottali:");
define("v_customersms_editlang","MODIFICA versione di lingua");
define("v_customersms_default","default");
define("v_customersms_edit","Modifica");
define("v_customersms_add","Aggiungi");
define("v_customersms_order","Ordina");
define("v_customersms_jschars","chars");
define("v_customersms_unicodesaved","Unicode e stato salvato.");
define("v_customersms_restoreunsaved","Ripristinare le modifiche non salvate allo stato originale."); //new




//PayPal.php
define("v_paypal_credit","Acquisto credito");
define("v_paypal_creditnotactive","Acquisto credito - non attivo");
define("v_paypal_usernotactive","Profilo utente non è attivo! Per registrarti clicca sulla scheda SMS nel menu principale. Modulo visualizzata la schermata per l`inserimento dei dati di registrazione. Se hai gia utilizzato il nostro modulo in passato e ricordi il tuo nome utente e password, compila il modulo per il conto esistente. In caso contrario, inserire la tua e-mail, accetti le condizioni di licenza e clicca per registrazione.");
define("v_paypal_clickhereif","Nel caso i modi del pagamento non si visualizzano bene, cliccare qui:"); //new


//SendSms.php
define("v_sendsms_bulksms","SMS di massa");
define("v_sendsms_addrecipients","Aggiungere i destinatari");
define("v_sendsms_addtext","Aggiungere uno o più destinatari separati con virgole. Numeri devono essere in formato internazionale, senza zeri iniziali o + segno.");
define("v_sendsms_eg"," (ad esempio 393489877207)");
define("v_sendsms_entertext","Inserire il testo SMS");
define("v_sendsms_addcsv","Aggiungere i destinatari in file CSV");
define("v_sendsms_csvtext","CSV file - 1 colonna, 1 ° colonna - il numero (in formato internazionale, senza 0 o segno + , ad esempio, 393489877207)");
define("v_sendsms_unicode"," Unicode ");
define("v_sendsms_unicodetext","Selezionare solo se si desidera utilizzare cinese, arabo, greco, ebraico, coreano, cirillico, ecc o segni diacritici nel testo del messaggio SMS (testo Unicode consente di inserire caratteri in tutti i font e vari altri simboli contemporaneamente. Numero di caratteri in uno SMS sarà ridotto a 70).");
define("v_sendsms_time","Il tuo tempo: ");
define("v_sendsms_time2","Tempo: ");
define("v_sendsms_timezone","fuso orario: ");
define("v_sendsms_timezone2","impostazioni di fuso orario");
define("v_sendsms_longtext","Il testo è troppo lungo");
define("v_sendsms_sendsms","Manda SMS");
define("v_sendsms_send","Manda");
define("v_sendsms_sendtext","Inviare SMS o SMS all`ingrosso. Inserire i numeri di cellulare o caricare file CSV.");
define("v_sendsms_smsnotactive","Invia SMS - non attivo");
define("v_sendsms_usernotactive","Profilo utente non è attivo! Per registrarti clicca sulla scheda SMS nel menu principale. Modulo visualizza la schermata per l`inserimento dei dati di registrazione. Se hai gia utilizzato il nostro modulo in passato e ricordi il tuo nome utente e password, compila il modulo per il tuo conto. In caso contrario, inserischi la tua e-mail, accetti le condizioni di licenza e clicca per registrarti.");
define("v_sendsms_fillsms","Inserisci il testo SMS.");
define("v_sendsms_smslong","SMS è troppo lungo (max. 612 caratteri).");
define("v_sendsms_unicodesmslong","SMS è troppo lungo (max. 268 caratteri Unicode).");
define("v_sendsms_wrongtime","Il ora di invio di SMS  sbagliata.");
define("v_sendsms_norecipients","Destinatari trovati: 0");
define("v_sendsms_lowcreditall","Non hai abbastanza credito per inviare SMS a tutti");
define("v_sendsms_recipients"," destinatari.");
define("v_sendsms_smssent","SMS è stato inviato.");
define("v_sendsms_smssaved","SMS è stato salvato.");
define("v_sendsms_wrongnumber","numero sbagliato o non disponibile");
define("v_sendsms_unauthorized","SenderID non autorizzato in sms conferma");
define("v_sendsms_lowcredit","credito basso per l`invio di sms");
define("v_sendsms_nounicode","de non è supportato");
define("v_sendsms_loginerror","errore di login");
define("v_sendsms_cantconnect","errore in connesione al server SMS");
define("v_sendsms_simulation","SIMULAZIONE SMS (invio di SMS è stato simulato. Destinatario non riceve SMS)");
define("v_sendsms_simulationconfirm","SMS è stato inviato (simulazione).");
define("v_sendsms_error","errore");
define("v_sendsms_sendlater"," Invia dopo");
define("v_sendsms_jschars","Caratteri: ");
define("v_sendsms_hr","1 ora");
define("v_sendsms_date","Data: ");

// SmsAnswers.php
define("v_smsanswers_smsanswers","SMS Risposte");
define("v_smsanswers_description","Risposta SMS dal cliente viene visualizzata solo quando il cliente riceve SMS con numero sistema e cliente risponde da suo proprio numero di cellulare");
define("v_smsanswers_show","Mostra");
define("v_smsanswers_results","Cerca risultati ");
define("v_smsanswers_of"," di ");
define("v_smsanswers_smscenter","centro SMS");
define("v_smsanswers_date","Data");
define("v_smsanswers_number","Da numero");
define("v_smsanswers_new","nuovo");
define("v_smsanswers_previous","Precedente");
define("v_smsanswers_next","Prossimo");
define("v_smsanswers_page"," Pagina: ");
define("v_smsanswers_smsnotactive","SMS risposte - non attivo");
define("v_smsanswers_usernotactive","SMS risposte - non activeUser profilo non è attivo! Per registrarti clicca sulla scheda SMS nel menu principale. Modulo ti visualizzata la schermata per l`inserimento dei dati di registrazione. Se hai gia utilizzato il nostro modulo in passato e ricordi il nome utente e password, compilare il modulo per il tuo account. In caso contrario, inserire la tua e-mail, accetti le condizioni di licenza e clicca registra.");
define("v_smsanswers_year","anno");
define("v_smsanswers_month","mese");
define("v_smsanswers_sms","SMS");
define("v_smsanswers_text","Testo:");
define("v_smsanswers_nosms","SMS risposte totale: 0");

// SmsHistory.php
define("v_smshistory_sent","INVIATO al destinatario");
define("v_smshistory_error","ERRORE");
define("v_smshistory_delivered","CONSEGNATO al destinatario");
define("v_smshistory_buffered","DESTINATARIO NON DISPONIBILE"); //new
define("v_smshistory_smshistory","SMS storia");
define("v_smshistory_description","Storia di SMS inviati dal SMS modulo.");
//define("v_smshistory_status","status");
define("v_smshistory_adminsms"," admin sms");
define("v_smshistory_customersms"," clienti sms");
define("v_smshistory_marketingsms"," marketing sms");
define("v_smshistory_simplesms"," sms semplici");
define("v_smshistory_show","Mostra");
define("v_smshistory_results","Risultati della ricerca ");
define("v_smshistory_of"," di ");
define("v_smshistory_type","Tipo");
define("v_smshistory_date","Data");
define("v_smshistory_subject","SMS soggetto");
define("v_smshistory_nubmer","Numero");
define("v_smshistory_yes","si");
define("v_smshistory_no","no");
define("v_smshistory_sysnumber","numero di sistema");
define("v_smshistory_balance","Saldo:");
define("v_smshistory_customerdetail","Visualizzare i dettagli del cliente");
define("v_smshistory_smstext","Testo:");
define("v_smshistory_totalsms","SMS in totale:");
define("v_smshistory_smsnotactive","Storia SMS  - non attivo");
define("v_smshistory_usernotactive","Profilo utente non è attivo! Per registrarti clicca sulla scheda SMS nel menu principale. Modulo visualizza la schermata per l`inserimento dei dati di registrazione. Se hai gia utilizzato il nostro modulo in passato e ricordi il tuo nome utente e password, compila il modulo per il tuo conto. In caso contrario, inserischi la tua e-mail, accetti le condizioni di licenza e clicca per registrarti.");
define("v_smshistory_price","Il costo del SMS in crediti:");
define("v_smshistory_year","anno");
define("v_smshistory_month","mese");
define("v_smshistory_status","Status");
define("v_smshistory_recipient","Destinatario");
define("v_smshistory_unicode","Unicode:");
define("v_smshistory_senderid","ID mittente:");
define("v_smshistory_previous","Precedente");
define("v_smshistory_next","Altro");
define("v_smshistory_page"," Pagina: ");
define("v_smshistory_nosms","SMS in totale: 0");
define("v_smshistory_sms","SMS");

// SmsMarketing.php
define("v_smsmarketing_smsbulk","SMS Marketing - bulk SMS testo");
define("v_smsmarketing_entertext","Inserire il testo SMS");
define("v_smsmarketing_unicode"," Unicode ");
define("v_smsmarketing_unicodetext","Selezionare solo se si desidera utilizzare cinese, arabo, greco, ebraico, coreano, cirillico, ecc o segni diacritici nel testo del messaggio SMS (testo Unicode consente di inserire caratteri in tutti i font e vari altri simboli contemporaneamente. Numero di caratteri in uno SMS saranno ridotti a 70).");
define("v_smsmarketing_sendlater"," Invia dopo ");
define("v_smsmarketing_yourtime","Il tuo tempo: ");
define("v_smsmarketing_jstotalcustomers","Clienti totali:");
define("v_smsmarketing_jstotalsms","SMS in totale:");
define("v_smsmarketing_bulkfilter","SMS Marketing - bulk SMS filtero");
define("v_smsmarketing_allcustomers","Tutti i clienti");
define("v_smsmarketing_companycustomers","clienti aziendali");
define("v_smsmarketing_privatecustomers","clienti privati");
define("v_smsmarketing_allcountries","Tutti i paesi");
define("v_smsmarketing_lastname","Cognome:");
define("v_smsmarketing_firstname","Nome:");
define("v_smsmarketing_lastname2","Cognome");
define("v_smsmarketing_firstname2","Nome");
define("v_smsmarketing_groups","Gruppi:");
define("v_smsmarketing_all","Tutti");
define("v_smsmarketing_gender","Sesso:");
define("v_smsmarketing_male","Maschio");
define("v_smsmarketing_female","Femina");
define("v_smsmarketing_news","Newsletter:");
define("v_smsmarketing_yes","Si");
define("v_smsmarketing_no","No");
define("v_smsmarketing_applyfilter","Applica filtro");
define("v_smsmarketing_birthfrom","Data di nascita dal: ");
define("v_smsmarketing_birthto","a: ");
define("v_smsmarketing_registerfrom","Data di registrazione da: ");
define("v_smsmarketing_customersfound","Clienti trovati: ");
define("v_smsmarketing_results","Risultati");
define("v_smsmarketing_action","Actione");
define("v_smsmarketing_mobilenr","Numero di cellulare");
define("v_smsmarketing_customerid","ID di cliente");
define("v_smsmarketing_removecustomer","RIMUOVERE cliente dall`elenco");
define("v_smsmarketing_next","Altro");
define("v_smsmarketing_previous","Precedente");
define("v_smsmarketing_page"," Pagina: ");
define("v_smsmarketing_smsmarketingfound","SMS Marketing - clienti trovati: ");
define("v_smsmarketing_description","Scrivere il testo del messaggio e utilizzare filtri avanzati per indirizzare la campagna di marketing.");
define("v_smsmarketing_smsmarketing","SMS Marketing");
define("v_smsmarketing_smsnotactive","SMS Marketing - non attivo");
define("v_smsmarketing_usernotactive","Profilo utente non è attivo! Per registrarti clicca sulla scheda SMS nel menu principale. Modulo visualizza la schermata per l`inserimento dei dati di registrazione. Se hai gia utilizzato il nostro modulo in passato e ricordi il tuo nome utente e password, compila il modulo per il tuo conto. In caso contrario, inserischi la tua e-mail, accetti le condizioni di licenza e clicca per registrarti.");
define("v_smsmarketing_fillsms","Inserisci il testo SMS");
define("v_smsmarketing_smslong","SMS è troppo lungo (max. 612 caratteri).");
define("v_smsmarketing_unicodesmslong","SMS è troppo lungo (max. 268 caratteri Unicode).");
define("v_smsmarketing_nocustomers","Clienti trovati: 0");
define("v_smsmarketing_wrongtime","il tempo di invio di SMS sbagliato.");
define("v_smsmarketing_lowcreditall","Non hai abbastanza credito per inviare SMS a tutti ");
define("v_smsmarketing_customers"," clienti.");
define("v_smsmarketing_smssent","SMS e stato mandato.");
define("v_smsmarketing_smssaved","SMS e stato salvato.");
define("v_smsmarketing_wrongnr","numero sbagliato o non disponibile");
define("v_smsmarketing_unauthorized","SenderID non autorizzato in sms di conferma");
define("v_smsmarketing_lowcredit","basso credito per l`invio di sms");
define("v_smsmarketing_nounicode","unicode non e supportato");
define("v_smsmarketing_cantconnect","non si puo collegare a SMS server");
define("v_smsmarketing_simulation","SIMULAZIONE SMS (invio di SMS è stato simulato. Destinatario non riceve SMS)");
define("v_smsmarketing_simulationconfirm","SMS è stato inviato (simulazione).");
define("v_smsmarketing_error","errore");
define("v_smsmarketing_loginerror","login errore");
define("v_smsmarketing_date","Data:");
define("v_smsmarketing_time","Tempo: ");
define("v_smsmarketing_hr","1 ora");
define("v_smsmarketing_timezone","fuso orario: ");
define("v_smsmarketing_timezone2","le impostazioni di fuso orario");
define("v_smsmarketing_send","Manda");
define("v_smsmarketing_jschars","Caratteri: ");
define("v_smsmarketing_longtext","Il testo è troppo lungo");
define("v_smsmarketing_typ","Tipo:");
define("v_smsmarketing_country","Paese:");
define("v_smsmarketing_city","Citta:");
define("v_smsmarketing_advert","Annuncio:");
define("v_smsmarketing_store","Negozio:"); //new
define("v_smsmarketing_allstores","Tutti i negozi"); //new



// smsprestashop.php
define("v_smsprestashop_prestashop","Presta SMS");
define("v_smsprestashop_description","presta-sms.com - inviare SMS dal vostro PrestaShop!");
define("v_smsprestashop_admin","Admin SMS");
define("v_smsprestashop_customer","SMS cliente");
define("v_smsprestashop_settings","SMS Impostazioni");
define("v_smsprestashop_history","SMS Storia");
define("v_smsprestashop_credit","Compra credito");
define("v_smsprestashop_marketing","SMS Marketing");
define("v_smsprestashop_answers","SMS Risposte");
define("v_smsprestashop_send","Manda SMS");
define("v_smsprestashop_about","Riguardo il modulo");
define("v_smsprestashop_wrongnr","numero sbagliato o non disponibile");
define("v_smsprestashop_unauthorized","SenderID non autorizzato in sms di conferma");
define("v_smsprestashop_lowcredit","basso credito per l`invio di sms");
define("v_smsprestashop_nounicode","unicode non e supportato");
define("v_smsprestashop_loginerror","login errore");
define("v_smsprestashop_cantconnect","errore di connessione in SMS server");
define("v_smsprestashop_simulation","SIMULAZIONE SMS (invio di SMS è stato simulato. Destinatario non riceve SMS)");
define("v_smsprestashop_nrunknown","numero di cellulare sconosciuto");
define("v_smsprestashop_notconnected","non connesso in SMS server");
define("v_smsprestashop_sqlinfo1","Nuovi ordini");
define("v_smsprestashop_sqltemplate1","Nuovo ordine da {customer_firstname} {customer_lastname}, id cliente: {customer_id}, id di ordine: {order_id}, pagamento: {order_payment}, valore: {order_total_paid} {order_currency}. Ordine: {order_products2}. Informazioni da {shop_name}.");
define("v_smsprestashop_sqltemplate21","Tuo ordine {order_id} e stato creato, pagamento: {order_payment}, valore: {order_total_paid} {order_currency}. Buona giornata, {shop_name}.");
define("v_smsprestashop_notice","Possibili varianti:");
define("v_smsprestashop_sqlinfo2","Il cliente ha creato conto");
define("v_smsprestashop_sqltemplate2","Cliente {customer_firstname} {customer_lastname}, id: {customer_id}, ha appena sottoscritto {shop_name}.");
define("v_smsprestashop_sqltemplate22","Gentile {customer_firstname} {customer_lastname}, Suo conto in {shop_name} e stato creato. Suo username: {customer_email}. Buona giornata!");
define("v_smsprestashop_sqlinfo3","Prodotto ritornato");
define("v_smsprestashop_sqltemplate3","Cliente {customer_firstname} {customer_lastname}, id: {customer_id}, ha ritornato prodotto dall`ordine {order_id}. Ordine: {orderReturn2}. Testo di cliente: {customer_question}. Informazioni da {shop_name}.");
define("v_smsprestashop_sqltemplate23","Abbiamo ricevuto richiesta. Ordine {order_id}. Buona giornata, {shop_name}.");
define("v_smsprestashop_sqlinfo4","Chiamare quando quantità di prodotto  in un ordine cambia");
define("v_smsprestashop_sqltemplate4","In ordine {order_id} ha cambiato quantita, {orderSlip2}. Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate24","In Sua ordine {order_id} e stata cambiata quantita, {orderSlip2}. Buona giornata, {shop_name}.");
define("v_smsprestashop_sqlinfo5","Conferma di pagamento");
define("v_smsprestashop_sqltemplate5","Conferma pagamento, id di ordine: {order_id}, pagamento: {order_payment},  valore: {order_total_paid} {order_currency}. Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate25","Abbiamo ricevuto pagamento per  ordine {order_id} tramite {order_payment},  valore: {order_total_paid} {order_currency}. Buona giornata, {shop_name}.");

define("v_smsprestashop_sqlinfo62","Aggiornare il numero di inseguimento del`ordine");  //new
define("v_smsprestashop_sqltemplate62","La ordine {order_id} e aggiornata, il numero di inseguimento e {order_shipping_number}. Info dal {shop_name}."); //new
define("v_smsprestashop_sqltemplate262","Gentile Cliente, la Sua ordine {order_id} e spedita, il numero di inseguimento e {order_shipping_number}. Le auguriamo buona giornata, {shop_name}."); //new

define("v_smsprestashop_sqlinfo7","Chiamare quando prodotto viene eliminato");
define("v_smsprestashop_sqltemplate7","Questo prodotto e stato cancellato dal {shop_name}, id: {product_id}, ref: {product_ref}, nome: {product_name}.  Cancellato da utente {employee_id}, {employee_email}.");
define("v_smsprestashop_sqlinfo8","Quantità viene aggiornata solo quando il cliente piaca ordine");
define("v_smsprestashop_sqltemplate8","Quantita di prodotto e cambiata, id: {product_id}, ref: {product_ref}, nome: {product_name}, quantita attuale: {product_quantity}, supplier: {product_supplier}. Informazione da {shop_name}.");
define("v_smsprestashop_sqlinfo9","Prodotto esaurito");
define("v_smsprestashop_sqltemplate9","Questo prodotto e quasi esaurito, id: {product_id}, ref: {product_ref}, nome: {product_name}, quantitta attuale: {product_quantity}. Informazione da {shop_name}.");
define("v_smsprestashop_sqlinfo10","Chiamare quando admin o cliente annulla  un prodotto in un ordine");
define("v_smsprestashop_sqltemplate10","In ordine {order_id} e stato cancellato prodotto con id: {product_id}, ref: {product_ref}, nome: {product_name}. Quantita: {product_quantity}, quantita rifornita: {product_quantity_reinjected}. Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate11","Stato dell`ordine {order_id} e stato cambiato a ");
define("v_smsprestashop_sqltemplate111",". Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate211","Gentile Cliente, lo stato del tuo ordine {order_id} ha cambiato a ");
define("v_smsprestashop_sqltemplate2111",". Buona giornata, {shop_name}.");
define("v_smsprestashop_bankwire","Bank wire");
define("v_smsprestashop_company","Nome di azienda");
define("v_smsprestashop_country","Paese");
define("v_smsprestashop_city","Citta");
define("v_smsprestashop_qty","quantita");
define("v_smsprestashop_qtyreinjected","quantita rifornita");
define("v_smsprestashop_qtyreturned","quantita ritornata");
define("v_smsprestashop_name","nome");
define("v_smsprestashop_notfound","non trovato"); //new

// SmsWizard.php
define("v_smswizard_ownsettings","SMS Impostazioni - Selezionare il proprio ID numero di mittente");
define("v_smswizard_ownnrsettings","Impostare il proprio numero di ID mittente");
define("v_smswizard_ownnrid","Numero proprio di mittente");
define("v_smswizard_existingown","Numero proprio esistente:");
define("v_smswizard_newownnrid","Nuovo numero proprio:");
define("v_smswizard_intformat","in formato internazionale<br />senza 0 o segno + , ad esempio, 393489877207");
define("v_smswizard_smscode","SMS codice:");
define("v_smswizard_confirm","CONFERMA");
define("v_smswizard_required","campi obbligatori");
define("v_smswizard_textsettings","Impostazioni SMS - Selezionare ID mittente di testo per ");
define("v_smswizard_senderidsettings","Impostazioni di testo di mittente ID ");
define("v_smswizard_existingsid","Testo esistente di ID mittente:");
define("v_smswizard_newsid","Nuovo testo come sender ID:");
define("v_smswizard_maxchars","max. 11 caratteri");
define("v_smswizard_smssettings","SMS Impostazioni");
define("v_smswizard_description","Definire il tipo di SMS Sender per ogni paese separatamente (ID come testo mittente , numero di cellulare o il numero del sistema). Il costo del SMS dipende dal paese destinatario, tipo di mittente selezionato  e valore di pagamento. Nei paesi in cui non e definito tipo del mittente SMS verrà utilizzato il numero di sistema del mittente.");
define("v_smswizard_customersettings","Impostazioni SMS del cliente");
define("v_smswizard_addcountry","Aggiungere / Seleziona il paese selezionato");
define("v_smswizard_sendertype","TIPO DI MITTENTE");
define("v_smswizard_network","NETWORK");
define("v_smswizard_smsprice","PREZZO IN CREDITS");
define("v_smswizard_price","PREZZO SMS IN EUR (senza IVA)");
define("v_smswizard_payment","pagamento");
define("v_smswizard_unicode","Unicode ");


define("v_smswizard_unicodetext","Supporto per caratteri di Unicode (Unicode permette di scrivere caratteri in tutti i font e vari simboli. Viene utilizzato per cinese, arabo, greco, ebraico, coreano, cirillico, ecc o segni diacritici nel testo del messaggio SMS)");
define("v_smswizard_textsid","TIDENTIFICAZIONE COME TESTO");
define("v_smswizard_textsid2","identificazione come testo");
define("v_smswizard_systemnr","NUMERO DI SISTEMA");
define("v_smswizard_ownnrsid","NUMERO PROPRIO");
define("v_smswizard_simhosting","SIM HOSTING");
define("v_smswizard_unicodesupported","UNICODE SUPPORTATO");
define("v_smswizard_nounicode","UNICODE NON SUPPORTATO");
define("v_smswizard_savesettings","SALVA IMPOSTAZIONI DI SMS");
define("v_smswizard_suredelete","Veramente eliminare?");
define("v_smswizard_country","Seleziona paese: ");
define("v_smswizard_notactive","Impostazioni SMS - non attivo");
define("v_smswizard_usernotactive","Profilo utente non è attivo! Per registrarti clicca sulla scheda SMS nel menu principale. Modulo visualizza la schermata per l`inserimento dei dati di registrazione. Se hai gia utilizzato il nostro modulo in passato e ricordi il tuo nome utente e password, compila il modulo per il tuo conto. In caso contrario, inserischi la tua e-mail, accetti le condizioni di licenza e clicca per registrarti.");
define("v_smswizard_error","errore");
define("v_smswizard_cantconnect","non connesso a SMS server");
define("v_smswizard_deleted"," e stato cancellato."); // country was deleted
define("v_smswizard_choosesender","scegliere il tipo del mittente");
define("v_smswizard_countrysaved"," e stato salvato."); //country name was saved
define("v_smswizard_fillsid","compila il numero proprio");
define("v_smswizard_mustbenumber","numero proprio deve essere cifra");
define("v_smswizard_confirmcode","corretamente sms codice");
define("v_smswizard_ownsidfor","numero proprio per ");
define("v_smswizard_wassaved"," e stato salvato."); // Own number sender ID for(Text sender ID for ) ... was saved
define("v_smswizard_error2","errore - ");



define("v_smswizard_loginerror","login errore");
define("v_smswizard_retypecode","Adesso riscrivi SMS codice.");
define("v_smswizard_retypecode2","Adesso riscrivi SMS codice. SMS viene manadata entro 60 secondi.");
define("v_smswizard_wrongnrerror","errore - numero sbagliato o non disponibile");
define("v_smswizard_unauthorizederror","errore - SenderID non autorizzato per sms conferma");
define("v_smswizard_lowcrediterror","errore - basso credito per l`invio di SMS di validazione");
define("v_smswizard_filltextsid","compila testo di identificazione di mittente");
define("v_smswizard_filltextsid2","compila testo di identificazione di mittente, 3-11 caratteri");
define("v_smswizard_chars","caratteri possibili: ");
define("v_smswizard_nonumber","identificazione di testo non puo essere numero");
define("v_smswizard_textsidfor","identificazione come testo per ");
define("v_smswizard_adminsettings","Admin SMS impostazioni");

define("v_smswizard_validate","VALIDARE"); //new
define("v_smswizard_smsvalidation","SMS validazione"); //new
define("v_smswizard_confirmationcode","Codice di conferma: ");//new, bez diakritiky, pouzito v sms
define("v_smswizard_updatepricelist","Aggiornare listino prezzi"); //new
define("v_smswizard_eg","e.g.:"); //new
define("v_smswizard_pricelistupdated","Listino dei prezzi aggiornato con successo."); //new
define("v_smswizard_edit","modificare"); //new
define("v_smswizard_delete","cancelare"); //new



//new
define("v_smsprestashop_smscharging_fieldset","I vostri negozi online");
define("v_smsprestashop_smscharging","SMS opt-out");
define("v_smsprestashop_smscharging_h2","SMS opt-out - impostazione dell’opzione SMS opt-out nel carrello e il pagamento del SMS");
define("v_smsprestashop_smscharging_description","Segliere il negozio online per il quale si vuogliono fare l’impostazioni nel carrelllo per  annullare l’iscrizione per le notifiche SMS, definire il costo dei SMS e definire il testo che verra visualizzato dal cliente nel carrello.");
define("v_adminsmsprofile_prefer","Per mandare gli SMS si preferisce il numero dal:");
define("v_adminsmsprofile_preferinvoice","indirizzo di fatturazione");
define("v_adminsmsprofile_preferdeliver","indirizzo di consegna");
define("v_smsprestashop_smscharging_price","prezzo del SMS");
define("v_smsprestashop_smscharging_texts","Il testo visualizzato nel carrello");
define("v_smsprestashop_smscharging_active","Attivare la visualizzazione dell‘opzione SMS opt-out nel carrello");
define("v_smsprestashop_smscharging_optoutactive","SMS opt-out NON è ATTIVO");
define("v_smsprestashop_smscharging_optoutnotactive","SMS opt-out NON è ATTIVO. Per attivare SMS opt-out segnalare la cassella „Attivare la visualizzazione dell’opzione SMS opt-out nel carrello“");
define("v_smsprestashop_smscharging_saved","L’impostazione dell-opzione SMS opt-out e cambiata con successo");
define("v_smswizard_pricelistupdated_changed","Il prezzo del SMS e cambiato nei paesi seguenti:");
define("v_smsprestashop_newversion","La versione nuova disponibile per il scaricamento:");

define("v_about_manual_text","Manuale per SMS Modulo (ENG):");
define("v_about_manual_url","www.presta-sms.com/manual.html");
define("v_about_supported_text","Versioni supportate del Prestashop:");
define("v_about_supported_text_ps","1.5.x");


define("v_contact_form","Modulo di contatto");

define("v_remove_duplicate","Rimuovere numeri duplicati");

define("v_registration_type","Tipo di registrazione:");
define("v_registration_type_personal","Personale");
define("v_registration_type_business","Commercio");
define("v_registration_address","Indirizzo");
define("v_registration_billing_information","Dati di fatturazione");
define("v_registration_personal_contact","Persona di contatto");
define("v_registration_company_name","Inserire il nome della società.");
define("v_registration_vat_invalid","IVA non valido");







//stats new
define("v_statistics","Statistiche");
define("v_statistics_smsnotactive","Statistiche - non attivo");
define("v_statistics_day","giorno");
define("v_statistics_datefrom","Data dal:");
define("v_statistics_dateto","a:");


// filter
define("v_filter_deleted_customers", "Clienti rimosso: ");
define("v_filter_more", "Altro...");
define("v_filter_load", "Filtri salvate");
define("v_filter_save", "Salvare il filtro");
define("v_filter_clear", "Azzera il filtro");
define("v_filter_name", "Nome filtro");
define("v_filter_date", "Date");
define("v_filter_been_apply", "Filtro e stato applicato.");
define("v_filter_been_saved", "Filter e stato registrato.");
define("v_filter_been_clear", "Filter e stato resettato.");
define("v_filter_q_clear", "Sei sicuro di voler azzerare il filtro?");
define("v_filter_q_delete", "Sei sicuro di voler rimuovere il filtro?");
define("v_filter_not_found", "Il filtro non trovato.");
define("v_send_busy", "Elaborazione...");

// Template
define("v_template_load", "Templati salvati");
define("v_template_save", "Salva template");
define("v_template_name", "Nome template");
define("v_template_been_apply", "Template e stato caricato.");
define("v_template_been_saved", "Template e stato salvato.");
define("v_template_q_delete", "Sei sicuro di voler rimuovere il templato?");
define("v_template_not_found", "Template non trovato.");
define("v_show_virtual", "Operatori virtuali (MVNO)");

// Marketing
define("v_marketing_coupon", "Selezionare un buoni sconto");
define("v_marketing_coupon_create", "Creare un buoni sconto");
define("v_marketing_none", "Seleziona");
define("v_smshistory_simulation", "SIMULAZIONE");
define("v_smshistory_deleted", "RIMOSSO");
define("v_smshistory_sheduled", "PREVISTA");
define("v_smshistory_duplicate", "DUPLICATO");
define("v_smshistory_dnd", "DO NOT DISTURB registro (DND)");
define("v_sendsms_addcsv_vcard","Aggiungere i destinatari in file CSV (.csv, .txt) o vCard (.vcf)");

// Hooks v2
define("v_hook_return", "Restituzioni");
define("v_hook_return_customer", "Ricevimento del restituzione.");
define("v_hook_return_admin", "Nuovo restituzioni ha ricevuto.");
define("v_smsprestashop_return_status_admin","Stato dell`restituzione {return_id} e stato cambiato a ");
define("v_smsprestashop_return_status_admin2",". Informazione da {shop_name}.");
define("v_smsprestashop_return_status_customer","Gentile Cliente, lo stato del tuo restituzione {return_id} ha cambiato a ");
define("v_smsprestashop_return_status_customer2",". Buona giornata, {shop_name}.");

// OptOut
define("v_optout_auto_variable", "Aggiungi il prodotto SMS al carrello:");
define("v_optout_auto", "automaticamente");
define("v_optout_manual", "manualmente");

// ZenCart
define("v_about_version_zen","Zen SMS module versione ");
define("v_about_supported_text_zen","Versioni supportate del ZenCart:");
define("v_about_supported_version_zen","1.3.x. - 1.5.x");
define("v_about_manual_url_zen","www.zen-sms.net/manual.html");
define("v_about_website_name_zen","www.zen-sms.net");
define("v_about_website_url_zen","www.zen-sms.net/it/index.html");


define("v_smsprestashop_sqltemplate1_zen","Nuovo ordine da {customer_firstname} {customer_lastname}, id cliente: {customer_id}, id di ordine: {order_id}, pagamento: {order_payment}, valore: {order_total_paid} {order_currency}. Ordine: {order_products2}. Informazioni da {shop_name}.");
define("v_smsprestashop_sqltemplate21_zen","Tuo ordine {order_id} e stato creato, pagamento: {order_payment}, valore: {order_total_paid} {order_currency}. Buona giornata, {shop_name}.");
define("v_smsprestashop_sqltemplate2_zen","Cliente {customer_firstname} {customer_lastname}, id: {customer_id}, ha appena sottoscritto {shop_name}.");
define("v_smsprestashop_sqltemplate22_zen","Gentile {customer_firstname} {customer_lastname}, Suo conto in {shop_name} e stato creato. Suo username: {customer_email}. Buona giornata!");
define("v_smsprestashop_sqltemplate3_zen","Cliente {customer_firstname} {customer_lastname}, id: {customer_id}, ha ritornato prodotto dall`ordine {order_id}. Ordine: {orderReturn2}. Testo di cliente: {customer_question}. Informazioni da {shop_name}.");
define("v_smsprestashop_sqltemplate23_zen","Abbiamo ricevuto richiesta. Ordine {order_id}. Buona giornata, {shop_name}.");
define("v_smsprestashop_sqltemplate4_zen","In ordine {order_id} ha cambiato quantita, {orderSlip2}. Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate24_zen","In Sua ordine {order_id} e stata cambiata quantita, {orderSlip2}. Buona giornata, {shop_name}.");
define("v_smsprestashop_sqltemplate5_zen","Conferma pagamento, id di ordine: {order_id}, pagamento: {order_payment},  valore: {order_total_paid} {order_currency}. Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate25_zen","Abbiamo ricevuto pagamento per  ordine {order_id} tramite {order_payment},  valore: {order_total_paid} {order_currency}. Buona giornata, {shop_name}.");
define("v_smsprestashop_sqltemplate62_zen","La ordine {order_id} e aggiornata, il numero di inseguimento e {order_shipping_number}. Info dal {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_zen","Gentile Cliente, la Sua ordine {order_id} e spedita, il numero di inseguimento e {order_shipping_number}. Le auguriamo buona giornata, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_zen","Questo prodotto e stato cancellato dal {shop_name}, id: {product_id}, ref: {product_ref}, nome: {product_name}.  Cancellato da utente {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_zen","Quantita di prodotto e cambiata, id: {product_id}, ref: {product_ref}, nome: {product_name}, quantita attuale: {product_quantity}, supplier: {product_supplier}. Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate9_zen","Questo prodotto e quasi esaurito, id: {product_id}, ref: {product_ref}, nome: {product_name}, quantitta attuale: {product_quantity}. Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate10_zen","In ordine {order_id} e stato cancellato prodotto con id: {product_id}, ref: {product_ref}, nome: {product_name}. Quantita: {product_quantity}, quantita rifornita: {product_quantity_reinjected}. Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate11_zen","Stato dell`ordine {order_id} e stato cambiato a ");
define("v_smsprestashop_sqltemplate111_zen",". Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate211_zen","Gentile Cliente, lo stato del tuo ordine {order_id} ha cambiato a ");
define("v_smsprestashop_sqltemplate2111_zen",". Buona giornata, {shop_name}.");











// OpenCart
define("v_about_version_oc","Cart SMS module versione ");
define("v_about_supported_text_oc","Versioni supportate del OpenCart:");
define("v_about_supported_version_oc","1.4.7 - 1.5.6.1");
define("v_about_manual_url_oc","www.cart-sms.com/manual.html");
define("v_about_website_name_oc","www.cart-sms.com");
define("v_about_website_url_oc","www.cart-sms.com/it/index.html");


define("v_smsprestashop_sqltemplate1_oc","Nuovo ordine da {customer_firstname} {customer_lastname}, id cliente: {customer_id}, id di ordine: {order_id}, pagamento: {order_payment}, valore: {order_total_paid} {order_currency}. Ordine: {order_products2}. Informazioni da {shop_name}.");
define("v_smsprestashop_sqltemplate21_oc","Tuo ordine {order_id} e stato creato, pagamento: {order_payment}, valore: {order_total_paid} {order_currency}. Buona giornata, {shop_name}.");
define("v_smsprestashop_sqltemplate2_oc","Cliente {customer_firstname} {customer_lastname}, id: {customer_id}, ha appena sottoscritto {shop_name}.");
define("v_smsprestashop_sqltemplate22_oc","Gentile {customer_firstname} {customer_lastname}, Suo conto in {shop_name} e stato creato. Suo username: {customer_email}. Buona giornata!");
define("v_smsprestashop_sqltemplate3_oc","Cliente {customer_firstname} {customer_lastname}, id: {customer_id}, ha ritornato prodotto dall`ordine {order_id}. Ordine: {orderReturn2}. Testo di cliente: {customer_question}. Informazioni da {shop_name}.");
define("v_smsprestashop_sqltemplate23_oc","Abbiamo ricevuto richiesta. Ordine {order_id}. Buona giornata, {shop_name}.");
define("v_smsprestashop_sqltemplate4_oc","In ordine {order_id} ha cambiato quantita, {orderSlip2}. Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate24_oc","In Sua ordine {order_id} e stata cambiata quantita, {orderSlip2}. Buona giornata, {shop_name}.");
define("v_smsprestashop_sqltemplate5_oc","Conferma pagamento, id di ordine: {order_id}, pagamento: {order_payment},  valore: {order_total_paid} {order_currency}. Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate25_oc","Abbiamo ricevuto pagamento per  ordine {order_id} tramite {order_payment},  valore: {order_total_paid} {order_currency}. Buona giornata, {shop_name}.");
define("v_smsprestashop_sqltemplate62_oc","La ordine {order_id} e aggiornata, il numero di inseguimento e {order_shipping_number}. Info dal {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_oc","Gentile Cliente, la Sua ordine {order_id} e spedita, il numero di inseguimento e {order_shipping_number}. Le auguriamo buona giornata, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_oc","Questo prodotto e stato cancellato dal {shop_name}, id: {product_id}, ref: {product_ref}, nome: {product_name}.  Cancellato da utente {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_oc","Quantita di prodotto e cambiata, id: {product_id}, ref: {product_ref}, nome: {product_name}, quantita attuale: {product_quantity}, supplier: {product_supplier}. Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate9_oc","Questo prodotto e quasi esaurito, id: {product_id}, ref: {product_ref}, nome: {product_name}, quantitta attuale: {product_quantity}. Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate10_oc","In ordine {order_id} e stato cancellato prodotto con id: {product_id}, ref: {product_ref}, nome: {product_name}. Quantita: {product_quantity}, quantita rifornita: {product_quantity_reinjected}. Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate11_oc","Stato dell`ordine {order_id} e stato cambiato a ");
define("v_smsprestashop_sqltemplate111_oc",". Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate211_oc","Gentile Cliente, lo stato del tuo ordine {order_id} ha cambiato a ");
define("v_smsprestashop_sqltemplate2111_oc",". Buona giornata, {shop_name}.");












// OsCommerce
define("v_about_version_os","smsCommerce module versione ");
define("v_about_supported_text_os","Versioni supportate del OsCommerce:");
define("v_about_supported_version_os","2.3.x");
define("v_about_manual_url_os","www.sms-commerce.net/manual.html");
define("v_about_website_name_os","www.sms-commerce.net");
define("v_about_website_url_os","www.sms-commerce.net/it/index.html");


define("v_smsprestashop_sqltemplate1_os","Nuovo ordine da {customer_firstname} {customer_lastname}, id cliente: {customer_id}, id di ordine: {order_id}, pagamento: {order_payment}, valore: {order_total_paid} {order_currency}. Ordine: {order_products2}. Informazioni da {shop_name}.");
define("v_smsprestashop_sqltemplate21_os","Tuo ordine {order_id} e stato creato, pagamento: {order_payment}, valore: {order_total_paid} {order_currency}. Buona giornata, {shop_name}.");
define("v_smsprestashop_sqltemplate2_os","Cliente {customer_firstname} {customer_lastname}, id: {customer_id}, ha appena sottoscritto {shop_name}.");
define("v_smsprestashop_sqltemplate22_os","Gentile {customer_firstname} {customer_lastname}, Suo conto in {shop_name} e stato creato. Suo username: {customer_email}. Buona giornata!");
define("v_smsprestashop_sqltemplate3_os","Cliente {customer_firstname} {customer_lastname}, id: {customer_id}, ha ritornato prodotto dall`ordine {order_id}. Ordine: {orderReturn2}. Testo di cliente: {customer_question}. Informazioni da {shop_name}.");
define("v_smsprestashop_sqltemplate23_os","Abbiamo ricevuto richiesta. Ordine {order_id}. Buona giornata, {shop_name}.");
define("v_smsprestashop_sqltemplate4_os","In ordine {order_id} ha cambiato quantita, {orderSlip2}. Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate24_os","In Sua ordine {order_id} e stata cambiata quantita, {orderSlip2}. Buona giornata, {shop_name}.");
define("v_smsprestashop_sqltemplate5_os","Conferma pagamento, id di ordine: {order_id}, pagamento: {order_payment},  valore: {order_total_paid} {order_currency}. Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate25_os","Abbiamo ricevuto pagamento per  ordine {order_id} tramite {order_payment},  valore: {order_total_paid} {order_currency}. Buona giornata, {shop_name}.");
define("v_smsprestashop_sqltemplate62_os","La ordine {order_id} e aggiornata, il numero di inseguimento e {order_shipping_number}. Info dal {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_os","Gentile Cliente, la Sua ordine {order_id} e spedita, il numero di inseguimento e {order_shipping_number}. Le auguriamo buona giornata, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_os","Questo prodotto e stato cancellato dal {shop_name}, id: {product_id}, ref: {product_ref}, nome: {product_name}.  Cancellato da utente {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_os","Quantita di prodotto e cambiata, id: {product_id}, ref: {product_ref}, nome: {product_name}, quantita attuale: {product_quantity}, supplier: {product_supplier}. Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate9_os","Questo prodotto e quasi esaurito, id: {product_id}, ref: {product_ref}, nome: {product_name}, quantitta attuale: {product_quantity}. Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate10_os","In ordine {order_id} e stato cancellato prodotto con id: {product_id}, ref: {product_ref}, nome: {product_name}. Quantita: {product_quantity}, quantita rifornita: {product_quantity_reinjected}. Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate11_os","Stato dell`ordine {order_id} e stato cambiato a ");
define("v_smsprestashop_sqltemplate111_os",". Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate211_os","Gentile Cliente, lo stato del tuo ordine {order_id} ha cambiato a ");
define("v_smsprestashop_sqltemplate2111_os",". Buona giornata, {shop_name}.");







// Virtuemart
define("v_about_version_vm","Virtue SMS module versione ");
define("v_about_supported_text_vm","Versioni supportate del Virtuemart:");
define("v_about_supported_version_vm","2.3.x");
define("v_about_manual_url_vm","www.virtue-sms.net/manual.html");
define("v_about_website_name_vm","www.virtue-sms.net");
define("v_about_website_url_vm","www.virtue-sms.net/it/index.html");


define("v_smsprestashop_sqltemplate1_vm","Nuovo ordine da {customer_firstname} {customer_lastname}, id cliente: {customer_id}, id di ordine: {order_id}, pagamento: {order_payment}, valore: {order_total_paid} {order_currency}. Ordine: {order_products2}. Informazioni da {shop_name}.");
define("v_smsprestashop_sqltemplate21_vm","Tuo ordine {order_id} e stato creato, pagamento: {order_payment}, valore: {order_total_paid} {order_currency}. Buona giornata, {shop_name}.");
define("v_smsprestashop_sqltemplate2_vm","Cliente {customer_firstname} {customer_lastname}, id: {customer_id}, ha appena sottoscritto {shop_name}.");
define("v_smsprestashop_sqltemplate22_vm","Gentile {customer_firstname} {customer_lastname}, Suo conto in {shop_name} e stato creato. Suo username: {customer_email}. Buona giornata!");
define("v_smsprestashop_sqltemplate3_vm","Cliente {customer_firstname} {customer_lastname}, id: {customer_id}, ha ritornato prodotto dall`ordine {order_id}. Ordine: {orderReturn2}. Testo di cliente: {customer_question}. Informazioni da {shop_name}.");
define("v_smsprestashop_sqltemplate23_vm","Abbiamo ricevuto richiesta. Ordine {order_id}. Buona giornata, {shop_name}.");
define("v_smsprestashop_sqltemplate4_vm","In ordine {order_id} ha cambiato quantita, {orderSlip2}. Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate24_vm","In Sua ordine {order_id} e stata cambiata quantita, {orderSlip2}. Buona giornata, {shop_name}.");
define("v_smsprestashop_sqltemplate5_vm","Conferma pagamento, id di ordine: {order_id}, pagamento: {order_payment},  valore: {order_total_paid} {order_currency}. Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate25_vm","Abbiamo ricevuto pagamento per  ordine {order_id} tramite {order_payment},  valore: {order_total_paid} {order_currency}. Buona giornata, {shop_name}.");
define("v_smsprestashop_sqltemplate62_vm","La ordine {order_id} e aggiornata, il numero di inseguimento e {order_shipping_number}. Info dal {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_vm","Gentile Cliente, la Sua ordine {order_id} e spedita, il numero di inseguimento e {order_shipping_number}. Le auguriamo buona giornata, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_vm","Questo prodotto e stato cancellato dal {shop_name}, id: {product_id}, ref: {product_ref}, nome: {product_name}.  Cancellato da utente {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_vm","Quantita di prodotto e cambiata, id: {product_id}, ref: {product_ref}, nome: {product_name}, quantita attuale: {product_quantity}, supplier: {product_supplier}. Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate9_vm","Questo prodotto e quasi esaurito, id: {product_id}, ref: {product_ref}, nome: {product_name}, quantitta attuale: {product_quantity}. Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate10_vm","In ordine {order_id} e stato cancellato prodotto con id: {product_id}, ref: {product_ref}, nome: {product_name}. Quantita: {product_quantity}, quantita rifornita: {product_quantity_reinjected}. Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate11_vm","Stato dell`ordine {order_id} e stato cambiato a ");
define("v_smsprestashop_sqltemplate111_vm",". Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate211_vm","Gentile Cliente, lo stato del tuo ordine {order_id} ha cambiato a ");
define("v_smsprestashop_sqltemplate2111_vm",". Buona giornata, {shop_name}.");







// Magento
define("v_about_version_ms","Mage SMS module versione ");
define("v_about_supported_text_ms","Versioni supportate del Magento:");
define("v_about_supported_version_ms","1.6.x - 1.7.x");
define("v_about_manual_url_ms","www.mage-sms.com/manual.html");
define("v_about_website_name_ms","www.mage-sms.com");
define("v_about_website_url_ms","www.mage-sms.com/it/index.html");


define("v_smsprestashop_sqltemplate1_ms","Nuovo ordine da {customer_firstname} {customer_lastname}, id cliente: {customer_id}, id di ordine: {order_id}, pagamento: {order_payment}, valore: {order_total_paid} {order_currency}. Ordine: {order_products2}. Informazioni da {shop_name}.");
define("v_smsprestashop_sqltemplate21_ms","Tuo ordine {order_id} e stato creato, pagamento: {order_payment}, valore: {order_total_paid} {order_currency}. Buona giornata, {shop_name}.");
define("v_smsprestashop_sqltemplate2_ms","Cliente {customer_firstname} {customer_lastname}, id: {customer_id}, ha appena sottoscritto {shop_name}.");
define("v_smsprestashop_sqltemplate22_ms","Gentile {customer_firstname} {customer_lastname}, Suo conto in {shop_name} e stato creato. Suo username: {customer_email}. Buona giornata!");
define("v_smsprestashop_sqltemplate3_ms","Cliente {customer_firstname} {customer_lastname}, id: {customer_id}, ha ritornato prodotto dall`ordine {order_id}. Ordine: {orderReturn2}. Testo di cliente: {customer_question}. Informazioni da {shop_name}.");
define("v_smsprestashop_sqltemplate23_ms","Abbiamo ricevuto richiesta. Ordine {order_id}. Buona giornata, {shop_name}.");
define("v_smsprestashop_sqltemplate4_ms","In ordine {order_id} ha cambiato quantita, {orderSlip2}. Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate24_ms","In Sua ordine {order_id} e stata cambiata quantita, {orderSlip2}. Buona giornata, {shop_name}.");
define("v_smsprestashop_sqltemplate5_ms","Conferma pagamento, id di ordine: {order_id}, pagamento: {order_payment},  valore: {order_total_paid} {order_currency}. Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate25_ms","Abbiamo ricevuto pagamento per  ordine {order_id} tramite {order_payment},  valore: {order_total_paid} {order_currency}. Buona giornata, {shop_name}.");
define("v_smsprestashop_sqltemplate62_ms","La ordine {order_id} e aggiornata, il numero di inseguimento e {order_shipping_number}. Info dal {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_ms","Gentile Cliente, la Sua ordine {order_id} e spedita, il numero di inseguimento e {order_shipping_number}. Le auguriamo buona giornata, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_ms","Questo prodotto e stato cancellato dal {shop_name}, id: {product_id}, ref: {product_ref}, nome: {product_name}.  Cancellato da utente {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_ms","Quantita di prodotto e cambiata, id: {product_id}, ref: {product_ref}, nome: {product_name}, quantita attuale: {product_quantity}, supplier: {product_supplier}. Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate9_ms","Questo prodotto e quasi esaurito, id: {product_id}, ref: {product_ref}, nome: {product_name}, quantitta attuale: {product_quantity}. Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate10_ms","In ordine {order_id} e stato cancellato prodotto con id: {product_id}, ref: {product_ref}, nome: {product_name}. Quantita: {product_quantity}, quantita rifornita: {product_quantity_reinjected}. Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate11_ms","Stato dell`ordine {order_id} e stato cambiato a ");
define("v_smsprestashop_sqltemplate111_ms",". Informazione da {shop_name}.");
define("v_smsprestashop_sqltemplate211_ms","Gentile Cliente, lo stato del tuo ordine {order_id} ha cambiato a ");
define("v_smsprestashop_sqltemplate2111_ms",". Buona giornata, {shop_name}.");













?>