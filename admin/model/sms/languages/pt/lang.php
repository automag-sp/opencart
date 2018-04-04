<?php



define("lang_iso_code","pt");
define("smscurrency","EUR");


define("lang_alphabet","A;Á;Ã;B;C;Ç;D;E;É;F;G;H;I;Í;J;L;M;N;O;Ó;Õ;Ô;P;Q;R;S;T;U;Ú;Ü;V;X;Z");





//new
define("v_all_years","Todos os anos");
define("v_menu_setting", "Ajuste");

// About
define("v_about_about","Sobre o módulo");
define("v_about_version","Módulo Presta SMS, a versão");
define("v_about_copyright","Copyright © TOPefekt s.r.o., Todos os direitos reservados");
define("v_about_developer","Desenvolvedor:");
define("v_about_topefekt","TOPefekt s.r.o.");
define("v_about_address","Endereço");
define("v_about_street","B. Nemcové 767/13");
define("v_about_city","78701 Sumperk");
define("v_about_state","a República Checa");
define("v_about_vat","NIF: CZ29444268");
define("v_about_phone","Telefone");
define("v_about_phonenr","+420 581 110 998");
define("v_about_mail","Email:");
define("v_about_mailsales","sales@topefekt.com");
define("v_about_mailsupport","support@topefekt.com");
define("v_about_web","Web:");
define("v_about_website_name","www.presta-sms.com");
define("v_about_website_url","www.presta-sms.com/pt/index.html");



// AdminSms.php
define("v_adminsms_adminsms","Admin SMS");
define("v_adminsms_description","Selecione eventos dos quais os administradores de negócios serão avisados por SMS e defina o texto dessas mensagens.");
define("v_adminsms_unicodesms","Unicode SMS");
define("v_adminsms_unicode","unicode");
define("v_adminsms_unicodetext","Assinale apenas se você deseje usar na mensagem acentos ou idiomas como chinês, árabe, grego, hebraico, coreano, etc. (Unicode permite que você use simultaneamente diferentes fontes e símbolos. Número de caracteres em uma mensagem Unicode é 70).");
define("v_adminsms_unicodesave","Guardar");
define("v_adminsms_smsactive","Envio de notificações de SMS é ATIVO.");
define("v_adminsms_smsnotactive","O envio de notificações de SMS NÃO é ATIVO. Envio de SMS activa se assinala pelo menos um administrador.");
define("v_adminsms_statusupdate","Atualização de estado da encomenda");
define("v_adminsms_account","Conta");
define("v_adminsms_product","Produto");
define("v_adminsms_orderstatus","Estado da encomenda");
define("v_adminsms_order","Encomenda");
define("v_adminsms_adminsmsnotactive","SMS Admin - inativo");
define("v_adminsms_addadmin","Por favor, adicione pelo menos um administrador!");
define("v_adminsms_usernotactive","O perfil do usuário não está ativo! Registe-se clicando na guia SMS no menu principal. Módulo vai mostrar-lhe o formulário de registo. Se você usou este módulo no passado e você sabe o seu nome de usuário e senha, preencha o formulário para uma conta existente. Caso contrário, digite o email, aceite o contrato de licença e clique em \"Registrar\".");
define("v_adminsms_invalidtext","Texto da mensagem SMS inválido");
define("v_adminsms_smssaved","O texto da mensagem foi guardado.");
define("v_adminsms_unicodesaved","Unicode guardado.");
define("v_adminsms_jschar","Caráter");
define("v_adminsms_jschars","Carateres");
define("v_adminsms_jslabel","Etiqueta");
define("v_adminsms_jssmstext","Texto de mensagem SMS");
define("v_adminsms_jstotalsms","SMS ao total");
define("v_adminsms_smstext","Digite o texto de SMS");
define("v_adminsms_preview","Visualização");
define("v_adminsms_admins","Administradores");
define("v_adminsms_save","Guardar");
define("v_adminsms_cancel","Cancelar");
define("v_adminsms_restoreunsaved","Retorna alterações não guardadas ao estado original."); //new


// AdminSmsProfile.php
define("v_adminsmsprofile_profilenotactive","Perfil de usuário - inativo");
define("v_adminsmsprofile_profileactive","Perfil de usuário - ativo");
define("v_adminsmsprofile_newaccount","Nova conta de usuário");
define("v_adminsmsprofile_notregistered","Não se registou? Crie uma conta agora!");
define("v_adminsmsprofile_email","Email:");
define("v_adminsmsprofile_company","Nome da firma:");
define("v_adminsmsprofile_street","Rua:");
define("v_adminsmsprofile_city","Cidade:");
define("v_adminsmsprofile_zip","CEP:");
define("v_adminsmsprofile_country","País");
define("v_adminsmsprofile_id","BI:");
define("v_adminsmsprofile_vat","NIF:");
define("v_adminsmsprofile_refererid","Referer ID:"); // ?
define("v_adminsmsprofile_licence","Veja os termos de licença:");
define("v_adminsmsprofile_agree","Concordo");
define("v_adminsmsprofile_notagree","Discordo");
define("v_adminsmsprofile_register","Registar");
define("v_adminsmsprofile_required","Preenchimento obrigatório");
define("v_adminsmsprofile_sign","Logar"); // Sign in
define("v_adminsmsprofile_signtext","Se você já tem uma conta, faça o login");
define("v_adminsmsprofile_username","Usuário:");
define("v_adminsmsprofile_password","Senha:");
define("v_adminsmsprofile_login","Logar"); // Log in
define("v_adminsmsprofile_editaccount","Alterar a conta de usuário");
define("v_adminsmsprofile_save","Guardar");
define("v_adminsmsprofile_accountinfo","Informações sobre a conta de usuário");
define("v_adminsmsprofile_credit","Crédito SMS:");
define("v_adminsmsprofile_addadmin","Adicionar um administrador");
define("v_adminsmsprofile_name","Nome:");
define("v_adminsmsprofile_mobilenr","Telemóvel:");
define("v_adminsmsprofile_edit","Modificar");
define("v_adminsmsprofile_add","Adicionar");
define("v_adminsmsprofile_settings","Outros ajustes:");
define("v_adminsmsprofile_simulate","Simular o envio de SMS:");
define("v_adminsmsprofile_simulatehint","Permite testar o envio de SMS e ver a mensagem SMS testada no guia História de SMS.");
define("v_adminsmsprofile_deletedb","Apagar o banco de dados:");
define("v_adminsmsprofile_deletedbhint","Permite que você decida se quer manter as configurações e o banco de dados de SMS enviadas no caso da desinstalação do módulo SMS-Prestashop.");
define("v_adminsmsprofile_report","Informações de entrega (DR):");
define("v_adminsmsprofile_reporthint","Apresenta as informações sobre a entrega no guia de História de SMS.");
define("v_adminsmsprofile_lowcredit","Aviso de baixo nível de crédito:");
define("v_adminsmsprofile_lowcredithint","Permite receber um email quando o seu nível de crédito SMS é baixo.");
define("v_adminsmsprofile_dremail","Email para a receção dos relatórios de entrega: ");
define("v_adminsmsprofile_dremailhint","Permite que você receba um email sobre a entrega de SMS.");
define("v_adminsmsprofile_admincreated","O administrador foi criado.");
define("v_adminsmsprofile_agreetext","Você deve aceitar os termos da licença.");
define("v_adminsmsprofile_accountcreated","O registo foi bem sucedido. Para a sua caixa de correio enviamos um e-mail para confirmar o seu endereço de e-mail e obter 5 créditos grátis.");
define("v_adminsmsprofile_addaccounttext","Você pode adicionar outra conta em ");
define("v_adminsmsprofile_minutes"," minutos");
define("v_adminsmsprofile_cantconnect","não se pode conectar ao servidor de SMS");
define("v_adminsmsprofile_loginok","Você foi logado com sucesso.");
define("v_adminsmsprofile_error","erro");
define("v_adminsmsprofile_loginerror","erro de login");
define("v_adminsmsprofile_invalidemail","Email para as mensagens de entrega inválido.");
define("v_adminsmsprofile_invalidemail2","Email inválido");
define("v_adminsmsprofile_accountchanged","A conta foi alterada.");
define("v_adminsmsprofile_accountchanged2","A conta foi alterada, mas a URL de Módulo para as mensagens de entrega não responde."); // ?
define("v_adminsmsprofile_changeaccounttext","Será possível alterar a conta em ");
define("v_adminsmsprofile_seeconds","segundos");
define("v_adminsmsprofile_invalidname","Nome inválido");
define("v_adminsmsprofile_invalidnumber","Número inválido");
define("v_adminsmsprofile_adminchanged","O administrador foi alterado.");
define("v_adminsmsprofile_admindeleted","O administrador foi apagado.");
define("v_adminsmsprofile_nochanges","Não foram feitas nenhumas alterações");
define("v_adminsmsprofile_confirmdelete","Tem certeza de que deseja apagar"); // Are you sure to delete
define("v_adminsmsprofile_deleteadmin","APAGAR o administrador");
define("v_adminsmsprofile_editadmin","ALTERAR o administrador");
define("v_adminsmsprofile_intformat","no formato internacional, sem zeros ou o sinal “+“, por exemplo, 351931234567");
define("v_adminsmsprofile_uninstall","(para a desinstalação)");
define("v_adminsmsprofile_noalert","(0 = nenhum aviso)");
define("v_adminsmsprofile_filluser","Digite o seu nome de usuário e a senha");


// CustomerSms.php
define("v_customersms_customersms","SMS para os clientes -");
define("v_customersms_notactive","SMS para os clientes - inativas");
define("v_customersms_default","predefinido");
define("v_customersms_langversion","versão de idioma");
define("v_customersms_description","Selecione os eventos do quais o cliente será avisado por SMS e defina o texto dessas mensagens. Para os países diferentes, você também pode criar diferentes mutações da língua de mensagens SMS. Para os países com mutações indefinidas será usada a versão padrão.");
define("v_customersms_addsms","Adicionar uma mutação da língua");
define("v_customersms_country","Selecione um país: ");
define("v_customersms_unicodesms","Unicode SMS");
define("v_customersms_unicodetext","Assinale apenas se você deseja  usar na mensagem acentos ou idiomas como chinês, árabe, grego, hebraico, coreano, etc. (O Unicode permite que você use simultaneamente diferentes fontes e símbolos. O número de caracteres em uma mensagem Unicode é 70).");
define("v_customersms_orderstatus","Estado da encomenda");
define("v_customersms_smsactive","O envio de notificações de sms é ATIVO.");
define("v_customersms_smsnotactive","O envio de notificações de SMS não é ativo. O envio de SMS activa pela selecção de \"Ativo\" no detalhe do estado desejado.");
define("v_customersms_statusupdate"," Atualização do estado da encomenda");
define("v_customersms_account","Conta");
define("v_customersms_usernotactive","«O perfil do usuário não é ativo! Registe-se, clicando na guia SMS no menu principal. Módulo vai mostrar-lhe o formulário de registo. Se você usou este módulo no passado e sabe o seu nome de usuário e a senha, preencha o formulário para uma conta existente. Caso contrário, digite o email, aceite o termo de licença e clique em \"Registar\".");
define("v_customersms_invalidtext","Texto da mensagem inválido");
define("v_customersms_smssaved","O texto da mensagem foi guardado.");
define("v_customersms_smsdeleted","A mutação da língua foi removida."); // ?
define("v_customersms_confirmdelete","Tem certeza de que deseja excluir");
define("v_customersms_langdelete","EXCLUIR a mutação da língua");
define("v_customersms_smstext","O texto da mensagem SMS"); // ?
define("v_customersms_unicode","unicode");
define("v_customersms_versionfor","A mutação da língua para ");
define("v_customersms_wassaved"," foi guardada");
define("v_customersms_preview","Visualização");
define("v_customersms_active","Ativo");
define("v_customersms_save","Guardar");
define("v_customersms_cancel","Cancelar");
define("v_customersms_jstotalsms","SMS ao total:");
define("v_customersms_editlang","MODIFICAR a mutação da língua");
define("v_customersms_edit","Modificar");
define("v_customersms_add","Adicionar");
define("v_customersms_order","Encomenda");
define("v_customersms_jschars","Caracteres");
define("v_customersms_unicodesaved","Unicode foi guardado.");
define("v_customersms_restoreunsaved","Retorna as alterações não guardadas ao estado original"); //new

//PayPal.php
define("v_paypal_credit","Comprar crédito");
define("v_paypal_creditnotactive","Comprar crédito - inativo");
define("v_paypal_usernotactive","O perfil do usuário não está ativo! Registe-se, clicando na guia SMS no menu principal. Módulo vai mostrar-lhe o formulário de registo. Se você usou este m«odulo no passado e conhece o seu nome de usuário e a senha, preencha o formulário para uma conta existente. Caso contrário, digite o email, aceite termos de licença e clique em \"Registrar\" ");
define("v_paypal_clickhereif","No caso de você não ver a escolha das opções para recarregar o crédito, por favor clique aqui:"); //new



//SendSms.php
define("v_sendsms_bulksms","O texto da mensagem de massa"); // ? Bulk SMS text
define("v_sendsms_addrecipients","Adicione um destinatário ");
define("v_sendsms_addtext","Adicione um ou mais destinatários, separados por vírgulas. O número deve ser em formato internacional, sem zeros ou o sinal “+“, por exemplo, 351931234567");
define("v_sendsms_eg"," (por exemplo: 351931234567)");
define("v_sendsms_entertext","Insera o texto da mensagem SMS");
define("v_sendsms_addcsv","Adicione um destinatário no arquivo CSV ");
define("v_sendsms_csvtext","O arquivo CSV - 1 coluna, 1.ª coluna - número (O número deve ser no formato internacional, sem zeros ou o sinal “+“, por exemplo, 351931234567");
define("v_sendsms_unicode","Unicode");
define("v_sendsms_unicodetext","Assinale apenas se você deseja usar na mensagem acentos ou idiomas como chinês, árabe, grego, hebraico, coreano, etc. (Unicode permite que você use simultaneamente diferentes fontes e símbolos. Número de caracteres em uma mensagem Unicode é 70).");
define("v_sendsms_time","A sua hora:");
define("v_sendsms_time2","Hora:");
define("v_sendsms_timezone","Fuso horário:");
define("v_sendsms_timezone2","Configuração do fuso horário");
define("v_sendsms_longtext","O texto é muito longo");
define("v_sendsms_sendsms","Enviar SMS");
define("v_sendsms_send","Enviar");
define("v_sendsms_sendtext","O envio de SMS de massa ou SMS. Insera os números de telefone ou faça upload de um arquivo CSV."); // ?
define("v_sendsms_smsnotactive","Enviar SMS - inativo");
define("v_sendsms_usernotactive","O perfil do usuário não é ativo! Registe-se, clicando na guia SMS no menu principal. Módulo vai mostrar-lhe o formulário de registo. Se você usou este módulo no passado e conhece o seu nome de usuário e a senha, preencha o formulário para uma conta existente. Caso contrário, digite o email, aceite os termos de licença e clique em \"Registar\".");
define("v_sendsms_fillsms","Preencha o texto de mensagem SMS");
define("v_sendsms_smslong","O texto de SMS é muito longo (máx. 612 caracteres).");
define("v_sendsms_unicodesmslong","O texto de SMS é muito longo (máx. 268 caracteres).");
define("v_sendsms_wrongtime","Mau tempo para enviar  SMS."); // ? Wrong time of SMS sending
define("v_sendsms_norecipients","Destinatários encontrados: 0");
define("v_sendsms_lowcreditall","Você não tem crédito suficiente para enviar mensagens SMS para todos os ");
define("v_sendsms_recipients"," destinatários");
define("v_sendsms_smssent","A mensagem SMS foi enviada.");
define("v_sendsms_smssaved","A mensagem SMS foi guardada.");
define("v_sendsms_wrongnumber","Número errado ou indisponível");
define("v_sendsms_unauthorized","A identificação do remetente não-autorizado na SMS de confirmação"); // ? unauthorized senderID in confirmation sms
define("v_sendsms_lowcredit","Baixo nível de crédito para o envio de mensagem SMS");
define("v_sendsms_nounicode","Unicode não é suportado");
define("v_sendsms_loginerror","erro de login");
define("v_sendsms_cantconnect","Não se pode  conectar ao servidor de SMS");
define("v_sendsms_simulation","SIMULAÇÃO DE SMS (O envio de SMS foi simulado. O destinatário não vai receber a mensagem SMS.)");
define("v_sendsms_simulationconfirm","SMS foi enviada (simulação).");
define("v_sendsms_error","erro");
define("v_sendsms_sendlater"," Enviar mais tarde ");
define("v_sendsms_jschars","Caracteres: ");
define("v_sendsms_hr","1 hora: ");
define("v_sendsms_date","Data: ");

// SmsAnswers.php
define("v_smsanswers_smsanswers","Respostas de SMS");
define("v_smsanswers_description","As respostas de SMS do cliente é exibida apenas quando um cliente da sua loja receberá uma SMS com o tipo de remetente \"número de sistema\" e o cliente responde do mesmo número de telefone.");
define("v_smsanswers_show","Mostrar");
define("v_smsanswers_results","Resultado da pesquisa "); // Search results
define("v_smsanswers_of"," de ");
define("v_smsanswers_smscenter","centro de SMS");
define("v_smsanswers_date","Data");
define("v_smsanswers_number","De número");
define("v_smsanswers_new","novo");
define("v_smsanswers_previous","Anterior");
define("v_smsanswers_next","Seguinte");
define("v_smsanswers_page"," Página: ");
define("v_smsanswers_smsnotactive","Respostas SMS - inativas");
define("v_smsanswers_usernotactive","O perfil do usuário não é ativo! Registe-se, clicando na guia SMS no menu principal. Módulo vai mostrar-lhe o formulário de registo. Se você usou este módulo no passado e conhece o seu nome de usuário e a senha, preencha o formulário para uma conta existente. Caso contrário, digite o email, aceite os termos de licença e clique em \"Registar\".");
define("v_smsanswers_year","ano");
define("v_smsanswers_month","mês");
define("v_smsanswers_sms","SMS");
define("v_smsanswers_text","Texto:");
define("v_smsanswers_nosms","Ao total de  respostas SMS: 0");

// SmsHistory.php
define("v_smshistory_sent","ENVIADO ao destinatário");
define("v_smshistory_error","ERRO");
define("v_smshistory_delivered","ENTREGUE ao destinatário");
define("v_smshistory_buffered","DESTINATÁRIO INDISPONÍVEL"); // new
define("v_smshistory_smshistory","História de SMS");
define("v_smshistory_description","História de mensagens SMS enviadas do SMS módulo.");
//define("v_smshistory_status","status");
define("v_smshistory_adminsms"," admin SMS");
define("v_smshistory_customersms"," SMS para os clientes");
define("v_smshistory_marketingsms"," SMS de marketing"); // marketingové sms ?
define("v_smshistory_simplesms"," SMS simples"); // sms ?
define("v_smshistory_show","Mostrar");
define("v_smshistory_results","Resultado de pesquisa");
define("v_smshistory_of"," de ");
define("v_smshistory_type","Tipo");
define("v_smshistory_date","Data");
define("v_smshistory_subject","objeto de SMS");
define("v_smshistory_nubmer","Número");
define("v_smshistory_yes","sim");
define("v_smshistory_no","não");
define("v_smshistory_sysnumber","número de sistema");
define("v_smshistory_balance","Estado de conta:"); // Credit balance
define("v_smshistory_customerdetail","Mostrar detalhe do cliente");
define("v_smshistory_smstext","Texto: ");
define("v_smshistory_totalsms","SMS ao total: ");
define("v_smshistory_smsnotactive","História de SMS - inativa");
define("v_smshistory_usernotactive","O perfil do usuário não é ativo! Registe-se, clicando na guia SMS no menu principal. Módulo vai mostrar-lhe o formulário de registo. Se você usou este módulo no passado e conhece o seu nome de usuário e a senha, preencha o formulário para uma conta existente. Caso contrário, digite o email, aceite os termos de licença e clique em \"Registar\".");
define("v_smshistory_price","Preço em créditos:");
define("v_smshistory_year","ano");
define("v_smshistory_month","mês");
define("v_smshistory_status","Estado");
define("v_smshistory_recipient","Destinatário");
define("v_smshistory_unicode","Unicode:");
define("v_smshistory_senderid","Número do remetente:"); // senderID
define("v_smshistory_previous","Anterior");
define("v_smshistory_next","Seguinte");
define("v_smshistory_page"," Página: ");
define("v_smshistory_nosms","SMS ao total: 0");
define("v_smshistory_sms","SMS");

// SmsMarketing.php
define("v_smsmarketing_smsbulk","SMS de Marketing - o texto de mensagem de massa");
define("v_smsmarketing_entertext","Insera o texto da mensagem SMS");
define("v_smsmarketing_unicode"," Unicode ");
define("v_smsmarketing_unicodetext","Assinale apenas se você deseje usar na mensagem acentos ou idiomas como chinês, árabe, grego, hebraico, coreano, etc. (Unicode permite que você use simultaneamente diferentes fontes e símbolos. Número de caracteres em uma mensagem Unicode é 70)");
define("v_smsmarketing_sendlater"," Enviar mais tarde ");
define("v_smsmarketing_yourtime","A sua hora: ");
define("v_smsmarketing_jstotalcustomers","Clientes ao total: ");
define("v_smsmarketing_jstotalsms","SMS ao total: ");
define("v_smsmarketing_bulkfilter","SMS de Marketing - filtro de SMS de massa");
define("v_smsmarketing_allcustomers","Todos os clientes");
define("v_smsmarketing_companycustomers","Clientes de firma");
define("v_smsmarketing_privatecustomers","Pessoas particulares");
define("v_smsmarketing_allcountries","Todos os países");
define("v_smsmarketing_lastname","Sobrenome:");
define("v_smsmarketing_firstname","Nome:");
define("v_smsmarketing_lastname2","Sobrenome");
define("v_smsmarketing_firstname2","Nome");
define("v_smsmarketing_groups","Grupos: ");
define("v_smsmarketing_all","Todos");
define("v_smsmarketing_gender","Sexo:");
define("v_smsmarketing_male","Homem");
define("v_smsmarketing_female","Mulher");
define("v_smsmarketing_news","Novidades"); // ? Newsletter
define("v_smsmarketing_yes","Sim");
define("v_smsmarketing_no","Não");
define("v_smsmarketing_applyfilter","Usar o filtro");
define("v_smsmarketing_birthfrom","Data de nascimento de:");
define("v_smsmarketing_birthto","a:");
define("v_smsmarketing_registerfrom","Data de registo de: ");
define("v_smsmarketing_customersfound","Clientes encontrados: ");
define("v_smsmarketing_results","mostrado");
define("v_smsmarketing_action","Ação");
define("v_smsmarketing_mobilenr","Número de telefone"); // ? Mobile number
define("v_smsmarketing_customerid","Número de cliente");
define("v_smsmarketing_removecustomer","REMOVER cliente da lista");
define("v_smsmarketing_next","Seguinte");
define("v_smsmarketing_previous","Anterior");
define("v_smsmarketing_page"," Página: ");
define("v_smsmarketing_smsmarketingfound","SMS de Marketing - os clientes encontrados: ");
define("v_smsmarketing_description","Escreva o texto da mensagem e use filtros avançados para direcionar a suas campanhas de marketing.");
define("v_smsmarketing_smsmarketing","SMS de Marketing");
define("v_smsmarketing_smsnotactive","SMS de Marketing - inativo");
define("v_smsmarketing_usernotactive","O perfil do usuário não é ativo! Registe-se, clicando na guia SMS no menu principal. Módulo vai mostrar-lhe o formulário de registo. Se você usou este módulo no passado e conhece o seu nome de usuário e a senha, preencha o formulário para uma conta existente. Caso contrário, digite o email, aceite os termos de licença e clique em \"Registar\".");
define("v_smsmarketing_fillsms","Preencha o texto de mensagem SMS.");
define("v_smsmarketing_smslong","O texto de SMS é muito longo (máx. 612 caracteres)");
define("v_smsmarketing_unicodesmslong","O texto de SMS é muito longo (máx. 268 caracteres)");
define("v_smsmarketing_nocustomers","Clientes encontrados: 0");
define("v_smsmarketing_wrongtime","Mau tempo para enviar SMS.");
define("v_smsmarketing_lowcreditall","Você não tem crédito suficiente para enviar mensagens SMS para todos os ");
define("v_smsmarketing_customers"," clientes.");
define("v_smsmarketing_smssent","A mensagem SMS foi enviada.");
define("v_smsmarketing_smssaved","A mensagem SMS foi guardada.");
define("v_smsmarketing_wrongnr","Número errado ou indisponível");
define("v_smsmarketing_unauthorized","A identificação do remetente não-autorizado na SMS de confirmação"); // ? unauthorized senderID in confirmation sms
define("v_smsmarketing_lowcredit","Baixo nível de crédito para o envio de mensagem SMS");
define("v_smsmarketing_nounicode","Unicode não é suportado");
define("v_smsmarketing_cantconnect","Não se pode  conectar ao servidor de SMS");
define("v_smsmarketing_simulation","SIMULAÇÃO DE SMS (O envio de SMS foi simulado. O destinatário não vai receber a mensagem SMS.)");
define("v_smsmarketing_simulationconfirm","SMS foi enviada (simulação).");
define("v_smsmarketing_error","erro");
define("v_smsmarketing_loginerror","erro de login");
define("v_smsmarketing_date","Data:");
define("v_smsmarketing_time","Hora: ");
define("v_smsmarketing_hr","1 hora");
define("v_smsmarketing_timezone","fuso horário: ");
define("v_smsmarketing_timezone2","Configuração do fuso horário");
define("v_smsmarketing_send","Enviar");
define("v_smsmarketing_jschars"," Caracteres: ");
define("v_smsmarketing_longtext","O texto é muito longo");
define("v_smsmarketing_typ","Tipo:");
define("v_smsmarketing_country","País:");
define("v_smsmarketing_city","Cidade:");
define("v_smsmarketing_advert","Publicidade:"); // ? Advert
define("v_smsmarketing_store","Loja:"); //new
define("v_smsmarketing_allstores","Todas as lojas"); //new


// smsprestashop.php
define("v_smsprestashop_prestashop","Presta SMS");
define("v_smsprestashop_description","presta-sms.com - envie mensagens SMS a partir do seu Prestashop!");
define("v_smsprestashop_admin","Admin SMS"); // ?
define("v_smsprestashop_customer","SMS para os clientes");
define("v_smsprestashop_settings","Ajuste de SMS"); // ? SMS Settings
define("v_smsprestashop_history","História de SMS");
define("v_smsprestashop_credit","Comprar crédito");
define("v_smsprestashop_marketing","SMS de Marketing");
define("v_smsprestashop_answers","Respostas por SMS "); // ? SMS Answers
define("v_smsprestashop_send","Enviar SMS");
define("v_smsprestashop_about","Sobre o módulo");
define("v_smsprestashop_wrongnr","Número errado ou indisponível");
define("v_smsprestashop_unauthorized","A identificação do remetente não-autorizado na SMS de confirmação");
define("v_smsprestashop_lowcredit","Baixo nível de crédito para o envio de mensagem SMS");
define("v_smsprestashop_nounicode","Unicode não é suportado");
define("v_smsprestashop_loginerror","erro de login");
define("v_smsprestashop_cantconnect","Baixo nível de crédito para o envio de mensagem SMS");
define("v_smsprestashop_simulation","SIMULAÇÃO DE SMS (O envio de SMS foi simulado. O destinatário não vai receber a mensagem SMS.)");
define("v_smsprestashop_nrunknown","número desconhecido");
define("v_smsprestashop_notconnected","Não conectado ao servidor de SMS");
define("v_smsprestashop_sqlinfo1","Novas encomendas");
define("v_smsprestashop_sqltemplate1","Nova encomenda de {customer_firstname}  (customer_lastname}, cliente: {customer_id}, encomenda: {order_id},  Pagamento:  {order_payment}, soma: {order_total_paid} {order_currency} . Encomenda: {order_products2}.  Informações de  {shop_name}.");
define("v_smsprestashop_sqltemplate21","A sua encomenda {order_id} foi criada com sucesso, o pagamento: {order_payment} , soma:  {order_total_paid} {order_currency}.   Bom dia, {shop_name}..");
define("v_smsprestashop_notice","Parâmetros aplicáveis​​:"); // ? Possible variables
define("v_smsprestashop_sqlinfo2","Sucesso da criação da conta de cliente"); // ? Successful customer create account
define("v_smsprestashop_sqltemplate2","Cliente  {customer_firstname} {customer_lastname}, id: {customer_id}, acaba de registar-se em {shop_name}.");
define("v_smsprestashop_sqltemplate22","Caro/a {customer_firstname} {customer_lastname}, a sua conta em {shop_name} foi criada com sucesso. Nome de usuário: {customer_email}. Bom dia!");
define("v_smsprestashop_sqlinfo3","Os produtos devolvidos");
define("v_smsprestashop_sqltemplate3","O cliente {customer_firstname} {customer_lastname}, id: {customer_id}, devolveu o artigo de encomenda. {order_id}. Encomenda: {orderReturn2}. Mensagem do cliente: {customer_question}. Informações de {shop_name}."); // ???
define("v_smsprestashop_sqltemplate23","Recebemos o seu pedido. Encomenda {order_id}. Bom dia, {shop_name}.");
define("v_smsprestashop_sqlinfo4","Notificação no caso em que altera a quantidade de alguns destes produtos."); // ? Called when a quantity of one product change in an order
define("v_smsprestashop_sqltemplate4","Na encomenda {order_id} foi modificada a quantidade  {orderSlip2}. Informações de {shop_name}."); // ?
define("v_smsprestashop_sqltemplate24","Na sua encomenda número {order_id} foi modificada a quantidade, {orderSlip2}. Bom dia{shop_name}.");
define("v_smsprestashop_sqlinfo5","Confirmação do pagamento");
define("v_smsprestashop_sqltemplate5","Confirmação do pagamento, encomenda número: {order_id}, pagamento: {order_payment}, soma: {order_total_paid} {order_currency}. Informações de {shop_name}.");
define("v_smsprestashop_sqltemplate25","Temos recebido o pagamento pela sua encomenda {order_id} por meio de {order_payment},  soma: {order_total_paid} {order_currency}. Bom dia, {shop_name}.");
define("v_smsprestashop_sqlinfo62","Atualização da encomenda  - número de remessa atribuído pelo transportador");  //new
define("v_smsprestashop_sqltemplate62","A encomenda n. {order_id} foi atualizada com o número da remessa {order_shipping_number} atribuído pelo transportador. Informações de {shop_name}."); //new         
define("v_smsprestashop_sqltemplate262","Caro cliente, o artigo da sua encomenda n. {order_id} foi enviado, o número da remessa atribuído pelo transportador é {order_shipping_number}. Bom dia, {shop_name}."); //new
define("v_smsprestashop_sqlinfo7","Exclusão de produto do banco de dados"); // ? Called when a product is deleted
define("v_smsprestashop_sqltemplate7","Este produto foi eliminado de {shop_name}, id: {product_id}, ref: {product_ref}, nome: {product_name}.  Eliminado pelo usuário: {employee_id}, {employee_email}.");
define("v_smsprestashop_sqlinfo8","A quantidade é atualizada apenas quando o cliente cria uma encomenda com sucesso"); // ? ...effectively place his order
define("v_smsprestashop_sqltemplate8","A quantidade do produto tem sido alterada, id: {product_id}, ref: {product_ref}, nome: {product_name}, nova quantidade: {product_quantity}, fornecedor: {product_supplier}. Informações de {shop_name}.");
define("v_smsprestashop_sqlinfo9","Este artigo não está em estoque");
define("v_smsprestashop_sqltemplate9","Este artigo está a acabar-se em estoque, id: {product_id}, ref: {product_ref}, nome:  {product_name}, quantidade: {product_quantity}. Informações de {shop_name}.");
define("v_smsprestashop_sqlinfo10","Notificação se o administrador ou o cliente cancela o artigo na encomenda");
define("v_smsprestashop_sqltemplate10","Na encomenda {order_id} foi cancelado o artigo id: {product_id}, ref: {product_ref}, nome: {product_name}, quantidade: {product_quantity}, quantidade cancelada: {product_quantity_reinjected}Informações de {shop_name}."); // ? quantity reinjected
define("v_smsprestashop_sqltemplate11","O estado da encomenda{order_id} modificou a ");
define("v_smsprestashop_sqltemplate111",". Informações de {shop_name}.");
define("v_smsprestashop_sqltemplate211","Caro cliente, o estado da sua encomenda {order_id} modificou a ");
define("v_smsprestashop_sqltemplate2111",". Bom dia, {shop_name}.");
define("v_smsprestashop_bankwire","Transferência bancária");
define("v_smsprestashop_company","Nome de firma");
define("v_smsprestashop_country","País");
define("v_smsprestashop_city","Cidade");
define("v_smsprestashop_qty","quantidade");
define("v_smsprestashop_qtyreinjected","quantidade eliminada");  //bez diakritiky // ? qty reinjected
define("v_smsprestashop_qtyreturned","quantidade devolvida"); //bez diakritiky
define("v_smsprestashop_name","nome"); //bez diakritiky
define("v_smsprestashop_notfound","não encontrado"); //new


// SmsWizard.php
define("v_smswizard_ownsettings","Ajuste de SMS - Escolha o seu próprio número de remetente para ");
define("v_smswizard_ownnrsettings","Ajuste do próprio número de remitente");
define("v_smswizard_ownnrid","Próprio número de remitente");
define("v_smswizard_existingown","Próprio número existente");
define("v_smswizard_newownnrid","Novo próprio número de remitente");
define("v_smswizard_intformat","no formato internacional, sem zeros ou o sinal “+“, por exemplo, 351931234567");
define("v_smswizard_smscode","código SMS:");
define("v_smswizard_confirm","CONFIRMAR");
define("v_smswizard_required","preenchimento obrigatório");
define("v_smswizard_textsettings","Ajuste de SMS - Selecione o remetente do texto para ");
define("v_smswizard_senderidsettings","Ajuste do remetente do texto");
define("v_smswizard_existingsid","Remetente do texto existente");
define("v_smswizard_newsid","Novo remetente do texto:");
define("v_smswizard_maxchars","máx. 11 caracteres");
define("v_smswizard_smssettings","Ajuste de SMS");
define("v_smswizard_description","Defina o tipo de remetente para cada país. (Remetente do texto, próprio número de telemóvel  ou número de sistema). O preço de SMS depende do país do receptor, do tipo de remetente e da quantidade de pagamento. Para os países com o tipo de remetente indefinido vai ser usado o número de sistema.");
define("v_smswizard_customersettings","Ajuste de SMS para os clientes");
define("v_smswizard_addcountry","ADICIONAR/ALTERAR PAÍS ESCOLHIDO");
define("v_smswizard_sendertype","TIPO DE REMETENTE");
define("v_smswizard_network","REDE");
define("v_smswizard_smsprice","PREÇO EM CRÉDITOS");
define("v_smswizard_price","PREÇO DE SMS EM EUR (sem IVA)");
define("v_smswizard_payment","pagamento");
define("v_smswizard_unicode","Unicode ");
define("v_smswizard_unicodetext","Suporte para conjuntos de caracteres Unicode (Unicode permite que você use fontes, símbolos e marcas diferentes simultaneamente. É usado para idiomas como chinês, árabe, grego, hebraico, coreano, etc.)");
define("v_smswizard_textsid","NÚMERO DE TEXTO DO REMETENTE");
define("v_smswizard_textsid2","Número de texto do remetente");
define("v_smswizard_systemnr","NÚMERO DE SISTEMA");
define("v_smswizard_ownnrsid","PRÓPRIO NÚMERO DO REMETENTE");
define("v_smswizard_simhosting","SIM HOSTING");
define("v_smswizard_unicodesupported","UNICODE SUPORTADO");
define("v_smswizard_nounicode","UNICODE NÃO SUPORTADO");
define("v_smswizard_savesettings","GUARDAR O AJUSTE DE SMS");
define("v_smswizard_suredelete","Tem certeza de que deseja excluir");
define("v_smswizard_country","Selecione um país: ");
define("v_smswizard_notactive","Ajuste de SMS - inativo");
define("v_smswizard_usernotactive","O perfil do usuário não é ativo! Registe-se, clicando na guia SMS no menu principal. Módulo vai mostrar-lhe o formulário de registo. Se você usou este módulo no passado e conhece o seu nome de usuário e a senha, preencha o formulário para uma conta existente. Caso contrário, digite o email, aceite os termos de licença e clique em \"Registar\".");
define("v_smswizard_error","erro");
define("v_smswizard_cantconnect","não se pode conectar ao servidor de SMS");
define("v_smswizard_deleted"," foi apagado."); 
define("v_smswizard_choosesender","Selecione o tipo de remetente");
define("v_smswizard_countrysaved"," foi guardado."); 
define("v_smswizard_fillsid","Preencha o seu próprio número de remetente");
define("v_smswizard_mustbenumber","Próprio número de remetente tem que ser número");
define("v_smswizard_confirmcode","confirme correctamente o código de sms"); 
define("v_smswizard_ownsidfor","Próprio número do remetente para");
define("v_smswizard_wassaved"," foi guardado.");
define("v_smswizard_error2","erro - ");
define("v_smswizard_loginerror","erro de login");
define("v_smswizard_retypecode","Agora reescreva o código de sms.");
define("v_smswizard_retypecode2","Agora reescreva o código de sms. A mensagem SMS será enviada nos próximos 60 segundos.");
define("v_smswizard_wrongnrerror","erro - número errado ou indisponível");
define("v_smswizard_unauthorizederror","erro - identificação do remetente não-autorizado na SMS de confirmação");
define("v_smswizard_lowcrediterror","baixo nível de crédito para o envio de SMS de validação");
define("v_smswizard_filltextsid","Preencha o número de texto de remetente");
define("v_smswizard_filltextsid2","Preencha o número de texto de remetente, 3-11 caracteres");
define("v_smswizard_chars","caracteres utilizáveis: ");
define("v_smswizard_nonumber","número de texto do remetente não pode ser número");
define("v_smswizard_textsidfor","Número de texto do remetente para ");
define("v_smswizard_adminsettings","Ajuste de Admin SMS");
define("v_smswizard_validate","VALIDAR"); //new
define("v_smswizard_smsvalidation","validação de SMS"); //new
define("v_smswizard_confirmationcode","Código: "); //new, bez diakritiky, pouzito v sms
define("v_smswizard_updatepricelist","Atualizar o preço"); //new
define("v_smswizard_eg","por exemplo:"); //new
define("v_smswizard_pricelistupdated","A lista de preços foi atualizada com sucesso."); //new
define("v_smswizard_edit","editar"); //new
define("v_smswizard_delete","excluir"); //new



//new
define("v_smsprestashop_smscharging_fieldset","As suas lojas online");
define("v_smsprestashop_smscharging","SMS opt-out");
define("v_smsprestashop_smscharging_h2","SMS opt-out - ajuste de anulação de avisos por SMS no carrinho de compras e o pagamento por mensagens SMS");
define("v_smsprestashop_smscharging_description","Selecione uma loja online para a qual você deseja definir que o cliente tenha a possibilidade de anular os avisos SMS no carrinho de compras, defina o preço de mensagens SMS e o texto que o cliente vai ver no carrinho de compras.");
define("v_adminsmsprofile_prefer","Prefere enviar SMS do número de telefone de:");
define("v_adminsmsprofile_preferinvoice","endereço de cobrança");
define("v_adminsmsprofile_preferdeliver","endereço de entrega");
define("v_smsprestashop_smscharging_price","Preço de mensagens SMS");
define("v_smsprestashop_smscharging_texts","O texto no carrinho de compras");
define("v_smsprestashop_smscharging_active","Ativa a exibição da função SMS opt-out no carrinho de compras");
define("v_smsprestashop_smscharging_optoutactive","SMS opt-out ATIVO");
define("v_smsprestashop_smscharging_optoutnotactive","SMS opt-out INATIVO. Para ativar SMS opt-out verifique „Ativa a exibição de função SMS opt-out no carrinho de compras“");
define("v_smsprestashop_smscharging_saved","A definição de função SMS opt-out foi alterada com sucesso");
define("v_smswizard_pricelistupdated_changed","Câmbio de preço de mensagens SMS nos seguintes países:");
define("v_smsprestashop_newversion","Há uma nova versão:");

define("v_about_manual_text","Manual para o módulo SMS (em inglês):");
define("v_about_manual_url","www.sms-prestashop.com/manual.html");
define("v_about_supported_text","Versões suportadas do PrestaShop:");
define("v_about_supported_text_ps","1.5.x");

define("v_contact_form","Formulário de Contato");

define("v_remove_duplicate","Remover números duplicados");


define("v_registration_type","Tipo de inscrição:");
define("v_registration_type_personal","Pessoal");
define("v_registration_type_business","Empresa");
define("v_registration_address","Endereço");
define("v_registration_billing_information","Informações de faturamento");
define("v_registration_personal_contact","Person contact");



define("v_registration_company_name","Digite o nome da empresa.");
define("v_registration_vat_invalid","IVA inválido");





//stats new
define("v_statistics","Estatística");
define("v_statistics_smsnotactive","Estatística - não ativa");
define("v_statistics_day","dia");
define("v_statistics_datefrom","Data de:");
define("v_statistics_dateto","a:");


// filter
define("v_filter_deleted_customers", "Clientes removido: ");
define("v_filter_more", "Mais...");
define("v_filter_load", "Filtros salvos");
define("v_filter_save", "Salve filtro");
define("v_filter_clear", "Redefiniçao de filtro");
define("v_filter_name", "Nome do filtro");
define("v_filter_date", "Data");
define("v_filter_been_apply", "Filtro foi aplicado.");
define("v_filter_been_saved", "Filtro foi salvo.");
define("v_filter_been_clear", "Filtro foi redefinida.");
define("v_filter_q_clear", "Tem certeza de que deseja redefinir o filtro?");
define("v_filter_q_delete", "Tem certeza de que deseja remover o filtro?");
define("v_filter_not_found", "O filtro nao foi encontrado.");
define("v_send_busy", "Processamento...");

// Template
define("v_template_load", "Templates salvos");
define("v_template_save", "Salve template");
define("v_template_name", "Nome do template");
define("v_template_been_apply", "Template é carregado.");
define("v_template_been_saved", "Template foi salvo.");
define("v_template_q_delete", "Tem certeza de que deseja remover o template?");
define("v_template_not_found", "Template nao encontrada.");
define("v_show_virtual", "Operadores virtuais (MVNO)");

// Marketing
define("v_marketing_coupon", "Selecione um cupom");
define("v_marketing_coupon_create", "Criar um cupom");
define("v_marketing_none", "Selecione");
define("v_smshistory_simulation", "SIMULAÇAO");
define("v_smshistory_deleted", "DELETED");
define("v_smshistory_sheduled", "PROGRAMADO");
define("v_smshistory_duplicate", "DUPLICADO");
define("v_smshistory_dnd", "DO NOT DISTURB registro (DND)");
define("v_sendsms_addcsv_vcard","Adicione um destinatário no arquivo CSV (.csv, .txt) ou vCard (.vcf)");

// Hooks v2
define("v_hook_return", "Devoluçao");
define("v_hook_return_customer", "Confirmaçao da denúncia.");
define("v_hook_return_admin", "Recebido nova reivindicaçao.");
define("v_smsprestashop_return_status_admin","O estado da devoluçao {return_id} modificou a ");
define("v_smsprestashop_return_status_admin2",". Informaçoes de {shop_name}.");
define("v_smsprestashop_return_status_customer","Caro cliente, o estado da sua devoluçao {return_id} modificou a ");
define("v_smsprestashop_return_status_customer2",". Bom dia, {shop_name}.");

// OptOut
define("v_optout_auto_variable", "Adicionar o produto SMS ao carrinho:");
define("v_optout_auto", "automaticamente");
define("v_optout_manual", "manualmente");

// ZenCart
define("v_about_version_zen","Módulo Zen SMS, a versão ");
define("v_about_supported_text_zen","Versões suportadas do ZenCart:");
define("v_about_supported_version_zen","1.3.x. - 1.5.x");
define("v_about_manual_url_zen","www.zen-sms.net/manual.html");
define("v_about_website_name_zen","www.zen-sms.net");
define("v_about_website_url_zen","www.zen-sms.net/pt/index.html");

define("v_smsprestashop_sqltemplate1_zen","Nova encomenda de {customer_firstname}  (customer_lastname}, cliente: {customer_id}, encomenda: {order_id},  Pagamento:  {order_payment}, soma: {order_total_paid} {order_currency} . Encomenda: {order_products2}.  Informações de  {shop_name}.");
define("v_smsprestashop_sqltemplate21_zen","A sua encomenda {order_id} foi criada com sucesso, o pagamento: {order_payment} , soma:  {order_total_paid} {order_currency}.   Bom dia, {shop_name}..");
define("v_smsprestashop_sqltemplate2_zen","Cliente  {customer_firstname} {customer_lastname}, id: {customer_id}, acaba de registar-se em {shop_name}.");
define("v_smsprestashop_sqltemplate22_zen","Caro/a {customer_firstname} {customer_lastname}, a sua conta em {shop_name} foi criada com sucesso. Nome de usuário: {customer_email}. Bom dia!");
define("v_smsprestashop_sqltemplate3_zen","O cliente {customer_firstname} {customer_lastname}, id: {customer_id}, devolveu o artigo de encomenda. {order_id}. Encomenda: {orderReturn2}. Mensagem do cliente: {customer_question}. Informações de {shop_name}."); // ???
define("v_smsprestashop_sqltemplate23_zen","Recebemos o seu pedido. Encomenda {order_id}. Bom dia, {shop_name}.");
define("v_smsprestashop_sqltemplate4_zen","Na encomenda {order_id} foi modificada a quantidade  {orderSlip2}. Informações de {shop_name}."); // ?
define("v_smsprestashop_sqltemplate24_zen","Na sua encomenda número {order_id} foi modificada a quantidade, {orderSlip2}. Bom dia{shop_name}.");
define("v_smsprestashop_sqltemplate5_zen","Confirmação do pagamento, encomenda número: {order_id}, pagamento: {order_payment}, soma: {order_total_paid} {order_currency}. Informações de {shop_name}.");
define("v_smsprestashop_sqltemplate25_zen","Temos recebido o pagamento pela sua encomenda {order_id} por meio de {order_payment},  soma: {order_total_paid} {order_currency}. Bom dia, {shop_name}.");
define("v_smsprestashop_sqltemplate62_zen","A encomenda n. {order_id} foi atualizada com o número da remessa {order_shipping_number} atribuído pelo transportador. Informações de {shop_name}."); //new         
define("v_smsprestashop_sqltemplate262_zen","Caro cliente, o artigo da sua encomenda n. {order_id} foi enviado, o número da remessa atribuído pelo transportador é {order_shipping_number}. Bom dia, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_zen","Este produto foi eliminado de {shop_name}, id: {product_id}, ref: {product_ref}, nome: {product_name}.  Eliminado pelo usuário: {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_zen","A quantidade do produto tem sido alterada, id: {product_id}, ref: {product_ref}, nome: {product_name}, nova quantidade: {product_quantity}, fornecedor: {product_supplier}. Informações de {shop_name}.");
define("v_smsprestashop_sqltemplate9_zen","Este artigo está a acabar-se em estoque, id: {product_id}, ref: {product_ref}, nome:  {product_name}, quantidade: {product_quantity}. Informações de {shop_name}.");
define("v_smsprestashop_sqltemplate10_zen","Na encomenda {order_id} foi cancelado o artigo id: {product_id}, ref: {product_ref}, nome: {product_name}, quantidade: {product_quantity}, quantidade cancelada: {product_quantity_reinjected}Informações de {shop_name}."); // ? quantity reinjected
define("v_smsprestashop_sqltemplate11_zen","O estado da encomenda{order_id} modificou a ");
define("v_smsprestashop_sqltemplate111_zen",". Informações de {shop_name}.");
define("v_smsprestashop_sqltemplate211_zen","Caro cliente, o estado da sua encomenda {order_id} modificou a ");
define("v_smsprestashop_sqltemplate2111_zen",". Bom dia, {shop_name}.");










// OpenCart
define("v_about_version_oc","Módulo Cart SMS, a versão ");
define("v_about_supported_text_oc","Versões suportadas do OpenCart:");
define("v_about_supported_version_oc","1.4.7 - 1.5.6.1");
define("v_about_manual_url_oc","www.cart-sms.com/manual.html");
define("v_about_website_name_oc","www.cart-sms.com");
define("v_about_website_url_oc","www.cart-sms.com/pt/index.html");

define("v_smsprestashop_sqltemplate1_oc","Nova encomenda de {customer_firstname}  (customer_lastname}, cliente: {customer_id}, encomenda: {order_id},  Pagamento:  {order_payment}, soma: {order_total_paid} {order_currency} . Encomenda: {order_products2}.  Informações de  {shop_name}.");
define("v_smsprestashop_sqltemplate21_oc","A sua encomenda {order_id} foi criada com sucesso, o pagamento: {order_payment} , soma:  {order_total_paid} {order_currency}.   Bom dia, {shop_name}..");
define("v_smsprestashop_sqltemplate2_oc","Cliente  {customer_firstname} {customer_lastname}, id: {customer_id}, acaba de registar-se em {shop_name}.");
define("v_smsprestashop_sqltemplate22_oc","Caro/a {customer_firstname} {customer_lastname}, a sua conta em {shop_name} foi criada com sucesso. Nome de usuário: {customer_email}. Bom dia!");
define("v_smsprestashop_sqltemplate3_oc","O cliente {customer_firstname} {customer_lastname}, id: {customer_id}, devolveu o artigo de encomenda. {order_id}. Encomenda: {orderReturn2}. Mensagem do cliente: {customer_question}. Informações de {shop_name}."); // ???
define("v_smsprestashop_sqltemplate23_oc","Recebemos o seu pedido. Encomenda {order_id}. Bom dia, {shop_name}.");
define("v_smsprestashop_sqltemplate4_oc","Na encomenda {order_id} foi modificada a quantidade  {orderSlip2}. Informações de {shop_name}."); // ?
define("v_smsprestashop_sqltemplate24_oc","Na sua encomenda número {order_id} foi modificada a quantidade, {orderSlip2}. Bom dia{shop_name}.");
define("v_smsprestashop_sqltemplate5_oc","Confirmação do pagamento, encomenda número: {order_id}, pagamento: {order_payment}, soma: {order_total_paid} {order_currency}. Informações de {shop_name}.");
define("v_smsprestashop_sqltemplate25_oc","Temos recebido o pagamento pela sua encomenda {order_id} por meio de {order_payment},  soma: {order_total_paid} {order_currency}. Bom dia, {shop_name}.");
define("v_smsprestashop_sqltemplate62_oc","A encomenda n. {order_id} foi atualizada com o número da remessa {order_shipping_number} atribuído pelo transportador. Informações de {shop_name}."); //new         
define("v_smsprestashop_sqltemplate262_oc","Caro cliente, o artigo da sua encomenda n. {order_id} foi enviado, o número da remessa atribuído pelo transportador é {order_shipping_number}. Bom dia, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_oc","Este produto foi eliminado de {shop_name}, id: {product_id}, ref: {product_ref}, nome: {product_name}.  Eliminado pelo usuário: {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_oc","A quantidade do produto tem sido alterada, id: {product_id}, ref: {product_ref}, nome: {product_name}, nova quantidade: {product_quantity}, fornecedor: {product_supplier}. Informações de {shop_name}.");
define("v_smsprestashop_sqltemplate9_oc","Este artigo está a acabar-se em estoque, id: {product_id}, ref: {product_ref}, nome:  {product_name}, quantidade: {product_quantity}. Informações de {shop_name}.");
define("v_smsprestashop_sqltemplate10_oc","Na encomenda {order_id} foi cancelado o artigo id: {product_id}, ref: {product_ref}, nome: {product_name}, quantidade: {product_quantity}, quantidade cancelada: {product_quantity_reinjected}Informações de {shop_name}."); // ? quantity reinjected
define("v_smsprestashop_sqltemplate11_oc","O estado da encomenda{order_id} modificou a ");
define("v_smsprestashop_sqltemplate111_oc",". Informações de {shop_name}.");
define("v_smsprestashop_sqltemplate211_oc","Caro cliente, o estado da sua encomenda {order_id} modificou a ");
define("v_smsprestashop_sqltemplate2111_oc",". Bom dia, {shop_name}.");








// OsCommerce
define("v_about_version_os","Módulo smsCommerce, a versão ");
define("v_about_supported_text_os","Versões suportadas do OsCommerce:");
define("v_about_supported_version_os","2.3.x");
define("v_about_manual_url_os","www.sms-commerce.net/manual.html");
define("v_about_website_name_os","www.sms-commerce.net");
define("v_about_website_url_os","www.sms-commerce.net/pt/index.html");

define("v_smsprestashop_sqltemplate1_os","Nova encomenda de {customer_firstname}  (customer_lastname}, cliente: {customer_id}, encomenda: {order_id},  Pagamento:  {order_payment}, soma: {order_total_paid} {order_currency} . Encomenda: {order_products2}.  Informações de  {shop_name}.");
define("v_smsprestashop_sqltemplate21_os","A sua encomenda {order_id} foi criada com sucesso, o pagamento: {order_payment} , soma:  {order_total_paid} {order_currency}.   Bom dia, {shop_name}..");
define("v_smsprestashop_sqltemplate2_os","Cliente  {customer_firstname} {customer_lastname}, id: {customer_id}, acaba de registar-se em {shop_name}.");
define("v_smsprestashop_sqltemplate22_os","Caro/a {customer_firstname} {customer_lastname}, a sua conta em {shop_name} foi criada com sucesso. Nome de usuário: {customer_email}. Bom dia!");
define("v_smsprestashop_sqltemplate3_os","O cliente {customer_firstname} {customer_lastname}, id: {customer_id}, devolveu o artigo de encomenda. {order_id}. Encomenda: {orderReturn2}. Mensagem do cliente: {customer_question}. Informações de {shop_name}."); // ???
define("v_smsprestashop_sqltemplate23_os","Recebemos o seu pedido. Encomenda {order_id}. Bom dia, {shop_name}.");
define("v_smsprestashop_sqltemplate4_os","Na encomenda {order_id} foi modificada a quantidade  {orderSlip2}. Informações de {shop_name}."); // ?
define("v_smsprestashop_sqltemplate24_os","Na sua encomenda número {order_id} foi modificada a quantidade, {orderSlip2}. Bom dia{shop_name}.");
define("v_smsprestashop_sqltemplate5_os","Confirmação do pagamento, encomenda número: {order_id}, pagamento: {order_payment}, soma: {order_total_paid} {order_currency}. Informações de {shop_name}.");
define("v_smsprestashop_sqltemplate25_os","Temos recebido o pagamento pela sua encomenda {order_id} por meio de {order_payment},  soma: {order_total_paid} {order_currency}. Bom dia, {shop_name}.");
define("v_smsprestashop_sqltemplate62_os","A encomenda n. {order_id} foi atualizada com o número da remessa {order_shipping_number} atribuído pelo transportador. Informações de {shop_name}."); //new         
define("v_smsprestashop_sqltemplate262_os","Caro cliente, o artigo da sua encomenda n. {order_id} foi enviado, o número da remessa atribuído pelo transportador é {order_shipping_number}. Bom dia, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_os","Este produto foi eliminado de {shop_name}, id: {product_id}, ref: {product_ref}, nome: {product_name}.  Eliminado pelo usuário: {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_os","A quantidade do produto tem sido alterada, id: {product_id}, ref: {product_ref}, nome: {product_name}, nova quantidade: {product_quantity}, fornecedor: {product_supplier}. Informações de {shop_name}.");
define("v_smsprestashop_sqltemplate9_os","Este artigo está a acabar-se em estoque, id: {product_id}, ref: {product_ref}, nome:  {product_name}, quantidade: {product_quantity}. Informações de {shop_name}.");
define("v_smsprestashop_sqltemplate10_os","Na encomenda {order_id} foi cancelado o artigo id: {product_id}, ref: {product_ref}, nome: {product_name}, quantidade: {product_quantity}, quantidade cancelada: {product_quantity_reinjected}Informações de {shop_name}."); // ? quantity reinjected
define("v_smsprestashop_sqltemplate11_os","O estado da encomenda{order_id} modificou a ");
define("v_smsprestashop_sqltemplate111_os",". Informações de {shop_name}.");
define("v_smsprestashop_sqltemplate211_os","Caro cliente, o estado da sua encomenda {order_id} modificou a ");
define("v_smsprestashop_sqltemplate2111_os",". Bom dia, {shop_name}.");






// Virtuemart
define("v_about_version_vm","Módulo Virtue SMS, a versão ");
define("v_about_supported_text_vm","Versões suportadas do Virtuemart:");
define("v_about_supported_version_vm","2.3.x");
define("v_about_manual_url_vm","www.virtue-sms.net/manual.html");
define("v_about_website_name_vm","www.virtue-sms.net");
define("v_about_website_url_vm","www.virtue-sms.net/pt/index.html");

define("v_smsprestashop_sqltemplate1_vm","Nova encomenda de {customer_firstname}  (customer_lastname}, cliente: {customer_id}, encomenda: {order_id},  Pagamento:  {order_payment}, soma: {order_total_paid} {order_currency} . Encomenda: {order_products2}.  Informações de  {shop_name}.");
define("v_smsprestashop_sqltemplate21_vm","A sua encomenda {order_id} foi criada com sucesso, o pagamento: {order_payment} , soma:  {order_total_paid} {order_currency}.   Bom dia, {shop_name}..");
define("v_smsprestashop_sqltemplate2_vm","Cliente  {customer_firstname} {customer_lastname}, id: {customer_id}, acaba de registar-se em {shop_name}.");
define("v_smsprestashop_sqltemplate22_vm","Caro/a {customer_firstname} {customer_lastname}, a sua conta em {shop_name} foi criada com sucesso. Nome de usuário: {customer_email}. Bom dia!");
define("v_smsprestashop_sqltemplate3_vm","O cliente {customer_firstname} {customer_lastname}, id: {customer_id}, devolveu o artigo de encomenda. {order_id}. Encomenda: {orderReturn2}. Mensagem do cliente: {customer_question}. Informações de {shop_name}."); // ???
define("v_smsprestashop_sqltemplate23_vm","Recebemos o seu pedido. Encomenda {order_id}. Bom dia, {shop_name}.");
define("v_smsprestashop_sqltemplate4_vm","Na encomenda {order_id} foi modificada a quantidade  {orderSlip2}. Informações de {shop_name}."); // ?
define("v_smsprestashop_sqltemplate24_vm","Na sua encomenda número {order_id} foi modificada a quantidade, {orderSlip2}. Bom dia{shop_name}.");
define("v_smsprestashop_sqltemplate5_vm","Confirmação do pagamento, encomenda número: {order_id}, pagamento: {order_payment}, soma: {order_total_paid} {order_currency}. Informações de {shop_name}.");
define("v_smsprestashop_sqltemplate25_vm","Temos recebido o pagamento pela sua encomenda {order_id} por meio de {order_payment},  soma: {order_total_paid} {order_currency}. Bom dia, {shop_name}.");
define("v_smsprestashop_sqltemplate62_vm","A encomenda n. {order_id} foi atualizada com o número da remessa {order_shipping_number} atribuído pelo transportador. Informações de {shop_name}."); //new         
define("v_smsprestashop_sqltemplate262_vm","Caro cliente, o artigo da sua encomenda n. {order_id} foi enviado, o número da remessa atribuído pelo transportador é {order_shipping_number}. Bom dia, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_vm","Este produto foi eliminado de {shop_name}, id: {product_id}, ref: {product_ref}, nome: {product_name}.  Eliminado pelo usuário: {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_vm","A quantidade do produto tem sido alterada, id: {product_id}, ref: {product_ref}, nome: {product_name}, nova quantidade: {product_quantity}, fornecedor: {product_supplier}. Informações de {shop_name}.");
define("v_smsprestashop_sqltemplate9_vm","Este artigo está a acabar-se em estoque, id: {product_id}, ref: {product_ref}, nome:  {product_name}, quantidade: {product_quantity}. Informações de {shop_name}.");
define("v_smsprestashop_sqltemplate10_vm","Na encomenda {order_id} foi cancelado o artigo id: {product_id}, ref: {product_ref}, nome: {product_name}, quantidade: {product_quantity}, quantidade cancelada: {product_quantity_reinjected}Informações de {shop_name}."); // ? quantity reinjected
define("v_smsprestashop_sqltemplate11_vm","O estado da encomenda{order_id} modificou a ");
define("v_smsprestashop_sqltemplate111_vm",". Informações de {shop_name}.");
define("v_smsprestashop_sqltemplate211_vm","Caro cliente, o estado da sua encomenda {order_id} modificou a ");
define("v_smsprestashop_sqltemplate2111_vm",". Bom dia, {shop_name}.");








// Magento
define("v_about_version_ms","Módulo Mage SMS, a versão ");
define("v_about_supported_text_ms","Versões suportadas do Magento:");
define("v_about_supported_version_ms","1.6.x - 1.7.x");
define("v_about_manual_url_ms","www.mage-sms.com/manual.html");
define("v_about_website_name_ms","www.mage-sms.com");
define("v_about_website_url_ms","www.mage-sms.com/pt/index.html");

define("v_smsprestashop_sqltemplate1_ms","Nova encomenda de {customer_firstname}  (customer_lastname}, cliente: {customer_id}, encomenda: {order_id},  Pagamento:  {order_payment}, soma: {order_total_paid} {order_currency} . Encomenda: {order_products2}.  Informações de  {shop_name}.");
define("v_smsprestashop_sqltemplate21_ms","A sua encomenda {order_id} foi criada com sucesso, o pagamento: {order_payment} , soma:  {order_total_paid} {order_currency}.   Bom dia, {shop_name}..");
define("v_smsprestashop_sqltemplate2_ms","Cliente  {customer_firstname} {customer_lastname}, id: {customer_id}, acaba de registar-se em {shop_name}.");
define("v_smsprestashop_sqltemplate22_ms","Caro/a {customer_firstname} {customer_lastname}, a sua conta em {shop_name} foi criada com sucesso. Nome de usuário: {customer_email}. Bom dia!");
define("v_smsprestashop_sqltemplate3_ms","O cliente {customer_firstname} {customer_lastname}, id: {customer_id}, devolveu o artigo de encomenda. {order_id}. Encomenda: {orderReturn2}. Mensagem do cliente: {customer_question}. Informações de {shop_name}."); // ???
define("v_smsprestashop_sqltemplate23_ms","Recebemos o seu pedido. Encomenda {order_id}. Bom dia, {shop_name}.");
define("v_smsprestashop_sqltemplate4_ms","Na encomenda {order_id} foi modificada a quantidade  {orderSlip2}. Informações de {shop_name}."); // ?
define("v_smsprestashop_sqltemplate24_ms","Na sua encomenda número {order_id} foi modificada a quantidade, {orderSlip2}. Bom dia{shop_name}.");
define("v_smsprestashop_sqltemplate5_ms","Confirmação do pagamento, encomenda número: {order_id}, pagamento: {order_payment}, soma: {order_total_paid} {order_currency}. Informações de {shop_name}.");
define("v_smsprestashop_sqltemplate25_ms","Temos recebido o pagamento pela sua encomenda {order_id} por meio de {order_payment},  soma: {order_total_paid} {order_currency}. Bom dia, {shop_name}.");
define("v_smsprestashop_sqltemplate62_ms","A encomenda n. {order_id} foi atualizada com o número da remessa {order_shipping_number} atribuído pelo transportador. Informações de {shop_name}."); //new         
define("v_smsprestashop_sqltemplate262_ms","Caro cliente, o artigo da sua encomenda n. {order_id} foi enviado, o número da remessa atribuído pelo transportador é {order_shipping_number}. Bom dia, {shop_name}."); //new
define("v_smsprestashop_sqltemplate7_ms","Este produto foi eliminado de {shop_name}, id: {product_id}, ref: {product_ref}, nome: {product_name}.  Eliminado pelo usuário: {employee_id}, {employee_email}.");
define("v_smsprestashop_sqltemplate8_ms","A quantidade do produto tem sido alterada, id: {product_id}, ref: {product_ref}, nome: {product_name}, nova quantidade: {product_quantity}, fornecedor: {product_supplier}. Informações de {shop_name}.");
define("v_smsprestashop_sqltemplate9_ms","Este artigo está a acabar-se em estoque, id: {product_id}, ref: {product_ref}, nome:  {product_name}, quantidade: {product_quantity}. Informações de {shop_name}.");
define("v_smsprestashop_sqltemplate10_ms","Na encomenda {order_id} foi cancelado o artigo id: {product_id}, ref: {product_ref}, nome: {product_name}, quantidade: {product_quantity}, quantidade cancelada: {product_quantity_reinjected}Informações de {shop_name}."); // ? quantity reinjected
define("v_smsprestashop_sqltemplate11_ms","O estado da encomenda{order_id} modificou a ");
define("v_smsprestashop_sqltemplate111_ms",". Informações de {shop_name}.");
define("v_smsprestashop_sqltemplate211_ms","Caro cliente, o estado da sua encomenda {order_id} modificou a ");
define("v_smsprestashop_sqltemplate2111_ms",". Bom dia, {shop_name}.");





?>