<?php

define("lang_iso_code","fr");
define("smscurrency","EUR");



define("lang_alphabet","A;À;Â;B;C;Ç;D;E;É;È;Ë;Ê;F;G;H;I;Î;Ï;J;K;L;M;N;O;Ô;Œ;P;Q;R;S;T;U;Ù;Û;V;W;X;Y;Z");


//new
define("v_all_years","Tous les ans");
define("v_menu_setting", "Paramètres");


// About
define("v_about_about","Module");
define("v_about_version","Presta SMS module, version");
define("v_about_copyright","Copyright © TOPefekt s.r.o., Tous droits réservés");
define("v_about_developer","Développeur");
define("v_about_topefekt","TOPefekt s.r.o.");
define("v_about_address","Adresse:");
define("v_about_street","B. Nemcove 767/13");
define("v_about_city","78701 Sumperk");
define("v_about_state","La République tchèque");
define("v_about_vat","No. TVA: CZ29444268"); 
define("v_about_phone","Téléphone");
define("v_about_phonenr","+420 581 110 998");
define("v_about_mail","E-mail:");
define("v_about_mailsales","sales@topefekt.com");
define("v_about_mailsupport","support@topefekt.com");
define("v_about_web","Web:");
define("v_about_website_name","www.presta-sms.com");
define("v_about_website_url","www.presta-sms.com/fr/index.html");



// AdminSms.php
define("v_adminsms_adminsms","Admin SMS");
define("v_adminsms_description","Choisissez les événements lors desquels les administrateurs du magasin seront avertis par un message SMS et définissez le texte de ces messages.");
define("v_adminsms_unicodesms","Unicode SMS");
define("v_adminsms_unicode","unicode");
define("v_adminsms_unicodetext","Cochez seulement si vous souhaitez utiliser dans le message le diacritique ou les langues comme le chinois, l´arabe, le grec, l´hébreu, le coréen etc.,(Unicode permet d´utiliser en même temps de différents fontes et symboles. Le nombre de caractères dans un message Unicode est 70).");
define("v_adminsms_unicodesave","Sauvegarder");
define("v_adminsms_smsactive","L´envoi du sms par notification est ACTIF.");
define("v_adminsms_smsnotactive","L´envoi du sms par notification est INACTIF. Vous activez l´envoi du­ SMS en cochant au moins un administrateur.");
define("v_adminsms_statusupdate","Mise à jour de l´état de la commande");
define("v_adminsms_account","Compte");
define("v_adminsms_product","Produit");
define("v_adminsms_orderstatus","État de la commande");
define("v_adminsms_order","Commande");
define("v_adminsms_adminsmsnotactive","Admin SMS - inactif");
define("v_adminsms_addadmin","Veuillez ajouter au moins un administrateur!");
define("v_adminsms_usernotactive","Le profil d´utilisateur est inactif!Inscrivez-vous en cliquant sur l´onglet SMS dans le menu principal. Module vous visualisera le formulaire d´inscription. Si vous avez déjà utilisé le module dans le passé et vous connaissez votre nom d´utilisateur et votre mot de passe remplissez donc le formulaire pour le compte existant. Dans le cas contraire entrez votre email, approuvez les termes et conditions de licence et cliquez sur \"S´inscrire\".");
define("v_adminsms_invalidtext","Le texte du message SMS non valide");
define("v_adminsms_smssaved","Le texte du message SMS a été sauvegardé.");
define("v_adminsms_unicodesaved","Unicode sauvegardé.");
define("v_adminsms_jschar","Caractère");
define("v_adminsms_jschars","Caractères");
define("v_adminsms_jslabel","Vignette");
define("v_adminsms_jssmstext","Texte du SMS");
define("v_adminsms_jstotalsms","sms au total:");
define("v_adminsms_smstext","Entrez le texte du message SMS");
define("v_adminsms_preview","Aperçu");
define("v_adminsms_admins","Adminstrateurs");
define("v_adminsms_save","Sauvegarder");
define("v_adminsms_cancel","Annuler");
define("v_adminsms_restoreunsaved","Remettre des modifications non sauvegardées en état original."); //new


// AdminSmsProfile.php
define("v_adminsmsprofile_profilenotactive","Profil d´utilisateur - inactif­");
define("v_adminsmsprofile_profileactive","Profil d´utilisateur - actif­");
define("v_adminsmsprofile_newaccount","Nouveau compte d´utilisateur");
define("v_adminsmsprofile_notregistered","Pas encore inscrit? - Créez votre compte maintenant­!");
define("v_adminsmsprofile_email","Email:");
define("v_adminsmsprofile_company","Nom de la société:");
define("v_adminsmsprofile_street","Rue:");
define("v_adminsmsprofile_city","Ville:");
define("v_adminsmsprofile_zip","Code postal:");
define("v_adminsmsprofile_country","Pays:");
define("v_adminsmsprofile_id","SIREN:");
define("v_adminsmsprofile_vat","No. TVA:");
define("v_adminsmsprofile_refererid","Referer ID:"); // ?
define("v_adminsmsprofile_licence","Visualiser les termes et conditions de licence:");
define("v_adminsmsprofile_agree","J´approuve");
define("v_adminsmsprofile_notagree","Je désapprouve");
define("v_adminsmsprofile_register","Enregistrer");
define("v_adminsmsprofile_required","Champs requis");
define("v_adminsmsprofile_sign","S´identifier"); // Sign in
define("v_adminsmsprofile_signtext","Veuillez vous identifier si vous disposez déjà d´un compte");
define("v_adminsmsprofile_username","Utilisateur:");
define("v_adminsmsprofile_password","Mot de passe:");
define("v_adminsmsprofile_login","S´identifier"); // Log in
define("v_adminsmsprofile_editaccount","Modifier le compte d´utilisateur");
define("v_adminsmsprofile_save","Enregistrer");
define("v_adminsmsprofile_accountinfo","Informations sur le compte d´utilisateur");
define("v_adminsmsprofile_credit","crédit du SMS:");
define("v_adminsmsprofile_addadmin","Ajouter l´administrateur");
define("v_adminsmsprofile_name","Nom:");
define("v_adminsmsprofile_mobilenr","Numéro de téléphone portable:");
define("v_adminsmsprofile_edit","Modifier");
define("v_adminsmsprofile_add","Ajouter");
define("v_adminsmsprofile_settings","Autres paramètres");
define("v_adminsmsprofile_simulate","Simuler l´envoi du SMS:");
define("v_adminsmsprofile_simulatehint","Permet de tester l´envoi du SMS et visualiser le SMS de test dans l´onlget Historique des SMS.");
define("v_adminsmsprofile_deletedb","Supprimer la base des données:");
define("v_adminsmsprofile_deletedbhint","Permet de décider si garder les paramètres actuels ainsi que la base des données des SMS envoyés en cas de désinstallation du module SMS.");
define("v_adminsmsprofile_report","Accusé de réception­ (DR):");
define("v_adminsmsprofile_reporthint","Visualisera l´accusé de réception dans l´onglet Historique de SMS.");
define("v_adminsmsprofile_lowcredit","Avertissement en cas de crédit insuffisant:");
define("v_adminsmsprofile_lowcredithint","Permet de recevoir un email en cas de crédit insuffisant pour envoyer des SMS.");
define("v_adminsmsprofile_dremail","Email pour les accusés de réception:");
define("v_adminsmsprofile_dremailhint","Permet de recevoir un email avec l´accusé de réception du SMS.");
define("v_adminsmsprofile_admincreated","Administrateur a été créé.");
define("v_adminsmsprofile_agreetext","Confirmez les termes et conditions de licence.");
define("v_adminsmsprofile_accountcreated","L´enregistrement s´est déroulé avec succes. Le mail pour confirmer votre adresse e-mail et pour obtenir cinq crédits gratuitement a été envoyé sur votre boîte mail.");
define("v_adminsmsprofile_addaccounttext","Vous pouvez ajouter un autre compte dans ");
define("v_adminsmsprofile_minutes"," minutes");
define("v_adminsmsprofile_cantconnect","impossible de se connecter au serveur SMS");
define("v_adminsmsprofile_loginok","Vous vous êtes connecté avec succès.");
define("v_adminsmsprofile_error","erreur");
define("v_adminsmsprofile_loginerror","erreur d´authentification­");
define("v_adminsmsprofile_invalidemail","Email invalide pour les accusés de réception­.");
define("v_adminsmsprofile_invalidemail2","E-mail invalide");
define("v_adminsmsprofile_accountchanged", "Le compte a été changé.");
define("v_adminsmsprofile_accountchanged2","Le compte a été changé, mais l´URL de Module pour les accusés de réception ne répond pas."); // ?
define("v_adminsmsprofile_changeaccounttext","Il sera possible de changer le compte dans ");
define("v_adminsmsprofile_seeconds"," secondes");
define("v_adminsmsprofile_invalidname","Nom invalide");
define("v_adminsmsprofile_invalidnumber","Mot de passe invalide");
define("v_adminsmsprofile_adminchanged", "Administrateur a été modifié.");
define("v_adminsmsprofile_admindeleted","Administrateur a été supprimé.");
define("v_adminsmsprofile_nochanges","aucune modification n´a été effectuée");
define("v_adminsmsprofile_confirmdelete","Vous êtes sûr de vouloir supprimer?"); // Are you sure to delete
define("v_adminsmsprofile_deleteadmin","SUPPRIMER l´administrateur");
define("v_adminsmsprofile_editadmin","MODIFIER l´administrateur");
define("v_adminsmsprofile_intformat","dans le format international, sans les zéros ou le symbole +, e.g., 33605612345");
define("v_adminsmsprofile_uninstall","(lors de la désinstallation)");
define("v_adminsmsprofile_noalert","(0 = sans avertissement)");
define("v_adminsmsprofile_filluser","Introduisez le nom d´utilisateur et le mot de passe.");


// CustomerSms.php
define("v_customersms_customersms","SMS client - ");
define("v_customersms_notactive","SMS client - inactif­");
define("v_customersms_default","initial");
define("v_customersms_langversion","version linguistique");
define("v_customersms_description","Choisissez les événements lors desquels le client sera averti par un message SMS et définissez le texte de ces messages. Vous pouvez également créer de différentes versions linguistiques des messages SMS pour de différents pays. Pour les pays avec la version non spécifiée, la version initiale sera employée.");
define("v_customersms_addsms","Ajouter la version lingustique");
define("v_customersms_country","Choisissez le pays: ");
define("v_customersms_unicodesms","Unicode SMS");
define("v_customersms_unicodetext","Cochez seulement si vous souhaitez utiliser dans le message le diacritique ou les langues comme le chinois, l´arabe, le grec, l´hébreu, le coréen etc.,(Unicode permet d´utiliser en même temps de différents fontes et symboles. Le nombre de caractères dans un message Unicode est 70).");
define("v_customersms_orderstatus","État de la commande");
define("v_customersms_smsactive","Envoi de SMS par notification est ACTIF.");
define("v_customersms_smsnotactive","Envoi de SMS par notification est INACTIF. Activez l´envoi de SMS en cochant Actif dans le détail de l´état exigé.");
define("v_customersms_statusupdate"," Mise à jour de l´état de la commande");
define("v_customersms_account","Compte");
define("v_customersms_usernotactive","Le profil d´utilisateur est inactif­! Inscrivez-vous en cliquant sur l´onglet SMS dans le menu principal. Module vous visualisera le formulaire d´inscription.Si vous avez déjà utilisé le module dans le passé et vous connaissez votre nom d´utilisateur et votre mot de passe remplissez donc le formulaire pour le compte existant. Dans le cas contraire entrez votre email, approuvez les termes et conditions de licence et cliquez sur \"S´inscrire\".");
define("v_customersms_invalidtext","Le texte du SMS est invalide");
define("v_customersms_smssaved","Le texte du SMS a été sauvegardé.");
define("v_customersms_smsdeleted","La version linguistique a été supprimée."); // ?
define("v_customersms_confirmdelete","Vous êtes sûr de vouloir supprimer");
define("v_customersms_langdelete","SUPPRIMER la version linguistique");
define("v_customersms_smstext","Le texte du message SMS"); // ?
define("v_customersms_unicode","unicode");
define("v_customersms_versionfor","La version linguistique pour ");
define("v_customersms_wassaved"," a été sauvegardée");
define("v_customersms_preview","Aperçu");
define("v_customersms_active","Actif");
define("v_customersms_save","Sauvegarder");
define("v_customersms_cancel","Annuler");
define("v_customersms_jstotalsms","sms au total:");
define("v_customersms_editlang","MODIFIER la version lingusitique");
define("v_customersms_edit","Modifier");
define("v_customersms_add","Ajouter");
define("v_customersms_order","Commande");
define("v_customersms_jschars","Caractères");
define("v_customersms_unicodesaved","Unicode a été sauvegardé.");
define("v_customersms_restoreunsaved","Remettre des modifications non sauvegardées en état original."); //new

//PayPal.php
define("v_paypal_credit","Acheter du crédit");
define("v_paypal_creditnotactive","Acheter du crédit - inactif­");
define("v_paypal_usernotactive","Profil de l´utilisateur est inactif! Inscrivez-vous en cliquant sur l´onglet SMS dans le menu principal. Module vous visualisera le formulaire d´inscription. Si vous avez déjà utilisé le module dans le passé et vous connaissez votre nom d´utilisateur et votre mot de passe remplissez donc le formulaire pour le compte existant. Dans le cas contraire entrez votre email, approuvez les termes et conditions de licence et cliquez sur \"S´inscrire\".");
define("v_paypal_clickhereif","Si vous ne pouvez pas voir le choix de possibilité pour recharger le crédit, veuillez cliquer ici:"); //new



//SendSms.php
define("v_sendsms_bulksms","Le texte du message SMS collectif"); // ? Bulk SMS text
define("v_sendsms_addrecipients","Ajouter le destinataire  ");
define("v_sendsms_addtext","Ajoutez un ou plusieurs destinataires et séparez-les par virgule. Le numéro doit être dans le format international, sans les zéros ou le symbole + , e.g., 33605612345");
define("v_sendsms_eg"," (e.g.: 33605612345)");
define("v_sendsms_entertext","Entrez le texte du message SMS");
define("v_sendsms_addcsv","Ajouter le destinataire dans le fichier CSV ");
define("v_sendsms_csvtext","fichier CSV - 1 colonne, 1?re colonne - numéro (Le numéro doit être dans le format international, sans les zéros ou le symbole + , e.g., 33605612345)");
define("v_sendsms_unicode"," Unicode ");
define("v_sendsms_unicodetext","Cochez seulement si vous souhaitez utiliser dans le message le diacritiques ou les langues comme le chinois, l´arabe, le grec, l´hébreu, le coréen etc.,(Unicode permet d´utiliser en même temps de différents fontes et symboles. Le nombre de caractères dans un message Unicode est 70).");
define("v_sendsms_time","Votre heure: ");
define("v_sendsms_time2","Heure: ");
define("v_sendsms_timezone","Fuseau horaire: ");
define("v_sendsms_timezone2","Modification du fuseau horaire");
define("v_sendsms_longtext","Le texte est trop long");
define("v_sendsms_sendsms","Envoyer le SMS");
define("v_sendsms_send","Envoyer");
define("v_sendsms_sendtext","Envoi de SMS ou de SMS collectif. Entrez le numéro de téléphone ou enregistrez le fichier CSV."); // ?
define("v_sendsms_smsnotactive","Envoyer le SMS - inactif");
define("v_sendsms_usernotactive","Le profil d´utilisateur est inactif­! Inscrivez-vous en cliquant sur l´onglet SMS dans le menu principal. Module vous visualisera le formulaire d´inscription.Si vous avez déjà utilisé le module dans le passé et vous connaissez votre nom d´utilisateur et votre mot de passe remplissez donc le formulaire pour le compte existant. Dans le cas contraire entrez votre email, approuvez les termes et conditions de licence et cliquez sur \"S´inscrire\".");
define("v_sendsms_fillsms","Entrez le texte du message SMS");
define("v_sendsms_smslong","Le texte du message SMS est trop long (max 612 caractères).");
define("v_sendsms_unicodesmslong","Le texte du message SMS est trop lonog (max 268 caractères unicode).");
define("v_sendsms_wrongtime","Mauvais temps de l´envoi du SMS."); // ? Wrong time of SMS sending
define("v_sendsms_norecipients","Clients trouvés: 0");
define("v_sendsms_lowcreditall","Crédit insuffisant pour envoyer le message SMS à tous ");
define("v_sendsms_recipients"," les destinataires.");
define("v_sendsms_smssent","Le message SMS a été envoyé.");
define("v_sendsms_smssaved","Le message SMS a été sauvegardé.");
define("v_sendsms_wrongnumber","mauvais numéro ou numéro inaccessible");
define("v_sendsms_unauthorized","ID de l´expéditeur non autorisé dans le SMS de confirmation"); // ? unauthorized senderID in confirmation sms
define("v_sendsms_lowcredit","Crédit insuffisant pour envoyer le message SMS");
define("v_sendsms_nounicode","unicode n´est pas favorisé");
define("v_sendsms_loginerror","erreur d´authentification");
define("v_sendsms_cantconnect","impossible de se connecter au serveur SMS");
define("v_sendsms_simulation","SIMULATION de SMS (L´envoi de SMS a été simulé. Le destinataire ne recevra pas le message SMS.)");
define("v_sendsms_simulationconfirm","Le SMS a été envoyé (simulation).");
define("v_sendsms_error","erreur");
define("v_sendsms_sendlater"," Envoyer plus tard ");
define("v_sendsms_jschars","Caractères: ");
define("v_sendsms_hr","1h");
define("v_sendsms_date","Date: ");

// SmsAnswers.php
define("v_smsanswers_smsanswers","Réponse SMS");
define("v_smsanswers_description","Réponse SMS de la part du client est visualisée seulement si le client de votre magasin reçoit un SMS avec le type de l´expéditeur \"numéro de système\" et répond depuis le même numéro de téléphone");
define("v_smsanswers_show","Visualiser");
define("v_smsanswers_results","Résultats de la recherche­ "); // Search results
define("v_smsanswers_of"," de ");
define("v_smsanswers_smscenter","centre de SMS");
define("v_smsanswers_date","Date");
define("v_smsanswers_number","Depuis le numéro");
define("v_smsanswers_new","nouveau");
define("v_smsanswers_previous","Précédent­");
define("v_smsanswers_next","Suivant");
define("v_smsanswers_page"," Page: ");
define("v_smsanswers_smsnotactive","Réponses de SMS - inactif");
define("v_smsanswers_usernotactive","Le profil d´utilisateur est inactif! Inscrivez-vous en cliquant sur l´onglet SMS dans le menu principal. Module vous visualisera le formulaire d´inscription. Si vous avez déjà utilisé le module dans le passé et vous connaissez votre nom d´utilisateur et votre mot de passe remplissez donc le formulaire pour le compte existant. Dans le cas contraire entrez votre email, approuvez les termes et conditions de licence et cliquez sur \"S´inscrire\".");
define("v_smsanswers_year","année");
define("v_smsanswers_month","mois");
define("v_smsanswers_sms","SMS");
define("v_smsanswers_text","Texte:");
define("v_smsanswers_nosms","SMS réponses au total: 0");

// SmsHistory.php
define("v_smshistory_sent","ENVOYÉ au destinataire");
define("v_smshistory_error","ERREUR");
define("v_smshistory_delivered","DÉLIVRÉ au destinataire");
define("v_smshistory_buffered","DESTINATAIRE INACCESSIBLE"); // new
define("v_smshistory_smshistory","Historique de SMS");
define("v_smshistory_description","Historique des messages SMS envoyés depuis le SMS module.");
//define("v_smshistory_status","état");
define("v_smshistory_adminsms"," sms admin");
define("v_smshistory_customersms"," sms client");
define("v_smshistory_marketingsms"," sms marketing"); // sms marketing?
define("v_smshistory_simplesms"," sms simple"); // sms ?
define("v_smshistory_show","Visualiser");
define("v_smshistory_results","Résultats de la recherche");
define("v_smshistory_of"," de ");
define("v_smshistory_type","Type");
define("v_smshistory_date","Date");
define("v_smshistory_subject","Sujet de SMS");
define("v_smshistory_nubmer","Numéro");
define("v_smshistory_yes","oui");
define("v_smshistory_no","non");
define("v_smshistory_sysnumber","numéro de système");
define("v_smshistory_balance","État du compte:"); // Credit balance
define("v_smshistory_customerdetail","Visualiser le détail du client");
define("v_smshistory_smstext","Texte:");
define("v_smshistory_totalsms","SMS au total:");
define("v_smshistory_smsnotactive","Historique de SMS - inactif");
define("v_smshistory_usernotactive","Le profil d´utilisateur est inactif­! Inscrivez-vous en cliquant sur l´onglet SMS dans le menu principal. Module vous visualisera le formulaire d´inscription.Si vous avez déjà utilisé le module dans le passé et vous connaissez votre nom d´utilisateur et votre mot de passe remplissez donc le formulaire pour le compte existant. Dans le cas contraire entrez votre email, approuvez les termes et conditions de licence et cliquez sur \"S´inscrire\".");
define("v_smshistory_price","Prix en crédits:");
define("v_smshistory_year","année");
define("v_smshistory_month","mois");
define("v_smshistory_status","État");
define("v_smshistory_recipient","Destinataire");
define("v_smshistory_unicode","Unicode:");
define("v_smshistory_senderid","Sender ID l´expéditeur:"); // senderID
define("v_smshistory_previous","Précédent­");
define("v_smshistory_next","Suivant");
define("v_smshistory_page"," Page: ");
define("v_smshistory_nosms","SMS au total: 0");
define("v_smshistory_sms","SMS");

// SmsMarketing.php
define("v_smsmarketing_smsbulk","SMS Marketing - texte du message SMS collectif");
define("v_smsmarketing_entertext","Entrez le texte du message SMS");
define("v_smsmarketing_unicode"," Unicode ");
define("v_smsmarketing_unicodetext","Cochez seulement si vous souhaitez utiliser dans le message le diacritiques ou les langues comme le chinois, l´arabe, le grec, l´hébreu, le coréen etc.,(Unicode permet d´utiliser en même temps de différents fontes et symboles. Le nombre de caractères dans un message Unicode est 70).");
define("v_smsmarketing_sendlater"," Envoyer plus tard ");
define("v_smsmarketing_yourtime","Votre temps: ");
define("v_smsmarketing_jstotalcustomers","Clients au total:");
define("v_smsmarketing_jstotalsms","SMS au total:");
define("v_smsmarketing_bulkfilter","SMS Marketing - filtre des SMS collectifs");
define("v_smsmarketing_allcustomers","Tous les clients");
define("v_smsmarketing_companycustomers","Clientèle de société");
define("v_smsmarketing_privatecustomers","Personnes privées");
define("v_smsmarketing_allcountries","Tous les pays");
define("v_smsmarketing_lastname","Nom de famille­:");
define("v_smsmarketing_firstname","Prénom:");
define("v_smsmarketing_lastname2","Nom de famille");
define("v_smsmarketing_firstname2","Prénom");
define("v_smsmarketing_groups","Groupes:");
define("v_smsmarketing_all","Tous");
define("v_smsmarketing_gender","Sexe­:");
define("v_smsmarketing_male","Homme");
define("v_smsmarketing_female","Femme");
define("v_smsmarketing_news","Bulletin:"); // ? Newsletter
define("v_smsmarketing_yes","Oui");
define("v_smsmarketing_no","Non");
define("v_smsmarketing_applyfilter","Appliquer le filtre");
define("v_smsmarketing_birthfrom","Date de naissance de: ");
define("v_smsmarketing_birthto","à: ");
define("v_smsmarketing_registerfrom","Date d´inscription de: ");
define("v_smsmarketing_customersfound","Clients trouvés: ");
define("v_smsmarketing_results","visualisé");
define("v_smsmarketing_action","Action");
define("v_smsmarketing_mobilenr","Téléphone"); // ? Mobile number
define("v_smsmarketing_customerid","Numéro de client");
define("v_smsmarketing_removecustomer","SUPPRIMER le client de la liste");
define("v_smsmarketing_next","Suivant");
define("v_smsmarketing_previous","Précédent");
define("v_smsmarketing_page"," Page: ");
define("v_smsmarketing_smsmarketingfound","SMS Marketing - clients trouvés: ");
define("v_smsmarketing_description","Entrez le texte du message SMS et employez des filtres avancés pour viser votre campagne publicitaire.");
define("v_smsmarketing_smsmarketing","SMS Marketing");
define("v_smsmarketing_smsnotactive","SMS Marketing - inactif­");
define("v_smsmarketing_usernotactive","Le profil d´utilisateur n´est pas actif! Inscrivez-vous en cliquant sur l´onglet SMS dans le menu principal. Module vous visualisera le formulaire d´inscription.Si vous avez déjà utilisé le module dans le passé et vous connaissez votre nom d´utilisateur et votre mot de passe remplissez donc le formulaire pour le compte existant. Dans le cas contraire entrez votre email, approuvez les termes et conditions de licence et cliquez sur \"S´inscrire\".");
define("v_smsmarketing_fillsms","Entrezle texte du message SMS.");
define("v_smsmarketing_smslong","Le texte du message SMS est trop long˝ (max 612 caractères).");
define("v_smsmarketing_unicodesmslong","Le texte du message SMS est trop long˝ (max 268 caractères unicode).");
define("v_smsmarketing_nocustomers","Clients trouvés: 0");
define("v_smsmarketing_wrongtime","Mauvais temps de l´envoi du­ SMS.");
define("v_smsmarketing_lowcreditall","Crédit insuffisant pour envoyer le message SMS à tous ");
define("v_smsmarketing_customers"," les clients.");
define("v_smsmarketing_smssent","Le message SMS a été envoyé.");
define("v_smsmarketing_smssaved","Le message SMS a été sauvegardé.");
define("v_smsmarketing_wrongnr","Mauvais numéro ou numéro inaccessible");
define("v_smsmarketing_unauthorized","ID de l´expéditeur non autorisé dans le SMS de confirmation"); // ? unauthorized senderID in confirmation sms
define("v_smsmarketing_lowcredit","crédit insuffisant pour envoyer le message SMS");
define("v_smsmarketing_nounicode","unicode n´est pas favorisé");
define("v_smsmarketing_cantconnect","impossible de se connecter au serveur SMS");
define("v_smsmarketing_simulation","SIMULATION de SMS  (L´envoi du SMS a été simulé. Le destinataire ne recevra pas le message SMS.)");
define("v_smsmarketing_simulationconfirm","SMS a été envoyé (simulation).");
define("v_smsmarketing_error","erreur");
define("v_smsmarketing_loginerror","erreur d´authentification­");
define("v_smsmarketing_date","Date:");
define("v_smsmarketing_time","Heure: ");
define("v_smsmarketing_hr","1h");
define("v_smsmarketing_timezone","fuseau horaire: ");
define("v_smsmarketing_timezone2","modification du fuseau horaire");
define("v_smsmarketing_send","Envoyer");
define("v_smsmarketing_jschars","Caractères: ");
define("v_smsmarketing_longtext","Le texte est trop long");
define("v_smsmarketing_typ","Type:");
define("v_smsmarketing_country","Pays:");
define("v_smsmarketing_city","Ville:");
define("v_smsmarketing_advert","Publicité:"); // ? Advert
define("v_smsmarketing_store","Magasin:"); //new
define("v_smsmarketing_allstores","Tous les magasins"); //new


// smsprestashop.php
define("v_smsprestashop_prestashop","Presta SMS");
define("v_smsprestashop_description","presta-sms.com - envoyer des message SMS depuis votre Prestashop!");
define("v_smsprestashop_admin","Admin SMS"); // ?
define("v_smsprestashop_customer","SMS client");
define("v_smsprestashop_settings","Paramètres de SMS"); // ? SMS Settings
define("v_smsprestashop_history","Historique de SMS");
define("v_smsprestashop_credit","Acheter du crédit");
define("v_smsprestashop_marketing","SMS marketing");
define("v_smsprestashop_answers","Réponses de SMS"); // ? SMS Answers
define("v_smsprestashop_send","Envoyer SMS");
define("v_smsprestashop_about","Le module");
define("v_smsprestashop_wrongnr","Mauvais numéro ou numéro inaccesible");
define("v_smsprestashop_unauthorized","ID de l´expéditeur non autorisé dans le SMS de confirmation");
define("v_smsprestashop_lowcredit","crédit insuffisant pour envoyer le message SMS");
define("v_smsprestashop_nounicode","unicode n´est pas favorisé");
define("v_smsprestashop_loginerror","erreur d´authentifiaction­");
define("v_smsprestashop_cantconnect","crédit insuffisant pour envoyer le message SMS");
define("v_smsprestashop_simulation","SIMULATION de SMS (L´envoi du SMS a été simulé. Le destinataire ne recevra pas le SMS.)");
define("v_smsprestashop_nrunknown","numéro inconnu");
define("v_smsprestashop_notconnected","non connecté au serveur SMS");
define("v_smsprestashop_sqlinfo1","Nouvelle commande");
define("v_smsprestashop_sqltemplate1","Nouvelle commande du {customer_firstname} {customer_lastname}, client: {customer_id}, commande: {order_id}, paiement: {order_payment}, somme: {order_total_paid} {order_currency}. Commande: {order_products2}. Info provenant de {shop_name}.");
define("v_smsprestashop_sqltemplate21","Votre commande {order_id} a été créée avec succès, paiement: {order_payment}, somme: {order_total_paid} {order_currency}. Bonne journée, {shop_name}.");
define("v_smsprestashop_notice","Paramètres possibles:"); // ? Possible variables
define("v_smsprestashop_sqlinfo2","Compte client a été créé avec succès"); // ? Successful customer create account
define("v_smsprestashop_sqltemplate2","Client  {customer_firstname} {customer_lastname}, id: {customer_id}, vient de s´inscrire chez {shop_name}.");
define("v_smsprestashop_sqltemplate22","Cher(e) {customer_firstname} {customer_lastname}, votre compte chez {shop_name} a été créé avec succès. Nom d´utilisateur: {customer_email}. Bonne journée!");
define("v_smsprestashop_sqlinfo3","Article retourné");
define("v_smsprestashop_sqltemplate3","Client {customer_firstname} {customer_lastname}, id: {customer_id}, a retourné l´article de la commande {order_id}. Commande: {orderReturn2}. Message du client: {customer_question}. Info provenant de {shop_name}."); // ???
define("v_smsprestashop_sqltemplate23","Nous avons reçu votre demande. Commande {order_id}. Bonne journée, {shop_name}.");
define("v_smsprestashop_sqlinfo4","Avis si la quantité d´un article commandé change."); // ? Called when a quantity of one product change in an order
define("v_smsprestashop_sqltemplate4","Dans la commande {order_id} la quantité a changé, {orderSlip2}. Info provenant de {shop_name}."); // ?
define("v_smsprestashop_sqltemplate24","Dans votre commande numéro {order_id} la quantité a été modifiée, {orderSlip2}. Bonne journée, {shop_name}.");
define("v_smsprestashop_sqlinfo5","Confirmation de paiement");
define("v_smsprestashop_sqltemplate5","Confirmation de paiement, numéro de la commande.: {order_id}, paiement: {order_payment},  somme: {order_total_paid} {order_currency}. Info provenant de {shop_name}.");
define("v_smsprestashop_sqltemplate25","Nous avons reçu le paiement de votre commande {order_id} via {order_payment},  somme: {order_total_paid} {order_currency}. Bonne journée, {shop_name}.");
define("v_smsprestashop_sqlinfo62","Mise à jour de la commande - transporteur a attribué le numéro de la commande");  //new
define("v_smsprestashop_sqltemplate62","La commande numéro. {order_id} a été mise à jour avec le numéro de la commande  {order_shipping_number} attribué par le transporteur. Info provenant de {shop_name}."); //new
define("v_smsprestashop_sqltemplate262","Cher client, l´article de votre commande numéro {order_id} a été envoyé, le numéro de la commande attribué par le transporteur est {order_shipping_number}. Bonne journée, {shop_name}."); //new
define("v_smsprestashop_sqlinfo7","L´article a été supprimé de la base des données"); // ? Called when a product is deleted
define("v_smsprestashop_sqltemplate7","Cet article a été supprimé de {shop_name}, id: {product_id}, ref: {product_ref}, nom: {product_name}.  Supprimé par l´utilisateur: {employee_id}, {employee_email}.");
define("v_smsprestashop_sqlinfo8","La quantité est mise à jour seulement si le client crée la commande avec succès"); // ? ...effectively place his order
define("v_smsprestashop_sqltemplate8","La quantité de l´article a été modifiée, id: {product_id}, ref: {product_ref}, nom: {product_name}, nouvelle quantité: {product_quantity}, fournisseur: {product_supplier}. Info provenant de {shop_name}.");
define("v_smsprestashop_sqlinfo9","L´article n´est pas disponible en stock");
define("v_smsprestashop_sqltemplate9","Dernières pièces en stock, id: {product_id}, ref: {product_ref}, nom: {product_name}, quantité: {product_quantity}. Info provenant de {shop_name}.");
define("v_smsprestashop_sqlinfo10","Avis si l´administrateur ou le client annule l´article dans la commande");
define("v_smsprestashop_sqltemplate10","Dans la commande {order_id} l´article avec l´id {product_id} a été annulé: {product_id}, ref: {product_ref}, nom: {product_name}. quantité: {product_quantity}, la quantité annulée: {product_quantity_reinjected}. Info provenant de {shop_name}."); // ? quantity reinjected
define("v_smsprestashop_sqltemplate11","État de la commande {order_id} a changé en ");
define("v_smsprestashop_sqltemplate111",". Info provenant de {shop_name}.");
define("v_smsprestashop_sqltemplate211","Cher client, état de votre commande {order_id} a changé en ");
define("v_smsprestashop_sqltemplate2111",". Bonne journée, {shop_name}.");
define("v_smsprestashop_bankwire","Virement bancaire");
define("v_smsprestashop_company","Nom de la société");
define("v_smsprestashop_country","Pays›");
define("v_smsprestashop_city","Ville");
define("v_smsprestashop_qty","quantité");
define("v_smsprestashop_qtyreinjected","quantité supprimée");  //sans diacritique // ? qty reinjected
define("v_smsprestashop_qtyreturned","quantité retournée"); //sans diacritique
define("v_smsprestashop_name","nom"); //sans diacritique
define("v_smsprestashop_notfound","non trouvé"); //new


// SmsWizard.php
define("v_smswizard_ownsettings","Paramètres­ de SMS - Choisissez le Sender ID de l´expéditeur pour ");
define("v_smswizard_ownnrsettings","Paramètres­ du Sender ID de l´expéditeur ");
define("v_smswizard_ownnrid","Sender ID de l´expéditeur ");
define("v_smswizard_existingown","le Sender ID déjà existant:");
define("v_smswizard_newownnrid","Nouveau Sender ID de l´expéditeur :");
define("v_smswizard_intformat","dans le format international,<br />sans les zéros ou le symbole +, e.g., 33605612345");
define("v_smswizard_smscode","code de SMS:");
define("v_smswizard_confirm","CONFIRMER");
define("v_smswizard_required","Champs obligatoire");
define("v_smswizard_textsettings","Paramètres de SMS - Choisissez le Sender ID de l´expéditeur pour ");
define("v_smswizard_senderidsettings","Paramètres du Sender ID de l´expéditeur");
define("v_smswizard_existingsid","Sender ID de l´expéditeur existant:");
define("v_smswizard_newsid","Nouveau Sender ID de l´expéditeur:");
define("v_smswizard_maxchars","max 11 caractères");
define("v_smswizard_smssettings","Paramètres de SMS");
define("v_smswizard_description","Définissez le type de l´expéditeur pour chaque pays. (Sender ID, numéro de téléphone mobile ou le numéro de système). Le prix du SMS dépend du pays destinataire, par choix du type de l´expéditeur et de votre paiement. Pour les pays avec le type de l´expéditeur non spécifié, le numéro de système sera employé.");
define("v_smswizard_customersettings","Paramètres de SMS clients");
define("v_smswizard_addcountry","AJOUTER/MODIFIER LE PAYS CHOISI");
define("v_smswizard_sendertype","TYPE DU SENDER ID DE L´EXPÉDITEUR");
define("v_smswizard_network","RÉSEAU");
define("v_smswizard_smsprice","PRIX EN CRÉDITS");
define("v_smswizard_price","PRIX DU SMS EN EUR (sans TVA)");
define("v_smswizard_payment","paiement");
define("v_smswizard_unicode","Unicode ");
define("v_smswizard_unicodetext","Soutien au codage des caractères Unicode (Unicode permet d´utiliser en même temps des fontes, symboles et diacritiques différents. Il est utilisé pour les langues comme le chinois, l´arabe, le grec, l´hébreu, le coréen etc.)");
define("v_smswizard_textsid","LE SENDER ID DE L´EXPÉDITEUR");
define("v_smswizard_textsid2","Le Sender ID de l´expéditeur");
define("v_smswizard_systemnr","NUMÉRO DE SYSTEME");
define("v_smswizard_ownnrsid","NUMÉRO DE L´EXPÉDITEUR");
define("v_smswizard_simhosting","SIM HOSTING");
define("v_smswizard_unicodesupported","UNICODE FAVORISÉ");
define("v_smswizard_nounicode","UNICODE NON FAVORISÉ");
define("v_smswizard_savesettings","SAUVEGARDER LES PARAMETRES DE SMS");
define("v_smswizard_suredelete","Vous êtes sûr de vouloir supprimer");
define("v_smswizard_country","Choisissez le pays: ");
define("v_smswizard_notactive","Paramètres de SMS - inactif­");
define("v_smswizard_usernotactive","Le profil d´utilisateur est inactif! Inscrivez-vous en cliquant sur l´onglet SMS dans le menu principal. Module vous visualisera le formulaire d´inscription.Si vous avez déjà utilisé le module dans le passé et vous connaissez votre nom d´utilisateur et votre mot de passe remplissez donc le formulaire pour le compte existant. Dans le cas contraire entrez votre email, approuvez les termes et conditions de licence et cliquez sur \"S´inscrire\".");
define("v_smswizard_error","erreur");
define("v_smswizard_cantconnect","impossible de se connecter au serveur SMS");
define("v_smswizard_deleted"," il a été supprimé."); 
define("v_smswizard_choosesender","choisissez le type du Sender ID l´expéditeur");
define("v_smswizard_countrysaved"," il a été sauvegardé."); 
define("v_smswizard_fillsid","entrez le Sender ID de l´expéditeur"); 
define("v_smswizard_mustbenumber","Le Sender ID de l´expéditeur doit être un numéro");
define("v_smswizard_confirmcode","confirmez le code de sms"); 
define("v_smswizard_ownsidfor","Le Sender ID de l´expéditeur pour ");
define("v_smswizard_wassaved"," a été sauvegardé.");
define("v_smswizard_error2","erreur - ");
define("v_smswizard_loginerror","erreur d´authentification");
define("v_smswizard_retypecode","Réécrivez le code de sms.");
define("v_smswizard_retypecode2","Réécrivez le code de sms. Le message SMS sera envoyé en une minute.");
define("v_smswizard_wrongnrerror","erreur - mauvais numéro ou numéro inaccessible");
define("v_smswizard_unauthorizederror","erreur - ID de l´expéditeur non autorisé dans le SMS de confirmation");
define("v_smswizard_lowcrediterror","erreur - crédit insuffisant pour envoyer le message SMS");
define("v_smswizard_filltextsid","Entrez le Sender ID de l´expéditeur");
define("v_smswizard_filltextsid2","Entrez le Sender ID de l´expéditeur, de 3 à 11 caractères");
define("v_smswizard_chars","caractères autorisés: ");
define("v_smswizard_nonumber","le Sender ID de l´expéditeur ne dois pas être un numéro");
define("v_smswizard_textsidfor","le Sender ID de l´expéditeur pour ");
define("v_smswizard_adminsettings","Paramètres­ de SMS Admin");
define("v_smswizard_validate","VALIDER"); //new
define("v_smswizard_smsvalidation","validation de SMS"); //new
define("v_smswizard_confirmationcode","Code: "); //new, sans diacritique, utilisé dans le sms
define("v_smswizard_updatepricelist","Mise à jour du prix"); //new
define("v_smswizard_eg","e.g.:"); //new
define("v_smswizard_pricelistupdated","Le tarif a été mis à jour."); //new
define("v_smswizard_edit","ajuster"); //new
define("v_smswizard_delete","supprimer"); //new





//new
define("v_smsprestashop_smscharging_fieldset","Vos boutiques en ligne");
define("v_smsprestashop_smscharging","SMS opt-out");
define("v_smsprestashop_smscharging_h2","SMS opt-out - ajustement de l´annulation de SMS avertissement dans le panier et tarification de SMS");
define("v_smsprestashop_smscharging_description","Choisissez la boutique en ligne pour laquelle vous désirez ajuster que le client ait la possibilité d´annuler le SMS avertissement dans le panier, ajustez le prix de SMS et définissez le texte que le client verra dans le panier.");
define("v_adminsmsprofile_prefer","Pour envoyer des SMS favorisez le numéro de téléphone de:");
define("v_adminsmsprofile_preferinvoice","adresses de facturation");
define("v_adminsmsprofile_preferdeliver","adresses de livraison");
define("v_smsprestashop_smscharging_price","Prix de SMS");
define("v_smsprestashop_smscharging_texts","Texte visualisé dans la panier");
define("v_smsprestashop_smscharging_active","Activez la visualisation de la fonction SMS opt-out dans le panier");
define("v_smsprestashop_smscharging_optoutactive","SMS opt-out est ACTIF");
define("v_smsprestashop_smscharging_optoutnotactive","SMS opt-out est INACTIF. Activez le SMS opt-out en cochant „Activer la visualisation de la fonction SMS opt-out dans le panier.“");
define("v_smsprestashop_smscharging_saved","Ajustement de la fonction SMS opt-out a été changé avec succès");
define("v_smswizard_pricelistupdated_changed","Changement du prix de SMS pour les pays suivants:");
define("v_smsprestashop_newversion","Nouvelle version disponible:");

define("v_about_manual_text","Mode d´emploi pour le SMS module (anglais):");
define("v_about_manual_url","www.presta-sms.com/manual.html");
define("v_about_supported_text","Versions soutenues de PrestaShop:");
define("v_about_supported_text_ps","1.5.x");


define("v_contact_form","Formulaire de contact");

define("v_remove_duplicate","Suppression des doublons de numéros");

define("v_registration_type","Type d'inscription:");
define("v_registration_type_personal","Personnel");
define("v_registration_type_business","Entreprise");
define("v_registration_address","Adresse");
define("v_registration_billing_information","Informations de facturation");
define("v_registration_personal_contact","Personne à contacter");

define("v_registration_company_name","Entrez le nom de la société.");
define("v_registration_vat_invalid","TVA invalide");




//stats new
define("v_statistics","Statistiques");
define("v_statistics_smsnotactive","Statistiques - pas actif");
define("v_statistics_day","jour");
define("v_statistics_datefrom","Date de:");
define("v_statistics_dateto","à:");

// filter
define("v_filter_deleted_customers", "Clients supprimé: ");
define("v_filter_more", "Plus...");
define("v_filter_load", "Filtres enregistrés");
define("v_filter_save", "Enregistrer le filtre");
define("v_filter_clear", "Reset filter");
define("v_filter_name", "Nom du filtre");
define("v_filter_date", "Date");
define("v_filter_been_apply", "Filtre a été appliqué.");
define("v_filter_been_saved", "Filtre a été enregistré.");
define("v_filter_been_clear", "Filtre a été réinitialisé.");
define("v_filter_q_clear", "Etes-vous sur de vouloir réinitialiser le filtre?");
define("v_filter_q_delete", "Etes-vous sur que vous voulez supprimer le filtre?");
define("v_filter_not_found", "Le filtre n'a pas été trouvé.");
define("v_send_busy", "Traitement...");

// Template
define("v_template_load", "Templates enregistrés");
define("v_template_save", "Enregistrer le template");
define("v_template_name", "Nom template");
define("v_template_been_apply", "Le template a été chargé.");
define("v_template_been_saved", "Le template a été enregistré.");
define("v_template_q_delete", "Etes-vous sur de vouloir supprimer le template?");
define("v_template_not_found", "Template introuvable.");
define("v_show_virtual", "Opérateurs virtuels (MVNO)");

// Marketing
define("v_marketing_coupon", "Sélectionner un bon de réduction");
define("v_marketing_coupon_create", "Créez un bon de réduction");
define("v_marketing_none", "Sélectionner");
define("v_smshistory_simulation", "SIMULATION");
define("v_smshistory_deleted", "SUPPRIMER");
define("v_smshistory_sheduled", "PRÉVUE");
define("v_smshistory_duplicate", "DUPLICATA");
define("v_smshistory_dnd", "DO NOT DISTURB registre (DND)");
define("v_sendsms_addcsv_vcard","Ajouter le destinataire dans le fichier CSV (.csv, .txt) ou vCard (.vcf)");

// Hooks v2
define("v_hook_return", "Retours");
define("v_hook_return_customer", "Accusé de réception de la plainte.");
define("v_hook_return_admin", "Nouveau retour reçu.");
define("v_smsprestashop_return_status_admin","État de la retour {return_id} a changé en ");
define("v_smsprestashop_return_status_admin2",". Info provenant de {shop_name}.");
define("v_smsprestashop_return_status_customer","Cher client, état de votre retoure {return_id} a changé en ");
define("v_smsprestashop_return_status_customer2",". Info provenant de {shop_name}.");

// OptOut
define("v_optout_auto_variable", "Ajouter le SMS produit au panier:");
define("v_optout_auto", "Automatique");
define("v_optout_manual", "Manuellement");

// ZenCart
define("v_about_version_zen","Zen SMS module, version ");
define("v_about_supported_text_zen","Versions soutenues de ZenCart:");
define("v_about_supported_version_zen","1.3.x. - 1.5.x");
define("v_about_manual_url_zen","www.zen-sms.net/manual.html");
define("v_about_website_name_zen","www.zen-sms.net");
define("v_about_website_url_zen","www.zen-sms.net/fr/index.html");

define("v_smsprestashop_sqltemplate1_zen","Nouvelle commande du {customer_firstname} {customer_lastname}, client: {customer_id}, commande: {order_id}, paiement: {order_payment}, somme: {order_total_paid} {order_currency}. Commande: {order_products2}. Info provenant de {shop_name}.");
define("v_smsprestashop_sqltemplate21_zen","Votre commande {order_id} a été créée avec succès, paiement: {order_payment}, somme: {order_total_paid} {order_currency}. Bonne journée, {shop_name}.");
define("v_smsprestashop_sqltemplate2_zen","Client  {customer_firstname} {customer_lastname}, id: {customer_id}, vient de s´inscrire chez {shop_name}.");
define("v_smsprestashop_sqltemplate22_zen","Cher(e) {customer_firstname} {customer_lastname}, votre compte chez {shop_name} a été créé avec succès. Nom d´utilisateur: {customer_email}. Bonne journée!");
define("v_smsprestashop_sqltemplate3_zen","Client {customer_firstname} {customer_lastname}, id: {customer_id}, a retourné l´article de la commande {order_id}. Commande: {orderReturn2}. Message du client: {customer_question}. Info provenant de {shop_name}."); // ???
define("v_smsprestashop_sqltemplate23_zen","Nous avons reçu votre demande. Commande {order_id}. Bonne journée, {shop_name}.");
define("v_smsprestashop_sqltemplate4_zen","Dans la commande {order_id} la quantité a changé, {orderSlip2}. Info provenant de {shop_name}."); // ?
define("v_smsprestashop_sqltemplate24_zen","Dans votre commande numéro {order_id} la quantité a été modifiée, {orderSlip2}. Bonne journée, {shop_name}.");
define("v_smsprestashop_sqltemplate5_zen","Confirmation de paiement, numéro de la commande.: {order_id}, paiement: {order_payment},  somme: {order_total_paid} {order_currency}. Info provenant de {shop_name}.");
define("v_smsprestashop_sqltemplate25_zen","Nous avons reçu le paiement de votre commande {order_id} via {order_payment},  somme: {order_total_paid} {order_currency}. Bonne journée, {shop_name}.");
define("v_smsprestashop_sqltemplate62_zen","La commande numéro. {order_id} a été mise à jour avec le numéro de la commande  {order_shipping_number} attribué par le transporteur. Info provenant de {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_zen","Cher client, l´article de votre commande numéro {order_id} a été envoyé, le numéro de la commande attribué par le transporteur est {order_shipping_number}. Bonne journée, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_zen","Cet article a été supprimé de {shop_name}, id: {product_id}, ref: {product_ref}, nom: {product_name}.  Supprimé par l´utilisateur: {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_zen","La quantité de l´article a été modifiée, id: {product_id}, ref: {product_ref}, nom: {product_name}, nouvelle quantité: {product_quantity}, fournisseur: {product_supplier}. Info provenant de {shop_name}.");
define("v_smsprestashop_sqltemplate9_zen","Dernières pièces en stock, id: {product_id}, ref: {product_ref}, nom: {product_name}, quantité: {product_quantity}. Info provenant de {shop_name}.");
define("v_smsprestashop_sqltemplate10_zen","Dans la commande {order_id} l´article avec l´id {product_id} a été annulé: {product_id}, ref: {product_ref}, nom: {product_name}. quantité: {product_quantity}, la quantité annulée: {product_quantity_reinjected}. Info provenant de {shop_name}."); // ? quantity reinjected
define("v_smsprestashop_sqltemplate11_zen","État de la commande {order_id} a changé en ");
define("v_smsprestashop_sqltemplate111_zen",". Info provenant de {shop_name}.");
define("v_smsprestashop_sqltemplate211_zen","Cher client, état de votre commande {order_id} a changé en ");
define("v_smsprestashop_sqltemplate2111_zen",". Bonne journée, {shop_name}.");








// OpenCart
define("v_about_version_oc","Cart SMS module, version ");
define("v_about_supported_text_oc","Versions soutenues de OpenCart:");
define("v_about_supported_version_oc","1.4.7 - 1.5.6.1");
define("v_about_manual_url_oc","www.cart-sms.com/manual.html");
define("v_about_website_name_oc","www.cart-sms.com");
define("v_about_website_url_oc","www.cart-sms.com/fr/index.html");

define("v_smsprestashop_sqltemplate1_oc","Nouvelle commande du {customer_firstname} {customer_lastname}, client: {customer_id}, commande: {order_id}, paiement: {order_payment}, somme: {order_total_paid} {order_currency}. Commande: {order_products2}. Info provenant de {shop_name}.");
define("v_smsprestashop_sqltemplate21_oc","Votre commande {order_id} a été créée avec succès, paiement: {order_payment}, somme: {order_total_paid} {order_currency}. Bonne journée, {shop_name}.");
define("v_smsprestashop_sqltemplate2_oc","Client  {customer_firstname} {customer_lastname}, id: {customer_id}, vient de s´inscrire chez {shop_name}.");
define("v_smsprestashop_sqltemplate22_oc","Cher(e) {customer_firstname} {customer_lastname}, votre compte chez {shop_name} a été créé avec succès. Nom d´utilisateur: {customer_email}. Bonne journée!");
define("v_smsprestashop_sqltemplate3_oc","Client {customer_firstname} {customer_lastname}, id: {customer_id}, a retourné l´article de la commande {order_id}. Commande: {orderReturn2}. Message du client: {customer_question}. Info provenant de {shop_name}."); // ???
define("v_smsprestashop_sqltemplate23_oc","Nous avons reçu votre demande. Commande {order_id}. Bonne journée, {shop_name}.");
define("v_smsprestashop_sqltemplate4_oc","Dans la commande {order_id} la quantité a changé, {orderSlip2}. Info provenant de {shop_name}."); // ?
define("v_smsprestashop_sqltemplate24_oc","Dans votre commande numéro {order_id} la quantité a été modifiée, {orderSlip2}. Bonne journée, {shop_name}.");
define("v_smsprestashop_sqltemplate5_oc","Confirmation de paiement, numéro de la commande.: {order_id}, paiement: {order_payment},  somme: {order_total_paid} {order_currency}. Info provenant de {shop_name}.");
define("v_smsprestashop_sqltemplate25_oc","Nous avons reçu le paiement de votre commande {order_id} via {order_payment},  somme: {order_total_paid} {order_currency}. Bonne journée, {shop_name}.");
define("v_smsprestashop_sqltemplate62_oc","La commande numéro. {order_id} a été mise à jour avec le numéro de la commande  {order_shipping_number} attribué par le transporteur. Info provenant de {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_oc","Cher client, l´article de votre commande numéro {order_id} a été envoyé, le numéro de la commande attribué par le transporteur est {order_shipping_number}. Bonne journée, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_oc","Cet article a été supprimé de {shop_name}, id: {product_id}, ref: {product_ref}, nom: {product_name}.  Supprimé par l´utilisateur: {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_oc","La quantité de l´article a été modifiée, id: {product_id}, ref: {product_ref}, nom: {product_name}, nouvelle quantité: {product_quantity}, fournisseur: {product_supplier}. Info provenant de {shop_name}.");
define("v_smsprestashop_sqltemplate9_oc","Dernières pièces en stock, id: {product_id}, ref: {product_ref}, nom: {product_name}, quantité: {product_quantity}. Info provenant de {shop_name}.");
define("v_smsprestashop_sqltemplate10_oc","Dans la commande {order_id} l´article avec l´id {product_id} a été annulé: {product_id}, ref: {product_ref}, nom: {product_name}. quantité: {product_quantity}, la quantité annulée: {product_quantity_reinjected}. Info provenant de {shop_name}."); // ? quantity reinjected
define("v_smsprestashop_sqltemplate11_oc","État de la commande {order_id} a changé en ");
define("v_smsprestashop_sqltemplate111_oc",". Info provenant de {shop_name}.");
define("v_smsprestashop_sqltemplate211_oc","Cher client, état de votre commande {order_id} a changé en ");
define("v_smsprestashop_sqltemplate2111_oc",". Bonne journée, {shop_name}.");








// OsCommerce
define("v_about_version_os","smsCommerce module, version ");
define("v_about_supported_text_os","Versions soutenues de OsCommerce:");
define("v_about_supported_version_os","2.3.x");
define("v_about_manual_url_os","www.sms-commerce.net/manual.html");
define("v_about_website_name_os","www.sms-commerce.net");
define("v_about_website_url_os","www.sms-commerce.net/fr/index.html");

define("v_smsprestashop_sqltemplate1_os","Nouvelle commande du {customer_firstname} {customer_lastname}, client: {customer_id}, commande: {order_id}, paiement: {order_payment}, somme: {order_total_paid} {order_currency}. Commande:  {order_products2}. Info provenant de {shop_name}.");
define("v_smsprestashop_sqltemplate21_os","Votre commande {order_id} a été créée avec succès, paiement: {order_payment}, somme: {order_total_paid} {order_currency}. Bonne journée, {shop_name}.");
define("v_smsprestashop_sqltemplate2_os","Client  {customer_firstname} {customer_lastname}, id: {customer_id}, vient de s´inscrire chez {shop_name}.");
define("v_smsprestashop_sqltemplate22_os","Cher(e) {customer_firstname} {customer_lastname}, votre compte chez {shop_name} a été créé avec succès. Nom d´utilisateur: {customer_email}. Bonne journée!");
define("v_smsprestashop_sqltemplate3_os","Client {customer_firstname} {customer_lastname}, id: {customer_id}, a retourné l´article de la commande {order_id}. Commande: {orderReturn2}. Message du client: {customer_question}. Info provenant de {shop_name}."); // ???
define("v_smsprestashop_sqltemplate23_os","Nous avons reçu votre demande. Commande {order_id}. Bonne journée, {shop_name}.");
define("v_smsprestashop_sqltemplate4_os","Dans la commande {order_id} la quantité a changé, {orderSlip2}. Info provenant de {shop_name}."); // ?
define("v_smsprestashop_sqltemplate24_os","Dans votre commande numéro {order_id} la quantité a été modifiée, {orderSlip2}. Bonne journée, {shop_name}.");
define("v_smsprestashop_sqltemplate5_os","Confirmation de paiement, numéro de la commande.: {order_id}, paiement: {order_payment},  somme: {order_total_paid} {order_currency}. Info provenant de {shop_name}.");
define("v_smsprestashop_sqltemplate25_os","Nous avons reçu le paiement de votre commande {order_id} via {order_payment},  somme: {order_total_paid} {order_currency}. Bonne journée, {shop_name}.");
define("v_smsprestashop_sqltemplate62_os","La commande numéro. {order_id} a été mise à jour avec le numéro de la commande  {order_shipping_number} attribué par le transporteur. Info provenant de {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_os","Cher client, l´article de votre commande numéro {order_id} a été envoyé, le numéro de la commande attribué par le transporteur est {order_shipping_number}. Bonne journée, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_os","Cet article a été supprimé de {shop_name}, id: {product_id}, ref: {product_ref}, nom: {product_name}.  Supprimé par l´utilisateur: {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_os","La quantité de l´article a été modifiée, id: {product_id}, ref: {product_ref}, nom: {product_name}, nouvelle quantité: {product_quantity}, fournisseur: {product_supplier}. Info provenant de {shop_name}.");
define("v_smsprestashop_sqltemplate9_os","Dernières pièces en stock, id: {product_id}, ref: {product_ref}, nom: {product_name}, quantité: {product_quantity}. Info provenant de {shop_name}.");
define("v_smsprestashop_sqltemplate10_os","Dans la commande {order_id} l´article avec l´id {product_id} a été annulé: {product_id}, ref: {product_ref}, nom: {product_name}. quantité: {product_quantity}, la quantité annulée: {product_quantity_reinjected}. Info provenant de {shop_name}."); // ? quantity reinjected
define("v_smsprestashop_sqltemplate11_os","État de la commande {order_id} a changé en ");
define("v_smsprestashop_sqltemplate111_os",". Info provenant de {shop_name}.");
define("v_smsprestashop_sqltemplate211_os","Cher client, état de votre commande {order_id} a changé en ");
define("v_smsprestashop_sqltemplate2111_os",". Bonne journée, {shop_name}.");







// Virtuemart
define("v_about_version_vm","Virtue SMS module, version ");
define("v_about_supported_text_vm","Versions soutenues de Virtuemart:");
define("v_about_supported_version_vm","2.3.x");
define("v_about_manual_url_vm","www.virtue-sms.net/manual.html");
define("v_about_website_name_vm","www.virtue-sms.net");
define("v_about_website_url_vm","www.virtue-sms.net/fr/index.html");

define("v_smsprestashop_sqltemplate1_vm","Nouvelle commande du {customer_firstname} {customer_lastname}, client: {customer_id}, commande: {order_id}, paiement: {order_payment}, somme: {order_total_paid} {order_currency}. Commande: {order_products2}. Info provenant de {shop_name}.");
define("v_smsprestashop_sqltemplate21_vm","Votre commande {order_id} a été créée avec succès, paiement: {order_payment}, somme: {order_total_paid} {order_currency}. Bonne journée, {shop_name}.");
define("v_smsprestashop_sqltemplate2_vm","Client  {customer_firstname} {customer_lastname}, id: {customer_id}, vient de s´inscrire chez {shop_name}.");
define("v_smsprestashop_sqltemplate22_vm","Cher(e) {customer_firstname} {customer_lastname}, votre compte chez {shop_name} a été créé avec succès. Nom d´utilisateur: {customer_email}. Bonne journée!");
define("v_smsprestashop_sqltemplate3_vm","Client {customer_firstname} {customer_lastname}, id: {customer_id}, a retourné l´article de la commande {order_id}. Commande: {orderReturn2}. Message du client: {customer_question}. Info provenant de {shop_name}."); // ???
define("v_smsprestashop_sqltemplate23_vm","Nous avons reçu votre demande. Commande {order_id}. Bonne journée, {shop_name}.");
define("v_smsprestashop_sqltemplate4_vm","Dans la commande {order_id} la quantité a changé, {orderSlip2}. Info provenant de {shop_name}."); // ?
define("v_smsprestashop_sqltemplate24_vm","Dans votre commande numéro {order_id} la quantité a été modifiée, {orderSlip2}. Bonne journée, {shop_name}.");
define("v_smsprestashop_sqltemplate5_vm","Confirmation de paiement, numéro de la commande.: {order_id}, paiement: {order_payment},  somme: {order_total_paid} {order_currency}. Info provenant de {shop_name}.");
define("v_smsprestashop_sqltemplate25_vm","Nous avons reçu le paiement de votre commande {order_id} via {order_payment},  somme: {order_total_paid} {order_currency}. Bonne journée, {shop_name}.");
define("v_smsprestashop_sqltemplate62_vm","La commande numéro. {order_id} a été mise à jour avec le numéro de la commande  {order_shipping_number} attribué par le transporteur. Info provenant de {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_vm","Cher client, l´article de votre commande numéro {order_id} a été envoyé, le numéro de la commande attribué par le transporteur est {order_shipping_number}. Bonne journée, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_vm","Cet article a été supprimé de {shop_name}, id: {product_id}, ref: {product_ref}, nom: {product_name}.  Supprimé par l´utilisateur: {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_vm","La quantité de l´article a été modifiée, id: {product_id}, ref: {product_ref}, nom: {product_name}, nouvelle quantité: {product_quantity}, fournisseur: {product_supplier}. Info provenant de {shop_name}.");
define("v_smsprestashop_sqltemplate9_vm","Dernières pièces en stock, id: {product_id}, ref: {product_ref}, nom: {product_name}, quantité: {product_quantity}. Info provenant de {shop_name}.");
define("v_smsprestashop_sqltemplate10_vm","Dans la commande {order_id} l´article avec l´id {product_id} a été annulé: {product_id}, ref: {product_ref}, nom: {product_name}. quantité: {product_quantity}, la quantité annulée: {product_quantity_reinjected}. Info provenant de {shop_name}."); // ? quantity reinjected
define("v_smsprestashop_sqltemplate11_vm","État de la commande {order_id} a changé en ");
define("v_smsprestashop_sqltemplate111_vm",". Info provenant de {shop_name}.");
define("v_smsprestashop_sqltemplate211_vm","Cher client, état de votre commande {order_id} a changé en ");
define("v_smsprestashop_sqltemplate2111_vm",". Bonne journée, {shop_name}.");





// Magento
define("v_about_version_ms","Mage SMS module, version ");
define("v_about_supported_text_ms","Versions soutenues de Magento:");
define("v_about_supported_version_ms","1.6.x - 1.7.x");
define("v_about_manual_url_ms","www.mage-sms.com/manual.html");
define("v_about_website_name_ms","www.mage-sms.com");
define("v_about_website_url_ms","www.mage-sms.com/fr/index.html");

define("v_smsprestashop_sqltemplate1_ms","Nouvelle commande du {customer_firstname} {customer_lastname}, client: {customer_id}, commande: {order_id}, paiement: {order_payment}, somme: {order_total_paid} {order_currency}. Commande: {order_products2}. Info provenant de {shop_name}.");
define("v_smsprestashop_sqltemplate21_ms","Votre commande {order_id} a été créée avec succès, paiement: {order_payment}, somme: {order_total_paid} {order_currency}. Bonne journée, {shop_name}.");
define("v_smsprestashop_sqltemplate2_ms","Client  {customer_firstname} {customer_lastname}, id: {customer_id}, vient de s´inscrire chez {shop_name}.");
define("v_smsprestashop_sqltemplate22_ms","Cher(e) {customer_firstname} {customer_lastname}, votre compte chez {shop_name} a été créé avec succès. Nom d´utilisateur: {customer_email}. Bonne journée!");
define("v_smsprestashop_sqltemplate3_ms","Client {customer_firstname} {customer_lastname}, id: {customer_id}, a retourné l´article de la commande {order_id}. Commande: {orderReturn2}. Message du client: {customer_question}. Info provenant de {shop_name}."); // ???
define("v_smsprestashop_sqltemplate23_ms","Nous avons reçu votre demande. Commande {order_id}. Bonne journée, {shop_name}.");
define("v_smsprestashop_sqltemplate4_ms","Dans la commande {order_id} la quantité a changé, {orderSlip2}. Info provenant de {shop_name}."); // ?
define("v_smsprestashop_sqltemplate24_ms","Dans votre commande numéro {order_id} la quantité a été modifiée, {orderSlip2}. Bonne journée, {shop_name}.");
define("v_smsprestashop_sqltemplate5_ms","Confirmation de paiement, numéro de la commande.: {order_id}, paiement: {order_payment},  somme: {order_total_paid} {order_currency}. Info provenant de {shop_name}.");
define("v_smsprestashop_sqltemplate25_ms","Nous avons reçu le paiement de votre commande {order_id} via {order_payment},  somme: {order_total_paid} {order_currency}. Bonne journée, {shop_name}.");
define("v_smsprestashop_sqltemplate62_ms","La commande numéro. {order_id} a été mise à jour avec le numéro de la commande  {order_shipping_number} attribué par le transporteur. Info provenant de {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_ms","Cher client, l´article de votre commande numéro {order_id} a été envoyé, le numéro de la commande attribué par le transporteur est {order_shipping_number}. Bonne journée, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_ms","Cet article a été supprimé de {shop_name}, id: {product_id}, ref: {product_ref}, nom: {product_name}.  Supprimé par l´utilisateur: {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_ms","La quantité de l´article a été modifiée, id: {product_id}, ref: {product_ref}, nom: {product_name}, nouvelle quantité: {product_quantity}, fournisseur: {product_supplier}. Info provenant de {shop_name}.");
define("v_smsprestashop_sqltemplate9_ms","Dernières pièces en stock, id: {product_id}, ref: {product_ref}, nom: {product_name}, quantité: {product_quantity}. Info provenant de {shop_name}.");
define("v_smsprestashop_sqltemplate10_ms","Dans la commande {order_id} l´article avec l´id {product_id} a été annulé: {product_id}, ref: {product_ref}, nom: {product_name}. quantité: {product_quantity}, la quantité annulée: {product_quantity_reinjected}. Info provenant de {shop_name}."); // ? quantity reinjected
define("v_smsprestashop_sqltemplate11_ms","État de la commande {order_id} a changé en ");
define("v_smsprestashop_sqltemplate111_ms",". Info provenant de {shop_name}.");
define("v_smsprestashop_sqltemplate211_ms","Cher client, état de votre commande {order_id} a changé en ");
define("v_smsprestashop_sqltemplate2111_ms",". Bonne journée, {shop_name}.");





?>