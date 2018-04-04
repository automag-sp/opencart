function showPopup()
{
    $("#popup").fadeToggle();
    $("#popupbackground").fadeToggle();
}

function smsCounter()
{
    text = $("#smsText").val();
    text = getTemplateValues(text);
    $("#smsPreview").text(text);
    
    var smsCount = 0;
    var smsLen = $("#smsPreview").val().length;
    var customers = "";
    var customersCount = parseInt($.trim($("#snippet-countup").text()));

    if($("#unicode").is(':checked'))
    {
        smsCount = Math.floor(smsLen / 70 + (smsLen % 70 > 0));
    }
    else 
    {
        smsCount = Math.floor(smsLen / 160 + (smsLen % 160 > 0));
    }

    if($.isNumeric(customersCount))
    {
        customers = ", " + v_smsmarketing_jstotalcustomers + " " + customersCount + ", " + v_smsmarketing_jstotalsms + (customersCount * smsCount);
    }   
    
    $("#labelSMS").text("("+v_smsmarketing_jschars + $("#smsPreview").val().length + ", " + v_smsanswers_sms + ": " + smsCount + customers+")");
}

function addToTextBox(text)
{
    $("#smsText").atCaret('insert',text);
    smsCounter();
}

function addRecipient(number)
{
    $("#recipients").val($("#recipients").val()+number+", ");
    $('span[data="'+number+'"]').css("text-decoration", "line-through");
}

function confirmSend(send, sms)
{
    if(confirmLink(this, send+' ', ' '+sms+'?'))
    {
        $("#ajaxLoader_submitSend").removeClass("invisibility");
        return true;   
    }
    return false;
}

function toggleCouponVariables()
{
    if($('#couponSelect').val() == -1)
    {
        $('#couponVariables').hide();
    }
    else 
    {
        $('#couponVariables').show();
    }
}

function textSender()
{
    if($("#selectTextSender").val() != -1)
    {
        $("#newTextSender").hide();
    }
    else
    {
        $("#newTextSender").show();
    }
}

function ownSender()
{
    if($("#selectOwnSender").val() != -1)
    {
        $("#newOwnSender").hide();
    }
    else
    {
        $("#newOwnSender").show();
    }
}

function confirmTest(event, message)
{
    var answer = confirm(message)
    if (!answer){
        event.preventDefault();
    }
    
    return false;  
} 

function confirmLink(theLink, test5,test6)
{
    if(this.txt1>0 && this.totalsms>0)
    {
        var is_confirmed = confirm(test5+this.totalsms+test6);
        if (is_confirmed) {
            theLink.href += '&is_js_confirmed=1';
        }
        return is_confirmed;
    }
} 

String.prototype.replaceAll = function (find, replace) {
    var str = this;
    return str.replace(new RegExp(find, 'g'), replace);
};

function toggleInfo(id)
{
    if($('#toggleText'+id).css('display') == 'none')
    {
        $('#toggleButton'+id).attr('src', minus);
        $('#toggleText'+id).fadeIn(1000);
    } else {
        $('#toggleButton'+id).attr('src', plus);
        $('#toggleText'+id).hide();
    }
}

function setNotice(notice, element)
{
    $('#textArea'+element).atCaret('insert',notice);
    countHook(element);
}

function countHook(element) 
{
    text1 = $('#textArea'+element).val();
    text1 = getTemplateValues(text1);
    $('#textfake'+element).text(text1);

    len = text1.length;
    var total = 0;
    
    if(unicode)
    {
        total = Math.floor(len / 70 + (len % 70 > 0));
    }
    else 
    {
        total = Math.floor(len / 160 + (len % 160 > 0));
    }

    $('#label'+element).text(v_adminsms_preview+' ('+chartext+': '+len+', '+v_adminsms_jstotalsms+' '+total+')');
}

function popup_title(obj)
{
    var $this = $(obj);
    var title = $this.attr('title');
    $(".popup-title").fadeOut(500, function() {
        $(this).remove();
    });
    var position = $this.position();
    var popup = $("<p class='popup-title' style='display: none;'>" + title + "</p>");
    $("body").append(popup);
    popup.css("position", "absolute")
        .css("top", (position.top-20)+"px")
        .css("left", (position.left-20)+"px")
        .css("max-width", "400px")
        .css("background","black")
        .css("color", "white")
        .css("text-align", "left")
        .css("padding", "5px")
        .css("cursor", "pointer")
        .fadeIn(500);
    popup.click(function() {
        $this.attr("title", $(this).text());
        $(popup).fadeOut(500, function() { $(this).remove() });
    });
}

function vat(){
    alert(document.forms['editAccount']['country0'].value);
}

function isVAT(DIC2, country02)
{
    $(".loader").show();
    if(!DIC2)
    {
        $(".vat").css("background-color","#fff");
        $(".vat").css("border","initial solid 1px");
        $(".vatErr").css("display","none");
        $(".loader").hide();
        return;
    }

    
    if(country02 == "Czech Republic" || country02=="Slovakia" || country02=="Slovenia"  || country02=="Bulgaria"  || country02=="Romania"    || country02=="Spain" || country02=="Sweden" || country02=="United Kingdom"   || country02=="Austria" || country02=="Belgium"  || country02=="Cyprus"  || country02=="Denmark"  || country02=="France" || country02=="Germany"   || country02=="Greece" || country02=="Hungary"  || country02=="Ireland" || country02=="Italy" || country02=="Latvia"  || country02=="Lithuania"     || country02=="Luxembourg" || country02=="Netherlands" || country02=="Poland"    || country02=="Portugal" || country02=="Estonia" || country02=="Malta"   || country02=="Finland"   || country02=="Croatia")
    {
              
        var pref_country;
        var vysl;
        var wait = true;
        
        switch(country02)
        {
            case "Czech Republic": pref_country = "CZ"; break;
            case "Slovakia": pref_country = "SK"; break;
            case "Slovenia": pref_country = "SI"; break;  
            case "Bulgaria": pref_country = "BG"; break; 
            case "Romania": pref_country = "RO"; break;     
            case "Spain": pref_country = "ES"; break;
            case "Sweden": pref_country = "SE"; break;
            case "United Kingdom": pref_country = "GB"; break; 
            case "Austria": pref_country = "AT"; break; 
            case "Belgium": pref_country = "BE"; break; 
            case "Cyprus": pref_country = "CY"; break; 
            case "Denmark": pref_country = "DK"; break;      
            case "France": pref_country = "FR"; break;     
            case "Germany": pref_country = "DE"; break; 
            case "Greece": pref_country = "EL"; break; 
            case "Hungary": pref_country = "HU"; break; 
            case "Ireland": pref_country = "IE"; break;     
            case "Italy": pref_country = "IT"; break;
            case "Latvia": pref_country = "LV"; break;
            case "Lithuania": pref_country = "LT"; break;
            case "Luxembourg": pref_country = "LU"; break;
            case "Netherlands": pref_country = "NL"; break;  
            case "Poland": pref_country = "PL"; break; 
            case "Portugal": pref_country = "PT"; break; 
            case "Estonia": pref_country = "EE"; break; 
            case "Malta": pref_country = "MT"; break; 
            case "Finland": pref_country = "FI"; break; 
            case "Croatia": pref_country = "HR"; break;         
        }

        DIC2 = DIC2.replace(" ", "");
        DIC2 = DIC2.replace(".", "");
        DIC2 = DIC2.replace("-", "");
       
        prefix = DIC2.substr(0,2);
        prefix = prefix.toLowerCase();
        country = pref_country.toLowerCase();

        
        if(prefix == country){
            DIC2 = DIC2.substr(2);
        }
 
        $.getJSON('http://isvat.appspot.com/'+pref_country+'/'+DIC2+'/?callback=?', function(data){
                    
            if(data){
                $(".vat").css("background-color","#f1fbe5");
                $(".vat").css("border","#8cce3b 1px solid");
                $(".vatErr").css("display","none");
            } else {
                $(".vat").css("background-color","#fef1ec");
                $(".vat").css("border","#cd0a0a 1px solid");
                $(".vatErr").css("display","inline");
            }
            $(".loader").hide();
        });

                               
    } else {
        $(".vat").css("background-color","#fff");
        $(".vat").css("border","#aaa solid 1px");
        $(".vatErr").css("display","none");
        $(".loader").hide();
        return;
    }
}

var pismeno = "";

function setselected(number)
{
    $("#recipients").val($("#recipients").val() + number + ",");
}

function confirmLink(theLink, test5,test6)
{
    var is_confirmed = confirm(test5+test6);
    if (is_confirmed) {
        theLink.href += '&is_js_confirmed=1';
    }
    return is_confirmed;
} 