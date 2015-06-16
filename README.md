PerfectAPI-v0.1 Readme

Dear, User

Date- June 16, 2015

  Please do not make changes in any file without proper knowledge or information because by making changes the script will create fatal errors and sometimes the result can be overflow.
	
	FILE STRUCTURE:-
		PerfectAPI-v0.1 //Main API.
		JSON_DB/data.json //Well orgainzed Database various UA Strings and their corresponding device types.
		Readme.md //Readme
		License.file // License of the API

  API Description:-
  
It is a well designed and small in size pure Javascript and PHP API that will manage the problem of device identification and resolve the issue by taking the user to the appropriate and supported website mentioned by you that corresponding to the respected devices. It is     the development stage of this API so anyone can contribute and some other issue resolving feature will added in the upcoming versions. If you found any bug or a security hole then please inform me or contribute solution.
    
  How to use?:-
  
   There is nothing special in this topic, you just have to create an Index.php where you want and put the files in the directory where your Index.php is located that files are:-
    PerfectAPI-v0.1.php
   and create a folder named "JSON_DB" without quotes in the directory where your Index.php and PerfectAPI-v0.1.php is located
   and under the JSON_DB Directory put the data.json file after doing so your entire file structure will look something like this.
   
	 www [directory]
		 Index.php [file]
		 PerfectAPI-v0.1.php [file]
		 JSON_DB [directory]
			data.json [file]
			
   Remember: You can use it on any host server but the your Index.php must have PHP extension and you can choose any parent directory.
   
   Implementation on your Index.php:-
   To Implement the API on your Index.php file please edit your Index.php just like the below one:-
   
   
		 <html>
		 <head><title>yourwebsitetitle</title></head>
    		<body androidred="http://yourandroidsite.com" iphonered="http://youriossite.com" 			mobred="http://yourmobilesite.com" 	              desktopred="http://yourdesktopsite.com">
		 <?php
		 require 'PerfectAPI-v0.1.php';
		 ?>
		 <h1>yourwebsitebody</h1>
		 </body>
    		</html>
    
    
  If every thing is right then after opening your Index.php user will get redirected to the site supported by his device.
  
  Words from Author:- 
  
  This API is in its Development Stage and If you have any suggestion or idea then your contribution must be welcomed, If any bug or security hole is found in this API then please Infrom to me and if you know how to resolve the issue then please contribute, your contribution must be appreciated.
  For the construction of your own API according to your features then please contact to me (Shrish Shrivastava) by sending a request mail at developerperf@gmail.com I will surely respond you whenever I found your request.
  
  Regards,
  
  Author and API Developer
  
  Shrish Shrivastava
  
	
