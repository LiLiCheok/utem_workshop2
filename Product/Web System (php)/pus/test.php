<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <title>Parent Updater System Homepage</title>
    <meta name="viewport" content="width-divice-width, initial-scale=1.-">
    <style>
		body{
			background: #F1F0D1; /* Give colour to background */	
			font-family: Verdan, Tahoma, Arial, Sans-Serif;
			font-size: 18px;
			overflow: auto;
		}
		h1, h2, h3{
			text-align:center;
			padding-left:5%;
			color: #878E63;	
		}
		p{
			padding: 2%;
			color: #878E63;
		}
		img{
			text-align: center;
			max-width: 100%; /* So won't overflow if resize screen */
			height: auto;
			width: auto;	
		}
		#wrapper{
			margin: 0 auto; /* Makes wrapper stays in middle of the page rather than sliding around */		
			max-width: 1020px;
			width: 98%;
			background: #FEFBE8;
			border: 1px solid #878E63;
			border-radius: 2px;
			box-shadow: 0 0 10px 0px rgba(12, 3, 25, 0.8);
		}
		#callout{
			width: 100%;
			height: auto;
			background: #878E63;
			overflow: hidden;	/* So that any overflow will not be visible. */
		}
		#callout p{
			text-align: right;
			font-size: 13px;
			padding: 0.1% 5% 0 0; /* Pad left 0.1, right 5, bottom 0, top 0; */
			color: #F1F0D1;
		}
		#callout p a{
			color: #F1F0D1;
			text-decoration: none;
		}
		header{
			width: 96%;
			min-height: 125px;
			padding: 5px;
			text-align: center;	
		}
		nav ul{	
			list-style: none;
			margin: 0;
			padding-left: 50px;
		}
		nav ul li{
			float: left;
			border: 1px solid #878E63;
			width: 15%;
		}
		nav ul li a{
			background: #F1F0D1;
			display: block;
			padding: 5% 12%; /* 5px top and bottom, 12 px left right */
			font-weight: bold;
			font-size: 18px;
			color: #878E63;
			text-decoration: none;
			text-align: center;
		}
		nav ul li a:hover, nav ul li.active a{
			background-color: #878E63;
			color: #F1F0D1;	
		}
		.banner img{
			width: 100%;
			border-top: 1px solid #878E63;
			border-bottom: 1px solid #878E63;
		}
		.clearfix{
			clear: both;	
		}
		.left-col{
			width: 55%;
			float: left;
			margin: -2% 1% 1% 1%;	
		}
		.sidebar{
			width: 40%;
			float: right;
			margin: 1%;
			text-align: center;	
		}
		.therapy{
			float: left;
			margin: 0 auto;
			width: 100%;
			height: auto;
			padding: 1%;	
		}
		.section{
			width: 29%;
			float: left;
			margin: 2% 2%;
			text-align: center;
		}
		footer{
			background: #878E63;
			width: 100%;
			overflow: hidden;	
		}
		footer p, footer h3{
			color: #F1F0D1;	
		}
		footer p a{
			color: #F1F0D1;
			text-decoration: none;	
		}
		ul{
			list-style-type: none;
			margin: 0;
			padding: 0;	
		}
		li{
			display: inline;	
		}
		ul li img{
			height: 50px;	
		}
		/*------------------MEDIA!!!--------------------*/
		@media screen and(max-width: 478px){
			body{
				font-size: 13px;	
			}
		}
		@media screen and (max-width: 740px){
			nav{
				width: 100%;
				margin-bottom: 10px;
			}
			nav ul{
				list-style: none;
				margin: 0 auto;
				padding-left: 0;	
			}
			nav ul li{
				text-align: center;
				margin-left: 0 auto;
				width: 100%;	
				border-top: 1px solid #878E63;
				border-right: 0px solid #878E63;
				border-bottom: 1px solid #878E63;
				border-left: 0px solid #878E63;				
			}
			nav ul li a{
				padding: 8px 0;
				fontsize: 16px;	
			}
			.left-col{
				width: 100px;		
			}
			.sidebar{
				width: 100px;	
			}
			.section{
				float: left;
				width: 100px;
				margin: 0;	
			}
		}
	</style>
</head>
<body>
	<div id="wrapper"> <!-- Top Header of web -->
    	<div id="callout"> <!-- For Telephone -->
        	<p>Call Us At <b>06-2383571</b></p>
        </div>
    	<header> <!-- For Logo -->
       	 	<a href="#"><img src="http://www.w3newbie.com/wp-content/uploads/massagelogo.png" alt="Massage by Tia" title="Massage by Tia" /></a>
        </header>
        <nav>
        	<ul>
                <li class='active'><a href="#">Home</a></li>
                <li><a href="#">Facility</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Pricing</a></li>
                <li><a href="#">Hours</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <div class="clearfix"></div>
        </nav>
        <div class="banner"> <!-- Banner Image -->
        	<img src="http://www.w3newbie.com/wp-content/uploads/massagebanner.png" />
        </div>
         	<center><img src="http://www.w3newbie.com/wp-content/uploads/three_sayings.png" /></center> <!-- Center tag centerise this -->
            <section class="left-col">  <!-- Make content into a column in left side -->
            	<p style="text-indent: 50px;">Hari ini, nama Johor Darul Ta'zim menjadi tajuk utama di hampir semua akhbar tempatan apabila keputusan FIFA menghalang penyertaan pasukan dari Kuwait di peringkat antarabangsa menyaksikan JDT layak ke pentas akhir Piala AFC 2015. Sebelum ini, JDT telah mencatat sejarah menjadi pasukan pertama tanahair layak ke peringkat separuh akhir Piala AFC dan pastinya layak ke peringkat berikutnya menjadi satu lagi peluang meletakkan JDT dalam kelas yang tersendiri. Selain layak ke perlawanan berikut, JDT juga tampil garang dalam pentas TM Piala Malaysia 2015 apabila menewaskan pasukan Angkatan Tentera Malaysia 4-0 dalam perlawanan yang berlangsung malam tadi. Tahniah diucapkan kepada pasukan kebanggaan Harimau Selatan. Luaskan Kuasamu Johor.</p>
                <p style="text-indent: 50px;">Johor Darul Ta'zim became the main topic on major local newspapers today following the decision by FIFA to ban Kuwaiti teams from participating in international tournaments, allowing JDT to progress to the 2015 AFC Cup final. Having already created history by becoming the first Malaysian team to reach the AFC Cup semi-finals, the appearance in the final will provide an opportunity for JDT to be placed in their own class. Besides reaching the final, JDT were ruthless in the 2015 TM Malaysia Cup last night as they beat ATM 4-0. Congratulations to the Southern Tigers. Luaskan Kuasamu Johor.</p>
            </section>
        	<aside class="sidebar">  <!-- Insert a content to the right side of the row -->
            	<div class="theraphy">
            		<img src="http://www.w3newbie.com/wp-content/uploads/therapist.jpg" />
                </div>
            </aside>
        <div class="clearfix"></div>
        <div class="section">
        	<h3>Private Massage Area</h3>
            <img src="http://www.w3newbie.com/wp-content/uploads/private.png" />
            <p>This we be a website for a fictitious massage therapy company called "Massage by Tia". In this website we'll use our HTML5 and CSS3 skills to create a responsive website that includes a callout section at the top of the website for a phone number which is great for small business websites, a shifting navigation that will completely transform using media queries when appears on tablets and phones, then we'll have a two </p>
        </div>
        <div class="section">
            <h3>Sauna Steam Room</h3>
            <img src="http://www.w3newbie.com/wp-content/uploads/sauna-steam.png" />
            <p>This we be a website for a fictitious massage therapy company called "Massage by Tia". In this website we'll use our HTML5 and CSS3 skills to create a responsive website that includes a callout section at the top of the website for a phone number which is great for small business websites, a shifting navigation that will completely transform using media queries when appears on tablets and phones, then we'll have a two </p>
        </div>
        <div class="section">
            <h3>Resort Retreat</h3>
            <img src="http://www.w3newbie.com/wp-content/uploads/retreat.png" />
            <p>This we be a website for a fictitious massage therapy company called "Massage by Tia". In this website we'll use our HTML5 and CSS3 skills to create a responsive website that includes a callout section at the top of the website for a phone number which is great for small business websites, a shifting navigation that will completely transform using media queries when appears on tablets and phones, then we'll have a two </p>
        </div>
        <center><img src="http://www.w3newbie.com/wp-content/uploads/ease.png" /></center> <!-- Center tag centerise this -->
        <footer>
        	<div class="section">
            	<p>Massage by Tia</p>
                <p><b>06-3234444</b><br>
                14, TU 24<br>
                Taman Tasik Utama<br>
                Melaka<br>
                tia@massage.com
               	</p>
            </div>
            <div class="section">
            	<p>Connect With Us:</p>
            	<ul>
                	<li><a href="#"><img src="http://www.w3newbie.com/wp-content/uploads/facebook1.png"</li>
                    <li><a href="#"><img src="http://www.w3newbie.com/wp-content/uploads/googleplus.png"</li>
                    <li><a href="#"><img src="http://www.w3newbie.com/wp-content/uploads/twitter1.png"</li>
                    <li><a href="#"><img src="http://www.w3newbie.com/wp-content/uploads/youtube1.png"</li>
                </ul>
            </div>
            <div class="section"> <!-- Divide a row into sections -->
            	<img src="http://www.w3newbie.com/wp-content/uploads/plant.png">
            
            </div>
        </footer>
    </div>
    	<p style="text-allign: center"; padding: 0px;>&#169;Copyright - Massage by Tia, 2014.</p>
</body>
</html>