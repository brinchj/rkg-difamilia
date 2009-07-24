function el(s) {
    return document.getElementById(s);
}


var CJAR = new CookieJar({
			     expires: 3600, path: '/'
			 });


var SB_USER;
function sbInit() {
    SB_USER = CJAR.get('sb_user');
    if(SB_USER == null || SB_USER.name == null) {
	el('sb_input').innerHTML = el('sb_choose_name').innerHTML;
    } else {
	el('sb_input').innerHTML = el('sb_messenger').innerHTML;
    }
    new Ajax.PeriodicalUpdater('sb_list', './getlist.php',
			       { frequency: 1, decay: 1.1 });
}

function sbSetName(form) {
    var name = form.name.value;
    SB_USER = {
	'name': name
    };
    CJAR.put('sb_user', SB_USER);
    el('sb_input').innerHTML = el('sb_messenger').innerHTML;
}


function sbPost(form) {
    var msg = form.message.value;
    form.message.value = '';
    new Ajax.Updater('sb_list', './getlist.php',
		     { method: 'post', parameters: {
		       name: SB_USER.name, message: msg
		   }});
    return false;
}

function sbReload() {
    new Ajax.Updater('sb_list', './getlist.php',
		     { method: 'get' });
    setTimeout('sbReload', 1000);
}