<?php



define("lang_iso_code","pl");
define("smscurrency","EUR");


define("lang_alphabet","A;Ą;B;C;Ć;D;E;Ę;F;G;H;I;J;K;L;Ł;M;N;Ń;O;Ó;P;R;S;Ś;T;U;W;Y;Z;Ź;Ż");





//new
define("v_all_years","Wszystkie lata");
define("v_menu_setting", "Ustawienia");



// About
define("v_about_about","O nas");
define("v_about_version","Presta SMS moduł, wersja");
define("v_about_copyright","Copyright © TOPefekt s.r.o., Wszystkie prawa zastrzeżone");
define("v_about_developer","Deweloper:");
define("v_about_topefekt","TOPefekt s.r.o.");
define("v_about_address","Adres");
define("v_about_street","B. Nemcove 767/13");
define("v_about_city","Sumperk 78701");
define("v_about_state","Republika Czeska");
define("v_about_vat","NIP: CZ29444268");
define("v_about_phone","Telefon");
define("v_about_phonenr","+420 581 110 998");
define("v_about_mail","E-mail:");
define("v_about_mailsales","sales@topefekt.com");
define("v_about_mailsupport","support@topefekt.com");
define("v_about_web","Web:");
define("v_about_website_name","www.presta-sms.com");
define("v_about_website_url","www.presta-sms.com/pl/index.html");



// AdminSms.php
define("v_adminsms_adminsms","Admin SMS");
define("v_adminsms_description","Wybierz zdarzenia, podczas których administratorzy sklepu zostaną powiadomieni za pośrednictwem SMS i zdefiniuj tekst tych wiadomości.");
define("v_adminsms_unicodesms","Unicode SMS");
define("v_adminsms_unicode","unicode");
define("v_adminsms_unicodetext","Zaznacz jedynie jeśli w wiadomości chcesz używać znaków diakrytycznych lub języków, takich jak chiński, arabski, grecki, hebrajski, koreański, itp.. (Unicode pozwala na użycie różnych czcionek jednocześnie i symbole. Liczba znaków w Unicode wiadomości to 70).");
define("v_adminsms_unicodesave","Zapisz");
define("v_adminsms_smsactive","Wysyłanie powiadomień SMS jest AKTYWNE.");
define("v_adminsms_smsnotactive","Wysyłanie powiadomień SMS jest NIEAKTYWNE. Wybierz co najmniej jednego administratora, aby aktywować wysyłanie wiadomości SMS.");
define("v_adminsms_statusupdate","Aktualizacja stanu zamówienia");
define("v_adminsms_account","Konto");
define("v_adminsms_product","Produkt");
define("v_adminsms_orderstatus","Stan zamówienia");
define("v_adminsms_order","Zamówienie");
define("v_adminsms_adminsmsnotactive","Admin SMS - nieaktywny");
define("v_adminsms_addadmin","Proszę dodać co najmniej jednego administratora!");
define("v_adminsms_usernotactive","Profil użytkownika nie jest aktywny! Dokonaj rejestracji, klikając na zakładkę SMS w głównym menu. Moduł udostępni formularz rejestracyjny. Jeśli korzystałeś w przeszłości i znasz swoją nazwę użytkownika i hasło, należy wypełnić formularz dla istniejącego konta. W innym przypadku, wpisz adres e-mail, zaakceptuj warunki umowy licencyjnej i kliknij na \"Zarejestruj \".");
define("v_adminsms_invalidtext","Nieprawidłowy tekst wiadomości SMS");
define("v_adminsms_smssaved","Tekst SMS został zapisany.");
define("v_adminsms_unicodesaved","Unicode zapisany.");
define("v_adminsms_jschar","Znak");
define("v_adminsms_jschars","Znaków");
define("v_adminsms_jslabel","Etykieta");
define("v_adminsms_jssmstext","tekst SMS");
define("v_adminsms_jstotalsms","całkiem sms:");
define("v_adminsms_smstext","Tekst SMS");
define("v_adminsms_preview","Podgląd");
define("v_adminsms_admins","Administratorzy");
define("v_adminsms_save","Zapisz");
define("v_adminsms_cancel","Anuluj");
define("v_adminsms_restoreunsaved","Niezapisane zmiany powrócš do pierwotnego stanu."); //new


// AdminSmsProfile.php
define("v_adminsmsprofile_profilenotactive","Profil użytkownika - nieaktywny");
define("v_adminsmsprofile_profileactive","Profil użytkownika - aktywny");
define("v_adminsmsprofile_newaccount","Nowe konto użytkownika");
define("v_adminsmsprofile_notregistered","Nie jesteś zarejestrowany? Załóż konto teraz!");
define("v_adminsmsprofile_email","Email:");
define("v_adminsmsprofile_company","Nazwa firmy:");
define("v_adminsmsprofile_street","Ulica:");
define("v_adminsmsprofile_city","Miasto:");
define("v_adminsmsprofile_zip","Kod pocztowy:");
define("v_adminsmsprofile_country","Kraj:");
define("v_adminsmsprofile_id","REGON:");
define("v_adminsmsprofile_vat","NIP:");
define("v_adminsmsprofile_refererid","ID Referer:"); // ?
define("v_adminsmsprofile_licence","Pokaż warunki licencyjne");
define("v_adminsmsprofile_agree","Zgadzam się");
define("v_adminsmsprofile_notagree","Nie zgadzam się");
define("v_adminsmsprofile_register","Rejestracja");
define("v_adminsmsprofile_required","Pole wymagane");
define("v_adminsmsprofile_sign","Login"); // Sign in
define("v_adminsmsprofile_signtext","Jeśli masz już konto, zaloguj się");
define("v_adminsmsprofile_username","Użytkownik:");
define("v_adminsmsprofile_password","Hasło:");
define("v_adminsmsprofile_login","Login"); // Log in
define("v_adminsmsprofile_editaccount","Edycja konta użytkownika");
define("v_adminsmsprofile_save","Zapisz");
define("v_adminsmsprofile_accountinfo","Informacje o koncie użytkownika");
define("v_adminsmsprofile_credit","SMS credit:");
define("v_adminsmsprofile_addadmin","Dodaj Administratora");
define("v_adminsmsprofile_name","Nazwa:");
define("v_adminsmsprofile_mobilenr","Numer komórkowy:");
define("v_adminsmsprofile_edit","Edytuj");
define("v_adminsmsprofile_add","Dodaj");
define("v_adminsmsprofile_settings","Inne ustawienia");
define("v_adminsmsprofile_simulate","Symulować wysłanie SMS:");
define("v_adminsmsprofile_simulatehint","Pozwala na przetestowanie wysyłania SMS i pokazanie testowego SMS w zakładce Historia SMS.");
define("v_adminsmsprofile_deletedb","Usuń bazę danych:");
define("v_adminsmsprofile_deletedbhint","Pozwala zdecydować, czy zachować istniejące ustawienia i bazę danych wysłanych wiadomości SMS w przypadku odinstalowania modułu SMS-Prestashop");
define("v_adminsmsprofile_report","Potwierdzenie dostarczenia (DR):");
define("v_adminsmsprofile_reporthint","Pokaż potwierdzenie dostarczenia w zakładce Historia SMS.");
define("v_adminsmsprofile_lowcredit","Powiadomienie o niskim kredycie:");
define("v_adminsmsprofile_lowcredithint","Możliwość otrzymania e-maila, w przypadku, że SMS credit jest niski.");
define("v_adminsmsprofile_dremail","Email o przyjęciu potwierdzenia:");
define("v_adminsmsprofile_dremailhint","Możliwość otrzymania e-maila z potwierdzeniem dostarczenia SMS.");
define("v_adminsmsprofile_admincreated","Administrator został utworzony.");
define("v_adminsmsprofile_agreetext","Musisz zaakceptować warunki licencji.");
define("v_adminsmsprofile_accountcreated","Rejestracja została zakończnona. Do Twojej skrzynki wysłaliśmy emial potwierdzający rejestrację oraz 5 darmowych creditów.");
define("v_adminsmsprofile_addaccounttext","Kolejne konto możesz dodać za");
define("v_adminsmsprofile_minutes","minut");
define("v_adminsmsprofile_cantconnect","Nie można połączyć się z serwerem SMS");
define("v_adminsmsprofile_loginok","Zostałeś pomyślnie zalogowany.");
define("v_adminsmsprofile_error","Błąd");
define("v_adminsmsprofile_loginerror","Błąd logowania");
define("v_adminsmsprofile_invalidemail","Nieaktualny email na przesyłanie potwierdzeń dostarczenia.");
define("v_adminsmsprofile_invalidemail2","Nieprawidłowy adres e-mail");
define("v_adminsmsprofile_accountchanged","Konto zostało zmienione.");
define("v_adminsmsprofile_accountchanged2","Konto zostało zmienione, ale URL SMS modułu dla potwierdzeń dostarczenia nie odpowiada."); // ?
define("v_adminsmsprofile_changeaccounttext","Konto można zmienić za ");
define("v_adminsmsprofile_seeconds"," sekund");
define("v_adminsmsprofile_invalidname","Nieprawidłowa nazwa");
define("v_adminsmsprofile_invalidnumber","Nieprawidłowy numer");
define("v_adminsmsprofile_adminchanged","Administrator został zmieniony.");
define("v_adminsmsprofile_admindeleted","Administrator został usunięty.");
define("v_adminsmsprofile_nochanges","nie dokonano żadnych zmian");
define("v_adminsmsprofile_confirmdelete","Czy na pewno chcesz usunąć"); // Are you sure to delete
define("v_adminsmsprofile_deleteadmin","USUŃ administratora");
define("v_adminsmsprofile_editadmin","EDYTUJ administratora ");
define("v_adminsmsprofile_intformat","W formacie międzynarodowym, bez zer lub znaku “+”, np. 48501041324");
define("v_adminsmsprofile_uninstall","(Podczas odinstalowania)");
define("v_adminsmsprofile_noalert","(0 = brak ostrzeżenia)");
define("v_adminsmsprofile_filluser","Wprowadź nazwę użytkownika i hasło");


// CustomerSms.php
define("v_customersms_customersms","SMS klienta - ");
define("v_customersms_notactive","SMS klienta - nieaktywny");
define("v_customersms_default","domyślny");
define("v_customersms_langversion","język");
define("v_customersms_description","Wybierz zdarzenia, podczas których klient będzie powiadamiany za pośrednictwem SMS i zdefiniuj tekst tych wiadomości. Dla różnych krajów można stworzyć różne wersje językowe komunikatów SMS. Dla krajów o niezdefiniowanych mutacjach będzie użyta wersja domyślna");
define("v_customersms_addsms","Dodaj wersję językową");
define("v_customersms_country","Wybierz kraj: ");
define("v_customersms_unicodesms","Unicode SMS");
define("v_customersms_unicodetext","Zaznacz jedynie jeśli w wiadomości chcesz używać znaków diakrytycznych lub języków, takich jak chiński, arabski, grecki, hebrajski, koreański, itp.. (Unicode pozwala na użycie różnych czcionek jednocześnie i symbole. Liczba znaków w Unicode wiadomości to 70).");
define("v_customersms_orderstatus","Stan zamówienia");
define("v_customersms_smsactive","Wysyłanie powiadomień SMS jest AKTYWNE.");
define("v_customersms_smsnotactive","Wysyłanie powiadomień SMS jest NIEAKTYWNE. Aktywuj wysyłanie SMS zaznaczając „Aktywny“ w szczegółach wybranego statusu.");
define("v_customersms_statusupdate","Aktualizacja stanu zamówienia");
define("v_customersms_account","Konto");
define("v_customersms_usernotactive","Profil użytkownika nie jest aktywny! Dokonaj rejestracji, klikając na zakładkę SMS w głównym menu. Moduł udostępni formularz rejestracyjny. Jeśli korzystałeś w przeszłości i znasz swoją nazwę użytkownika i hasło, należy wypełnić formularz dla istniejącego konta. W innym przypadku, wpisz adres e-mail, zaakceptuj warunki umowy licencyjnej i kliknij na \"Zarejestruj \".");
define("v_customersms_invalidtext","Nieprawidłowy tekst wiadomości SMS");
define("v_customersms_smssaved","Tekst SMS został zapisany.");
define("v_customersms_smsdeleted","Wersja językowa została usunięta."); // ?
define("v_customersms_confirmdelete","Czy na pewno chcesz usunąć");
define("v_customersms_langdelete","USUŃ wersję językową");
define("v_customersms_smstext","tekst SMS"); // ?
define("v_customersms_unicode","unicode");
define("v_customersms_versionfor","Wersja językowa dla ");
define("v_customersms_wassaved"," została zapisana");
define("v_customersms_preview","Podgląd");
define("v_customersms_active","Aktywny");
define("v_customersms_save","Zapisz");
define("v_customersms_cancel","Anuluj");
define("v_customersms_jstotalsms","całkiem sms:");
define("v_customersms_editlang","EDYTUJ wersję językową");
define("v_customersms_edit","Edytuj");
define("v_customersms_add","Dodaj");
define("v_customersms_order","Zamówienie");
define("v_customersms_jschars","Znaków");
define("v_customersms_unicodesaved","Unicode został zapisany.");
define("v_customersms_restoreunsaved","Niezapisane zmiany powrócš do pierwotnego stanu."); //new

//PayPal.php
define("v_paypal_credit","Doładuj");
define("v_paypal_creditnotactive","Doładuj - nieaktywne");
define("v_paypal_usernotactive","Profil użytkownika nie jest aktywny! Dokonaj rejestracji, klikając na zakładkę SMS w głównym menu. Moduł udostępni formularz rejestracyjny. Jeśli korzystałeś w przeszłości i znasz swoją nazwę użytkownika i hasło, należy wypełnić formularz dla istniejącego konta. W innym przypadku, wpisz adres e-mail, zaakceptuj warunki umowy licencyjnej i kliknij na \"Zarejestruj \".");
define("v_paypal_clickhereif","Jeli nie pokazuje się opcja doładowania kredytu, kliknij tutaj:"); //new



//SendSms.php
define("v_sendsms_bulksms","Tekst zbiorowej wiadomości SMS"); // ? Bulk SMS text
define("v_sendsms_addrecipients","Dodaj odbiorcę");
define("v_sendsms_addtext","Dodaj jednego lub więcej odbiorców, rozdzielając przecinkami. Liczba musi być w międzynarodowym formacie, bez zer lub znaku “+”, np. 48501041324");
define("v_sendsms_eg"," (np. 48501041324)");
define("v_sendsms_entertext","Wpisz tekst wiadomości SMS");
define("v_sendsms_addcsv","Dodaj odbiorców w pliku CSV");
define("v_sendsms_csvtext","Plik CSV - 1 kolumna, 1.kolumna - liczba (liczba musi być w formacie międzynarodowym, bez zer lub znaku “+”, np. 48501041324)");
define("v_sendsms_unicode"," Unicode ");
define("v_sendsms_unicodetext","Zaznacz jedynie jeśli w wiadomości chcesz używać znaków diakrytycznych lub języków, takich jak chiński, arabski, grecki, hebrajski, koreański, itp.. (Unicode pozwala na użycie różnych czcionek jednocześnie i symbole. Liczba znaków w Unicode wiadomości to 70).");
define("v_sendsms_time","Twój czas: ");
define("v_sendsms_time2","Czas: ");
define("v_sendsms_timezone","strefa czasowa ");
define("v_sendsms_timezone2","ustawienie strefy czasowej");
define("v_sendsms_longtext","Tekst jest zbyt długi");
define("v_sendsms_sendsms","Wyślij SMS");
define("v_sendsms_send","Wyślij");
define("v_sendsms_sendtext","Wysyłanie SMS lub zbiorowych SMS. Wpisz numery telefonów lub wgraj plik CSV"); // ?
define("v_sendsms_smsnotactive","Wyślij SMS - nieaktywny");
define("v_sendsms_usernotactive","Profil użytkownika nie jest aktywny! Dokonaj rejestracji, klikając na zakładkę SMS w głównym menu. Moduł udostępni formularz rejestracyjny. Jeśli korzystałeś w przeszłości i znasz swoją nazwę użytkownika i hasło, należy wypełnić formularz dla istniejącego konta. W innym przypadku, wpisz adres e-mail, zaakceptuj warunki umowy licencyjnej i kliknij na \"Zarejestruj \".");
define("v_sendsms_fillsms","Wypełnij tekst wiadomości SMS");
define("v_sendsms_smslong","SMS jest zbyt długi (max. 612 znaków).");
define("v_sendsms_unicodesmslong","SMS jest zbyt długi (max. 268 znaków unicode).");
define("v_sendsms_wrongtime","Nieprawidłowy czas wysłania SMS."); // ? Wrong time of SMS sending
define("v_sendsms_norecipients","Znaleziono odbiorców: 0");
define("v_sendsms_lowcreditall","Nie masz wystarczających środków na wysyłanie wiadomości SMS do wszystkich");
define("v_sendsms_recipients","odbiorców");
define("v_sendsms_smssent","SMS został wysłany.");
define("v_sendsms_smssaved","SMS został zapisany.");
define("v_sendsms_wrongnumber","Błędny lub niedostępny numer ");
define("v_sendsms_unauthorized","nieautoryzowane ID nadawcy w potwierdzającym SMS"); // ? unauthorized senderID in confirmation sms
define("v_sendsms_lowcredit","Niski kredyt na wysyłanie wiadomości SMS");
define("v_sendsms_nounicode","Unicode nie jest obsługiwany");
define("v_sendsms_loginerror","Błąd logowania");
define("v_sendsms_cantconnect","Nie można połączyć się z serwerem SMS");
define("v_sendsms_simulation","SYMULACJA  SMS (wysyłanie SMS było symulowane. Odbiorca nie otrzyma SMS).");
define("v_sendsms_simulationconfirm","SMS został wysyłany (symulacja).");
define("v_sendsms_error","błąd");
define("v_sendsms_sendlater"," Wyślij później");
define("v_sendsms_jschars","Znaków:");
define("v_sendsms_hr","1godz.");
define("v_sendsms_date","Data:");

// SmsAnswers.php
define("v_smsanswers_smsanswers","Odpowiedzi SMS");
define("v_smsanswers_description","Odpowiedź SMS od klienta jest wyświetlana tylko wtedy, gdy klient z twojego sklepu otrzyma SMS z typem nadawcy \"Numer systemowy\" i klient odpowie z tego samego numeru telefonu.");
define("v_smsanswers_show","Pokaż");
define("v_smsanswers_results","Wynik wyszukiwania "); // Search results
define("v_smsanswers_of"," z ");
define("v_smsanswers_smscenter","SMS centrum");
define("v_smsanswers_date","Data");
define("v_smsanswers_number","z numeru");
define("v_smsanswers_new","nowy");
define("v_smsanswers_previous","Poprzedni");
define("v_smsanswers_next","Kolejny");
define("v_smsanswers_page","Strona:");
define("v_smsanswers_smsnotactive","SMS Odpowiedzi - nieaktywne");
define("v_smsanswers_usernotactive","Profil użytkownika nie jest aktywny! Dokonaj rejestracji, klikając na zakładkę SMS w głównym menu. Moduł udostępni formularz rejestracyjny. Jeśli korzystałeś w przeszłości i znasz swoją nazwę użytkownika i hasło, należy wypełnić formularz dla istniejącego konta. W innym przypadku, wpisz adres e-mail, zaakceptuj warunki umowy licencyjnej i kliknij na \"Zarejestruj \".");
define("v_smsanswers_year","rok");
define("v_smsanswers_month","miesiąc");
define("v_smsanswers_sms","SMS");
define("v_smsanswers_text","Tekst:");
define("v_smsanswers_nosms","Całkiem odpowiedzi SMS: 0");

// SmsHistory.php
define("v_smshistory_sent","WYSŁANO do odbiorcy");
define("v_smshistory_error","BŁĄD");
define("v_smshistory_delivered","DORĘCZONO odbiorcy");
define("v_smshistory_buffered","ODBIORCA jest niedostępny"); // new
define("v_smshistory_smshistory","Historia SMS");
define("v_smshistory_description","Historia wysłanych wiadomości SMS z SMS modułu.");
//define("v_smshistory_status","status");
define("v_smshistory_adminsms"," admin sms");
define("v_smshistory_customersms"," sms klienta");
define("v_smshistory_marketingsms"," sms marketing"); // marketingové sms ?
define("v_smshistory_simplesms"," prosty sms"); // sms ?
define("v_smshistory_show","Pokaż");
define("v_smshistory_results","Wynik wyszukiwania ");
define("v_smshistory_of"," z ");
define("v_smshistory_type","Typ");
define("v_smshistory_date","Data");
define("v_smshistory_subject","przedmiot SMS");
define("v_smshistory_nubmer","Numer");
define("v_smshistory_yes","tak");
define("v_smshistory_no","nie");
define("v_smshistory_sysnumber","numer systemowy");
define("v_smshistory_balance","Status konta:"); // Credit balance
define("v_smshistory_customerdetail","Pokaż szczegóły klienta");
define("v_smshistory_smstext","Tekst:");
define("v_smshistory_totalsms","Całkiem SMS:");
define("v_smshistory_smsnotactive","Historia SMS - nieaktywna");
define("v_smshistory_usernotactive","Profil użytkownika nie jest aktywny! Dokonaj rejestracji, klikając na zakładkę SMS w głównym menu. Moduł udostępni formularz rejestracyjny. Jeśli korzystałeś w przeszłości i znasz swoją nazwę użytkownika i hasło, należy wypełnić formularz dla istniejącego konta. W innym przypadku, wpisz adres e-mail, zaakceptuj warunki umowy licencyjnej i kliknij na \"Zarejestruj \".");
define("v_smshistory_price","sms price in credits:");
define("v_smshistory_year","rok");
define("v_smshistory_month","miesiąc");
define("v_smshistory_status","Status");
define("v_smshistory_recipient","Odbiorca");
define("v_smshistory_unicode","Unicode:");
define("v_smshistory_senderid","Numer nadawcy:"); // senderID
define("v_smshistory_previous","Poprzedni");
define("v_smshistory_next","Kolejny");
define("v_smshistory_page","Strona:");
define("v_smshistory_nosms","SMS całkiem: 0");
define("v_smshistory_sms","SMS");

// SmsMarketing.php
define("v_smsmarketing_smsbulk"," SMS Marketing - tekst zbiorowej wiadomości SMS");
define("v_smsmarketing_entertext","Wpisz tekst wiadomości SMS");
define("v_smsmarketing_unicode"," Unicode ");
define("v_smsmarketing_unicodetext","Zaznacz jedynie jeśli w wiadomości chcesz używać znaków diakrytycznych lub języków, takich jak chiński, arabski, grecki, hebrajski, koreański, itp.. (Unicode pozwala na użycie różnych czcionek jednocześnie i symbole. Liczba znaków w Unicode wiadomości to 70).");
define("v_smsmarketing_sendlater"," Wyślij później ");
define("v_smsmarketing_yourtime","Twój czas: ");
define("v_smsmarketing_jstotalcustomers","Całkiem klientów");
define("v_smsmarketing_jstotalsms","Całkiem SMS:");
define("v_smsmarketing_bulkfilter","SMS Marketing - filtr SMS zbiorowych");
define("v_smsmarketing_allcustomers","Wszyscy klienci");
define("v_smsmarketing_companycustomers","Firmowi klienci");
define("v_smsmarketing_privatecustomers","Osoby prywatne");
define("v_smsmarketing_allcountries","Wszystkie kraje");
define("v_smsmarketing_lastname","Nazwisko:");
define("v_smsmarketing_firstname","Imię:");
define("v_smsmarketing_lastname2","Nazwisko:");
define("v_smsmarketing_firstname2","Imię:");
define("v_smsmarketing_groups","Grupy:");
define("v_smsmarketing_all","Wszystkie");
define("v_smsmarketing_gender","Płeć");
define("v_smsmarketing_male","Mężczyzna");
define("v_smsmarketing_female","Kobieta");
define("v_smsmarketing_news","Aktualności:"); // ? Newsletter
define("v_smsmarketing_yes","Tak");
define("v_smsmarketing_no","Nie");
define("v_smsmarketing_applyfilter","Zastosuj filtr");
define("v_smsmarketing_birthfrom","Data urodzenia od:");
define("v_smsmarketing_birthto","do: ");
define("v_smsmarketing_registerfrom","Data rejestracji od:");
define("v_smsmarketing_customersfound","Znaleziono klientów: ");
define("v_smsmarketing_results","pokazano");
define("v_smsmarketing_action","Akcja");
define("v_smsmarketing_mobilenr","Numer telefonu"); // ? Mobile number
define("v_smsmarketing_customerid","Numer klienta");
define("v_smsmarketing_removecustomer","USUŃ klienta z listy");
define("v_smsmarketing_next","Kolejny");
define("v_smsmarketing_previous","Poprzedni");
define("v_smsmarketing_page","Strona:");
define("v_smsmarketing_smsmarketingfound","SMS Marketing - znaleziono klientów: ");
define("v_smsmarketing_description","Wpisz tekst wiadomości i skorzystaj z zaawansowanych filtrów do kierowania twojej kampanii marketingowej.");
define("v_smsmarketing_smsmarketing","SMS Marketing");
define("v_smsmarketing_smsnotactive","SMS Marketing - nieaktywny");
define("v_smsmarketing_usernotactive","Profil użytkownika nie jest aktywny! Dokonaj rejestracji, klikając na zakładkę SMS w głównym menu. Moduł udostępni formularz rejestracyjny. Jeśli korzystałeś w przeszłości i znasz swoją nazwę użytkownika i hasło, należy wypełnić formularz dla istniejącego konta. W innym przypadku, wpisz adres e-mail, zaakceptuj warunki umowy licencyjnej i kliknij na \"Zarejestruj \".");
define("v_smsmarketing_fillsms","Wypełnij tekst SMS.");
define("v_smsmarketing_smslong","SMS jest zbyt długi (max. 612 znaków).");
define("v_smsmarketing_unicodesmslong","SMS jest zbyt długi (max. 268 znaków unicode).");
define("v_smsmarketing_nocustomers","Znaleziono klientów: 0");
define("v_smsmarketing_wrongtime"," Nieprawidłowy czas wysłania SMS .");
define("v_smsmarketing_lowcreditall","Nie masz wystarczających środków na wysyłanie wiadomości SMS do wszystkich");
define("v_smsmarketing_customers","klientom.");
define("v_smsmarketing_smssent","SMS został wysyłany.");
define("v_smsmarketing_smssaved","SMS został zapisany.");
define("v_smsmarketing_wrongnr","Błędny lub niedostępny numer ");
define("v_smsmarketing_unauthorized","nieautoryzowane ID nadawcy w potwierdzającym SMS"); // ? unauthorized senderID in confirmation sms
define("v_smsmarketing_lowcredit","Niski kredyt na wysyłanie wiadomości SMS");
define("v_smsmarketing_nounicode","Unicode nie jest obsługiwany");
define("v_smsmarketing_cantconnect","Nie można połączyć się z serwerem SMS");
define("v_smsmarketing_simulation","SYMULACJA  SMS (wysyłanie SMS było symulowane. Odbiorca nie otrzyma SMS).");
define("v_smsmarketing_simulationconfirm","SMS został wysyłany (symulacja).");
define("v_smsmarketing_error","błąd");
define("v_smsmarketing_loginerror","błąd logowania");
define("v_smsmarketing_date","Data:");
define("v_smsmarketing_time","Czas");
define("v_smsmarketing_hr","1godz.");
define("v_smsmarketing_timezone","strefa czasowa ");
define("v_smsmarketing_timezone2","ustawienie strefy czasowej");
define("v_smsmarketing_send","Wyślij");
define("v_smsmarketing_jschars","Znaków:");
define("v_smsmarketing_longtext","Tekst jest zbyt długi");
define("v_smsmarketing_typ","Typ:");
define("v_smsmarketing_country","Kraj:");
define("v_smsmarketing_city","Miasto:");
define("v_smsmarketing_advert","Reklama:"); // ? Advert
define("v_smsmarketing_store","Sklep:"); //new
define("v_smsmarketing_allstores","Wszystkie sklepy"); //new


// smsprestashop.php
define("v_smsprestashop_prestashop","Presta SMS");
define("v_smsprestashop_description","presta-sms.com - wysyłaj wiadomości SMS ze swojego Prestashop!");
define("v_smsprestashop_admin","Admin SMS"); // ?
define("v_smsprestashop_customer","SMS Klienta");
define("v_smsprestashop_settings","Ustawienia SMS"); // ? SMS Settings
define("v_smsprestashop_history","Historia SMS");
define("v_smsprestashop_credit","Doładuj");
define("v_smsprestashop_marketing","Marketing SMS");
define("v_smsprestashop_answers","Odpowiedzi SMS"); // ? SMS Answers
define("v_smsprestashop_send","Wyślij SMS");
define("v_smsprestashop_about","O nas");
define("v_smsprestashop_wrongnr","Błędny lub niedostępny numer ");
define("v_smsprestashop_unauthorized","nieautoryzowane ID nadawcy w potwierdzającym SMS");
define("v_smsprestashop_lowcredit","Niski kredyt na wysyłanie wiadomości SMS");
define("v_smsprestashop_nounicode","Unicode nie jest obsługiwany");
define("v_smsprestashop_loginerror","Błąd logowania");
define("v_smsprestashop_cantconnect","Niski kredyt na wysyłanie wiadomości SMS");
define("v_smsprestashop_simulation","SYMULACJA  SMS (wysyłanie SMS było symulowane. Odbiorca nie otrzyma SMS).");
define("v_smsprestashop_nrunknown","Nieznany numer");
define("v_smsprestashop_notconnected","Niepodłączono do serwera SMS");
define("v_smsprestashop_sqlinfo1","Nowe zamówienia");
define("v_smsprestashop_sqltemplate1","Nowe zamowienie od {customer_firstname} {customer_lastname}, id: {customer_id}, zamowienie: {order_id}, platnosc: {order_payment}, kwota: {order_total_paid} {order_currency}. Zamowienie:  {order_products2}. Info z {shop_name}.");
define("v_smsprestashop_sqltemplate21","Twoje zamowienie  {order_id} zostalo pomyslnie utworzone, platnosc: {order_payment}, kwota: {order_total_paid} {order_currency}. Udanego dnia, {shop_name}.");
define("v_smsprestashop_notice","Obowiązujące parametry:"); // ? Possible variables
define("v_smsprestashop_sqlinfo2","Pomyślne utworzenie konta klienta"); // ? Successful customer create account
define("v_smsprestashop_sqltemplate2","Klient  {customer_firstname} {customer_lastname}, id: {customer_id}, Wlasnie dokonal rejestracji do {shop_name}.");
define("v_smsprestashop_sqltemplate22","Szanowny Panie/ Szanowna Pani {customer_firstname} {customer_lastname}, twoje konto w {shop_name} zostalo pomyslnie utworzone. Nazwa użytkownika: {customer_email}. Udanego dnia!");
define("v_smsprestashop_sqlinfo3","Towar zwrócono");
define("v_smsprestashop_sqltemplate3","Klient {customer_firstname} {customer_lastname}, id: {customer_id}, zwrocil towar z zamowienia {order_id}. Zamowienie:   {orderReturn2}. Wiadomosc od klienta: {customer_question}. Info z {shop_name}."); // ???
define("v_smsprestashop_sqltemplate23","Otrzymalismy Pana/i prosbe. zamowienie {order_id}. Udanego dnia, {shop_name}.");
define("v_smsprestashop_sqlinfo4","Zawiadomienie w przypadku gdy zmienia się ilość niektórych z zamawianych produktów."); // ? Called when a quantity of one product change in an order
define("v_smsprestashop_sqltemplate4","W zamowieniu {ORDER_ID} zmieniono ilosc, {orderSlip2}. Info z {shop_name}."); // ?
define("v_smsprestashop_sqltemplate24","W twoim zamowieniu numer {order_id} zostala zmieniona ilosc, , {orderSlip2}. Udanego dnia, {shop_name}.");
define("v_smsprestashop_sqlinfo5","Potwierdzenie zapłaty");
define("v_smsprestashop_sqltemplate5","Potwierdzenie zaplaty, zamowienie nr: {order_id}, platnosc: {order_payment},  kwota: {order_total_paid} {order_currency}. Info z {shop_name}.");
define("v_smsprestashop_sqltemplate25","Otrzymalismy zaplate za zamowienie  {order_id} poprzez {order_payment},  kwota: {order_total_paid} {order_currency}. Udanego dnia, {shop_name}.");

define("v_smsprestashop_sqlinfo62","Aktualizacja zamówienia - numer przesyłki przydzielony przez dostawcę");  //new
define("v_smsprestashop_sqltemplate62","Zamowienie nr {order_id} zostalo zaktualizowane o numer przesylki {order_shipping_number} przydzielony przez dostawce. Info z {shop_name}."); //new
define("v_smsprestashop_sqltemplate262","Szanowny kliencie, towar z twojego zamowienia nr {order_id} zostal wyslany, numer przesylki przydzielony przez dostawce to {order_shipping_number}. Pozdrawiam, {shop_name}."); //new

define("v_smsprestashop_sqlinfo7","Usunięcie produktu z bazy danych"); // ? Called when a product is deleted
define("v_smsprestashop_sqltemplate7","Ten produkt zostal usuniety z {shop_name}, id: {product_id}, ref: {product_ref}, nazwa:  {product_name}. Usunal uzytkownik: {employee_id}, {employee_email}.");
define("v_smsprestashop_sqlinfo8","Ilość jest aktualizowana tylko wtedy, gdy klient pomyślnie złoży zamówienie"); // ? ...effectively place his order
define("v_smsprestashop_sqltemplate8","Ilosc produktow ulegla zmianie, id: {product_id}, ref: {product_ref}, nazwa: {product_name}, nowa ilosc: {product_quantity}, dostawca: {product_supplier}. Info z {shop_name}.");
define("v_smsprestashop_sqlinfo9","Towaru nie ma na stanie");
define("v_smsprestashop_sqltemplate9","Mala ilosc produktu na stanie, id: {product_id}, ref: {product_ref}, nazwa: {product_name}, ilosc: {product_quantity}. Informacje z {shop_name}.");
define("v_smsprestashop_sqlinfo10","Zawiadomienie, jeśli administrator lub klient usunie towar z zamówienia");
define("v_smsprestashop_sqltemplate10","W zamowieniu {order_id} zostal anulowany produkt id: {product_id}, ref: {product_ref}, nazwa: {product_name}. ilosc: {product_quantity}, anulowana ilosc: {product_quantity_reinjected}. informacje z {shop_name}."); // ? quantity reinjected
define("v_smsprestashop_sqltemplate11","Stan zamowienia nr:  {order_id} zostanie zmieniony na ");
define("v_smsprestashop_sqltemplate111",". Informacje z {shop_name}.");
define("v_smsprestashop_sqltemplate211","Szanowny kliencie, twoj stan zamowienia  {order_id} zostanie zmieniony na");
define("v_smsprestashop_sqltemplate2111",". Udanego dnia, {shop_name}.");
define("v_smsprestashop_bankwire","Przelew bankowy");
define("v_smsprestashop_company","Nazwa firmy");
define("v_smsprestashop_country","Kraj");
define("v_smsprestashop_city","Miasto");
define("v_smsprestashop_qty","ilość");
define("v_smsprestashop_qtyreinjected","anulowana ilosc"); // ? qty reinjected ////bez diakritiky
define("v_smsprestashop_qtyreturned","zwrocona ilosc"); //bez diakritiky
define("v_smsprestashop_name","nazwa"); //bez diakritiky
define("v_smsprestashop_notfound","nie znaleziono"); //new //bez diakritiky


// SmsWizard.php
define("v_smswizard_ownsettings","Ustawienia SMS - Wybierz własny numer nadawcy dla ");
define("v_smswizard_ownnrsettings"," Ustawienia własnego numeru nadawcy");
define("v_smswizard_ownnrid"," Własny numer nadawcy ");
define("v_smswizard_existingown","Istniejący własny numer:");
define("v_smswizard_newownnrid","Nowy własny numer nadawcy:");
define("v_smswizard_intformat","W formacie międzynarodowym,<br />bez zer lub znaku “+”, np. 48501041324");
define("v_smswizard_smscode","Kod SMS:");
define("v_smswizard_confirm","POTWIERDŹ");
define("v_smswizard_required","Pole wymagane");
define("v_smswizard_textsettings","Ustawienia SMS - Wybierz nadawcę tekstu dla ");
define("v_smswizard_senderidsettings"," Ustawienia nadawcę tekstu:");
define("v_smswizard_existingsid","Istniejący nadawca tekstu:");
define("v_smswizard_newsid","Nowy nadawca tekstu:");
define("v_smswizard_maxchars","max. 11 znaków");
define("v_smswizard_smssettings","Ustawienia SMS");
define("v_smswizard_description","Określ typ nadawcy dla każdego kraju. (nadawca tekstu, własny numer telefonu komórkowego lub numer systemowy). Cena SMS zależy od kraju odbiorcy, typu nadawcy oraz kwoty do zapłaty. W przypadku krajów z nieokreślonym typem nadawcy będzie wykorzystany numer systemowy.");
define("v_smswizard_customersettings","Ustawienia SMS klienta");
define("v_smswizard_addcountry","DODAJ / ZMIEŃ wybrany kraj");
define("v_smswizard_sendertype","TYP NADAWCY");
define("v_smswizard_network","SIEĆ");
define("v_smswizard_smsprice","SMS PRICE<br />IN CREDITS");
define("v_smswizard_price","CENA SMS W EUR (bez VAT)");
define("v_smswizard_payment","Płatność");
define("v_smswizard_unicode","Unicode ");
define("v_smswizard_unicodetext","Wsparcie Unicode znaków (Unicode pozwala na wykorzystanie jednocześnie różnej czcionki, symboli i znaków. Jest on używany dla języków takich jak chiński, arabski, grecki, hebrajski, koreański, itp.).");
define("v_smswizard_textsid","TEKSTOWY  NUMER  NADAWCY");
define("v_smswizard_textsid2","Tekstowy numer nadawcy");
define("v_smswizard_systemnr","NUMER  SYSTEMOWY");
define("v_smswizard_ownnrsid","WŁASNY  NUMER  NADAWCY");
define("v_smswizard_simhosting","SIM  HOSTING");
define("v_smswizard_unicodesupported","UNICODE  OBSŁUGIWANY");
define("v_smswizard_nounicode","UNICODE NIE JEST OBSŁUGIWANY");
define("v_smswizard_savesettings","ZAPISZ  USTAWIENIA  SMS");
define("v_smswizard_suredelete","Czy na pewno chcesz usunąć");
define("v_smswizard_country","Wybierz kraj: ");
define("v_smswizard_notactive","Ustawienia SMS - nieaktywne");
define("v_smswizard_usernotactive","Profil użytkownika nie jest aktywny! Dokonaj rejestracji, klikając na zakładkę SMS w głównym menu. Moduł udostępni formularz rejestracyjny. Jeśli korzystałeś w przeszłości i znasz swoją nazwę użytkownika i hasło, należy wypełnić formularz dla istniejącego konta. W innym przypadku, wpisz adres e-mail, zaakceptuj warunki umowy licencyjnej i kliknij na \"Zarejestruj \".");
define("v_smswizard_error","Błąd");
define("v_smswizard_cantconnect","Nie można połączyć się z serwerem SMS");
define("v_smswizard_deleted"," został usunięty."); // country was deleted
define("v_smswizard_choosesender","Wybierz typ nadawcy");
define("v_smswizard_countrysaved"," został zapisany."); //country name was saved
define("v_smswizard_fillsid","Wypełnij własny numer nadawcy");
define("v_smswizard_mustbenumber"," własny numer nadawcy musi być liczbą");
define("v_smswizard_confirmcode","potwierdź poprawny kod SMS"); // ? correctly confirm sms code
define("v_smswizard_ownsidfor","Własny numer nadawcy dla ");
define("v_smswizard_wassaved"," został zapisany."); // Own number sender ID for(Text sender ID for ) ... was saved
define("v_smswizard_error2","Błąd - ");
define("v_smswizard_loginerror","Błąd logowania");
define("v_smswizard_retypecode","Teraz zmień kod sms");
define("v_smswizard_retypecode2","Teraz zmień kod sms. Wiadomość SMS zostanie wysłana w ciągu następnych 60 sekund.");
define("v_smswizard_wrongnrerror","error - błędny lub niedostępny numer ");
define("v_smswizard_unauthorizederror","Błąd - nieautoryzowane ID nadawcy w potwierdzającym SMS");
define("v_smswizard_lowcrediterror","Błąd - niski kredyt na wysyłanie wiadomości SMS");
define("v_smswizard_filltextsid","Wypełnij tekstowy numer nadawcy");
define("v_smswizard_filltextsid2","Wypełnij tekstowy numer nadawcy ,3-11 znaków");
define("v_smswizard_chars","dopuszczalne znaki:");
define("v_smswizard_nonumber","tekstowy numer nadawcy nie może być liczbą");
define("v_smswizard_textsidfor","tekstowy numer nadawcy dla ");
define("v_smswizard_adminsettings","Ustawianie Admin SMS"); // ?
define("v_smswizard_validate","ZATWIERDZIĆ"); //new
define("v_smswizard_smsvalidation","SMS walidacji"); //new
define("v_smswizard_confirmationcode","Kod: "); //new, bez diakritiky, pouzito v sms
define("v_smswizard_updatepricelist","Aktualizacja ceny"); //new
define("v_smswizard_eg","np.:"); //new
define("v_smswizard_pricelistupdated","Cennik został zaktualizowany."); //new
define("v_smswizard_edit","edycja"); //new
define("v_smswizard_delete","usuń"); //new




//new
define("v_smsprestashop_smscharging_fieldset","Twoje sklepy internetowe");
define("v_smsprestashop_smscharging","SMS opt-out");
define("v_smsprestashop_smscharging_h2","SMS opt-out - ustawienie wpisywania powiadomienia SMS z koszyka zakupowego i pobieranie opłat za SMS");
define("v_smsprestashop_smscharging_description","Wybierz sklep internetowy, w którym chcesz ustawić, aby klient w koszyku zakupowym miał możliwość wypisania wiadomości SMS, określ cenę SMS i zdefiniuj tekst, który jest widoczny dla klientów w koszyku.");
define("v_adminsmsprofile_prefer","W celu wysłania wiadomości SMS preferuj nr tel.z:");
define("v_adminsmsprofile_preferinvoice","adresu rozliczeniowego");
define("v_adminsmsprofile_preferdeliver","adresu wysyłkowego");
define("v_smsprestashop_smscharging_price","Cena wiadomości SMS");
define("v_smsprestashop_smscharging_texts","Tekst wyświetlany w koszyku");
define("v_smsprestashop_smscharging_active","Aktywuj funkcję podglądu SMS opt-out w koszyku");
define("v_smsprestashop_smscharging_optoutactive","SMS opt-out jest AKTYWNY");
define("v_smsprestashop_smscharging_optoutnotactive","SMS opt-out jest NIEAKTYWNY. Aktywacji SMS opt-out dokonasz wybierając opcję „Aktywuj funkcję podglądu SMS opt-out w koszyku“");
define("v_smsprestashop_smscharging_saved","Ustawienia funkcji SMS opt-out zostały pomyślnie zmienione");
define("v_smswizard_pricelistupdated_changed","Zmiana ceny wiadomości SMS dla następujących państw:");
define("v_smsprestashop_newversion","Dostępna jest nowa wersja:");

define("v_about_manual_text","Instrukcja (ENG):");
define("v_about_manual_url","www.presta-sms.com/manual.html");
define("v_about_supported_text","Obsługiwane wersje Prestashop:");
define("v_about_supported_text_ps","1.5.x");


define("v_contact_form","Formularz kontaktowy");

define("v_remove_duplicate","Usuń zduplikowane numery");



define("v_registration_type","Typ Rejestracja:");
define("v_registration_type_personal","Indywidualny");
define("v_registration_type_business","Firma");
define("v_registration_address","Adres");
define("v_registration_billing_information","Informacje o płatnościach");
define("v_registration_personal_contact","Osoba kontaktowa");


define("v_registration_company_name","Wpisz nazwę firmy.");
define("v_registration_vat_invalid","Nieprawidłowy VAT");





//stats new
define("v_statistics","Statystyka");
define("v_statistics_smsnotactive","Statystyka - nieaktywny");
define("v_statistics_day","dzień");
define("v_statistics_datefrom","Data od:");
define("v_statistics_dateto","do:");



// filter
define("v_filter_deleted_customers", "Klienci usunięte: ");
define("v_filter_more", "Więcej...");
define("v_filter_load", "Zapisane Filtry");
define("v_filter_save", "Zapisz filtr");
define("v_filter_clear", "Usuń filtr");
define("v_filter_name", "Nazwa filtra");
define("v_filter_date", "Data");
define("v_filter_been_apply", "Filtr został zastosowany.");
define("v_filter_been_saved", "Filtr został zapisany.");
define("v_filter_been_clear", "Filtr został zresetowany.");
define("v_filter_q_clear", "Czy na pewno chcesz zresetować filtr?");
define("v_filter_q_delete", "Czy na pewno chcesz usunąć ten filtr?");
define("v_filter_not_found", "Filtr nie został znaleziony.");
define("v_send_busy", "Przetwarzanie...");

// Template
define("v_template_load", "Zapisane szablony");
define("v_template_save", "Zapisz szablon");
define("v_template_name", "Nazwa szablonu");
define("v_template_been_apply", "Szablon został załadowany.");
define("v_template_been_saved", "Szablon został zapisany.");
define("v_template_q_delete", "Czy na pewno chcesz usunąć ten szablon?");
define("v_template_not_found", "Šablona nebyla nalezena.");
define("v_show_virtual", "Operatorów wirtualnych (MVNO)");

// Marketing
define("v_marketing_coupon", "Wybierz kupon");
define("v_marketing_coupon_create", "Stwórz kupon");
define("v_marketing_none", "Wybierz");
define("v_smshistory_simulation", "SYMULACJA");
define("v_smshistory_deleted", "USUNIĘTA");
define("v_smshistory_sheduled", "PLANOWANA");
define("v_smshistory_duplicate", "DUPLIKAT");
define("v_smshistory_dnd", "DO NOT DISTURB rejestr (DND)");
define("v_sendsms_addcsv_vcard","Dodaj odbiorców w pliku CSV (.csv, .txt) lub vCARD(.vcf)");

// Hooks v2
define("v_hook_return", "Powroty");
define("v_hook_return_customer", "Potwierdzamy powrót.");
define("v_hook_return_admin", "Nowy powrót.");
define("v_smsprestashop_return_status_admin","Stan zwrotu towarów nr: {return_id} zostanie zmieniony na ");
define("v_smsprestashop_return_status_admin2",". Informacje z {shop_name}.");
define("v_smsprestashop_return_status_customer","Szanowny kliencie, twoj stan zwrotu towarów {return_id} zostanie zmieniony na ");
define("v_smsprestashop_return_status_customer2",". Udanego dnia, {shop_name}.");

// OptOut
define("v_optout_auto_variable", "Dodaj produkt SMS do koszyka:");
define("v_optout_auto", "automatycznie");
define("v_optout_manual", "ręcznie");

// ZenCart
define("v_about_version_zen","Zen SMS moduł, wersja ");
define("v_about_supported_text_zen","Obsługiwane wersje ZenCart:");
define("v_about_supported_version_zen","1.3.x. - 1.5.x");
define("v_about_manual_url_zen","www.zen-sms.net/manual.html");
define("v_about_website_name_zen","www.zen-sms.net");
define("v_about_website_url_zen","www.zen-sms.net/pl/index.html");

define("v_smsprestashop_sqltemplate1_zen","Nowe zamowienie od {customer_firstname} {customer_lastname}, id: {customer_id}, zamowienie: {order_id}, platnosc: {order_payment}, kwota: {order_total_paid} {order_currency}. Zamowienie:  {order_products2}. Info z {shop_name}.");
define("v_smsprestashop_sqltemplate21_zen","Twoje zamowienie  {order_id} zostalo pomyslnie utworzone, platnosc: {order_payment}, kwota: {order_total_paid} {order_currency}. Udanego dnia, {shop_name}.");
define("v_smsprestashop_sqltemplate2_zen","Klient  {customer_firstname} {customer_lastname}, id: {customer_id}, Wlasnie dokonal rejestracji do {shop_name}.");
define("v_smsprestashop_sqltemplate22_zen","Szanowny Panie/ Szanowna Pani {customer_firstname} {customer_lastname}, twoje konto w {shop_name} zostalo pomyslnie utworzone. Nazwa użytkownika: {customer_email}. Udanego dnia!");
define("v_smsprestashop_sqltemplate3_zen","Klient {customer_firstname} {customer_lastname}, id: {customer_id}, zwrocil towar z zamowienia {order_id}. Zamowienie:   {orderReturn2}. Wiadomosc od klienta: {customer_question}. Info z {shop_name}."); // ???
define("v_smsprestashop_sqltemplate23_zen","Otrzymalismy Pana/i prosbe. zamowienie {order_id}. Udanego dnia, {shop_name}.");
define("v_smsprestashop_sqltemplate4_zen","W zamowieniu {ORDER_ID} zmieniono ilosc, {orderSlip2}. Info z {shop_name}."); // ?
define("v_smsprestashop_sqltemplate24_zen","W twoim zamowieniu numer {order_id} zostala zmieniona ilosc, , {orderSlip2}. Udanego dnia, {shop_name}.");
define("v_smsprestashop_sqltemplate5_zen","Potwierdzenie zaplaty, zamowienie nr: {order_id}, platnosc: {order_payment},  kwota: {order_total_paid} {order_currency}. Info z {shop_name}.");
define("v_smsprestashop_sqltemplate25_zen","Otrzymalismy zaplate za zamowienie  {order_id} poprzez {order_payment},  kwota: {order_total_paid} {order_currency}. Udanego dnia, {shop_name}.");
define("v_smsprestashop_sqltemplate62_zen","Zamowienie nr {order_id} zostalo zaktualizowane o numer przesylki {order_shipping_number} przydzielony przez dostawce. Info z {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_zen","Szanowny kliencie, towar z twojego zamowienia nr {order_id} zostal wyslany, numer przesylki przydzielony przez dostawce to {order_shipping_number}. Pozdrawiam, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_zen","Ten produkt zostal usuniety z {shop_name}, id: {product_id}, ref: {product_ref}, nazwa:  {product_name}. Usunal uzytkownik: {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_zen","Ilosc produktow ulegla zmianie, id: {product_id}, ref: {product_ref}, nazwa: {product_name}, nowa ilosc: {product_quantity}, dostawca: {product_supplier}. Info z {shop_name}.");
define("v_smsprestashop_sqltemplate9_zen","Mala ilosc produktu na stanie, id: {product_id}, ref: {product_ref}, nazwa: {product_name}, ilosc: {product_quantity}. Informacje z {shop_name}.");
define("v_smsprestashop_sqltemplate10_zen","W zamowieniu {order_id} zostal anulowany produkt id: {product_id}, ref: {product_ref}, nazwa: {product_name}. ilosc: {product_quantity}, anulowana ilosc: {product_quantity_reinjected}. informacje z {shop_name}."); // ? quantity reinjected
define("v_smsprestashop_sqltemplate11_zen","Stan zamowienia nr:  {order_id} zostanie zmieniony na ");
define("v_smsprestashop_sqltemplate111_zen",". Informacje z {shop_name}.");
define("v_smsprestashop_sqltemplate211_zen","Szanowny kliencie, twoj stan zamowienia  {order_id} zostanie zmieniony na");
define("v_smsprestashop_sqltemplate2111_zen",". Udanego dnia, {shop_name}.");






// OpenCart
define("v_about_version_oc","Cart SMS moduł, wersja ");
define("v_about_supported_text_oc","Obsługiwane wersje OpenCart:");
define("v_about_supported_version_oc","1.4.7 - 1.5.6.1");
define("v_about_manual_url_oc","www.cart-sms.com/manual.html");
define("v_about_website_name_oc","www.cart-sms.com");
define("v_about_website_url_oc","www.cart-sms.com/pl/index.html");

define("v_smsprestashop_sqltemplate1_oc","Nowe zamowienie od {customer_firstname} {customer_lastname}, id: {customer_id}, zamowienie: {order_id}, platnosc: {order_payment}, kwota: {order_total_paid} {order_currency}. Zamowienie:  {order_products2}. Info z {shop_name}.");
define("v_smsprestashop_sqltemplate21_oc","Twoje zamowienie  {order_id} zostalo pomyslnie utworzone, platnosc: {order_payment}, kwota: {order_total_paid} {order_currency}. Udanego dnia, {shop_name}.");
define("v_smsprestashop_sqltemplate2_oc","Klient  {customer_firstname} {customer_lastname}, id: {customer_id}, Wlasnie dokonal rejestracji do {shop_name}.");
define("v_smsprestashop_sqltemplate22_oc","Szanowny Panie/ Szanowna Pani {customer_firstname} {customer_lastname}, twoje konto w {shop_name} zostalo pomyslnie utworzone. Nazwa użytkownika: {customer_email}. Udanego dnia!");
define("v_smsprestashop_sqltemplate3_oc","Klient {customer_firstname} {customer_lastname}, id: {customer_id}, zwrocil towar z zamowienia {order_id}. Zamowienie:   {orderReturn2}. Wiadomosc od klienta: {customer_question}. Info z {shop_name}."); // ???
define("v_smsprestashop_sqltemplate23_oc","Otrzymalismy Pana/i prosbe. zamowienie {order_id}. Udanego dnia, {shop_name}.");
define("v_smsprestashop_sqltemplate4_oc","W zamowieniu {ORDER_ID} zmieniono ilosc, {orderSlip2}. Info z {shop_name}."); // ?
define("v_smsprestashop_sqltemplate24_oc","W twoim zamowieniu numer {order_id} zostala zmieniona ilosc, , {orderSlip2}. Udanego dnia, {shop_name}.");
define("v_smsprestashop_sqltemplate5_oc","Potwierdzenie zaplaty, zamowienie nr: {order_id}, platnosc: {order_payment},  kwota: {order_total_paid} {order_currency}. Info z {shop_name}.");
define("v_smsprestashop_sqltemplate25_oc","Otrzymalismy zaplate za zamowienie  {order_id} poprzez {order_payment},  kwota: {order_total_paid} {order_currency}. Udanego dnia, {shop_name}.");
define("v_smsprestashop_sqltemplate62_oc","Zamowienie nr {order_id} zostalo zaktualizowane o numer przesylki {order_shipping_number} przydzielony przez dostawce. Info z {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_oc","Szanowny kliencie, towar z twojego zamowienia nr {order_id} zostal wyslany, numer przesylki przydzielony przez dostawce to {order_shipping_number}. Pozdrawiam, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_oc","Ten produkt zostal usuniety z {shop_name}, id: {product_id}, ref: {product_ref}, nazwa:  {product_name}. Usunal uzytkownik: {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_oc","Ilosc produktow ulegla zmianie, id: {product_id}, ref: {product_ref}, nazwa: {product_name}, nowa ilosc: {product_quantity}, dostawca: {product_supplier}. Info z {shop_name}.");
define("v_smsprestashop_sqltemplate9_oc","Mala ilosc produktu na stanie, id: {product_id}, ref: {product_ref}, nazwa: {product_name}, ilosc: {product_quantity}. Informacje z {shop_name}.");
define("v_smsprestashop_sqltemplate10_oc","W zamowieniu {order_id} zostal anulowany produkt id: {product_id}, ref: {product_ref}, nazwa: {product_name}. ilosc: {product_quantity}, anulowana ilosc: {product_quantity_reinjected}. informacje z {shop_name}."); // ? quantity reinjected
define("v_smsprestashop_sqltemplate11_oc","Stan zamowienia nr:  {order_id} zostanie zmieniony na ");
define("v_smsprestashop_sqltemplate111_oc",". Informacje z {shop_name}.");
define("v_smsprestashop_sqltemplate211_oc","Szanowny kliencie, twoj stan zamowienia  {order_id} zostanie zmieniony na");
define("v_smsprestashop_sqltemplate2111_oc",". Udanego dnia, {shop_name}.");







// OsCommerce
define("v_about_version_os","smsCommerce moduł, wersja ");
define("v_about_supported_text_os","Obsługiwane wersje OsCommerce:");
define("v_about_supported_version_os","2.3.x");
define("v_about_manual_url_os","www.sms-commerce.net/manual.html");
define("v_about_website_name_os","www.sms-commerce.net");
define("v_about_website_url_os","www.sms-commerce.net/pl/index.html");

define("v_smsprestashop_sqltemplate1_os","Nowe zamowienie od {customer_firstname} {customer_lastname}, id: {customer_id}, zamowienie: {order_id}, platnosc: {order_payment}, kwota: {order_total_paid} {order_currency}. Zamowienie:  {order_products2}. Info z {shop_name}.");
define("v_smsprestashop_sqltemplate21_os","Twoje zamowienie  {order_id} zostalo pomyslnie utworzone, platnosc: {order_payment}, kwota: {order_total_paid} {order_currency}. Udanego dnia, {shop_name}.");
define("v_smsprestashop_sqltemplate2_os","Klient  {customer_firstname} {customer_lastname}, id: {customer_id}, Wlasnie dokonal rejestracji do {shop_name}.");
define("v_smsprestashop_sqltemplate22_os","Szanowny Panie/ Szanowna Pani {customer_firstname} {customer_lastname}, twoje konto w {shop_name} zostalo pomyslnie utworzone. Nazwa użytkownika: {customer_email}. Udanego dnia!");
define("v_smsprestashop_sqltemplate3_os","Klient {customer_firstname} {customer_lastname}, id: {customer_id}, zwrocil towar z zamowienia {order_id}. Zamowienie:   {orderReturn2}. Wiadomosc od klienta: {customer_question}. Info z {shop_name}."); // ???
define("v_smsprestashop_sqltemplate23_os","Otrzymalismy Pana/i prosbe. zamowienie {order_id}. Udanego dnia, {shop_name}.");
define("v_smsprestashop_sqltemplate4_os","W zamowieniu {ORDER_ID} zmieniono ilosc, {orderSlip2}. Info z {shop_name}."); // ?
define("v_smsprestashop_sqltemplate24_os","W twoim zamowieniu numer {order_id} zostala zmieniona ilosc, , {orderSlip2}. Udanego dnia, {shop_name}.");
define("v_smsprestashop_sqltemplate5_os","Potwierdzenie zaplaty, zamowienie nr: {order_id}, platnosc: {order_payment},  kwota: {order_total_paid} {order_currency}. Info z {shop_name}.");
define("v_smsprestashop_sqltemplate25_os","Otrzymalismy zaplate za zamowienie  {order_id} poprzez {order_payment},  kwota: {order_total_paid} {order_currency}. Udanego dnia, {shop_name}.");
define("v_smsprestashop_sqltemplate62_os","Zamowienie nr {order_id} zostalo zaktualizowane o numer przesylki {order_shipping_number} przydzielony przez dostawce. Info z {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_os","Szanowny kliencie, towar z twojego zamowienia nr {order_id} zostal wyslany, numer przesylki przydzielony przez dostawce to {order_shipping_number}. Pozdrawiam, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_os","Ten produkt zostal usuniety z {shop_name}, id: {product_id}, ref: {product_ref}, nazwa:  {product_name}. Usunal uzytkownik: {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_os","Ilosc produktow ulegla zmianie, id: {product_id}, ref: {product_ref}, nazwa: {product_name}, nowa ilosc: {product_quantity}, dostawca: {product_supplier}. Info z {shop_name}.");
define("v_smsprestashop_sqltemplate9_os","Mala ilosc produktu na stanie, id: {product_id}, ref: {product_ref}, nazwa: {product_name}, ilosc: {product_quantity}. Informacje z {shop_name}.");
define("v_smsprestashop_sqltemplate10_os","W zamowieniu {order_id} zostal anulowany produkt id: {product_id}, ref: {product_ref}, nazwa: {product_name}. ilosc: {product_quantity}, anulowana ilosc: {product_quantity_reinjected}. informacje z {shop_name}."); // ? quantity reinjected
define("v_smsprestashop_sqltemplate11_os","Stan zamowienia nr:  {order_id} zostanie zmieniony na ");
define("v_smsprestashop_sqltemplate111_os",". Informacje z {shop_name}.");
define("v_smsprestashop_sqltemplate211_os","Szanowny kliencie, twoj stan zamowienia  {order_id} zostanie zmieniony na");
define("v_smsprestashop_sqltemplate2111_os",". Udanego dnia, {shop_name}.");







// Virtuemart
define("v_about_version_vm","Virtue SMS moduł, wersja ");
define("v_about_supported_text_vm","Obsługiwane wersje Virtuemart:");
define("v_about_supported_version_vm","2.3.x");
define("v_about_manual_url_vm","www.virtue-sms.net/manual.html");
define("v_about_website_name_vm","www.virtue-sms.net");
define("v_about_website_url_vm","www.virtue-sms.net/pl/index.html");

define("v_smsprestashop_sqltemplate1_vm","Nowe zamowienie od {customer_firstname} {customer_lastname}, id: {customer_id}, zamowienie: {order_id}, platnosc: {order_payment}, kwota: {order_total_paid} {order_currency}. Zamowienie:  {order_products2}. Info z {shop_name}.");
define("v_smsprestashop_sqltemplate21_vm","Twoje zamowienie  {order_id} zostalo pomyslnie utworzone, platnosc: {order_payment}, kwota: {order_total_paid} {order_currency}. Udanego dnia, {shop_name}.");
define("v_smsprestashop_sqltemplate2_vm","Klient  {customer_firstname} {customer_lastname}, id: {customer_id}, Wlasnie dokonal rejestracji do {shop_name}.");
define("v_smsprestashop_sqltemplate22_vm","Szanowny Panie/ Szanowna Pani {customer_firstname} {customer_lastname}, twoje konto w {shop_name} zostalo pomyslnie utworzone. Nazwa użytkownika: {customer_email}. Udanego dnia!");
define("v_smsprestashop_sqltemplate3_vm","Klient {customer_firstname} {customer_lastname}, id: {customer_id}, zwrocil towar z zamowienia {order_id}. Zamowienie:   {orderReturn2}. Wiadomosc od klienta: {customer_question}. Info z {shop_name}."); // ???
define("v_smsprestashop_sqltemplate23_vm","Otrzymalismy Pana/i prosbe. zamowienie {order_id}. Udanego dnia, {shop_name}.");
define("v_smsprestashop_sqltemplate4_vm","W zamowieniu {ORDER_ID} zmieniono ilosc, {orderSlip2}. Info z {shop_name}."); // ?
define("v_smsprestashop_sqltemplate24_vm","W twoim zamowieniu numer {order_id} zostala zmieniona ilosc, , {orderSlip2}. Udanego dnia, {shop_name}.");
define("v_smsprestashop_sqltemplate5_vm","Potwierdzenie zaplaty, zamowienie nr: {order_id}, platnosc: {order_payment},  kwota: {order_total_paid} {order_currency}. Info z {shop_name}.");
define("v_smsprestashop_sqltemplate25_vm","Otrzymalismy zaplate za zamowienie  {order_id} poprzez {order_payment},  kwota: {order_total_paid} {order_currency}. Udanego dnia, {shop_name}.");
define("v_smsprestashop_sqltemplate62_vm","Zamowienie nr {order_id} zostalo zaktualizowane o numer przesylki {order_shipping_number} przydzielony przez dostawce. Info z {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_vm","Szanowny kliencie, towar z twojego zamowienia nr {order_id} zostal wyslany, numer przesylki przydzielony przez dostawce to {order_shipping_number}. Pozdrawiam, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_vm","Ten produkt zostal usuniety z {shop_name}, id: {product_id}, ref: {product_ref}, nazwa:  {product_name}. Usunal uzytkownik: {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_vm","Ilosc produktow ulegla zmianie, id: {product_id}, ref: {product_ref}, nazwa: {product_name}, nowa ilosc: {product_quantity}, dostawca: {product_supplier}. Info z {shop_name}.");
define("v_smsprestashop_sqltemplate9_vm","Mala ilosc produktu na stanie, id: {product_id}, ref: {product_ref}, nazwa: {product_name}, ilosc: {product_quantity}. Informacje z {shop_name}.");
define("v_smsprestashop_sqltemplate10_vm","W zamowieniu {order_id} zostal anulowany produkt id: {product_id}, ref: {product_ref}, nazwa: {product_name}. ilosc: {product_quantity}, anulowana ilosc: {product_quantity_reinjected}. informacje z {shop_name}."); // ? quantity reinjected
define("v_smsprestashop_sqltemplate11_vm","Stan zamowienia nr:  {order_id} zostanie zmieniony na ");
define("v_smsprestashop_sqltemplate111_vm",". Informacje z {shop_name}.");
define("v_smsprestashop_sqltemplate211_vm","Szanowny kliencie, twoj stan zamowienia  {order_id} zostanie zmieniony na");
define("v_smsprestashop_sqltemplate2111_vm",". Udanego dnia, {shop_name}.");









// Magento
define("v_about_version_ms","Mage SMS moduł, wersja ");
define("v_about_supported_text_ms","Obsługiwane wersje Magento:");
define("v_about_supported_version_ms","1.6.x - 1.7.x");
define("v_about_manual_url_ms","www.mage-sms.com/manual.html");
define("v_about_website_name_ms","www.mage-sms.com");
define("v_about_website_url_ms","www.mage-sms.com/pl/index.html");

define("v_smsprestashop_sqltemplate1_ms","Nowe zamowienie od {customer_firstname} {customer_lastname}, id: {customer_id}, zamowienie: {order_id}, platnosc: {order_payment}, kwota: {order_total_paid} {order_currency}. Zamowienie:  {order_products2}. Info z {shop_name}.");
define("v_smsprestashop_sqltemplate21_ms","Twoje zamowienie  {order_id} zostalo pomyslnie utworzone, platnosc: {order_payment}, kwota: {order_total_paid} {order_currency}. Udanego dnia, {shop_name}.");
define("v_smsprestashop_sqltemplate2_ms","Klient  {customer_firstname} {customer_lastname}, id: {customer_id}, Wlasnie dokonal rejestracji do {shop_name}.");
define("v_smsprestashop_sqltemplate22_ms","Szanowny Panie/ Szanowna Pani {customer_firstname} {customer_lastname}, twoje konto w {shop_name} zostalo pomyslnie utworzone. Nazwa użytkownika: {customer_email}. Udanego dnia!");
define("v_smsprestashop_sqltemplate3_ms","Klient {customer_firstname} {customer_lastname}, id: {customer_id}, zwrocil towar z zamowienia {order_id}. Zamowienie:   {orderReturn2}. Wiadomosc od klienta: {customer_question}. Info z {shop_name}."); // ???
define("v_smsprestashop_sqltemplate23_ms","Otrzymalismy Pana/i prosbe. zamowienie {order_id}. Udanego dnia, {shop_name}.");
define("v_smsprestashop_sqltemplate4_ms","W zamowieniu {ORDER_ID} zmieniono ilosc, {orderSlip2}. Info z {shop_name}."); // ?
define("v_smsprestashop_sqltemplate24_ms","W twoim zamowieniu numer {order_id} zostala zmieniona ilosc, , {orderSlip2}. Udanego dnia, {shop_name}.");
define("v_smsprestashop_sqltemplate5_ms","Potwierdzenie zaplaty, zamowienie nr: {order_id}, platnosc: {order_payment},  kwota: {order_total_paid} {order_currency}. Info z {shop_name}.");
define("v_smsprestashop_sqltemplate25_ms","Otrzymalismy zaplate za zamowienie  {order_id} poprzez {order_payment},  kwota: {order_total_paid} {order_currency}. Udanego dnia, {shop_name}.");
define("v_smsprestashop_sqltemplate62_ms","Zamowienie nr {order_id} zostalo zaktualizowane o numer przesylki {order_shipping_number} przydzielony przez dostawce. Info z {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_ms","Szanowny kliencie, towar z twojego zamowienia nr {order_id} zostal wyslany, numer przesylki przydzielony przez dostawce to {order_shipping_number}. Pozdrawiam, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_ms","Ten produkt zostal usuniety z {shop_name}, id: {product_id}, ref: {product_ref}, nazwa:  {product_name}. Usunal uzytkownik: {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_ms","Ilosc produktow ulegla zmianie, id: {product_id}, ref: {product_ref}, nazwa: {product_name}, nowa ilosc: {product_quantity}, dostawca: {product_supplier}. Info z {shop_name}.");
define("v_smsprestashop_sqltemplate9_ms","Mala ilosc produktu na stanie, id: {product_id}, ref: {product_ref}, nazwa: {product_name}, ilosc: {product_quantity}. Informacje z {shop_name}.");
define("v_smsprestashop_sqltemplate10_ms","W zamowieniu {order_id} zostal anulowany produkt id: {product_id}, ref: {product_ref}, nazwa: {product_name}. ilosc: {product_quantity}, anulowana ilosc: {product_quantity_reinjected}. informacje z {shop_name}."); // ? quantity reinjected
define("v_smsprestashop_sqltemplate11_ms","Stan zamowienia nr:  {order_id} zostanie zmieniony na ");
define("v_smsprestashop_sqltemplate111_ms",". Informacje z {shop_name}.");
define("v_smsprestashop_sqltemplate211_ms","Szanowny kliencie, twoj stan zamowienia  {order_id} zostanie zmieniony na");
define("v_smsprestashop_sqltemplate2111_ms",". Udanego dnia, {shop_name}.");










?>