<?php


define("lang_iso_code","ru");
define("smscurrency","EUR");


define("lang_alphabet","А;Б;В;Г;Д;Е;Ё;Ж;З;И;Й;К;Л;М;Н;О;П;Р;С;Т;У;Ф;Х;Ц;Ч;Ш;Щ;Ъ;Ы;Ь;Э;Ю;Я;A;B;C;D;E;F;G;H;I;J;K;L;M;N;O;P;Q;R;S;T;U;V;W;X;Y;Z");



//new
define("v_all_years","все годы");
define("v_menu_setting", "Настройки");




// About.php
define("v_about_about","О нас");
define("v_about_version","Presta CMC Модуль, версия ");
define("v_about_copyright","Copyright © TOPefekt s.r.o., Все права защищены");
define("v_about_developer","Разработчик");
define("v_about_topefekt","TOPefekt s.r.o.");
define("v_about_address","Адрес:");
define("v_about_street","ул. Б. Немцовой, 767/13");
define("v_about_city","78701 Шумперк");
define("v_about_state","Чехия");
define("v_about_vat","ИНН: CZ29444268");
define("v_about_phone","Номер телефона");
define("v_about_phonenr","+420 581 110 998");
define("v_about_mail","E-mail:");
define("v_about_mailsales","sales@topefekt.com");
define("v_about_mailsupport","support@topefekt.com");
define("v_about_web","Web:");
define("v_about_website_name","www.presta-sms.com");
define("v_about_website_url","www.presta-sms.com/ru/index.html");

// AdminSms.php
define("v_adminsms_adminsms","Админ СМС");
define("v_adminsms_description","Выберите события, о которых администраторы магазина будут уведомлены с помощью СМС сообщений, и определите текст этих сообщений.");
define("v_adminsms_unicodesms","СМС Юникод");
define("v_adminsms_unicode"," Юникод ");
define("v_adminsms_unicodetext","Отметьте только в случае использования диакритических знаков, либо таких языков, как русский, китайский, арабский, греческий, иврит, корейский и т.п. (Юникод позволяет одновременно использовать разные шрифты и символы. Количество символов в Юникод сообщении равно 70).");
define("v_adminsms_unicodesave","Сохранить");
define("v_adminsms_smsactive","СМС рассылка АКТИВНА");
define("v_adminsms_smsnotactive","СМС рассылка НЕАКТИВНА. Активируйте отправку СМС уведомлений с помощью выбора как минимум одного администратора");
define("v_adminsms_statusupdate","Обновление статуса заказа");
define("v_adminsms_account","Аккаунт");
define("v_adminsms_product","Продукт");
define("v_adminsms_orderstatus","Статус заказа");
define("v_adminsms_order","Заказ");
define("v_adminsms_adminsmsnotactive","Система Админ СМС неактивна");
define("v_adminsms_addadmin","Выберите, пожалуйста, хотя бы одного администратора!");
define("v_adminsms_usernotactive","Профиль пользователя неактивен! Для регистрации нажмите на вкладку СМС в главном меню. Модуль отобразит окно для ввода регистрационных данных. Используйте модуль, с которым Вы уже работали. Введите имя пользователя и пароль для существующей учетной записи. В противном случае, заполните графу \"электронная почта\", примите условия лицензионного соглашения и нажмите \"зарегистрироваться\".");
define("v_adminsms_invalidtext","Неверный текст СМС сообщения");
define("v_adminsms_smssaved","Текст СМС сообщения был сохранен");
define("v_adminsms_unicodesaved","Юникод сохранен");
define("v_adminsms_jschar","Символ");
define("v_adminsms_jschars","Символов: ");
define("v_adminsms_jslabel","Значок-уведомление");
define("v_adminsms_jssmstext","Текст СМС сообщения");
define("v_adminsms_jstotalsms","Всего СМС:");
define("v_adminsms_smstext","Текст СМС сообщения");
define("v_adminsms_preview","Предварительный просмотр");
define("v_adminsms_admins","Администраторы");
define("v_adminsms_save","Сохранить");
define("v_adminsms_cancel","Отмена");
define("v_adminsms_restoreunsaved","Не сохранять изменения, вернуться к исходному состоянию."); //new


// AdminSmsProfile.php
define("v_adminsmsprofile_profilenotactive","Профиль пользователя неактивен");
define("v_adminsmsprofile_profileactive","Профиль пользователя активен");
define("v_adminsmsprofile_newaccount","Новая учетная запись пользователя");
define("v_adminsmsprofile_notregistered","Вы еще не зарегистрированы? Зарегистрируйтесь прямо сейчас!");
define("v_adminsmsprofile_email","Email:");
define("v_adminsmsprofile_company","Название фирмы:");
define("v_adminsmsprofile_street","Улица:");
define("v_adminsmsprofile_city","Город:");
define("v_adminsmsprofile_zip","Почтовый индекс:");
define("v_adminsmsprofile_country","Страна:");
define("v_adminsmsprofile_id","Идентификационный номер предприятия:");
define("v_adminsmsprofile_vat","Идентификационный номер налогоплательщика:");
define("v_adminsmsprofile_refererid","ID аккаунта:");
define("v_adminsmsprofile_licence","Просмотр лицензионного соглашения:");
define("v_adminsmsprofile_agree","Я согласен");
define("v_adminsmsprofile_notagree","Я не согласен");
define("v_adminsmsprofile_register","Зарегистрироваться");
define("v_adminsmsprofile_required","Обязательные поля");
define("v_adminsmsprofile_sign","Войти");
define("v_adminsmsprofile_signtext","Если у Вас уже есть учетная запись, пожалуйста, войдите");
define("v_adminsmsprofile_username","Пользователь:");
define("v_adminsmsprofile_password","Пароль:");
define("v_adminsmsprofile_login","Войти");
define("v_adminsmsprofile_editaccount","Учетная запись пользователя");
//define("v_adminsmsprofile_editaccount","Редактировать учетную запись пользователя");
define("v_adminsmsprofile_save","Сохранить");
define("v_adminsmsprofile_accountinfo","Информация о пользователе");
define("v_adminsmsprofile_credit","Количество СМС:");
define("v_adminsmsprofile_addadmin","Добавить администратора");
define("v_adminsmsprofile_name","Имя:");
define("v_adminsmsprofile_mobilenr","Номер мобильного телефона:");
define("v_adminsmsprofile_edit","Редактировать");
define("v_adminsmsprofile_add","Сохранить");
define("v_adminsmsprofile_settings","Другие настройки");
define("v_adminsmsprofile_simulate","Симулировать СМС рассылку:");
define("v_adminsmsprofile_simulatehint","Позволяет протестировать параметры отправки СМС и отобразить отправленные сообщения во вкладке СМС-Журналы");
define("v_adminsmsprofile_deletedb","Удалить базу данных:");
define("v_adminsmsprofile_deletedbhint","Позволяет решить, следует ли сохранить существующие настройки, а также базы данных отправленных СМС в случае удаления СМС модуля.");
define("v_adminsmsprofile_report","Отчеты о доставке:");
define("v_adminsmsprofile_reporthint","Позволяет осуществлять просмотр отчетов о доставке СМС во вкладке Журналы");
define("v_adminsmsprofile_lowcredit","Обратите внимание на недостаточное количество электронных средств:");
define("v_adminsmsprofile_lowcredithint","Позволяет получить e-mail уведомление о недостаточном количестве СМС на счету");
define("v_adminsmsprofile_dremail","Email для получения подтверждения о доставке:");
define("v_adminsmsprofile_dremailhint","Позволяет получить е-mail, информирующий о доставке СМС сообщения");
define("v_adminsmsprofile_admincreated","Администратор был создан");
define("v_adminsmsprofile_agreetext","Вы должны принять условия лицензионного соглашения");
define("v_adminsmsprofile_accountcreated","Регистрация была проведена успешно. На Ваш элекронный адрес Вам отправлено письмо, подтверждающее Ваш адрес, а также бесплатное получение 5 бонусов.");
define("v_adminsmsprofile_addaccounttext","Дополнительный аккаунт может быть создан через");
define("v_adminsmsprofile_minutes","минут");
define("v_adminsmsprofile_cantconnect","отсутствует соединение с СМС-сервером");
define("v_adminsmsprofile_loginok","Вы были успешно авторизованы");
define("v_adminsmsprofile_error","ошибка");
define("v_adminsmsprofile_invalidemail","Неверный адрес электронной почты для получения отчетов о доставке");
define("v_adminsmsprofile_invalidemail2","Неверный адрес электронной почты");
define("v_adminsmsprofile_accountchanged","Аккаунт был успешно изменен");
define("v_adminsmsprofile_accountchanged2","Аккаунт был изменен, но mодуль URL для получения отчетов о доставке не отвечает");
define("v_adminsmsprofile_changeaccounttext","Аккаунт может быть изменен через");
define("v_adminsmsprofile_seeconds","секунд");
define("v_adminsmsprofile_invalidname","Неверное имя пользователя");
define("v_adminsmsprofile_invalidnumber","Неверный номер");
define("v_adminsmsprofile_adminchanged","Администратор был изменен");
define("v_adminsmsprofile_admindeleted","Администратор был удален");
define("v_adminsmsprofile_nochanges","Изменения не были успешно внесены");
define("v_adminsmsprofile_loginerror","Не удалось войти в систему");
define("v_adminsmsprofile_confirmdelete","Вы уверены, что хотите удалить");
define("v_adminsmsprofile_deleteadmin","УДАЛИТЬ администратора");
define("v_adminsmsprofile_editadmin","ИЗМЕНИТЬ администратора");
define("v_adminsmsprofile_intformat","в международном формате, без ведущих нулей или знака +, например, 79636123456");
define("v_adminsmsprofile_uninstall","(При удалении)");
define("v_adminsmsprofile_noalert","(0 = без предупреждений)");
define("v_adminsmsprofile_filluser","Введите имя пользователя и пароль");



// CustomerSms.php
define("v_customersms_customersms","СМС клиента -");
define("v_customersms_notactive","СМС клиента - неактивно");
define("v_customersms_langversion","язык");
define("v_customersms_description","Выберите события, о которых клиент будет уведомлен с помощью СМС сообщений, и определите текст этих сообщений. Для разных стран могут быть созданы различные языковые версии сообщений СМС. В странах, где язык СМС сообщений не будет определяться автоматически, будет использована версия по умолчанию.");
define("v_customersms_addsms","Добавить новую языковую версию СМС сообщения");
define("v_customersms_country","Выберите страну: ");
define("v_customersms_unicodesms","СМС Юникод");
define("v_customersms_unicodetext","Отметьте только в случае использования диакритических знаков, либо таких языков, как русский, китайский, арабский, греческий, иврит, корейский и т.п. (Юникод позволяет одновременно использовать разные шрифты и символы. Количество символов в Юникод сообщении равно 70).");
define("v_customersms_orderstatus","Статус заказа");
define("v_customersms_smsactive","СМС рассылка АКТИВНА");
define("v_customersms_smsnotactive","СМС рассылка НЕАКТИВНА. Активируйте отправку СМС уведомлений с помощью выбора параметра \"Активна\" во вкладке желаемых настроек пользователя"); // edit
define("v_customersms_statusupdate","Обновление статуса заказа");
define("v_customersms_account","Аккаунт");
define("v_customersms_usernotactive","Профиль пользователя неактивен! Для регистрации нажмите на вкладку СМС в главном меню. Модуль отобразит окно для ввода регистрационных данных. Используйте модуль, с которым Вы уже работали. Введите имя пользователя и пароль для существующей учетной записи. В противном случае, заполните графу \"электронная почта\", примите условия лицензионного соглашения и нажмите \"зарегистрироваться\".");
define("v_customersms_invalidtext","Неверный текст СМС сообщения");
define("v_customersms_smssaved","Текст СМС сообщения был сохранен");
define("v_customersms_smsdeleted","Новая языковая версия СМС сообщения была удалена");
define("v_customersms_confirmdelete","Вы уверены, что хотите удалить");
define("v_customersms_langdelete","УДАЛИТЬ новую языковую версию СМС сообщения");
define("v_customersms_smstext","Текст СМС сообщения");
define("v_customersms_unicode"," Юникод");
define("v_customersms_versionfor","Новая языковая версия СМС сообщения для ");
define("v_customersms_wassaved"," была сохранена");
define("v_customersms_preview","Предварительный просмотр");
define("v_customersms_active","Активен");
define("v_customersms_save","Сохранить");
define("v_customersms_cancel","Отмена");
define("v_customersms_jstotalsms","всего СМС:");
define("v_customersms_editlang","Редактировать новую языковую версию СМС сообщения");
define("v_customersms_default","по умолчанию");
define("v_customersms_edit","Редактировать");
define("v_customersms_add","Сохранить");
define("v_customersms_order","Заказ");
define("v_customersms_jschars","Символов: ");
define("v_customersms_unicodesaved","Юникод был сохранен");
define("v_customersms_restoreunsaved","Не сохранять изменения, вернуться к исходному состоянию."); //new




//PayPal.php
define("v_paypal_credit","Пополнить счет");
define("v_paypal_creditnotactive","Пополнение счета - неактивно");
define("v_paypal_usernotactive","Профиль пользователя неактивен! Для регистрации нажмите на вкладку СМС в главном меню. Модуль отобразит окно для ввода регистрационных данных. Используйте модуль, с которым Вы уже работали. Введите имя пользователя и пароль для существующей учетной записи. В противном случае, заполните графу \"электронная почта\", примите условия лицензионного соглашения и нажмите \"зарегистрироваться\".");
define("v_paypal_clickhereif","В случае неотображения способов пополнения счета, нажмите, пожалуйста, здесь:"); //new

//SendSms.php
define("v_sendsms_bulksms","Текст СМС массовой рассылки");
define("v_sendsms_addrecipients","Добавьте получателя");
define("v_sendsms_addtext","Добавьте одного или нескольких получателей, разделенных запятыми. Номер необходимо ввести в международном формате, без ведущих нулей или знака +");
define("v_sendsms_eg"," например, 79636123456");
define("v_sendsms_entertext","Введите текст СМС сообщения");
define("v_sendsms_addcsv","Добавьте получателей с помощью значений, разделенных запятыми (CSV формат)");
define("v_sendsms_csvtext","CSV файл - 1 колонка, 1-й столбец - номер (в международном формате, без ведущих нулей или знака +, например, 79636123456)");
define("v_sendsms_unicode"," Юникод");
define("v_sendsms_unicodetext","Отметьте только в случае использования диакритических знаков, либо таких языков, как русский, китайский, арабский, греческий, иврит, корейский и т.п. (Юникод позволяет одновременно использовать разные шрифты и символы. Количество символов в Юникод сообщении равно 70).");
define("v_sendsms_time","Настройка времени: ");
define("v_sendsms_time2","Время: ");
define("v_sendsms_timezone","Часовой пояс: ");
define("v_sendsms_timezone2","Настройка часового пояса");
define("v_sendsms_longtext","Тескт слишком длинный");
define("v_sendsms_sendsms","Отправить СМС");
define("v_sendsms_send","Отправить");
define("v_sendsms_sendtext","Отправка СМС или СМС массовой рассылки. Введите номера телефонов или используйте CSV формат отправки сообщений");
define("v_sendsms_smsnotactive","Отправка СМС - неактивна");
define("v_sendsms_usernotactive","Профиль пользователя неактивен! Для регистрации нажмите на вкладку СМС в главном меню. Модуль отобразит окно для ввода регистрационных данных. Используйте модуль, с которым Вы уже работали. Введите имя пользователя и пароль для существующей учетной записи. В противном случае, заполните графу \"электронная почта\", примите условия лицензионного соглашения и нажмите \"зарегистрироваться\".");
define("v_sendsms_fillsms","Введите текст СМС сообщения");
define("v_sendsms_smslong","Текст СМС сообщения слишком длинный (максимально 612 символов)");
define("v_sendsms_unicodesmslong","Текст СМС сообщения слишком длинный (максимально 268 юникод символов)");
define("v_sendsms_wrongtime","Неправильное время отправки SMS");
define("v_sendsms_norecipients","Найдено получателей: 0");
define("v_sendsms_lowcreditall","У Вас недостаточно средств на счету, чтобы отправить СМС всем");
define("v_sendsms_recipients","получателям");
define("v_sendsms_smssent","СМС сообщение отправлено");
define("v_sendsms_smssaved","СМС сообщение сохранено");
define("v_sendsms_wrongnumber","Неверно набранный номер или номер вне зоны доступа");
define("v_sendsms_unauthorized","неавторизованный ID отправителя в ответной СМС");
define("v_sendsms_lowcredit","Недостаточно средств на счету для отправки СМС сообщения");
define("v_sendsms_nounicode","юникод не поддерживается");
define("v_sendsms_cantconnect","отсутствует соединение с СМС-сервером");
define("v_sendsms_simulation","Симуляция СМС рассылки (Отправка СМС сообщения симулирована. Адресат не получит СМС сообщение)");
define("v_sendsms_simulationconfirm","СМС сообщение послано (симуляция)");
define("v_sendsms_error","ошибка");
define("v_sendsms_loginerror","ошибка авторизации");
define("v_sendsms_sendlater"," Отправить позже");
define("v_sendsms_jschars","Символов: ");
define("v_sendsms_hr","1 час");
define("v_sendsms_date","Дата: ");

// SmsAnswers.php
define("v_smsanswers_smsanswers","СМС ответы");
define("v_smsanswers_description","СМС-ответ от клиента отображается только в случае получения клиентом из вашего магазина СМС сообщения с отправителем типа \"системный номер\" при условии, что клиент ответит на сообщение со своего номера телефона");
define("v_smsanswers_show","Открыть");
define("v_smsanswers_results","Результаты поиска");
define("v_smsanswers_of","из");
define("v_smsanswers_smscenter","СМС центр");
define("v_smsanswers_date","Дата");
define("v_smsanswers_number","С номера");
define("v_smsanswers_new","Новый");
define("v_smsanswers_previous","Предыдущий");
define("v_smsanswers_next","Следующий");
define("v_smsanswers_page","Страница:");
define("v_smsanswers_smsnotactive","СМС ответы - неактивны");
define("v_smsanswers_usernotactive","Профиль пользователя неактивен! Для регистрации нажмите на вкладку СМС в главном меню. Модуль отобразит окно для ввода регистрационных данных. Используйте модуль, с которым Вы уже работали. Введите имя пользователя и пароль для существующей учетной записи. В противном случае, заполните графу \"электронная почта\", примите условия лицензионного соглашения и нажмите \"зарегистрироваться\".");
define("v_smsanswers_year","год");
define("v_smsanswers_month","месяц");
define("v_smsanswers_sms","СМС");
define("v_smsanswers_text","Текст:");
define("v_smsanswers_nosms","Всего СМС ответов: 0");

// SmsHistory.php
define("v_smshistory_sent","ОТПРАВЛЕНО получателю");
define("v_smshistory_error","ОШИБКА");
define("v_smshistory_delivered","ДОСТАВЛЕНО получателю");
define("v_smshistory_buffered","АБОНЕНТ НЕДОСТУПЕН"); //new
define("v_smshistory_smshistory","СМС Журналы");
define("v_smshistory_description","Журнал СМС сообщений, отправленных с помощью СМС-модуля");
define("v_smshistory_status","статус");
define("v_smshistory_adminsms"," Админ СМС");
define("v_smshistory_customersms"," СМС клиента");
define("v_smshistory_marketingsms"," маркетинговое СМС");
define("v_smshistory_simplesms"," простое СМС");
define("v_smshistory_show","Открыть");
define("v_smshistory_results","Результаты поиска ");
define("v_smshistory_of"," из ");
define("v_smshistory_type","Тип");
define("v_smshistory_date","Дата");
define("v_smshistory_subject","Тема СМС сообщения");
define("v_smshistory_nubmer","Номер");
define("v_smshistory_yes","да");
define("v_smshistory_no","нет");
define("v_smshistory_sysnumber","системный номер");
define("v_smshistory_balance","Состояние счета:");
define("v_smshistory_customerdetail","Просмотр подробной информации клиента");
define("v_smshistory_smstext","Текст:");
define("v_smshistory_totalsms","Всего СМС:");
define("v_smshistory_smsnotactive","СМС Журналы - неактивны");
define("v_smshistory_usernotactive","Профиль пользователя неактивен! Для регистрации нажмите на вкладку СМС в главном меню. Модуль отобразит окно для ввода регистрационных данных. Используйте модуль, с которым Вы уже работали. Введите имя пользователя и пароль для существующей учетной записи. В противном случае, заполните графу \"электронная почта\", примите условия лицензионного соглашения и нажмите \"зарегистрироваться\".");
define("v_smshistory_price","Цена СМС в электронной валюте:");
define("v_smshistory_year","год");
define("v_smshistory_month","месяц");
//define("v_smshistory_status","Состояние");
define("v_smshistory_recipient","Получатель");
define("v_smshistory_unicode"," Юникод:");
define("v_smshistory_senderid","Номер отправителя:");
define("v_smshistory_previous","Предыдущий");
define("v_smshistory_next","Следующий");
define("v_smshistory_page","Страница:");
define("v_smshistory_nosms","Всего СМС - 0");
define("v_smshistory_sms","СМС");

// SmsMarketing.php
define("v_smsmarketing_smsbulk","СМС маркетинг - текст СМС массовой рассылки");
define("v_smsmarketing_entertext","Введите текст СМС сообщения");
define("v_smsmarketing_unicode"," Юникод");
define("v_smsmarketing_unicodetext","Отметьте только в случае использования диакритических знаков, либо таких языков, как русский, китайский, арабский, греческий, иврит, корейский и т.п. (Юникод позволяет одновременно использовать разные шрифты и символы. Количество символов в Юникод сообщении равно 70).");
define("v_smsmarketing_sendlater"," Отправить позже");
define("v_smsmarketing_yourtime","Настройка времени: ");
define("v_smsmarketing_jstotalcustomers","Всего клиентов:");
define("v_smsmarketing_jstotalsms","Всего СМС:");
define("v_smsmarketing_bulkfilter","СМС маркетинг - фильтр СМС массовой рассылки");
define("v_smsmarketing_allcustomers","Все клиенты");
define("v_smsmarketing_companycustomers","Корпоративные клиенты");
define("v_smsmarketing_privatecustomers","Частные лица");
define("v_smsmarketing_allcountries","Все страны");
define("v_smsmarketing_lastname","Фамилия");
define("v_smsmarketing_firstname","Имя");
define("v_smsmarketing_lastname2","Фамилия");
define("v_smsmarketing_firstname2","Имя");
define("v_smsmarketing_groups","Группы:");
define("v_smsmarketing_all","ВСЕ");
define("v_smsmarketing_gender","Пол:");
define("v_smsmarketing_male","Мужчина");
define("v_smsmarketing_female","Женщина");
define("v_smsmarketing_news","Новинки:");
define("v_smsmarketing_yes","Да");
define("v_smsmarketing_no","Нет");
define("v_smsmarketing_applyfilter","фильтр"); //Использовать фильтр
define("v_smsmarketing_birthfrom","Дата рождения от:");
define("v_smsmarketing_birthto","до: ");
define("v_smsmarketing_registerfrom","Дата регистрации от:");
define("v_smsmarketing_customersfound","Найдено клиентов: ");
define("v_smsmarketing_results","Результаты");
define("v_smsmarketing_action","Действие");
define("v_smsmarketing_mobilenr","Номер телефона");
define("v_smsmarketing_customerid","ID клиента");
define("v_smsmarketing_removecustomer","УДАЛИТЬ клиента из этого списка");
define("v_smsmarketing_next","Следующий");
define("v_smsmarketing_previous","Предыдущий");
define("v_smsmarketing_page","Страница:");
define("v_smsmarketing_smsmarketingfound","СМС маркетинг - найдено клиентов: ");
define("v_smsmarketing_description","Напишите текст сообщения и используйте расширенный фильтр для таргетинга Вашей маркетинговой кампании");
define("v_smsmarketing_smsmarketing","СМС маркетинг");
define("v_smsmarketing_smsnotactive","СМС маркетинг - неактивен");
define("v_smsmarketing_usernotactive","Профиль пользователя неактивен! Для регистрации нажмите на вкладку СМС в главном меню. Модуль отобразит окно для ввода регистрационных данных. Используйте модуль, с которым Вы уже работали. Введите имя пользователя и пароль для существующей учетной записи. В противном случае, заполните графу \"электронная почта\", примите условия лицензионного соглашения и нажмите \"зарегистрироваться\".");
define("v_smsmarketing_fillsms","Введите текст СМС сообщения");
define("v_smsmarketing_smslong","Текст СМС сообщения слишком длинный (максимально 612 символов)");
define("v_smsmarketing_unicodesmslong","Текст СМС сообщения слишком длинный (максимально 268 юникод символов)");
define("v_smsmarketing_nocustomers","Найдено клиентов: 0");
define("v_smsmarketing_wrongtime","Неправильное время отправки SMS");
define("v_smsmarketing_lowcreditall","У Вас недостаточно средств на счету, чтобы отправить СМС всем");
define("v_smsmarketing_customers","клиентам");
define("v_smsmarketing_smssent","СМС сообщение отправлено");
define("v_smsmarketing_smssaved","СМС сообщение сохранено");
define("v_smsmarketing_wrongnr","Неверно набранный номер или номер вне зоны доступа");
define("v_smsmarketing_unauthorized","неавторизованный ID отправителя в ответной СМС");
define("v_smsmarketing_lowcredit","Недостаточно средств на счету для отправки СМС сообщения");
define("v_smsmarketing_nounicode","юникод не поддерживается");
define("v_smsmarketing_cantconnect","отсутствует соединение с СМС-сервером");
define("v_smsmarketing_simulation","Симуляция СМС рассылки (Отправка СМС сообщения симулирована. Адресат не получит СМС сообщение)");
define("v_smsmarketing_simulationconfirm","СМС сообщение послано (симуляция)");
define("v_smsmarketing_error","ошибка");
define("v_smsmarketing_loginerror","ошибка авторизации");
define("v_smsmarketing_date","Дата:");
define("v_smsmarketing_time","Время: ");
define("v_smsmarketing_hr","1 час");
define("v_smsmarketing_timezone","Часовой пояс: ");
define("v_smsmarketing_timezone2","Настройка часового пояса");
define("v_smsmarketing_send","Отправить");
define("v_smsmarketing_jschars","Символов: ");
define("v_smsmarketing_longtext","Текст СМС слишком длинный");
define("v_smsmarketing_typ","Тип:");
define("v_smsmarketing_country","Страна:");
define("v_smsmarketing_city","Город:");
define("v_smsmarketing_advert","Объявление:");
define("v_smsmarketing_store","Магазин:"); //new
define("v_smsmarketing_allstores","Все магазины"); //new

// smsprestashop.php
define("v_smsprestashop_prestashop","Presta SMS");
define("v_smsprestashop_description","presta-sms.com - отправляйте СМС сообщения из Вашего Prestashop!");
define("v_smsprestashop_admin","Админ СМС ");
define("v_smsprestashop_customer"," СМС клиента");
define("v_smsprestashop_settings","Настройка СМС сообщений");
define("v_smsprestashop_history","СМС-Журналы");
define("v_smsprestashop_credit","Пополнить счет");
define("v_smsprestashop_marketing","СМС маркетинг");
define("v_smsprestashop_answers","СМС ответы");
define("v_smsprestashop_send","Отправить СМС");
define("v_smsprestashop_about","О нас");
define("v_smsprestashop_wrongnr","Неверно набранный номер, или номер вне зоны доступа");
define("v_smsprestashop_unauthorized","неавторизованный ID отправителя в ответной СМС");
define("v_smsprestashop_lowcredit","Недостаточно средств на счету для отправки СМС сообщения");
define("v_smsprestashop_nounicode","юникод не поддерживается");
define("v_smsprestashop_loginerror","ошибка авторизации");
define("v_smsprestashop_cantconnect","не соединено с СМС-сервером");
define("v_smsprestashop_simulation","Симуляция СМС рассылки (Отправка СМС сообщения симулирована. Адресат не получит СМС сообщение)");
define("v_smsprestashop_nrunknown","неизвестный номер");
define("v_smsprestashop_notconnected","не соединено с СМС-сервером");
define("v_smsprestashop_sqlinfo1","Новые заказы");
define("v_smsprestashop_sqltemplate1","Новый заказ от {customer_firstname} {customer_lastname}, id пользователя: {customer_id}, номер заказа: {order_id}, оплата: {order_payment}, сумма: {order_total_paid} {order_currency}. Заказ: {order_products2}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate21","Ваш заказ {order_id} был успешно создан, оплата: {order_payment}, сумма: {order_total_paid} {order_currency}. Желаем хорошего дня, {shop_name}.");
define("v_smsprestashop_notice","Применяемые параметры:");
define("v_smsprestashop_sqlinfo2","Успешное создание учетной записи клиента");
define("v_smsprestashop_sqltemplate2","Клиент  {customer_firstname} {customer_lastname}, id: {customer_id}, только что подписался на {shop_name}.");
define("v_smsprestashop_sqltemplate22","Дорогой {customer_firstname} {customer_lastname}, Ваш аккаунт в {shop_name} был создан успешно. Ваше имя пользователя: {customer_email}. Желаем хорошего дня!");
define("v_smsprestashop_sqlinfo3","Товар был возвращен");
define("v_smsprestashop_sqltemplate3","Клиент {customer_firstname} {customer_lastname}, id: {customer_id}, вернул заказанный товар {order_id}. Заказ: {orderReturn2}. Сообщение от клиента: {customer_question}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate23","Мы получили ваш запрос. Заказ: {order_id}. Желаем хорошего дня, {shop_name}.");
define("v_smsprestashop_sqlinfo4","Уведомление в случае изменения количества одного из заказанных товаров");
define("v_smsprestashop_sqltemplate4","В бланке заказа {order_id} было изменено количество, {orderSlip2}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate24","В Вашем бланке заказа номер {order_id} было изменено количество товара, {orderSlip2}. Желаем хорошего дня, {shop_name}.");
define("v_smsprestashop_sqlinfo5","Подтверждение платежа");
define("v_smsprestashop_sqltemplate5","Подтверждение платежа, заказ №: {order_id}, оплата: {order_payment},  сумма: {order_total_paid} {order_currency}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate25","Мы успешно получили оплату за Ваш заказ {order_id} с помощью {order_payment},  сумма: {order_total_paid} {order_currency}. Желаем хорошего дня, {shop_name}.");

define("v_smsprestashop_sqlinfo62","Обновление статуса заказа - поставщик  предоставил номер пересылки");  //new
define("v_smsprestashop_sqltemplate62","Заказ № {order_id} был обновлен, номер пересылки {order_shipping_number} предоставлен поставщиком. Информация из {shop_name}."); //new
define("v_smsprestashop_sqltemplate262","Уважаемый заказчик, товар по Вашему заказу № {order_id} был отправлен, предоставленный поставщиком номер пересылки - {order_shipping_number}. Желаем хорошего дня, {shop_name}."); //new

define("v_smsprestashop_sqlinfo7","Удаление товара из базы данных");
define("v_smsprestashop_sqltemplate7","Этот товар был удален из {shop_name}, id: {product_id}, ref: {product_ref}, наименование: {product_name}.  Удалено пользователем {employee_id}, {employee_email}.");
define("v_smsprestashop_sqlinfo8","Количество обновляется только в случае успешно созданного клиентом заказа ");
define("v_smsprestashop_sqltemplate8","Количество товара изменилось, id: {product_id}, ref: {product_ref}, наименование: {product_name}, текущее количество: {product_quantity}, поставщик: {product_supplier}. Информация из {shop_name}.");
define("v_smsprestashop_sqlinfo9","Товара нет на складе");
define("v_smsprestashop_sqltemplate9","Данный товар заканчивается на складе, id: {product_id}, ref: {product_ref}, наименование: {product_name}, текущее количество: {product_quantity}. Информация из {shop_name}.");
define("v_smsprestashop_sqlinfo10","Уведомление в случае, если администратор или клиент отменяет заказ товара");
define("v_smsprestashop_sqltemplate10","В бланке заказа номер {order_id} был отменен  заказ товара с ID: {product_id}, ref: {product_ref}, наименование: {product_name}. Количество: {product_quantity}, количество отмененных товаров: {product_quantity_reinjected}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate11","Состояние заказа {order_id} изменилось количественно");
define("v_smsprestashop_sqltemplate111",". Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate211","Уважаемый клиент, состояние Вашего заказа {order_id} изменилось количественно: ");
define("v_smsprestashop_sqltemplate2111",". Желаем хорошего дня! {shop_name}.");
define("v_smsprestashop_bankwire","Банковский перевод");
define("v_smsprestashop_company","Название фирмы");
define("v_smsprestashop_country","Страна");
define("v_smsprestashop_city","Город");
define("v_smsprestashop_qty","количество");
define("v_smsprestashop_qtyreinjected","количество отмененных товаров");
define("v_smsprestashop_qtyreturned","количество возвращенных товаров");
define("v_smsprestashop_name","название");
define("v_smsprestashop_notfound","не найдено"); //new




// SmsWizard.php
define("v_smswizard_ownsettings","Настройки СМС - выберите личный номер отправителя для ");
define("v_smswizard_ownnrsettings","Настройка личного номера отправителя");
define("v_smswizard_ownnrid","Личный номер отправителя");
define("v_smswizard_existingown","Актуальный личный номер:");
define("v_smswizard_newownnrid","Новый личный номер отправителя");
define("v_smswizard_intformat","в международном формате,<br />без ведущих нулей или знака +, например, 79636123456");
define("v_smswizard_smscode","СМС код");
define("v_smswizard_confirm","ПОДТВЕРДИТЬ");
define("v_smswizard_required","Обязательные поля");
define("v_smswizard_textsettings","Настройки СМС - выберите текстовое ID отправителя для ");
define("v_smswizard_senderidsettings","Настройки текстового ID отправителя");
define("v_smswizard_existingsid","Актуальное текстовое ID отправителя");
define("v_smswizard_newsid","Новое текстовое ID отправителя");
define("v_smswizard_maxchars","максимально 11 символов");
define("v_smswizard_smssettings","Настройки СМС");
define("v_smswizard_description","Определите тип системы рассылки для каждой отдельной страны. (текстовое ID отправителя, личный номер мобильного телефона или системный номер). Цена СМС сообщения зависит от страны получателя, выбора типа системы рассылки и суммы оплаты. В странах с неопределенным типом системы рассылки будет использован системный номер.");
define("v_smswizard_customersettings","Настройки СМС для клиентов");
define("v_smswizard_sendertype","ТИП ОТПРАВИТЕЛЯ");
define("v_smswizard_network","СЕТЬ");
define("v_smswizard_smsprice","ЦЕНА СМС В KPEДИTAX"); // ЦЕНА СМС В ЭЛЕКТРОННОЙ ВАЛЮТЕ
define("v_smswizard_price","ЦЕНА СМС В ЕВРОВАЛЮТЕ (без НДС)");
define("v_smswizard_payment","платеж");
define("v_smswizard_unicode"," Юникод ");
define("v_smswizard_unicodetext","Поддержка  кодировки Юникод (Юникод позволяет одновременно использовать разные шрифты, символы и диакритические знаки. Его используют для кодировки таких языков, как русский, китайский, арабский, греческий, иврит, корейский и т.п.");
define("v_smswizard_textsid","текстовое ID отправителя");
define("v_smswizard_textsid2","текстовое ID отправителя");
define("v_smswizard_systemnr","СИСТЕМНЫЙ НОМЕР");
define("v_smswizard_ownnrsid","ЛИЧНЫЙ НОМЕР ОТПРАВИТЕЛЯ");
define("v_smswizard_simhosting","СИМ ХОСТИНГ");
define("v_smswizard_unicodesupported","ЮНИКОД ПОДДЕРЖИВАЕТСЯ");
define("v_smswizard_nounicode","ЮНИКОД НЕ ПОДДЕРЖИВАЕТСЯ");
define("v_smswizard_savesettings","СОХРАНИТЬ СМС НАСТРОЙКИ");
define("v_smswizard_suredelete","Вы уверены, что хотите удалить");
define("v_smswizard_country","Выберите страну: ");
define("v_smswizard_addcountry","ДОБАВИТЬ/ИЗМЕНИТЬ ВЫБРАННУЮ СТРАНУ");
define("v_smswizard_notactive","Настройки СМС - неактивны");
define("v_smswizard_usernotactive","Профиль пользователя неактивен! Для регистрации нажмите на вкладку СМС в главном меню. Модуль отобразит окно для ввода регистрационных данных. Используйте модуль, с которым Вы уже работали. Введите имя пользователя и пароль для существующей учетной записи. В противном случае, заполните графу \"электронная почта\", примите условия лицензионного соглашения и нажмите \"зарегистрироваться\".");
define("v_smswizard_error","ошибка");
define("v_smswizard_cantconnect","отсутствует соединение с СМС-сервером");
define("v_smswizard_deleted"," удалено."); // страна была удалена
define("v_smswizard_choosesender","Выберите тип отправителя");
define("v_smswizard_countrysaved"," сохранено."); // страна была сохранена
define("v_smswizard_fillsid","Введите актуальный номер отправителя");
define("v_smswizard_mustbenumber","Актуальный номер отправителя должен состоять из чисел");
define("v_smswizard_confirmcode","Подтвердите правильный СМС код");
define("v_smswizard_ownsidfor","Личный номер отправителя для ");
define("v_smswizard_wassaved"," сохранено."); // Личный номер отправителя для (Text sender ID for ) ... был сохранен
define("v_smswizard_error2","ошибка");
define("v_smswizard_loginerror","ошибка авторизации");
define("v_smswizard_retypecode","Перепишите СМС код");
define("v_smswizard_retypecode2","Перепишите СМС код. СМС сообщение будет отправлено в течение 60 секунд");
define("v_smswizard_wrongnrerror","ошибка - неверно набранный номер или номер вне зоны доступа");
define("v_smswizard_unauthorizederror","ошибка - неавторизованный ID отправителя в ответной СМС");
define("v_smswizard_lowcrediterror","ошибка - недостаточно средств на счету для отправки контрольного СМС сообщения");
define("v_smswizard_filltextsid","Введите текстовое ID отправителя");
define("v_smswizard_filltextsid2","Введите текстовое ID отправителя, 3-11 символов");
define("v_smswizard_chars","Разрешается использовать символы:");
define("v_smswizard_nonumber","текстовое ID отправителя не может состоять из чисел");
define("v_smswizard_textsidfor","текстовое ID отправителя для ");
define("v_smswizard_adminsettings","Настройки системы Админ СМС");
define("v_smswizard_validate","ПРОВЕРКА"); //new
define("v_smswizard_smsvalidation","СМС проверка"); //new
define("v_smswizard_confirmationcode","Коd:  "); //new, bez diakritiky, pouzito v sms
define("v_smswizard_updatepricelist","Обновить цену"); //new
define("v_smswizard_eg","например,"); //new
define("v_smswizard_pricelistupdated","Прайслист был успешно обновлен"); //new
define("v_smswizard_edit","редактировать"); //new
define("v_smswizard_delete","удалить"); //new



//new
define("v_smsprestashop_smscharging_fieldset","Ваши интернет-магазины");
define("v_smsprestashop_smscharging","SMS opt-out");
define("v_smsprestashop_smscharging_h2","Отказ от СМС сообщений - настройка отказа от уведомлений с помощью СМС сообщений и их оплаты");
define("v_smsprestashop_smscharging_description","Выберите интернет-магазин, для которого Вы хотите настроить функцию отказа заказчика от СМС уведомлений, введите цену и текст СМС сообщений, который будет отображен в корзине заказчика.");
define("v_adminsmsprofile_prefer","Для отправки СМС сообщений изберите телефонный номер из:");
define("v_adminsmsprofile_preferinvoice","платежного адреса");
define("v_adminsmsprofile_preferdeliver","адреса доставки");
define("v_smsprestashop_smscharging_price","Цена СМС сообщений");
define("v_smsprestashop_smscharging_texts","Текст, отображенный в корзине");
define("v_smsprestashop_smscharging_active","Активируйте функцию отображения отказа от СМС сообщений в корзине");
define("v_smsprestashop_smscharging_optoutactive","Отказ от СМС сообщений АКТИВЕН");
define("v_smsprestashop_smscharging_optoutnotactive","Отказ от СМС сообщений НЕАКТИВЕН. Активируйте отказ от СМС сообщений с помощью выбора «Активизируйте отображение функции отказа от СМС сообщений в корзине»");
define("v_smsprestashop_smscharging_saved","Настройка функции отказа от СМС сообщений была успешно изменена");
define("v_smswizard_pricelistupdated_changed","Изменение цены за СМС сообщения в следующих странах:");
define("v_smsprestashop_newversion","Доступна новая версия:");

define("v_about_manual_text","Руководство про смс mодуль (ENG):");
define("v_about_manual_url","www.presta-sms.com/manual.html");
define("v_about_supported_text","Поддерживаемые версии PrestaShop:");
define("v_about_supported_text_ps","1.5.x");

define("v_contact_form","Контактная форма");

define("v_remove_duplicate","Удалить дубликаты номеров");

define("v_registration_type","Тип регистрации:");
define("v_registration_type_personal","персональный");
define("v_registration_type_business","бизнес");
define("v_registration_address","Aдрес");
define("v_registration_billing_information","Платежная информация");
define("v_registration_personal_contact","Контактное лицо");



define("v_registration_company_name","Введите название компании.");
define("v_registration_vat_invalid","Неверный НДС");




//stats new
define("v_statistics","Cтатистика");
define("v_statistics_smsnotactive","Cтатистика - не активна");
define("v_statistics_day","день");
define("v_statistics_datefrom","Дата от:");
define("v_statistics_dateto","до:");



// filter
define("v_filter_deleted_customers", "Удалены клиенты: ");
define("v_filter_more", "более...");
define("v_filter_load", "Сохраненные фильтры");
define("v_filter_save", "Сохранить фильтр");
define("v_filter_clear", "Сброс фильтра");
define("v_filter_name", "Фильтр Имя");
define("v_filter_date", "Дата");
define("v_filter_been_apply", "Фильтр был применен.");
define("v_filter_been_saved", "Фильтр был сохранен.");
define("v_filter_been_clear", "Фильтр был сбросить.");
define("v_filter_q_clear", "Вы уверены, что хотите сбросить фильтр?");
define("v_filter_q_delete", "Вы уверены, что хотите удалить фильтр?");
define("v_filter_not_found", "Фильтр не найден.");
define("v_send_busy", "Обработка...");

// Template
define("v_template_load", "Сохраненные шаблоны");
define("v_template_save", "Сохранить шаблон");
define("v_template_name", "Имя шаблона");
define("v_template_been_apply", "Шаблон был загружен.");
define("v_template_been_saved", "Шаблон был сохранен.");
define("v_template_q_delete", "Вы уверены, что хотите удалить шаблон?");
define("v_template_not_found", "Вы не сохранили любой шаблон.");
define("v_show_virtual", "Виртуальные операторы (MVNO)");

// Marketing
define("v_marketing_coupon", "Выберите купон");
define("v_marketing_coupon_create", "Создать купон");
define("v_marketing_none", "Выберите");
define("v_smshistory_simulation", "МОДЕЛИРОВАНИЕ");
define("v_smshistory_deleted", "УДАЛЕННЫЕ");
define("v_smshistory_sheduled", "ОТЛОЖЕННЫЕ");
define("v_smshistory_duplicate", "дубликат");
define("v_smshistory_dnd", "DO NOT DISTURB реестр (DND)");
define("v_sendsms_addcsv_vcard","Добавить получателей в CSV (.csv, .txt) или vCARD(.vcf)");

// Hooks v2
define("v_hook_return", "Возвраты товаров");
define("v_hook_return_customer", "Мы подтверждаем возвраты товаров");
define("v_hook_return_admin", "Новый возвраты товаров");
define("v_smsprestashop_return_status_admin","Состояние возвраты товаров {return_id} изменилось количественно ");
define("v_smsprestashop_return_status_admin2",". Информация из {shop_name}.");
define("v_smsprestashop_return_status_customer","Уважаемый клиент, состояние Вашего возвраты товаров {return_id} изменилось количественно: ");
define("v_smsprestashop_return_status_customer2",". Желаем хорошего дня! {shop_name}.");

// OptOut
define("v_optout_auto_variable", "Добавить товар CMC в корзину:");
define("v_optout_auto", "автоматически");
define("v_optout_manual", "вручную");

// ZenCart
define("v_about_version_zen","Zen CMC Модуль, версия ");
define("v_about_supported_text_zen","Поддерживаемые версии ZenCart:");
define("v_about_supported_version_zen","1.3.x. - 1.5.x");
define("v_about_manual_url_zen","www.zen-sms.net/manual.html");
define("v_about_website_name_zen","www.zen-sms.net");
define("v_about_website_url_zen","www.zen-sms.net/ru/index.html");

define("v_smsprestashop_sqltemplate1_zen","Новый заказ от {customer_firstname} {customer_lastname}, id пользователя: {customer_id}, номер заказа: {order_id}, оплата: {order_payment}, сумма: {order_total_paid} {order_currency}. Заказ: {order_products2}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate21_zen","Ваш заказ {order_id} был успешно создан, оплата: {order_payment}, сумма: {order_total_paid} {order_currency}. Желаем хорошего дня, {shop_name}.");
define("v_smsprestashop_sqltemplate2_zen","Клиент  {customer_firstname} {customer_lastname}, id: {customer_id}, только что подписался на {shop_name}.");
define("v_smsprestashop_sqltemplate22_zen","Дорогой {customer_firstname} {customer_lastname}, Ваш аккаунт в {shop_name} был создан успешно. Ваше имя пользователя: {customer_email}. Желаем хорошего дня!");
define("v_smsprestashop_sqltemplate3_zen","Клиент {customer_firstname} {customer_lastname}, id: {customer_id}, вернул заказанный товар {order_id}. Заказ: {orderReturn2}. Сообщение от клиента: {customer_question}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate23_zen","Мы получили ваш запрос. Заказ: {order_id}. Желаем хорошего дня, {shop_name}.");
define("v_smsprestashop_sqltemplate4_zen","В бланке заказа {order_id} было изменено количество, {orderSlip2}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate24_zen","В Вашем бланке заказа номер {order_id} было изменено количество товара, {orderSlip2}. Желаем хорошего дня, {shop_name}.");
define("v_smsprestashop_sqltemplate5_zen","Подтверждение платежа, заказ №: {order_id}, оплата: {order_payment},  сумма: {order_total_paid} {order_currency}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate25_zen","Мы успешно получили оплату за Ваш заказ {order_id} с помощью {order_payment},  сумма: {order_total_paid} {order_currency}. Желаем хорошего дня, {shop_name}.");
define("v_smsprestashop_sqltemplate62_zen","Заказ № {order_id} был обновлен, номер пересылки {order_shipping_number} предоставлен поставщиком. Информация из {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_zen","Уважаемый заказчик, товар по Вашему заказу № {order_id} был отправлен, предоставленный поставщиком номер пересылки - {order_shipping_number}. Желаем хорошего дня, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_zen","Этот товар был удален из {shop_name}, id: {product_id}, ref: {product_ref}, наименование: {product_name}.  Удалено пользователем {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_zen","Количество товара изменилось, id: {product_id}, ref: {product_ref}, наименование: {product_name}, текущее количество: {product_quantity}, поставщик: {product_supplier}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate9_zen","Данный товар заканчивается на складе, id: {product_id}, ref: {product_ref}, наименование: {product_name}, текущее количество: {product_quantity}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate10_zen","В бланке заказа номер {order_id} был отменен  заказ товара с ID: {product_id}, ref: {product_ref}, наименование: {product_name}. Количество: {product_quantity}, количество отмененных товаров: {product_quantity_reinjected}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate11_zen","Состояние заказа {order_id} изменилось количественно");
define("v_smsprestashop_sqltemplate111_zen",". Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate211_zen","Уважаемый клиент, состояние Вашего заказа {order_id} изменилось количественно: ");
define("v_smsprestashop_sqltemplate2111_zen",". Желаем хорошего дня! {shop_name}.");








// OpenCart
define("v_about_version_oc","Cart CMC Модуль, версия ");
define("v_about_supported_text_oc","Поддерживаемые версии OpenCart:");
define("v_about_supported_version_oc","1.4.7 - 1.5.6.1");
define("v_about_manual_url_oc","www.cart-sms.com/manual.html");
define("v_about_website_name_oc","www.cart-sms.com");
define("v_about_website_url_oc","www.cart-sms.com/ru/index.html");

define("v_smsprestashop_sqltemplate1_oc","Новый заказ от {customer_firstname} {customer_lastname}, id пользователя: {customer_id}, номер заказа: {order_id}, оплата: {order_payment}, сумма: {order_total_paid} {order_currency}. Заказ: {order_products2}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate21_oc","Ваш заказ {order_id} был успешно создан, оплата: {order_payment}, сумма: {order_total_paid} {order_currency}. Желаем хорошего дня, {shop_name}.");
define("v_smsprestashop_sqltemplate2_oc","Клиент  {customer_firstname} {customer_lastname}, id: {customer_id}, только что подписался на {shop_name}.");
define("v_smsprestashop_sqltemplate22_oc","Дорогой {customer_firstname} {customer_lastname}, Ваш аккаунт в {shop_name} был создан успешно. Ваше имя пользователя: {customer_email}. Желаем хорошего дня!");
define("v_smsprestashop_sqltemplate3_oc","Клиент {customer_firstname} {customer_lastname}, id: {customer_id}, вернул заказанный товар {order_id}. Заказ: {orderReturn2}. Сообщение от клиента: {customer_question}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate23_oc","Мы получили ваш запрос. Заказ: {order_id}. Желаем хорошего дня, {shop_name}.");
define("v_smsprestashop_sqltemplate4_oc","В бланке заказа {order_id} было изменено количество, {orderSlip2}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate24_oc","В Вашем бланке заказа номер {order_id} было изменено количество товара, {orderSlip2}. Желаем хорошего дня, {shop_name}.");
define("v_smsprestashop_sqltemplate5_oc","Подтверждение платежа, заказ №: {order_id}, оплата: {order_payment},  сумма: {order_total_paid} {order_currency}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate25_oc","Мы успешно получили оплату за Ваш заказ {order_id} с помощью {order_payment},  сумма: {order_total_paid} {order_currency}. Желаем хорошего дня, {shop_name}.");
define("v_smsprestashop_sqltemplate62_oc","Заказ № {order_id} был обновлен, номер пересылки {order_shipping_number} предоставлен поставщиком. Информация из {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_oc","Уважаемый заказчик, товар по Вашему заказу № {order_id} был отправлен, предоставленный поставщиком номер пересылки - {order_shipping_number}. Желаем хорошего дня, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_oc","Этот товар был удален из {shop_name}, id: {product_id}, ref: {product_ref}, наименование: {product_name}.  Удалено пользователем {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_oc","Количество товара изменилось, id: {product_id}, ref: {product_ref}, наименование: {product_name}, текущее количество: {product_quantity}, поставщик: {product_supplier}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate9_oc","Данный товар заканчивается на складе, id: {product_id}, ref: {product_ref}, наименование: {product_name}, текущее количество: {product_quantity}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate10_oc","В бланке заказа номер {order_id} был отменен  заказ товара с ID: {product_id}, ref: {product_ref}, наименование: {product_name}. Количество: {product_quantity}, количество отмененных товаров: {product_quantity_reinjected}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate11_oc","Состояние заказа {order_id} изменилось количественно");
define("v_smsprestashop_sqltemplate111_oc",". Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate211_oc","Уважаемый клиент, состояние Вашего заказа {order_id} изменилось количественно: ");
define("v_smsprestashop_sqltemplate2111_oc",". Желаем хорошего дня! {shop_name}.");





// OsCommerce
define("v_about_version_os","smsCommerce Модуль, версия ");
define("v_about_supported_text_os","Поддерживаемые версии OsCommerce:");
define("v_about_supported_version_os","2.3.x");
define("v_about_manual_url_os","www.sms-commerce.net/manual.html");
define("v_about_website_name_os","www.sms-commerce.net");
define("v_about_website_url_os","www.sms-commerce.net/ru/index.html");

define("v_smsprestashop_sqltemplate1_os","Новый заказ от {customer_firstname} {customer_lastname}, id пользователя: {customer_id}, номер заказа: {order_id}, оплата: {order_payment}, сумма: {order_total_paid} {order_currency}. Заказ: {order_products2}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate21_os","Ваш заказ {order_id} был успешно создан, оплата: {order_payment}, сумма: {order_total_paid} {order_currency}. Желаем хорошего дня, {shop_name}.");
define("v_smsprestashop_sqltemplate2_os","Клиент  {customer_firstname} {customer_lastname}, id: {customer_id}, только что подписался на {shop_name}.");
define("v_smsprestashop_sqltemplate22_os","Дорогой {customer_firstname} {customer_lastname}, Ваш аккаунт в {shop_name} был создан успешно. Ваше имя пользователя: {customer_email}. Желаем хорошего дня!");
define("v_smsprestashop_sqltemplate3_os","Клиент {customer_firstname} {customer_lastname}, id: {customer_id}, вернул заказанный товар {order_id}. Заказ: {orderReturn2}. Сообщение от клиента: {customer_question}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate23_os","Мы получили ваш запрос. Заказ: {order_id}. Желаем хорошего дня, {shop_name}.");
define("v_smsprestashop_sqltemplate4_os","В бланке заказа {order_id} было изменено количество, {orderSlip2}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate24_os","В Вашем бланке заказа номер {order_id} было изменено количество товара, {orderSlip2}. Желаем хорошего дня, {shop_name}.");
define("v_smsprestashop_sqltemplate5_os","Подтверждение платежа, заказ №: {order_id}, оплата: {order_payment},  сумма: {order_total_paid} {order_currency}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate25_os","Мы успешно получили оплату за Ваш заказ {order_id} с помощью {order_payment},  сумма: {order_total_paid} {order_currency}. Желаем хорошего дня, {shop_name}.");
define("v_smsprestashop_sqltemplate62_os","Заказ № {order_id} был обновлен, номер пересылки {order_shipping_number} предоставлен поставщиком. Информация из {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_os","Уважаемый заказчик, товар по Вашему заказу № {order_id} был отправлен, предоставленный поставщиком номер пересылки - {order_shipping_number}. Желаем хорошего дня, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_os","Этот товар был удален из {shop_name}, id: {product_id}, ref: {product_ref}, наименование: {product_name}.  Удалено пользователем {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_os","Количество товара изменилось, id: {product_id}, ref: {product_ref}, наименование: {product_name}, текущее количество: {product_quantity}, поставщик: {product_supplier}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate9_os","Данный товар заканчивается на складе, id: {product_id}, ref: {product_ref}, наименование: {product_name}, текущее количество: {product_quantity}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate10_os","В бланке заказа номер {order_id} был отменен  заказ товара с ID: {product_id}, ref: {product_ref}, наименование: {product_name}. Количество: {product_quantity}, количество отмененных товаров: {product_quantity_reinjected}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate11_os","Состояние заказа {order_id} изменилось количественно");
define("v_smsprestashop_sqltemplate111_os",". Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate211_os","Уважаемый клиент, состояние Вашего заказа {order_id} изменилось количественно: ");
define("v_smsprestashop_sqltemplate2111_os",". Желаем хорошего дня! {shop_name}.");







// Virtuemart
define("v_about_version_vm","Virtue CMC Модуль, версия ");
define("v_about_supported_text_vm","Поддерживаемые версии Virtuemart:");
define("v_about_supported_version_vm","2.3.x");
define("v_about_manual_url_vm","www.virtue-sms.net/manual.html");
define("v_about_website_name_vm","www.virtue-sms.net");
define("v_about_website_url_vm","www.virtue-sms.net/ru/index.html");

define("v_smsprestashop_sqltemplate1_vm","Новый заказ от {customer_firstname} {customer_lastname}, id пользователя: {customer_id}, номер заказа: {order_id}, оплата: {order_payment}, сумма: {order_total_paid} {order_currency}. Заказ: {order_products2}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate21_vm","Ваш заказ {order_id} был успешно создан, оплата: {order_payment}, сумма: {order_total_paid} {order_currency}. Желаем хорошего дня, {shop_name}.");
define("v_smsprestashop_sqltemplate2_vm","Клиент  {customer_firstname} {customer_lastname}, id: {customer_id}, только что подписался на {shop_name}.");
define("v_smsprestashop_sqltemplate22_vm","Дорогой {customer_firstname} {customer_lastname}, Ваш аккаунт в {shop_name} был создан успешно. Ваше имя пользователя: {customer_email}. Желаем хорошего дня!");
define("v_smsprestashop_sqltemplate3_vm","Клиент {customer_firstname} {customer_lastname}, id: {customer_id}, вернул заказанный товар {order_id}. Заказ: {orderReturn2}. Сообщение от клиента: {customer_question}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate23_vm","Мы получили ваш запрос. Заказ: {order_id}. Желаем хорошего дня, {shop_name}.");
define("v_smsprestashop_sqltemplate4_vm","В бланке заказа {order_id} было изменено количество, {orderSlip2}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate24_vm","В Вашем бланке заказа номер {order_id} было изменено количество товара, {orderSlip2}. Желаем хорошего дня, {shop_name}.");
define("v_smsprestashop_sqltemplate5_vm","Подтверждение платежа, заказ №: {order_id}, оплата: {order_payment},  сумма: {order_total_paid} {order_currency}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate25_vm","Мы успешно получили оплату за Ваш заказ {order_id} с помощью {order_payment},  сумма: {order_total_paid} {order_currency}. Желаем хорошего дня, {shop_name}.");
define("v_smsprestashop_sqltemplate62_vm","Заказ № {order_id} был обновлен, номер пересылки {order_shipping_number} предоставлен поставщиком. Информация из {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_vm","Уважаемый заказчик, товар по Вашему заказу № {order_id} был отправлен, предоставленный поставщиком номер пересылки - {order_shipping_number}. Желаем хорошего дня, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_vm","Этот товар был удален из {shop_name}, id: {product_id}, ref: {product_ref}, наименование: {product_name}.  Удалено пользователем {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_vm","Количество товара изменилось, id: {product_id}, ref: {product_ref}, наименование: {product_name}, текущее количество: {product_quantity}, поставщик: {product_supplier}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate9_vm","Данный товар заканчивается на складе, id: {product_id}, ref: {product_ref}, наименование: {product_name}, текущее количество: {product_quantity}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate10_vm","В бланке заказа номер {order_id} был отменен  заказ товара с ID: {product_id}, ref: {product_ref}, наименование: {product_name}. Количество: {product_quantity}, количество отмененных товаров: {product_quantity_reinjected}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate11_vm","Состояние заказа {order_id} изменилось количественно");
define("v_smsprestashop_sqltemplate111_vm",". Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate211_vm","Уважаемый клиент, состояние Вашего заказа {order_id} изменилось количественно: ");
define("v_smsprestashop_sqltemplate2111_vm",". Желаем хорошего дня! {shop_name}.");




// Magento
define("v_about_version_ms","Mage CMC Модуль, версия ");
define("v_about_supported_text_ms","Поддерживаемые версии Magento:");
define("v_about_supported_version_ms","1.6.x - 1.7.x");
define("v_about_manual_url_ms","www.mage-sms.com/manual.html");
define("v_about_website_name_ms","www.mage-sms.com");
define("v_about_website_url_ms","www.mage-sms.com/ru/index.html");

define("v_smsprestashop_sqltemplate1_ms","Новый заказ от {customer_firstname} {customer_lastname}, id пользователя: {customer_id}, номер заказа: {order_id}, оплата: {order_payment}, сумма: {order_total_paid} {order_currency}. Заказ: {order_products2}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate21_ms","Ваш заказ {order_id} был успешно создан, оплата: {order_payment}, сумма: {order_total_paid} {order_currency}. Желаем хорошего дня, {shop_name}.");
define("v_smsprestashop_sqltemplate2_ms","Клиент  {customer_firstname} {customer_lastname}, id: {customer_id}, только что подписался на {shop_name}.");
define("v_smsprestashop_sqltemplate22_ms","Дорогой {customer_firstname} {customer_lastname}, Ваш аккаунт в {shop_name} был создан успешно. Ваше имя пользователя: {customer_email}. Желаем хорошего дня!");
define("v_smsprestashop_sqltemplate3_ms","Клиент {customer_firstname} {customer_lastname}, id: {customer_id}, вернул заказанный товар {order_id}. Заказ: {orderReturn2}. Сообщение от клиента: {customer_question}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate23_ms","Мы получили ваш запрос. Заказ: {order_id}. Желаем хорошего дня, {shop_name}.");
define("v_smsprestashop_sqltemplate4_ms","В бланке заказа {order_id} было изменено количество, {orderSlip2}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate24_ms","В Вашем бланке заказа номер {order_id} было изменено количество товара, {orderSlip2}. Желаем хорошего дня, {shop_name}.");
define("v_smsprestashop_sqltemplate5_ms","Подтверждение платежа, заказ №: {order_id}, оплата: {order_payment},  сумма: {order_total_paid} {order_currency}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate25_ms","Мы успешно получили оплату за Ваш заказ {order_id} с помощью {order_payment},  сумма: {order_total_paid} {order_currency}. Желаем хорошего дня, {shop_name}.");
define("v_smsprestashop_sqltemplate62_ms","Заказ № {order_id} был обновлен, номер пересылки {order_shipping_number} предоставлен поставщиком. Информация из {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_ms","Уважаемый заказчик, товар по Вашему заказу № {order_id} был отправлен, предоставленный поставщиком номер пересылки - {order_shipping_number}. Желаем хорошего дня, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_ms","Этот товар был удален из {shop_name}, id: {product_id}, ref: {product_ref}, наименование: {product_name}.  Удалено пользователем {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_ms","Количество товара изменилось, id: {product_id}, ref: {product_ref}, наименование: {product_name}, текущее количество: {product_quantity}, поставщик: {product_supplier}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate9_ms","Данный товар заканчивается на складе, id: {product_id}, ref: {product_ref}, наименование: {product_name}, текущее количество: {product_quantity}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate10_ms","В бланке заказа номер {order_id} был отменен  заказ товара с ID: {product_id}, ref: {product_ref}, наименование: {product_name}. Количество: {product_quantity}, количество отмененных товаров: {product_quantity_reinjected}. Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate11_ms","Состояние заказа {order_id} изменилось количественно");
define("v_smsprestashop_sqltemplate111_ms",". Информация из {shop_name}.");
define("v_smsprestashop_sqltemplate211_ms","Уважаемый клиент, состояние Вашего заказа {order_id} изменилось количественно: ");
define("v_smsprestashop_sqltemplate2111_ms",". Желаем хорошего дня! {shop_name}.");











?>