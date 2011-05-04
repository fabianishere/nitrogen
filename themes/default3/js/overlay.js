var $overlay_wrapper;
var $overlay_panel;

function show_overlay(text) {
    if ( !$overlay_wrapper ) append_overlay(text);
    $overlay_wrapper.fadeIn(700);
}




function show_overlay_admincp() {
    if ( !$overlay_wrapper ) 
	show_overlay('<div style="padding: 10px; "><h4 style="color: #666;">AdminCP Login</h4><form id="loginForm" name="loginForm" method="post" action="../login.php?linkback=admin/index.php"><table width="300" border="0" align="center" cellpadding="2" cellspacing="0"><tr><td width="112"><b>Login</b></td> <td width="188"><input name="login" type="text" class="textfield" id="login" /></td></tr><tr><td><b>Password</b></td> <td><input name="password" type="password" class="textfield" id="password" /></td></tr><tr><td>&nbsp;</td><td><input type="submit" name="Submit" value="Login" /></td></tr></table></form></div>');
    $overlay_wrapper.fadeIn(700);
}

function hide_overlay() {
    $overlay_wrapper.fadeOut(500);

}


 

function append_overlay(text) {
    $overlay_wrapper = $('<div id="overlay"></div>').appendTo( $('BODY') );
  $overlay_panel = $('<div id="overlay-panel" style="width: 300px;padding: 10px; -moz-box-shadow: 3px 3px 4px #000; -webkit-box-shadow: 3px 3px 4px #000; box-shadow: 3px 3px 4px #000;-ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color=\'#000000\')"; filter: progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color=\'#000000\');"></div>').appendTo( $overlay_wrapper );


    $overlay_panel.html(text);

    attach_overlay_events();
}
function attach_overlay_events() {
    $('A.hide-overlay', $overlay_wrapper).click( function(ev) {
        ev.preventDefault();
        hide_overlay();
    });
}

$(function() {
    $('A.show-overlay').click( function(ev) {
        ev.preventDefault();
        show_overlay();
    });
});





