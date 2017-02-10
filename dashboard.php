<?php

$pageTitle = 'Test Page';
$style = '';
$image = 'images/amy2.jpeg';
$name = 'Amy Takayesu';
$subtitle = 'Graduate Student';
$description = 'I am studying for a Masters in Computer Science at the Department of Information and Computer Sciences at the University of Hawaii. I expect to graduate in Spring, 2017.';
$social = [
	'facebook'	=>	'http://facebook.com',
	'twitter'	=>	'http://twitter.com/test'
];
$skills = [
	'skill1',
	'skill2',
	'skill3'
];
$links = [
	'facebook'	=>	'http://facebook.com',
	'twitter'	=>	'http://twitter.com/test'
];

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="mobile-web-app-capable" content="yes">
  <title><?php echo $pageTitle; ?></title>
  <script src="js/jquery.min.js"></script>
  <script src="css/semantic-ui/semantic.min.js"></script>
  <link rel="stylesheet" href="css/semantic-ui/semantic.min.css">

  <link rel="stylesheet" type="text/css" href="css/stylesheet-default.css">
  <link rel="stylesheet" type="text/css" href="css/print-default.css" media="print">
	
  <style type="text/css">
	  <?php echo $style; ?>
  </style>
  
  <link rel="stylesheet" type="text/css" href="css/dashboard.css">
</head>
<body>
<div style="height: 100%; margin-top: -75px" class="ui middle aligned grid ">
  <div class="column">
	<div class="dashboard1">
		<h3>Update your StackUp profile:</h3>
		<form id="form" method="post">
			<div class="ui form">
				<div class="field">
			      <label>Name: </label>
			      <input name="name" type="text" placeholder="Your Name (required)">
			    </div>
			    
			    <div class="field">
			      <label>Subheading: </label>
			      <input name="subtitle" type="text" placeholder="Your Subheading (required)">
			    </div>
			    
			    <div class="field">
					<label>Image: </label>
			      </div>
			    <div class="ui labeled input field fluid">
					  <div class="ui label">
					    http://
					  </div>
					  <input name="image" type="text" placeholder="imgur.com/your_picture.jpeg">
					</div>
			    
			    <div class="field">
				  <label>Summary</label>
				  <textarea name="summary" rows="2" placeholder="Your Summary (required)"></textarea>
				</div>
				
				<div class="field">
				    <label>Skills</label>
				    <select name="skills" class="ui fluid search dropdown" id="skill-select" multiple="">
				      <option value="">Your Skills</option>
						<option value="Iphone Sdk">Iphone Sdk</option>
						<option value="Jade">Jade</option>
						<option value="Jasmine">Jasmine</option>
						<option value="Java">Java</option>
						<option value="JavaScript">JavaScript</option>
						<option value="Jira">Jira</option>
						<option value="jQuery">jQuery</option>
						<option value="JSON">JSON</option>
						<option value="jsoup">jsoup</option>
						<option value="Jsp">Jsp</option>
						<option value="Kinect">Kinect</option>
						<option value="Laravel">Laravel</option>
						<option value="Latex">Latex</option>
						<option value="Less">Less</option>
						<option value="Libgdx">Libgdx</option>
						<option value="LinkedIn">LinkedIn</option>
						<option value="Linux">Linux</option>
						<option value="Lua">Lua</option>
						<option value="Machine Learning">Machine Learning</option>
						<option value="Magento">Magento</option>
						<option value="MapKit">MapKit</option>
						<option value="Markdown">Markdown</option>
						<option value="Matlab">Matlab</option>
						<option value="Maven">Maven</option>
						<option value="Memcached">Memcached</option>
						<option value="MongoDB">MongoDB</option>
						<option value="Mongoose">Mongoose</option>
						<option value="Monodevelop">Monodevelop</option>
						<option value="MySQL">MySQL</option>
						<option value="Neo4j">Neo4j</option>
						<option value="Netbeans">Netbeans</option>
						<option value="NFC">NFC</option>
						<option value="Nginx">Nginx</option>
						<option value="Node.js">Node.js</option>
						<option value="Notepad++">Notepad++</option>
						<option value="Npm">Npm</option>
						<option value="NumPy">NumPy</option>
						<option value="Oauth">Oauth</option>
						<option value="Objective C">Objective C</option>
						<option value="OpenCV">OpenCV</option>
						<option value="OpenGL">OpenGL</option>
						<option value="OpenLayers">OpenLayers</option>
						<option value="Pandas">Pandas</option>
						<option value="PayPal">PayPal</option>
						<option value="Perl">Perl</option>
						<option value="PhantomJS">PhantomJS</option>
						<option value="Phonegap">Phonegap</option>
						<option value="Photoshop">Photoshop</option>
						<option value="PHP">PHP</option>
						<option value="Phpmyadmin">Phpmyadmin</option>
						<option value="Postgresql">Postgresql</option>
						<option value="Powerpoint">Powerpoint</option>
						<option value="Processing">Processing</option>
						<option value="Pygame">Pygame</option>
						<option value="Python">Python</option>
						<option value="Qt">Qt</option>
						<option value="R">R</option>
						<option value="Raspberry Pi">Raspberry Pi</option>
						<option value="Redis">Redis</option>
						<option value="Rspec">Rspec</option>
						<option value="Ruby">Ruby</option>
						<option value="Ruby on Rails">Ruby on Rails</option>
						<option value="RubyGems">RubyGems</option>
						<option value="Scala">Scala</option>
						<option value="SciPy">SciPy</option>
						<option value="Sdl">Sdl</option>
						<option value="Selenium">Selenium</option>
						<option value="Sencha">Sencha</option>
						<option value="Symfony">Symfony</option>
						<option value="Telerik">Telerik</option>
						<option value="three.js">three.js</option>
						<option value="Titanium">Titanium</option>
						<option value="Tomcat">Tomcat</option>
						<option value="Tornado">Tornado</option>
						<option value="UIKit">UIKit</option>
						<option value="UnderscoreJS">UnderscoreJS</option>
						<option value="Vim">Vim</option>
						<option value="Visual Studio">Visual Studio</option>
						<option value="Webgl">Webgl</option>
						<option value="Windows Phone">Windows Phone</option>
						<option value="WiX">WiX</option>
						<option value="Word">Word</option>
						<option value="WordPress">WordPress</option>
						<option value="Xamarin">Xamarin</option>
						<option value="XAML">XAML</option>
						<option value="Xcode">Xcode</option>
						<option value="Xna">Xna</option>
						<option value="Yii">Yii</option>
						<option value="YouTube">YouTube</option>
						<option value="Zurb Foundation">Zurb Foundation</option>
						<option value="All4webs">All4webs</option>
						<option value="Twitter">Twitter</option>
						<option value="OpenXC">OpenXC</option>
						<option value="Twilio">Twilio</option>
						<option value="gamesalad">gamesalad</option>
						<option value="HTML5">HTML5</option>
						<option value="bootstrap">bootstrap</option>
						<option value="bit.ly">bit.ly</option>
						<option value="domainr">domainr</option>
						<option value="OpenShift">OpenShift</option>
						<option value="Moment.Js">Moment.Js</option>
						<option value=".NET">.NET</option>
						<option value="Crashlytics">Crashlytics</option>
						<option value="Bloomberg">Bloomberg</option>
						<option value="League of Legends">League of Legends</option>
						<option value="Mac">Mac</option>
						<option value="Lob">Lob</option>
						<option value="Core Foundation">Core Foundation</option>
						<option value="Firebase">Firebase</option>
						<option value="Flickr">Flickr</option>
						<option value="imgur">imgur</option>
						<option value="Impress.Js">Impress.Js</option>
						<option value="dropzone.js">dropzone.js</option>
						<option value="Lamp">Lamp</option>
						<option value="namecheap">namecheap</option>
						<option value="Sendgrid">Sendgrid</option>
						<option value="Nest">Nest</option>
						<option value="Leap Motion">Leap Motion</option>
						<option value="Overtone">Overtone</option>
						<option value="Google Cloud Messaging">Google Cloud Messaging</option>
						<option value="Google Compute Engine">Google Compute Engine</option>
						<option value="Nltk">Nltk</option>
						<option value="wikipedia">wikipedia</option>
						<option value="moodstocks">moodstocks</option>
						<option value="Css3">Css3</option>
						<option value="Dreamweaver">Dreamweaver</option>
						<option value="tastypie">tastypie</option>
						<option value="evernote">evernote</option>
						<option value="Snapchat">Snapchat</option>
						<option value="mashape">mashape</option>
						<option value="Instagram">Instagram</option>
						<option value="CodeMirror">CodeMirror</option>
						<option value="Gracenote">Gracenote</option>
						<option value="WhoSampled">WhoSampled</option>
						<option value="Linode">Linode</option>
						<option value="Creative Commons">Creative Commons</option>
						<option value="Google+">Google+</option>
						<option value="Rdio">Rdio</option>
						<option value="mashery">mashery</option>
						<option value="zxing">zxing</option>
						<option value="Dwolla">Dwolla</option>
						<option value="Google Directions">Google Directions</option>
						<option value="Weather Underground">Weather Underground</option>
						<option value="Stripe">Stripe</option>
						<option value="Yelp">Yelp</option>
						<option value="23andme">23andme</option>
						<option value="Filepicker.io">Filepicker.io</option>
						<option value="CrunchBase">CrunchBase</option>
						<option value="Chrome">Chrome</option>
						<option value="Android Studio">Android Studio</option>
						<option value="TypeScript">TypeScript</option>
						<option value="soundcloud">soundcloud</option>
						<option value="Xml">Xml</option>
						<option value="OpenTok">OpenTok</option>
						<option value="iBeacon">iBeacon</option>
						<option value="Square">Square</option>
						<option value="Nvidia">Nvidia</option>
						<option value="google books">google books</option>
						<option value="jinja">jinja</option>
						<option value="Express.Js">Express.Js</option>
						<option value="Berkeley Nlp Tools">Berkeley Nlp Tools</option>
						<option value="DigitalOcean">DigitalOcean</option>
						<option value="venmo">venmo</option>
						<option value="Google Glass">Google Glass</option>
						<option value="Appinions">Appinions</option>
						<option value="Rotten Tomatoes">Rotten Tomatoes</option>
						<option value="Google Web Speech API">Google Web Speech API</option>
						<option value="MEAN">MEAN</option>
						<option value="ESPN">ESPN</option>
						<option value="USA Today">USA Today</option>
						<option value="last.fm">last.fm</option>
						<option value="spotify">spotify</option>
						<option value="Love">Love</option>
						<option value="Clickslide">Clickslide</option>
						<option value="zillow">zillow</option>
						<option value="Google chart">Google chart</option>
						<option value="Ushahidi">Ushahidi</option>
						<option value="balsamiq">balsamiq</option>
						<option value="USPS Web Tools API">USPS Web Tools API</option>
						<option value="UPS Tracking API">UPS Tracking API</option>
						<option value="Scss">Scss</option>
						<option value="Resque">Resque</option>
						<option value="PhysicsJS">PhysicsJS</option>
						<option value="Project Anarchy">Project Anarchy</option>
						<option value="Blender">Blender</option>
						<option value="Tesseract">Tesseract</option>
						<option value="Bing Translator">Bing Translator</option>
				    </select>
				  </div>
				  
				  <div class="field">
					<label>Social Profiles: </label>
			      </div>
				  
				  <div class="ui labeled input field fluid">
					  <div class="ui label">
					    bitbucket.org/
					  </div>
					  <input name="bitbucket" type="text" placeholder="username">
					</div>
					
				<div class="ui labeled input field fluid">
					  <div class="ui label">
					    facebook.com/
					  </div>
					  <input name="facebook" type="text" placeholder="username">
					</div>
					
				<div class="ui labeled input field fluid">
					  <div class="ui label">
					    github.com/
					  </div>
					  <input name="github" type="text" placeholder="username">
					</div>
					
				<div class="ui labeled input field fluid">
					  <div class="ui label">
					    instagram.com/
					  </div>
					  <input name="instagram" type="text" placeholder="username">
					</div>
					
				<div class="ui labeled input field fluid">
					  <div class="ui label">
					    linkedin.com/in/
					  </div>
					  <input name="linkedin" type="text" placeholder="username">
					</div>
					
				<div class="ui labeled input field fluid">
					  <div class="ui label">
					    twitter.com/
					  </div>
					  <input name="twitter" type="text" placeholder="username">
					</div>
				
		    </div>
	</div>
    <div style="position: relative; top: 75px; z-index: 1" class="ui fluid centered small circular image">
      <img src="<?php echo $image; ?>">
    </div>
    <div style="max-width: 500px; padding-top: 75px; margin-top: 0px" class="ui fluid centered card">
      <div class="center aligned content">
        <span class="header"><?php echo $name; ?></span>
        <div class="meta">
          <span class="date"><?php echo $subtitle; ?></span>
        </div>
        <div class="center aligned extra content social">
			<?php
			foreach ($social as $key => $value) {
				echo '<a href="'. $value .'"> <i class="big '. $key .' icon icon-color"></i> </a>';
			}
			?>
	    </div>
	    <div class="center aligned content skills">
		    <?php
			foreach ($skills as $value) {
				echo '<button class="ui basic button">' . $value . '</button>';
			}
			?>
	    </div>
        <div class="left aligned description">
			<?php echo $description; ?>
        </div>
        <div class="center aligned content links">
			<?php
			foreach ($links as $key => $value) {
				echo '<a href="'. $value .'"><button class="ui basic button">'. $key .'</button></a>';
			}
			?>
	    </div>
      </div>
    </div>
	<div class="dashboard2">
		<div class="ui form">
			<div class="field">
			  <label>Custom CSS</label>
			  <textarea name="css" rows="2" placeholder="Your CSS"></textarea>
			</div>
		
		<div class="field">
			  <label>Bottom Link 1</label>
		</div>
		<div class="field">
	      <input name="link1name" type="text" placeholder="Link Name">
	    </div>
		<div class="ui labeled input field fluid">
		  <div class="ui label">
		    http://
		  </div>
		  <input name="link1" type="text" placeholder="mysite.com">
		  </div>
		  
		  		<div class="field">
			  <label>Bottom Link 2</label>
		</div>
		<div class="field">
	      <input name="link2name" type="text" placeholder="Link Name">
	    </div>
		<div class="ui labeled input field fluid">
		  <div class="ui label">
		    http://
		  </div>
		  <input name="link2" type="text" placeholder="mysite.com">
		  </div>
		  
		  		<div class="field">
			  <label>Bottom Link 3</label>
		</div>
		<div class="field">
	      <input name="link3name" type="text" placeholder="Link Name">
	    </div>
		<div class="ui labeled input field fluid">
		  <div class="ui label">
		    http://
		  </div>
		  <input name="link3" type="text" placeholder="mysite.com">
		  </div>
		  
		  <button type="submit" class="ui primary button">Save all</button>
		  
				</div>
		</form>
	</div>
  </div>
</div>
<script type="text/javascript">
$('#skill-select')
  .dropdown()
;

$('#form')
  .form({
    fields: {
      name     : 'empty',
      subtitle   : 'empty',
      summary : 'empty'
    }
  })
;
</script>
</body>
<AutoScroll></AutoScroll>
</html>
