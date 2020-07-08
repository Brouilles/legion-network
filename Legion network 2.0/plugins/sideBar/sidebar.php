<div id='social-sidebar'>
<ul>
    <li>
	    <a class='entypo-facebook' href='https://www.facebook.com/LegionServeurRP' target='_blank'>
            <img alt="Facebook" src="img/social/icon_facebook.png"> 
		    <span>facebook</span>
		</a>
	</li>
    <li>
	    <a class='entypo-youtube' href='https://www.youtube.com/channel/UCI2tkaz94jRJvKiQP7LOKyA ' target='_blank'>
            <img alt="Youtube" src="img/social/icon_youtube.png">
            <span>Youtube</span>
		</a>
	</li>
    <li>
	    <a class='entypo-mumble' href="mumble://mumble-4.verygames.net:50431/?serverversion=1.2.0&amp;version=1.2.0" target='_blank'>
            <img alt="mumble" src="img/social/icon_mumble.png">
            <span>Mumble</span>
		</a>
	</li>
    <li>
	    <a class='entypo-vote' href='http://www.minecraft-serveur.com/vote.php?id=1294' target='_blank'>
            <img alt="Votez" src="img/social/icon_vote.png">
            <span>Votez</span>
		</a>
	</li>
</ul>
</div>

<style type='text/css'>
/*<![CDATA[*/
@charset "utf-8";
/* CSS Document */
[class*="entypo-"]:before {
	font-family: 'entypo', sans-serif;
}
/* ---------- GENERAL ---------- */
#social-sidebar a { text-decoration: none; }
#social-sidebar ul {
	list-style: none;
	margin: 0;
	padding: 0;
}
/* ---------- Social Sidebar ---------- */
#social-sidebar {
	left: 0;
	margin-top: -75px; 
	position: fixed;
	top: 50%;
    z-index: 999;
}
#social-sidebar ul li:first-child a { border-radius: 0 5px 0 0; }
#social-sidebar ul li:last-child a { border-radius: 0 0 5px 0; }
#social-sidebar ul li a {
	background: #121212;
	color: #fff;
	display: block;
	height: 64px;
	font-size: 18px;
	line-height: 64px;
	position: relative;
	text-align: center;
	width: 64px;
}
#social-sidebar ul li a:hover span {
	left: 130%;
	opacity: 1;
}
#social-sidebar ul li a span {
	border-radius: 3px;
	line-height: 24px;
	left: -100%;
	margin-top: -16px;
	-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
	filter: alpha(opacity=0);
	opacity: 0;
	padding: 4px 8px;
	position: absolute;
	-webkit-transition: opacity .3s, left .4s;
	-moz-transition: opacity .3s, left .4s;
	-ms-transition: opacity .3s, left .4s;
	-o-transition: opacity .3s, left .4s;
	transition: opacity .3s, left .4s;
	top: 50%;
	z-index: -1;
}
#social-sidebar ul li a span:before {
	content: "";
	display: block;
	height: 8px;
	left: -4px;
	margin-top: -4px;
	position: absolute;
	top: 50%;
	-webkit-transform: rotate(45deg);
	-moz-transform: rotate(45deg);
	-ms-transform: rotate(45deg);
	-o-transform: rotate(45deg);
	transform: rotate(45deg);
	width: 8px;
	z-index: -2;
}
    
#social-sidebar ul li a[class*="facebook"]:hover,
#social-sidebar ul li a[class*="facebook"] span,
#social-sidebar ul li a[class*="facebook"] span:before { background: #234999; }
    
#social-sidebar ul li a[class*="youtube"]:hover,
#social-sidebar ul li a[class*="youtube"] span,
#social-sidebar ul li a[class*="youtube"] span:before { background: #cc181e; } 

#social-sidebar ul li a[class*="mumble"]:hover,
#social-sidebar ul li a[class*="mumble"] span,
#social-sidebar ul li a[class*="mumble"] span:before { background-color: #9130ff; } 
       
#social-sidebar ul li a[class*="vote"]:hover,
#social-sidebar ul li a[class*="vote"] span,
#social-sidebar ul li a[class*="vote"] span:before { background: #5BB75B; } 
/*]]>*/
</style>
