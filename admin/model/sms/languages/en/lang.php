<?php


define("lang_iso_code","en");
define("smscurrency","EUR");

define("lang_alphabet","A;B;C;D;E;F;G;H;I;J;K;L;M;N;O;P;Q;R;S;T;U;V;W;X;Y;Z");




//new
define("v_all_years","All years");
define("v_menu_setting", "Settings");





// About.php
define("v_about_about","About");
define("v_about_version","Presta SMS module, version ");
define("v_about_copyright","Copyright © TOPefekt s.r.o., All rights reserved");
define("v_about_developer","Developer:");
define("v_about_topefekt","TOPefekt s.r.o.");
define("v_about_address","Address:");
define("v_about_street","B. Nemcove 767/13");
define("v_about_city","78701 Sumperk");
define("v_about_state","Czech Republic");
define("v_about_vat","VAT: CZ29444268");
define("v_about_phone","Office Telephone:");
define("v_about_phonenr","+420 581 110 998");
define("v_about_mail","E-mail:");
define("v_about_mailsales","sales@topefekt.com");
define("v_about_mailsupport","support@topefekt.com");
define("v_about_web","Web:");
define("v_about_website_name","www.presta-sms.com");
define("v_about_website_url","www.presta-sms.com/");

// AdminSms.php
define("v_adminsms_adminsms","Admin SMS");
define("v_adminsms_description","Select events during which shall be shop administrators notified via SMS and customize text of messages.");
define("v_adminsms_unicodesms","Unicode SMS");
define("v_adminsms_unicode","unicode");
define("v_adminsms_unicodetext","Check only if you want to use Chinese, Arabic, Greek, Hebrew, Korean, Cyrillic, etc. or diacritic in the text of your SMS message (Unicode text allows you to insert characters in all fonts and various other symbols simultaneously. Number of characters in one SMS will be reduced to 70).");
define("v_adminsms_unicodesave","Save");
define("v_adminsms_smsactive","Sending notifications via SMS is ACTIVE");
define("v_adminsms_smsnotactive","Sending notifications via SMS is NOT ACTIVE. To activate SMS sending check at least one administrator.");
define("v_adminsms_statusupdate","Update of order status");
define("v_adminsms_account","Account");
define("v_adminsms_product","Product");
define("v_adminsms_orderstatus","Order status");
define("v_adminsms_order","Order");
define("v_adminsms_adminsmsnotactive","Admin SMS - not active");
define("v_adminsms_addadmin","Please add at least one administrator!");
define("v_adminsms_usernotactive","User profile is not active! To register click on the SMS tab in the main menu. Module will display you screen for entering registration data. If you have used our module in the past and you know your username and password, fill in form for existing account. Otherwise fill in your email, accept the license terms and click register.");
define("v_adminsms_invalidtext","Invalid SMS text");
define("v_adminsms_smssaved","Text of SMS was saved.");
define("v_adminsms_unicodesaved","Unicode saved.");
define("v_adminsms_jschar","char");
define("v_adminsms_jschars","chars");
define("v_adminsms_jslabel","label");
define("v_adminsms_jssmstext","SMS text");
define("v_adminsms_jstotalsms","total sms:");
define("v_adminsms_smstext","Enter SMS text");
define("v_adminsms_preview","Preview");
define("v_adminsms_admins","Administrators");
define("v_adminsms_save","Save");
define("v_adminsms_cancel","Cancel");
define("v_adminsms_restoreunsaved","Restore unsaved changes to its original state."); //new


// AdminSmsProfile.php
define("v_adminsmsprofile_profilenotactive","User profile - not active");
define("v_adminsmsprofile_profileactive","User profile   - active");
define("v_adminsmsprofile_newaccount","New user account");
define("v_adminsmsprofile_notregistered","Not registered yet? Create account now!");
define("v_adminsmsprofile_email","Email:");
define("v_adminsmsprofile_company","Company name:");
define("v_adminsmsprofile_street","Street:");
define("v_adminsmsprofile_city","City:");
define("v_adminsmsprofile_zip","ZIP:");
define("v_adminsmsprofile_country","Country:");
define("v_adminsmsprofile_id","Company ID:");
define("v_adminsmsprofile_vat","Company VAT:");
define("v_adminsmsprofile_refererid","Referer ID:");
define("v_adminsmsprofile_licence","View licence terms:");
define("v_adminsmsprofile_agree","I agree");
define("v_adminsmsprofile_notagree","I dont agree");
define("v_adminsmsprofile_register","Register");
define("v_adminsmsprofile_required","Required field");
define("v_adminsmsprofile_sign","Sign in");
define("v_adminsmsprofile_signtext","If You already have an account, please sign in.");
define("v_adminsmsprofile_username","Username:");
define("v_adminsmsprofile_password","Password:");
define("v_adminsmsprofile_login","Log in");
define("v_adminsmsprofile_editaccount","Edit user account");
define("v_adminsmsprofile_save","Save");
define("v_adminsmsprofile_accountinfo","User account info");
define("v_adminsmsprofile_credit","SMS Credit:");
define("v_adminsmsprofile_addadmin","Add administrators");
define("v_adminsmsprofile_name","Name:");
define("v_adminsmsprofile_mobilenr","Mobile number:");
define("v_adminsmsprofile_edit","Edit");
define("v_adminsmsprofile_add","Add");
define("v_adminsmsprofile_settings","Other settings");
define("v_adminsmsprofile_simulate","Simulate SMS sending:");
define("v_adminsmsprofile_simulatehint","Allows to test sending of SMS in modul and to view sent SMS in SMS history with a special status.");
define("v_adminsmsprofile_deletedb","Delete database:");
define("v_adminsmsprofile_deletedbhint","Allows to decide if current SMS settings and database of sent SMS shall be stored when uninstalling SMS module.");
define("v_adminsmsprofile_report","Delivery reports:");
define("v_adminsmsprofile_reporthint","Allows to see delivery reports of SMS in SMS history Tab.");
define("v_adminsmsprofile_lowcredit","Low credit alert:");
define("v_adminsmsprofile_lowcredithint"," Allows to receive email when your SMS credit is low.");
define("v_adminsmsprofile_dremail","Email for delivery reports:");
define("v_adminsmsprofile_dremailhint","Allows to receive email with delivery report of SMS.");
define("v_adminsmsprofile_admincreated","Admin was created.");
define("v_adminsmsprofile_agreetext","You have to agree with licence terms.");
define("v_adminsmsprofile_accountcreated","Account was created.");
define("v_adminsmsprofile_addaccounttext","you can add another account after ");
define("v_adminsmsprofile_minutes","minutes");
define("v_adminsmsprofile_cantconnect","can not connect to SMS server");
define("v_adminsmsprofile_loginok","You were succesfully loged in.");
define("v_adminsmsprofile_error","error");
define("v_adminsmsprofile_invalidemail","Invalid e-mail for delivery report.");
define("v_adminsmsprofile_invalidemail2","Invalid e-mail");
define("v_adminsmsprofile_accountchanged","Account was changed.");
define("v_adminsmsprofile_accountchanged2","Account was changed, but module URL for DR does not answer.");
define("v_adminsmsprofile_changeaccounttext","you can change account after ");
define("v_adminsmsprofile_seeconds"," seconds");
define("v_adminsmsprofile_invalidname","Invalid name");
define("v_adminsmsprofile_invalidnumber","Invalid number");
define("v_adminsmsprofile_adminchanged","Admin was changed.");
define("v_adminsmsprofile_admindeleted","Admin was deleted.");
define("v_adminsmsprofile_nochanges","no changes were made");
define("v_adminsmsprofile_loginerror","login error");
define("v_adminsmsprofile_confirmdelete","Are you sure to delete");
define("v_adminsmsprofile_deleteadmin","DELETE administrator");
define("v_adminsmsprofile_editadmin","EDIT administrator");
define("v_adminsmsprofile_intformat","in international format, no leading zeros or a “+” sign, e.g., 447971796595");
define("v_adminsmsprofile_uninstall","(when uninstall)");
define("v_adminsmsprofile_noalert","(0 = no alert)");
define("v_adminsmsprofile_filluser","Fill in username and password.");

// CustomerSms.php
define("v_customersms_customersms","Customer SMS - ");
define("v_customersms_notactive","Customer SMS - not active");
define("v_customersms_langversion"," language version");
define("v_customersms_description","Select events during which shall be customer notified via SMS and customize text of messages. You can also add a new language version of SMS messages for each country separately. In countries with undefined language version will be used default language version.");
define("v_customersms_addsms","Add SMS text version");
define("v_customersms_country","Select country: ");
define("v_customersms_unicodesms","Unicode SMS");
define("v_customersms_unicodetext","Check only if you want to use Chinese, Arabic, Greek, Hebrew, Korean, Cyrillic, etc. or diacritic in the text of your SMS message (Unicode text allows you to insert characters in all fonts and various other symbols simultaneously. Number of characters in one SMS will be reduced to 70).");
define("v_customersms_orderstatus","Order status");
define("v_customersms_smsactive","Sending notifications via SMS is ACTIVE");
define("v_customersms_smsnotactive","Sending notifications via SMS is NOT ACTIVE. To activate SMS sending check „Active“ in desired status detail."); // edit
define("v_customersms_statusupdate"," Update of order status ");
define("v_customersms_account","Account");
define("v_customersms_usernotactive","User profile is not active! To register click on the SMS tab in the main menu. Module will display you screen for entering registration data. If you have used our module in the past and you know your username and password, fill in form for existing account. Otherwise fill in your email, accept the license terms and click register.");
define("v_customersms_invalidtext","Invalid SMS text");
define("v_customersms_smssaved","Text of SMS was saved.");
define("v_customersms_smsdeleted","SMS text version was deleted.");
define("v_customersms_confirmdelete","Are you sure to delete");
define("v_customersms_langdelete","DELETE language version");
define("v_customersms_smstext","SMS text");
define("v_customersms_unicode","unicode");
define("v_customersms_versionfor","SMS text version for ");
define("v_customersms_wassaved"," was saved");
define("v_customersms_preview","Preview");
define("v_customersms_active","Active");
define("v_customersms_save","Save");
define("v_customersms_cancel","Cancel");
define("v_customersms_jstotalsms","total sms:");
define("v_customersms_editlang","EDIT language version");
define("v_customersms_default","default");
define("v_customersms_edit","Edit");
define("v_customersms_add","Add");
define("v_customersms_order","Order");
define("v_customersms_jschars","Chars");
define("v_customersms_unicodesaved","Unicode was saved.");
define("v_customersms_restoreunsaved","Restore unsaved changes to its original state."); //new


//PayPal.php
define("v_paypal_credit","Purchase Credit");
define("v_paypal_creditnotactive","Purchase Credit - not active");
define("v_paypal_usernotactive","User profile is not active! To register click on the SMS tab in the main menu. Module will display you screen for entering registration data. If you have used our module in the past and you know your username and password, fill in form for existing account. Otherwise fill in your email, accept the license terms and click register.");
define("v_paypal_clickhereif"," In case methods for credit purchase are not displayed properly, please click here:"); //new



//SendSms.php
define("v_sendsms_bulksms","Bulk SMS text");
define("v_sendsms_addrecipients","Add recipients  ");
define("v_sendsms_addtext","Add one or more recipients separated by commas. Number must be in international format, no leading zeros or “+“ sign.");
define("v_sendsms_eg"," (e.g. 447971796595)");
define("v_sendsms_entertext","Enter SMS text");
define("v_sendsms_addcsv","Add recipients in CSV file ");
define("v_sendsms_csvtext","CSV file - 1 column, 1st column - number (Number must be in international format, no leading zeros or “+“ sign; e.g. 447971796595)");
define("v_sendsms_unicode"," Unicode ");
define("v_sendsms_unicodetext","Check only if you want to use Chinese, Arabic, Greek, Hebrew, Korean, Cyrillic, etc. or diacritic in the text of your SMS message (Unicode text allows you to insert characters in all fonts and various other symbols simultaneously. Number of characters in one SMS will be reduced to 70).");
define("v_sendsms_time","Your time: ");
define("v_sendsms_time2","Time: ");
define("v_sendsms_timezone","time zone: ");
define("v_sendsms_timezone2","time zone settings");
define("v_sendsms_longtext","Text is too long");
define("v_sendsms_sendsms","Send SMS");
define("v_sendsms_send","Send");
define("v_sendsms_sendtext","Send SMS or bulk SMS. Enter mobile numbers or upload CSV file.");
define("v_sendsms_smsnotactive","Send SMS - not active");
define("v_sendsms_usernotactive","User profile is not active! To register click on the SMS tab in the main menu. Module will display you screen for entering registration data. If you have used our module in the past and you know your username and password, fill in form for existing account. Otherwise fill in your email, accept the license terms and click register.");
define("v_sendsms_fillsms","Fill in SMS text.");
define("v_sendsms_smslong","SMS text is too long (max. 612 characters).");
define("v_sendsms_unicodesmslong","SMS text is too long (max. 268 unicode characters).");
define("v_sendsms_wrongtime","Wrong time of SMS sending.");
define("v_sendsms_norecipients","Recipients found: 0");
define("v_sendsms_lowcreditall","You do not have enough credit to send SMS to all ");
define("v_sendsms_recipients"," recipients.");
define("v_sendsms_smssent","SMS was sent.");
define("v_sendsms_smssaved","SMS was saved.");
define("v_sendsms_wrongnumber","wrong number or unavailable");
define("v_sendsms_unauthorized","unauthorized senderID in confirmation sms");
define("v_sendsms_lowcredit","low credit for sending sms");
define("v_sendsms_nounicode","unicode is not supported");
define("v_sendsms_cantconnect","can not connect to SMS server");
define("v_sendsms_simulation","SMS SIMULATION (Sending of SMS was simulated. Recipient will not receive SMS)");
define("v_sendsms_simulationconfirm","SMS was sent (simulation).");
define("v_sendsms_error","error");
define("v_sendsms_loginerror","login error");
define("v_sendsms_sendlater"," Send later ");
define("v_sendsms_jschars","Characters: ");
define("v_sendsms_hr","1hr");
define("v_sendsms_date","Date: ");

// SmsAnswers.php
define("v_smsanswers_smsanswers","SMS Answers");
define("v_smsanswers_description","SMS answer from customer is displayed only when customer receives SMS from your shop with SMS sender type „System number“ and customer replies using his own mobile phone.");
define("v_smsanswers_show","Show");
define("v_smsanswers_results","Search results ");
define("v_smsanswers_of"," of ");
define("v_smsanswers_smscenter","SMS center");
define("v_smsanswers_date","Date");
define("v_smsanswers_number","From number");
define("v_smsanswers_new","new");
define("v_smsanswers_previous","Previous");
define("v_smsanswers_next","Next");
define("v_smsanswers_page"," Page: ");
define("v_smsanswers_smsnotactive","SMS Answers - not active");
define("v_smsanswers_usernotactive","User profile is not active! To register click on the SMS tab in the main menu. Module will display you screen for entering registration data. If you have used our module in the past and you know your username and password, fill in form for existing account. Otherwise fill in your email, accept the license terms and click register.");
define("v_smsanswers_year","year");
define("v_smsanswers_month","month");
define("v_smsanswers_sms","SMS");
define("v_smsanswers_text","Text:");
define("v_smsanswers_nosms","Total SMS answers: 0");

// SmsHistory.php
define("v_smshistory_sent","SENT to recipient");
define("v_smshistory_error","ERROR");
define("v_smshistory_delivered","DELIVERED to recipient");
define("v_smshistory_buffered","RECIPIENT UNAVAILABLE"); //new
define("v_smshistory_smshistory","SMS History");
define("v_smshistory_description","History of sent SMS from SMS module.");
//define("v_smshistory_status","status");
define("v_smshistory_adminsms"," admin sms");
define("v_smshistory_customersms"," customer sms");
define("v_smshistory_marketingsms"," marketing sms");
define("v_smshistory_simplesms"," simple sms");
define("v_smshistory_show","Show");
define("v_smshistory_results","Search results ");
define("v_smshistory_of"," of ");
define("v_smshistory_type","Type");
define("v_smshistory_date","Date");
define("v_smshistory_subject","SMS subject");
define("v_smshistory_nubmer","Number");
define("v_smshistory_yes","yes");
define("v_smshistory_no","no");
define("v_smshistory_sysnumber","system number");
define("v_smshistory_balance","Credit balance:");
define("v_smshistory_customerdetail","Display customer detail");
define("v_smshistory_smstext","Text:");
define("v_smshistory_totalsms","Total SMS:");
define("v_smshistory_smsnotactive","SMS History - not active");
define("v_smshistory_usernotactive","User profile is not active! To register click on the SMS tab in the main menu. Module will display you screen for entering registration data. If you have used our module in the past and you know your username and password, fill in form for existing account. Otherwise fill in your email, accept the license terms and click register.");
define("v_smshistory_price","SMS price in credits:");
define("v_smshistory_year","year");
define("v_smshistory_month","month");
define("v_smshistory_status","Status");
define("v_smshistory_recipient","Recipient");
define("v_smshistory_unicode","Unicode:");
define("v_smshistory_senderid","senderID:");
define("v_smshistory_previous","Previous");
define("v_smshistory_next","Next");
define("v_smshistory_page"," Page: ");
define("v_smshistory_nosms","Total SMS: 0");
define("v_smshistory_sms","SMS");

// SmsMarketing.php
define("v_smsmarketing_smsbulk","SMS Marketing - bulk SMS text");
define("v_smsmarketing_entertext","Enter SMS text");
define("v_smsmarketing_unicode"," Unicode ");
define("v_smsmarketing_unicodetext","Check only if you want to use Chinese, Arabic, Greek, Hebrew, Korean, Cyrillic, etc. or diacritic in the text of your SMS message (Unicode text allows you to insert characters in all fonts and various other symbols simultaneously. Number of characters in one SMS will be reduced to 70).");
define("v_smsmarketing_sendlater"," Send later ");
define("v_smsmarketing_yourtime","Your time: ");
define("v_smsmarketing_jstotalcustomers","Total customers:");
define("v_smsmarketing_jstotalsms","Total SMS:");
define("v_smsmarketing_bulkfilter","SMS Marketing - bulk SMS filter");
define("v_smsmarketing_allcustomers","All customers");
define("v_smsmarketing_companycustomers","company customers");
define("v_smsmarketing_privatecustomers","private customers");
define("v_smsmarketing_allcountries","All countries");
define("v_smsmarketing_lastname","Last name:");
define("v_smsmarketing_firstname","First name:");
define("v_smsmarketing_lastname2","Last name");
define("v_smsmarketing_firstname2","First name");
define("v_smsmarketing_groups","Groups:");
define("v_smsmarketing_all","All");
define("v_smsmarketing_gender","Gender:");
define("v_smsmarketing_male","Male");
define("v_smsmarketing_female","Female");
define("v_smsmarketing_news","Newsletter:");
define("v_smsmarketing_yes","Yes");
define("v_smsmarketing_no","No");
define("v_smsmarketing_applyfilter","Apply filter");
define("v_smsmarketing_birthfrom","Date of birth from: ");
define("v_smsmarketing_birthto","to: ");
define("v_smsmarketing_registerfrom","Date of registration from: ");
define("v_smsmarketing_customersfound","Customers found: ");
define("v_smsmarketing_results","results");
define("v_smsmarketing_action","Action");
define("v_smsmarketing_mobilenr","Mobile number");
define("v_smsmarketing_customerid","Customer ID");
define("v_smsmarketing_removecustomer","REMOVE customer from this list");
define("v_smsmarketing_next","Next");
define("v_smsmarketing_previous","Previous");
define("v_smsmarketing_page"," Page: ");
define("v_smsmarketing_smsmarketingfound","SMS Marketing - customers found: ");
define("v_smsmarketing_description","Write text of message and use advanced filter to target your marketing campaign.");
define("v_smsmarketing_smsmarketing","SMS Marketing");
define("v_smsmarketing_smsnotactive","SMS Marketing - not active");
define("v_smsmarketing_usernotactive","User profile is not active! To register click on the SMS tab in the main menu. Module will display you screen for entering registration data. If you have used our module in the past and you know your username and password, fill in form for existing account. Otherwise fill in your email, accept the license terms and click register.");
define("v_smsmarketing_fillsms","Fill in SMS text");
define("v_smsmarketing_smslong","SMS text is too long (max. 612 characters).");
define("v_smsmarketing_unicodesmslong","SMS text is too long (max. 268 unicode characters).");
define("v_smsmarketing_nocustomers","Customers found: 0");
define("v_smsmarketing_wrongtime","Wrong time of SMS sending.");
define("v_smsmarketing_lowcreditall","You do not have enough credit to send SMS to all ");
define("v_smsmarketing_customers"," customers.");
define("v_smsmarketing_smssent","SMS was sent.");
define("v_smsmarketing_smssaved","SMS was saved.");
define("v_smsmarketing_wrongnr","wrong number or unavailable");
define("v_smsmarketing_unauthorized","unauthorized senderID in confirmation sms");
define("v_smsmarketing_lowcredit","low credit for sending sms");
define("v_smsmarketing_nounicode","unicode is not supported");
define("v_smsmarketing_cantconnect","can not connect to SMS server");
define("v_smsmarketing_simulation","SMS SIMULATION (Sending of SMS was simulated. Recipient will not receive SMS)");
define("v_smsmarketing_simulationconfirm","SMS was sent (simulation).");
define("v_smsmarketing_error","error");
define("v_smsmarketing_loginerror","login error");
define("v_smsmarketing_date","Date:");
define("v_smsmarketing_time","Time: ");
define("v_smsmarketing_hr","1hr");
define("v_smsmarketing_timezone","time zone: ");
define("v_smsmarketing_timezone2","time zone settings");
define("v_smsmarketing_send","Send");
define("v_smsmarketing_jschars","Characters: ");
define("v_smsmarketing_longtext","Text is too long");
define("v_smsmarketing_typ","Type:");
define("v_smsmarketing_country","Country:");
define("v_smsmarketing_city","City:");
define("v_smsmarketing_advert","Advert:");
define("v_smsmarketing_store","Store:"); //new
define("v_smsmarketing_allstores","All stores"); //new

// smsprestashop.php
define("v_smsprestashop_prestashop","Presta SMS");
define("v_smsprestashop_description","presta-sms.com - send SMS from your Prestashop!");
define("v_smsprestashop_admin","Admin SMS");
define("v_smsprestashop_customer","Customer SMS");
define("v_smsprestashop_settings","SMS Settings");
define("v_smsprestashop_history","SMS History");
define("v_smsprestashop_credit","Purchase Credit");
define("v_smsprestashop_marketing","SMS Marketing");
define("v_smsprestashop_answers","SMS Answers");
define("v_smsprestashop_send","Send SMS");
define("v_smsprestashop_about","About");
define("v_smsprestashop_wrongnr","wrong number or unavailable");
define("v_smsprestashop_unauthorized","unauthorized senderID in confirmation sms");
define("v_smsprestashop_lowcredit","low credit for sending sms");
define("v_smsprestashop_nounicode","unicode is not supported");
define("v_smsprestashop_loginerror","login error");
define("v_smsprestashop_cantconnect","can not connect to SMS server");
define("v_smsprestashop_simulation","SMS SIMULATION (Sending of SMS was simulated. Recipient will not receive SMS)");
define("v_smsprestashop_nrunknown","unknown mobile number");
define("v_smsprestashop_notconnected","not connected to SMS server");
define("v_smsprestashop_sqlinfo1","New orders");
define("v_smsprestashop_sqltemplate1","New order from {customer_firstname} {customer_lastname}, customer id: {customer_id}, order id: {order_id}, payment: {order_payment}, amount: {order_total_paid} {order_currency}. Order: {order_products2}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate21","Your order {order_id} was successfully created, payment: {order_payment}, amount: {order_total_paid} {order_currency}. Have a nice day, {shop_name}.");
define("v_smsprestashop_notice","Possible variables:");
define("v_smsprestashop_sqlinfo2","Successful customer create account");
define("v_smsprestashop_sqltemplate2","Customer  {customer_firstname} {customer_lastname}, id: {customer_id}, has just subscribed to {shop_name}.");
define("v_smsprestashop_sqltemplate22","Dear {customer_firstname} {customer_lastname}, your account in {shop_name} was successfully created. Your username: {customer_email}. Have a nice day!");
define("v_smsprestashop_sqlinfo3","Product returned");
define("v_smsprestashop_sqltemplate3","Customer {customer_firstname} {customer_lastname}, id: {customer_id}, has returned product from order {order_id}. Order: {orderReturn2}. Customer text: {customer_question}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate23","We have received your request. Order {order_id}. Have a nice day, {shop_name}.");
define("v_smsprestashop_sqlinfo4","Called when a quantity of one product change in an order");
define("v_smsprestashop_sqltemplate4","In order {order_id} was changed quantity, {orderSlip2}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate24","In your order {order_id} was changed quantity, {orderSlip2}. Have a nice day, {shop_name}.");
define("v_smsprestashop_sqlinfo5","Payment confirmation");
define("v_smsprestashop_sqltemplate5","Payment confirmation, order id: {order_id}, payment: {order_payment},  amount: {order_total_paid} {order_currency}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate25","We have successfully received payment for your order {order_id} via {order_payment},  amount: {order_total_paid} {order_currency}. Have a nice day, {shop_name}.");
define("v_smsprestashop_sqlinfo62","Update of tracking number in order");  //new
define("v_smsprestashop_sqltemplate62","Order {order_id} was updated, tracking number is {order_shipping_number}. Info from {shop_name}."); //new
define("v_smsprestashop_sqltemplate262","Dear Customer, your order {order_id} was shipped, tracking number is {order_shipping_number}. Have a nice day, {shop_name}."); //new
define("v_smsprestashop_sqlinfo7","Called when a product is deleted");
define("v_smsprestashop_sqltemplate7","This product was deleted from {shop_name}, id: {product_id}, ref: {product_ref}, name: {product_name}.  Deleted by user {employee_id}, {employee_email}.");
define("v_smsprestashop_sqlinfo8","Quantity is updated only when the customer effectively place his order");
define("v_smsprestashop_sqltemplate8","Quantity of product has changed, id: {product_id}, ref: {product_ref}, name: {product_name}, current  quantity: {product_quantity}, supplier: {product_supplier}. Info from {shop_name}.");
define("v_smsprestashop_sqlinfo9","Product out of stock");
define("v_smsprestashop_sqltemplate9","This product is almost out of stock, id: {product_id}, ref: {product_ref}, name: {product_name}, current  quantity: {product_quantity}. Info from {shop_name}.");
define("v_smsprestashop_sqlinfo10","Called when admin or customer cancel a product in an order");
define("v_smsprestashop_sqltemplate10","In order {order_id} was canceled product with id: {product_id}, ref: {product_ref}, name: {product_name}. Quantity: {product_quantity}, quantity reinjected: {product_quantity_reinjected}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate11","Status of order {order_id} has changed to ");
define("v_smsprestashop_sqltemplate111",". Info from {shop_name}.");
define("v_smsprestashop_sqltemplate211","Dear Customer, status of your order {order_id} has changed to ");
define("v_smsprestashop_sqltemplate2111",". Have a nice day, {shop_name}.");
define("v_smsprestashop_bankwire","Bank wire");
define("v_smsprestashop_company","Company Name");
define("v_smsprestashop_country","Country");
define("v_smsprestashop_city","City");
define("v_smsprestashop_qty","qty");
define("v_smsprestashop_qtyreinjected","qty reinjected"); //bez diakritiky
define("v_smsprestashop_qtyreturned","qty returned"); //bez diakritiky
define("v_smsprestashop_name","name"); //bez diakritiky
define("v_smsprestashop_notfound","not found"); //new

// SmsWizard.php
define("v_smswizard_ownsettings","SMS Settings - Select Own number sender ID for ");
define("v_smswizard_ownnrsettings","Own number sender ID settings");
define("v_smswizard_ownnrid","own number sender ID");
define("v_smswizard_existingown","Existing Own number:");
define("v_smswizard_newownnrid","New Own number sender ID:");
define("v_smswizard_intformat","in international format, no leading <br />zeros or a “+” sign, e.g., 447971796595");
define("v_smswizard_smscode","SMS code:");
define("v_smswizard_confirm","CONFIRM");
define("v_smswizard_required","Required field");
define("v_smswizard_textsettings","SMS Settings - Select Text sender ID for ");
define("v_smswizard_senderidsettings","Text sender ID settings");
define("v_smswizard_existingsid","Existing Text sender ID:");
define("v_smswizard_newsid","New Text sender ID:");
define("v_smswizard_maxchars","max. 11 characters");
define("v_smswizard_smssettings","SMS Settings");
define("v_smswizard_description","Define SMS Sender Type for each country separately (Text sender ID, Own mobile number or System number). SMS price depends on the recipient country, selected SMS sender type and amount of payment. In countries with undefined SMS sender type will be used System number sender type.");
define("v_smswizard_customersettings","Customer SMS settings");
define("v_smswizard_sendertype","SENDER TYPE");
define("v_smswizard_network","NETWORK");
define("v_smswizard_smsprice","SMS PRICE<br />IN CREDITS");
define("v_smswizard_price","SMS PRICE IN EUR (excl. VAT)");
define("v_smswizard_payment","payment");
define("v_smswizard_unicode","Unicode ");
define("v_smswizard_unicodetext","Unicode characters support (Unicode allows you to enter characters in all fonts and various symbols simultaneously. Is used for Chinese, Arabic, Greek, Hebrew, Korean, Cyrillic, etc. or diacritic in the text of your SMS message)");
define("v_smswizard_textsid","TEXT SENDER ID");
define("v_smswizard_textsid2","Text sender ID");
define("v_smswizard_systemnr","SYSTEM NUMBER");
define("v_smswizard_ownnrsid","OWN NUMBER SENDER ID");
define("v_smswizard_simhosting","SIM HOSTING");
define("v_smswizard_unicodesupported","UNICODE SUPPORTED");
define("v_smswizard_nounicode","UNICODE NOT SUPPORTED");
define("v_smswizard_savesettings","SAVE SMS SETTINGS");
define("v_smswizard_suredelete","Are you sure to delete");
define("v_smswizard_country","Select country: ");
define("v_smswizard_addcountry","ADD/CHANGE SELECTED COUNTRY");
define("v_smswizard_notactive","SMS settings - not active");
define("v_smswizard_usernotactive","User profile is not active! To register click on the SMS tab in the main menu. Module will display you screen for entering registration data. If you have used our module in the past and you know your username and password, fill in form for existing account. Otherwise fill in your email, accept the license terms and click register.");
define("v_smswizard_error","error");
define("v_smswizard_cantconnect","can not connect to SMS server");
define("v_smswizard_deleted"," was deleted."); // country was deleted
define("v_smswizard_choosesender","choose sender type");
define("v_smswizard_countrysaved"," was saved."); //country name was saved
define("v_smswizard_fillsid","fill in own number sender ID");
define("v_smswizard_mustbenumber","own number sender ID must be number");
define("v_smswizard_confirmcode","correctly confirm sms code");
define("v_smswizard_ownsidfor","Own number sender ID for ");
define("v_smswizard_wassaved"," was saved."); // Own number sender ID for(Text sender ID for ) ... was saved
define("v_smswizard_error2","error - ");
define("v_smswizard_loginerror","login error");
define("v_smswizard_retypecode","Now retype SMS code.");
define("v_smswizard_retypecode2","Now retype SMS code. SMS will be send in next 60 seconds.");
define("v_smswizard_wrongnrerror","error - wrong number or unavailable");
define("v_smswizard_unauthorizederror","error - unauthorized senderID in confirmation sms");
define("v_smswizard_lowcrediterror","error - low credit for sending validation SMS");
define("v_smswizard_filltextsid","fill in text sender ID");
define("v_smswizard_filltextsid2","fill in text sender ID, 3-11 characters");
define("v_smswizard_chars","possible characters: ");
define("v_smswizard_nonumber","text sender ID can't be number");
define("v_smswizard_textsidfor","Text sender ID for ");
define("v_smswizard_adminsettings","Admin SMS settings");
define("v_smswizard_validate","VALIDATE"); //new
define("v_smswizard_smsvalidation","SMS validation"); //new
define("v_smswizard_confirmationcode","Confirmation code: ");  //new, bez diakritiky, pouzito v sms
define("v_smswizard_updatepricelist","Update pricelist"); //new
define("v_smswizard_eg","e.g.:"); //new
define("v_smswizard_pricelistupdated","Pricelist was successfully updated."); //new
define("v_smswizard_edit","edit"); //new
define("v_smswizard_delete","delete"); //new





//new
define("v_smsprestashop_smscharging_fieldset","Your online stores");
define("v_smsprestashop_smscharging","SMS opt-out");
define("v_smsprestashop_smscharging_h2","SMS opt-out - setting SMS opt-out option from the cart and SMS charging");
define("v_smsprestashop_smscharging_description","Select an online store for which you want to set in the cart option to unsubscribe SMS notifications, setup cost of SMS messages and define the text that is displayed to the customer in the cart.");
define("v_adminsmsprofile_prefer","For sending SMS prefer phone nr. from:");
define("v_adminsmsprofile_preferinvoice","invoice address");
define("v_adminsmsprofile_preferdeliver","delivery address");
define("v_smsprestashop_smscharging_price","Price of SMS");
define("v_smsprestashop_smscharging_texts","Text displayed in the cart");
define("v_smsprestashop_smscharging_active","Activate displaying SMS opt-out feature in the cart");
define("v_smsprestashop_smscharging_optoutactive","SMS opt-out is ACTIVE");
define("v_smsprestashop_smscharging_optoutnotactive","SMS opt-out is NOT ACTIVE. To activate SMS opt-out check the checkbox „Activate displaying SMS opt-out feature in the cart“");
define("v_smsprestashop_smscharging_saved","Setting of the SMS opt-out feature was successfully changed");
define("v_smswizard_pricelistupdated_changed","Price of SMS messages has changed in the following countries:");
define("v_smsprestashop_newversion","New version available for download:");

define("v_about_manual_text","Manual:");
define("v_about_manual_url","www.presta-sms.com/manual.html");
define("v_about_supported_text","Supported PrestaShop versions:");
define("v_about_supported_text_ps","1.5.x");

define("v_contact_form","Contact form");

define("v_remove_duplicate","Remove duplicate numbers");



define("v_registration_type","Registration type:");
define("v_registration_type_personal","Personal");
define("v_registration_type_business","Business");
define("v_registration_address","Address");
define("v_registration_billing_information","Billing information");
define("v_registration_personal_contact","Contact person");
define("v_registration_company_name","Enter the name of the company.");
define("v_registration_vat_invalid","Invalid VAT");




//stats new
define("v_statistics","Statistics");
define("v_statistics_smsnotactive","Statistics - not active");
define("v_statistics_day","day");
define("v_statistics_datefrom","Date from:");
define("v_statistics_dateto","to:");


// filter
define("v_filter_deleted_customers", "Removed Customers: ");
define("v_filter_more", "More...");
define("v_filter_load", "Saved Filters");
define("v_filter_save", "Save filter");
define("v_filter_clear", "Reset filter");
define("v_filter_name", "Filter Name");
define("v_filter_date", "Date");
define("v_filter_been_apply", "Filter has been applied.");
define("v_filter_been_saved", "Filter has been saved.");
define("v_filter_been_clear", "Filter has been reset.");
define("v_filter_q_clear", "Are you sure you want to reset the filter?");
define("v_filter_q_delete", "Are you sure you want to remove the filter?");
define("v_filter_not_found", "No filter has been found.");
define("v_send_busy", "We are processing your request");

// Template
define("v_template_load", "Saved Templates");
define("v_template_save", "Save template");
define("v_template_name", "Template Name");
define("v_template_been_apply", "Template has been loaded.");
define("v_template_been_saved", "Template has been saved.");
define("v_template_q_delete", "Are you sure you want to remove the template?");
define("v_template_not_found", "No template has been found.");
define("v_show_virtual", "Virtual operators (MVNO)");

// Marketing
define("v_marketing_coupon", "Select coupon");
define("v_marketing_coupon_create", "Create coupon");
define("v_marketing_none", "Please Select");
define("v_smshistory_simulation", "SIMULATION");
define("v_smshistory_deleted", "DELETED");
define("v_smshistory_sheduled", "SCHEDULED");
define("v_smshistory_duplicate", "DUPLICATE");
define("v_smshistory_dnd", "DO NOT DISTURB registry (DND)");
define("v_sendsms_addcsv_vcard","Add recipients in CSV(.csv, .txt) or vCARD(.vcf)");

// Hooks v2
define("v_hook_return", "Returns");
define("v_hook_return_customer", "We confirm we have received your request to claim the goods.");
define("v_hook_return_admin", "New claim from customer was received.");
define("v_smsprestashop_return_status_admin","Status of a claim {return_id} has changed to ");
define("v_smsprestashop_return_status_admin2",". Info from {shop_name}.");
define("v_smsprestashop_return_status_customer","Dear Customer, status of your claim {return_id} has changed to ");
define("v_smsprestashop_return_status_customer2",". Have a nice day, {shop_name}.");

// OptOut
define("v_optout_auto_variable", "Add SMS product to cart:");
define("v_optout_auto", "Automatically");
define("v_optout_manual", "Manually");


// ZenCart
define("v_about_version_zen","Zen SMS module version ");
define("v_about_supported_text_zen","Supported ZenCart versions:");
define("v_about_supported_version_zen","1.3.x. - 1.5.x");
define("v_about_manual_url_zen","www.zen-sms.net/manual.html");
define("v_about_website_name_zen","www.zen-sms.net");
define("v_about_website_url_zen","www.zen-sms.net/index.html");

define("v_smsprestashop_sqltemplate1_zen","New order from {customer_firstname} {customer_lastname}, customer id: {customer_id}, order id: {order_id}, payment: {order_payment}, amount: {order_total_paid} {order_currency}. Order: {order_products2}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate21_zen","Your order {order_id} was successfully created, payment: {order_payment}, amount: {order_total_paid} {order_currency}. Have a nice day, {shop_name}.");
define("v_smsprestashop_sqltemplate2_zen","Customer  {customer_firstname} {customer_lastname}, id: {customer_id}, has just subscribed to {shop_name}.");
define("v_smsprestashop_sqltemplate22_zen","Dear {customer_firstname} {customer_lastname}, your account in {shop_name} was successfully created. Your username: {customer_email}. Have a nice day!");
define("v_smsprestashop_sqltemplate3_zen","Customer {customer_firstname} {customer_lastname}, id: {customer_id}, has returned product from order {order_id}. Order: {orderReturn2}. Customer text: {customer_question}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate23_zen","We have received your request. Order {order_id}. Have a nice day, {shop_name}.");
define("v_smsprestashop_sqltemplate4_zen","In order {order_id} was changed quantity, {orderSlip2}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate24_zen","In your order {order_id} was changed quantity, {orderSlip2}. Have a nice day, {shop_name}.");
define("v_smsprestashop_sqltemplate5_zen","Payment confirmation, order id: {order_id}, payment: {order_payment},  amount: {order_total_paid} {order_currency}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate25_zen","We have successfully received payment for your order {order_id} via {order_payment},  amount: {order_total_paid} {order_currency}. Have a nice day, {shop_name}.");
define("v_smsprestashop_sqltemplate62_zen","Order {order_id} was updated, tracking number is {order_shipping_number}. Info from {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_zen","Dear Customer, your order {order_id} was shipped, tracking number is {order_shipping_number}. Have a nice day, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_zen","This product was deleted from {shop_name}, id: {product_id}, ref: {product_ref}, name: {product_name}.  Deleted by user {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_zen","Quantity of product has changed, id: {product_id}, ref: {product_ref}, name: {product_name}, current  quantity: {product_quantity}, supplier: {product_supplier}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate9_zen","This product is almost out of stock, id: {product_id}, ref: {product_ref}, name: {product_name}, current  quantity: {product_quantity}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate10_zen","In order {order_id} was canceled product with id: {product_id}, ref: {product_ref}, name: {product_name}. Quantity: {product_quantity}, quantity reinjected: {product_quantity_reinjected}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate11_zen","Status of order {order_id} has changed to ");
define("v_smsprestashop_sqltemplate111_zen",". Info from {shop_name}.");
define("v_smsprestashop_sqltemplate211_zen","Dear Customer, status of your order {order_id} has changed to ");
define("v_smsprestashop_sqltemplate2111_zen",". Have a nice day, {shop_name}.");







// OpenCart
define("v_about_version_oc","Cart SMS module version ");
define("v_about_supported_text_oc","Supported OpenCart versions:");
define("v_about_supported_version_oc","1.4.7 - 1.5.6.1");
define("v_about_manual_url_oc","www.cart-sms.com/manual.html");
define("v_about_website_name_oc","www.cart-sms.com");
define("v_about_website_url_oc","www.cart-sms.com/index.html");

define("v_smsprestashop_sqltemplate1_oc","New order from {customer_firstname} {customer_lastname}, customer id: {customer_id}, order id: {order_id}, payment: {order_payment}, amount: {order_total_paid} {order_currency}. Order: {order_products2}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate21_oc","Your order {order_id} was successfully created, payment: {order_payment}, amount: {order_total_paid} {order_currency}. Have a nice day, {shop_name}.");
define("v_smsprestashop_sqltemplate2_oc","Customer  {customer_firstname} {customer_lastname}, id: {customer_id}, has just subscribed to {shop_name}.");
define("v_smsprestashop_sqltemplate22_oc","Dear {customer_firstname} {customer_lastname}, your account in {shop_name} was successfully created. Your username: {customer_email}. Have a nice day!");
define("v_smsprestashop_sqltemplate3_oc","Customer {customer_firstname} {customer_lastname}, id: {customer_id}, has returned product from order {order_id}. Order: {orderReturn2}. Customer text: {customer_question}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate23_oc","We have received your request. Order {order_id}. Have a nice day, {shop_name}.");
define("v_smsprestashop_sqltemplate4_oc","In order {order_id} was changed quantity, {orderSlip2}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate24_oc","In your order {order_id} was changed quantity, {orderSlip2}. Have a nice day, {shop_name}.");
define("v_smsprestashop_sqltemplate5_oc","Payment confirmation, order id: {order_id}, payment: {order_payment},  amount: {order_total_paid} {order_currency}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate25_oc","We have successfully received payment for your order {order_id} via {order_payment},  amount: {order_total_paid} {order_currency}. Have a nice day, {shop_name}.");
define("v_smsprestashop_sqltemplate62_oc","Order {order_id} was updated, tracking number is {order_shipping_number}. Info from {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_oc","Dear Customer, your order {order_id} was shipped, tracking number is {order_shipping_number}. Have a nice day, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_oc","This product was deleted from {shop_name}, id: {product_id}, ref: {product_ref}, name: {product_name}.  Deleted by user {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_oc","Quantity of product has changed, id: {product_id}, ref: {product_ref}, name: {product_name}, current  quantity: {product_quantity}, supplier: {product_supplier}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate9_oc","This product is out of stock, id: {product_id}, ref: {product_ref}, name: {product_name}, current  quantity: {product_quantity}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate10_oc","In order {order_id} was canceled product with id: {product_id}, ref: {product_ref}, name: {product_name}. Quantity: {product_quantity}, quantity reinjected: {product_quantity_reinjected}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate11_oc","Status of order {order_id} has changed to ");
define("v_smsprestashop_sqltemplate111_oc",". Info from {shop_name}.");
define("v_smsprestashop_sqltemplate211_oc","Dear Customer, status of your order {order_id} has changed to ");
define("v_smsprestashop_sqltemplate2111_oc",". Have a nice day, {shop_name}.");







// OsCommerce
define("v_about_version_os","smsCommerce module version ");
define("v_about_supported_text_os","Supported OsCommerce versions:");
define("v_about_supported_version_os","2.3.x");
define("v_about_manual_url_os","www.sms-commerce.net/manual.html");
define("v_about_website_name_os","www.sms-commerce.net");
define("v_about_website_url_os","www.sms-commerce.net/index.html");

define("v_smsprestashop_sqltemplate1_os","New order from {customer_firstname} {customer_lastname}, customer id: {customer_id}, order id: {order_id}, payment: {order_payment}, amount: {order_total_paid} {order_currency}. Order: {order_products2}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate21_os","Your order {order_id} was successfully created, payment: {order_payment}, amount: {order_total_paid} {order_currency}. Have a nice day, {shop_name}.");
define("v_smsprestashop_sqltemplate2_os","Customer  {customer_firstname} {customer_lastname}, id: {customer_id}, has just subscribed to {shop_name}.");
define("v_smsprestashop_sqltemplate22_os","Dear {customer_firstname} {customer_lastname}, your account in {shop_name} was successfully created. Your username: {customer_email}. Have a nice day!");
define("v_smsprestashop_sqltemplate3_os","Customer {customer_firstname} {customer_lastname}, id: {customer_id}, has returned product from order {order_id}. Order: {orderReturn2}. Customer text: {customer_question}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate23_os","We have received your request. Order {order_id}. Have a nice day, {shop_name}.");
define("v_smsprestashop_sqltemplate4_os","In order {order_id} was changed quantity, {orderSlip2}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate24_os","In your order {order_id} was changed quantity, {orderSlip2}. Have a nice day, {shop_name}.");
define("v_smsprestashop_sqltemplate5_os","Payment confirmation, order id: {order_id}, payment: {order_payment},  amount: {order_total_paid} {order_currency}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate25_os","We have successfully received payment for your order {order_id} via {order_payment},  amount: {order_total_paid} {order_currency}. Have a nice day, {shop_name}.");
define("v_smsprestashop_sqltemplate62_os","Order {order_id} was updated, tracking number is {order_shipping_number}. Info from {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_os","Dear Customer, your order {order_id} was shipped, tracking number is {order_shipping_number}. Have a nice day, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_os","This product was deleted from {shop_name}, id: {product_id}, ref: {product_ref}, name: {product_name}.  Deleted by user {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_os","Quantity of product has changed, id: {product_id}, ref: {product_ref}, name: {product_name}, current  quantity: {product_quantity}, supplier: {product_supplier}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate9_os","This product is almost out of stock, id: {product_id}, ref: {product_ref}, name: {product_name}, current  quantity: {product_quantity}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate10_os","In order {order_id} was canceled product with id: {product_id}, ref: {product_ref}, name: {product_name}. Quantity: {product_quantity}, quantity reinjected: {product_quantity_reinjected}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate11_os","Status of order {order_id} has changed to ");
define("v_smsprestashop_sqltemplate111_os",". Info from {shop_name}.");
define("v_smsprestashop_sqltemplate211_os","Dear Customer, status of your order {order_id} has changed to ");
define("v_smsprestashop_sqltemplate2111_os",". Have a nice day, {shop_name}.");







// Virtuemart
define("v_about_version_vm","Virtue SMS module version ");
define("v_about_supported_text_vm","Supported Virtuemart versions:");
define("v_about_supported_version_vm","1.5.x");
define("v_about_manual_url_vm","www.virtue-sms.net/manual.html");
define("v_about_website_name_vm","www.virtue-sms.net");
define("v_about_website_url_vm","www.virtue-sms.net/index.html");

define("v_smsprestashop_sqltemplate1_vm","New order from {customer_firstname} {customer_lastname}, customer id: {customer_id}, order id: {order_id}, payment: {order_payment}, amount: {order_total_paid} {order_currency}. Order: {order_products2}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate21_vm","Your order {order_id} was successfully created, payment: {order_payment}, amount: {order_total_paid} {order_currency}. Have a nice day, {shop_name}.");
define("v_smsprestashop_sqltemplate2_vm","Customer  {customer_firstname} {customer_lastname}, id: {customer_id}, has just subscribed to {shop_name}.");
define("v_smsprestashop_sqltemplate22_vm","Dear {customer_firstname} {customer_lastname}, your account in {shop_name} was successfully created. Your username: {customer_email}. Have a nice day!");
define("v_smsprestashop_sqltemplate3_vm","Customer {customer_firstname} {customer_lastname}, id: {customer_id}, has returned product from order {order_id}. Order: {orderReturn2}. Customer text: {customer_question}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate23_vm","We have received your request. Order {order_id}. Have a nice day, {shop_name}.");
define("v_smsprestashop_sqltemplate4_vm","In order {order_id} was changed quantity, {orderSlip2}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate24_vm","In your order {order_id} was changed quantity, {orderSlip2}. Have a nice day, {shop_name}.");
define("v_smsprestashop_sqltemplate5_vm","Payment confirmation, order id: {order_id}, payment: {order_payment},  amount: {order_total_paid} {order_currency}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate25_vm","We have successfully received payment for your order {order_id} via {order_payment},  amount: {order_total_paid} {order_currency}. Have a nice day, {shop_name}.");
define("v_smsprestashop_sqltemplate62_vm","Order {order_id} was updated, tracking number is {order_shipping_number}. Info from {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_vm","Dear Customer, your order {order_id} was shipped, tracking number is {order_shipping_number}. Have a nice day, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_vm","This product was deleted from {shop_name}, id: {product_id}, ref: {product_ref}, name: {product_name}.  Deleted by user {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_vm","Quantity of product has changed, id: {product_id}, ref: {product_ref}, name: {product_name}, current  quantity: {product_quantity}, supplier: {product_supplier}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate9_vm","This product is almost out of stock, id: {product_id}, ref: {product_ref}, name: {product_name}, current  quantity: {product_quantity}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate10_vm","In order {order_id} was canceled product with id: {product_id}, ref: {product_ref}, name: {product_name}. Quantity: {product_quantity}, quantity reinjected: {product_quantity_reinjected}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate11_vm","Status of order {order_id} has changed to ");
define("v_smsprestashop_sqltemplate111_vm",". Info from {shop_name}.");
define("v_smsprestashop_sqltemplate211_vm","Dear Customer, status of your order {order_id} has changed to ");
define("v_smsprestashop_sqltemplate2111_vm",". Have a nice day, {shop_name}.");











// Magento
define("v_about_version_ms","Mage SMS module version ");
define("v_about_supported_text_ms","Supported Magento versions:");
define("v_about_supported_version_ms","1.6.x - 1.7.x");
define("v_about_manual_url_ms","www.mage-sms.com/manual.html");
define("v_about_website_name_ms","www.mage-sms.com");
define("v_about_website_url_ms","www.mage-sms.com/index.html");

define("v_smsprestashop_sqltemplate1_ms","New order from {customer_firstname} {customer_lastname}, customer id: {customer_id}, order id: {order_id}, payment: {order_payment}, amount: {order_total_paid} {order_currency}. Order: {order_products2}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate21_ms","Your order {order_id} was successfully created, payment: {order_payment}, amount: {order_total_paid} {order_currency}. Have a nice day, {shop_name}.");
define("v_smsprestashop_sqltemplate2_ms","Customer  {customer_firstname} {customer_lastname}, id: {customer_id}, has just subscribed to {shop_name}.");
define("v_smsprestashop_sqltemplate22_ms","Dear {customer_firstname} {customer_lastname}, your account in {shop_name} was successfully created. Your username: {customer_email}. Have a nice day!");
define("v_smsprestashop_sqltemplate3_ms","Customer {customer_firstname} {customer_lastname}, id: {customer_id}, has returned product from order {order_id}. Order: {orderReturn2}. Customer text: {customer_question}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate23_ms","We have received your request. Order {order_id}. Have a nice day, {shop_name}.");
define("v_smsprestashop_sqltemplate4_ms","In order {order_id} was changed quantity, {orderSlip2}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate24_ms","In your order {order_id} was changed quantity, {orderSlip2}. Have a nice day, {shop_name}.");
define("v_smsprestashop_sqltemplate5_ms","Payment confirmation, order id: {order_id}, payment: {order_payment},  amount: {order_total_paid} {order_currency}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate25_ms","We have successfully received payment for your order {order_id} via {order_payment},  amount: {order_total_paid} {order_currency}. Have a nice day, {shop_name}.");
define("v_smsprestashop_sqltemplate62_ms","Order {order_id} was updated, tracking number is {order_shipping_number}. Info from {shop_name}."); //new
define("v_smsprestashop_sqltemplate262_ms","Dear Customer, your order {order_id} was shipped, tracking number is {order_shipping_number}. Have a nice day, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_ms","This product was deleted from {shop_name}, id: {product_id}, ref: {product_ref}, name: {product_name}.  Deleted by user {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_ms","Quantity of product has changed, id: {product_id}, ref: {product_ref}, name: {product_name}, current  quantity: {product_quantity}, supplier: {product_supplier}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate9_ms","This product is almost out of stock, id: {product_id}, ref: {product_ref}, name: {product_name}, current  quantity: {product_quantity}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate10_ms","In order {order_id} was canceled product with id: {product_id}, ref: {product_ref}, name: {product_name}. Quantity: {product_quantity}, quantity reinjected: {product_quantity_reinjected}. Info from {shop_name}.");
define("v_smsprestashop_sqltemplate11_ms","Status of order {order_id} has changed to ");
define("v_smsprestashop_sqltemplate111_ms",". Info from {shop_name}.");
define("v_smsprestashop_sqltemplate211_ms","Dear Customer, status of your order {order_id} has changed to ");
define("v_smsprestashop_sqltemplate2111_ms",". Have a nice day, {shop_name}.");











?>