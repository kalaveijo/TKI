    <!DOCTYPE html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <title></title>
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width">
    
            <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    
            <link rel="stylesheet" href="css/normalize.css">
            <link rel="stylesheet" href="css/main.css">
           <!--  <script src="js/vendor/modernizr-2.6.2.min.js"></script>--> 
            <script src="../js/jquery-1.8.2.min.js"></script>
            <script src="../js/functions.js"></script>
            <script src="../js/project.js"></script>
        </head>
        <body>
            <!--[if lt IE 7]>
                <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
            <![endif]-->
    
            <!-- Add your site or application content here -->
         <div class="body">
           <header>
           
           <figure id="logo">
                <img src="img/logo.png" alt="logo" height="50" />
             </figure>
           
           <nav id="controlPanel" >
           <ul>
                        <li class="user" ><a href="index.html">Lan Pham Ngoc</a></li>
                        <li  ><a href="#">Add Project</a></li>
                        <li class="active"><a href="#">My projects</a></li>
                        <li><a href="#">Sign out</a></li>
                    </ul>
           </nav>
           
           
           </header>
           
           <nav id="dashboard">
           	<ul>      
                      <li ><a href="index.html">Dashboard</a></li>
                        <li ><a href="#">Helpdesk</a></li>
                        <li><a href="#">Contact</a></li>
             </ul>
           </nav>
           
           
           <div id="projectPage">
           	<nav id="projectTabs">
                <ul>
                    <li id="overviewTab" class="active">Overview</li> 
                    <li id="documentsTab">Documents</li> 
                    <li id="timeTab">Time archived</li> 
                    <li id="partnersTab">Partners</li> 
                    <li id="fundersTab">Funders</li> 	
                </ul>
               </nav>
           <div class="overview" id="mainContent">
           
            
          <nav class="breadcrumbs" >
          	<ul>
            	<li><a href="#">My projects </a></li>
                <li><span>    > </span></li>
                <li><a href="project.html"> Audio Visual Technology in Business Management </a></li>
            </ul>
          </nav>
          
          <article id="projectArticle" >
          
          <h2>Audio Visual Technology in Business Management</h2>
          <h3>Description</h3>
          <p>Overview!!!!!! xt ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
          
          </article>
          
          <div id="projectTables">
          
          <table class="generalTable">
          	<tbody>
            	<tr class="hentry">
                	<td class="overviewTitle">Identifiers:</td>
                    <td id="identifier" class="overviewData"></td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Diary numbers:</td>
                    <td id="diary_number" class="overviewData"></td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Project code:</td>
                    <td id="projectcode" class="overviewData"></td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Project name:</td>
                    <td id="project_name" class="overviewData"></td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Acronym:</td>
                    <td id="acronym" class="overviewData"></td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Keywords:</td>
                    <td id="keywords" class="overviewData"></td>
                </tr>
                <tr class="break">
                	<td></td>
                </tr>
                <tr class="break">
                	<td>***</td>
                </tr>
                <tr class="break">
                	<td></td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Forcus areas:</td>
                    <td id="focuse_areas" class="overviewData"></td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Metropolia Coordinator:</td>
                    <td id="metropolia_coordinator" class="overviewData"></td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Metropolia inner project:</td>
                    <td id="metropolia_inner_project" class="overviewData"></td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Degree Program related:</td>
                    <td id="degree_program_related" class="overviewData"></td>
                </tr>
                
            </tbody>
          </table>
          
          <table class="fundingTable">
          	<tbody>
            	<tr class="hentry">
                	<td class="overviewTitle">Inspector:</td>
                    <td id="inspector" class="overviewData"></td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Inspected date:</td>
                    <td id="inspected_day" class="overviewData"></td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Funding application:</td>
                    <td id="funding_application" class="overviewData"></td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Funding application sign date:</td>
                    <td id="funding_application_sign_day" class="overviewData"></td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Denied application:</td>
                    <td id="denied_application" class="overviewData"></td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Funding decision:</td>
                    <td id="funding_decision" class="overviewData"></td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Funding decision date:</td>
                    <td id="funding_decision_day" class="overviewData"></td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Funding decision notification:</td>
                    <td id="funding_decision_notification" class="overviewData"></td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Targeted budget:</td>
                    <td id="targeted_budget" class="overviewData"></td>
                </tr>
            </tbody>
          </table>
          
          <table class="timeTable">
          	<tbody>
            	<tr class="hentry">
                	<td class="overviewTitle">Start date:</td>
                    <td id="start_day" class="overviewData"></td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">End date:</td>
                    <td id="end_day" class="overviewData"></td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Duration:</td>
                    <td id="duration" class="overviewData"></td>
                </tr>
            </tbody>
          </table>
          
          </div>
        
    	<div id="buttons">
       <a id="sendUpdate" class="green medium button" type="button" href="#"> Edit </a>
       <a class="yellow medium button" type="button" href="#"> Move </a>
       <a class="red medium button" type="button" href="#"> Delete </a>
       </div>
       <!-- 
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
            <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>
            <script src="js/plugins.js"></script>
            <script src="js/main.js"></script> -->
    
            <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
            <script>
                var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
                (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
                g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
                s.parentNode.insertBefore(g,s)}(document,'script'));
            </script>
         </div>
         
         <div class="documents" id="mainContent">
           
            
          <nav class="breadcrumbs" >
          	<ul>
            	<li><a href="#">My projects </a></li>
                <li><span>    > </span></li>
                <li><a href="project.html"> Audio Visual Technology in Business Management </a></li>
            </ul>
          </nav>
          
          <article id="projectArticle" >
         
          <p>THIS IS THE DOCUMENT TAB</p>
          
          </article>
          
          <div>
          
   			<table id="documentTable">
            	<thead>
                	<tr>
                    	<th>List of folders</th>
                        <th><input type="checkbox">
                                	<button>Edit</button>
                                    <button>Preview</button>
                                    <button>Move</button>
                                    <button>Delete</button></th>
                    </tr>
                </thead>
            	<tbody>
                	<tr>
                    	<td id="leftDocumentTable">
                        	<div>
                            	<ul>
                                	<li><a href="#">Folder 1</a></li>
                                    <li><a href="#">Folder 2</a></li>
                                    <li><a href="#">Folder 3</a></li>
                                    <li><a href="#">Folder 4</a></li>
                                    <li><a href="#">Folder 5</a></li>
                                </ul>
                            </div>
                        </td>
                        <td id="rightDocumentTable">  
                    	<table>
                        	<thead>
                            	<tr>
                                	<th class="checkbox"></th>
                                    <th class="docIcon"></th>
                                    <th class="docName" >Document name</th>
                                    <th class="docModifier" >Modifier</th>
                                    <th class="docModifiedTime">Modified time</th>
                                	
                                </tr>
                            </thead>
                            <tbody>
                            
                            	<tr>
                                	<td class="checkbox"><input type="checkbox"></td>
                                    <td class="docIcon"><img src="#" /></td>
                                	<td class="docName"><a href="docs/NOKIAQA.PDF">Folder 1</a></td>
                                    <td class="docModifier">Chii</td>
                                    <td class="docModifiedTime">Yesterday</td>
                                </tr>
                                
                            	<tr>
                                	<td class="checkbox"><input type="checkbox"></td>
                                    <td class="docIcon"><img src="#" /></td>
                                	<td class="docName"><a href="docs/NOKIAQA.PDF">Nokia Docs</a></td>
                                    <td class="docModifier">Chii</td>
                                    <td class="docModifiedTime">Yesterday</td>
                                </tr>
                                
                                <tr>
                                	<td class="checkbox"><input type="checkbox"></td>
                                    <td class="docIcon"><img src="#" /></td>
                                	<td class="docName"><a href="docs/NOKIAQA.PDF">Nokia Docs</a></td>
                                    <td class="docModifier">Chii</td>
                                    <td class="docModifiedTime">Yesterday</td>
                                </tr>
                                
                                <tr>
                                	<td class="checkbox"><input type="checkbox"></td>
                                    <td class="docIcon"><img src="#" /></td>
                                	<td class="docName"><a href="docs/NOKIAQA.PDF">Nokia Docs</a></td>
                                    <td class="docModifier">Chii</td>
                                    <td class="docModifiedTime">Yesterday</td>
                                </tr>
                                
                                
                            </tbody>
                        </table>
                        </td> 
                    </tr>
                </tbody>
            </table>
          
          </div>
        
    <!--  
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
            <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>
            <script src="js/plugins.js"></script>
            <script src="js/main.js"></script> -->
    
            <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
            <script>
                var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
                (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
                g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
                s.parentNode.insertBefore(g,s)}(document,'script'));
            </script>
            
         </div>
         
         <div class="timearchived" id="mainContent">
           
            
          <nav class="breadcrumbs" >
          	<ul>
            	<li><a href="#">My projects </a></li>
                <li><span>    > </span></li>
                <li><a href="project.html"> Audio Visual Technology in Business Management </a></li>
            </ul>
          </nav>
          
          
          
          <div class="modifiedVersion">
          
          <article class="timeArchivedInfo" >
          <h2>First Version</h2>
          <h4>Time modified: 12:22:44 25th November 2012</h4>
          <h4>By: Timo Pekka Kemmpainen </h4>
 
          
          </article>
          
          <table class="modifiedTable generalTable">
          	<tbody>
            	<tr class="hentry">
                	<td class="overviewTitle">Identifiers:</td>
                    <td class="overviewData">[RANDOM NUMBERS]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Diary numbers:</td>
                    <td class="overviewData">[RANDOM NUMBERS]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Project code:</td>
                    <td class="overviewData">[RANDOM NUMBERS]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Project name:</td>
                    <td class="overviewData">[NAME]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Acronym:</td>
                    <td class="overviewData">[ACRONYMS]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Keywords:</td>
                    <td class="overviewData">[KEYWORDS]</td>
                </tr>
                <tr class="break">
                	<td></td>
                </tr>
                <tr class="break">
                	<td>***</td>
                </tr>
                <tr class="break">
                	<td></td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Forcus areas:</td>
                    <td class="overviewData">[for example engineering of it]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Metropolia Coordinator:</td>
                    <td class="overviewData">[PERSON]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Metropolia inner project:</td>
                    <td class="overviewData">[YES/NO]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Degree Program related:</td>
                    <td class="overviewData">[YES/NO]</td>
                </tr>
                
            </tbody>
          </table>
          
          <table class="modifiedTable fundingTable">
          	<tbody>
            	<tr class="hentry">
                	<td class="overviewTitle">Inspector:</td>
                    <td class="overviewData">[PERSON]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Inspected date:</td>
                    <td class="overviewData">[DATE]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Funding application:</td>
                    <td class="overviewData">[YES/NO]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Funding application sign date:</td>
                    <td class="overviewData">[DATE]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Denied application:</td>
                    <td class="overviewData">[YES/NO]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Funding decision:</td>
                    <td class="overviewData">[YES/NO]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Funding decision date:</td>
                    <td class="overviewData">[DATE]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Funding decision notification:</td>
                    <td class="overviewData">[just leave empty]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Targeted budget:</td>
                    <td class="overviewData">[9001 million]</td>
                </tr>
            </tbody>
          </table>
          
          <table class="modifiedTable timeTable">
          	<tbody>
            	<tr class="hentry">
                	<td class="overviewTitle">Start date:</td>
                    <td class="overviewData">[DATE]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">End date:</td>
                    <td class="overviewData">[DATE]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Duration:</td>
                    <td class="overviewData">[NUMBER OF MONTHS]</td>
                </tr>
            </tbody>
          </table>
          
          </div>
        
    <div class="modifiedVersion">
          
          <article class="timeArchivedInfo" >
          <h2>Second Version</h2>
          <h4>Time modified: 12:22:44 26th November 2012</h4>
          <h4>By: Timo Pekka Kemmpainen </h4>
          
          </article>
          
          <table class="modifiedTable generalTable">
          	<tbody>
            	<tr class="hentry">
                	<td class="overviewTitle">Identifiers:</td>
                    <td class="overviewData">[RANDOM NUMBERS]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Diary numbers:</td>
                    <td class="overviewData">[RANDOM NUMBERS]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Project code:</td>
                    <td class="overviewData">[RANDOM NUMBERS]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Project name:</td>
                    <td class="overviewData">[NAME]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Acronym:</td>
                    <td class="overviewData">[ACRONYMS]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Keywords:</td>
                    <td class="overviewData">[KEYWORDS]</td>
                </tr>
                <tr class="break">
                	<td></td>
                </tr>
                <tr class="break">
                	<td>***</td>
                </tr>
                <tr class="break">
                	<td></td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Forcus areas:</td>
                    <td class="overviewData">[for example engineering of it]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Metropolia Coordinator:</td>
                    <td class="overviewData">[PERSON]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Metropolia inner project:</td>
                    <td class="overviewData">[YES/NO]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Degree Program related:</td>
                    <td class="overviewData">[YES/NO]</td>
                </tr>
                
            </tbody>
          </table>
          
          <table class="modifiedTable fundingTable">
          	<tbody>
            	<tr class="hentry">
                	<td class="overviewTitle">Inspector:</td>
                    <td class="overviewData">[PERSON]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Inspected date:</td>
                    <td class="overviewData">[DATE]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Funding application:</td>
                    <td class="overviewData">[YES/NO]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Funding application sign date:</td>
                    <td class="overviewData">[DATE]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Denied application:</td>
                    <td class="overviewData">[YES/NO]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Funding decision:</td>
                    <td class="overviewData">[YES/NO]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Funding decision date:</td>
                    <td class="overviewData">[DATE]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Funding decision notification:</td>
                    <td class="overviewData">[just leave empty]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Targeted budget:</td>
                    <td class="overviewData">[9001 million]</td>
                </tr>
            </tbody>
          </table>
          
          <table class="modifiedTable timeTable">
          	<tbody>
            	<tr class="hentry">
                	<td class="overviewTitle">Start date:</td>
                    <td class="overviewData">[DATE]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">End date:</td>
                    <td class="overviewData">[DATE]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Duration:</td>
                    <td class="overviewData">[NUMBER OF MONTHS]</td>
                </tr>
            </tbody>
          </table>
          
          </div>
          
          <div class="modifiedVersion">
          
          <article class="timeArchivedInfo" >
          <h2>Third Version</h2>
          <h4>Time modified: 12:22:44 27th November 2012</h4>
          <h4>By: Timo Pekka Kemmpainen </h4>
          
          </article>
          
          <table class="modifiedTable generalTable">
          	<tbody>
            	<tr class="hentry">
                	<td class="overviewTitle">Identifiers:</td>
                    <td class="overviewData">[RANDOM NUMBERS]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Diary numbers:</td>
                    <td class="overviewData">[RANDOM NUMBERS]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Project code:</td>
                    <td class="overviewData">[RANDOM NUMBERS]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Project name:</td>
                    <td class="overviewData">[NAME]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Acronym:</td>
                    <td class="overviewData">[ACRONYMS]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Keywords:</td>
                    <td class="overviewData">[KEYWORDS]</td>
                </tr>
                <tr class="break">
                	<td></td>
                </tr>
                <tr class="break">
                	<td>***</td>
                </tr>
                <tr class="break">
                	<td></td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Forcus areas:</td>
                    <td class="overviewData">[for example engineering of it]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Metropolia Coordinator:</td>
                    <td class="overviewData">[PERSON]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Metropolia inner project:</td>
                    <td class="overviewData">[YES/NO]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Degree Program related:</td>
                    <td class="overviewData">[YES/NO]</td>
                </tr>
                
            </tbody>
          </table>
          
          <table class="modifiedTable fundingTable">
          	<tbody>
            	<tr class="hentry">
                	<td class="overviewTitle">Inspector:</td>
                    <td class="overviewData">[PERSON]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Inspected date:</td>
                    <td class="overviewData">[DATE]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Funding application:</td>
                    <td class="overviewData">[YES/NO]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Funding application sign date:</td>
                    <td class="overviewData">[DATE]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Denied application:</td>
                    <td class="overviewData">[YES/NO]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Funding decision:</td>
                    <td class="overviewData">[YES/NO]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Funding decision date:</td>
                    <td class="overviewData">[DATE]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Funding decision notification:</td>
                    <td class="overviewData">[just leave empty]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Targeted budget:</td>
                    <td class="overviewData">[9001 million]</td>
                </tr>
            </tbody>
          </table>
          
          <table class="modifiedTable timeTable">
          	<tbody>
            	<tr class="hentry">
                	<td class="overviewTitle">Start date:</td>
                    <td class="overviewData">[DATE]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">End date:</td>
                    <td class="overviewData">[DATE]</td>
                </tr>
                <tr class="hentry">
                	<td class="overviewTitle">Duration:</td>
                    <td class="overviewData">[NUMBER OF MONTHS]</td>
                </tr>
            </tbody>
          </table>
          
          </div>
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
            <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>
            <script src="js/plugins.js"></script>
            <script src="js/main.js"></script>
    
            <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
            <script>
                var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
                (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
                g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
                s.parentNode.insertBefore(g,s)}(document,'script'));
            </script>
            
         </div>
         
         <div class="partners" id="mainContent">
           
            
          <nav class="breadcrumbs" >
          	<ul>
            	<li><a href="#">My projects </a></li>
                <li><span>    > </span></li>
                <li><a href="project.html"> Audio Visual Technology in Business Management </a></li>
            </ul>
          </nav>
          
          <div>
          
          <table id="partnersTable">
          <thead>
           <tr>
                        	<th><input type="checkbox">
                                	<button>Edit</button>
                                    <button>Move</button>
                                    <button>Delete</button></th>
                            <th><input type="checkbox">
                                    <button>Add</button>
                                    <button>Delete</button></th>
                        </tr>

          </thead>
          <tbody>

          	<tr>
            	<td id="projectPartners">
                	<table>
                    	<thead>
                        <tr>
                        	<th> Partners in Project</th>
                       </tr>
                        </thead>
                    	<tbody>
                        	<tr>
                            	<td>
                                     <ul>
                                        <li><h3>Funder name 1</h3></li>
                                        <li>Amount : in euros </li>
                                        <li>Funding decision: yes/no</li>
                                        <li>Funding decision date: date </li>
                                        <li>Funding decision notification :yes/no</li>
                                    </ul>
                                </td>
                                <td class="checkbox" ><input type="checkbox"/></td>
                            </tr>
                            <tr>
                            	<td>
                                     <ul>
                                        <li><h3>Funder name 2</h3></li>
                                        <li>Amount : in euros </li>
                                        <li>Funding decision: yes/no</li>
                                        <li>Funding decision date: date </li>
                                        <li>Funding decision notification :yes/no</li>
                                    </ul>
                                </td>
                                <td class="checkbox" ><input type="checkbox"/></td>
                            </tr>
                            <tr>
                            	<td>
                                     <ul>
                                        <li><h3>Funder name 3</h3></li>
                                        <li>Amount : in euros </li>
                                        <li>Funding decision: yes/no</li>
                                        <li>Funding decision date: date </li>
                                        <li>Funding decision notification :yes/no</li>
                                    </ul>
                                </td>
                                <td class="checkbox" ><input type="checkbox"/></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                
                <td id="partnersList">
                	<table>
                    	<thead>
                        	<tr>
                            	<th></th>
                            	<th>All Partners </th>
                                <th></th>
                            </tr>
                        </thead>
                    	<tbody>
                        	<tr>
                            	<td class="no" >1</td>
                                <td class="partnersName">Someone </td>
                                <td class="checkbox" ><input type="checkbox"/></td>
                            </tr>
                            <tr>
                            	<td class="no" >1</td>
                                <td class="partnersName">Someone </td>
                                <td class="checkbox" ><input type="checkbox"/></td>
                            </tr>
                            <tr>
                            	<td class="no" >1</td>
                                <td class="partnersName">Someone </td>
                                <td class="checkbox" ><input type="checkbox"/></td>
                            </tr>
                            <tr>
                            	<td class="no" >1</td>
                                <td class="partnersName">Someone </td>
                                <td class="checkbox" ><input type="checkbox"/></td>
                            </tr>
                            <tr>
                            	<td class="no" >1</td>
                                <td class="partnersName">Someone </td>
                                <td class="checkbox" ><input type="checkbox"/></td>
                            </tr>
                            
                            
                        </tbody>
                    </table>
                </td>
            </tr>
          </tbody>
          </table>
          </div>
    
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
            <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>
            <script src="js/plugins.js"></script>
            <script src="js/main.js"></script>
    
            <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
            <script>
                var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
                (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
                g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
                s.parentNode.insertBefore(g,s)}(document,'script'));
            </script>
            
         </div>
         
         <div class="funders" id="mainContent">
           
            
          <nav class="breadcrumbs" >
          	<ul>
            	<li><a href="#">My projects </a></li>
                <li><span>    > </span></li>
                <li><a href="project.html"> Audio Visual Technology in Business Management </a></li>
            </ul>
          </nav>
          
          <article id="projectArticle" >
          
          <h2>Audio Visual Technology in Business Management</h2>
          <h3>Description</h3>
          <p>FUNDERS!!!!!     g and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
          
          </article>
          
          <div >
          
                    <table id="partnersTable">
          <thead>
           <tr>
                        	<th><input type="checkbox">
                                	<button>Edit</button>
                                    <button>Move</button>
                                    <button>Delete</button></th>
                            <th><input type="checkbox">
                                    <button>Add</button>
                                    <button>Delete</button></th>
                        </tr>

          </thead>
          <tbody>

          	<tr>
            	<td id="projectPartners">
                	<table>
                    	<thead>
                        <tr>
                        	<th> Partners in Project</th>
                       </tr>
                        </thead>
                    	<tbody>
                        	<tr>
                            	<td>
                                     <ul>
                                        <li><h3>Funder name 1</h3></li>
                                        <li>Amount : in euros </li>
                                        <li>Funding decision: yes/no</li>
                                        <li>Funding decision date: date </li>
                                        <li>Funding decision notification :yes/no</li>
                                    </ul>
                                </td>
                                <td class="checkbox" ><input type="checkbox"/></td>
                            </tr>
                            <tr>
                            	<td>
                                     <ul>
                                        <li><h3>Funder name 2</h3></li>
                                        <li>Amount : in euros </li>
                                        <li>Funding decision: yes/no</li>
                                        <li>Funding decision date: date </li>
                                        <li>Funding decision notification :yes/no</li>
                                    </ul>
                                </td>
                                <td class="checkbox" ><input type="checkbox"/></td>
                            </tr>
                            <tr>
                            	<td>
                                     <ul>
                                        <li><h3>Funder name 3</h3></li>
                                        <li>Amount : in euros </li>
                                        <li>Funding decision: yes/no</li>
                                        <li>Funding decision date: date </li>
                                        <li>Funding decision notification :yes/no</li>
                                    </ul>
                                </td>
                                <td class="checkbox" ><input type="checkbox"/></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                
                <td id="partnersList">
                	<table>
                    	<thead>
                        	<tr>
                            	<th></th>
                            	<th>All Partners </th>
                                <th></th>
                            </tr>
                        </thead>
                    	<tbody>
                        	<tr>
                            	<td class="no" >1</td>
                                <td class="partnersName">Someone </td>
                                <td class="checkbox" ><input type="checkbox"/></td>
                            </tr>
                            <tr>
                            	<td class="no" >1</td>
                                <td class="partnersName">Someone </td>
                                <td class="checkbox" ><input type="checkbox"/></td>
                            </tr>
                            <tr>
                            	<td class="no" >1</td>
                                <td class="partnersName">Someone </td>
                                <td class="checkbox" ><input type="checkbox"/></td>
                            </tr>
                            <tr>
                            	<td class="no" >1</td>
                                <td class="partnersName">Someone </td>
                                <td class="checkbox" ><input type="checkbox"/></td>
                            </tr>
                            <tr>
                            	<td class="no" >1</td>
                                <td class="partnersName">Someone </td>
                                <td class="checkbox" ><input type="checkbox"/></td>
                            </tr>
                            
                            
                        </tbody>
                    </table>
                </td>
            </tr>
          </tbody>
          </table>
          
          </div>
        
    <!-- 
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
            <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>
            <script src="js/plugins.js"></script>
            <script src="js/main.js"></script> -->
    
            <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
            <script>
                var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
                (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
                g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
                s.parentNode.insertBefore(g,s)}(document,'script'));
            </script>
            
         </div>
         
         </div>
           
           <footer>
           <p>Metropolia - Expertise and Insight for the future</p>
           </footer>
        </body>
    </html>
