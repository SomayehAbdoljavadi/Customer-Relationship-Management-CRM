////////////////////////////////////////////////// hedaerTime //////////////////////////////////////////////////
setInterval(function(){ $('#headerTime').load('actions/hedaerTime.php'); }, 10000);
////////////////////////////////////////////////// events //////////////////////////////////////////////////
function add_event(day,year,month,title){
	$('#ajax_result').load("actions/add_event.php?title="+encodeURIComponent(title)+"&year="+year+"&month="+month+"&day="+day);
	location.replace('#/events');
}
function edit_event(id,day,year,month,title){
	$('#ajax_result').load("actions/edit_event.php?id="+id+"&title="+encodeURIComponent(title)+"&year="+year+"&month="+month+"&day="+day);
	$('#events').load('pages/ajax/events.php');
}
function eventGroups(id){
	$('#GroupEventsLoad').load("pages/ajax/GroupEvents.php?id="+id);
}
function saveGroupEvent(id,group){
	$('#GroupEventsLoad').load("actions/SaveGroupEvents.php?id="+id+"&group="+group);
}
function removeGroupEvent(id,group){
	var txt;
	var r = confirm("آیا مایل به حذف گروه می باشید؟");
	if (r == true) {
		$('#GroupEventsLoad').load("actions/removeGroupEvent.php?id="+id+"&group="+group);
	} else {
	}
}
function remove_event(id) {
	var txt;
	var r = confirm("آیا مایل به حذف رویداد می باشید؟");
	if (r == true) {
		$('#ajax_result').load("actions/remove_event.php?id="+id);
		$('#events').load('pages/ajax/events.php');
	} else {
	}
}
function add_special_event() {
	var message_id = $("#message_id").val();
	var customerId = $("#customerId").val();
	var title = encodeURIComponent($("#title").val());
	var day = $("#day").val();
	var month = $("#month").val();
	var r = confirm("رویداد جدید افزوده شود؟");
	if (r == true) {
		$('#ajax_result').load("actions/add_special_event.php?message_id="+message_id+"&title="+title+"&customerId="+customerId+"&day="+day+"&month="+month);
		$('#events').load('pages/ajax/events.php');
	} else {
	}
}
////////////////////////////////////////////////// admins //////////////////////////////////////////////////
function new_admin_user() {
	var txt;
	var name = encodeURIComponent($("#name").val());
	var family = encodeURIComponent($("#family").val());
	var access = encodeURIComponent($("#access").val());
	var email = encodeURIComponent($("#email").val());
	var password = encodeURIComponent($("#password").val());
	var repassword = encodeURIComponent($("#repassword").val());
	var mobile = encodeURIComponent($("#mobile").val());
	var r = confirm("کاربر جدید اضافه شود؟");
	if (r == true) {
		$('#ajax_result').load("actions/new_admin_user.php?name="+name+"&family="+family+"&email="+email+"&access="+access+"&password="+password+"&repassword="+repassword+"&mobile="+mobile);
		$('#admins').load('pages/ajax/admins.php');
	} else {
	}
}
function remove_admin_user(id) {
	var txt;
	var r = confirm("آیا مایل به حذف کاربر می باشید؟");
	if (r == true) {
		$('#ajax_result').load("actions/remove_admin_user.php?id="+id);
		$('#admins').load('pages/ajax/admins.php');
	} else {
	}
}
////////////////////////////////////////////////// titles //////////////////////////////////////////////////
function new_title(id) {
	var txt;
	var title = encodeURIComponent($("#title").val());
	var r = confirm("عنوان جدید اضافه شود؟");
	if (r == true) {
		$('#ajax_result').load("actions/new_title.php?title="+title);
		$('#contactTitles').load('pages/ajax/titles.php');
	} else {
	}
}
function remove_title(id) {
	var txt;
	var r = confirm("آیا مایل به حذف عنوان می باشید؟");
	if (r == true) {
		$('#ajax_result').load("actions/remove_title.php?id="+id);
		$('#contactTitles').load('pages/ajax/titles.php');
	} else {
	}
}
function edit_title() {
	var txt;
	var id = $("#titleId").val();
	var titleText = encodeURIComponent($("#titleText").val());
	var r = confirm("عنوان ویرایش شود؟");
	if (r == true) {
		$('#ajax_result').load("actions/edit_title.php?titleText="+titleText+"&id="+id);
		$('#contactTitles').load('pages/ajax/titles.php');
	} else {
	}
}
////////////////////////////////////////////////// categories //////////////////////////////////////////////////
function new_category(id) {
	var txt;
	var category = encodeURIComponent($("#category").val());
	$('#ajax_result').load("actions/new_category.php?category="+category);
	$('#contactCategory').load('pages/ajax/categories.php');

}
function edit_category() {
	var txt;
	var id = $("#categoryId").val();
	var categoryText = encodeURIComponent($("#categoryText").val());
	var r = confirm("دسته بندی ویرایش شود؟");
	if (r == true) {
		$('#ajax_result').load("actions/edit_category.php?categoryText="+categoryText+"&id="+id);
		$('#contactCategory').load('pages/ajax/categories.php');
	} else {
	}
}
function remove_category(id) {
	var txt;
	var r = confirm("آیا مایل به حذف دسته می باشید؟");
	if (r == true) {
		$('#ajax_result').load("actions/remove_category.php?id="+id);
		$('#contactCategory').load('pages/ajax/categories.php');
	} else {
	}
}
////////////////////////////////////////////////// Messages //////////////////////////////////////////////////
function new_message() {
	var txt;
	var messageText = encodeURIComponent($("#messageText").val());
	var messageGender = $("#messageGender").val();
	var messageOfficial = $("#messageOfficial").val();
	var messageEvent = $("#messageEvent").val();
		$('#ajax_result').load("actions/new_message.php?messageEvent="+messageEvent+"&messageText="+messageText+"&messageGender="+messageGender+"&messageOfficial="+messageOfficial);
		location.replace('#/messages');

}
function edit_message() {
	var txt;
	var id = $("#messageId").val();
	var messageText = encodeURIComponent($("#messageText").val());
	var messageGender = encodeURIComponent($("#messageGender").val());
	var messageOfficial = encodeURIComponent($("#messageOfficial").val());
	var r = confirm("پیام ویرایش شود؟");
	if (r == true) {
		$('#ajax_result').load("actions/edit_message.php?text="+messageText+"&id="+id+"&official="+messageOfficial+"&fender="+messageGender);
		$('#messages').load('pages/ajax/messages.php');
	} else {
	}
}

function delete_message(id) {
	var txt;
	var r = confirm("آیا مایل به حذف پیام می باشید؟");
	if (r == true) {
		$('#ajax_result').load("actions/delete_message.php?id="+id);
		$('#messages').load('pages/ajax/messages.php');
	} else {
	}
}



function re_send(id) {
	$('#ajax_result').load("actions/re_send.php?id="+id);
}
function delete_task(id) {
	var r = confirm("پیام منتظر ارسا حذف شود؟");
	if (r == true) {
		$('#ajax_result').load("actions/delete_task.php?id="+id);
		$('#tasks').load('pages/ajax/tasks.php');
	} else {
	}
}
function delete_custom_task(id) {
	var r = confirm("پیام منتظر ارسا حذف شود؟");
	if (r == true) {
		$('#ajax_result').load("actions/delete_custom_task.php?id="+id);
		$('#tasks').load('pages/ajax/tasks.php');
	} else {
	}
}


////////////////////////////////////////////////// strategies //////////////////////////////////////////////////

function contactStrategies(id) {
    $('#Strategies').load('pages/ajax/contact_strategies.php?id='+id);
}
function add_contactStrategy(id,contact_id) {
    $('#ajax_result').load('actions/add_contact_strategy.php?id='+id+'&contact_id='+contact_id);
}

function delete_strategy(id) {
    var txt;
    var r = confirm("آیا مایل به حذف استراتژی می باشید؟");
    if (r == true) {
        $('#ajax_result').load("actions/delete_strategy.php?id="+id);
        $('#strategies').load('pages/ajax/strategies.php');
    } else {
    }
}

function inlineEditStrategy(id,type,val) {
    var txt;
    var r = confirm("تغییرات جدید اعمال شود؟");
    if (r == true) {
    	var valNoSpace = encodeURIComponent(val);
        $('#ajax_result').load("actions/inline_edit_strategy.php?id="+id+"&type="+type+"&val="+valNoSpace);
    } else {
    }
}
////////////////////////////////////////////////// configuration //////////////////////////////////////////////////
function save_configuration() {
	var txt;
	var url = encodeURIComponent($("#config-url").val());
	var title = encodeURIComponent($("#config-title").val());
	var api = encodeURIComponent($("#config-sms-api").val());
	var signature = encodeURIComponent($("#config-signature").val());
	var number = encodeURIComponent($("#config-sms-number").val());
	var username = encodeURIComponent($("#config-sms-username").val());
	var password = encodeURIComponent($("#config-sms-password").val());
	var background = encodeURIComponent($("#config-background").val());
	var header = encodeURIComponent($("#config-header").val());
	var sidebar = encodeURIComponent($("#config-sidebar").val());
	var r = confirm("تنظیمات ذخیره شود؟");
	if (r == true) {
		$('#ajax_result').load("actions/configuration.php?url="+url+"&background="+background+"&header="+header+"&sidebar="+sidebar+"&title="+title+"&api="+api+"&signature="+signature+"&number="+number+"&username="+username+"&password="+password);
		$('#configuration').load('pages/ajax/configuration.php');
	} else {
	}
}
////////////////////////////////////////////////// contacts //////////////////////////////////////////////////
function new_contact() {
	var txt;
	var messageText = encodeURIComponent($("#messageText").val());
	var year = $("#contact-birthdate-year").val();
	var month = $("#contact-birthdate-month").val();
	var day = $("#contact-birthdate-day").val();
	var email = encodeURIComponent($("#contact-email").val());
	var mobile = $("#contact-mobile").val();
	var description = encodeURIComponent($("#contact-description").val());
	var family = encodeURIComponent($("#contact-family").val());
	var name = encodeURIComponent($("#contact-name").val());
	var official = $("#contact-official").val();
	var category = $("#contact-category").val();
	var gender = $("#contact-gender").val();
	var title = $("#contact-title").val();
	var Contactcity = encodeURIComponent($("#Contactcity").val());
	var Contactstate = encodeURIComponent($("#Contactstate").val());
	var Contactpostcode = $("#Contactpostcode").val();
	var Contactaddress = encodeURIComponent($("#Contactaddress").val());
	$('#ajax_result').load("actions/new_contact.php?year="+year+"&month="+month+"&day="+day+"&email="+email+"&mobile="+mobile+"&description="+description+"&family="+family+"&name="+name+"&official="+official+"&category="+category+"&gender="+gender+"&title="+title+"&city="+Contactcity+"&state="+Contactstate+"&postcode="+Contactpostcode+"&address="+Contactaddress);
	$('#customers').load('pages/ajax/customers.php');

}
function delete_contact(id) {
	var txt;
	var r = confirm("آیا مایل به حذف مخاطب می باشید؟");
	if (r == true) {
		$('#ajax_result').load("actions/delete_contact.php?id="+id);
		$('#customers').load('pages/ajax/customers.php');
	} else {
	}
}
function edit_contact() {
	var txt;
	var id = $("#Id").val();
	var messageText = encodeURIComponent($("#name").val());
	var messageText = encodeURIComponent($("#family").val());
	var messageText = encodeURIComponent($("#mobile").val());
	var messageText = encodeURIComponent($("#email").val());
	var r = confirm("مخاطب ویرایش شود؟");
	if (r == true) {
		$('#ajax_result').load("actions/edit_contact.php?text="+messageText+"&id="+id);
		$('#customers').load('pages/ajax/customers.php');
	} else {
	}
}
function editContact(id) {
	$('#editContactPopup').load('pages/ajax/edite_contact.php?id='+id);
}
function ContactDetails(id) {
	$('#ContactDetails').load('pages/ajax/ContactDetails.php?id='+id);
}
////////////////////////////////////////////////// contacts events //////////////////////////////////////////////////
function contactEvents(id) {
	$('#ContactEvents').load('pages/ajax/contact_events.php?id='+id);
}
function delete_contactEvents(id) {
	var txt;
	var r = confirm("آیا مایل به حذف رویداد می باشید؟");
	if (r == true) {
		$('#ajax_result').load("actions/delete_contactEvents.php?id="+id);
	} else {
	}
}
//////////////////////////////////////////////////////////////
function load_city(id) {
	$('#LoadCity').load('pages/ajax/load_city.php?id='+id);
}
////////////////////////////////////////////////// custom messages //////////////////////////////////////////////////
function select_adj() {
	var gender = $('#gender').val();
	var official = $('#official').val();
	var category = $('#category').val();
	$('#load-adj').load("actions/select_adj.php?gender="+gender+"&official="+official+"&category="+category);
}
//////////////////////////////////////////////////////////////
