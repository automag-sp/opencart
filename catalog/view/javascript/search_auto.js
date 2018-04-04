$(document).ready(function () {
    $("select[name='vendor']").bind("change", function () {
        var b = $(this).parents(".auto");
        $(b).find(".button").addClass("disable");
        $(b).find(".model, .year, .mod").empty().attr("disabled", !0);
        "-" != $(this).val() && $.ajax({
            type: "POST", url: "index.php?route=module/search_auto/model", dataType: "json", data: $(b).find("select[disabled!='disabled']"), beforeSend: function () {
                $(b).find(".ajaxload").css("display", "inline-block")
            }, complete: function () {
                $(b).find(".ajaxload").css("display", "none")
            }, success: function (a) {
                a.error ? alert(a.error) : a.model && $(b).find(".model").append($(a.model)).attr("disabled", !1)
            }, error: function (a, b, c) {
                alert("ERROR: \n\n" + c)
            }
        })
    });
    $("select[name='model']").bind("change", function () {
        var b = $(this).parents(".auto");
        $(b).find(".button").addClass("disable");
        $(b).find(".year, .mod").empty().attr("disabled", !0);
        "-" != $(this).val() ? $.ajax({
            type: "POST", url: "index.php?route=module/search_auto/year", dataType: "json", data: $(b).find("select[disabled!='disabled']"), beforeSend: function () {
                $(b).find(".ajaxload").css("display", "inline-block")
            }, complete: function () {
                $(b).find(".ajaxload").css("display", "none")
            }, success: function (a) {
                a.error ? alert(a.error) : a.year && $(b).find(".year").append($(a.year)).attr("disabled", !1)
            }, error: function (a, b, c) {
                alert("ERROR: \n\n" + c)
            }
        }) : ($(".auto .year, .auto .mod").empty().attr("disabled", !0), $(".auto .button").addClass("disable"))
    });
    $("select[name='year']").bind("change", function () {
        var b = $(this).parents(".auto");
        $(b).find(".button").addClass("disable");
        $(b).find(".mod").empty().attr("disabled", !0);
        "-" != $(this).val() ? $.ajax({
            type: "POST", url: "index.php?route=module/search_auto/mod", dataType: "json", data: $(b).find("select[disabled!='disabled']"), beforeSend: function () {
                $(b).find(".ajaxload").css("display", "inline-block")
            }, complete: function () {
                $(b).find(".ajaxload").css("display", "none")
            }, success: function (a) {
                a.error ? alert(a.error) : a.mod && $(b).find(".mod").append($(a.mod)).attr("disabled", !1)
            }, error: function (a, b, c) {
                alert("ERROR: \n\n" + c)
            }
        }) : ($(".auto .mod").empty().attr("disabled", !0), $(".auto .button").addClass("disable"))
    });
    $("select[name='mod']").bind("change", function () {
        var b = $(this).parents(".auto");
        "-" != $(this).val() ? $(b).find(".button").removeClass("disable") : $(b).find(".button").addClass("disable")
    });
    $(".filter-content .tire .button,.filter-content .disc .button").bind("click", function () {
        if ($(this).hasClass("disable"))return !1;
        var b = $(this).parent().attr("class"), a = $(this).parents(".filter-content").find("select"), d = "";
        $(a).each(function (b, a) {
            "" != a.value && (d += "&" + a.name + "=" + encodeURIComponent(a.value))
        });
        location = "index.php?route=product/search_auto&tab=" + b + d
    });
    $(".auto .model").each(function (b, a) {
        (!a.value || "-" == a.value) && $(a).attr("disabled", !0)
    });
    $(".auto .year").each(function (b, a) {
        (!a.value || "-" == a.value) && $(a).attr("disabled", !0)
    });
    $(".auto .mod").each(function (b, a) {
        if (!a.value || "-" == a.value) $(a).attr("disabled", !0), $(".auto .button").addClass("disable")
    })
});